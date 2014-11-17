@extends('layout.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2>Kas Harian</h2>
  </div>
</div>
<div class="row">
<div class="col-md-12">
<table class="table table-bordered">
<tbody>
<tr>
  <td><strong>Kas Awal</strong></td>
  <td>{{$data['kas_awal']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td><strong>Saldo Awal Bank</strong></td>
  <td>{{$data['saldo_awal']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td><strong>Total Penjualan</strong></td>
  <td>{{$data['total_penjualan']}}</td>
</tr>
<tr>
  <td><strong>HPP Hari Ini</strong></td>
  <td>{{$data['hpp']}}</td>
</tr>
<tr>
  <td><strong>Laba Kotor</strong></td>
  <td>{{$data['laba_kotor']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2">
    <strong>Stok</strong>
  </td>
</tr>
<tr>
  <td><strong>Stok Awal</strong></td>
  <td>{{$data['stok_awal']}}</td>
</tr>
<tr>
  <td>Terjual Hari Ini</td>
  <td>{{$data['stok_terjual']}}</td>
</tr>
<tr>
  <td>Beli Barang Hari Ini</td>
  <td>{{$data['stok_terbeli']}}</td>
</tr>
<tr>
  <td><strong>Stok Akhir</strong></td>
  <td>{{$data['stok_akhir']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2">
    <strong>Penjualan</strong>
  </td>
</tr>
<tr>
  <td>Penjualan Tunai</td>
  <td>{{$data['penjualan_tunai']}}</td>
</tr>
<tr>
  <td>Transfer</td>
  <td>{{$data['penjualan_transfer']}}</td>
</tr>
<tr>
  <td><strong>Total Penjualan Tunai</strong></td>
  <td>{{$data['total_penjualan_tunai']}}</td>
</tr>
<tr>
  <td><strong>Total Penjualan</strong></td>
  <td>{{$data['total_penjualan_tambah']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2">
    <strong>Piutang</strong>
  </td>
</tr>
<tr>
  <td>Piutang awal</td>
  <td>{{$data['piutang_awal']}}</td>
</tr>
<tr>
  <td>Penjualan merchant</td>
  <td>{{$data['penjualan_merchant']}}</td>
</tr>
<tr>
  <td>Penjualan piutang</td>
  <td>{{$data['penjualan_piutang']}}</td>
</tr>
<tr>
  <td><strong>Total Piutang</strong></td>
  <td>{{$data['total_piutang']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2">
    <strong>Pembayaran Piutang</strong>
  </td>
</tr>
<tr>
  <td>Piutang Cash</td>
  <td>{{$data['pembayaran_piutang_tunai']}}</td>
</tr>
<tr>
  <td>Via Bank</td>
  <td>{{$data['pembayaran_piutang_transfer']}}</td>
</tr>
<tr>
  <td><strong>Total Piutang Akhir</strong></td>
  <td>{{$data['piutang_akhir']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><strong>Hutang</strong></td>
</tr>
<tr>
  <td>Hutang Awal</td>
  <td>{{$data['hutang_awal']}}</td>
</tr>
<tr>
  <td>Pembelian Barang</td>
  <td>{{$data['pembelian_barang']}}</td>
</tr>
<tr>
  <td><strong>Total Hutang Dagang</strong></td>
  <td>{{$data['total_hutang']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><strong>Bayar Hutang Dagang</strong></td>
</tr>
<tr>
  <td>Cash/Tunai</td>
  <td>{{$data['pembayaran_hutang_tunai']}}</td>
</tr>
<tr>
  <td>Transfer</td>
  <td>{{$data['pembayaran_hutang_transfer']}}</td>
</tr>
<tr>
  <td><strong>Total Bayar Hutang Dagang</strong></td>
  <td>{{$data['total_bayar_hutang_dagang']}}</td>
</tr>
<tr>
  <td><strong>Total Hutang Akhir</strong></td>
  <td>{{$data['total_hutang_akhir']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><strong>Pendapatan Lainnya</strong></td>
</tr>
<tr>
  <td>Pendapatan Tunai Lainnya</td>
  <td>{{$data['pendapatan_lainnya_tunai']}}</td>
</tr>
<tr>
  <td>Pendapatan Lain Via Bank</td>
  <td>{{$data['pendapatan_lainnya_transfer']}}</td>
</tr>
<tr>
  <td><strong>Jumlah Pendapatan Lain</strong></td>
  <td>{{$data['total_pendapatan_lain']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><strong>Pengeluaran Lainnya</strong></td>
</tr>
<tr>
  <td>Pengeluaran Tunai Lainnya</td>
  <td>{{$data['pengeluaran_lainnya_tunai']}}</td>
</tr>
<tr>
  <td>Pengeluaran Lain Via Bank</td>
  <td>{{$data['pengeluaran_lainnya_transfer']}}</td>
</tr>
<tr>
  <td><strong>Jumlah Pendapatan Lain</strong></td>
  <td>{{$data['total_pendapatan_lain']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td><strong>Setor Bank</strong></td>
  <td>{{$data['setor_bank']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td><strong>Kas Akhir</strong></td>
  <td>{{$data['kas_akhir']}}</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td><strong>Saldo Bank Akhir</strong></td>
  <td>{{$data['saldo_akhir']}}</td>
</tr>
</tbody>
</table>
</div>
</div>
@stop