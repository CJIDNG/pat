<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Mail;

class ContactController extends Controller
{
    public function show($success = -1)
    {
            return view('pages.contact');

    }

    public function mailToAdmin(Request $request, User $user)
    {

        //validate request information
        $this->validate($request,
        [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message_body' => 'required|min:10'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message_body' => $request->message_body
        );

        

        //get only users who are admins
        $admin = Role::findOrFail(2);

        $adminEmails = $admin->users()->pluck('email')->all();

        // foreach ($adminEmails as $email) {
        //     echo $title;
        // }
        // $adminEmails = $admin->users()->select('email')->get()->toArray();

        // dd($adminEmails);
        // $testEmails = [
        //     'faruk@ptcij.org',
        //     'mogbanna@gmail.com'
        // ];


        //send email to admin users only
        try {
            Mail::send('emails.contact', $data, function($message) use ($data, $adminEmails){
                $message->from($data['email']);
                $message->to($adminEmails);
                $message->subject("{{ PAT }}: New message from ".$data['name']." via Contact Form");
            });

            //flag indicating email has been sent without errors
            $success = 1;
        } catch (Exception $ex) {
            //we have errors! 
            $success = 0;
            // Debug via $ex->getMessage();
        }

        //Keeps user on contact page and the redir sends $success variable to
        //show() function where the view checks the value of $success
        //displays the message accordingly 
        return redirect()->action('ContactController@show', [
            'success' => $success
        ]);
        
    }
}
