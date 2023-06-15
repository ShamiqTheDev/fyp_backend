@extends('layout')

@section('title', 'Users Listing')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('chunks.users_listing')
            </div>
        </div>
    </div>

@endsection
