@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Daftar Pelanggan</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-clickable">
            <thead>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Piutang</th>
            </thead>
            <tbody>
                <tr>
                    <td>Hasta Ragil</td>
                    <td>Jambu Air I No 16 Kota Baru Bekasi Barat</td>
                    <td>00829312312</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Astuti</td>
                    <td>bla bla</td>
                    <td>00829312312</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Bima Setyo</td>
                    <td>bla bla</td>
                    <td>00829312312</td>
                    <td>4000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop