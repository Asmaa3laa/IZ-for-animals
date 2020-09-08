{{-- @extends('layouts.nav-footer') --}}
@extends('layouts.index')
@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    <h3>please correct your errors</h3> 
  {{-- <h4>{{$errors}}</h4> --}}
  </div>
@endif
<div class="container mt-5" >
<form  class="checkout-form " enctype="multipart/form-data" method="POST" action="{{route('blog.update',$blog->id)}}">
     {{ method_field('PATCH') }} 
        {{ csrf_field() }}
  <div class="form-group">
    @foreach ($blogtags as $blogtag)
    <h1>{{$blogtag['tag_id']}}</h1>
 @endforeach
        <label for="title">Blog Title</label>
        <input type="text" id ='title' name="title" class="form-control"value="{{old('title', $blog->title)}}" placeholder="Title" aria-label="title" autofocus aria-describedby="basic-addon1">      </div>
        @if ($errors->first('title'))
           <h6 style="color: red;">{{$errors->first('title')}}</h6>
        @endif
         <div class="form-group">
        <label for="content">Blog</label> 
        <textarea class="form-control" name="content" id="content" cols="25" placeholder="Content..."autofocus >{{old('content', strip_tags($blog->content))}}</textarea>
        @if ($errors->first('content'))
          <h6 style="color: red;">{{$errors->first('content')}}</h6>
        @endif
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedImage" name="image" value="{{($blog->image)}}">
        <label class="custom-file-label"id="image" for="validatedCustomFile" autofocus>Update Blog Image</label>
    </div>
    <img style="height: 300px;width:300px;margin:auto;" src="{{asset ('storage/'.$blog->image)}}"/>
    @if ($errors->first('image'))
        <h6 style="color: red;"> invalid image, only jpg,png and jpeg are allowed </h6>
    @endif
    <!-- tags -->
    <div class="form-row align-items-center">
      <label for="cars">Choose blog's tags</label>
      <select style="height:100px;" id="tags" name="tags[]" class="form-control mb-2 js-example-basic-single {{ $errors->first('tag') ? 'is-invalid':''}}" autofocus multiple>
        <option value="" disabled selected>Tags</option>
        @foreach ($tags as $tag) 
        @foreach ($blogtags as $blogtag)
          <option value="{{$tag->id}}" {{ old('tag_id', $blogtag['tag_id']) == $tag->id ? 'selected' : '' }}>{{ $tag->name}}</option>

     @endforeach         
        @endforeach
      </select>
    </div>
    @if($errors->first('tags'))
    <h6 style="color: red;">{{$errors->first('tags') }}</h6>
    @endif
    <button class="site-btn submit-order-btn">UPDATE</button>

</form>
</div>
@endsection