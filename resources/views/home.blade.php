@extends('layouts.app_master')
@section('title', 'Dashboard')
@section('content-title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/jquery.datetimepicker/jquery.datetimepicker.css')}}">
@endsection
@section('js')
<script src="{{ asset('vendors/chartjs/chartjs.js') }}"></script>
<script src="{{ asset('vendors/chartjs/chartjs-plugin-colorschemes.js') }}"></script>
<script src="{{ asset('vendors/chartjs/chartjs-plugin-datalabels.js') }}"></script>
<script src="{{ asset('plugins/jquery.datetimepicker/jquery.datetimepicker.full.js')}}"></script>

<script type="text/javascript">

	
</script>
@endsection
@section('content')
<div class="container">
	<div class="card card-body">
	
	</div>
	<div id="globalChart"></div>
</div>
@endsection
