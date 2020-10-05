{{-- @extends('layouts.nav-footer') --}}
@extends('layouts.index')
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
            /* * {box-sizing */
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
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;height:400px;">
            {{-- <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol> --}}
            <div class="carousel-inner" style="height:100%;width:100%;">
              <div class="carousel-item active"style="height:100%;width:100%;">
                <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/main.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h2 class="centered" style="color:navy;font-weight:bold;background: rgba(255, 255, 255, 0.75);">All About Animal helping veterinarians to create thier online clinic</h2>
                </div>
              </div>
              <div class="carousel-item" style="height:100%;width:100%;">
                <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/bg_1.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h2 class="centered"style="background: rgba(255, 255, 255, 0.75);color:navy;font-weight:bold;">All About Animal is your way to take better care of animal health</h2>
                </div>
              </div>
            </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>      
          <section class="ftco-section bg-light ftco-no-pt ftco-intro">
              <div class="container">
                  <div class="row">
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate mb-5"style="margin-top:100px;">
                  <div class="d-block services active text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                          <span class="flaticon-stethoscope"></span>
                    </div>
                    <div class="media-body mx-auto">
                      <h3 class="heading">Create your clinics</h3>
                      <p>We Provide assistance to the veterinarian and help him establish and market his clinic</p>
                    <a href="{{url('/register?role=clinic')}}" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                  </div>      
                </div>
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate mb-5"style="margin-top:100px;">
                  <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                          <span class="flaticon-navigation"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">Nearest Clinics</h3>
                      <p>Find the nearest clinics from you, Save your time and effort</p>
                      <a href="{{route('clinic.index')}}" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                  </div>    
                </div>
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate mb-5"style="margin-top:100px;">
                  <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                          <span class="flaticon-grooming"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">Diagnoses Of Illnesses</h3>
                      <p>Stay Tuned.....</p>
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
                          <div class="img img-video align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/image_why.jpg);">
                          </div>
                      </div>
                      <div class="col-md-7 pl-md-5 py-md-5">
                          <div class="heading-section pt-md-5">
                      <h2 class="mb-4">Why Choose Us?</h2>
                          </div>
                          <div class="row">
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lightbulb-o"></span></div>
                                  <div class="text pl-3">
                                      <h4>OUR VISION</h4>
                                      <p>Discuss topics related to animal health and facilitate access to the nearest veterinary clinic to speed up your animal rescue.</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-mission-1"></span></div>
                                  <div class="text pl-3">
                                      <h4>OUR MISSION</h4>
                                      <p>Providing assistance to the veterinarian and helping him establish and market his clinic.Helping to maintain the health of your animal from diseases and easy access to the nearest veterinarian.</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-value"></span></div>
                                  <div class="text pl-3">
                                      <h4>OUR VALUES</h4>
                                      <p>As we care about animal health in the first place, we are guided by compassion, determination and effectiveness. Based on these values and principles, we will work to provide the necessary care for your animal.</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                  <div class="text pl-3">
                                      <h4>OUR COMMITMENTS</h4>
                                      <p>We are committed to saving the largest number of animals possible by raising issues related to the general health of the animal and also by facilitating communication with the appropriate veterinarian.</p>
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
                        <h2 class="mb-3" style="font-weight:bold;color:navy;">Our Topics</h2>
                        </div>
                        <div id="accordion" class="myaccordion w-100 row" aria-multiselectable="true">
                              <div class="card">
                                <div class="card-header p-0" id="headingOne">
                                  <h2 class="mb-0">
                                  <a href="{{route('blogtag.show',1)}}"><button class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image: linear-gradient(to right, #2BC0E4 0%, #ecf17a 51%, #2BC0E4 100%)">
                                        <p class="mb-0"style="font-weight: bold">Pet Animals</p>
                                    </button></a>
                                    <a href="{{route('blogtag.show',2)}}">
                                      <button  class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image: linear-gradient(to right, #F7BB97 0%, #DD5E89 51%, #F7BB97 100%)">
                                      <p class="mb-0"style="font-weight: bold">Poultry</p>
                                  </button>
                                    </a>
                                </h2>
                                  <a href="{{route('blogtag.show',3)}}">
                                  <button class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image:linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)">
                                    <p class="mb-0" style="font-weight: bold">Larg Animals (donkey/ruminant)</p>
                                </button>
                                  </a>
                                  <a href="{{route('blogtag.show',4)}}">
                                  <button href="{{route('blogtag.show',4)}}"  class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link " data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne"style="background-image: linear-gradient(to right, #DD5E89 0%, #F7BB97 51%, #DD5E89 100%)">
                                  <p class="mb-0"style="font-weight: bold">Equines</p>
                                  </button>
                                </a>
                                <a href="{{route('blogtag.show',5)}}">
                                  <button href="{{route('blogtag.show',5)}}"class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image: linear-gradient(to right, #7474BF 0%, #348AC7 51%, #7474BF 100%)">
                                    <p class="mb-0"style="font-weight: bold">Wild Animals</p>
                                </button>
                                </a>
                                </div>
                                {{-- <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="card-body py-3 px-0">
                                      <ol>
                                          <li>Far far away, behind the word mountains</li>
                                          <li>Consonantia, there live the blind texts</li>
                                          <li>When she reached the first hills of the Italic Mountains</li>
                                          <li>Bookmarksgrove, the headline of Alphabet Village</li>
                                          <li>Separated they live in Bookmarksgrove right</li>
                                      </ol>
                                  </div>
                                </div> --}}
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </section>
@endsection