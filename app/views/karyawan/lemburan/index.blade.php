@extends('layout.main')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Lemburan pada hari {{$tanggal}}</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<th>No</th>
				<th>Nama</th>
				<th>Lemburan (jam)</th>
				<th>Uang Makan</th>
			</thead>
			<tbody>
			@foreach($listLemburan as $key => $lemburan)
			<tr>
				<td>{{$key + 1}}</td>
				<td>{{$lemburan->karyawan->nama}}</td>
				<td>{{gmdate("H:i", $lemburan->detik)}}</td>
				<td>{{$lemburan->uang_makan}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop