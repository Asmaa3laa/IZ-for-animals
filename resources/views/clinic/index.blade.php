@extends('layouts.index')
@section('content')
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;height:400px;">
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
    <div class="container">

<span class="menuitem"><a href="/" class="btn btn-default"><i class="fa fa-home"></i> Home</a></span>
<span class="menuitem"><a href="/EG" class="btn btn-default"><i class="fa fa-map-marker"></i> Cities</a></span>
<span class="menuitem"><a href="/countries" class="btn btn-default"><i class="fa fa-globe"></i> Countries</a></span>

        <form action="#" class="search-form">
          <div class="form-group">
            <span class="fa fa-search btn" id="search"></span>
            <input type="text" id ="searcharea" class="form-control" placeholder="Type a city or country and hit enter"/>
          </div>
        </form> 
        <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         choose...
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
      <div class="row mt-5">
          @foreach($clinics as $clinic)
        <div class="col-md-6 col-lg-4  ftco-animate">
          <div class="blog-entry">
              {{-- align-self-stretch --}}
            <a href="{{ route('clinic.show',$clinic->id) }}" class="block-20  rounded" ><img class="mx-auto d-block mt-3" style="height:100%" 
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
  {{-- </section> --}}
  @endsection
