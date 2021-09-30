@extends('layouts.app_master')
@section('title', 'Edit Master Barang')
@section('content-title', 'Edit Master Barang')
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

	var sizeId = 1;
	var cartonNumber = 1;

	$(document).on('click', '#tambahSize', function(){
		sizeId++;
		var inputan = `
		<tr>
		<th scope="row"><input type="text" name="size[]" value="" class="bg-muted form-control text-center" id="size-`+sizeId+`"></th>
		<td><input type="number" name="pairs[]" value="0" class="form-control items" id="pair-`+sizeId+`"></td>
		<td id="carton-`+sizeId+`" colspan="2" class="text-center">
		<button type="button" class="btn btn-sm btn-secondary input-barcode float-left" data-id="`+sizeId+`">Input Barcode</button>
		</td>
		</tr>
		`;
		$('#tBody').append(inputan);
	})
	.on('click','.input-barcode',function(){
		var id = $(this).data('id');
		var size = $('#size-'+id).val();
		var pairs = $('#pair-'+id).val();
		var qty = Math.ceil(pairs / 10) ;
		var carton = '';
		var qty_ctn = 0;
		if(pairs == '' || size == ''){
			return Swal.fire({html: 'Size dan Pairs Tidak Boleh Kosong', icon: 'warning', toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true,});
		}

		$('#carton-'+id).empty();
		$('#pair-'+id).attr('readonly', 'readonly');
		$('#size-'+id).attr('readonly', 'readonly');

		for (let i = 1; i <= qty; i++) {


			if(pairs <= 10){
				qty_ctn = pairs;
			};

			if(pairs > 10){
				qty_ctn = 10;
				pairs = pairs - 10;
			};

			var carton = `
			<div class="row">
			<label for="article" class="col-sm-4 col-form-label">Carton No. `+cartonNumber+`</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Barcode" name="barcode_ctn[`+size+`][]">
			<input type="hidden" class="form-control" name="no_ctn[`+size+`][]" value="`+cartonNumber+`">
			<input type="hidden" class="form-control" name="qty_ctn[`+size+`][]" value="`+qty_ctn+`">
			</div>
			</div>
			`;
			$('#carton-'+id).append(carton);
			cartonNumber++;

		}

	})
</script>
@endsection
@section('content')
<div class="card card-primary">
	<form action="{{ action('MasterController@update', $master->id) }}" method="POST">
		@csrf
		@method('put')
		<div class="card-body">
			<div class="form-group row">
				<label for="po_no" class="col-sm-2 col-form-label">PO NO</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="po_no" placeholder="" name="po_no" value="{{ $master->po_no }}">
				</div>
			</div>			
			<div class="form-group row">
				<label for="order_no" class="col-sm-2 col-form-label">Order No</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="order_no" placeholder="" name="order_no" value="{{ $master->order_no }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="customer" class="col-sm-2 col-form-label">Customer</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="customer" placeholder="" name="customer" value="{{ $master->customer }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="customer_no" class="col-sm-2 col-form-label">Customer No.</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="customer_no" placeholder="" name="customer_no" value="{{ $master->customer_no }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="item" class="col-sm-2 col-form-label">ITEM</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="item" placeholder="" name="item" value="{{ $master->item }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="article" class="col-sm-2 col-form-label">ARTICLE</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="article" placeholder="" name="article" value="{{ $master->article }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="colour" class="col-sm-2 col-form-label">COLOUR</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="colour" placeholder="" name="colour" value="{{ $master->colour }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="total_qty" class="col-sm-2 col-form-label">TOTAL QTY</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="total_qty" placeholder="" name="total_qty" readonly="" value="{{ $master->total_qty }}">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-sm">
						<thead>
							<tr class="text-center">
								<th scope="col" width="20%">SIZE</th>
								<th scope="col" width="20%">PAIRS</th>
								<th scope="col">NO CTN </th>
								<th scope="col">Barcode</th>
							</tr>
						</thead>
						<tbody id="tBody" class="text-center">
							@foreach($master->masterItems as $value)
							<tr>
								<th scope="row"><input type="text" name="masterItem[{{ $value->id }}][size]" value="{{ $value->size }}" class="bg-muted form-control text-center" id="size-1"></th>
								<td><input type="number" name="masterItem[{{ $value->id }}][pairs]" value="{{ $value->pairs }}" class="form-control items" id="pair-1"></td>
								<td><input type="number" name="masterItem[{{ $value->id }}][no_ctn]" value="{{ $value->no_ctn }}" class="form-control" id="pair-1"></td>
								<td><input type="text" name="masterItem[{{ $value->id }}][barcode_ctn]" value="{{ $value->barcode_ctn }}" class="form-control" id="pair-1"></td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>

		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<hr>
			<button type="submit" class="btn btn-info float-right">Simpan</button>
		</div>
		<!-- /.card-footer -->
	</form>
</div>
@endsection
