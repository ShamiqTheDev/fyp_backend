@extends('layout')

@section('title',  $title.' Create Form')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $actionUrl }}" class="form-horizontal form-material">
                        @csrf

                        <input type="text"
                            name="menu_group_id" value="1" placeholder="enter group id ">

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"> Title </label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="title" value="{{ $mainMenu->title??old('title') }}" placeholder="Enter title" class="form-control p-0 border-0" >
                            </div>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"> Link </label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="link" value="{{ $mainMenu->link??old('link') }}" placeholder="Enter link" class="form-control p-0 border-0" >
                            </div>
                            @if($errors->has('link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"> Css Class </label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="html_class" value="{{ $mainMenu->html_class??old('html_class') }}" placeholder="Enter css class" class="form-control p-0 border-0" >
                            </div>
                            @if($errors->has('html_class'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('html_class') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0"> Sorting Order </label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="sort" value="{{ $mainMenu->sort??old('sort') }}" placeholder="Enter css class" class="form-control p-0 border-0" >
                            </div>
                            @if($errors->has('sort'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sort') }}
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
