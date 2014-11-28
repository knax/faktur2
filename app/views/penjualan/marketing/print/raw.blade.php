<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/normalize.css"/>
	<style>
		* {
			box-sizing: border-box;
			font-size: 11pt;
		}

		div#print-container {
			position: relative;
			margin: 10mm;
			/*height: 297mm;*/
			height: 277mm;
			width: 185mm;
		}

		header {
			text-align: center;
		}

		table#atas {
			margin-top: 50px;
		}

		.spacer {
			width: 100px;
		}

		table#main {
			width: 100%;
		}
		table#main td {
			padding: 5px;
		}
	</style>
</head>
<body>
<div id="print-container">
	<header>
		<h2>Mega Beton</h2>
		<span> Jl.Raya Caman No.34, Jatibening, Bekasi, Telp.021-84971212</span>
	</header>
	<table id="atas">
		<tbody>
		<tr>
			<td>No</td>
			<td>:</td>
			<td>{{$penjualan->id}}</td>
			<td class="spacer">&nbsp;</td>
			<td>Kepada Yth:</td>
		</tr>
		<tr>
			<td>Pelanggan</td>
			<td>:</td>
			<td>{{$penjualan->pelanggan->nama}}</td>
			<td class="spacer">&nbsp;</td>
			<td rowspan="4">
				<p>
					@foreach($penjualan->pelanggan->alamatFormatted() as $alamat)
					{{$alamat}}
					<br/>
					@endforeach
				</p>
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td>{{$penjualan->tanggal_penjualan}}</td>
		</tr>
		</tbody>
	</table>

	<table id="main" border="1">
		<thead>
		<th>Nomor</th>
		<th>Nama Barang</th>
		<th>Harga Satuan</th>
		<th>Kuantitas</th>
		<th>Harga</th>
		</thead>
		<tfoot>
		<td colspan="4" style="text-align: right"><strong>Total Harga:</strong></td>
		<td>{{toRupiah($penjualan->totalHarga())}}</td>
		</tfoot>
		<tbody>
		@foreach($penjualan->detail as $key => $detail)
		<tr>
			<td>{{$key + 1}}</td>
			<td>{{$detail->barang->nama}}</td>
			<td>{{$detail->harga}}</td>
			<td>{{$detail->unit}}</td>
			<td>{{toRupiah($detail->harga * $detail->unit)}}</td>
		</tr>
		@endforeach
		</tbody>
	</table>
</div>
<!-- /#print-container -->

</body>
</html>