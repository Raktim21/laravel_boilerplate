@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/chartist.css') }}">
@endsection

@section('admin.dashboard','active')

@section('content')
    <div class="row">
        <div class="col-xl-8 col-md-6 box-col-50 xl-50">
            <div class="card company-view">
               
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('admin_dashboard/assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/dashboard/default.js') }}"></script>
@endsection