@extends('layouts.app')


@section('body-class', 'contact-page sidebar-collapse')
@section('nav-class', 'navbar bg-light fixed-top navbar-expand-lg')


@section('content')




<div id="contactUsMap" class="big-map" style="z-index: -4"></div>
  <div class="main main-raised">
    <div class="contact-content">
      <div class="container">
        <h2 class="title">Send us a message!</h2>
        <div class="row">
          <div class="col-md-6">
            <p class="description">
              You can contact us with 
              anything related to PAT. 
              We&apos;ll get in touch with you 
              as soon as possible.
              <br>
              <br>
            </p>

{{-- Display message to user if they have successfully sent email --}}
            @if (isset($_GET['success']) && $_GET['success'] == 1)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Thank you, your message has been sent!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
{{-- Display errors to the user they may have made in the form --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          
          <form action="{{ url('contact') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="name" class="bmd-label-floating">
                  Your name
                </label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmails" class="bmd-label-floating">
                  Email address
                </label>
                <input type="email" class="form-control" id="exampleInputEmails" name="email">
                <span class="bmd-help">
                  We'll never share your email with anyone else.
                </span>
              </div>
              <div class="form-group">
                <label for="phone" class="bmd-label-floating">
                  Phone
                </label>
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
              <div class="form-group label-floating">
                <label class="form-control-label bmd-label-floating" for="message_body"> 
                  Your message
                </label>
                <textarea class="form-control" rows="6" id="message_body" name="message_body"></textarea>
              </div>
              <div class="submit text-center">
                <input type="submit" class="btn btn-primary btn-raised btn-round" value="Contact Us">
              </div>
            </form>

            
          </div>
          <div class="col-md-4 ml-auto">
            <div class="info info-horizontal">
              {{-- <div class="icon icon-primary">
                <i class="material-icons">pin_drop</i>
              </div>
              <div class="description">
                <h4 class="info-title">
                  Find us at the office
                </h4>
                <p> 
                  Bld Mihail Kogalniceanu, nr. 8,
                  <br> 7652 Bucharest,
                  <br> Romania
                </p>
              </div>--}}
            </div> 
            <div class="info info-horizontal">
              <div class="icon icon-primary">
                <i class="material-icons">phone</i>
              </div>
              <div class="description">
                <h4 class="info-title">Give us a ring</h4>
                <p> PTCIJ
                  <br> +234.810.419.8112
                </p>
              </div>
            </div>
           <div class="info info-horizontal"> 
               {{-- <div class="icon icon-primary">
                <i class="material-icons">business_center</i>
              </div>
              <div class="description">
                <h4 class="info-title">Legal Information</h4>
                <p> Creative Tim Ltd.
                  <br> VAT &#xB7; EN2341241
                  <br> IBAN &#xB7; EN8732ENGB2300099123
                  <br> Bank &#xB7; Great Britain Bank
                </p>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
      $(document).ready(function() {
        nonBelievers.contactUsMap(
          "contactUsMap", 
          9.060892, 
          7.4637899, 
          15, 
          "PTCIJ Main Office"
        );
      });
  </script>
@endsection