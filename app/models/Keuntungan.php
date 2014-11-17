<?php

class Keuntungan extends Model
{

    protected $table = 'uang';
    protected $guarded = ['id'];

    public $tanggalPerhitungan;

    public static function kasAwal()
    {
        $uang = static::where('tanggal', '=', (new DateTime())->modify('-1 days')->format('Y-m-d'))->first();

        return $uang->kas;
    }

    public static function saldoAwal()
    {
        $uang = static::where('tanggal', '=', (new DateTime())->modify('-1 days')->format('Y-m-d'))->first();

        return $uang->saldo_bank;
    }

    public static function totalPenjualan()
    {
        $listPenjualan = Penjualan::where('tanggal_penjualan', '=', (new DateTime())->format('Y-m-d'));

        $totalHarga = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $totalHarga += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $totalHarga;
    }

    public static function hpp()
    {
        return static::totalHargaModal();
    }

    public static function totalPembelian()
    {
        $listPembelian = Pembelian::where('tanggal_pembelian', '=', (new DateTime())->format('Y-m-d'));

        $totalHarga = 0;

        foreach ($listPembelian->get() as $pembelian) {
            foreach ($pembelian->detail()->get() as $pembelianDetail) {
                $totalHarga += $pembelianDetail->unit * $pembelianDetail->barang()->harga;
            }
        }

        return $totalHarga;
    }

