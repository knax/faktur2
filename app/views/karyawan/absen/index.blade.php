@extends('layout.main')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Absen pada hari {{$tanggal}}</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-4 col-md-offset-8">
		<div class="pull-right">
			<form action="/karyawan/absen" class="form-inline">
				<div class="form-group">
					<input type="date" id="tanggal" name="tanggal" class="form-control" value="{{$tanggalRaw}}"/>
				</div>
				<button role="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
			<tr>
				<th rowspan="2" class="text-center">No</th>
				<th rowspan="2" class="text-center">Nama</th>
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
				@if($karyawan->ambilAbsen($tanggalRaw)->kehadiran == 'tidak')
				<td><a href="/karyawan/absen/{{$karyawan->id}}/tidak/{{{$tanggalRaw}}}" class="btn btn-success">Tidak Masuk</a></td>
				@else
				<td><a href="/karyawan/absen/{{$karyawan->id}}/tidak/{{{$tanggalRaw}}}" class="btn btn-default">Tidak Masuk</a></td>
				@endif
				@if($karyawan->ambilAbsen($tanggalRaw)->kehadiran == 'setengah_hari')
				<td><a href="/karyawan/absen/{{$karyawan->id}}/setengah_hari/{{{$tanggalRaw}}}" class="btn btn-success">Setengah Hari</a></td>
				@else
				<td><a href="/karyawan/absen/{{$karyawan->id}}/setengah_hari/{{{$tanggalRaw}}}" class="btn btn-default">Setengah Hari</a></td>
				@endif
				@if($karyawan->ambilAbsen($tanggalRaw)->kehadiran == 'masuk')
				<td><a href="/karyawan/absen/{{$karyawan->id}}/masuk/{{{$tanggalRaw}}}" class="btn btn-success">Masuk</a></td>
				@else
				<td><a href="/karyawan/absen/{{$karyawan->id}}/masuk/{{{$tanggalRaw}}}" class="btn btn-default">Masuk</a></td>
				@endif
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop