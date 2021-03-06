@extends('layouts.admin')

@section('title', 'Tags')
@section('admintitle')
| Tags
@endsection    
@section('content')
@if (session()->has("message"))
<div class="alert alert-success" role="alert">
    <strong>Success</strong> {{session()->get("message")}}
  </div>
@endif
@if (session()->has("deleted"))
<div class="alert alert-warning" role="alert">
    {{session()->get("deleted")}}
  </div>
@endif
<!-- Page Heading -->
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Tags</h3>
<p class="mb-4">This is a simple tag table as you can add edit and delete tags.</a>.</p>
<p>
    <a href="{{route('tag.create')}}" class="btn btn-primary" >Add tag</a>
</p>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tags Table</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Blogs count</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        @php
            $counter = 0;    
        @endphp
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                <th scope="row">{{$counter+=1}}</th>
                <th scope="col">@lang('trans.tags.name_in_english')</th>
                <th scope="col">@lang('trans.tags.name_in_arabic')</th>
                <td>
                  @php

                  echo App\BlogTag::where('tag_id','=',$tag->id)->count();
              
              @endphp</td>
                    <td>
                        <a href="{{route('tag.edit',['tag'=>$tag])}}" class="btn btn-warning">@lang('trans.edit')</a>
                    </td>
                    <td>
                        <form action="{{route('tag.destroy',['tag'=>$tag])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">@lang('trans.delete')</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tags->links() }}
</div>

@endsection