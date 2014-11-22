@extends('layout.main')
@section('content')
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
			<tr>
				<th rowspan="2" class="text-center">No</th>
				<th rowspan="2" class="text-center">Tanggal</th>
				<th colspan="3" class="text-center">Masuk</th>
			</tr>
			<tr>
				<th class="text-center">Tidak</th>
				<th class="text-center">Setengah Hari</th>
				<th class="text-center">Masuk</th>
			</tr>
			</thead>
			<tbody>
			@foreach($listKaryawan as $karyawan)
			<tr>
				<td>{{$karyawan->id}}</td>
				<td>{{$karyawan->nama}}</td>
				<td><button class="btn btn-primary">Tidak Masuk</button></td>
				<td><button class="btn btn-primary">Setengah Hari</button></td>
				<td><button class="btn btn-primary">Masuk</button></td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop