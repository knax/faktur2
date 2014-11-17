<?php

class Keuntungan extends Model
{

    protected $table = 'uang';
    protected $guarded = ['id'];

    public $tanggalPerhitungan;

    public static function totalPenjualan()
    {
        $listPenjualan = Penjualan::where('tanggal_penjualan', '=',
            (new DateTime())->format('Y-m-d'));

        $totalHarga = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $totalHarga += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $totalHarga;
    }

    public static function totalPembelian()
    {
        $listPembelian = Pembelian::where('tanggal_pembelian', '=',
            (new DateTime())->format('Y-m-d'));

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

        $listPenjualan = Penjualan::where('tanggal_penjualan', '=',
            (new DateTime())->format('Y-m-d'));

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

    public static function stokAkhir()
    {
        return static::stokAwal() - static::totalHargaModal() + static::stokAwal();
    }

    public static function penjualanTunai()
    {
        $listPenjualan = Penjualan::where('metode_pembayaran', '=', 'tunai')->where('tanggal_penjualan', '=',
            (new DateTime())->format('Y-m-d'));

        $penjualanTunai = 0;

        foreach($listPenjualan->get() as $penjualan) {
            foreach($penjualan->detail as $penjualanDetail) {
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

        foreach($listPenjualan->get() as $penjualan) {
            foreach($penjualan->detail as $penjualanDetail) {
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
        $listPiutang = Stok::where('tanggal', '=', (new DateTime())->format('Y-m-d'));

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

        foreach($listPenjualan->get() as $penjualan) {
            foreach($penjualan->detail as $penjualanDetail) {
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

        foreach($listPenjualan->get() as $penjualan) {
            foreach($penjualan->detail as $penjualanDetail) {
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

        foreach($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }

    public static function pembayaranPiutangTunai()
    {
        $listPembayaran = PembayaranPiutang::where('metode', '=', 'hutang')->where('tanggal', '=', (new DateTime())->format('Y-m-d'));

        $totalPembayaran = 0;

        foreach($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }

    public static function pembayaranPiutangTransfer()
    {
        $listPembayaran = PembayaranPiutang::where('metode', '=', 'transfer')->where('tanggal', '=', (new DateTime())->format('Y-m-d'));

        $totalPembayaran = 0;

        foreach($listPembayaran->get() as $pembayaran) {
            $totalPembayaran += $pembayaran->jumlah;
        }

        return $totalPembayaran;
    }


}