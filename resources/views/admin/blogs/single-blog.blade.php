<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="ftco-animate" style="width:100%;">
            <p>
            <img style="margin:auto;" src="{{asset ('storage/'.$blog->image) }}" alt="" class="img-fluid">
          </p>
          <div class="text p-4">
            <div class="meta mb-2">
            <div>{{$blog->created_at}}</div>
            <div><a href="#">{{$blog->user->user_name}}</a></div>
          </div>
          <h3 class="heading">{{$blog->title}}</h3>
        </div> 
        <div class= "form-group"syle="width:100%;" >      
        <textarea style="border:none;background-color:rgb(252, 246, 246)" rows="18" class="form-control content">{{strip_tags($blog->content)}}</textarea>
        </div>
        <!-- @foreach($blog_tags as $blog_tag)
        <select name="cars" id="cars" multiple>
          <option value="volvo">{{$blog_tag->tag->name}}</option>
          <option value="saab">Saab</option>
          <option value="opel">Opel</option>
          <option value="audi">Audi</option>
        </select>
         <h3></h3> 
        @endforeach -->
        {{-- <!-- <form  class="checkout-form " enctype="multipart/form-data" method="POST" action="{{route('blog.update',$blog->id)}}">
              {{ method_field('PATCH') }} 
              {{ csrf_field() }} --> --}}
            <div class="form-row align-items-center">
            <label for="tags">Choose blog's tags</label>
              <select style="height:100px;" id="tags" name="tags[]" class="form-control mb-2 js-example-basic-single {{ $errors->first('tag') ? 'is-invalid':''}}" autofocus multiple>
                @foreach ($all_tags as $tag) 
                  @foreach ($blog_tags as $blogtag)
                    <option value="{{$tag->id}}" {{ old('tag_id', $blogtag['tag_id']) == $tag->id ? 'selected' : '' }}>{{ $tag->name}}</option>
                  @endforeach         
                @endforeach
              </select>
            </div>
        @if($errors->first('tags'))
        <h6 style="color: red;">{{$errors->first('tags') }}</h6>
        @endif
        </div> <!-- .col-md-8 -->
        </div>     
        @if($blog->is_verified == 0)
        <div class="form-check"style="margin-top:20px;">
          <input type="checkbox" class="form-check-input" id="exampleCheck1"style="color:navy;">
          <label class="form-check-label" for="exampleCheck1"style="color:navy;">For Doctors</label>
        </div>
        <div style="width:50%;">
          <button id="accept" data-id="{{$blog->id}}" class="btn btn-block btn-success" style="justify-content: center;" onclick="accept(this)">
            <span class="fa fa-pencil-square-o submit-order-btn ">Accept</span>
          </button>
          <a href="{{route('blog-deny',$blog->id)}}" class="btn btn-block btn-Danger">
            <span class="fa fa-pencil-square-o">Deny</span>
          </a>
        </div>
        @endif
      </form>
    </div>
  </section> <!-- .section -->