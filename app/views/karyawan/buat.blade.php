@extends('layout.main')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Buat Karyawan</h2>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-md-12">
		<form action="">
			<div class="form-group">
				<label for="nama-karyawan">Nama Karyawan</label>
				<input type="text" id="nama-karyawan" name="nama_karyawan" class="form-control"/>
			</div>

			<button role="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@stop