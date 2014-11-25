@extends('layout.main')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Barang Titipan Baru</h2>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-md-12">
		<form action="/barang_titipan" method="post">
		<div class="form-group">
			<label for="nama-barang">Nama Barang</label>
			<input type="text" id="nama-barang" name="nama_barang" class="form-control"/>
		</div>

			<div class="form-group">
				<label for="nama-penitip">Nama Penitip</label>
				<input type="text" id="nama-penitip" name="nama_penitip" class="form-control"/>
			</div>

			<div class="form-group">
				<label for="unit">Unit</label>
				<input type="text" id="unit" name="unit" class="form-control"/>
			</div>

			<button class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

@stop