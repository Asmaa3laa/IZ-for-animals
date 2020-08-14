@extends('layouts.nav-footer')
@section('content')    
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Blog</h1>
        </div>
      </div>
    </div>
  </section>  
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row d-flex">
  @forelse($blogs as $blog)  
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="{{ route('blog.show',$blog->id) }}" class="block-20 rounded" ><img src="{{asset ('storage/'.$blog->image)}}"/>
            </a>
            <div class="text p-4">
                <div class="meta mb-2">
                <div>{{$blog->created_at}}</div>
                <div><a href="#">{{$blog->user->user_name}}</a></div>
                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="{{ route('blog.show',$blog->id) }}">{{$blog->title}}</a></h3>
              <p class="content">{{\Illuminate\Support\Str::limit($blog->content,100, $end='...') }}</p>       
            </div>
            <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-info" style="background-color: #052958;" role="button">Read More</a>   
          </div>
        </div>
      @empty
      <h3 class=" mt-5"style="text-align:center;color: #052958;font-weight:bold;">No Blogs Yet</h3>
  @endforelse
        </div>
      <div class="row mt-5">
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
      </div>
    </div>
    {{-- <button>{{ $blogs->links() }}</button> --}}
     </section>
    <hr style="height:2px;border-width:0;color:#052958;background-color:#052958;text-align:center">   
    <section>
      <h3 style="color:#031a38; text-align:center;margin-top:7px;font-weight:500;">Choose From The Main Titles</h3>
      <div class="mt-5 mb-5 ml-5" style="display:flex; flex-wrap:wrap;justify-content: center; align-content:center;">
        @foreach($tags as $tag)
      <a href="{{route('blogtag.show',$tag->id)}}"style="flex-grow:1;color:#031a38;font-size: 20px;font-family:Helvetica;">{{$tag->name}}</a>
        @endforeach
      </div>
    </section>
  @endsection
