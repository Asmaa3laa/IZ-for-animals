<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="ftco-animate">
            <p>
            <img style="height:500px;width:700px" src="{{asset ('storage/'.$blog->image) }}" alt="" class="img-fluid">
          </p>
          <div class="text p-4">
            <div class="meta mb-2">
            <div>{{$blog->created_at}}</div>
            <div><a href="#">{{$blog->user->user_name}}</a></div>
          </div>
          <h3 class="heading">{{$blog->title}}</h3>
        </div>        
        <textarea style="border:none;background-color:rgb(252, 246, 246)"rows="18" cols="88" class="content">{{strip_tags($blog->content)}}</textarea>
        </div> <!-- .col-md-8 -->
      </div>
      <button id="accept" data-id="{{$blog->id}}" class="btn btn-block btn-success" style="justify-content: center;" onclick="accept(this)">
        <span class="fa fa-pencil-square-o">Accept</span>
      </button>
      <button id="accept" data-id="{{$blog->id}}" class="btn btn-block btn-Danger" onclick="deny(this)">
        <span class="fa fa-pencil-square-o">Deny</span>
      </button>
    </div>
  </section> <!-- .section -->