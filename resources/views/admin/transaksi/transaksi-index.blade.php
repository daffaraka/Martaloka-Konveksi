@extends('admin.layout')
@section('content')
    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Number</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Payment Status</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($transaksi as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->number }}</td>
                        <td>{{ $data->product->nama_produk }}</td>
                        <td>Rp. {{ number_format($data->product->harga_produk) }}</td>
                        <td>{{ $data->qty }}</td>
                        <td> Rp. {{ number_format($data->total_price) }}</td>
                        <td>
                            @if ($data->payment_status == '1')
                                <button class="btn btn-warning">Menunggu Pembayaran</button>
                            @elseif($data->payment_status == '2')
                                <button class="btn btn-success">Sudah Dibayar</button>
                            @elseif($data->payment_status == '3')
                                <button class="btn btn-secondary">Kadaluarsa</button>
                            @elseif($data->payment_status == '4')
                                <button class="btn btn-danger">Batal</button>
                            @else
                                <button class="btn btn-info">Status Tidak Valid</button>
                            @endif
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
