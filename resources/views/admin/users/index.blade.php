@extends('layouts.admin')
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

<!-- TABLE: LATEST ORDERS -->
<div class="card">
    <div class="card-header border-transparent">
        @if($users->count() >= '1')
        @if(($users->first()->is_verified) == '1')
        <h3 class="card-title">{{$users->first()->role}} Users</h3>
        @else 
        <h3 class="card-title">Pending Users</h3>
        @endif
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
          
        <table class="table m-0">
          <thead>
          <tr>
            <th>Image</th>
            <th>Card</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            @if($users->first()->role == 'clinic' && $users->first()->is_verified == 1)
            <th>Phone</th>
            <th>Country</th>
            <th>State</th>
            <th>Address</th>
            <th>Location</th>
            @endif
        @if(($users->first()->is_verified) == 0)
            <th>Type</th>
            <th>Details</th>
            <th>Verify</th>
            <th>Delete</th>
            
        @endif
          </tr>
          </thead>

          <tbody>
              @foreach ($users as $user)
          {{-- <a href="" onclick="window.open({{asset('storage/'.$user->card)}},'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1090px, height=550px, top=25px left=120px'); return false;">click here</a> 
          <a class="example-image-link" href="{{asset('storage/'.$user->card)}}" data-lightbox="example-1"><img class="example-image" src="images/thumb-1.jpg" alt="Girl looking out people on beach"></a> --}}

          <tr>
            {{-- <td><a href="pages/examples/invoice.html">OR9842</a></td> --}}
            <td><img src="{{asset('storage/'.$user->image)}}" style="border-radius: 50%;"/></td>
            
            <td><div class="ftco-animate">
              <div class="work mb-4 img align-items-end" style="background-image: url({{asset('storage/'.$user->card)}});">
                <a href="{{asset('storage/'.$user->card)}}" class="icon image-popup d-flex justify-content-center align-items-center">
                  <span class="fa fa-expand"></span>
                </a>
                {{-- <div class="desc w-100 px-4">
                  <div class="text w-100 mb-3">
                    <span>Doctor</span>
                    <h2>ID Card</h2>
                  </div>
                </div> --}}
              </div>
            </div></td>
            <td>{{$user->name}}</td>
            <td>{{$user->user_name}}</td>
            <td>{{$user->email}}</td>
        @if($user->role == 'clinic'&& $user->is_verified == 1)
            <td>{{$user->phone}}</td>
            <td>{{$user->country->name}}</td>
            <td>{{$user->state->name}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->location}}</td>
        @endif
        @if(($users->first()->is_verified) == 0)
            <td>{{$user->role}}</td>
            <td><a href="{{route('user.show',$user->id)}}" >
                <span class="badge badge-info">Details</span>
            </a></td>
            <td><a href="{{url('/users/verify',$user->id)}}">
                <span class="badge badge-warning btn">Verify</span>
            </a></td>
            <td>
            {!! Form::open(['route' => ['user.destroy', $user->id] ,'method' => 'delete' ]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs']) !!}
            {!! Form::close() !!}
            </td>
        @endif
          </tr>
          @endforeach
          
          
          </tbody> 
           
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <div class="pagination pagination-sm m-0 float-right">
    {{ $users->links() }}
    </div>
      {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
      {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
    </div> 
    <!-- /.card-footer -->
  </div>
 
  @else
  <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
    There are no users.
    </div>
  @endif
  
  
@endsection
