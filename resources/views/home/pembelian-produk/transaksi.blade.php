@extends('home.home-layout')
@section('title', 'Transaksi')
@section('content')

    <section class="top-categories-area">
        <div class="container" style="padding: 30vh 0;">
            @if (count($transaksis) == 0)
                <h1 class="text-center">Tidak ada transaksi</h1>
            @else
                {{-- <div class=" btn-one bg-success text-light"> --}}
                <h1 class="mb-5">Lengkapi Transaksi anda</h1>
                {{-- </div> --}}

                <div class="row">


                    @foreach ($transaksis as $transaksi)
                        <div class="col-xxl-9 col-xl-9 col-lg-9">
                            <div class="card border shadow-none my-2">
                                <div class="card-body">

                                    <div class="d-flex align-items-start border-bottom pb-3">
                                        <div class="mr-5">
                                            <img src="https://www.bootdey.com/image/100x100/008B8B/000000" alt=""
                                                class="avatar-lg rounded">
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div>
                                                <h5 class="text-truncate font-size-18">NO-{{ $transaksi->id }}
                                                </h5>

                                                <p class="mb-0 mt-1">Size : <span
                                                        class="fw-medium">{{ $transaksi->size }}</span></p>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            {{-- Jika sudah dibayar --}}
                                            @if (in_array($transaksi->status_pembayaran, ['Dibayar', 'Dibatalkan', 'Selesai']))
                                                <div class="border p-3">
                                                    <div class="form-group">
                                                        <label for="bukti_pembayaran" class="fw-bold">Status Pembayaran :
                                                            <b>
                                                                {{ $transaksi->status_pembayaran }} </b> </label>
                                                    </div>

                                                    <div class="d-gap mt-3">
                                                        <a href="{{ route('home.formUploadBuktiTransaksiPembelian', $transaksi->id) }}"
                                                            class="btn btn-success text-uppercase rounded-0 w-100"
                                                            type="submit">Lihat progress</a>
                                                    </div>
                                                </div>

                                                {{-- Jika belum dibayar --}}
                                            @else
                                                <div class="border p-3">
                                                    <div class="form-group">
                                                        <label for="bukti_pembayaran" class="fw-bold">Status Pembayaran :
                                                            <b>
                                                                {{ $transaksi->status_pembayaran }} </b> </label>
                                                    </div>

                                                    <div class="d-gap mt-3">
                                                        <a href="{{ route('home.formTransaksiPembelian', $transaksi->id) }}"
                                                            class="btn btn-primary text-uppercase rounded-0 w-100"
                                                            type="submit">Lengkapi
                                                            Pembayaran</a>
                                                    </div>
                                                </div>
                                            @endif



                                        </div>

                                    </div>

                                    <div>
                                        <div class="row">
                                            @foreach ($transaksi->detailTransaksi as $detailTransaksi)
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <h6>{{ $detailTransaksi->produk->nama_produk }}</h6>
                                                        <p class="text-muted mb-2">Harga</p>
                                                        <h5 class="mb-0 mt-2"><span
                                                                class="fw-bold me-2"></span>Rp.{{ number_format($detailTransaksi->produk->harga_produk, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 ">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Quantity</p>
                                                        <div class="d-inline-flex">
                                                            <input type="number" class="form-control w-25" name=""
                                                                value="{{ $detailTransaksi->qty }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Total</p>
                                                        <h5>Rp.{{ number_format($detailTransaksi->produk->harga_produk * $detailTransaksi->qty, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endforeach




                </div>
                {{-- <button class="btn btn-block btn-one mt-5" type="submit">CHECKOUT</button> --}}
            @endif


        </div>


    </section>


@endsection
