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
                                                <button wire:click="pilihMenu('edit')"
                                                    class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">Edit</button>
                                                <button wire:click="pilihMenu('hapus')"
                                                    class="btn {{ $pilihanMenu == 'hapus' ? 'btn-primary' : 'btn-outline-primary' }}">Hapus
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
                            <form action="" wire:submit>
                                <label for="name">Nama</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">nama harus diisi</span>
                                @enderror
                                <label for="email">Email</label>
                                <input type="email" wire:model="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">Email harus diisi</span>
                                @enderror
                                <label for="password">Password</label>
                                <input type="password" wire:model="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">Password harus diisi</span>
                                @enderror
                                <label for="peran">peran</label>
                                <select class="form-control" wire:model="peran" name="peran" id="peran">
                                    <option>--pilih peran---</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('password')
                                    <span class="text-danger">silahkan pilih peran</span>
                                @enderror

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
                            test
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'hapus')
                    <div class="card border-primary">
                        <div class="card-header">
                            Hapus Pengguna
                        </div>
                        <div class="card-body">
                            test
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
