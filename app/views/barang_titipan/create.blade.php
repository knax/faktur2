@extends('layout.main')
@section('content')

<form role="form" method="POST" action="/barang_titipan">
	<div class="row">
		<div class="col-md-12">
			<h2>Tambah Barang Titipan</h2>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="nama_penitip">Nama Penitip</label>
				<input type="text" class="form-control" name="nama_penitip" id="nama_penitip">
			</div>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="nama-barang-penitipan">Nama Barang</label>
				<input type="text" class="form-control data-penitipan" name="nama-barang" id="nama-barang-penitipan">
			</div>
			<div class="form-group">
				<label for="unit-penitipan">Unit</label>
				<input type="text" class="form-control data-penitipan" name="unit" id="unit-penitipan">
			</div>
			<button type="submit" class="btn btn-default" id="tambah-penitipan">Tambahkan Barang</button>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="data-penitipan">
				<thead>
				<th>Nomor</th>
				<th>Nama Barang</th>
				<th>Kuantitas</th>
				</thead>
				<tbody data-last-id="0">
				</tbody>
			</table>
			<button type="submit" class="btn btn-default pull-right">Submit</button>
		</div>
	</div>
</form>
@stop