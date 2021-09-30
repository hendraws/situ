<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card card-body">
			<div class="table-responsive">
				<table  class="table table-sm ">
					<thead class="text-center">
						<tr class="text-center table-info">
							<th scope="col">PO NO</th>
							<th scope="col">ORDER NO</th>
							<th scope="col">QTY CTN</th>
							<th scope="col">ITEM</th>
							<th scope="col">ARTICLE</th>
							<th scope="col">LOKASI</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody id="dataBarcode">
						@foreach ($data as $dataMaster)
						<tr class="text-center">
							<td>{{ $dataMaster->po_no }}</td>
							<td>{{ $dataMaster->order_no }}</td>
							<td>{{ $dataMaster->qty_ctn }}</td>
							<td>{{ $dataMaster->item }}</td>
							<td>{{ $dataMaster->article }}</td>
							<td>{{ $dataMaster->lokasi }}</td>
							<td><button class="btn btn-sm btn-success detail" data-po="{{ $dataMaster->po_no }}" data-article="{{ $dataMaster->article }}" data-lokasi="{{ $dataMaster->lokasi }}">Detail</button></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr>

		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).on('click', '.detail', function(){
		var  po = $(this).data('po');
		var  article = $(this).data('article');
		var  lokasi = $(this).data('lokasi');

		Swal.fire({title: 'Loading...', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true,});
		var url = "{{ url()->current() }}?po="+po+"&article="+article+"&detail=true"+"&lokasi="+lokasi;
		getDataDetail(url, "#tableResult");
	})

	function getDataDetail(url, target){
		$.ajax({
			url: url,
			type: "get",
			datatype: "html"
		}).done(function(data){
			Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000, timerProgressBar: true,});
			$(target).html(data);
			console.log(data);
			$('[data-toggle="tooltip"]').tooltip();
		}).fail(function(jqXHR, ajaxOptions, thrownError){
			Swal.fire({html: 'Data Tidak Ditemukan', icon: 'error', toast: true, position: 'top-end', showConfirmButton: false, timer: 10000, timerProgressBar: true,});
		});
	}
</script>