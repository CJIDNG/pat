@extends('layouts.admin.app')

@section('admin-nav-title', 'User Profile')

@section('content')

<div class="row">
    <div class="col-md-8">


        <!-- -->
        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Profile
                <small class="category"></small>
                </h4>
            </div>
            <div class="card-body">
                <div class="m-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input type="email" value="{{ $user->email }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Full Name</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Password -
                <small class="category">Change Your Password</small>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('changePassword') }}" method="POST" class="m-5">
                    @csrf
                    @if (isset($_GET['success']) && $_GET['success'] == 1)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Password has been changed successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">New Password</label>
                                <input value="{{ old('password') }}" type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Confirm Password</label>
                                <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info pull-right">
                        Change Password
                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>


    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <a href="#pablo">
                <img class="img" src="{{ asset('img/default-avatar.png') }}" />
                </a>
            </div>
            <div class="card-body">
                <h6 class="card-category text-gray">
                    @php
                        $roles = $user->roles()->select('name')->get();
                    @endphp
                    @for ($i = 0; $i < count($roles); $i++)
                        @php
                            $role = $roles[$i];
                        @endphp
                        {{ $role->name.' ' }}
                    @endfor
                </h6>
                <h4 class="card-title">{{ $user->name }}</h4>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection