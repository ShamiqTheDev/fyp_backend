@extends('layout')

@section('title', 'Package '.  (isset($package->id)?'Edit':'Create') .' Form')
@section('content')

    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-lg-4 col-xlg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ $action_url }}" class="form-horizontal form-material">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" class="form-control p-0 border-0" name="name" placeholder="name" value="{{ $package->name??''}}"> 
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0"> Details</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea name="details" placeholder="details" class="form-control p-0 border-0">{{ $package->details??''}}</textarea> </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0"> Per Month Charges </label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" name="permonth_charges" placeholder="per month charges" class="form-control p-0 border-0" 
                                    value="{{ $package->permonth_charges??''}}"> </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0"> Advance Amount</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" name="advance" placeholder="advance" class="form-control p-0 border-0" value="{{ $package->advance??''}}"> </div>
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

            <div class="col-sm-8">
                @include('chunks.packages_listing')
            </div>

        </div>
        <!-- Row -->

    </div>
@endsection
