@extends('template.layout-admin')
@section('judul','Daftar User')
@section('header','../sb-admin/img/Logo.png')
@section('content')
<h2>Daftar User</h2>
<div class="container1">
	<a class="btn btn-info" href="{{ base_url() }}admin/users/tambah"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
			<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
		</svg> Tambah Data</a>
	<a class="btn btn-info" href="{{ base_url() }}admin/users/export_user"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
			<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
		</svg> Export user</a>
</div>

<div class="container2">
	<br>
	<table class="table table-hover">
		<tr>
			<th>Username</th>
			<th>Nama</th>
			<th>Jenis User</th>
			<th>Status User</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		<?php
		foreach ($nama as $a) : ?>
			<tr>
				<td><?= $a->username ?></td>
				<td><?= $a->nama ?></td>
				<td><?= $a->jenis_user ?></td>
				<?php if ($a->status_user == 1) echo "<td>Aktif</td>";
				else echo "<td>Tidak Aktif</td>" ?>
				<td><?= $a->image ?></td>
				<td><a class='btn btn-info' href='users/edit/<?= $a->id ?>'>Edit <span class='glyphicon glyphicon-pencil'></span></a>
					<a onclick="return confirm('Apakah Anda Yakin?')" class='btn btn-danger' href='users/hapus/<?= $a->id ?>'>Hapus <span class='glyphicon glyphicon-trash'></span></a>
				</td>
			</tr>


		<?php endforeach; ?>

	</table>
</div>


@endsection