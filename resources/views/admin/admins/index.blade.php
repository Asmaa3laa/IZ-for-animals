@extends('layouts.admin')
@section('admintitle')
| Admins  
@endsection
@section('content')
<div class="container">
  <div class="card-body p-0">
<div class="table-responsive">
<table class="table">
    <thead>
        <tr style="color: navy;">
          <th scope="col">Name</th>
          <th scope="col">username</th>
          <th scope="col">Email</th>
          <th scope="col">role</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>        
        </tr>
      </thead>
      <tbody>
        @forelse($admins as $admin)
            <tr>
            <td scope="row">{{$admin->name}}</td>
            <td>{{$admin->user_name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->role}}</td>
            <td><button onclick="location.href = '{{route('user.edit',$admin->id)}}';" class="btn btn-warning">EDIT</button></td>
            <td>
                @if($admin->role != 'admin')
                <form method="POST" action="{{route('admin.destroy',$admin->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
            
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger delete-user" value="DELETE">
                    </div>
                </form>
                @else
                 That is a super admin
                @endif
            </td>
        </tr>
        @empty
        <tr>There is Now Sub Admins Yet</tr>            
        @endforelse
</table>
</div>
</div>
</div>
@endsection
