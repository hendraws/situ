@extends('layouts.app_master')
@section('title', 'Dashboard')
{{-- @section('content-title', 'Dashboard') --}}
@section('css')
@endsection
@section('js')
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
				var url = "{{ url()->current() }}?tracking="+$('#barcode').val();
				var barcode = $('#'+$('#barcode').val());
				if(barcode.length){
					return Swal.fire({title: 'Data Sudah Ada...', icon: 'warning', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
				}
				getData(url, "#result");
				$('#submitBtn').show();
			}
		})

		$(document).on('click', '#submitBarcode', function(e){
			Swal.fire({title: 'Loading...', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
			var url = "{{ url()->current() }}?tracking="+$('#barcode').val();
			var barcode = $('#'+$('#barcode').val());
			if(barcode.length){
				return Swal.fire({title: 'Data Sudah Ada...', icon: 'warning', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
			}
			getData(url, "#result");
			$('#submitBtn').show();
		})

		function getData(url, target){
		$.ajax({
			url: url,
			type: "get",
			datatype: "html"
		}).done(function(data){
			Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000, timerProgressBar: true,});
			$("#tidakAdaData").remove();
			$(target).html(data);
			$('#barcode').val('').focus();
			$('[data-toggle="tooltip"]').tooltip();
		}).fail(function(jqXHR, ajaxOptions, thrownError){
			Swal.fire({html: 'Data Tidak Ditemukan', icon: 'error', toast: true, position: 'top-end', showConfirmButton: false, timer: 10000, timerProgressBar: true,});
		});
	}
	})
</script>
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-body">
				<h4>Tracking</h4>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" id="barcode">
						<div class="input-group-append">
							<button class="btn btn-outline-primary" type="button" id="submitBarcode">	<i class="fa fa-search"></i></button>
						</div>
					</div>
					<small id="emailHelp" class="form-text text-muted">*Masukan PO atau article atau Alamat Lokasi</small>
				</div>
			</div>
		</div>
	</div>
	<div id="result">
		
	</div>
{{-- 	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card card-body" id="result">
			</div>
		</div>
	</div> --}}
	
</div>
@endsection
