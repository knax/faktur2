@extends('layout.main')
@section('content')
<form role="form" action="/marketing/jual" method="POST" id="form-marketing">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="jenis_konsumen" id="jenis-konsumen"> Konsumen tetap
					</label>
				</div>
				<div id="nama-konsumen">
					<label for="nama-konsumen">Nama Konsumen</label>
					<select class="form-control" name="id_konsumen">
						@foreach($listPelanggan as $pelanggan)
						<option value="{{$pelanggan->id}}">{{$pelanggan->nama}}</option>
						@endforeach
					</select>
				</div>
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
				<label for="nomor-telepon">Nomor Telepon</label>
				<input type="text" id="nomor-telepon" name="nomor_telepon" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="diskon">Diskon</label>
				<input type="text" id="diskon" name="diskon" class="form-control" value="0"/>
			</div>
			<div class="form-group">
				<label for="ongkir">Ongkir</label>
				<input type="text" id="ongkir" name="ongkir" class="form-control" value="0"/>
			</div>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="barang">Nama Barang</label>
				<select class="form-control data" name="id_barang" id="barang">
					@foreach($listBarang as $barang)
					<option value="{{$barang->nama}}" data-stok="{{$barang->stokTerakhir()->stok}}"
									data-range-harga="{{$barang->rangeHarga()}}"
									data-id="{{$barang->id}}" data-harga-bawah="{{$barang->hargaBawah()}}"
									data-harga-atas="{{$barang->hargaAtas()}}">{{$barang->nama}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="unit">Unit</label>
				<input type="text" class="form-control data" name="unit" id="unit">
			</div>
			<p class="bg-info notification" class="hidden">
				<strong>Stok tersisa</strong> <span id="stok-sisa"></span>
			</p>

			<div class="form-group">
				<label for="harga-satuan">Harga Satuan</label>

				<div class="input-group">
					<div class="input-group-addon">Rp.</div>
					<input type="text" class="form-control data" name="harga_satuan" id="harga-satuan">
				</div>
			</div>
			<p class="bg-info notification">
				<strong>Range Harga</strong> <span id="range-harga"></span>
			</p>
			<button type="submit" class="btn btn-default" id="tambah">Tambahkan Barang</button>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="data">
				<thead>
				<th>Nomor</th>
				<th>Nama Barang</th>
				<th>Kuantitas</th>
				<th>Harga Satuan</th>
				<th>Harga</th>
				</thead>
				<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Total Harga :</strong></td>
					<td id="total-harga-barang">Rp. 0,-</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right">Diskon :</td>
					<td id="diskon-text">Rp. 0,-</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right">Ongkos Kirim :</td>
					<td id="ongkir-text"></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Grand Total :</strong></td>
					<td id="grand-total"></td>
				</tr>
				</tfoot>
				<tbody data-last-id="0">
				</tbody>
			</table>
			<button type="submit" class="btn btn-default pull-right" role="submit">Submit</button>
		</div>
	</div>

</form>
<hr/>
@stop