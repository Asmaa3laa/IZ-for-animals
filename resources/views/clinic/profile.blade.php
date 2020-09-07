@extends('layouts.nav-footer')
@section('content')

{{-- 
  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Contact</h1>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="ftco-section bg-light">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-6 text-center mb-5">
                      <h2 class="heading-section"style="color:#092a58;font-weight:bold;">{{$clinic->name}}</h2>
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="wrapper">
                          <div class="row mb-5">
                              <div class="col-md-3">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-map-marker"></span>
                              </div>
                              <div class="text">
                                <p style="color: #eaee0a;">Address:</p> 
                              <p style="color:navy;">{{$clinic->address}},{{$clinic->state->name}},{{$clinic->country->name}}</p>
                            </div>
                        </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-phone"></span>
                              </div>
                              <div class="text">
                              <p style="color: #eaee0a;">Phone:</p>
                              <p> <a style="color:navy;"href="tel://1234567920">{{$clinic->phone}}</a></p>
                            </div>
                        </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-paper-plane"></span>
                              </div>
                              <div class="text">
                              <p  style="color: #eaee0a;">Email:</p> 
                              <p><a style="color:navy;" href="mailto:info@yoursite.com">{{$clinic->email}}</a></p>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                  <div class="dbox w-100 text-center">
                              <div class="icon d-flex align-items-center justify-content-center">
                                  <span class="fa fa-globe"></span>
                              </div>
                              <div class="text">
                              <p  style="color: #eaee0a;">Website</p> 
                              <p><a style="color:navy;" >yoursite.com</a></p>
                            </div>
                        </div>
                              </div>
                          </div>
                          {{-- <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div  class="icon d-flex align-items-center justify-content-center">
                            <span style="color:navy;" class="fa fa-cog"></span>
                        </div>
                        <div class="text">
                        <p><span  style="color: #eaee0a;">edit profile</span> <a style="color:navy;" >yoursite.com</a></p>
                      </div>
                  </div>
                        </div> --}}
                          {{-- <div class="row no-gutters">
                              <div class="col-md-7">
                                  <div class="contact-wrap w-100 p-md-5 p-4">
                                      <h3 class="mb-4">Contact Us</h3>
                                      <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="label" for="name">Full Name</label>
                                                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                  </div>
                                              </div>
                                              <div class="col-md-6"> 
                                                  <div class="form-group">
                                                      <label class="label" for="email">Email Address</label>
                                                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label class="label" for="subject">Subject</label>
                                                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label class="label" for="#">Message</label>
                                                      <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <input type="submit" value="Send Message" class="btn btn-primary">
                                                      <div class="submitting"></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div class="col-md-5 d-flex align-items-stretch">
                                  <div class="info-wrap w-100 p-5 img" style="background-image: url(images/img.jpg);">
                        </div> --}}   
                        
                        <button onclick="location.href = '{{route('blog.create')}}';" id="myButton" class="btn-block submit-button"style="border-radius: 12px;cursor:pointer ;background-color:#092a58;height:50px;border:none;color: #eaee0a;">Create New Blog</button>                        
                        <section class="ftco-section bg-light"> 
                            <div class="container">
                                <h5  style="margin-bottom:40px;text-align:center;font-weight: bold;color: #eaee0a;">Clinic Blogs <span style="color:rgb(11, 11, 59);font-weight: bold;">{{count($blogs)}}</span></h5>

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
                                      <p class="content">{{\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($blog->content)),100, $end='...') }}</p>       
                                    </div>
                                    <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-info" style="background-color: #052958;" role="button">Read More</a>   
                                    <a href="{{route('blog.edit',$blog)}}" class="btn btn-info" style="background-color: #052958;" role="button">
                                        <span class="fa fa-pencil-square-o">EDIT</span>
                                    </a>  
                                </div>
                                </div>
                              @empty
                              <h3 class=" mt-5"style="text-align:center;margin:auto;color: #052958;font-weight:bold;">No Blogs Yet</h3>
                          @endforelse
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <div id="map" class="map"></div>
          
@endsection