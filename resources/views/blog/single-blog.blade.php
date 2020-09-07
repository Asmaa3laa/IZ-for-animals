@extends('layouts.nav-footer')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg _2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Blog</h1>
        </div>
      </div>
    </div>
  </section>

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
        {{-- <pre style="font-family:Arial, Helvetica, sans-serif ">{{strip_tags($blog->content)}}</pre> --}}
        <textarea style="border:none;background-color:rgb(252, 246, 246)"rows="20" cols="88" class="content">{{strip_tags($blog->content)}}</textarea>

        {{-- <div class="tag-widget post-tag-container mb-5 mt-5">
            <div class="tagcloud">
              @forelse($tags as $tag)
              <a href="{{route('blogtag.show',$tag->id)}}" class="tag-cloud-link">{{$tag->name}}</a>
              @empty 
              <div></div>
              @endforelse
            </div>
          </div> --}}
          
          {{-- <div class="about-author d-flex p-4 bg-light">
            <div class="bio mr-5">
              <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
            </div>
            <div class="desc">
              <h3>George Washington</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div> --}}


          {{-- <div class="pt-5 mt-5">
            <h3 class="mb-5">6 Comments</h3>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">April 7, 2020 at 10:05pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>

                <ul class="children">
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="images/person_1.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>John Doe</h3>
                      <div class="meta">April 7, 2020 at 10:05pm</div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>


                    <ul class="children">
                      <li class="comment">
                        <div class="vcard bio">
                          <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>John Doe</h3>
                          <div class="meta">April 7, 2020 at 10:05pm</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                          <p><a href="#" class="reply">Reply</a></p>
                        </div>

                          <ul class="children">
                            <li class="comment">
                              <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                              </div>
                              <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">April 7, 2020 at 10:05pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                              </div>
                            </li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- END comment-list -->
            
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="#" class="p-5 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>

              </form>
            </div>
          </div> --}}

        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="fa fa-search"></span>
                <input type="text" id ="search" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>
          {{-- <div class="sidebar-box ftco-animate">
            <div class="categories">
              <h3>Services</h3>
              <li><a href="#">Pet Sitting <span class="fa fa-chevron-right"></span></a></li>
              <li><a href="#">Pet Daycare <span class="fa fa-chevron-right"></span></a></li>
              <li><a href="#">Pet Grooming <span class="fa fa-chevron-right"></span></a></li>
              <li><a href="#">Pet Spa <span class="fa fa-chevron-right"></span></a></li>
            </div>
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
            {{-- <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div> --}}
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Tag Cloud</h3>
            <div class="tagcloud">
              @forelse($tags as $tag)  
            <a href="{{route('blogtag.show',$tag->id)}}" class="tag-cloud-link">{{$tag->name}}</a>
             @empty 
              <div></div>
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