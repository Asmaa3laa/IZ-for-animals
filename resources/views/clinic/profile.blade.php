@extends('layouts.index')
@section('title')
| {{$clinic->user_name}}
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
  <section class="ftco-section bg-light">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-6 text-center mb-5">
                      <h2 class="heading-section"style="color:#092a58;font-weight:bold;">{{$clinic->user_name}}</h2>
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="wrapper">
                          <div class="row mb-5">
                              <div class="col-md-4">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-map-marker"></span>
                              </div>
                              <div class="text">
                                <h6 style="color: #eaee0a;">@lang('trans.users.adress')</h6> 
                              <p style="color:navy;">{{$clinic->address}},{{$clinic->state->name}},{{$clinic->country->name}}</p>
                            </div>
                        </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-phone"></span>
                              </div>
                              <div class="text">
                              <h6 style="color: #eaee0a;">@lang('trans.users.phone')</h6>
                              <p> <a style="color:navy;"href="tel:{{$clinic->phone}}">{{$clinic->phone}}</a></p>
                            </div>
                        </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-paper-plane"></span>
                              </div>
                              <div class="text">
                              <h6 style="color: #eaee0a;">@lang('trans.users.email')</h6> 
                              <p><a style="color:navy;" href="mailto:{{$clinic->email}}">{{$clinic->email}}</a></p>
                            </div>
                        </div>
                            </div>
                            <!-- <div class="col-md-3">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-globe"></span>
                              </div>
                              <div class="text">
                              <p  style="color: #eaee0a;">Website</p> 
                              <p><a style="color:navy;" >yoursite.com</a></p>
                            </div> -->
                        </div>
                              </div>
                          </div>
                        @can('create.blogs')
                        <button onclick="location.href = '{{route('blog.create')}}';" id="myButton" class="btn-block submit-button"style="border-radius: 12px;cursor:pointer ;background-color:#092a58;height:50px;border:none;color: #eaee0a;">@lang('trans.blogs.create_new_blog')</button>               
                        @endcan         
                        <section class="ftco-section bg-light"> 
                            <div class="container">
                                <h5  style="margin-bottom:40px;text-align:center;font-weight: bold;color: #eaee0a;">@lang('trans.blogs.clinic_blogs') <span style="color:rgb(11, 11, 59);font-weight: bold;">{{count($blogs)}}</span></h5>

                              <div class="row d-flex">
                          @forelse($blogs as $blog)  
                                <div class="col-md-4 ftco-animate">
                                  <div class="blog-entry">
                                    <a href="{{ route('blog.show',$blog->id) }}" class="block-20 rounded" ><img style="max-width:100%;"src="{{asset ('storage/'.$blog->image)}}"/>
                                    </a>
                                    <div class="text p-4">
                                        <div class="meta mb-2">
                                        <div>{{$blog->created_at}}</div>
                                        <div>{{$blog->user->user_name}}</div>
                                        {{-- <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div> --}}
                                      </div>
                                      <h3 class="heading"><a href="{{ route('blog.show',$blog->id) }}">{{$blog->title}}</a></h3>
                                      <p class="content">{{\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($blog->content)),100, $end='...') }}</p>       
                                    </div>         
                                    <div style="text-align: justify">
                                    <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-info" style="background-color: #052958;" role="button">@lang('trans.read_more')</a>   
                                    @can('create.blogs')
                                    <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-warning" role="button">
                                      <span class="fa fa-pencil-square-o" style="color: white;">@lang('trans.edit')</span>
                                    </a>
                                    <form action="{{route('blog.destroy',['blog'=>$blog])}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="btn btn-danger" type="submit">@lang('trans.delete')</button>
                                  </form>
                                    </div>
                                    @endcan  
                                </div>
                                </div>
                              @empty
                              <h3 class="mt-5"style="text-align:center;margin:auto;color: #052958;font-weight:bold;">@lang('trans.blogs.no_blogs_yet')</h3>
                          @endforelse
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>          
@endsection