@extends('layouts.admin')
@section('admintitle')
| Blogs
@endsection
<style>
    img {
        display: block;
        max-width:230px;
        max-height:95px;
        width: auto;
        height: auto;
        
      }
      </style> 
@section('content')
<div class="container">
  @if(session('reject'))
    <div class="alert alert-success disapled" role="alert">
      <p>{{Session::get('reject')}} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </div>     
  @endif
  @if(session('failed'))
    <div class="alert alert-warning disapled" role="alert">
      <p>{{Session::get('failed')}} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </div>     
  @endif
<!-- TABLE: LATEST ORDERS -->
<div class="card ">
    <div class="card-header border-transparent">
      
        @if($blogs->count() >= '1')
           {{-- @if(($blogs->first()->is_verified) == '1')
          <h3 class="card-title">Accepted Blogs</h3>
          @else 
          <h3 class="card-title">Pending Blogs</h3>
          @endif  --}}
          <div id="details"></div>
          <div id="index">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="card-body p-0">
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <tbody>
                  @foreach ($blogs as $blog)
              <tr id="{{$blog->id}}">
                <td>
                  <div>
                    <h3 style="color: #052958;">{{$blog->title}}</h3>
                    <img src="{{asset('storage/'.$blog->image)}}" style="width:200px;height:200px;"/>
                    <p class="content">{{\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($blog->content)),100, $end='...') }}</p>       
                    <p style="color: #052958;">{{$blog->user->name}}</p>
                    <p  style="color: #eaee0a;">{{$blog->created_at}}</p>
                  </div>
                </td>
                <td>
                  <button id="preview" data-id="{{$blog->id}}" class="btn btn-info" onclick="preview(this)" style="background-color: #052958;">
                    <span class="fa fa-pencil-square-o">Preview</span>
                  </button>
                </td> 
              </tr>
              @endforeach
                </tbody>
              </table> 
          </div>
          </div>
        </div>
      </div>
        @else
          <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
            There are no blogs.
          </div>
        @endif
        {{ $blogs->links() }}
    </div>
        <!-- /.card -->
    </div>
  </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
function preview(param)
{
  // $("#preview").click(function(event) 
  // {
    event.preventDefault();
    console.log("preview");
      var blogId = $(param).attr('data-id');
      console.log(blogId);
      $.ajaxSetup({
			headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		  });
      // $.ajax
      // ({
      //     method: 'GET',
      //     url: 'http://localhost:8000/item/' +blogId,
      //     data: {'blogId': blogId}    
      // });
      $("#index").hide();
      $.get('/item/'+blogId, function(response){
        console.log(response);
    $('#details').html(response);
    });
    
};
// });

function accept(param){
  let for_doctor = $("input[type=checkbox]").is(":checked");
  let blogId = $(param).attr('data-id');
  let selectedTags = $("option:selected").map(function(){ return this.value }).get();
  console.log($("option:selected").map(function(){ return this.value }).get());
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });   
      $.ajax
      ({
          method: 'GET',
          url: '/blog/accept',
          data: {'blogId': blogId,'for_doctor': for_doctor, 'selected_tags': selectedTags},   
          success:function(response){
            console.log(response);
            $('#details').hide();
            $('#index').show();
            $('#'+blogId).hide();
          },
          error:function(xhr){
				  console.log("error");
          console.log(xhr);
			    }, 
      });
};
</script>
