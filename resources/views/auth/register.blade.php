@extends('layouts.app')

@section('body-class', 'signup-page sidebar-collapse')


@section('content')


<div class="page-header header-filter" filter-color="purple" style="background-image: url('{{ asset('img/auth-bg.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-signup">
            <h2 class="card-title text-center">{{ __('Register') }}</h2>
            <div class="card-body">
              <div class="row">
                <div class="col-md-5 ml-auto p-4">
                    <div class="info info-horizontal">
                        <div class="icon icon-info">
                            <i class="material-icons">message</i>
                        </div>
                        <div class="description">
                            <p class="description">
                                “Freedom of speech gives us the right to offend others, whereas freedom of 
                                thought gives them the choice as to whether or not to be offended.” 
                            </p>
                            <h4 class="info-subtitle text-muted">-Mokokoma Mokhonoana</h4>
                        </div>
                    </div>
                  <div class="info info-horizontal">
                    <div class="icon icon-primary">
                      <i class="material-icons">message</i>
                    </div>
                    <div class="description">
                      <p class="description">
                            “It always seems impossible until its done.” 
                      </p>
                      <h4 class="info-subtitle text-muted">-Nelson Mandela</h4>
                    </div>
                  </div>
                  <div class="info info-horizontal">
                    <div class="icon icon-warning">
                        <i class="material-icons">message</i>
                    </div>
                    <div class="description">
                        <p class="description">
                            “A free press can, of course, be good or bad, but, most certainly without freedom, 
                            the press will never be anything but bad.” 
                        </p>
                        <h4 class="info-subtitle text-muted">-Albert Camus</h4>
                    </div>
                 </div>
                </div>


                <div class="col-md-5 mr-auto">
                  {{-- <div class="social text-center">
                    <button class="btn btn-just-icon btn-round btn-facebook">
                      <i class="fa fa-facebook"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-google">
                      <i class="fa fa-google"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-twitter">
                      <i class="fa fa-twitter"> </i>
                    </button>
                  </div> --}}

                  {{-- Registration Form --}}
                  <form class="form" method="POST" action="{{ route('register') }}">
                      @csrf
                    <div class="form-group label-floating is-empty">
                        <label class="bmd-label-floating ml-5">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                
                                <span class="input-group-text">
                                    <i class="material-icons">face</i>
                                </span>
                                
                            </div>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group label-floating is-empty">
                            <label class="bmd-label-floating ml-5">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">mail</i>
                            </span>
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group label-floating is-empty">
                            <label class="bmd-label-floating ml-5">Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group label-floating is-empty">
                           <label class="bmd-label-floating ml-5">Confirm Password</label>
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                            <span class="input-group-text">                                 
                                <i class="material-icons">lock_outline</i>
                            </span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input name="termsConditions" class="form-check-input{{ $errors->has('termsConditions') ? ' is-invalid' : '' }}" type="checkbox" value="1" >
                         <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                        I agree to the
                        <a href="#something">terms and conditions</a>.
                      </label>
                      
{{-- FIX: ERROR MESSAGE FOR TERMS AND CONDITIONS CHECKBOX NOT DISPLAYING --}}
                       @if ($errors->has('termsConditions'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('termsConditions') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


















{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
