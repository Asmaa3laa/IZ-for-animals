{{-- @extends('layouts.nav-footer') --}}
@extends('layouts.index')
@section('content')
<!-- <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Clinics <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Clincs</h1>
        </div>
      </div>
    </div>
  </section> -->
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

  <section class="ftco-section bg-light">
    {{-- <div style="width:400px;">
        <form action="#" class="search-form">
          <div class="form-group">
            <span class="fa fa-search"></span>
            <input type="text" id ="search" class="form-control" placeholder="Type a keyword and hit enter" onkeyup="search(this.value)"/>
          </div>
        </form>
      </div> --}}
    <div class="container">
      <div class="row ">
          @foreach($clinics as $clinic)
        <div class="col-md-6 col-lg-4  ftco-animate">
          <div class="blog-entry ">
              {{-- align-self-stretch --}}
            <a href="{{ route('clinic.show',$clinic->id) }}" class="block-20  rounded" ><img class="mx-auto d-block" style="height:100%" 
               src="{{asset ('storage/'.$clinic->image)}}"/>
            </a>
            <div class="text p-4">
                <div class="meta mb-2">
                <div><a href="#">{{$clinic->user_name}}</a></div>
                <p>{{$clinic->address}}</p>
                <p>{{$clinic->state->name}}</p>
                <p>{{$clinic->country->name}}</p>
                <div><span class="fa fa-phone"></span>  {{$clinic->phone}}</div>
              </div>
            <h3 class="heading"><a style="color:blue;"href="{{$clinic->location}}">Clinic Location</a></h3>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{-- <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div> --}}
    </div>
  </section>
  @endsection
@push('scripts')
    <script>
        
        function search(input)
        {
            $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                });
                $.ajax
                ({
                    url:"/search",
                    method:"POST",
                    // type:'GET',
                    data:{input:input},
                    dataType: 'json',
                    success:function(data){
                        console.log("success");
                        console.log( data);
                        
                    },
                    error:function (responseJSON){
                        console.log("error");
                        console.log(responseJSON.responseText);
                    }
                })
        }
    </script>
@endpush
