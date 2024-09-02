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
                        <div class="form-group mb-5">
                            <h6 class="mb-2" for="my-input">Nama</h6>
                            <input id="my-input" class="form-control" type="text" name="nama_pemesan" required>
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2" for="my-input">Alamat</h6>
                            <input id="my-input" class="form-control" type="text" name="alamat_pemesan" required>
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2" for="my-input">Email</h6>
                            <input id="my-input" class="form-control" type="email" name="Email_pemesan" required>
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2" for="my-input">Nomor Telepon</h6>
                            <input id="my-input" class="form-control" type="number" name="nomor_hp_pemesan" required>
                        </div>
                    </div>

                    <div class="col-6 px-5">
                        <div class="form-group mb-4">
                            <h6 class="mb-2" for="my-input">Jenis Pesanan</h6>
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
                        <div class="form-group mt-2 mb-5">
                            <h6 class="mb-2" for="my-input">Total pesanan</h6>
                            <input id="my-input" class="form-control" type="number" name="total_pesanan" required>
                        </div>

                        <div class="co">
                            <h6 class="mb-2">Cowok</h6>
                            <div class="row ">

                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="co_s"
                                            value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="co_m"
                                            value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="co_l"
                                            value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="co_xl"
                                            value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="co_xxl"
                                            value="0" required>
                                    </div>
                                </div>



                            </div>
                        </div>


                        <div class="ce">
                            <h6 class="mb-2">Cewek</h6>
                            <div class="row">

                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="ce_s"
                                            value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="ce_m"
                                            value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number"
                                            name="ce_l"value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="ce_xl"
                                            value="0" required>
                                    </div>
                                </div>
                                <div class="col-2 mr-1">

                                    <div class="form-group mb-5">
                                        <input id="my-input" class="form-control" type="number" name="ce_xxl"
                                            value="0" required>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>


                    <div class="col-12 px-5 my-3">
                        <h3 class="mb-2">Catatan</h3>
                        <textarea name="catatan" id="" class="form-control" cols="120" rows="5"></textarea>
                    </div>

                    <div class="col-12 px-5 my-3">
                        <h3 class="mb-2">Gambar</h3>
                        <input type="file" name="gambar_custom_design[]" accept="image/*" class="image-input" />
                        <img id="preview" src="#" alt="Preview Image" style="display:none; max-width: 200px; margin-top: 10px;" />

                        <div id="newRowImage"></div>
                        <button id="addRow" type="button" class="btn btn-sm btn-secondary mb-4 mt-5">Tambah Gambar</button>
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
