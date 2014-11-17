@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Barang Terjual untuk tanggal {{$tanggal}}</h2>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-md-offset-8 col-md-4">
    <form class="form-horizontal" action="/keuntungan/barang_terjual" method="post">
      <div class="form-group">
        <label for="tanggal-mulai" class="control-label col-md-4">Tanggal Mulai</label>

        <div class="col-md-8">
          <input type="date" id="tanggal-mulai" class="form-control date" name="tanggal_mulai"/>
        </div>
      </div>
      <div class="form-group">
        <label for="tanggal-akhir" class="control-label col-md-4">Tanggal Mulai</label>

        <div class="col-md-8">
          <input type="date" id="tanggal-akhir" class="form-control date" name="tanggal_akhir"/>
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
      <th>Nama Barang</th>
      <th>Total Barang Terjual</th>
      </thead>
      <tbody>
      @foreach($listBarangTerjual as $barangTerjual)
      <tr>
        <td>{{$barangTerjual['nama_barang']}}</td>
        <td>{{$barangTerjual['unit_terjual']}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop