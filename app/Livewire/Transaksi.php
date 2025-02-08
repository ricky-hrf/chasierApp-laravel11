<?php

namespace App\Livewire;

use App\Models\detailTransaksi;
use App\Models\Transaksi as ModelsTransaksi;
use Livewire\Component;
use App\Models\Produk;

class Transaksi extends Component
{
    public $kode, $total, $kembalian, $totalSemuaBelanja;
    public $bayar = 0;
    public $transaksiAktif;

    public function transaksiSelesai()
    {
        $this->transaksiAktif->total_transaksi = $this->totalSemuaBelanja;
        $this->transaksiAktif->status_transaksi = 'selesai';
        $this->transaksiAktif->save();
        $this->reset();
    }

    public function hapusProduk($id)
    {
        $detail = detailTransaksi::find($id);
        if ($detail) {
            $produk = Produk::find($detail->produk_id);
            $produk->stok += $detail->jumlah_produk;
            $produk->save();
        }
        $detail->delete();
    }

    public function transaksiBaru()
    {
        $this->reset();
        $this->transaksiAktif = new ModelsTransaksi();
        $this->transaksiAktif->kode_transaksi = 'INV/' . date('YmdHis');
        $this->transaksiAktif->total_transaksi = 0;
        $this->transaksiAktif->status_transaksi = 'pending';
        $this->transaksiAktif->save();
    }

    public function batalTransaksi()
    {
        if ($this->transaksiAktif) {
            $detailTransaksi = detailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            foreach ($detailTransaksi as $detail) {
                $produk = Produk::find($detail->produk_id);
                $produk->stok += $detail->jumlah_produk;
                $produk->save();
                $detail->delete();
            }
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }

    public function updatedKode()
    {
        $produk = Produk::where('kode', $this->kode)->first();
        if ($produk && $produk->stok > 0) {
            $detail = detailTransaksi::firstOrNew([
                'transaksi_id' => $this->transaksiAktif->id,
                'produk_id' => $produk->id
            ], [
                'jumlah' => 0
            ]);
            $detail->jumlah_produk += 1;
            $detail->save();
            $produk->stok -= 1;
            $produk->save();
            $this->reset('kode');
        }
    }

    public function updatedBayar()
    {
        if ($this->bayar > 0) {
            $this->kembalian = $this->bayar - $this->totalSemuaBelanja;
        }
    }

    public function render()
    {
        if ($this->transaksiAktif) {
            $semuaProduk = detailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            $this->totalSemuaBelanja = $semuaProduk->sum(function ($detail) {
                return $detail->produk->harga * $detail->jumlah_produk;
            });
        } else {
            $semuaProduk = [];
        }
        return view('livewire.transaksi')->with([
            'semuaProduk' => $semuaProduk
        ]);
    }
}
