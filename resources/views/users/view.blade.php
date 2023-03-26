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
                        <div class="fw-bold">NIC Number</div>
                        {{$user->nic_number}}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Phone</div>
                        {{$user->detail->phone_number}}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Address</div>
                        {{$user->detail->address}}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Profession</div>
                        {{$user->detail->profession}}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Registeration Status</div>
                        {{$user->registeration->status}}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Registeration Note</div>
                        {{$user->registeration->note}}
                    </div>
                </li>
            </ol>
        </div>
        <div class="col-sm-4">
                <div class="fee-body">
                    <div class="dropdown d-flex algn-center justify-content-center">
                        <p class="h3 px-4">Fees</p>
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            Year
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            @foreach ($years as $year)
                                <li class="@if (request()->has('year') && request('year') == $year) active @endif">
                                    <a 
                                        class="dropdown-item" 
                                        href="{{ route('users.view', $user->id).'?year='.$year }}">{{$year}}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($user->fees as $fee)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-{{$fee->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$fee->id}}" aria-expanded="false" aria-controls="flush-collapse-{{$fee->id}}">
                                        {{$fee->month}} - {{ $fee->created_at->format('Y')}}
                                    </button>
                                </h2>
                                <div id="flush-collapse-{{$fee->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{$fee->id}}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row border-bottom">
                                            <div class="col-sm-6"> Package: </div>
                                            <div class="col-sm-6"> {{$fee->package->name}} </div>
                                        </div>
                                        <div class="row border-bottom">
                                            <div class="col-sm-6"> Fee: </div>
                                            <div class="col-sm-6"> {{$fee->amount}} </div>
                                        </div>
                                        <div class="row border-bottom">
                                            <div class="col-sm-6"> Note: </div>
                                            <p class="col-sm-6"> {{$fee->note}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($user->fees->count() < 1)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-0">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-0" aria-expanded="false" aria-controls="flush-collapse-0">
                                        No fees paid for this year!
                                    </button>
                                </h2>

                            </div>
                        @endif


                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>

@endsection
