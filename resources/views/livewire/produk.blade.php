<div>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">Daftar
                    Barang</button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">Tambah
                    Barang</button>
                <button wire:loading class="btn btn-info">loading...</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu == 'lihat')
                    <div class="card border-primary">
                        <div class="card-header">
                            Semua Barang
                        </div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->kode }}</td>
                                            <td>{{ $produk->nama }}</td>
                                            <td>{{ $produk->harga }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td>
                                                <button wire:click="edit({{ $produk->id }})"
                                                    class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-warning' }}">Edit</button>
                                                <button wire:click="hapus({{ $produk->id }})"
                                                    class="btn {{ $pilihanMenu == 'hapus' ? 'btn-primary' : 'btn-outline-danger' }}">Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'tambah')
                    <div class="card border-primary">
                        <div class="card-header">
                            Tambah Barang
                        </div>
                        <div class="card-body">
                            <form action="" wire:submit="simpan">
                                <label for="kode">Kode Barang</label>
                                <input type="text" wire:model="kode" class="form-control">
                                @error('kode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="nama">Nama Barang</label>
                                <input type="text" wire:model="nama" class="form-control">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="harga">Harga Barang</label>
                                <input type="text" wire:model="harga" class="form-control">
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="stok">Stok Barang</label>
                                <input type="number" wire:model="stok" class="form-control">
                                @error('stok')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>

                                <button type="submit" class="btn btn-success mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'edit')
                    <div class="card border-primary">
                        <div class="card-header">
                            Edit Detail Barang
                        </div>
                        <div class="card-body">
                            <form action="" wire:submit="simpanPerubahan">
                                <label for="kode">Kode Barang</label>
                                <input type="text" wire:model="kode" class="form-control">
                                @error('kode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="nama">Nama Barang</label>
                                <input type="text" wire:model="nama" class="form-control">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="harga">Harga Barang</label>
                                <input type="text" wire:model="harga" class="form-control">
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="stok">Stok Barang</label>
                                <input type="number" wire:model="stok" class="form-control">
                                @error('stok')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>

                                <button type="submit" class="btn btn-success mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'hapus')
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            Hapus Barang
                        </div>
                        <div class="card-body">
                            Apakah Anda Yakin Ingin Menghapus <strong>{{ $produkTerpilih->nama }}</strong> dari
                            Daftar
                            Barang?
                            <br>
                            <button class="btn btn-danger" wire:click="delete">Hapus</button>
                            <button class="btn btn-secondary" wire:click="cancel">Batal</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
