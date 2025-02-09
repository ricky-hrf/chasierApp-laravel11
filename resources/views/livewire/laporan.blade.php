<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Laporan Transaksi</h4>
                    <div class="text-end">
                        <a href="{{ url('cetak-laporan') }}" target="_blank"><button class="btn btn-secondary">Cetak
                                Laporan</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Invoice</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($semuaTransaksi as $transaksi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->created_at }}</td>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ number_format($transaksi->total_transaksi, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
