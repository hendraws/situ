@extends('layouts.app_master')
@section('title', 'Inspection')
@section('content-title', 'Inspection')
@section('css')
<link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('js')
<script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#po').select2({
		theme: 'bootstrap4'
	})
</script>
@endsection
@section('content')
<form action="{{ action('InspectionController@store') }}" method="POST">
	@csrf
	<div class="card ">
		<div class="card-header">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="lokasi">PO</label>
						<select class="form-control" id="po" name="po_no">
							<option disabled="" selected="">Pilih PO</option>
							@foreach ($masters as $val)
							<option value="{{ $val->id }}"> {{ $val->po_no }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="lokasi">Status</label>
						<select class="form-control" id="po" name="status">
							<option disabled="" selected="">Pilih Status</option>
							<option value="reject"> REJECT</option>
							<option value="release"> RELEASE</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="float-right mt-3">
				<button class="btn btn-primary" id="submitBtn">SIMPAN</button>
				<a href="{{ action('InspectionController@index') }}" class="btn btn-warning">
					CANCEL
				</a>
			</div>

		</div>
	</div>
</form>
@endsection
