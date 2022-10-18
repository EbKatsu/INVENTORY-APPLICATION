@extends('template.layout-admin')
@section('judul','Entry Produk')
@section('header','../../../sb-admin/img/Logo.png')
@section('content')
<form method="POST" action="<?= base_url() ?>admin/detail_checklist/addItem" enctype="multipart/form-data">
	<div class="form-group">
		<label for="id"> </label>
		<input class="form-control" name="id" type="hidden" value="<?= $id ?>">
	</div>
	<div class="form-group">
		<label for="id_produk"></label>
		<input class="form-control" name="id_produk" type="hidden" value="<?= $id ?>">
	</div>

	<div class="form-group">
		<label for="nama_produk">Nama </label>

		<input class="form-control" name="nama_item" type="text">

	</div>
	<button type="submit" class='btn btn-info'>Tambah Data <span class='glyphicon glyphicon-plus'></span></button>



</form>
@endsection