@extends('layout')

@section('title',  $title.' Details')
@section('content')
<div class="container-fluid">
    @include('components.back-button')
    <div class="row">
        <div class="col-sm-8 white-box">
            <p class="h3 px-4">Menu Group: {{$menuSection->main_menu->title}}</p>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <span class="fw-bold">Title: </span>
                        <span> {{$menuSection->title}} </span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <span class="fw-bold">Link: </span>
                        <span> {{$menuSection->link}} </span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <span class="fw-bold">Image Link: </span>
                        <span> {{$menuSection->img_link}} </span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <span class="fw-bold">CSS Class: </span>
                        <span> {{$menuSection->html_class??'-'}} </span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <span class="fw-bold">Sorting Order: </span>
                        <span> {{$menuSection->sort}} </span>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</div>

@endsection