    public static function totalHargaModal()
    {

        $listPenjualan = Penjualan::where('tanggal_penjualan', '=', (new DateTime())->format('Y-m-d'));

        $totalHargaModal = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $totalHargaModal += $penjualanDetail->unit * $penjualanDetail->barang()->harga;
            }
        }

        return $totalHargaModal;
    }

    public static function labaKotor()
    {
        return static::totalPenjualan() - static::totalHargaModal();
    }

    public static function stokAwal()
    {
        $listStok = Stok::where('tanggal', '=', (new DateTime())->format('Y-m-d'));

        $stokAwal = 0;

        foreach ($listStok->get() as $stok) {
            $stokAwal += $stok->stok * $stok->barang->harga;
        }

        return $stokAwal;
    }

    public static function stokTerjual()
    {
        $listStokTerjual = PenjualanDetail::where('tanggal', '=', (new DateTime())->format('Y-m-d'));

    }

    public static function stokAkhir()
    {
        return static::stokAwal() - static::totalHargaModal() + static::totalPembelian();
    }

    public static function penjualanTunai()
    {
        $listPenjualan = Penjualan::where('metode_pembayaran', '=', 'tunai')->where('tanggal_penjualan', '=',
            (new DateTime())->format('Y-m-d'));

        $penjualanTunai = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $penjualanTunai += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $penjualanTunai;
    }

    public static function penjualanTransfer()
    {
        $listPenjualan = Penjualan::where('metode_pembayaran', '=', 'transfer')->where('tanggal_penjualan', '=',
            (new DateTime())->format('Y-m-d'));

        $penjualanTransfer = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $penjualanTransfer += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $penjualanTransfer;
    }

    public static function totalPenjualanTunai()
    {
        return static::penjualanTunai() + static::penjualanTransfer();
    }

    public static function piutangAwal()
    {
        $listPiutang = Stok::where('tanggal', '=', (new DateTime())->modify('-1 days')->format('Y-m-d'));

        $piutangAwal = 0;

        foreach ($listPiutang->get() as $piutang) {
            $piutangAwal += $piutang->sisa_piutang;
        }

        return $piutangAwal;
    }

    public static function penjualanMerchant()
    {
        $listPenjualan = Penjualan::where('metode_pembayaran', '=', 'merchant')->where('tanggal_penjualan', '=',
            (new DateTime())->format('Y-m-d'));

        $penjualanMerchant = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $penjualanMerchant += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $penjualanMerchant;
    }

    public static function penjualanPiutang()
    {
        $listPenjualan = Penjualan::where('metode_pembayaran', '=', 'hutang')->where('tanggal_penjualan', '=',
            (new DateTime())->format('Y-m-d'));

        $penjualanPiutang = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $penjualanPiutang += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $penjualanPiutang;
    }

    public static function totalPenjualanTambah()
    {
        return static::penjualanTunai() + static::penjualanTransfer() + static::penjualanMerchant() + static::penjualanPiutang();
    }

    public static function pembayaranPiutang()
    {
        $listPembayaran = PembayaranPiutang::where('tanggal', '=', (new DateTime())->format('Y-m-d'));

        $totalPembayaran = 0;

        foreach ($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }

    public static function totalPiutang()
    {
        return static::piutangAwal() + static::penjualanPiutang() + static::penjualanMerchant();
    }

    public static function pembayaranPiutangTunai()
    {
        $listPembayaran = PembayaranPiutang::where('metode', '=', 'tunai')->where('tanggal', '=',
            (new DateTime())->format('Y-m-d'));

        $totalPembayaran = 0;

        foreach ($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }

    public static function pembayaranPiutangTransfer()
    {
        $listPembayaran = PembayaranPiutang::where('metode', '=', 'transfer')->where('tanggal', '=',
            (new DateTime())->format('Y-m-d'));

        $totalPembayaran = 0;

        foreach ($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }

    public static function piutangAkhir()
    {
        return static::totalPiutang() - static::pembayaranPiutangTransfer() - static::pembayaranPiutangTunai();
    }

    public static function hutangAwal()
    {
        $listHutang = Hutang::padaTanggal((new DateTime())->modify('-1 days')->format('Y-m-d'))->get();

        $totalHutang = 0;

        foreach ($listHutang as $hutang) {
            $totalHutang += $hutang->sisa_hutang;
        }

        return $totalHutang;
    }

    public static function pembelianBarang()
    {
        return static::totalPembelian();
    }

    public static function totalHutang()
    {
        return static::hutangAwal() + static::totalPembelian();
    }

    public static function pembayaranHutangTunai()
    {
        $listPembayaran = PembayaranHutang::where('metode', '=', 'tunai')->where('tanggal', '=',
            (new DateTime())->format('Y-m-d'));

        $totalPembayaran = 0;

        foreach ($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }

    public static function pembayaranHutangTransfer()
    {
        $listPembayaran = PembayaranHutang::where('metode', '=', 'tunai')->where('tanggal', '=',
            (new DateTime())->format('Y-m-d'));

        $totalPembayaran = 0;

        foreach ($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }

    public static function totalBayarHutangDagang()
    {
        return static::pembayaranHutangTunai() + static::pembayaranHutangTransfer();
    }

    public static function totalHutangAkhir()
    {
        return static::totalHutang() - static::totalBayarHutangDagang();
    }

    public static function pengeluaranLainTunai()
    {
        $listPengeluaran = Biaya::where('tanggal', '=', (new DateTime())->format('Y-m-d'));

        $totalPengeluaran = 0;

        foreach ($listPengeluaran->get() as $pengeluaran) {
            $totalPengeluaran += $pengeluaran->nominal;
        }

        $listKomisi = Komisi::where('tipe', '=', 'tunai')->where('tanggal', '=', (new DateTime())->format('Y-m-d'));

        foreach ($listKomisi->get() as $komisi) {
            $totalPengeluaran += $komisi->nominal;
        }

        return $totalPengeluaran;
    }

    public static function pengeluaranLainTransfer()
    {

        $totalPengeluaran = 0;

        $listKomisi = Komisi::where('tipe', '=', 'transfer')->where('tanggal', '=', (new DateTime())->format('Y-m-d'));

        foreach ($listKomisi->get() as $komisi) {
            $totalPengeluaran += $komisi->nominal;
        }

        return $totalPengeluaran;
    }

    public static function totalPengeluaranLainnya(){
        return static::pengeluaranLainTunai() + static::pengeluaranLainTransfer();
    }

    public static function kasAkhir()
    {
        return static::kasAwal() + static::penjualanTunai() + static::pembayaranPiutangTunai() - static::pembayaranHutangTunai() - static::pengeluaranLainTunai();
    }

    public static function saldoAkhir()
    {
        return static::saldoAwal() + static::penjualanTransfer() + static::pembayaranPiutangTransfer() - static::pembayaranHutangTransfer() - static::pengeluaranLainTransfer();
    }

}