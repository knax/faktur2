@extends('layout.main')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Buat Surat Jalan</h2>
	</div>
</div>

<hr/>

<form action="/barang_titipan/{{$barangTitipan->id}}/surat_jalan" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="nomor_faktur">Nomor faktur</label>

				<p id="nomor_faktur" class="form-control-static">{{$barangTitipan->penjualan->id}}</p>
			</div>

			<div class="form-group">
				<label for="penulis">Penulis</label>
				<input type="text" id="penulis" name="penulis" class="form-control"/>
			</div>


			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" id="nama" name="nama" class="form-control"/>
			</div>

			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" id="alamat" name="alamat" class="form-control"/>
			</div>

			<div class="form-group">
				<label for="barang-penitipan">Nama Barang</label>
				<select class="form-control data-penitipan" name="id_barang_penitipan_detail" id="barang-penitipan">
					@foreach($barangTitipan->detail as $detail)
					<option value="{{$detail->barang->nama}}"
									data-id="{{$detail->id}}"
									data-unit-sisa="{{$detail->unit}}"
									>{{$detail->barang->nama}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="unit-penitipan">Unit</label>
				<input type="text" class="form-control data-penitipan" name="unit"
							 id="unit-penitipan"/>
			</div>
			<p class="bg-info notification hidden">
				<strong>Unit tersisa</strong> <span id="unit-sisa"></span>
			</p>

			<button type="submit" class="btn btn-default" id="tambah-penitipan">Tambahkan ke Tabel</button>
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
			<button type="submit" class="btn btn-default pull-right" role="submit">Submit</button>
		</div>
	</div>

</form>
@stop