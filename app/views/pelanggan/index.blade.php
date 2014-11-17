@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Daftar Pelanggan</h2>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-clickable">
      <thead>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Nomor Telepon</th>
      <th>Piutang</th>
      </thead>
      <tbody>
      @foreach($listPelanggan as $pelanggan)
      <tr data-id="{{$pelanggan->id}}">
        <td>{{$pelanggan->nama}}</td>
        <td>{{$pelanggan->alamat}}</td>
        <td>{{$pelanggan->nomor_telepon}}</td>
        <td>{{toRupiah($pelanggan->piutang)}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop