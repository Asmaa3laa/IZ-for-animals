@extends('layouts.index')
@section('content')

 
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                /* font-family: 'Nunito', sans-serif; */
                /* font-weight: 200; */
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
@if(Session::has('alert-success'))
<div class="flash-message">
   <p class="alert alert-success">{{ Session::get('alert-success') }} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
</div>
@endif
      
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;height:400px;">
            <div class="carousel-inner" style="height:100%;width:100%;">
              <div class="carousel-item active"style="height:100%;width:100%;">
                <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/main.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <p class="centered h2" style="background: rgba(255, 255, 255, 0.5);color:navy;font-weight:bold;">@lang('trans.home.first_slide_sentance')</p>
                </div>
              </div>
              <div class="carousel-item" style="height:100%;width:100%;">
                <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/bg_1.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <p class="centered h2"style="background: rgba(255, 255, 255, 0.5);color:navy;font-weight:bold;">@lang('trans.home.second_slide_sentance')</p>
                </div>
              </div>
            </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">@lang('trans.previous')</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">@lang('trans.next')</span>
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
                      <h3 class="heading">@lang('trans.users.create_clinic')</h3>
                      <p>@lang('trans.home.card1')</p>
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
                      <h3 class="heading">@lang('trans.nearest_clinics')</h3>
                      <p>@lang('trans.home.card2')</p>
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
                      <h3 class="heading">@lang('trans.diagnose_of_illness')</h3>
                      <p>@lang('trans.home.card3')</p>
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
                      <div class="col-md-5 heading-section pt-md-5 img img-video align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mt-5 mb-sm-0">
                        <img style="max-width:100%;height:100%;"src="{{url('images/image_why.jpg')}}"/>
                      </div>
                      <div class="col-md-7 pl-md-5 py-md-5">
                          <div class="heading-section pt-md-5">
                      <h2 class="mb-4">@lang('trans.home.why_choose_us')</h2>
                          </div>
                          <div class="row ml-0" >
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lightbulb-o"></span></div>
                                  <div class="text pl-3">
                                      <h4>@lang('trans.home.vision')</h4>
                                      <p>@lang('trans.home.vission_statment')</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-mission-1"></span></div>
                                  <div class="text pl-3">
                                      <h4>@lang('trans.home.mission')</h4>
                                      <p>@lang('trans.home.mission_statment')</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-value"></span></div>
                                  <div class="text pl-3">
                                      <h4>@lang('trans.home.values')</h4>
                                      <p>@lang('trans.home.values_statment')</p>
                                  </div>
                              </div>
                              <div class="col-md-6 services-2 w-100 d-flex">
                                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                  <div class="text pl-3">
                                      <h4>@lang('trans.home.commitments')</h4>
                                      <p>@lang('trans.home.commitments_statment')</p>
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
                  <section class="col-lg-6 order-md-last">
                    <form action="{{route('search')}}" method="Get"  class="search-form" style="width:100%; margin-top:0px;">
                      {{ csrf_field() }}
                      <div class="form-group" >
                        <span class="fa fa-search btn submit" id="search"></span>
                        <input type="text" name="searcharea" id ="searcharea" class="form-control" placeholder="@lang('trans.home.search-placeholder')"/>
                      <div id="clinicList" style="display: flex;">
                      </div> 
                      </div>
                    </form> 
                    <div>
                        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/videoimg.jpg);">
                            {{-- <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                                <span class="fa fa-play"></span>
                            </a> --}}
                        </div>
                    </div>
                  </section>
    
                    <div class="col-lg-6 mx-md-0 mx-auto">
                        <div class="heading-section mb-5 mt-5 mt-lg-0">
                        <h1 class="mb-3" style="font-weight:bold;color:navy;font-family:inherit;">@lang('trans.home.topics')</h1>
                        </div>
                        <div id="accordion" class="myaccordion w-100 row" aria-multiselectable="true">
                              <div class="card">
                                <div class="card-header p-0" id="headingOne">
                                  <h2 class="mb-0">
                                  <a href="{{route('blogtag.show',1)}}"><button class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image: linear-gradient(to right, #2BC0E4 0%, #ecf17a 51%, #2BC0E4 100%)">
                                        <p class="mb-0"style="font-weight: bold">@lang('trans.home.pet_animals')</p>
                                    </button></a>
                                    <a href="{{route('blogtag.show',2)}}">
                                      <button  class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image: linear-gradient(to right, #F7BB97 0%, #DD5E89 51%, #F7BB97 100%)">
                                      <p class="mb-0"style="font-weight: bold">@lang('trans.home.poultry')</p>
                                  </button>
                                    </a>
                                </h2>
                                  <a href="{{route('blogtag.show',3)}}">
                                  <button class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image:linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)">
                                    <p class="mb-0" style="font-weight: bold">@lang('trans.home.large_animals')</p>
                                </button>
                                  </a>
                                  <a href="{{route('blogtag.show',4)}}">
                                  <button class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link " data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne"style="background-image: linear-gradient(to right, #DD5E89 0%, #F7BB97 51%, #DD5E89 100%)">
                                  <p class="mb-0"style="font-weight: bold">@lang('trans.home.equines')</p>
                                  </button>
                                </a>
                                <a href="{{route('blogtag.show',5)}}">
                                  <button class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" style="background-image: linear-gradient(to right, #7474BF 0%, #348AC7 51%, #7474BF 100%)">
                                    <p class="mb-0"style="font-weight: bold">@lang('trans.home.wild_animals')</p>
                                </button>
                                </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </section>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script>
          $(document).ready(function(){
           $('#searcharea').keyup(function(){ 
              
                  var query = $(this).val();
                  if(query != '')
                  {
                   var _token = $('input[name="_token"]').val();
                   $.ajax({
                    url:"/clinic/fetch",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                     $('#clinicList').fadeIn();  
                     $('#clinicList').html(data);
                    }
                   });
                  }
              });
          
              $(document).on('click', 'li', function(){  
                  $('#searcharea').val($(this).text());  
                  $('#clinicList').fadeOut();  
              });  
          
          });
          </script>
@endsection