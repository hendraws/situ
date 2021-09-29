@foreach ($data as $dataMaster)
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card card-body">
			<div class="table-responsive">
				<table  class="table table-sm ">
					<thead class="text-center">
						<tr class="text-center table-info">
							<th scope="col">PO NO</th>
							<th scope="col">ORDER NO</th>
							<th scope="col">CUSTOMER</th>
							<th scope="col">CUSTOMER NO</th>
							<th scope="col">ITEM</th>
							<th scope="col">ARTICLE</th>
							<th scope="col">COLOUR</th>
						</tr>
					</thead>
					<tbody id="dataBarcode">
						<tr class="text-center">
							@php
								$balance = (optional($dataMaster->masterItemsOnWarehouse)->sum('pairs') ?? 0) - ($dataMaster->total_qty ?? 0) + (optional($dataMaster->masterItemsOnContainer)->sum('pairs') ?? 0); 
							@endphp
							<td>{{ $dataMaster->po_no }}</td>
							<td>{{ $dataMaster->order_no }}</td>
							<td>{{ $dataMaster->customer }}</td>
							<td>{{ $dataMaster->customer_no }}</td>
							<td>{{ $dataMaster->item }}</td>
							<td>{{ $dataMaster->article }}</td>
							<td>{{ $dataMaster->colour }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div class="table-responsive">
				<table  class="table table-bordered table-sm">
					<thead class="text-center table-warning">
						<tr class="text-center">
							<th scope="col">BARCODE</th>
							<th scope="col">SIZE</th>
							<th scope="col">PAIRS</th>
							<th scope="col">NO CTN</th>
							<th scope="col">Lokasi</th>
						</tr>
					</thead>
					<tbody id="dataBarcode">
						@forelse($dataMaster->masterItemsOnWarehouse as $val)
						<tr class="text-center">
							<th>{{ $val->barcode_ctn }}</th>
							<td>{{ $val->size }}</td>
							<td>{{ $val->pairs }}</td>
							<td>{{ $val->no_ctn }}</td>
							<td>{{ $val->lokasi }}</td>
						</tr>
						@empty
						<tr class="text-center"><th colspan="6">Tidak Ada Data Di Warehouse</th></tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endforeach