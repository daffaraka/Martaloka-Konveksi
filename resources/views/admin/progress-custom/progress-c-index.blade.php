@extends('admin.layout')
@section('title', 'Progress custom')
@section('content')

    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Transaksi</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col">Gambar Progress Terakhir</th>
                    <th scope="col">progress Terakhir</th>
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
                            @if($data->progress->isNotEmpty() && isset($data->progress->first()->gambar_progress))
                                <img src="{{ asset('progress_custom/' . $data->progress->first()->gambar_progress) }}" width="200" alt="">
                            @else
                                <span>Tidak ada gambar progress</span>
                            @endif
                        </td>
                        <td>
                            @if ($data->progress->isNotEmpty())
                               <span class="btn btn-sm btn-default">{{ $data->progress->first()->nama_progress }}</span>
                            @else
                                <span class="btn btn-sm btn-secondary">Progress belum tersedia</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('progress-custom.create', ['transaksi' => $data]) }}"
                                class="btn btn-info">Tambah progress</a>
                            {{-- <a href="{{ route('produk.destroy', $data->id) }}" class="btn btn-danger">Hapus</a> --}}

                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
