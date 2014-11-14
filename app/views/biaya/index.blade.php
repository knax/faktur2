@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Biaya untuk hari Senin, 12 November 2012</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form role="form">
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="text" name="nominal" class="form-control" id="nominal"/>
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
                    <strong>Total Harga</strong>
                </td>
                <td>
                    1000000
                </td>
            </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Bensin</td>
                    <td>50000</td>
                </tr>
                <tr>
                    <td>Rokok</td>
                    <td>5000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop