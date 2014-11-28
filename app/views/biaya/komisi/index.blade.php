@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Komisi untuk hari {{ $tanggal }}</h2>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form action="/biaya/komisi" method="POST">

      <div class="form-group">

        <label for="tipe-pembayaran">Jenis Pembayaran</label>

        <div id="tipe-pembayaran">
          <div class="radio">
            <label>
              <input type="radio" name="jenis_pembayaran" id="tunai" value="tunai" checked>
              Tunai
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="jenis_pembayaran" id="non-tunai" value="non-tunai">
              Non Tunai
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="nominal">Nominal Pembayaran</label>

        <div class="input-group">
          <div class="input-group-addon">Rp.</div>
          <input type="text" class="form-control" id="nominal" name="nominal"/>
        </div>
      </div>
      <button type="submit" class="btn btn-default pull-right">Submit</button>
    </form>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
      <th>Tipe</th>
      <th>Nominal</th>
      </thead>
      <tfoot>
      <tr>
        <td class="text-right">
          <strong>Total</strong>
        </td>
        <td>
          {{ toRupiah($total) }}
        </td>
      </tr>
      </tfoot>
      <tbody>
      @foreach($listKomisi as $komisi)
      <tr>
        <td>{{$komisi->tipe}}</td>
        <td>{{toRupiah($komisi->nominal)}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop