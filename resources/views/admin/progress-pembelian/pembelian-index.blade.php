@extends('admin.layout')
@section('title', 'Progress Pembelian')
@section('content')

    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Transaksi</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col">Gambar Progress</th>
                    <th scope="col">Judul progress</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($transaksi as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->id }}</td>
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
                            <img src="{{ asset('progress-pembelian/' . $data->progress) }}" width="200"
                                alt="">
                        </td>
                        <td>{{ $data->progress }}</td>
                        <td>
                            <a href="{{ route('progress-pembelian.create', ['transaksi'=>$data]) }}" class="btn btn-info">Tambah progress</a>
                            {{-- <a href="{{ route('produk.destroy', $data->id) }}" class="btn btn-danger">Hapus</a> --}}

                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection