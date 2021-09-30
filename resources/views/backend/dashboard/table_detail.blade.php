<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card card-body">
			<h5>Detail</h5>
			<hr>
			<div class="table-responsive">
				<table  class="table table-sm ">
					<thead class="text-center">
						<tr class="text-center table-info">
							<th scope="col">BARCODE</th>
							<th scope="col">SIZE</th>
							<th scope="col">NO CTN</th>
							<th scope="col">LOKASI</th>
						</tr>
					</thead>
					<tbody id="dataBarcode">
						@foreach ($data as $dataMaster)
						<tr class="text-center">
							<td>{{ $dataMaster->barcode_ctn }}</td>
							<td>{{ $dataMaster->size }}</td>
							<td>{{ $dataMaster->no_ctn }}</td>
							<td>{{ $dataMaster->lokasi }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr>
			<div id="#tableResult"></div>
		</div>
	</div>
</div>