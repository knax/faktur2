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
                <tr data-id="231">
                    <td>231</td>
                    <td>Hasta Ragil</td>
                    <td>231231</td>
                </tr>
                <tr data-id="231">
                    <td>2311</td>
                    <td>Astuti</td>
                    <td>9002310</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop