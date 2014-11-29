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
		}

		table#atas {
			margin-top: 10px;
		}

		.spacer {
			width: 100px;
		}

		table#main {
			margin-top:10px;
			width: 100%;
		}

		table#main td {
			padding: 5px;
		}

		div#tanda-tangan {
			text-align: right;
		}

		span#hormat-kami {
			margin-bottom: 50px;
		}

		span {
			display: block;
		}

		#surat-jalan-text {
			text-align: center;
		}
	</style>
</head>
<body>
<div id="print-container">
	<header>
		<span><strong>Mega Beton</strong></span>
		<span> Jl.Raya Caman No.34, Jatibening, Bekasi, Telp.021-84971212</span>
		<h1 id="surat-jalan-text">Surat Jalan</h1>
	</header>
	<table id="atas">
		<tbody>
		<tr>
			<td>No</td>
			<td>:</td>
			<td>{{$suratJalan->id}}</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{$suratJalan->nama}}</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>{{$suratJalan->alamat}}</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td>{{(new DateTime())->format('Y-m-d')}}</td>
		</tr>
		</tbody>
	</table>

	<table id="main" border="1">
		<thead>
		<th>Nomor</th>
		<th>Nama Barang</th>
		<th>Jumlah</th>
		</thead>
		<tbody>
		@foreach($suratJalan->detail as $key => $detail)
		<tr>
			<td>{{$key + 1}}</td>
			<td>{{$detail->barang->nama}}</td>
			<td>{{$detail->unit}}</td>
		</tr>
		@endforeach
		</tbody>
	</table>

	<div id="footer">
		<p>Mohon barang dihitung dengan teliti, barang yang sudah dibeli tidak dapat dikembalikan</p>

		<div id="tanda-tangan">
			<p>
				<span id="hormat-kami">Hormat Kami</span>
				<span id="nama-marketing">{{$suratJalan->penulis}}</span>
			</p>
		</div>
	</div>
</div>
<!-- /#print-container -->

</body>
</html>