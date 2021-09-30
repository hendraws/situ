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
		
		$(document).on('click', '#submit', function(e){
			Swal.fire({title: 'Loading...', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
			var url = "{{ url()->current() }}?po="+$('#po').val()+"&article="+$('#article').val()+"&no_ctn="+$('#no_ctn').val();
			getData(url, "#result");
		})

		function getData(url, target){
			$.ajax({
				url: url,
				type: "get",
				datatype: "html"
			}).done(function(data){
				Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000, timerProgressBar: true,});
				$('#tableResult').empty();
				$(target).html(data);
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
				<h4 class="mb-3">Tracking</h4>
				<div class="form-group row mt-2">
					<label for="inputPassword" class="col-sm-2 col-form-label">PO</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="po">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Article</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="article">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">No Ctn</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="no_ctn">
					</div>
				</div>
				<button type="button" class="btn btn-success col-md-3 ml-auto" id="submit">Cari</button>
			</div>
		</div>
	</div>
	<div id="result">
		
	</div>
	<div id="tableResult"></div>
{{-- 	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card card-body" id="result">
			</div>
		</div>
	</div> --}}
	
</div>
@endsection
