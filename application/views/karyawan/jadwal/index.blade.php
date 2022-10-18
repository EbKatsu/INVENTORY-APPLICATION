@extends('template.layout-karyawan')
@section('judul','Entry Jenis Produk')
@section('header','sb-admin/img/Logo.png')
@section('content')
<div class="container1">
	<h2>Daftar Jadwal Karyawan</h2>
</div>
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
foreach ($jadwal as $a) :?>
	<tr>
		<td> <?= $no++ ?></td>
		<td><?= $a->nama ?></td>
		<td><?= $a->tanggal?></td>
		<td><?= $a->jobdesk?></td>
		<td><?= $a->keterangan?></td>
		
		
		
		<td><a class='btn btn-info' href='jadwalkaryawan/edit/<?=$a->id_jadwal?>'>Request Jadwal <span class='glyphicon glyphicon-pencil'></span></a><td>
	</tr>
	<?php endforeach;?>
</table>
</div>
@endsection
