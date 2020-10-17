
@if($errors->any())
  <div class="alert alert-danger">
    <h3>please correct your errors</h3> 
  </div>
@endif 
<div class="container profile">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Update Your Data</h3>
          <span>
          <a href="{{route('password.request')}}">Reset Password</a>
          </span>
        </div>
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf 
        <div class="card-body">
            <div class="form-group row">
                <label for="name"  class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                <input type="text" name='name' class="form-control @error('name') is-invalid @enderror"  placeholder="Full Name" value="{{$user->name}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3"  class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" name='email' class="form-control" placeholder="Email" value="{{$user->email}}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror    
                </div>  
              </div>
            @if ($user->role == 'doctor')
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                <input type="text" name='user_name' class="form-control" placeholder="UserName" value="{{$user->user_name}}">
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>   
            @endif
            
            @if ($user->role == 'clinic')
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">Clinic Name</label>
                <div class="col-sm-10">
                <input type="text" name='user_name' class="form-control" placeholder="Clinic Name" value="{{$user->user_name}}">
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>   
            <div class="form-group row">
                <label for="user_name"  class="col-sm-2 col-form-label">Clinic Phone</label>
                <div class="col-sm-10">
                <input type="text" name='phone' class="form-control" placeholder="Your Phone" value="{{$user->phone}}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            </div>
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-10">
                {!! Form::select('country_id',$countries, $user->country_id , ['class'=>'form-control','id'=>'country', 'required']) !!}
                @error('country_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                    <select name="state_id" id="state" class="form-control">
                        @foreach ($states as $item)
                            @if ($item->id == $user->state_id)
                                <option selected value="{{$item->id}}">{{$item->name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                @error('state_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" name='address' class="form-control" placeholder="Clinic Address" value="{{$user->address}}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            @endif
             <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control-user @error('image') is-invalid @enderror" placeholder="Profile Image.."  name="image" value="{{($user->image)}}" autofocus>
                    <label class="custom-file-label" for="image">Change Profile Image</label>
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            </div> 
            <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control-user @error('card') is-invalid @enderror" placeholder="Your ID or Occupation card.." name="card" value="{{($user->card)}}" autofocus>
                    <label class="custom-file-label" for="card">Change Your ID image</label>
                    @error('card')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
            </div> 
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="text-align: center">
          <button type="submit" class="btn btn-block btn-info">Update</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/countryStates.js')}}"></script>
<script>
    $(document).ready(function(){
          $('input[type="file"]').change(function(e){
              var fileName = e.target.files[0].name;
              $(e.target).next().text(fileName);
          });
      });
  </script>
