@extends('layouts.app')



@section('body-class', 'contact-page sidebar-collapse')


@section('content')
    

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{ asset('img/jail-bars.jpg') }}');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h1 class="title">What We Do</h1>
          <h4>Take A Look Behind The Scenes!</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
              
            <hr>
            <div class="features-2">
              <div class="text-center">
                <h3 class="title">Frequently Asked Questions</h3>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto">
                  <div class="info info-horizontal">
                    <div class="icon icon-info">
                      <i class="material-icons">question_answer</i>
                    </div>
                    <div class="description">
                      <h4 class="info-title">What is PAT?</h4>
                      <p>PAT is an ancronym for Press Attack Tracker. As the name implies, PAT is a platform used to track
                         and report attacks on the press.<br>
                         The platform will provide a map of threats and attacks on the press thus improving data for periodic review.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mr-auto">
                  <div class="info info-horizontal">
                    <div class="icon icon-success">
                      <i class="material-icons">question_answer</i>
                    </div>
                    <div class="description">
                      <h4 class="info-title">Who is involved in the site?</h4>
                      <p>PAT is led by the <a href="https://ptcij.org" target="_blank"> Premium Times Center for Investigative 
                        Journalism</a> with the sole responsibility of collecting
                       and inputting data of harrassed and attacked Journalists.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto">
                  <div class="info info-horizontal">
                    <div class="icon icon-success">
                      <i class="material-icons">question_answer</i>
                    </div>
                    <div class="description">
                      <h4 class="info-title">What is the information used for?</h4>
                      <p>The tracker is the innovative outcome of Premium Times Center for Investigative Jounalism with the support
                         of <a href="https://isupportfreepress.pressattack.ng/" target="_blank">Free Press Unlimited</a> to serve as 
                         an advocacy tool for Press Freedom in the wider Nigerian society.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mr-auto">
                  <div class="info info-horizontal">
                      <div class="icon icon-success">
                        <i class="material-icons">question_answer</i>
                      </div>
                      <div class="description">
                        <h4 class="info-title">Who funds PAT?</h4>
                        <p>The platform is funded by the <a href="https://isupportfreepress.pressattack.ng/" target="_blank">Free Press Unlimited</a>.</p>
                      </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto">
                  <div class="info info-horizontal">
                    <div class="icon icon-rose">
                      <i class="material-icons">question_answer</i>
                    </div>
                    <div class="description">
                      <h4 class="info-title">Who does PAT count as a Journalist?</h4>
                      <p>
                          Press Attack Tracker (PAT) adopts a functional definition of who is considered a journalist 
                          and that is anyone performing an act of journalism. This definition does not exclude on the 
                          basis of academic qualification as a graduate of a journalism program, possession of a mere press pass, 
                          membership of a press or journalistic body, whether their employment is full time or freelance, the medium 
                          they work with either, print, broadcast or online.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mr-auto mt-5">
                  <div class="info info-horizontal">
                    <div class="icon icon-rose">
                      {{-- <i class="material-icons">question_answer</i> --}}
                    </div>
                    <div class="description">
                      <p>The tracker will count as journalists, therefore those professionals whose rights were violated 
                        in the course of gathering, processing or disseminating information or as a result of their work.
                          PAT considers a journalistic act as the process of gathering and dissemination of news that is 
                          truthful and accurate and whose claims are verifiable, one that is produced in conditions of 
                          independence and above all, that is defined by a true public purpose. Such individuals will have 
                          to be professionally engaged in the journalistic act meaning they are strictly guided by the 
                          ethical code of the Nigerian Press Organization.
                      
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection