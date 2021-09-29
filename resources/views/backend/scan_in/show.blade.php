@extends('layouts.app_master')
@section('title', 'Detail Scan In')
@section('content-title', 'Detail Scan In')
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
				<div class="col-md-8"><span class="mx-3">:</span>{{ $master->masterItemsOnWarehouse->sum('pairs') }}</div>
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
						<th scope="col">Barcode CTN</th>
						<th scope="col">No CTN</th>
						<th scope="col">Size</th>
						<th scope="col">Pairs</th>
						<th scope="col">Lokasi</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($master->masterItemsOnWarehouse as $item)
					<tr>
						<td>{{ $item->barcode_ctn  }}	</td>
						<td>{{ $item->no_ctn ?? '-'  }}	</td>
						<td>{{ $item->size  }}	</td>
						<td>{{ $item->pairs  }}	</td>
						<td>{{ $item->lokasi  }}	</td>
						<td>{{ $item->status  }}	</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
</div>
{{-- {{ dd($master) }} --}}
@endsection
