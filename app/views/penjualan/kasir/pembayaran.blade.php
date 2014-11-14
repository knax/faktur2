@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Nomor Faktur 23123</h2>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="nama-konsumen">Nama Konsumen</label>
            <p id="nama-konsumen" class="form-control-static">Hasta Ragil</p>
        </div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <h3>Barang yang dipesan</h3>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <th>Nomor</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Kuantitas</th>
                <th>Harga</th>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Total Harga :</strong></td>
                <td>2000</td>
            </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Besi</td>
                    <td>7300</td>
                    <td>100</td>
                    <td>730000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kayu</td>
                    <td>9000</td>
                    <td>10</td>
                    <td>90000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <h3>Metode Pembayaran</h3>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="radio">
            <label>
                <input type="radio" name="metode_pembayaran" id="tunai" value="tunai" checked>
                Tunai
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="metode_pembayaran" id="transfer" value="transfer">
                Transfer Bank
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="metode_pembayaran" id="merchant" value="merchant">
                Merchant
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="metode_pembayaran" id="hutang" value="hutang">
                Hutang
            </label>
        </div>
        <button type="submit" class="btn btn-default pull-right">Submit</button>
    </div>
</div>
<hr/>
@stop