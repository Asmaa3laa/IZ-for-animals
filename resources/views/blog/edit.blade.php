@extends(($blog->user->role == 'clinic')? 'layouts.index': ((Auth::user()->role == 'admin') ? 'layouts.admin' : (Auth::user()->role == 'blogs_admin' ? 'layouts.admin' : 'layouts.index')));
@section('title')
| {{Auth::user()->user_name}} | @lang('trans.blog')
@endsection
@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    <h3>please correct your errors</h3> 
  </div>
@endif
<div class="container mt-5" >
<form  class="checkout-form " enctype="multipart/form-data" method="POST" action="{{route('blog.update',$blog->id)}}">
     {{ method_field('PATCH') }} 
        {{ csrf_field() }}
  <div class="form-group">
        <label for="title">@lang('trans.blogs.blog_title')</label>
        <input type="text" id ='title' name="title" class="form-control"value="{{old('title', $blog->title)}}" placeholder="Title" aria-label="title" autofocus aria-describedby="basic-addon1">      </div>
        @if ($errors->first('title'))
           <h6 style="color: red;">{{$errors->first('title')}}</h6>
        @endif
         <div class="form-group">
        <label for="content">@lang('trans.blog')</label> 
        <textarea class="form-control" name="content" id="content" cols="25" placeholder=""autofocus >{{old('content', strip_tags($blog->content))}}</textarea>
        @if ($errors->first('content'))
          <h6 style="color: red;">{{$errors->first('content')}}</h6>
        @endif
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedImage" name="image" value="{{($blog->image)}}">
        <label class="custom-file-label"id="image" for="validatedCustomFile" autofocus>@lang('trans.blogs.update_blog_image')</label>
    </div>
    <img style="height: 300px;width:300px;margin:auto;" src="{{asset ('storage/'.$blog->image)}}"/>
    @if ($errors->first('image'))
        <h6 style="color: red;">@lang('trans.blogs.image_error') </h6>
    @endif
    <!-- tags -->
    <div class="form-row align-items-center">
      <label for="cars">@lang('trans.chooe_blog_tag')</label>
      <select style="height:100px;" id="tags" name="tags[]" class="form-control mb-2 js-example-basic-single {{ $errors->first('tag') ? 'is-invalid':''}}" autofocus multiple>
        {{-- {{$Btags = $blogtags->toArray()}} --}}
        @foreach ($tags as $tag)
          @if(in_array($tag->id, $blogtags))
            <option selected value="{{$tag->id}}">{{$tag->name}}</option>
          @else
            <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endif
        @endforeach
    </select>
    </div>
    @if($errors->first('tags'))
    <h6 style="color: red;">{{$errors->first('tags') }}</h6>
    @endif
    <div class="mb-5" style="text-align:center;">
    <button class="site-btn btn-success submit-order-btn mb-5">@lang('trans.update')</button>
    </div>
</form>
      {{-- {{ $blogtags[0] }} --}}
</div>
@if(Auth::user()->role == 'admin' or Auth::user()->role == 'blogs_admin')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
  $(document).ready(function() {
    $("#content").summernote({height: 200});
  });
</script> 
@endif
@endsection