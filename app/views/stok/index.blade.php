@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Stok Barang</h2>
        <table class="table table-bordered">
            <thead>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Sisa Stok</th>
                <th>Harga Stok</th>
            </thead>
            <tfoot>
                <tr>
                    <td class="text-right" colspan="4"><strong>Total Harga Stok</strong></td>
                    <td>{{toRupiah($totalHargaStok)}}</td>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($barang as $baris)
                <tr>
                    <td>{{$baris->id}}</td>
                    <td>{{$baris->nama}}</td>
                    <td>{{toRupiah($baris->harga)}}</td>
                    <td>{{$baris->stok}}</td>
                    <td>{{toRupiah($baris->harga * $baris->stok)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop