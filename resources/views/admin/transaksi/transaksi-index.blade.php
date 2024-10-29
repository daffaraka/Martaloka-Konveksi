@extends('admin.layout')
@section('content')
    <!-- Tabel Transaksi -->
    <div class="table-responsive mt-2">
        <!-- Form Pencarian dan Filter -->
        <div class="row mt-4 mb-8">
            <div class="col-md-5">
                <form action="{{ route('transaksi.index') }}" method="GET">
                    <div class="input-group">
                        <input name="search" type="text" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari berdasarkan nama pemesan..." aria-label="Search">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-mb-3">
                <form action="{{ route('transaksi.index') }}" method="GET">
                    <div class="input-group">
                        <select name="filter" id="filter" class="form-select"
                            style="border: 1px solid #ccc; box-shadow: none;">
                            <option value="">--Filter status pembayaran--</option>
                            <option value="Selesai" {{ request('filter') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Dibatalkan" {{ request('filter') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan
                            </option>
                            <option value="Pending" {{ request('filter') == 'Dalam Transaksi' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="Dibayar" {{ request('filter') == 'Dibayar' ? 'selected' : '' }}>Dibayar</option>
                            <option value="Diterima" {{ request('filter') == 'Belum Dibayar' ? 'selected' : '' }}>Diterima
                            </option>
                        </select>
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-2 text-end">
                <a href="{{ route('transaksi.index') }}" class="btn btn-warning">
                    <i class="fas fa-retweet"></i> Reset
                </a>
            </div>
        </div>

        <table class="table table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col" class="w-25">Produk - Qty - Harga</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Kurir</th>
                    <th scope="col">No Resi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>
                            @if ($data->status_pembayaran == 'Dalam Transaksi')
                                <button class="btn btn-secondary">Menunggu Pembayaran</button>
                            @elseif($data->status_pembayaran == 'Dibayar')
                                <button class="btn btn-info">Sudah Dibayar</button>
                            @elseif($data->status_pembayaran == 'Belum Dibayar')
                                <button class="btn btn-warning">Belum Dibayar</button>
                            @elseif($data->status_pembayaran == 'Dibatalkan')
                                <button class="btn btn-danger">Batal</button>
                            @elseif($data->status_pembayaran == 'Selesai')
                                <button class="btn btn-success">Selesai</button>
                            @else
                                <button class="btn btn-info">Status Tidak Valid</button>
                            @endif
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($data->detailTransaksi as $detailTransaksi)
                                    <li> <b>{{ $detailTransaksi->produk->nama_produk }}</b> <b>-</b>
                                        <button class="btn btn-sm p-0 px-1 btn-info">{{ $detailTransaksi->qty }}</button>
                                        <span> <b>-</b>
                                            Rp.{{ number_format($detailTransaksi->produk->harga_produk) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td> Rp. {{ number_format($data->total_harga) }}</td>
                        <td>
                            @if ($data->bukti_pembayaran == null)
                                Belum ada
                            @else
                                <a href="{{ asset('bukti_Pembayaran/' . $data->bukti_pembayaran) }}"
                                    class="btn btn-info btn-lg">
                                    <i class="fa fa-image" aria-hidden="true"></i></a>
                            @endif
                        </td>
                        <td>{{ $data->kurir ?? '-' }}</td>
                        <td>{{ $data->no_resi ?? '-' }}</td>
                        <td>
                            @switch($data->status_pembayaran)
                                @case('Dalam Transaksi')
                                    <button class="btn btn-block btn-secondary">Menunggu menyelesaikan pesanan</button>
                                @break

                                @case('Dibayar')
                                    <a href="{{ route('transaksi.show', $data->id) }}"
                                        class="btn btn-block btn-light border border-1">Detail Transaksi</a>
                                    <button href="#" class="btn btn-block btn-info" id="terimaTransaksi"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-transaksi-id="{{ $data->id }}">Terima transaksi</button>
                                @break

                                @case('Belum Dibayar')
                                    <a href="{{ route('transaksi.show', $data->id) }}"
                                        class="btn btn-block btn-light border border-1">Detail Transaksi</a>
                                    <a href="{{ route('transaksi.batal', $data->id) }}"
                                        class="btn btn-block btn-outline-danger">Tolak transaksi</a>
                                @break

                                @case('Dibatalkan')
                                    <a href="{{ route('transaksi.show', $data->id) }}"
                                        class="btn btn-block btn-light border border-1">Detail Transaksi</a>
                                @break

                                @case('Selesai')
                                    {{-- <a href="{{ route('progress-pembelian.show', $data->id) }}">Lihat Progress</a> --}}
                                    <a class="btn btn-block btn-success">Selesai</a>
                                @break

                                @default
                                    <button class="btn btn-block btn-info">Status Tidak Valid</button>
                                @break
                            @endswitch
                            <a href="https://wa.me/+62{{ $data->nomor_hp_pemesan ?? 85847728414 }}"
                                class="btn btn-block btn-outline-warning text-dark">
                                <i class="fa fa-phone" aria-hidden="true"></i> Hubungi Pemesan
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $transaksi->links('pagination::bootstrap-5') }}
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Nomor Resi</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transaksi.terima') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3">
                            <label for="">Nama Pemesan</label>
                            <input type="text" class="form-control" value="" id="nama_pemesan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Status Transaksi</label>
                            <input type="text" class="form-control" value="" id="status_pembayaran" readonly>
                        </div>


                        <div class="mb-3">
                            <label for="kurir" class="form-label">Kurir</label>
                            <select class="form-control" aria-label="Default select example" id="kurir"
                                name="kurir" required>
                                <option selected>Pilih Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="jnt">J&T</option>
                                <option value="sicepat">Sicepat</option>
                                <option value="anteraja">AnterAja</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_resi" class="form-label">Nomor Resi</label>
                            <input type="text" class="form-control" id="no_resi" name="no_resi" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#terimaTransaksi').on('click', function() {
            var transaksiId = $(this).data('transaksi-id');

            // Lakukan AJAX request untuk mendapatkan detail transaksi
            $.ajax({
                url: '{{ route('response.detailTransaksi', ':id') }}'.replace(':id',
                    transaksiId),
                method: 'GET',
                success: function(response) {
                    // Isi nilai input pada modal
                    $('#id').val(transaksiId);
                    $('#nama_pemesan').val(response.nama_pemesan);
                    // Tambahkan pengisian nilai untuk input lainnya sesuai kebutuhan
                    $('#status_pembayaran').val(response.status_pembayaran);
                    // ...
                }
            });
        });
    });
</script>
