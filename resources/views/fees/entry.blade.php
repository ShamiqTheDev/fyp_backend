@extends('layout')

@section('title', 'User Fees Entry Form')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $action_url }}" class="form-horizontal form-material">
                        @csrf
                        
                        @isset ($user_id)
	                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        @endisset

                        <div class="form-group mb-4">
                            <label class="col-sm-12"> Month</label>
                            <div class="col-sm-12 border-bottom">
                                <select name="month" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option> Select Month</option>
                                    @foreach ($months as $month)
	                                    <option value="{{$month}}" @if ( (isset($fee->month) && $fee->month == $month) ) selected="selected" @endif> {{$month}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Package</label>

                            <div class="col-sm-12 border-bottom">
                                <select name="package_id" class="form-select shadow-none p-0 border-0 form-control-line">
                                    @foreach ($packages as $package)
                                        <option value="{{$package->id}}" @if (isset($fee->package_id) && $fee->package_id == $package->id) selected="selected" @endif> {{$package->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"> Note</label>
                            <div class="col-md-12 border-bottom p-0"> 
                                <textarea name="note" placeholder="notes" class="form-control p-0 border-0">{{ $fee->note??'' }}</textarea>
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
    </div>

</div>
@endsection
