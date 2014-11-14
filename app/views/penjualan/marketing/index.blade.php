@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form role="form">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="jenis_konsumen" id="jenis-konsumen"> Konsumen tetap
                    </label>
                </div>
                <div id="nama-konsumen">
                <label for="nama-konsumen">Nama Konsumen</label>
                <select class="form-control" name="nama_konsumen">
                    <option>Hasta Ragil | 08979400191 </option>
                    <option>Astuti | 08979400191 </option>
                    <option>Bima | 08979400191 </option>
                </select>
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
                <select class="form-control data" name="nama_konsumen" id="barang">
                    <option value="Besi">Besi</option>
                    <option value="Kayu">Kayu</option>
                    <option value="Atap">Atap</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control data" name="unit" id="unit">
            </div>
            <p class="bg-info notification">
                <strong>Stok tersisa</strong> 700
            </p>
            <div class="form-group">
                <label for="harga-satuan">Harga Satuan</label>
            <div class="input-group">
            <div class="input-group-addon">Rp.</div>
                <input type="text" class="form-control data" name="harga_satuan" id="harga-satuan">
                </div>
            </div>
            <p class="bg-info notification">
            <strong>Range Harga</strong> 7300-7400
            </p>
            <button type="submit" class="btn btn-default" id="tambah">Tambahkan Barang</button>
        </form>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="data">
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
                <td id="total-harga-barang">2000</td>
            </tr>
            </tfoot>
            <tbody data-last-id="2">
                <tr>
                    <td>1</td>
                    <td>Besi</td>
                    <td>7300</td>
                    <td>100</td>
                    <td class="harga-barang">730000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kayu</td>
                    <td>9000</td>
                    <td>10</td>
                    <td class="harga-barang">90000</td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-default pull-right">Submit</button>
    </div>
</div>
<hr/>
@stop