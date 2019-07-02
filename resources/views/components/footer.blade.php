<footer class="footer @yield('footer-class')">
    <div class="container">
        <div class="content">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <h5>PAT MISSION</h5>
                    <p>
                            ● Created to track abuses on the rights of the press.<br>
                            ● Aims to ensure that journalists whose rights have been abused will get a prompt response, once our team has
                            been notified.<br>
                            ● Ensures to have a catalogue of submitted evidence for litigating cases of attacks.
                    </p>
                </div>
                <div class="col-md-4">
                    <h5>I Support Free Press!</h5>
                    <p>
                            ● Click below to learn more about this Campaign.<br>
                           <a href="https://isupportfreepress.pressattack.ng/"> #iSupportFreePress </a>
                    </p> 
                </div>

                {{-- <div class="col-md-4">
                    <h5>Social Feed</h5>
                    <div class="social-feed">
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>
                                How to handle ethical 
                                disagreements with your clients.
                            </p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>
                                The tangible benefits of designing 
                                at 1x pixel density.
                            </p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-facebook-square"></i>
                            <p>
                                A collection of 25 stunning sites 
                                that you can use for inspiration.
                            </p>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-md-4">
                    <h5>Instagram Feed</h5>
                    <div class="gallery-feed">
                        <img src="{{ asset('img/faces/card-profile6-square.jpg') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('img/faces/christian.jpg') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('img/faces/card-profile4-square.jpg') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('img/faces/card-profile1-square.jpg') }}" class="img img-raised rounded" alt="">

                        <img src="{{ asset('img/faces/marc.jpg') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('img/faces/kendall.jpg') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('img/faces/card-profile5-square.jpg') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('img/faces/card-profile2-square.jpg') }}" class="img img-raised rounded" alt="">
                    </div>
                </div> --}}
            </div>
        </div>


        <hr>

        <ul class="float-left">
            <li>
                <a href="{{ route('reports', ['flag' => true]) }}">
                    Reports
                </a>
            </li>
            <li>
                <a href="{{ route('stories') }}">
                    Stories
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}">
                    About Us
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    Contact Us
                </a>
            </li>
            <li>
                <a href="{{ route('faq') }}">
                    FAQ
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}">
                    Login
                </a>
            </li>
        </ul>

        <div class="copyright float-right">
            Copyright © 2019 
            <a href="https://ptcij.org/" target="_blank">PTCIJ</a>
        </div>
    </div>
</footer>