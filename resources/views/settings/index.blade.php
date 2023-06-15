@extends('layout')

@section('title', 'Application Settings')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
            	@include('chunks.packages_listing')
            </div>
        </div>
    </div>


@endsection
