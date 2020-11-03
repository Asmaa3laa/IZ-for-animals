@extends('layouts.index')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

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
    <form action="{{route('search')}}" method="Get"  class="search-form" style="width:35%; margin-top:80px;">
          {{ csrf_field() }}
          <div class="form-group" >
            <span class="fa fa-search btn submit" id="search"></span>
            <input type="text" name="searcharea" id ="searcharea" class="form-control" placeholder="Type a clinic name and hit enter"/>
          <div id="clinicList" style="display: flex;">
          </div> 
          </div>
        </form>  
      <br/>
  <span class="menuitem"><a href="/" class="btn btn-default"><i class="fa fa-home"></i> Home</a></span>
  <span class="menuitem"><a href="/clinic" class="btn btn-default"><i class="fa fa-globe"></i> Clinics</a></span>
  {{-- <span class="menuitem"><a href="/countries" class="btn btn-default"><i class="fa fa-globe"></i> Countries</a></span> --}} 
  
  

        <div class="row">
          <div class="col-6">
            <small for="country_id" class="col-md-5">{{ __('Country') }}</small>
            {!! Form::select('country_id',$countries, null , ['class'=>'form-control','id'=>'country', 'required', 'placeholder' => 'Search by country..']) !!}
          </div>
          {{-- Clinic state ----------------------}}
          <div class="col-6">
            <small for="state_id" class="col-md-5">{{ __('State') }}</small>
            <select name="state_id" id="state" class="form-control" required>
              <option disabled selected>Select a country please..</option>
            </select>
          </div>
        </div>
        {{-- <div class="table-responsive"> --}}
      {{-- <table class="table table-striped table-bordered">
       <thead>
        <tr>
         choose...
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table> --}}
     {{-- </div> --}}
      <div class="row mt-5" id="search_data">
        @foreach($clinics as $clinic)
        <div class="col-md-6 col-lg-4  ftco-animate">
          <div class="blog-entry">
              {{-- align-self-stretch --}}
            <a href="{{ route('clinic.show',$clinic->id) }}" class="block-20  rounded" ><img class="mx-auto d-block mt-3" style="height:100%" 
              src="{{asset ('storage/'.$clinic->image)}}"/>
            </a>
            <div class="text p-4">
                <div class="meta mb-2">
                <div><a class="h6" href="{{ route('clinic.show',$clinic->id) }}">{{$clinic->user_name}}</a></div>
                <p>{{$clinic->address}}</p>
                <p>{{$clinic->state->name}}</p>
                <p>{{$clinic->country->name}}</p>
                <div><span class="fa fa-phone"></span>  {{$clinic->phone}}</div>
              </div>
              <a class="btn-link" href="{{$clinic->location}}"><i class="fa fa-map-marker"></i> Location</a></h6>
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
<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/countryStates.js')}}"></script>
<script>
  $("#state").change(function() {
    option = $(this)
        .children("option:selected")
        .val();
    // console.log(option);
    $.ajax({
        url: "/search-state",
        type: "POST",
        data: {
            _token: $("#csrf-token")[0].content,
            option: option,
        },
        success: function(data) {
            console.log(data);
            $("#search_data").html(data);
        },
        error: function() {
          console.log(option);
          console.log("failed");
        }
    });
});
</script>
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
