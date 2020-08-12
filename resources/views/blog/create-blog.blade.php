 @extends('layouts.nav-footer')
@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    <h3>please correct your errors</h3> 
  {{-- <h4>{{$errors}}</h4> --}}
  </div>
@endif
<div class="container mt-5" >
<form  class="checkout-form " enctype="multipart/form-data" method="POST" action="{{route('blog.store')}}">
    <div class="form-group">
        {{ csrf_field() }}
        <label for="title">Blog Title</label>
        <input type="text" id ='title' name="title" class="form-control" placeholder="Title" aria-label="title" autofocus aria-describedby="basic-addon1">      </div>
        @if ($errors->first('title'))
           <h6 style="color: red;">{{$errors->first('title')}}</h6>
        @endif
        <div class="form-group">
        <label for="content">Blog</label> 
        <textarea class="form-control" name="content" id="content" rows="30" placeholder="Content..."autofocus ></textarea>
        @if ($errors->first('content'))
          <h6 style="color: red;">{{$errors->first('content')}}</h6>
        @endif
      </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedImage" name="image" required>
        <label class="custom-file-label" for="validatedCustomFile" autofocus>Choose blog image...</label>
    </div>
    @if ($errors->first('image'))
        <h6 style="color: red;"> invalid image, only jpg,png,jpeg are allowed </h6>
    @endif
    <!-- tags -->
    <div class="form-row align-items-center">
      <label for="cars">Choose blog's tags</label>
      <select id="tags" name="tags[]" class="form-control mb-2 js-example-basic-single {{ $errors->first('tag') ? 'is-invalid':''}}" autofocus multiple>
        <option value="" disabled selected>Tags</option>
        @foreach ($tags as $tag) 
          <option value="{{ $tag ->id}}" {{ old('tag') && $tag->id == old('tag') ? 'selected':'' }} >{{ $tag ->name}}</option>
        @endforeach
      </select>
    </div>
    @if($errors->first('tags'))
    <h6 style="color: red;">{{$errors->first('tags') }}</h6>
    @endif
    <button class="site-btn submit-order-btn">ADD</button>

</form>
</div>
@endsection