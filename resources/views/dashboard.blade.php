@extends('layout')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title"> Total Users </h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-success">{{$active_users}}</span></li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Inactive Registerations</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-purple">{{$inactive_users}}</span></li>
                    </ul>
                </div>
            </div> --}}
            {{-- <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title"> Cancelled Registerations</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-info">{{$cancelled_users}}</span>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
        <!-- ============================================================== -->
        <!-- PRODUCTS YEARLY SALES -->
        <!-- ============================================================== -->
       {{--  <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">GYM Yearly Sales</h3>
                    <div class="d-md-flex">
                        <ul class="list-inline d-flex ms-auto">
                            <li class="ps-3">
                                <h5><i class="fa fa-circle me-1 text-info"></i>Good</h5>
                            </li>
                            <li class="ps-3">
                                <h5><i class="fa fa-circle me-1 text-inverse"></i>Bad</h5>
                            </li>
                        </ul>
                    </div>
                    <div id="ct-visits" style="height: 405px;">
                        <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span class="chartist-tooltip-value">6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- ============================================================== -->
        <!-- RECENT SALES -->
        <!-- ============================================================== -->
        {{-- <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Recent join Members</h3>
                        <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                            <select class="form-select shadow-none row border-top">
                                <option>March 2021</option>
                                <option>April 2021</option>
                                <option>May 2021</option>
                                <option>June 2021</option>
                                <option>July 2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Shift</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">monthly fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="txt-oflo">Elite admin</td>
                                    <td>day</td>
                                    <td class="txt-oflo">April 18, 2021</td>
                                    <td><span class="text-success">3000</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="txt-oflo">Real Homes WP Theme</td>
                                    <td>night</td>
                                    <td class="txt-oflo">April 19, 2021</td>
                                    <td><span class="text-info">5000</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="txt-oflo">Ample Admin</td>
                                    <td>day</td>
                                    <td class="txt-oflo">April 19, 2021</td>
                                    <td><span class="text-info">6000</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="txt-oflo">ali</td>
                                    <td>day</td>
                                    <td class="txt-oflo">April 20, 2021</td>
                                    <td><span class="text-danger">5000</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="txt-oflo">haris</td>
                                    <td>night</td>
                                    <td class="txt-oflo">April 21, 2021</td>
                                    <td><span class="text-success">8000</span></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="txt-oflo">Ghayur</td>
                                    <td>day</td>
                                    <td class="txt-oflo">April 23, 2021</td>
                                    <td><span class="text-danger">9000</span></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="txt-oflo">shamiq</td>
                                    <td>night</td>
                                    <td class="txt-oflo">April 22, 2021</td>
                                    <td><span class="text-success">6000</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
