<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Requests\User\NewRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\DelRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.user.all', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->roles()->attach(
            Role::where('id', $request->input('role_id'))->first()
        );

        return redirect()->route('users');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id, $success = -1)
    {
        $user = User::findOrFail($id);

        if(Auth::user()->hasRole('user')){
            return view('user.profile', ['user' => $user]);
        }
        
        if($success != -1) {
            return view('admin.user.profile', [
                'user' => $user,
                'success' => $success
            ]);
        }

        return view('admin.user.profile', ['user' => $user]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $user)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'about' => 'required'
        ]);
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->about = $request->input('about');
        if($user->save()) {
            return new UserResource($user);
        }
    }

    public function userUpdate(Request $request){
        $user = User::findOrFail($request->input('id'));
    }

    public function adminUpdate(Request $request) {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'role_id' => 'required',
            'user_id' => 'required'
        ]);
        $user = User::findOrFail($request->input('id'));
        $user->name = $request->input('name');
        $user->save();
        $user->roles()->sync($request->input('role_id'));
        return response()->json(['success'=>1], '200');
    }

    public function changePassword(ChangePasswordRequest $request) {
        $user = User::findOrFail(Auth::user()->id);
        
        $user->password = bcrypt($request->input('password'));

        if($user->save()) {
            return redirect()->action('UserController@show', [
                'id' => Auth::user()->id, 
                'success' => 1
            ]);
        }
    }

    public function updateThumbnail(Request $request) {
        $this->validate($request, [
            'user_id' => 'required',
            'qqfile' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('qqfile')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('qqfile')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('qqfile')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('qqfile')->storeAs('public/users/thumbnails', $filenameToStore);
        }
        $user = User::find($request->input('user_id'));
        if($request->hasFile('qqfile')) {
            //delete the previous file
            if($user->thumbnail !== "users/thumbnails/default.jpg" 
            && $user->thumbnail !== NULL && $user->thumbnail !== "") {
                //Storage::delete("/".$user->thumbnail);
                unlink(public_path("storage/".$user->thumbnail));
            }
        }
        $user->thumbnail = "users/thumbnails/".$filenameToStore;
        if($user->save()) {
            $response['id'] = $user->id;
            $response['thumbnail'] = $user->thumbnail;
            $response['success'] = 1;
            return response()->json($response, 200);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
