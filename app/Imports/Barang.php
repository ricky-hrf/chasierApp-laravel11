<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Produk as importBarang;

class Barang implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $col) {
            $kodeDatabase = importBarang::where('kode', $col[0])->first();
            if (!$kodeDatabase) {
                $simpan = new importBarang();
                $simpan->kode = $col[0];
                $simpan->nama = $col[1];
                $simpan->harga = $col[2];
                $simpan->stok = $col[3];
                $simpan->save();
            }
        }
    }
}
