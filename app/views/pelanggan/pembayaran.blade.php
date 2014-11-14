@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Piutang pelanggan Hasta Ragil</h2>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <label for="keterangan">Keterangan:</label>
        <p class="form-control-static" id="keterangan">{{$pelanggan->keterangan}}</p>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="pembayaran_hutang">Pembayaran Piutang</label>
            <div class="input-group">
            <div class="input-group-addon">Rp.</div>
            <input type="text" name="pembayaran_hutang" id="pembayaran-hutang" class="form-control"/>
            </div>
        </div>
        <p class="bg-info notification">
            <strong>Banyaknya piutang</strong> : {{toRupiah($pelanggan->piutang)}}
        </p>
        <div class="form-group">
            <label for="metode-pembayaran">Metode Pembayaran</label>
            <div id="metode-pembayaran">
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
        <button type="submit" class="btn btn-default pull-right">Submit</button>
    </div>
</div>
@stop