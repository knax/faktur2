@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Stok Barang</h2>
    <table class="table table-bordered">
      <thead>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Harga Barang</th>
      <th>Sisa Stok</th>
      <th>Harga Stok</th>
      </thead>
      <tfoot>
      <tr>
        <td class="text-right" colspan="4"><strong>Total Harga Stok</strong></td>
        <td>{{toRupiah($totalHargaStok)}}</td>
      </tr>
      </tfoot>
      <tbody>
      @foreach ($listBarang as $barang)
      <tr>
        <td>{{$barang->id}}</td>
        <td>{{$barang->nama}}</td>
        <td>{{toRupiah($barang->harga)}}</td>
        <td>{{$barang->stokTerakhir()->stok}}</td>
        <td>{{toRupiah($barang->harga * $barang->stokTerakhir()->stok)}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop