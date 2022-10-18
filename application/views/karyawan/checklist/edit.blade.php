@extends('template.layout-karyawan')
@section('judul','Edit Room')
@section('header','../../sb-admin/img/Logo.png')
@section('content')	
	<form method="POST" action="">
	<div class="form-group">
		<label for="nama_produk">Nama </label>
		<input class="form-control" name="nama_produk" type="text" />
	</div>		
		<button type="submit" class='btn btn-info'>Edit Room</button>
		
		</form>
@endsection
