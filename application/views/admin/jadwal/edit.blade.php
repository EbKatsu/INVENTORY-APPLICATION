@extends('template.layout-admin')
@section('judul','Edit Jenis Produk')
@section('header','../../../sb-admin/img/Logo.png')
@section('content')	
	<form method="POST" action="">
	<div class="form-group">
		<label for="jenis">Nama</label>
		<input class="form-control" name="nama" type="text" value="<?=$detail->nama?>" />
	</div>
	<div class="form-group">
		<label for="jenis">Tanggal</label>
		<input class="form-control" name="tanggal" type="text" value="<?=$detail->tanggal?>" />
	</div>
	<div class="form-group">
		<label for="jenis">Jobdesk</label>
		<input class="form-control" name="jobdesk" type="text" value="<?=$detail->jobdesk?>" />
	</div>
	<div class="form-group">
		<label for="jenis">Keterangan</label>
		<input class="form-control" name="keterangan" type="text" value="<?=$detail->keterangan?>" />
	</div>
	
	<button type="submit" class='btn btn-info'>Edit</button>
		</form>
@endsection
