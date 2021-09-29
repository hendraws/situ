@extends('layouts.app_master')
@section('title', 'Scan In Warehouse')
@section('content-title', 'Scan In Warehouse')
@section('css')
<link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).ready(function(){
		$('#submitBtn').hide();
		$(document).on('keypress', '#barcode', function(e){
			if(e.which == 13){
				Swal.fire({title: 'Loading...', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
				var url = "{{ url()->current() }}?barcode_ctn="+$('#barcode').val();
				var barcode = $('#'+$('#barcode').val());
				if(barcode.length){
					return Swal.fire({title: 'Data Sudah Ada...', icon: 'warning', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
				}
				getData(url, "#dataBarcode");
				$('#submitBtn').show();
			}
		})

		$(document).on('click', '#submitBarcode', function(e){
			Swal.fire({title: 'Loading...', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
			var url = "{{ url()->current() }}?barcode_ctn="+$('#barcode').val();
			var barcode = $('#'+$('#barcode').val());
			if(barcode.length){
				return Swal.fire({title: 'Data Sudah Ada...', icon: 'warning', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
			}
			getData(url, "#dataBarcode");
			$('#submitBtn').show();
		})
	})
	let table = $('#data-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ url()->full() }}",
		pageLength: 25,
		autoWidth: false,
		scrollX: "100%",
		scrollCollapse:false,
		columnDefs: [
		{targets: [0,1,2,3,4,5], className: "text-center",},
		{targets: 0, width: "15px"},
		],
		columns: [
		{data: 'DT_RowIndex', name: 'DT_RowIndex', title: '#'},
		{data: 'po_no', name: 'po_no', title: 'PO NO'},
		{data: 'article', name: 'article', title: 'ARTICLE'},
		{data: 'qty', name: 'qty', title: 'TOTAL QTY'},
		{data: 'balance', name: 'balance', title: 'BALANCE'},
		{data: 'action', name: 'action', title: ''},
		]
	});
	function getData(url, target){
		$.ajax({
			url: url,
			type: "get",
			datatype: "html"
		}).done(function(data){
			Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000, timerProgressBar: true,});
			$("#tidakAdaData").remove();
			$(target).append(data);
			$('#barcode').val('').focus();
			$('[data-toggle="tooltip"]').tooltip();
		}).fail(function(jqXHR, ajaxOptions, thrownError){
			Swal.fire({html: 'Data Tidak Ditemukan', icon: 'error', toast: true, position: 'top-end', showConfirmButton: false, timer: 10000, timerProgressBar: true,});
		});
	}
</script>
@endsection
@section('content')
<div class="card ">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<div class="input-group mb-3 input-sm">
					<input type="text" class="form-control input-sm " placeholder="Barcode No ctn" id="barcode" value="">
					<button class="btn btn-outline-info ml-2" type="button" id="submitBarcode">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form action="{{ action('ScanInController@store') }}" method="POST">
			@csrf
			<div class="table-responsive">
				<table  class="table table-sm">
					<thead class="text-center">
						<tr class="text-center">
							<th scope="col">BARCODE CTN</th>
							<th scope="col">PO NO</th>
							<th scope="col">ARTICLE</th>
							<th scope="col">NO CTN</th>
						</tr>
					</thead>
					<tbody id="dataBarcode">
						<tr id="tidakAdaData">
							<td colspan="12" class="text-center bg-secondary"><h5>Tidak Ada Data</h5></td>
						</tr>
					</tbody>
				</table>
				<button class="col-md-12 btn btn-primary" id="submitBtn">SIMPAN</button>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<h5>Data Scan In Warehouse</h5>
		<table id="data-table" class="table table-bordered table-striped">
		</table>
	</div>
</div>
@endsection
