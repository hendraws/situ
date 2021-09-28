@extends('layouts.app_master')
@section('title', 'Scan In Warehouse')
@section('content-title', 'Scan In Warehouse')
@section('css')
<link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('keypress', '#barcode', function(e){
			if(e.which == 13){
			Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000, timerProgressBar: true,});
			}
		})
	})

	function getData(url, target){
		$.ajax({
			url: url,
			type: "get",
			datatype: "html"
		}).done(function(data){
			Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000, timerProgressBar: true,});
			$(target).empty().html(data);
			$('[data-toggle="tooltip"]').tooltip();
		}).fail(function(jqXHR, ajaxOptions, thrownError){
			Swal.fire({html: 'No response from server', icon: 'error', toast: true, position: 'top-end', showConfirmButton: false, timer: 10000, timerProgressBar: true,});
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
					<button class="btn btn-outline-info ml-2" type="button" id="filter">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div id="dataBarcode"></div>
	</div>
</div>
@endsection
