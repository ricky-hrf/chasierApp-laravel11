<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                @if (!$transaksiAktif)
                    <button class="btn btn-primary" wire:click="transaksiBaru">Transaksi Baru</button>
                @else
                    <button class="btn btn-warning" wire:click="batalTransaksi">Batalkan Transaksi</button>
                @endif
                <button class="btn btn-info" wire:loading>Loading ...</button>
            </div>
        </div>
        @if ($transaksiAktif)
            <div class="row mt-2">
                <div class="col-8">
                    <div class="card text-start">
                        <div class="card-header">
                            <h4 class="card-title">No Invoice : {{ $transaksiAktif->kode_transaksi }}</h4>
                            <input type="text" class="form-control" placeholder="No Invoice" wire:model.live="kode">
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <table class="table table-bordered text-bg-light text-center" id="table" width="100%"
                                cellspacing="0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->produk->kode }}</td>
                                            <td>{{ $produk->produk->nama }}</td>
                                            <td>{{ number_format($produk->produk->harga, 2, ',-', '.') }}
                                            </td>
                                            <td>{{ $produk->jumlah_produk }}</td>
                                            <td>{{ number_format($produk->produk->harga * $produk->jumlah_produk, 2, ',-', '.') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger"
                                                    wire:click="hapusProduk({{ $produk->id }})">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card border-warning">
                        <div class="card-header">
                            <h4 class="card-title">Total Belanja</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span>Rp</span>
                                <strong> {{ number_format($totalSemuaBelanja, 2, ',-', '.') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card border-primary mt-2">
                        <div class="card-header">
                            <h4 class="card-title">Bayar</h4>
                        </div>
                        <div class="card-body">
                            <input type="number" class="form-control" wire:model.live="bayar"
                                placeholder="Masukkan Nominal pembayaran ...">
                        </div>
                    </div>
                    <div class="card border-success mt-2">
                        <div class="card-header">
                            <h4 class="card-title">Jumlah Kembalian</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span>Rp</span>
                                <strong> {{ number_format($kembalian, 2, ',-', '.') }}</strong>
                            </div>
                        </div>
                    </div>
                    @if ($bayar)
                        @if ($kembalian < 0)
                            <div class="alert alert-danger mt-2" role="alert">
                                Uang yang dibayarkan kurang
                            </div>
                        @elseif ($kembalian > 0)
                            <button class="btn btn-secondary mt-2" wire:click="transaksiSelesai">Bayar</button>
                        @endif
                    @endif

                </div>
                {{-- <div class="row mt-2">
                <div class="text-center">
                    <button class="btn btn-success">Selesai</button>
                </div>
            </div> --}}
            </div>
        @endif
    </div>
</div>
</div>
