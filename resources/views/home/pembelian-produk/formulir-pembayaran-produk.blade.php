@extends('home.home-layout')
@section('title', 'Upload Bukti Pembayaran')
@section('content')

    <section class="top-categories-area" style="padding: 30vh 0;">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mx-2">Selesaikan Pembayaran</h5>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="card-title">Nama Pemesan</h5>
                                        <p class="card-text">{{ $transaksi->nama_pemesan }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Alamat Pemesan</h5>
                                        <p class="card-text">{{ $transaksi->alamat_pemesan }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Email Pemesan</h5>
                                        <p class="card-text">{{ $transaksi->email_pemesan }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Nomor Handphone</h5>
                                        <p class="card-text">{{ $transaksi->nomor_hp_pemesan }}</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 px-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="card-title">Jumlah Pesanan</h5>
                                        <span
                                            class="btn btn-secondary rounded-0">{{ $transaksi->detailTransaksi->sum('qty') }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Produk</h5>
                                        <div class="row row-cols-2">

                                            @foreach ($transaksi->detailTransaksi as $produk)
                                                <div class="col">
                                                    <img src="{{ asset('produk/' . $produk->produk->gambar_produk) }}"
                                                        style="max-height: 100px;" alt="{{ $produk->produk->nama_produk }}">

                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Total Harga</h5>
                                        <p class="card-text">Rp. {{ number_format($transaksi->total_harga) }}
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('home.uploadBuktiTransaksi', $transaksi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">

                            {{-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12  py-3">
                                            <h3 class="px-3">Pilih Metode pembayaran</h3>
                                            <div class="px-5">
                                                <div class="d-flex align-items-start">
                                                    <input type="radio" name="bank" id="bank_bni" value="BNI"
                                                        class="mt-1 me-2">
                                                    <label for="bank_bni" class="d-flex align-items-start">
                                                        <div>
                                                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/2/27/BankNegaraIndonesia46-logo.svg/1200px-BankNegaraIndonesia46-logo.svg.png"
                                                                class="img-fluid text-center" alt=""
                                                                style="max-width: 150px;">
                                                        </div>

                                                    </label>

                                                </div>
                                                <div class="ms-2">
                                                    <p class="mb-0">No.rek :7543216 <br>
                                                        a.n Putu Suarbawa
                                                    </p>
                                                </div>
                                                <hr>
                                            </div>

                                            <div class="px-5">
                                                <div class="d-flex align-items-start">
                                                    <input type="radio" name="bank" id="bank_bri" value="BRI"
                                                        class="mt-1 me-2">
                                                    <label for="bank_bri" class="d-flex align-items-start">
                                                        <div>
                                                            <img src="https://media.suara.com/pictures/970x544/2024/06/04/49528-logo-bri-logo-bank-bri.jpg"
                                                                class="img-fluid text-center" alt=""
                                                                style="max-width: 150px;">
                                                        </div>

                                                    </label>
                                                </div>
                                                <div class="ms-2">
                                                    <p class="mb-0">No.rek :7543216 <br>
                                                        a.n Putu Suarbawa
                                                    </p>
                                                </div>
                                                <hr>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div> --}}


                            <div class="col-12 px-2">
                                <div class="card py-3">
                                    @if ($transaksi->bukti_pembayaran == null)
                                        @csrf
                                        <h2 class="text-center">Unggah Bukti Pembayaran</h2>

                                        <div class="py-3">
                                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                                                class="form-control" accept="image/*" required>
                                            <img src="#" alt="Preview Uploaded Image" class="mt-5 d-none"
                                                id="preview-bukti">

                                        </div>

                                        <button class="btn-one btn-block mt-4" type="submit">Kirim Bukti</button>
                                    @else
                                        <p class="text-center fs-5">Transaksi sedang diproses</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <p class="fs-1 fw-bold text-lg-left text-xxl-left text-xl-left text-sm-center">Bukti Pembayaran</p>
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('bukti_Pembayaran/' . $transaksi->bukti_pembayaran) }}" style="max-height: 250px;" alt="">

                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-sm-5">
                                                <div class="px-3 mt-3">
                                                    <button class="btn-one" type="button">
                                                        {{ $transaksi->status_pembayaran }}</button>

                                                    <div class="card mt-3">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Progress transaksi</h5>
                                                            @foreach ($transaksi->progress as $index => $item)
                                                            <li class="mb-3">
                                                                <h6 class="font-weight-bold">{{ $item->nama_progress }} {!! $index == 0 ? '<span class="badge badge-success"> Status terakhir </span>' : '' !!}</h6>

                                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y H:mm:ss') }}
                                                                <br>
                                                            </li>
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            </div>


                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>

    {{-- <section class="blog-page-two">
        <div class="container" style="margin-top: 20vh;">
            <div class="row">

                <div class="col-12">

                    <div class="blog-page-two__content">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">

                                <h2 class="mb-3">Transaksi anda</h2>
                                @foreach ($transaksi->detailTransaksi as $detailTransaksi)
                                    <div class="single-blog-style2">
                                        <div class="single-blog-style2__img-holder">
                                            <div class="inner">
                                                <img src="{{ asset('produk.' . $detailTransaksi->produk->gambar_produk) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="single-blog-style2__text-holder">
                                            <div class="top">
                                                <div class="category-box">
                                                    <div class="dot-box"></div>
                                                    <p>{{ $detailTransaksi->produk->kategori->nama_kategori }}</p>
                                                </div>
                                            </div>
                                            <h3 class="blog-title">
                                                <a href="{{ route('home.detail-produk', $detailTransaksi->produk->id) }}">
                                                    {{ $detailTransaksi->produk->nama_produk }}
                                                </a>
                                            </h3>

                                            <div class="bottom-box">
                                                <div class="btn-box">
                                                    <a href="#">
                                                        <span class="icon-right-arrow-1"></span>Deskripsi
                                                    </a>
                                                </div>
                                                <div class="meta-info">
                                                    <ul>
                                                        <li>
                                                            <span class="icon-user"></span>
                                                            <a href="#">Thomas Maverick</a>
                                                        </li>
                                                        <li>
                                                            <span class="icon-calendar"></span>
                                                            <a href="#">Nov 25, 2022</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">

                                <h2 class="mb-3">Detail</h2>
                                <form action="{{ route('home.uploadBuktiTransaksi', $transaksi) }}"
                                    enctype="multipart/form-data" class="">
                                    @csrf

                                    <div class="border p-3">
                                        <div class="form-group">
                                            <label class="fw-bold">Bukti Pembayaran</label>
                                            <input type="file" name="bukti_pembayaran" required class="form-control">
                                        </div>

                                        <div class="d-gap">
                                            <button class="btn btn-block btn-one" type="submit">Upload</button>

                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>
                </div>





            </div>
        </div>
    </section> --}}
@endsection
