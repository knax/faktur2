@extends('layout.main')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Daftar Penjualan</h2>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Unit</th>
			<th>Tanggal</th>
			</thead>
			<tbody>
			@foreach($pelanggan->penjualan as $penjualan)
			@foreach($penjualan->detail as $detail)
			<tr>
				<td>{{$detail->barang->nama}}</td>
				<td>{{$detail->harga}}</td>
				<td>{{$detail->unit}}</td>
				<td>{{$penjualan->tanggal_penjualan}}</td>
			</tr>
			@endforeach
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop