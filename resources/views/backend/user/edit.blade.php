@extends('layouts.app_master')
@section('title', 'Management User')
@section('content-title', 'Management User')
@section('content')
<div class="card card-primary card-outline">
	<div class="card-header row">
		Edit Data {{ $data->name }}
	</div>
	<div class="card-body">
		<form action="{{ action('UserController@update', $data->id) }}" method="POST" id="kantorCabangForm">
			@csrf
			@method('PUT')
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-9">
					<input required type="text" class="form-control @error('username') is-invalid @enderror" id="nama" name="username" value="{{ $data->name }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-9">
					<input required type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $data->email }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Password</label>
				<div class="col-sm-9">
					<input  type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Konfirmasi Password</label>
				<div class="col-sm-9">
					<input  type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="" name="password_confirmation">
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-secondary" href="{{ action('UserController@index') }}">Kembali</a>
				<button class="btn btn-brand btn-square btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>

@endsection


