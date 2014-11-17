@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Piutang pelanggan {{$pelanggan->nama}}</h2>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <label for="keterangan">Keterangan:</label>

    <p class="form-control-static" id="keterangan">{{$pelanggan->keterangan}}</p>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <form action="/pelanggan/{{$pelanggan->id}}" method="POST">
      <div class="form-group">
        <label for="pembayaran-piutang">Pembayaran Piutang</label>

        <div class="input-group">
          <div class="input-group-addon">Rp.</div>
          <input type="text" name="pembayaran_piutang" id="pembayaran-piutang" class="form-control"/>
        </div>
      </div>
      <p class="bg-info notification">
        <strong>Banyaknya piutang</strong> : {{toRupiah($pelanggan->piutang()->sisa_piutang)}}
      </p>

      <div class="form-group">
        <label for="metode-pembayaran">Metode Pembayaran</label>

        <div id="metode-pembayaran">
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
        </div>
      </div>
      <button type="submit" class="btn btn-default pull-right">Submit</button>
    </form>
  </div>
</div>
@stop