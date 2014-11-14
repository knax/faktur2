@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Stok Barang</h2>
        <table class="table table-bordered">
            <thead>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Sisa Stok</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Besi</td>
                    <td>122</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kayu</td>
                    <td>133</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Atap</td>
                    <td>443</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop