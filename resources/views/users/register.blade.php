@extends('layout')

@section('title', 'User Registeration Form')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $action_url }}" class="form-horizontal form-material">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Full Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="name" value="{{ $user->name??'' }}" placeholder="name" class="form-control p-0 border-0"> </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0"> <input type="email" name="email" value="{{ $user->email??'' }}" placeholder="email" class="form-control p-0 border-0"> </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-sm-12">Gender</label>

                            <div class="col-sm-12 border-bottom">
                                <select name="gender" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option> Select Gender</option>
                                    <option value="male" @if (isset($user->gender) && $user->gender == 'male') selected="selected" @endif> Male</option>
                                    <option value="female" @if (isset($user->gender) && $user->gender == 'female') selected="selected" @endif> Female</option>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">NIC Number</label>
                            <div class="col-md-12 border-bottom p-0"> <input type="text" name="nic_number" value="{{ $user->nic_number??'' }}" placeholder="nic number" class="form-control p-0 border-0"> </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Phone Number</label>
                            <div class="col-md-12 border-bottom p-0"> <input type="text" name="phone_number" value="{{ $user->detail->phone_number??'' }}" placeholder="phone number" class="form-control p-0 border-0"> </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Address</label>
                            <div class="col-md-12 border-bottom p-0"> <input type="address" name="address" value="{{ $user->detail->address??'' }}" placeholder="address" class="form-control p-0 border-0"> </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Profession</label>
                            <div class="col-md-12 border-bottom p-0"> <input type="profession" name="profession" value="{{ $user->detail->profession??'' }}" placeholder="profession" class="form-control p-0 border-0"> </div>
                        </div>


                        {{-- registeration infoermation --}}
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Package</label>

                            <div class="col-sm-12 border-bottom">
                                <select name="package_id" class="form-select shadow-none p-0 border-0 form-control-line">
                                    @foreach ($packages as $package)
                                        <option value="{{$package->id}}" @if (isset($user->registeration->package_id) && $user->registeration->package_id == $package->id) selected="selected" @endif> {{$package->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-sm-12"> Registeration Status</label>

                            <div class="col-sm-12 border-bottom">
                                <select name="status" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option value="active" @if (isset($user->registeration->status) && $user->registeration->status == 'active') selected="selected" @endif> Active </option>
                                    <option value="inactive" @if (isset($user->registeration->status) && $user->registeration->status == 'inactive') selected="selected" @endif>  Inactive</option>
                                    <option value="cancelled" @if (isset($user->registeration->status) && $user->registeration->status == 'cancelled') selected="selected" @endif> Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"> Note</label>
                            <div class="col-md-12 border-bottom p-0"> 
                                <textarea name="note" placeholder="notes" class="form-control p-0 border-0">{{ $user->registeration->note??'' }}</textarea>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @include('chunks.users_listing')
        </div>
    </div>

</div>
@endsection
