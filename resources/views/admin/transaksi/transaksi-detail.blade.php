@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <img class="img-fluid" src="{{ asset('bukti_Pembayaran/' . $transaksi->bukti_pembayaran) }}"
                alt="{{$transaksi->bukti_pembayaran}}">
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Pemesan</label>
                        <input type="text" class="form-control" value="{{ $transaksi->user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Status Pembayaran</label>
                        <input type="text" class="form-control" value="{{ $transaksi->status_pembayaran }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" class="form-control" value="Rp.{{ number_format($transaksi->total_harga) }}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Teansaksi</label>
                        <input type="text" class="form-control"
                            value="{{ $transaksi->created_at->isoFormat('dddd, D MMMM Y') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pemesan</label>
                        <input type="text" class="form-control" value="{{ $transaksi->user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pemesan</label>
                        <input type="text" class="form-control" value="{{ $transaksi->user->name }}" readonly>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
