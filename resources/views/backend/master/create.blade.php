@extends('layouts.app_master')
@section('title', 'Master Barang')
@section('content-title', 'Master Barang')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/jquery.datetimepicker/jquery.datetimepicker.css')}}">
@endsection
@section('js')
<script src="{{ asset('vendors/chartjs/chartjs.js') }}"></script>
<script src="{{ asset('vendors/chartjs/chartjs-plugin-colorschemes.js') }}"></script>
<script src="{{ asset('vendors/chartjs/chartjs-plugin-datalabels.js') }}"></script>
<script src="{{ asset('plugins/jquery.datetimepicker/jquery.datetimepicker.full.js')}}"></script>
<script type="text/javascript">
	$(document).on('input', '.items', function () {
		var calculated_total_sum = 0;

		$(".items").each(function () {
			var get_textbox_value = $(this).val();
			if ($.isNumeric(get_textbox_value)) {
				calculated_total_sum += parseFloat(get_textbox_value);
			}                  
		});
		$("#total_qty").val(calculated_total_sum);
	});
</script>
@endsection
@section('content')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Horizontal Form</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form action="{{ action('MasterController@store') }}" method="POST">
		@csrf
		<div class="card-body">
			<div class="form-group row">
				<label for="po_no" class="col-sm-2 col-form-label">PO NO</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="po_no" placeholder="" name="po_no">
				</div>
			</div>			
			<div class="form-group row">
				<label for="order_no" class="col-sm-2 col-form-label">Order No</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="order_no" placeholder="" name="order_no">
				</div>
			</div>
			<div class="form-group row">
				<label for="customer" class="col-sm-2 col-form-label">Customer</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="customer" placeholder="" name="customer">
				</div>
			</div>
			<div class="form-group row">
				<label for="customer_no" class="col-sm-2 col-form-label">Customer No.</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="customer_no" placeholder="" name="customer_no">
				</div>
			</div>
			<div class="form-group row">
				<label for="item" class="col-sm-2 col-form-label">ITEM</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="item" placeholder="" name="item">
				</div>
			</div>
			<div class="form-group row">
				<label for="article" class="col-sm-2 col-form-label">ARTICLE</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="article" placeholder="" name="article">
				</div>
			</div>
			<div class="form-group row">
				<label for="colour" class="col-sm-2 col-form-label">COLOUR</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="colour" placeholder="" name="colour">
				</div>
			</div>
			<div class="form-group row">
				<label for="total_qty" class="col-sm-2 col-form-label">TOTAL QTY</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="total_qty" placeholder="" name="total_qty" readonly="">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<table class="table table-sm">
						<thead>
							<tr>
								<th scope="col">SIZE</th>
								<th scope="col">PAIRS</th>
								<th scope="col">NO CTN</th>
								<th scope="col">BARCODE</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="1" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="1" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="1T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="2" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="2" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="3" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="2T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="4" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="3" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="5" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="3T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="6" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="4" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="7" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="4" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="8" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="4" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="9" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="4T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="10" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="4T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="11" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="5" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="12" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="5T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="13" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="5T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="14" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="5T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="15" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="6" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="16" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="6" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="17" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="6" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="18" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="6" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="19" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="6" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="20" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="6T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="7" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-6" style="border-left: 1px solid black">
					<table class="table table-sm">
						<thead>
							<tr>
								<th scope="col">SIZE</th>
								<th scope="col">PAIRS</th>
								<th scope="col">NO CTN</th>
								<th scope="col">BARCODE</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<th scope="row"><input type="text" name="size[]" value="7T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="8" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="8T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="9" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="9T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="10" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="21" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="10T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="22" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="11" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="23" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="11" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="24" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="11" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="25" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="11" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="26" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="11T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="27" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="11T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="28" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="11T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="29" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="12" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="30" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="12" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="31" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="12" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="32" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="12T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="13" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="13T" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							<tr>
								<th scope="row"><input type="text" name="size[]" value="14" readonly="" class="bg-muted form-control text-center"></th>
								<td><input type="number" name="pairs[]" value="0" class="form-control items"></td>
								<td><input type="text" name="no_ctn[]" value="" readonly="" class="bg-muted form-control text-center"></td>
								<td><input type="number" name="barcode_ctn[]"  value="" class="form-control"></td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>

		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-info">Sign in</button>
			<button type="submit" class="btn btn-default float-right">Cancel</button>
		</div>
		<!-- /.card-footer -->
	</form>
</div>
@endsection
