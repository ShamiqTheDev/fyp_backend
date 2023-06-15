@extends('layout')

@section('title', $title.' Create Form')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $actionUrl }}" class="form-horizontal form-material">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"> Title </label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="title" value="{{ $menuGroup->title??old('title') }}" placeholder="Enter title" class="form-control p-0 border-0" >
                            </div>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Tag</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="tag" value="{{ $menuGroup->tag??old('tag') }}" placeholder="Enter tag" class="form-control p-0 border-0"> </div>
                                @if($errors->has('tag'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('tag') }}
                                    </div>
                                @endif
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
            @include($prefix.'.listing')
        </div>
    </div>

</div>
@endsection
