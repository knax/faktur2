<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/normalize.css"/>
	<style>
		* {
			box-sizing: border-box;
			font-family: 'Arial';
			font-size: 10pt;
		}

		p#notice {
			margin-top: 0px;
		}

		div#print-container {
			position: relative;
			margin-top: 0px;
			margin-left: 10mm;
			margin-right: 10mm;
			/*height: 297mm;*/
			/*height: 277mm;*/
			/*width: 185mm;*/
			height: 5.51in;
			width: 8.50in;
		}

		header {
			font-size: 10pt;
		}

		table#atas {
			margin-top: -10px;
			width: 100%;
		}

		.spacer {
			width: 100px;
		}

		table#main {
			margin-top: 10px;
			width: 100%;
			text-align: center;
		}

		table#main td {
			padding: 5px;
			font-size: 10pt;
		}

		table#main tr {
			padding: 5px;
			font-size: 10pt;
		}


		div#tanda-tangan {
			text-align: right;
		}

		span#hormat-kami {
			margin-bottom: 20px;
		}

		span {
			display: block;
		}

		#faktur-text {
			font-size: 20pt;
			text-align: center;
		}

		.border {
			border: 1px solid black;
		}
	</style>
</head>
<body>
<div id="print-container">
	<header>
		<span><strong>Mega Beton</strong></span>
		<span> Jl.Raya Caman No.34, Jatibening, Bekasi, Telp.021-84971212</span>
	</header>
	<h1 id="faktur-text">Faktur</h1>
	<table id="atas">
		<tbody>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{$penjualan->pelanggan->nama}}</td>
			<td>No</td>
			<td>:</td>
			<td>{{$penjualan->id}}</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>{{$penjualan->pelanggan->alamat}}</td>

			<td>Nama Marketing</td>
			<td>:</td>
			<td>{{$penjualan->nama_marketing}}</td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td>{{$penjualan->pelanggan->nomor_telepon}}</td>
			<td>Tanggal</td>
			<td>:</td>
			<td>{{$penjualan->tanggal_penjualan}}</td>
		</tr>
		</tbody>
	</table>

	<table id="main">
		<thead>
		<th class="border">Nomor</th>
		<th class="border">Nama Barang</th>
		<th class="border">Harga Satuan</th>
		<th class="border">Kuantitas</th>
		<th class="border">Harga</th>
		</thead>
		<tfoot>
		<tr>
			<td colspan="3" class="noborder">&nbsp;</td>
			<td class="border" style="text-align: right"><strong>Total Harga:</strong></td>
			<td class="border">{{toRupiah($penjualan->totalHarga())}}</td>
		</tr>
		<tr>
			<td colspan="3" class="noborder">&nbsp;</td>
			<td class="border" style="text-align: right">Diskon:</td>
			<td class="border">{{toRupiah($penjualan->diskon)}}</td>
		</tr>
		<tr>
			<td colspan="3" class="noborder">&nbsp;</td>
			<td class="border" style="text-align: right">Ongkos Kirim:</td>
			<td class="border">{{toRupiah($penjualan->ongkir)}}</td>
		</tr>
		<tr>
			<td colspan="3" class="noborder">&nbsp;</td>
			<td class="border" style="text-align: right"><strong>Grand Total:</strong></td>
			<td class="border">{{toRupiah($penjualan->grandTotal())}}</td>
		</tr>
		</tfoot>
		<tbody>
		@foreach($penjualan->detail as $key => $detail)
		<tr>
			<td class="border">{{$key + 1}}</td>
			<td class="border">{{$detail->barang->nama}}</td>
			<td class="border">{{toRupiah($detail->harga)}}</td>
			<td class="border">{{$detail->unit}}</td>
			<td class="border">{{toRupiah($detail->harga * $detail->unit)}}</td>
		</tr>
		@endforeach
		</tbody>
	</table>
	<div id="footer">
		<p id="notice">*Mohon barang dihitung dengan teliti, barang yang sudah dibeli tidak dapat dikembalikan</p>

		<div id="tanda-tangan">
			<p>
				<span id="hormat-kami">Hormat Kami</span>
				<span id="nama-marketing">{{$penjualan->nama_marketing}}</span>
			</p>
		</div>
	</div>
</div>
<!-- /#print-container -->

</body>
</html>