@extends('layouts.nav-footer')

@section('content')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ url('login-role') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> --}}
        <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
              <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-11 ftco-animate text-center">
                    <h1 class="mb-4">Highest Quality Care For Pets You'll Love </h1>
                  <p><a href="#" class="btn btn-primary mr-md-4 py-3 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
      
          <section class="ftco-section bg-light ftco-no-pt ftco-intro">
              <div class="container">
                  <div class="row">
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                  <div class="d-block services active text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                          <span class="flaticon-blind"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">Dog Walking</h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                      <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                  </div>      
                </div>
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                  <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                          <span class="flaticon-dog-eating"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">Pet Daycare</h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                      <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                  </div>    
                </div>
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                  <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                          <span class="flaticon-grooming"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">Pet Grooming</h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right.</p>
                      <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                  </div>      
                </div>
              </div>
              </div>
          </section>
      
          <section class="ftco-section ftco-no-pt ftco-no-pb">
              <div class="container">
                  <div class="row d-flex no-gutters">
                      <div class="col-md-5 d-flex">
                          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
                          </div>
                      </div>
                      <div class="col-md-7 pl-md-5 py-md-5">
                          <div class="heading-section pt-md-5">
                      <h2 class="mb-4">Why Choose Us?</h2>
                          </div>
                          <div class="row">
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
                                  <div class="text pl-3">
                                      <h4>Care Advices</h4>
                                      <p>Far far away, behind the word mountains, far from the countries.</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
                                  <div class="text pl-3">
                                      <h4>Customer Supports</h4>
                                      <p>Far far away, behind the word mountains, far from the countries.</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
                                  <div class="text pl-3">
                                      <h4>Emergency Services</h4>
                                      <p>Far far away, behind the word mountains, far from the countries.</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
                                  <div class="text pl-3">
                                      <h4>Veterinary Help</h4>
                                      <p>Far far away, behind the word mountains, far from the countries.</p>
                                  </div>
                              </div>
                          </div>
                  </div>
              </div>
              </div>
          </section>
          <section class="ftco-section bg-light ftco-faqs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-md-last">
                        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">
                            <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                                <span class="fa fa-play"></span>
                            </a>
                        </div>
                    </div>
    
                    <div class="col-lg-6">
                        <div class="heading-section mb-5 mt-5 mt-lg-0">
                        <h2 class="mb-3">Frequently Asks Questions</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                        <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
                              <div class="card">
                                <div class="card-header p-0" id="headingOne">
                                  <h2 class="mb-0">
                                    <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                        <p class="mb-0">How to train your pet dog?</p>
                                      <i class="fa" aria-hidden="true"></i>
                                    </button>
                                  </h2>
                                </div>
                                <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="card-body py-3 px-0">
                                      <ol>
                                          <li>Far far away, behind the word mountains</li>
                                          <li>Consonantia, there live the blind texts</li>
                                          <li>When she reached the first hills of the Italic Mountains</li>
                                          <li>Bookmarksgrove, the headline of Alphabet Village</li>
                                          <li>Separated they live in Bookmarksgrove right</li>
                                      </ol>
                                  </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </section>
    
@endsection
