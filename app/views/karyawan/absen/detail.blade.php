@extends('layout.main')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Absen karyawan {{$karyawan->nama}}</h2>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
			<td>Tanggal</td>
			<td>Tipe</td>
			</thead>
			<tbody>
			@foreach($listAbsen as $absen)
			<tr>
				<td>{{$absen->tanggal}}</td>
				<td>{{$absen->kehadiran}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop