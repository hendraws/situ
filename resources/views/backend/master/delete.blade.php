<form action="{{ action('MasterController@destroy', $master->id) }}" method="POST" id="kantorCabangForm">
	<div class="modal-header ">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		@csrf
		@method('DELETE')
		<div class="form-group row">
			<div class="col-md-12 text-center">
				<h3 class="text-center bg-orange"><b>PERHATIAN !!!</b></h3>
				<hr>
				<h5>
					<b>	
						APAKAH ANDA YAKIN AKAN MENGHAPUS PO {{ strtoupper($master->po_no) }} ?
					</b>
				</h5>
				<p>Semua Data PO  {{ strtoupper($master->po_no) }}   Akan Terhapus !!!</p>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary m-auto col-md-5" data-dismiss="modal">Tidak</button>
		<button class="btn btn-brand btn-square btn-danger m-auto col-md-5">Ya,Hapus</button>

	</div>
</form>