@extends('template.layout-admin')
@section('judul','Checklist')
@section('header','../sb-admin/img/Logo.png')
@section('content')
<h2>Daftar Aset</h2>
<br>
<div class="container1">
	<a class="btn btn-info" href="{{ base_url() }}admin/checklist/tambah"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
			<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
		</svg> Tambah Data </a>
</div>
<div class="container2">
	<br>
	<table class="table table-hover">
		<tr>
			<th>No</th>
			<th>Room</th>
			<th>Aksi</th>
		</tr>

		<?php
		foreach ($produk as $a) : ?>
			<tr>
				<td><?= $no++?></td>
				<td><a class='btn btn-warning' style='background-color:orangered; padding-right:20px' href='detail_checklist/index/<?= $a->id_produk ?>'><?= $a->nama_produk ?> <span class='glyphicon glyphicon-pencil'></span></a></td>

				<td><a class='btn btn-info' href='checklist/edit/<?= $a->id_produk ?>'>Edit <span class='glyphicon glyphicon-pencil'></span></a>
					<a onclick="return confirm('Apakah Anda Yakin?')" class='btn btn-danger' href='checklist/hapus/<?= $a->id_produk ?>'>Hapus <span class='glyphicon glyphicon-trash'></span></a>
				</td>
			</tr>

			


		<?php endforeach; ?>
<br>

	</table>
</div>

@endsection