@extends('layouts.index')
@section('content')
<section class="container">
  @if(session('update'))
    <div class="alert alert-success disapled" role="alert">
      <p>{{Session::get('update')}} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </div>     
  @endif
  @if(session('failed'))
    <div class="alert alert-danger disapled" role="alert">
      <p>{{Session::get('failed')}} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </div>     
  @endif
<div class="card card-primary card-outline">
  
    <div class="card-body box-profile">
      <div class="text-center">
        @if(Auth::user()->image)
        <img class="vcard bio img-fluid rounded-circle" style="width: 200px;height: 200px"
          src="{{asset('storage/'.$user->image)}}"
          alt="profile picture">
          @else
          <img  class="vcard bio img-fluid rounded-circle" style="width: 200px;height: 200px"
           src="/images/doctor avatar.jpg" alt="profile picture"> 
          @endif
      </div>

      <h3 class="profile-username text-center">{{$user->user_name}}</h3>
      <p class="text-muted text-center">{{$user->role}}</p>
      <!-- TAAAAAAAAAAAABS -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active h6" style="color: black" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h6" style="color: black" id="update-tab" data-toggle="tab" href="#update" role="tab" aria-controls="update" aria-selected="false">Update Profile</a>
        </li>
        @if ($user->role == 'clinic')
        <li class="nav-item">
          <a class="nav-link h6" style="color: black" id="blog-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="false">Clinic's Blogs</a>
        </li>
        @endif
      </ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade {{$errors->all() ? '' : 'show active'}}" id="main" role="tabpanel" aria-labelledby="main-tab">
  <div class="row">
      <div class="{{$user->role == 'clinic' ? 'col-6' : 'offset-2 col-8'}} card card-info">
        <div class="card-body ">
          <b> <i class="fa fa-user mr-1"></i>DR. Name</b>
            <h6>{{$user->name}}</h6>
            <hr>
          <b><i class="fa fa-envelope mr-1"></i>Email</b>
          <h6>{{$user->email}}</h6>
          <hr>
          @if(Auth::user()->card)
          <b><i class="fa fa-credit-card mr-1"></i> Card</b> 
          <div class="ftco-animate">
            <div class="work mb-4 img align-items-end" style="background-image: url({{asset('storage/'.$user->card)}});">
              <a href="{{asset('storage/'.$user->card)}}" class="icon image-popup d-flex justify-content-center align-items-center">
                <span class="fa fa-expand"></span>
              </a>
              <div class="desc w-100 px-4">
                <div class="text w-100 mb-3">
                  <span>Doctor</span>
                  <h2>ID Card</h2>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>  
      </div>

  @if ($user->role == 'clinic')

  <div class="col-6 card card-info">
    <div class="card-body">
      <b><i class="fa fa-address-card mr-1"></i> Address</b>
      <h6>
          {{$user->country->name}}- {{$user->state->name}}- {{$user->address}}
      </h6>
      <hr>
      <b><i class="fa fa-map-marker mr-1"></i> Location</b>
      <h6>
        <a class="btn btn-link" href="{{$user->location}}">show map</a>
      </h6>
      <hr>
      <b><i class="fa fa-phone mr-1"></i> Phone</b>
      <h6>{{$user->phone}}</h6>
    </div>
  </div>     
  @endif
</div>
</div>
  <!-- tab 2 -->
  <div class="tab-pane fade {{$errors->all() ? 'show active' : ''}}" id="update" role="tabpanel" aria-labelledby="update-tab">
      @include('users.edit') 
  </div>
  <!-- tab 3 -->
  <div class="tab-pane fade" id="blog" role="tabpanel" aria-labelledby="blog-tab">
      <div class="container mt-5">
            <div class="row d-flex">
                @forelse($blogs as $blog)  
              <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="blog-entry">
                  <a href="{{ route('blog.show',$blog->id) }}" class="block-20 rounded" ><img src="{{asset ('storage/'.$blog->image)}}"/>
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
                  <div class="btn btn-block">
                    <div style="text-align: justify">
                    <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-info" style="background-color: #052958;" role="button">Read More</a> 
                    @can('create.blogs')
                    <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-warning" role="button">
                      <span class="fa fa-pencil-square-o" style="color: white;">EDIT</span>
                    </a>
                    <form action="{{route('blog.destroy',['blog'=>$blog])}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                    @endcan 
                  </div> 
                 </div>
                  {{-- <a href="{{ route('blog.destroy',$blog->id) }}" class="btn btn-danger" role="button">Delete</a>   --}}
                </div>
              </div>
              @empty
            <h3 class=" mt-5"style="text-align:center;color: #052958;font-weight:bold;">No Blogs Yet</h3>
              @endforelse
              @can('create.blogs')
                <button onclick="location.href = '{{route('blog.create')}}';" id="myButton" class="btn-block submit-button"style="border-radius: 12px;cursor:pointer ;background-color:#092a58;height:50px;border:none;color: #eaee0a;">Create New Blog</button>               
              @endcan 
      </div>
  </div>
</div>
</div>
</section>
@endsection
