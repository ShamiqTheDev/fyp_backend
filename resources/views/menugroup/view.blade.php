@extends('layout')

@section('title', $title.' Details')
@section('content')
<div class="container-fluid">
    @include('components.back-button')
    <div class="row">
        <div class="col-sm-8 white-box">
            <p class="h3 px-4">Menu Group: {{$menuGroup->title}}</p>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <span class="fw-bold">Tag: </span>
                        <span> {{$menuGroup->tag}} </span>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</div>

@endsection
