@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>List penjualan yang belum dibayarkan</h2>
        <hr/>
        <table class="table table-bordered table-clickable">
            <thead>
                <th>Nomor Faktur</th>
                <th>Nama Konsumen</th>
                <th>Harga Total</th>
            </thead>
            <tbody>
                @foreach($daftarPembelian as $pembelian)
                <tr data-id="{{$pembelian->id}}">
                    <td>{{$pembelian->id}}</td>
                    <td>{{$pembelian->pelanggan()->nama}}</td>
                    <td>{{$pembelian->totalHarga()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop