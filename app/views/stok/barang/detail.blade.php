@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Detail</h2>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="nama-barang">Nama Barang</label>

      <p id="nama-barang" class="form-control-static">{{$barang->nama}}</p>
    </div>
    <div class="form-group">
      <label for="harga-modal">Harga Modal</label>

      <p id="harga-modal" class="form-control-static">{{$barang->harga}}</p>
    </div>
    <div class="form-group">
      <label for="batas-keuntungan-bawah">Batas Keuntungan Bawah</label>

      <p id="batas-keuntungan-bawah" class="form-control-static">{{$barang->batas_keuntungan_bawah}}%</p>
    </div>
    <div class="form-group">
      <label for="batas-keuntungan-atas">Batas Keuntungan Atas</label>

      <p id="batas-keuntungan-atas" class="form-control-static">{{$barang->batas_keuntungan_atas}}%</p>
    </div>
    <button class="btn btn-default">Delete</button>
    <a href="/stok/barang/{{$barang->id}}/edit" class="btn btn-default">Edit</a>
  </div>
</div>
@stop