@extends('layout')

@section('title', 'User Fees Listing')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xlg-12 col-md-12">
            	@include('chunks.fees_listing')
            </div>
        </div>
    </div>
@endsection
