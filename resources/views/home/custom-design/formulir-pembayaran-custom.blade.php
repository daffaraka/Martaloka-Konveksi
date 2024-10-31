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
                                        <h5 class="card-title">Nomor Pemesan</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->nomor_hp_pemesan }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Delivery</h5>
                                        <p class="card-text">{{ $transaksiCustomDesign->delivery }}</p>
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
                                        <h5 class="card-title">Ukuran Cewek</h5>
                                        <p class="card-text">
                                            <span class="mx-1"> <b> S </b> :
                                                {{ $transaksiCustomDesign->sizes->co_s }}</span>
                                            <span class="mx-1"> <b> M </b> :
                                                {{ $transaksiCustomDesign->sizes->co_m }}</span>
                                            <span class="mx-1"> <b> L </b> :
                                                {{ $transaksiCustomDesign->sizes->co_l }}</span>
                                            <span class="mx-1"> <b> XL </b> :
                                                {{ $transaksiCustomDesign->sizes->co_xl }}</span>
                                            <span class="mx-1"> <b> XXL </b> :
                                                {{ $transaksiCustomDesign->sizes->co_xxl }}</span>
                                            <span class="mx-1"> <b> L1 </b> :
                                                {{ $transaksiCustomDesign->sizes->co_l1 }}</span>
                                            <span class="mx-1"> <b> L2 </b> :
                                                {{ $transaksiCustomDesign->sizes->co_l2 }}</span>
                                            <span class="mx-1"> <b> L3 </b> :
                                                {{ $transaksiCustomDesign->sizes->co_l3 }}</span>
                                            <span class="mx-1"> <b> L4 </b> :
                                                {{ $transaksiCustomDesign->sizes->co_l4 }}</span>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Ukuran Cewek</h5>
                                        <p class="card-text">
                                            <span class="mx-1"> <b> S </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_s }}</span>
                                            <span class="mx-1"> <b> M </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_m }}</span>
                                            <span class="mx-1"> <b> L </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_l }}</span>
                                            <span class="mx-1"> <b> XL </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_xl }}</span>
                                            <span class="mx-1"> <b> XXL </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_xxl }}</span>
                                            <span class="mx-1"> <b> L1 </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_l1 }}</span>
                                            <span class="mx-1"> <b> L2 </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_l2 }}</span>
                                            <span class="mx-1"> <b> L3 </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_l3 }}</span>
                                            <span class="mx-1"> <b> L4 </b> :
                                                {{ $transaksiCustomDesign->sizes->ce_l4 }}</span>
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

                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2 mb-3">
                                <div class="card">
                                    @if ($transaksiCustomDesign->bukti_pembayaran == null)
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
                                    @else
                                        <div class="p-3">
                                            <h4 class="text-left mb-3">Pembayaran sedang diproses</h4>
                                            <div class="card">
                                                <div class="card-body">

                                                    <p>Anda membayar dengan menggunakan {{$transaksiCustomDesign->metode_bayar}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                </div>
                            </div>


                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 px-2 mb-3">
                                <div class="card py-3">
                                    @if ($transaksiCustomDesign->bukti_pembayaran == null)
                                        @csrf
                                        <h2 class="text-center">Unggah Bukti Pembayaran</h2>

                                        <div class="py-3">
                                            <input type="file" name="bukti_bayar" id="bukti_bayar"
                                                class="form-control" accept="image/*" required>
                                            <img src="#" alt="Preview Uploaded Image" class="mt-5 d-none"
                                                id="preview-bukti">

                                        </div>

                                        <button class="btn-one btn-block mt-4" type="submit">Kirim Bukti</button>
                                    @else
                                        <h3 class="text-center mb-4">Pembayaran sedang diproses</h3>

                                        <div class="px-3">
                                            <label class="font-weight-bold mb-3">Status sekarang :
                                                {{ $transaksiCustomDesign->status_pembayaran }} </label> <br>
                                            <hr>

                                            @foreach ($transaksiCustomDesign->progress as $index => $progress)
                                                <li class="mb-3">
                                                    <h6 class="font-weight-bold">{{ $progress->nama_progress }}
                                                        {!! $index == 0 ? '<span class="badge badge-success"> Status terakhir </span>' : '' !!}</h6>

                                                    {{ \Carbon\Carbon::parse($progress->created_at)->isoFormat('dddd, D MMMM Y H:mm:ss') }}
                                                    <br>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop" class="btn-one px-4 py-0"
                                                        id="detailProgress" data-id="{{ $progress->id }}">Detail</button>
                                                    <hr>
                                                </li>
                                            @endforeach
                                            {{-- <button class="btn" type="button">
                                                {{ $transaksiCustomDesign->status_pembayaran }}</button> --}}
                                            {{-- {{$transaksiCustomDesign->progress}} --}}

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


    <!-- Button trigger modal -->
    <div class="modal fade" id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="staticBackdropLabel">Detail progress</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="">Nama Proses</label>
                        <input type="text" class="form-control" id="nama_progress" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi Proses</label>
                        <input type="text" class="form-control" id="deskripsi_proses" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Waktu </label>
                        <input type="text" class="form-control" id="waktu_progress" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Gambar Proses </label>
                        <img src="" class="img-fluid" id="gambar_proses">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

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

        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan event listener ke tombol 'Detail' menggunakan event delegation
            document.querySelectorAll('#detailProgress').forEach(function(button) {
                button.addEventListener('click', function() {
                    var progressId = this.getAttribute('data-id');

                    // Lakukan request AJAX ke route yang ditentukan
                    fetch(`/custom-design/progress/${progressId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Isi data yang diterima ke dalam modal
                            document.getElementById('nama_progress').value = data.nama_progress;
                            document.getElementById('deskripsi_proses').value = data.deskripsi_progress;
                            document.getElementById('waktu_progress').value = new Intl.DateTimeFormat('id-ID', {
                                year: 'numeric',
                                month: 'long',
                                day: '2-digit',
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit'
                            }).format(new Date(data.created_at));
                            document.getElementById('gambar_proses').src = `/progress_custom/${data.gambar_progress}`;

                            // Tampilkan modal setelah data diisi

                            modal.show();
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
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
@push('scripts')
@endpush
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> --}}
