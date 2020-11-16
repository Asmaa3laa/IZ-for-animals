@extends('layouts.index')
@section('title')
| Blogs
@endsection
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
      <div class="row d-flex">
  @forelse($blogs as $blog)  
        <div class="col-md-6 col-lg-4 ftco-animate">
          <div class="blog-entry ">
            <a href="{{ route('blog.show',$blog->id) }}" class="block-20 rounded" ><img style="max-width:100%"src="{{asset ('storage/'.$blog->image)}}"/>
            </a>
            <div class="text p-4">
                <div class="meta mb-2">
                <div>{{$blog->created_at}}</div>
                <div><a href="#">{{$blog->user->user_name}}</a></div>
                {{-- <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div> --}}
              </div>
              <h3 class="heading"><a href="{{ route('blog.show',$blog->id) }}">{{$blog->title}}</a></h3>
              <p class="content">{{\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($blog->content)),100, $end='...') }}</p>       
            </div>
            <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-info" style="background-color: #052958;" role="button">Read More</a>   
          </div>
        </div>
      @empty
      <h3 class=" mt-5"style="text-align:center;color: #052958;font-weight:bold;">No Blogs Yet</h3>
  @endforelse
        </div>
    </div>
    {{ $blogs->links() }}
     </section>
    <hr style="text-align:center; border:2px #052958 dashed;">   
    <section>
      <h4 style="color:#031a38; text-align:center;margin-top:7px;font-weight:400;">Choose From The Main Titles</h4>
      {{-- <div class="mt-5 mb-5 ml-5" style="display:flex;justify-content: center; align-content:center;">
        @foreach($tags as $tag)
      <a href="{{route('blogtag.show',$tag->id)}}"><button class="btn" style="flex-grow:1;color:#031a38;font-size: 20px;font-family:Helvetica;">{{$tag->name}}</button></a>
        @endforeach --}}
        <div class="tagcloud"style="margin-bottom:20px;text-align: center;">
          @foreach($tags as $tag)  
        <a href="{{route('blogtag.show',$tag->id)}}" class="tag-cloud-link">{{$tag->name}}</a>
        @endforeach
        </div>
      </div>
    </section>
  @endsection
