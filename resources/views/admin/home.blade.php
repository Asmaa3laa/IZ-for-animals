@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('status'))
                <div class="flash-message">
                    <p class="alert alert-success">{{ Session::get('status') }} <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                </div>
                @endif
        </div>
    </div>
</div>
@endsection
