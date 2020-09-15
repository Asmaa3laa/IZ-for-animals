{{-- @extends('layouts.nav-footer') --}}
@extends('layouts.index')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Clinics <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Clincs</h1>
        </div>
      </div>
    </div>
  </section>

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
