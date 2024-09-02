@extends('home.home-layout')
@section('title', 'Pemesanan Custom Desain')
@section('content')


    <section class="top-categories-area" style="padding: 30vh 0;">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Selesaikan Pembayaran</h5>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="card-title">Nama Pemesan</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->nama_pemesan }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Alamat Pemesan</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->alamat_pemesan }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Email Pemesan</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->email_pemesan }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Nama Pemesan</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->nomor_hp_pemesan }}</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 px-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="card-title">Jumlah Pesanan</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->total_pesanan }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Kategori baju</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->kategori->nama_kategori }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Total Harga</h5>
                                        <p class="card-text">Rp. {{ number_format($transaksiCustomDesign->total_harga) }}
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Jumlah Pesanan</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->total_pesanan }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Ukuran Cewek</h5>
                                        <p class="card-text">
                                            <span class="mx-1"> <b> S </b> :
                                                {{ $transaksiCustomDesign->sizes->co_s }}</span>
                                            <span class="mx-1"> <b> M </b> :
                                                {{ $transaksiCustomDesign->sizes->co_m }}</span>
                                            <span class="mx-1"> <b> L </b> :
                                                {{ $transaksiCustomDesign->sizes->co_m }}</span>
                                            <span class="mx-1"> <b> XL </b> :
                                                {{ $transaksiCustomDesign->sizes->co_m }}</span>
                                            <span class="mx-1"> <b> XL </b> :
                                                {{ $transaksiCustomDesign->sizes->co_m }}</span>
                                            <span class="mx-1"> <b> XXL </b> :
                                                {{ $transaksiCustomDesign->sizes->co_m }}</span>

                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Ukuran Cewek</h5>
                                        <p class="card-text">
                                            <span class="mx-1"> <b> S </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_s }}</span>
                                            <span class="mx-1"> <b> M </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_m }}</span>
                                            <span class="mx-1"> <b> L </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_m }}</span>
                                            <span class="mx-1"> <b> XL </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_m }}</span>
                                            <span class="mx-1"> <b> XL </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_m }}</span>
                                            <span class="mx-1"> <b> XXL </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_m }}</span>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('home.uploadBuktiCustomDesign', $transaksiCustomDesign->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2">
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
                            </div>


                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 px-2">
                                <div class="card py-3">
                                    @if ($transaksiCustomDesign->bukti_pembayaran == null)
                                        @csrf
                                        <h2 class="text-center">Unggah Bukti Pembayaran</h2>

                                        <div class="py-3">
                                            <input type="file" name="bukti_bayar" id="bukti_bayar"
                                                class="form-control" accept="image/*">
                                            <img src="#" alt="Preview Uploaded Image" class="mt-5 d-none"
                                                id="preview-bukti">

                                        </div>

                                        <button class="btn-one btn-block mt-4" type="submit">Kirim Bukti</button>
                                    @else
                                        <h2 class="text-center">Pembayaran sedang diproses</h2>

                                        <div class="px-3">
                                            <label for="">Status sekarang : </label>
                                            <button class="btn-one" type="button"> {{$transaksiCustomDesign->status_pembayaran}}</button>

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

    <script>
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("myInput");

            // Select the text field
            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);



        }
        document.getElementById('bukti_bayar').addEventListener('change', function(event) {
            const input = event.target;
            const preview = document.getElementById('preview-bukti');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    preview.classList.add('d-block');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.classList.add('d-none');
                preview.classList.remove('d-block');
            }
        });
    </script>
@endsection
