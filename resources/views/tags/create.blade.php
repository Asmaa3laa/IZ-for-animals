@extends('layouts.admin')
@section('admintitle')
| @lang('trans.tags.add_tag')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>@lang('trans.tags.add_tag')</h3>
            </div>
        </div>
    
        <div class="row">
            <div class="col-3">
                <form action="{{route('tag.store')}}" method="POST">
                    
                    @include('tags.form')
    
                    <button type="submit" class="btn btn-primary">@lang('trans.tags.add_tag')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
