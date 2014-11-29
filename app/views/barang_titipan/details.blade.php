@extends('layout.main')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Nomor faktur {{$barangTitipan->penjualan->id}}</h2>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<h3>Barang yang dititipkan</h3>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
			<th>Nomor</th>
			<th>Nama Barang</th>
			<th>Unit</th>
			</thead>
			<tbody>
			@foreach($barangTitipan->detail as $key => $barangTitipanDetail)
			<tr data-id="{{$barangTitipanDetail->id}}">
				<td>{{$key + 1}}</td>
				<td>{{$barangTitipanDetail->barang->nama}}</td>
				<td>{{$barangTitipanDetail->unit}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<a href="{{URL::route('barang_titipan.surat_jalan_form', ['id' => $barangTitipan->id ])}}" class="btn btn-primary">Buat Surat Jalan</a>
	</div>
</div>
@stop