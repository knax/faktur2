<?php

class KeuntunganController extends \BaseController
{

    public function index()
    {
        $data = [
            'kas_awal'                     => Keuntungan::kasAwal(),
            'saldo_awal'                   => Keuntungan::saldoAwal(),
            'total_penjualan'              => Keuntungan::totalPenjualan(),
            'hpp'                          => Keuntungan::totalHargaModal(),
            'laba_kotor'                   => Keuntungan::labaKotor(),
            'stok_awal'                    => Keuntungan::stokAwal(),
            'stok_terjual'                 => Keuntungan::totalHargaModal(),
            'stok_terbeli'                 => Keuntungan::totalPembelian(),
            'stok_akhir'                   => Keuntungan::stokAkhir(),
            'penjualan_tunai'              => Keuntungan::penjualanTunai(),
            'penjualan_transfer'           => Keuntungan::penjualanTransfer(),
            'total_penjualan_tunai'        => Keuntungan::totalPenjualanTunai(),
            'total_penjualan_tambah'       => Keuntungan::totalPenjualanTambah(),
            'piutang_awal'                 => Keuntungan::piutangAwal(),
            'penjualan_merchant'           => Keuntungan::penjualanMerchant(),
            'penjualan_piutang'            => Keuntungan::penjualanPiutang(),
            'total_piutang'                => Keuntungan::totalPiutang(),
            'pembayaran_piutang_tunai'     => Keuntungan::pembayaranPiutangTunai(),
            'pembayaran_piutang_transfer'  => Keuntungan::pembayaranPiutangTransfer(),
            'piutang_akhir'                => Keuntungan::piutangAkhir(),
            'hutang_awal'                  => Keuntungan::hutangAwal(),
            'pembelian_barang'             => Keuntungan::pembelianBarang(),
            'total_hutang'                 => Keuntungan::totalHutang(),
            'pembayaran_hutang_tunai'      => Keuntungan::pembayaranHutangTunai(),
            'pembayaran_hutang_transfer'   => Keuntungan::pembayaranHutangTransfer(),
            'total_bayar_hutang_dagang'    => Keuntungan::totalBayarHutangDagang(),
            'total_hutang_akhir'           => Keuntungan::totalHutangAkhir(),
            'pendapatan_lainnya_tunai'     => 0,
            'pendapatan_lainnya_transfer'  => 0,
            'total_pendapatan_lain'        => 0,
            'pengeluaran_lainnya_tunai'    => Keuntungan::pengeluaranLainTunai(),
            'pengeluaran_lainnya_transfer' => Keuntungan::pengeluaranLainTransfer(),
            'total_pengeluaran_lain'       => Keuntungan::pengeluaranLainTransfer(),
            'setor_bank'                   => 0,
            'kas_akhir'                    => Keuntungan::kasAkhir(),
            'saldo_akhir'                  => Keuntungan::saldoAkhir()
        ];

        foreach ($data as $key => $value) {
            $data[$key] = toRupiah($value);
        }

        return View::make('keuntungan.index', ['data' => $data]);
    }

    public function barangTerjual()
    {
        $tanggal = Input::get('tanggal_mulai', (new DateTime())->format('Y-m-d'));

        $hariIni = DateTime::createFromFormat('Y-m-d', $tanggal);

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('EEEE, d MMMM yyyy');

        $listBarangTerjual = Barang::barangTerjual($tanggal);

        return View::make('keuntungan.barang_terjual.index', [
            'listBarangTerjual' => $listBarangTerjual,
            'tanggal'           => $formatter->format($hariIni)
        ]);

    }

    public static function totalPenjualan()
    {
        $listPenjualan = Penjualan::where('tanggal_penjualan', '=', (new DateTime())->format('Y-m-d'));

        $totalPenjualan = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $totalPenjualan += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $totalPenjualan;
    }
}