@extends('layout')

@section('css')

<style type="text/css">
    .fee-body {
        padding: 30px 10px;
        background-color: white;
    }
</style>

@endsection

@section('title', 'User Details')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 white-box">
            {{-- {{ dd($user->fees->groupBy("YEAR('created_at')")) }} --}}
            <p class="h3 px-4">{{$user->name}}</p>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Email</div>
                        {{$user->email}}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Gender</div>
                        {{$user->gender}}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"> Type </div>
                        {{$user->type=='admin'?'Admin':'App User'}}
                    </div>
                </li>

            </ol>
        </div>
    </div>
</div>

@endsection
