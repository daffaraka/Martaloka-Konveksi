@extends('admin.layout')
@section('content')
    <!-- Form Pencarian dan Filter -->

    <div class="table-responsive mt-2 ">
        <div class="row mt-4 mb-3">
            <div class="col-md-5">
                <form action="{{ route('transaksiCustom.index') }}" method="GET">
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
                <form action="{{ route('transaksiCustom.index') }}" method="GET">
                    <div class="input-group">
                        <select name="filter" id="filter" class="form-select"
                            style="border: 1px solid #ccc; box-shadow: none;">
                            <option value="">--Filter status pembayaran--</option>
                            <option value="Selesai" {{ request('filter') == 'Selesai' ? 'selected' : '' }}
                                style="color: green;">Selesai</option>
                            <option value="Dibatalkan" {{ request('filter') == 'Dibatalkan' ? 'selected' : '' }}
                                style="color: red;">Dibatalkan</option>
                            <option value="Dalam Transaksi" {{ request('filter') == 'Dalam Transaksi' ? 'selected' : '' }}
                                style="color: gray;">Menunggu Pembayaran</option>
                            <option value="Dibayar" {{ request('filter') == 'Dibayar' ? 'selected' : '' }}
                                style="color: green;">Dibayar</option>
                            <option value="Belum Dibayar" {{ request('filter') == 'Belum Dibayar' ? 'selected' : '' }}
                                style="color: blue;">Diterima</option>
                        </select>
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>


            <div class="col-md-2 text-end">
                <a href="{{ route('transaksiCustom.index') }}" class="btn btn-warning">
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
                    <th scope="col">Total Pesanan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th>Tanggal Pesan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transaksi as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>
                            @if ($data->status_pembayaran == 'Dalam Transaksi')
                                <button class="btn btn-secondary">Menunggu Pembayaran</button>
                            @elseif($data->status_pembayaran == 'Dibayar')
                                <button class="btn btn-success">Sudah Dibayar</button>
                            @elseif($data->status_pembayaran == 'Belum Dibayar')
                                <button class="btn btn-primary">Diterima</button>
                            @elseif($data->status_pembayaran == 'Dibatalkan')
                                <button class="btn btn-danger">Batal</button>
                            @elseif($data->status_pembayaran == 'Selesai')
                                <button class="btn btn-success">Selesai</button>
                            @else
                                <button class="btn btn-info">Status Tidak Valid</button>
                            @endif
                        </td>
                        <td>
                            {{ $data->total_pesanan }}
                        </td>
                        <td> Rp. {{ number_format($data->total_harga) }}</td>
                        <td>
                            @if ($data->bukti_pembayaran == null)
                                Belum ada
                            @else
                                <a href="{{ asset('custom_designs/bukti-bayar/' . $data->bukti_pembayaran) }}"
                                    class="btn btn-info">
                                    <i class="fa fa-image" aria-hidden="true"></i> Bukti pembayaran</a>
                            @endif

                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            @switch($data->status_pembayaran)
                                @case('Dalam Transaksi')
                                    <button class="btn btn-block btn-secondary">Belum ada bukti transfer</button>
                                @break

                                @case('Dibayar')
                                    <a href="{{ route('transaksiCustom.show', $data->id) }}"
                                        class="btn btn-block btn-success">Sudah
                                        Dibayar</a>
                                @break

                                @case('Belum Dibayar')
                                    <a href="{{ route('transaksiCustom.dibayar', $data->id) }}"
                                        class="btn btn-block btn-primary">Terima
                                        transaksi</a>
                                    <a href="{{ route('transaksiCustom.batal', $data->id) }}"
                                        class="btn btn-block btn-outline-danger">Tolak transaksi</a>
                                @break

                                @case('Dibatalkan')
                                    <a href="{{ route('transaksiCustom.show', $data->id) }}"
                                        class="btn btn-block btn-light border border-1">Detail Transaksi</a>
                                @break

                                @case('Selesai')
                                    <a class="btn btn-block btn-success">Selesai</a>
                                @break

                                @default
                                    <button class="btn btn-block btn-info">Status Tidak Valid</button>
                                @break
                            @endswitch
                            <a href="https://wa.me/+62{{ $data->nomor_hp_pemesan ?? '85847728414' }} "
                                class="btn btn-block btn-outline-warning text-dark"><i class="fa fa-phone"
                                    aria-hidden="true"></i> Hubungi Pemesan</a>
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
@endsection
