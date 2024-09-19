@extends('home.home-layout')
@section('title', 'Pemesanan Custom Desain')
@section('content')


    <section class="top-categories-area" style="padding: 30vh 0;">
        <div class="container">
            <h2 class="text-center">Pemesanan Custom Desain</h2>
            <form action="{{ route('home.storeDesign') }}" method="POST" class="d-block">
                @csrf

                <div class="row mt-5">
                    <div class="col-6 px-5">
                        <div class="form-group mb-4">
                            <h6 class="mb-2" for=" ">Nama</h6>
                            <input id=" " class="form-control" type="text" name="nama_pemesan" required>
                            <label>Isikan sesuai nama lengkap anda</label>
                        </div>
                        <div class="form-group mb-4">
                            <h6 class="mb-2" for=" ">Alamat</h6>
                            <input id=" " class="form-control" type="text" name="alamat_pemesan" required>
                            <label>Isikan sesuai alamat anda secara lengkap </label>

                        </div>
                        <div class="form-group mb-4">
                            <h6 class="mb-2" for=" ">Email</h6>
                            <input id=" " class="form-control" type="email" name="Email_pemesan" required>
                            <label>Gunakan '@' , contoh : martaloka@gmail.com</label>

                        </div>
                        <div class="form-group mb-4">
                            <h6 class="mb-2" for=" ">Nomor Telepon</h6>
                            <input id=" " class="form-control" type="number" name="nomor_hp_pemesan" required>
                            <label>Masukkan nomor telepon, contoh : 08123456789</label>

                        </div>

                        <div class="form-group mb-4">
                            <h6 class="mb-2" for=" ">Jenis Pesanan</h6>
                            <div class="select-box">
                                <select class="wide float-none"
                                    style="height: 40px !important;line-height: 40px !important;" name="kategori_id">
                                    @foreach ($kategori as $select)
                                        <option value="{{ $select->id }}">{{ $select->nama_kategori }} -
                                            Rp. {{ number_format($select->harga_kategori) }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                    </div>

                    <div class="col-6 px-5">


                        <div class="co">
                            <h6 class="mb-2">Cowok</h6>
                            <hr>
                            <div class="row ">

                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk S</label>
                                        <input id="co_s" class="form-control" type="number" name="co_s"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk M</label>

                                        <input id="co_m" class="form-control" type="number" name="co_m"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L</label>

                                        <input id="co_l" class="form-control" type="number" name="co_l"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk XL</label>

                                        <input id="co_xl" class="form-control" type="number" name="co_xl"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk XXL</label>

                                        <input id="co_xxl" class="form-control" type="number" name="co_xxl"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L1</label>

                                        <input id="co_l1" class="form-control" type="number" name="co_l1"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L2</label>

                                        <input id="co_l2" class="form-control" type="number" name="co_l2"
                                            value="0">
                                    </div>
                                </div>

                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L3</label>

                                        <input id="co_l3" class="form-control" type="number" name="co_l3"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L4</label>

                                        <input id="co_l4" class="form-control" type="number" name="co_l4"
                                            value="0">
                                    </div>
                                </div>




                            </div>
                        </div>


                        <div class="ce">
                            <h6 class="mb-2">Cewek</h6>
                            <hr>
                            <div class="row">

                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk S</label>
                                        <input id="ce_s" class="form-control" type="number" name="ce_s"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk M</label>
                                        <input id="ce_m" class="form-control" type="number" name="ce_m"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L</label>
                                        <input id="ce_l" class="form-control" type="number"
                                            name="ce_l"value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk XL</label>
                                        <input id="ce_xl" class="form-control" type="number" name="ce_xl"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk XXL</label>
                                        <input id="ce_xxl" class="form-control" type="number" name="ce_xxl"
                                            value="0">
                                    </div>
                                </div>

                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L1</label>

                                        <input id="ce_l1" class="form-control" type="number" name="ce_l1"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L2</label>

                                        <input id=" " class="form-control" type="number" name="ce_l2"
                                            value="0">
                                    </div>
                                </div>

                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L3</label>

                                        <input id=" " class="form-control" type="number" name="ce_l3"
                                            value="0">
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-bold">Uk L4</label>

                                        <input id=" " class="form-control" type="number" name="ce_l4"
                                            value="0">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="form-group mt-2 mb-4">
                            <h6 class="mb-2" for=" ">Total pesanan</h6>
                            <input id="total-pesanan" class="form-control" type="number" value="0"
                                name="total_pesanan" required>
                            <label>Total pesanan akan mengikuti total jumlah ukuran yang anda masukkan</label>

                        </div>

                    </div>


                    <div class="col-12 px-5 my-3">
                        <h3 class="mb-2">Catatan</h3>
                        <textarea name="catatan" id="" class="form-control" cols="120" rows="5"></textarea>
                        <label>Isikan catatan tambahan untuk kami.</label>

                    </div>

                    <div class="col-12 px-5 my-3">
                        <h3 class="mb-2">Gambar</h3>
                        <input type="file" name="gambar_custom_design[]" accept="image/*" class="image-input" />

                        <br>
                        <label>Gambar maximal 2 MB </label>

                        <img id="preview" src="#" alt="Preview Image"
                            style="display:none; max-width: 200px; margin-top: 10px;" />

                        <div id="newRowImage"></div>
                        <button id="addRow" type="button" class="btn btn-sm btn-secondary mb-4 mt-5">Tambah
                            Gambar</button>
                    </div>

                </div>
                <div class="d-grid px-5">
                    <button class="btn-one w-100">Pesan</button>

                </div>
            </form>

        </div>
    </section>


    <script type="text/javascript">
        // Function to preview image
        function previewImage(input, previewElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    previewElement.src = e.target.result;
                    previewElement.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                previewElement.style.display = 'none';
                previewElement.src = '#';
            }
        }

        // Apply preview functionality to all existing image inputs
        document.querySelectorAll('.image-input').forEach(function(input) {
            input.addEventListener('change', function() {
                var preview = input.nextElementSibling;
                previewImage(input, preview);
            });
        });

        // Add new row and apply preview functionality
        document.getElementById('addRow').addEventListener('click', function() {
            var newInputRow = document.createElement('div');
            newInputRow.innerHTML = `
                <div id="inputFormRow" class="mt-3">
                    <input type="file" name="gambar_custom_design[]" accept="image/*" class="image-input" />
                    <img src="#" alt="Preview Image" style="display:none; max-width: 200px; margin-top: 10px;" />
                </div>
            `;

            document.getElementById('newRowImage').appendChild(newInputRow);

            // Apply preview functionality to the new input
            var newInput = newInputRow.querySelector('.image-input');
            var newPreview = newInput.nextElementSibling;
            newInput.addEventListener('change', function() {
                previewImage(newInput, newPreview);
            });
        });
    </script>
@endsection
