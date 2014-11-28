@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Daftar Hutang</h2>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-clickable">
      <thead>
      <th>Nomor</th>
      <th>Nama Supplier</th>
      <th>Hutang</th>
      <th>Jatuh Tempo</th>
      </thead>
      <tbody>
      @foreach($listHutang as $hutang)
      <tr data-id="{{$hutang->id}}">
        <td>{{$hutang->id}}</td>
        <td>{{$hutang->pembelian->nama_supplier}}</td>
        <td>{{toRupiah($hutang->sisa_hutang)}}</td>
        <td>{{$hutang->jatuh_tempo}} ({{calculateDateDiffToNow($hutang->jatuh_tempo)}} hari)</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop