@extends('home.home-layout')
@section('title', 'Lengkapi Transaksi Pembelian Anda')
@section('content')


    <section class="top-categories-area" style="padding: 30vh 0;">
        <div class="container">
            <h2 class="text-center">Formulir Pembelian Produk</h2>
            <form action="{{ route('home.storeDataTransaksi', $transaksi->id) }}" method="POST" class="d-block">
                @csrf

                <div class="row mt-5">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 px-5 my-5 my-xxl-0 my-xl-0 my-lg-0">

                        <div class="row">
                            <h3>Produk yang dipilih</h3>
                            @foreach ($transaksi->detailTransaksi as $item)
                                <div class="col-12">
                                    <div class="card border shadow-none my-2">
                                        <div class="card-body">

                                            <div class="d-flex align-items-start border-bottom pb-3">
                                                <div class="mr-5">
                                                    <img src="{{ asset('produk/' . $item->produk->gambar_produk) }}"
                                                        alt="" class="rounded" style="max-width: 100px;">
                                                </div>
                                                <div class="flex-grow-1 align-self-center overflow-hidden">
                                                    <div>
                                                        <h5 class="text-truncate font-size-18">
                                                            {{ $item->produk->nama_produk }}
                                                            <a href="#" class="text-dark">
                                                        </h5>

                                                        <p class="mb-0 mt-1">Size : <span
                                                                class="fw-medium">{{ $item->size }}</span></p>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <ul class="list-inline mb-0 font-size-16">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="text-muted px-1">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#" class="text-muted px-1">
                                                                <i class="mdi mdi-heart-outline"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mt-3">
                                                            <p class="text-muted mb-2">Harga</p>
                                                            <h5 class="mb-0 mt-2"><span
                                                                    class="fw-bold me-2"></span>Rp.{{ number_format($item->produk->harga_produk, 0, ',', '.') }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <div class="mt-3">
                                                            <p class="text-muted mb-2">Quantity</p>
                                                            <div class="d-inline-flex">
                                                                <input type="number" class="form-control w-50 " disabled
                                                                    name="" value="{{ $item->qty }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mt-3">
                                                            <p class="text-muted mb-2">Total</p>
                                                            <h5>Rp.{{ number_format($item->produk->harga_produk * $item->qty, 0, ',', '.') }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>


                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 px-5 my-5 my-xxl-0 my-xl-0 my-lg-0">
                        <div class="form-group mb-3">
                            <h6 class="mb-2" for="my-input">Nama</h6>
                            <input id="my-input" class="form-control" type="text" name="nama_pemesan" required
                                value="{{ Auth::user()->name }}"
                                {{ $transaksi->status_pembayaran == 'Dalam Transaksi' ? '' : 'disabled' }}>
                        </div>
                        <div class="form-group mb-3">
                            <h6 class="mb-2" for="my-input">Alamat</h6>
                            <input id="my-input" class="form-control" type="text" name="alamat_pemesan" required
                                value="{{ Auth::user()->alamat }}"
                                {{ $transaksi->status_pembayaran == 'Dalam Transaksi' ? '' : 'disabled' }}>
                        </div>
                        <div class="form-group mb-3">
                            <h6 class="mb-2" for="my-input">Email</h6>
                            <input id="my-input" class="form-control" type="email" name="email_pemesan" required
                                value="{{ Auth::user()->email }}"
                                {{ $transaksi->status_pembayaran == 'Dalam Transaksi' ? '' : 'disabled' }}>
                        </div>
                        <div class="form-group mb-3">
                            <h6 class="mb-2" for="my-input">Nomor Telepon</h6>
                            <input id="my-input" class="form-control" type="number" name="nomor_hp_pemesan" required
                                value="{{ Auth::user()->nomor_hp }}"
                                {{ $transaksi->status_pembayaran == 'Dalam Transaksi' ? '' : 'disabled' }}>
                        </div>


                        <div class="form-group mb-3">
                            <h3 class="mb-2">Catatan</h3>
                            <textarea name="catatan" id="" class="form-control" cols="120" rows="5"
                                {{ $transaksi->status_pembayaran == 'Dalam Transaksi' ? '' : 'disabled' }}> {{ $transaksi->catatan ?? '' }}</textarea>

                        </div>

                        <div class="form-group mb-3">
                            <h3 for="">Metode Pembayaran</h3>
                            <div class="card">

                                <div class="row">
                                    <div class="col-12  py-3">

                                        @if ($transaksi->status_pembayaran == 'Dalam Transaksi')
                                            <h3 class="px-3">Pilih Metode pembayaran</h3>
                                            <div class="px-5 py-3">
                                                <div class="d-flex align-items-start">
                                                    <input type="radio" name="metode_bayar" id="bank_bni"
                                                        value="BNI" class="mt-1 me-2">
                                                    <label for="bank_bni" class="d-flex align-items-start">
                                                        <div>
                                                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/2/27/BankNegaraIndonesia46-logo.svg/1200px-BankNegaraIndonesia46-logo.svg.png"
                                                                class="img-fluid text-center ml-3" alt=""
                                                                style="max-height: 50px;">
                                                        </div>

                                                    </label>

                                                </div>
                                                <div class="ms-2">
                                                    <p class="mb-0">No.rek : <b> 7543216</b> <br>
                                                        <b> a.n Putu Suarbawa</b>
                                                    </p>
                                                </div>
                                                <hr>
                                            </div>

                                            <div class="px-5 py-3">
                                                <div class="d-flex align-items-start">
                                                    <input type="radio" name="metode_bayar" id="bank_bri"
                                                        value="BRI" class="mt-1 me-2">
                                                    <label for="bank_bri" class="d-flex align-items-start">
                                                        <div>
                                                            <img src="https://media.suara.com/pictures/970x544/2024/06/04/49528-logo-bri-logo-bank-bri.jpg"
                                                                class="img-fluid text-center ml-3" alt=""
                                                                style="max-height: 50px;">
                                                        </div>

                                                    </label>
                                                </div>
                                                <div class="ms-2">
                                                    <p class="mb-0">No.rek : <b> 7543216 </b> <br>
                                                        a.n <b> Putu Suarbawa</b>
                                                    </p>
                                                </div>
                                                <hr>
                                            </div>
                                        @else
                                            @switch($transaksi->metode_bayar)
                                                @case('BNI')
                                                    <div>
                                                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/2/27/BankNegaraIndonesia46-logo.svg/1200px-BankNegaraIndonesia46-logo.svg.png"
                                                            class="img-fluid text-center ml-3" alt=""
                                                            style="max-height: 50px;">
                                                    </div>
                                                @break

                                                @case('BRI')
                                                    <div>
                                                        <img src="https://media.suara.com/pictures/970x544/2024/06/04/49528-logo-bri-logo-bank-bri.jpg"
                                                            class="img-fluid text-center ml-3" alt=""
                                                            style="max-height: 50px;">
                                                    </div>
                                                @break

                                                @default
                                            @endswitch
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>







                <div class="d-grid px-5 w-100">
                    <button class="btn-one w-100">Pesan</button>

                </div>
            </form>

        </div>
    </section>

@endsection
