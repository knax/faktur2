@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Nomor Faktur {{$penjualan->id}}</h2>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="nama-konsumen">Nama Konsumen</label>

      <p id="nama-konsumen" class="form-control-static">{{$penjualan->pelanggan()->nama}}</p>
    </div>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <h3>Barang yang dipesan</h3>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
      <th>Nomor</th>
      <th>Nama Barang</th>
      <th>Harga Satuan</th>
      <th>Kuantitas</th>
      <th>Harga</th>
      </thead>
      <tfoot>
      <tr>
        <td colspan="4" class="text-right"><strong>Total Harga :</strong></td>
        <td>{{toRupiah($penjualan->totalHarga())}}</td>
      </tr>
      </tfoot>
      <tbody>
      @foreach($penjualan->listBarangTerjual() as $key => $penjualanDetail)
      <tr>
        <td>{{$key + 1}}</td>
        <td>{{$penjualanDetail->barang()->nama}}</td>
        <td>{{toRupiah($penjualanDetail->harga)}}</td>
        <td>{{$penjualanDetail->unit}}</td>
        <td>{{toRupiah($penjualanDetail->harga * $penjualanDetail->unit)}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <h3>Metode Pembayaran</h3>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <form action="/penjualan/kasir/{{$penjualan->id}}" method="POST">
      <div class="radio">
        <label>
          <input type="radio" name="metode_pembayaran" id="tunai" value="tunai" checked>
          Tunai
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="metode_pembayaran" id="transfer" value="transfer">
          Transfer Bank
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="metode_pembayaran" id="merchant" value="merchant">
          Merchant
        </label>
      </div>
      @if($penjualan->bukanPelangganTetap())
      <div class="radio">
        <label>
          <input type="radio" name="metode_pembayaran" id="hutang" value="hutang">
          Hutang
        </label>
      </div>

      <div class="form-group">
        <label for="jatuh-tempo">Jatuh Tempo (Hari)</label>
        <input type="text" class="form-control data" name="jatuh_tempo" id="jatuh-tempo">
      </div>
      @endif
      <button type="submit" class="btn btn-default pull-right">Submit</button>
    </form>
  </div>
</div>
<hr/>
@stop