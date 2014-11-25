@extends('layout.main')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2>List Barang Titipan</h2>
    </div>
</div>

<hr/>

<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-clickable">
      <thead>
      <th>Nomor</th>
      <th>Nama Barang</th>
      <th>Nama Penitip</th>
      <th>Unit</th>
      </thead>
      <tbody>
      @foreach($listBarangTitipan as $barangTitipan)
      <tr data-id="{{$barangTitipan->id}}">
        <td>{{$barangTitipan->id}}</td>
        <td>{{$barangTitipan->nama_barang}}</td>
        <td>{{$barangTitipan->nama_penitip}}</td>
        <td>{{$barangTitipan->unit}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop