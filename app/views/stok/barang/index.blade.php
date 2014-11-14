@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>List Barang</h2>
        <table class="table table-bordered">
            <thead>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga Modal</th>
                <th>Batas Keuntungan Bawah</th>
                <th>Batas Keuntungan Atas</th>
                <th>Range Keuntungan</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Besi</td>
                    <td>4000</td>
                    <td>4%</td>
                    <td>7%</td>
                    <td>4100-4200</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kayu</td>
                    <td>7000</td>
                    <td>3%</td>
                    <td>8%</td>
                    <td>7300-7600</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Atap</td>
                    <td>9000</td>
                    <td>5%</td>
                    <td>8%</td>
                    <td>9400-9800</td>
                </tr>
            </tbody>
        </table>
        <a href="/stok/barang/tambah" type="submit" class="btn btn-default pull-right">Tambah Barang</a>
    </div>
</div>
@stop