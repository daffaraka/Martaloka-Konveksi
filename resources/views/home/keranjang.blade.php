@extends('home.home-layout')
@section('title', 'Keranjang')
@section('content')

    <section class="top-categories-area">
        <div class="container" style="padding: 30vh 0;">
            @if (count($keranjangs) == 0)
                <h1 class="text-center">Tidak ada produk keranjang</h1>
            @else
                <h3>Pesanan dalam keranjang</h3>
                <form action="{{ route('home.checkout') }}" method="POST" class="w-100">
                    @csrf
                    <div class="row">


                        @foreach ($keranjangs as $item)
                            <div class="col-xxl-9 col-xl-9 col-lg-9">
                                <div class="card border shadow-none my-2">
                                    <div class="card-body">

                                        <div class="d-flex align-items-start border-bottom pb-3">
                                            <div class="mr-5">
                                                <img src="https://www.bootdey.com/image/100x100/008B8B/000000"
                                                    alt="" class="avatar-lg rounded">
                                            </div>
                                            <div class="flex-grow-1 align-self-center overflow-hidden">
                                                <div>
                                                    <h5 class="text-truncate font-size-18">{{ $item->produk->nama_produk }}
                                                        <a href="#" class="text-dark">
                                                    </h5>

                                                    <p class="mb-0 mt-1">Color : <span class="fw-medium">Gray</span></p>
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
                                                <div class="col-md-5 ">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Quantity</p>
                                                        <div class="d-inline-flex">
                                                            <input type="number" class="form-control w-25" name=""
                                                                value="{{ $item->qty }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
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
                            <div class="col-1 align-content-center d-flex justify-content-center">
                                <input type="checkbox" name="id_[]" value="{{ $item->id }}" id="">
                            </div>
                        @endforeach




                    </div>
                    <button class="btn btn-block btn-one mt-5" type="submit">CHECKOUT</button>
                </form>
            @endif


        </div>


    </section>


@endsection
