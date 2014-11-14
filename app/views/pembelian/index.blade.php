@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Pembelian</h2>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <form role="form">
            <div class="form-group">
                <label for="nama">Nama Supplier</label>
                <input type="text" class="form-control"  name="nama" id="nama">
            </div>
            <div class="form-group">
                <label for="jatuh_tempo">Jatuh Tempo (hari)</label>
                <input type="text" class="form-control"  name="jatuh_tempo" id="jatuh_tempo">
            </div>
            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran</label>
                <div id="metode_pembayaran">
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
                            <input type="radio" name="metode_pembayaran" id="hutang" value="hutang">
                            Hutang
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <form role="form">
            <div class="form-group">
                <label for="barang">Nama Barang</label>
                <select class="form-control" name="barang" id="barang">
                    <option>Besi</option>
                    <option>Kayu</option>
                    <option>Atap</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control"  name="unit" id="unit">
            </div>
            <button type="submit" class="btn btn-default">Tambahkan Barang</button>
        </form>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <th>Nomor</th>
                <th>Nama Barang</th>
                <th>Kuantitas</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Besi</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kayu</td>
                    <td>10</td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-default pull-right">Submit</button>
    </div>
</div>
@stop