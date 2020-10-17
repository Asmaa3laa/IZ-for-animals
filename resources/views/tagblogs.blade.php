{{-- @extends('layouts.nav-footer') --}}
@extends('layouts.index')
@section('content')    
{{-- <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-5 ftco-animate pb-5">
        </div>
      </div>
    </div>
  </section>      --}}
        @if($tag_blogs->first())
         <h1 class=" mt-5"style="text-align:center;color: #052958;font-weight:bold;">{{$tag_blogs->first()->tag->name}}</h1>
        @endif
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row d-flex">
  @forelse($tag_blogs as $tag_blog)  
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="{{ route('blog.show',$tag_blog->blog) }}" class="block-20 rounded" ><img src="{{asset ('storage/'.$tag_blog->blog->image)}}"/>
            </a>
            <div class="text p-4">
                <div class="meta mb-2">
                <div>{{$tag_blog->blog->created_at}}</div>
                <div>{{$tag_blog->blog->user->user_name}}</div>
                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="{{ route('blog.show',$tag_blog->blog->id) }}">{{$tag_blog->blog->title}}</a></h3>
              <p class="content">{{\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($tag_blog->blog->content)),100, $end='...') }}</p>       
            </div>
            <a href="{{ route('blog.show',$tag_blog->blog->id) }}" class="btn btn-info" style="background-color: #052958;" role="button">Read More</a>   
          </div>
        </div>
      @empty
      <h3 class="mt-5"style="text-align:center;color: #052958;font-weight:bold;">No Blogs Yet</h3>
  @endforelse
        </div>
    </div>
     </section>
  @endsection