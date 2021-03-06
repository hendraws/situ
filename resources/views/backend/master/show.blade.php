@extends('layouts.app_master')
@section('title', 'Detail Master')
@section('content-title', 'Detail Master')
@section('css')
<link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript"></script>
@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 row">
				<div class="col-md-3">PO No.</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->po_no }}</div>
			</div>
			<div class="col-md-6 row">
				<div class="col-md-3">Order No.</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->order_no }}</div>
			</div>
			<div class="col-md-6 row">
				<div class="col-md-3">Customer</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->customer }}</div>
			</div>
			<div class="col-md-6 row">
				<div class="col-md-3">Customer No.</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->customer_no }}</div>
			</div>
			<div class="col-md-6 row">
				<div class="col-md-3">Item</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->item }}</div>
			</div>
			<div class="col-md-6 row">
				<div class="col-md-3">Article</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->article }}</div>
			</div>
			<div class="col-md-6 row">
				<div class="col-md-3">Colour</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->colour }}</div>
			</div>
			<div class="col-md-6 row">
				<div class="col-md-3">Total Qty</div>
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->total_qty }}</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		@php
		$no = 1;
		@endphp
		<div class="col-md-12">
			<table class="table text-center">
				<thead class="thead-light">
					<tr>
						<th scope="col">Size</th>
						<th scope="col">Pairs</th>
						<th scope="col">No CTN</th>
						<th scope="col">Barcode CTN</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($master->masterItems as $val)
					<tr>
						<td>{{ $val->size  }}	</td>
						<td>{{ $val->pairs  }}	</td>
						<td>{{ $val->no_ctn ?? '-'  }}	</td>
						<td>{{ $val->barcode_ctn  }}	</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
{{-- {{ dd($master) }} --}}
@endsection
