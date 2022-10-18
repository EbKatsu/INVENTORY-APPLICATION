@extends('template.layout-karyawan')
@section('judul','Edit Item')
@section('header','../../sb-admin/img/Logo.png')
@section('content')	

	<?php foreach($item as $i){ ?>
	<form method="POST" action="<?=base_url()?>karyawan/detail_checklist/update" enctype="multipart/form-data">
	<input name="id_produk" type="hidden" value="<?= $i->id?>">
	<input name="id" type="hidden" value="<?= $i->id?>">
	<div class="form-group">
		<label for="nama_produk">Nama Item</label>
	
		
			<input class="form-control" name="nama_produk" type="text" value="<?= $i->nama_produk?>">		
		
	</div>	
	<div class="form-group">
		<label for="kondisi">Kondisi</label>
		    <p><input type='radio' name='kondisi' value='Baik' 			/>Baik</p>
            <p><input type='radio' name='kondisi' value='Kurang Baik' 	/>Kurang baik</p>
			<p><input type='radio' name='kondisi' value='Tidak Baik' 	/>Tidak baik</p>	
	</div>
	<div class="form-group">
		<label for="keterangan">Keterangan </label>
			<input class="form-control" name="keterangan" type="text" value="<?= $i->keterangan?>" >				
	</div>
	<div class="form-group">
		<label for="image">Foto </label>
			<input class="form-control" name="image" type="file">				
	</div>	
		<button type="submit" class='btn btn-info'>Edit </button>
		
		</form>
		<?php } ?>
@endsection
