@extends('layout.main')
@section('content')
<div class="row">
	<div class="col-md-12">
		<label for="tipe-pembayaran">Jenis Pembayaran</label>
		<div id="tipe-pembayaran">
			<div class="radio">
				<label>
					<input type="radio" name="jenis_pembayaran" id="tunai" value="tunai" checked>
					Tunai
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="jenis_pembayaran" id="non-tunai" value="non-tunai">
					Non Tunai
				</label>
			</div>
		</div>
		<div class="form-group">
			<label for="nominal">Nominal Pembayaran</label>
			<input type="text" class="form-control" id="nominal" name="nominal"/>
		</div>
		<button type="submit" class="btn btn-default pull-right">Submit</button>
	</div>
</div>
@stop