<div>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">Semua
                    Pengguna</button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">Tambah
                    Pengguna</button>
                <button wire:loading class="btn btn-info">loading...</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu == 'lihat')
                    <div class="card border-primary">
                        <div class="card-header">
                            Semua Pengguna
                        </div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Data</th>
                                </thead>
                                <tbody>
                                    @foreach ($semuaPengguna as $pengguna)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengguna->name }}</td>
                                            <td>{{ $pengguna->email }}</td>
                                            <td>{{ $pengguna->peran }}</td>
                                            <td>
                                                <button wire:click="edit({{ $pengguna->id }})"
                                                    class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-warning' }}">Edit</button>
                                                <button wire:click="hapus({{ $pengguna->id }})"
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
                            Tambah Pengguna
                        </div>
                        <div class="card-body">
                            <form action="" wire:submit="simpan">
                                <label for="name">Nama</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="email">Email</label>
                                <input type="email" wire:model="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="password">Password</label>
                                <input type="password" wire:model="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="peran">peran</label>
                                <select class="form-control" wire:model="peran" name="peran" id="peran">
                                    <option>--pilih peran---</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('peran')
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
                            Edit Pengguna
                        </div>
                        <div class="card-body">
                            <form action="" wire:submit="simpanPerubahan">
                                <label for="name">Nama</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="email">Email</label>
                                <input type="email" wire:model="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="password">Password</label>
                                <input type="password" wire:model="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="peran">peran</label>
                                <select class="form-control" wire:model="peran" name="peran" id="peran">
                                    <option>--pilih peran---</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('peran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <button type="button" wire:click="cancel"
                                    class="btn btn-secondary mt-3">Cancel</button>
                                <button type="submit" class="btn btn-success mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'hapus')
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            Hapus Pengguna
                        </div>
                        <div class="card-body">
                            Apakah Anda Yakin Ingin Menghapus <strong>{{ $penggunaTerpilih->name }}</strong> dari
                            Daftar
                            Pengguna?
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
