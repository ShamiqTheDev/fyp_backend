@extends('layout')

@section('title', 'Users Listing')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('users.listing')
            </div>
        </div>
    </div>

@endsection
