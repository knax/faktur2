@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Pembayaran Hutang ke {{$hutang->pembelian->nama_supplier}}</h2>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <form action="/pembelian/hutang/{{$hutang->id}}" method="POST">
      <div class="form-group">
        <label for="pembayaran-hutang">Pembayaran Hutang</label>

        <div class="input-group">
          <div class="input-group-addon">Rp.</div>
          <input type="text" name="pembayaran_hutang" id="pembayaran-hutang" class="form-control"/>
        </div>
      </div>
      <p class="bg-info notification">
        <strong>Banyaknya hutang</strong> : {{toRupiah($hutang->sisa_hutang)}}
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