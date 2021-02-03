@extends('layouts.admin')
@section('admintitle')
| @lang('trans.create_blog')  
@endsection
@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    <h3>please correct your errors</h3> 
  </div>
@endif
<div class="container mt-5">
<form  class="checkout-form " enctype="multipart/form-data" method="POST" action="{{route('blog.store')}}">
    <div class="form-group">
        {{ csrf_field() }}
        <label for="title">@lang('trans.blogs.blog_title')</label>
        <input type="text" id ='title' name="title" class="form-control" placeholder="@lang('trans.title')" aria-label="title" autofocus aria-describedby="basic-addon1">      </div>
        @if ($errors->first('title'))
           <h6 style="color: red;">{{$errors->first('title')}}</h6>
        @endif
        <div class="form-group">
        <label for="content">@lang('trans.blogs.blog')</label> 
        <textarea class="form-control" name="content" id="content" rows="30" placeholder="@lang('trans.content')..."autofocus ></textarea>
        @if ($errors->first('content'))
          <h6 style="color: red;">{{$errors->first('content')}}</h6>
        @endif
      </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedImage" name="image" required>
        <label class="custom-file-label" id="image"for="validatedCustomFile" autofocus>@lang('trans.blogs.choose_blog_image')</label>
    </div>
    @if ($errors->first('image'))
        <h6 style="color: red;"> @lang('trans.image_error')</h6>
    @endif
    <!-- tags -->
    <div class="form-row align-items-center">
      <label for="cars">@lang('trans.blogs.choose_blog_tag')</label>
      <select id="tags" name="tags[]" class="form-control mb-2 js-example-basic-single {{ $errors->first('tag') ? 'is-invalid':''}}" autofocus multiple>
        <option value="" disabled selected>@lang('trans.tags.tag')</option>
        @foreach ($tags as $tag) 
          <option value="{{ $tag ->id}}" {{ old('tag') && $tag->id == old('tag') ? 'selected':'' }} >{{ $tag->name}}</option>
        @endforeach
      </select>
    </div>
    @if($errors->first('tags'))
    <h6 style="color: red;">{{$errors->first('tags') }}</h6>
    @endif
    <button class="site-btn btn-success submit-order-btn btn-block mb-5">@lang('trans.add')</button>

</form>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            console.log(e.target.files);
            $("#image").text(fileName);
        });
    });
</script>
<script>
		$(document).ready(function() {
			$("#content").summernote({height: 200});
		});
</script> 
@endsection