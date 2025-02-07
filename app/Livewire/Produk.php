<?php

namespace App\Livewire;

use App\Models\Produk as ModelProduk;
use Livewire\Component;

class Produk extends Component
{
    public $pilihanMenu = 'lihat';
    public $nama, $kode, $harga, $stok;
    public $produkTerpilih;


    public function render()
    {
        return view('livewire.produk')->with(['semuaProduk' => ModelProduk::all()]);
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function simpan()
    {
        $this->validate([
            'kode' => ['required', 'unique:produks,kode'],
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ], [
            'kode.required' => 'kode tidak boleh kosong',
            'kode.unique' => 'kode sudah ada',
            'nama.required' => 'nama tidak boleh kosong',
            'harga.required' => 'harga harus diisi',
            'stok.required' => 'stok tidak boleh kosong'
        ]);

        $simpan = new ModelProduk();
        $simpan->kode = $this->kode;
        $simpan->nama = $this->nama;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();

        $this->reset(['kode', 'nama', 'harga', 'stok']);
        $this->pilihanMenu = 'lihat';
    }

    public function hapus($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function delete()
    {
        $this->produkTerpilih->delete();
        $this->reset();
    }

    public function cancel()
    {
        $this->reset();
    }

    public function edit($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->kode = $this->produkTerpilih->kode;
        $this->nama = $this->produkTerpilih->nama;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok = $this->produkTerpilih->stok;
        $this->pilihanMenu = 'edit';
    }

    public function simpanPerubahan()
    {
        $this->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ], [
            'kode.required' => 'kode tidak boleh kosong',
            'nama.required' => 'nama tidak boleh kosong',
            'harga.required' => 'harga tidak boleh kosong',
            'stok.required' => 'stok tidak boleh kosong'
        ]);

        $simpan = $this->produkTerpilih;
        $simpan->kode = $this->kode;
        $simpan->nama = $this->nama;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();

        $this->reset(['kode', 'nama', 'harga', 'stok', 'produkTerpilih']);
        $this->pilihanMenu = 'lihat';
    }
}
