@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>List Barang</h2>
        <table class="table table-bordered table-clickable">
            <thead>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga Modal</th>
                <th>Batas Keuntungan Bawah</th>
                <th>Batas Keuntungan Atas</th>
                <th>Range Harga Satuan</th>
            </thead>
            <tbody>
                @foreach ($barang as $baris)
                <tr data-id="{{$baris->id}}">
                    <td>{{$baris->id}}</td>
                    <td>{{$baris->nama}}</td>
                    <td>{{$baris->harga}}</td>
                    <td>{{$baris->batas_keuntungan_bawah}}%</td>
                    <td>{{$baris->batas_keuntungan_atas}}%</td>
                    <td>{{$baris->rangeHarga()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/stok/barang/tambah" type="submit" class="btn btn-default pull-right">Tambah Barang</a>
    </div>
</div>
@stop