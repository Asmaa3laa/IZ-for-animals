@extends('layouts.index')
@section('title')
| {{$tag->name}}
@endsection
@section('content')    
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;height:400px;">
  <div class="carousel-inner" style="height:100%;width:100%;">
    <div class="carousel-item active"style="height:100%;width:100%;">
      <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/main.jpg')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="centered" style="color:navy;font-weight:bold;background: rgba(255, 255, 255, 0.75);">@lang('trans.home.first_slide_sentance')</h2>
      </div>
    </div>
    <div class="carousel-item" style="height:100%;width:100%;">
      <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/bg_1.jpg')}}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="centered"style="background: rgba(255, 255, 255, 0.75);color:navy;font-weight:bold;">@lang('trans.home.second_slide_sentance')</h2>
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
         <h1 class=" mt-5"style="text-align:center;color: #052958;font-weight:bold;">{{$tag->name}}</h1>
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row d-flex">
  @forelse($tag_blogs as $tag_blog)  
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="{{ route('blog.show',$tag_blog->blog) }}" class="block-20 rounded" ><img  style="max-width:100%" src="{{asset ('storage/'.$tag_blog->blog->image)}}"/>
            </a>
            <div class="text p-4">
                <div class="meta mb-2">
                <div>{{$tag_blog->blog->created_at}}</div>
                <a href="{{route('clinic.show',$tag_blog->blog->user)}}"><div class="icon-person" style="color:#052958;">{{$tag_blog->blog->user->user_name}}</div></a>
                {{-- <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div> --}}
              </div>
              <h3 class="heading"><a href="{{ route('blog.show',$tag_blog->blog->id) }}">{{$tag_blog->blog->title}}</a></h3>
              <p class="content">{{\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($tag_blog->blog->content)),100, $end='...') }}</p>       
            </div>
            <a href="{{ route('blog.show',$tag_blog->blog->id) }}" class="btn btn-info" style="background-color: #052958;" role="button">@lang('trans.read_more')</a>   
          </div>
        </div>
      @empty
      <h3 class="mt-5"style="text-align:center;color: #052958;font-weight:bold;">@lang('trans.blogs.no_blogs_yet')</h3>
  @endforelse
        </div>
    </div>
     </section>
  @endsection