@extends('layout.main')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Kurangi Barang Titipan</h2>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-md-12">

		<form action="/barang_titipan/{{$barangTitipan->id}}" method="post">

			<div class="form-group">
				<label for="nama-penitip">Nama Penitip</label>
				<p class="form-control-static" id="nama-penitip">{{$barangTitipan->nama_penitip}}</p>
			</div>

			<div class="form-group">
				<label for="nama-barang">Nama Barang</label>
				<p class="form-control-static" id="nama-barang">{{$barangTitipan->nama_barang}}</p>
			</div>

			<div class="form-group">
				<label for="unit_sisa">Unit</label>
				<p class="form-control-static" id="unit_sisa">{{$barangTitipan->unit}}</p>
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