     <!-- Footer section start -->
     <footer class="footer">
        <div class="container">
            <div class="row"> 
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">All About Animals</h2>
                    <p>@lang('trans.footer_statement')</p>
                    <ul class="ftco-footer-social p-0">
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
          <li class="ftco-animate"><a href="https://www.facebook.com/groups/2875962215993069/" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
        </ul>
                </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
            <h2 class="footer-heading">@lang('trans.latest_blog')</h2>
            <?php                 
              $latest_blogs = \App\Blog::where('is_verified','=',1)->orderBy('created_at', 'desc')->take(2)->get();
            ?>  
          @foreach($latest_blogs as $blog)
            <div class="block-21 mb-4 d-flex"> 
          
              <a href="{{ route('blog.show',$blog->id) }}"><img class="img mr-4 rounded" src="{{asset ('storage/'.$blog->image)}}"/></a>
          <div class="text">
            <h3 class="heading"><a href="{{ route('blog.show',$blog->id) }}">{{$blog->title}}</a></h3>
            <div class="meta">
              <div><span class="icon-calendar"></span> {{$blog->created_at}}</div>
              <div><span class="icon-person"></span>{{$blog->user->user_name}}</div>
            </div>
          </div>
        </div>      
        @endforeach
                </div>
                <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                    <h2 class="footer-heading">@lang('trans.quick_link')</h2>
                    <ul class="list-unstyled">
                      <li><a href="{{route('index')}}" class="py-2 d-block">@lang('trans.home.home')</a></li>
                      <li><a href="{{route('about')}}" class="py-2 d-block">@lang('trans.about.about')</a></li>
                      <li><a href="{{route('clinic.index')}}" class="py-2 d-block">@lang('trans.clinics')</a></li>
                      <li><a href="{{route('blog.index')}}" class="py-2 d-block">@lang('trans.blogs.blogs')</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">@lang('trans.question')</h2>
                    <div class="block-23 mb-3">
          <ul>
            {{-- <li><span class="icon fa fa-map"></span><span class="text"></span></li> --}}
            <li><a href="tel:+96 656 6731 357"><span class="icon fa fa-phone"></span>
              <span class="text"> +96 656 6731 357</span></a></li>
            <li><a href="mailto:Support@allaboutanimals-eg.com"><span class="icon fa fa-paper-plane"></span><span class="text">Support@allaboutanimals-eg.com</span></a></li>
          </ul>
        </div>
      </div>
      </div>
        </div>
    </footer>
    <!--Footer section end--> 
   @include('layouts.jsScripts')
          
        </body>
  </html>