@extends('template.layout-admin')
@section('judul','Edit Jenis Produk')
@section('header','../../sb-admin/img/Logo.png')
@section('content')	
<div class="container2">
	<br>
	<table class="table table">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal</th>
			<th>Jobdesk</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>

		<?php
		foreach ($jadwal as $a) : ?>
			<tr>
				<td> <?= $no++ ?></td>
				<td><?= $a->nama ?></td>
				<td><?= $a->tanggal ?></td>
				<td><?= $a->jobdesk ?></td>
				<td><?= $a->keterangan ?></td>



				<td><a class='btn btn-info' href='terima/<?= $a->id_jadwal ?>'>Terima <span class='glyphicon glyphicon-pencil'></span></a>
					<a class='btn btn-danger' href='tolak/<?= $a->id_jadwal ?>'>Tolak <span class='glyphicon glyphicon-trash'></span></a>
				<td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
@endsection
