@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Daftar Hutang</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-clickable">
            <thead>
                <th>Nomor</th>
                <th>Nama Supplier</th>
                <th>Hutang</th>
                <th>Jatuh Tempo</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jaya Makmur</td>
                    <td>5000</td>
                    <td>01/09/2014 (45 hari)</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jaya Setia</td>
                    <td>50200</td>
                    <td>11/09/2014 (25 hari)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop