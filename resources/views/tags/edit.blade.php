@extends('layouts.admin')
@section('admintitle')
| @lang('trans.tags.edit_tag')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>@lang('trans.tags.edit_tag_for') {{$tag->name}}</h3>
            </div>
        </div>
    
        <div class="row">
            <div class="col-12">
                <form action="{{ route('tag.update', ['tag'=> $tag]) }}" method="POST">
                    @method('PATCH')
                    @include('tags.form')
                    
                    <button type="submit" class="btn btn-primary">@lang('trans.tags.save_tag')</button>
                </form>
            </div>
        </div>
    </div>
@endsection