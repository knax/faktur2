@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Tambah Barang</h2>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <form action="/stok/barang" method="POST" role="form">
      <div class="form-group">
        <label for="nama-barang">Nama Barang</label>
        <input type="text" id="nama-barang" name="nama_barang" class="form-control"/>
      </div>
      <div class="form-group">
        <label for="harga-modal">Harga Modal</label>

        <div class="input-group">
          <div class="input-group-addon">Rp.</div>
          <input type="text" id="harga-modal" name="harga_modal" class="form-control"/>
        </div>
      </div>
      <div class="form-group">
        <label for="batas-keuntungan-bawah">Batas Keuntungan Bawah</label>

        <div class="input-group">
          <input type="text" id="batas-keuntungan-bawah" name="batas_keuntungan_bawah" class="form-control"/>

          <div class="input-group-addon">%</div>
        </div>
      </div>

      <div class="form-group">
        <label for="batas-keuntungan-atas">Batas Keuntungan Atas</label>

        <div class="input-group">
          <input type="text" id="batas-keuntungan-atas" name="batas_keuntungan_atas" class="form-control"/>

          <div class="input-group-addon">%</div>
        </div>
      </div>

      <div class="form-group">
        <label for="batas-keuntungan-atas">Stok</label>

          <input type="text" id="stok" name="stok" class="form-control"/>
      </div>
      </div>
      <button type="submit" class="btn btn-default pull-right">Submit</button>
    </form>
  </div>
</div>
@stop