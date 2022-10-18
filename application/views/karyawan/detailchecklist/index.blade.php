@extends('template.layout-karyawan')
@section('judul','Daftar Item')
@section('header','../../sb-admin/img/Logo.png')
@section('content')
<h2>Daftar Item</h2>
<div class="container1">
	<br>
	<a class="btn btn-info" href="{{ base_url() }}karyawan/detail_checklist/tambah/<?= $id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
			<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
		</svg> Tambah Data </a>
</div>

<div class="container2">
	<br>

	<form action="<?= base_url() ?>karyawan/detail_checklist/update" id="form-tambah" method="POST">
		<?php foreach ($produk as $item) : ?>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<div class="card shadow">
						<div class="card-header"><strong><?= $item->nama_produk ?></strong></div>
						<div class="card-body">
							<input name="id_produk" type="hidden" value="<?= $item->id_produk ?>">
							<input name="id" type="hidden" value="<?= $item->id ?>">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="kondisi"><strong>Kondisi</strong> </label>
									<p><input type='radio' name='kondisi' value='Baik' />Baik</p>
									<p><input type='radio' name='kondisi' value='Kurang Baik' />Kurang baik</p>
									<p><input type='radio' name='kondisi' value='Tidak Baik' />Tidak baik</p>
								</div>
								<div class="form-group col-md-6">
									<label for="keterangan"><strong>tanggal</strong> </label>
									<input class="form-control" name="tanggal" type="text" value="<?= $_SESSION['tanggal'] ?>" readonly>
								</div>
								<hr>
								<div class="form-group col-md-6">
									<label for="nama"><strong>keterangan</strong></label>
									<textarea name="keterangan" placeholder="Nama Room" autocomplete="off" class="form-control" rows="3" required></textarea>
								</div>
								<div class="form-group col-md-6">
									<label for="nama"><strong>lampiran foto</strong></label>
									<input name="image" class="form-control" type="file" id="formFile">
								</div>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
</div>
<?php endforeach ?>
<div class="form-group">
	<br>
	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
	<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
</div>
</form>
</div>

@endsection