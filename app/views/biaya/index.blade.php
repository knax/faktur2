@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Biaya untuk hari {{ $tanggal }}</h2>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form role="form" method="post" action="/biaya">
      <div class="form-group">
        <label for="nominal">Nominal</label>
        <div class="input-group">
          <div class="input-group-addon">Rp.</div>
          <input type="text" name="nominal" class="form-control" id="nominal"/>
        </div>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" id="keterangan">
      </div>
      <button type="submit" class="btn btn-default">Tambahkan Data</button>
    </form>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
      <th>Keterangan Biaya</th>
      <th>Nominal</th>
      </thead>
      <tfoot>
      <tr>
        <td class="text-right">
          <strong>Total Biaya</strong>
        </td>
        <td>
          {{ toRupiah($totalBiaya) }}
        </td>
      </tr>
      </tfoot>
      <tbody>
      @foreach($listBiaya as $biaya)
      <tr>
        <td>{{$biaya->keterangan}}</td>
        <td>{{toRupiah($biaya->nominal)}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop