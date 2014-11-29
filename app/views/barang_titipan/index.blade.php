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
      <th>Nomor Faktur</th>
      </thead>
      <tbody>
      @foreach($listBarangTitipan as $barangTitipan)
      <tr data-id="{{$barangTitipan->id}}">
        <td>{{$barangTitipan->penjualan->id}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop