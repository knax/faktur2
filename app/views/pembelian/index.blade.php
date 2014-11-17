@extends('layout.main')
@section('content')

<form role="form" method="POST" action="/pembelian">
  <div class="row">
    <div class="col-md-12">
      <h2>Pembelian</h2>
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="nama">Nama Supplier</label>
        <input type="text" class="form-control" name="nama" id="nama">
      </div>
      <div class="form-group">
        <label for="jatuh_tempo">Jatuh Tempo (hari)</label>
        <input type="text" class="form-control" name="jatuh_tempo" id="jatuh_tempo">
      </div>
      <div class="form-group">
        <label for="metode_pembayaran">Metode Pembayaran</label>

        <div id="metode_pembayaran">
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
              <input type="radio" name="metode_pembayaran" id="hutang" value="hutang">
              Hutang
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="barang-pembelian">Nama Barang</label>
        <select class="form-control data-pembelian" name="id_barang" id="barang-pembelian">
          @foreach($listBarang as $barang)
          <option value="{{$barang->nama}}" data-stok="{{$barang->stok()->stok}}" data-harga="{{$barang->harga}}"
                  data-id="{{$barang->id}}">{{$barang->nama}}
          </option>
          @endforeach
        </select>
      </div>

      <p class="bg-info notification">
        <strong>Harga Satuan</strong> <span id="harga-satuan"></span>
      </p>

      <div class="form-group">
        <label for="unit-pembelian">Unit</label>
        <input type="text" class="form-control data-pembelian" name="unit" id="unit-pembelian">
      </div>
      <button type="submit" class="btn btn-default" id="tambah-pembelian">Tambahkan Barang</button>
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <input type="text" name="total_harga" id="total-harga" hidden/>
      <table class="table table-bordered" id="data-pembelian">
        <thead>
        <th>Nomor</th>
        <th>Nama Barang</th>
        <th>Kuantitas</th>
        <th>Harga Satuan</th>
        <th>Harga</th>
        </thead>
        <tfoot>
        <tr>
          <td colspan="4" class="text-right"><strong>Total Harga :</strong></td>
          <td id="total-harga-barang">Rp. 0,-</td>
        </tr>
        </tfoot>
        <tbody data-last-id="0">
        </tbody>
      </table>
      <button type="submit" class="btn btn-default pull-right">Submit</button>
    </div>
  </div>
</form>
@stop