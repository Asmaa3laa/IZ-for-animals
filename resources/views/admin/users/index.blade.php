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
            @if($users->first()->role == 'clinic')
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
          <tr>
            {{-- <td><a href="pages/examples/invoice.html">OR9842</a></td> --}}
            <td><img src="{{asset('storage/'.$user->image)}}" style="border-radius: 50%;"/></td>
            <td><img src="{{asset('storage/'.$user->card)}}"/></td>
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
          {{-- <tr>
            <td><a href="pages/examples/invoice.html">OR1848</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="badge badge-warning">Pending</span></td>
            <td>
              <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>iPhone 6 Plus</td>
            <td><span class="badge badge-danger">Delivered</span></td>
            <td>
              <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
            </td>
          </tr>
          <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="badge badge-info">Processing</span></td>
            <td>
              <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
            </td>
          </tr> --}}
          
          </tbody>  
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div> --}}
    <!-- /.card-footer -->
  </div>
 
  @else
  <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
    There are no users.
    </div>
  @endif
  {{ $users->links() }}
  <!-- /.card -->
@endsection
