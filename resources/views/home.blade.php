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
					<small id="emailHelp" class="form-text text-muted">Masukan no. barcode atau article atau no. carton </small>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection
