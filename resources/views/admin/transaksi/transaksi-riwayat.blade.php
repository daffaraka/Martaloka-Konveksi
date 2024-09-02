@extends('admin.layout')
@section('content')
    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
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

                @foreach ($transaksiSelesai as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>
                            @if ($data->status_pembayaran == 'Pending')
                                <button class="btn btn-warning">Menunggu Pembayaran</button>
                            @elseif($data->status_pembayaran == 'Dibayar')
                                <button class="btn btn-success">Sudah Dibayar</button>
                            @elseif($data->status_pembayaran == 'Diterima')
                                <button class="btn btn-primary">Diterima</button>
                            @elseif($data->status_pembayaran == 'Dibatalkan')
                                <button class="btn btn-danger">Batal</button>
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
                            <a href="{{ asset('bukti_Pembayaran/' . $data->bukti_pembayaran) }}"
                                class="btn btn-outline-info">Bukti pembayaran</a>
                        </td>
                        <td>
                            @if ($data->status_pembayaran == 'Pending')
                                <button class="btn btn-sm btn-warning">Belum ada bukti transfer</button>
                            @elseif($data->status_pembayaran == 'Dibayar')
                                <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-sm btn-success">Sudah
                                    Dibayar</a>
                            @elseif($data->status_pembayaran == 'Diterima')
                                <a href="{{ route('transaksi.dibayar', $data->id) }}"
                                    class="btn btn-block btn-outline-primary"> Terima
                                    transaksi</a>
                                <a href="{{ route('transaksi.batal', $data->id) }}"
                                    class="btn btn-block btn-outline-danger">
                                    Tolak
                                    transaksi</a>
                                <a href="" class="btn btn-block btn-warning"><i class="fa fa-phone"
                                        aria-hidden="true"></i> Hubungi Pemesan</a>
                            @elseif($data->status_pembayaran == 'Dibatalkan')
                                <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-sm btn-danger">Batal</a>
                            @else
                                <button class="btn btn-sm btn-info">Status Tidak Valid</button>
                            @endif
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection