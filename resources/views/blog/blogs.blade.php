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
  @forelse($blogs as $blog)  
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20 rounded" style="background-image: {{ asset('storage/'.$blog->image)}}">
            </a>
            <div class="text p-4">
                <div class="meta mb-2">
                <div>{{$blog->created_at}}</div>
                <div><a href="#">{{$blog->user->user_name}}</a></div>
                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
              <pre class="content">{{\Illuminate\Support\Str::limit($blog->content,20, $end='...') }}</pre>       
            </div>
          </div>
        </div>
      </div>  
      @empty
      <h3>No Blogs Yet</h3>
  @endforelse
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
  </section>

  @endsection
