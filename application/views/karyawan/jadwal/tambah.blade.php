@extends('template.layout-karyawan')
@section('judul','Entry Jenis Produk')
@section('header','../sb-admin/img/Logo.png')
@section('content')
	<form method="POST" action="">
	<div class="form-group">
		<label for="jenis">Nama</label>
		<input class="form-control" name="nama" type="text" />
	</div>
	<div class="form-group">
		<label for="jenis">Tanggal</label>
		<input class="form-control" name="tanggal" type="date" />
	</div>
	<div class="form-group">
		<label for="jenis">Jobdesk</label>
		<input class="form-control" name="jobdesk" type="text" />
	</div>
	<div class="form-group">
		<label for="jenis">Keterangan</label>
		<input class="form-control" name="keterangan" type="text" />
	</div>

		<button type="submit" class='btn btn-info'>Tambah Jadwal Karwayan <span class='glyphicon glyphicon-plus'></span></button>
		</form>
	@endsection
