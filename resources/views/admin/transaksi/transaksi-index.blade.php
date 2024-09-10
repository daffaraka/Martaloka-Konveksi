@extends('admin.layout')
@section('content')
    <div class="table-responsive mt-5 ">
        <table class="table table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col" class="w-25">Produk - Qty - Harga</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transaksi as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>
                            @if ($data->status_pembayaran == 'Pending')
                                <button class="btn btn-secondary">Menunggu Pembayaran</button>
                            @elseif($data->status_pembayaran == 'Dibayar')
                                <button class="btn btn-success">Sudah Dibayar</button>
                            @elseif($data->status_pembayaran == 'Diterima')
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
                            <ul class="list-unstyled">
                                @foreach ($data->detailTransaksi as $detailTransaksi)
                                    <li> <b>{{ $detailTransaksi->produk->nama_produk }} </b> <b>-</b>
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
                                <a href="{{ asset('bukti_Pembayaran/' . $data->bukti_pembayaran) }}" class="btn btn-info">
                                    <i class="fa fa-image" aria-hidden="true"></i> Bukti pembayaran</a>
                            @endif

                        </td>
                        <td>
                            @switch($data->status_pembayaran)
                                @case('Pending')
                                    <button class="btn btn-block btn-secondary">Belum ada bukti transfer</button>
                                @break

                                @case('Dibayar')
                                    <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-block btn-success">Sudah
                                        Dibayar</a>
                                @break

                                @case('Diterima')
                                    <a href="{{ route('transaksi.dibayar', $data->id) }}" class="btn btn-block btn-primary">Terima
                                        transaksi</a>
                                    <a href="{{ route('transaksi.batal', $data->id) }}"
                                        class="btn btn-block btn-outline-danger">Tolak transaksi</a>
                                @break

                                @case('Dibatalkan')
                                    <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-block btn-light border border-1">Detail Transaksi</a>
                                @break

                                @case('Selesai')
                                    <a class="btn btn-block btn-success">Selesai</a>
                                @break

                                @default
                                    <button class="btn btn-block btn-info">Status Tidak Valid</button>
                                @break
                            @endswitch
                            <a href="https:://wa.me/+62{{ $data->nomor_hp_pemesan ?? 85847728414}} " class="btn btn-block btn-outline-warning text-dark"><i
                                    class="fa fa-phone" aria-hidden="true"></i> Hubungi Pemesan</a>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
