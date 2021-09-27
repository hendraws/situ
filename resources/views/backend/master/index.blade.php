@extends('layouts.app_master')
@section('title', 'Master Barang')
@section('content-title', 'Master Barang')
@section('css')
<link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function () {

		function reloadData() {
			$('.table').DataTable().ajax.reload();
		}

		let table = $('.table').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ url()->full() }}",
			pageLength: 25,
			autoWidth: false,
			scrollX: "100%",
			scrollCollapse:false,
			columnDefs: [
			{targets: [0], className: "text-center",},
			{targets: 0, width: "15px"},
			],
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', title: '#'},
			{data: 'po_no', name: 'po_no', title: 'PO NO'},
			{data: 'order_no', name: 'order_no', title: 'ORDER NO'},
			{data: 'customer', name: 'customer', title: 'CUSTOMER'},
			{data: 'customer_no', name: 'customer_no', title: 'CUSTOMER NO'},
			{data: 'item', name: 'item', title: 'ITEM'},
			{data: 'article', name: 'article', title: 'ARTICLE'},
			{data: 'colour', name: 'colour', title: 'COLOUR'},
			{data: 'total_qty', name: 'total_qty', title: 'TOTAL QTY'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	});
</script>
@endsection
@section('content')
<div class="card ">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ action('MasterController@create') }}" class="btn btn-primary float-right">Tambah Data</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table id="data-table" class="table table-bordered table-striped">
		</table>
	</div>
</div>
@endsection
