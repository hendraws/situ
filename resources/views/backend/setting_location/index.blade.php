@extends('layouts.app_master')
@section('title', 'Setting Location')
@section('content-title', 'Setting Location')
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
		$('.card-body').hide();
		$(document).on('keypress', '#barcode', function(e){
			if(e.which == 13){
				e.preventDefault();
				Swal.fire({title: 'Loading...', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
				var url = "{{ url()->current() }}?barcode_ctn="+$('#barcode').val();
				var barcode = $('#'+$('#barcode').val());
				if(barcode.length){
					return Swal.fire({title: 'Data Sudah Ada...', icon: 'warning', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
				}
				var barcode = $('#'+$('#barcode').val());
				$('.card-body').show();
				getData(url, "#dataBarcode");
			}
		})

		$(document).on('click', '#submitBarcode', function(e){
			Swal.fire({title: 'Loading...', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
			var url = "{{ url()->current() }}?barcode_ctn="+$('#barcode').val();
			var barcode = $('#'+$('#barcode').val());
			if(barcode.length){
				return Swal.fire({title: 'Data Sudah Ada...', icon: 'warning', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
			}
			$('#submitBtn').show();
			getData(url, "#dataBarcode");
		})
	})

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
<form action="{{ action('SettingLocationController@store') }}" method="POST">
	@csrf
	<div class="card ">
		<div class="card-header">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="lokasi">Lokasi</label>
						<input type="text" class="form-control" id="lokasi" placeholder="" name="lokasi">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="exampleFormControlInput1">Barcode</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Scan Barcode" id="barcode" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-primary" type="button" id="submitBarcode">	<i class="fa fa-plus-square"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">

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
					</tbody>
				</table>
				<hr>
				<div class="float-right mt-3">
					<button class="btn btn-primary" id="submitBtn">SIMPAN</button>
					<a href="{{ action('SettingLocationController@index') }}" class="btn btn-warning">
						CANCEL
					</a>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
