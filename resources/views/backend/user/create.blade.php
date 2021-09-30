@extends('layouts.app_master')
@section('title', 'Management User')
@section('content-title', 'Management User')
@section('content')
<div class="card card-primary card-outline">
	<div class="card-header row">
		Tambah Data
	</div>
	<div class="card-body">
		<form action="{{ action('UserController@store') }}" method="POST" id="">
			@csrf
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-9">
					<input required type="text" class="form-control @error('username') is-invalid @enderror" id="nama" name="username" value="{{ old('username') }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-9">
					<input required type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Password</label>
				<div class="col-sm-9">
					<input required type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Konfirmasi Password</label>
				<div class="col-sm-9">
					<input required type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="" name="password_confirmation">
				</div>
			</div>	
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Permission</label>
				<div class="col-sm-9">
					@foreach ($permission as $val)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name='permission[]' value="{{ $val->name }}" id="{{ $val->id }}">
						<label class="form-check-label" for="{{ $val->id }}">
							{{ $val->name }}
						</label>
					</div>

					@endforeach

				</div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
				<button class="btn btn-brand btn-square btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>

@endsection


