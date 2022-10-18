@extends('template.layout-admin')
@section('judul','Entry User')
@section('header','../../sb-admin/img/Logo.png')
@section('content')	
	
<form method="POST" action="<?=base_url()?>admin/users/insertdata" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="username">Username</label>
		<input class="form-control" name="username" type="text" />
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" name="password" type="password" />
	</div>
	<div class="form-group">
		<label for="nama">Nama</label>
		<input class="form-control" name="nama" />
	</div>
	<div class="form-group">
		<label for="nipp">NIPP</label>
		<input class="form-control" name="nipp" />
	</div>
	<div class="form-group">
		<label for="jabatan">Jabatan</label>
		<input class="form-control" name="jabatan" />
	</div>
	<div class="form-group">
		<label for="jenis_user">Jenis User</label>
		<select class="form-control" name="jenis_user">
			<option value="Admin">Admin</option>
			<option value="Karyawan">Karyawan</option>
			<option value="Pimpinan">Pimpinan</option>
		</select>
	</div>
	<div class="form-group">
		<label for="image">Foto </label>
			<input class="form-control" name="image" type="file" >				
	</div>	
		<button type="submit" class='btn btn-info'>Tambah User <span class='glyphicon glyphicon-plus'></span></button>
		</form>
		<br>
@endsection

