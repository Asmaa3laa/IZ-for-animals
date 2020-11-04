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

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
            <p>
            <img style="height:500px;width:700px" src="{{asset ('storage/'.$blog->image) }}" alt="" class="img-fluid">
          </p>
          <div class="text p-4">
            <div class="meta mb-2">
            <div>{{$blog->created_at}}</div>
            <div><a href="#">{{$blog->user->user_name}}</a></div>
            {{-- <div class="meta-chat"><span class="fa fa-comment"></span> 3</div> --}}
          </div>
          <h3 class="heading">{{$blog->title}}</h3>
        </div>        
        <div>
        {!! html_entity_decode($blog->content) !!}
        </div>
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
          {{-- <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="fa fa-search"></span>
                <input type="text" id ="search" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div> --}}
          <div class="sidebar-box ftco-animate">
            <h3>Recent Blogs</h3>
            @foreach($latest_blogs as $latest_blog)
            <div class="block-21 mb-4 d-flex">
            <a href="{{route('blog.show',$latest_blog)}}"><img class="blog-img mr-4"src="{{asset ('storage/'.$latest_blog->image) }}"/></a>
              <div class="text">
              <h3 class="heading"><a href="{{route('blog.show',$latest_blog)}}">{{$latest_blog->title}}</a></h3>
                <div class="meta">
                  <div><span class="icon-calendar"></span>{{$latest_blog->created_at}}</div>
                  <div><span class="icon-person"></span>{{$latest_blog->user->user_name}}</div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Tag Cloud</h3>
            <div class="tagcloud">
              @forelse($tags as $tag)  
            <a href="{{route('blogtag.show',$tag->id)}}" class="tag-cloud-link">{{$tag->name}}</a>
             @empty 
            @endforelse
            </div>
          </div>
        </div>

      </div>
    </div>
  </section> <!-- .section -->



@endsection
{{-- @push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="{{ asset('js/search.js') }}"></script>

@endpush --}}