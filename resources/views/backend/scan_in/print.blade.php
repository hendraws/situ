<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Print Scan In Warehouse</title>
	<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
	<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
	<style type="text/css">
		@page {
			size: A4 landscape;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row py-3">
			<div class="col-md-12 text-center">
				<h3>Scan In Warehouse</h3>
			</div>
		</div>
		<table class="table table-bordered table-sm">
			<thead>
				<tr>	
					<th scope="col" class="text-center">No</th>
					<th scope="col" class="text-center">PO NO</th>
					<th scope="col" class="text-center">ORDER NO</th>
					<th scope="col" class="text-center">ITEM</th>
					<th scope="col" class="text-center">ARTICLE</th>
					<th scope="col" class="text-center">BARCODE</th>
					<th scope="col" class="text-center">NO CTN</th>
					<th scope="col" class="text-center">SIZE</th>
					<th scope="col" class="text-center">PAIRS</th>
					<th scope="col" class="text-center">LOKASI</th>
					<th scope="col" class="text-center">STATUS</th>
				</tr>
			</thead>
			<tbody>
				@forelse($master as $row)
				<tr>
					<th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
					<td scope="col" class="text-center">{{ $row->po_no }}</td>
					<td scope="col" class="text-center">{{ $row->order_no }}</td>
					<td scope="col" class="text-center">{{ $row->item }}</td>
					<td scope="col" class="text-center">{{ $row->article }}</td>
					<td scope="col" class="text-center">{{ $row->barcode_ctn }}</td>
					<td scope="col" class="text-center">{{ $row->no_ctn }}</td>
					<td scope="col" class="text-center">{{ $row->size }}</td>
					<td scope="col" class="text-center">{{ $row->pairs }}</td>
					<td scope="col" class="text-center">{{ $row->lokasi }}</td>
					<td scope="col" class="text-center">{{ $row->status }}</td>
				</tr>
				@empty
				<th scope="row">Tidak Ada Data Yang Ditampilkan</th>
				@endforelse

			</tbody>
		</table>
	</div>
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			window.print();
		})
	</script>
</body>
</html>
