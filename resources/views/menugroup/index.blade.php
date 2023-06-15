@extends('layout')

@section('title', $title.' Listing')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @include($prefix.'.listing')
            </div>
        </div>
    </div>

@endsection
