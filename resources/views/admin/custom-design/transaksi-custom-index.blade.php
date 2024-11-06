@extends('admin.layout')
@section('content')
    <!-- Form Pencarian dan Filter -->

    <div class="table-responsive mt-2 ">
        <div class="row mt-4 mb-3">
            <div class="col-md-5">
                <form action="{{ route('transaksiCustom.index') }}" method="GET">
                    <div class="input-group">
                        <input name="search" type="text" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari berdasarkan nama pemesan..." aria-label="Search">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-mb-3">
                <form action="{{ route('transaksiCustom.index') }}" method="GET">
                    <div class="input-group">
                        <select name="filter" id="filter" class="form-select"
                            style="border: 1px solid #ccc; box-shadow: none;">
                            <option value="">--Filter status pembayaran--</option>
                            <option value="Selesai" {{ request('filter') == 'Selesai' ? 'selected' : '' }}
                                style="color: green;">Selesai</option>
                            <option value="Ditolak" {{ request('filter') == 'Ditolak' ? 'selected' : '' }}
                                style="color: red;">Ditolak</option>
                            <option value="Dalam Transaksi" {{ request('filter') == 'Dalam Transaksi' ? 'selected' : '' }}
                                style="color: gray;">Menunggu Pembayaran</option>
                            <option value="Dibayar" {{ request('filter') == 'Dibayar' ? 'selected' : '' }}
                                style="color: green;">Dibayar</option>
                            <option value="Belum Dibayar" {{ request('filter') == 'Belum Dibayar' ? 'selected' : '' }}
                                style="color: blue;">Diterima</option>
                        </select>
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>


            <div class="col-md-2 text-end">
                <a href="{{ route('transaksiCustom.index') }}" class="btn btn-warning">
                    <i class="fas fa-retweet"></i> Reset
                </a>
            </div>
        </div>
        <table class="table table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Judul Custom</th>
                    <th scope="col">Gambar Custom</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col">Total Pesanan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th>Tanggal Pesan</th>
                    <th>Delivery</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transaksi as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->nama_custom }}</td>
                        <td>
                            <ul class="px-3">
                                @foreach ($data->designs as $design)
                                    <li> <a href="{{ asset($design->gambar_custom_design) }}" download
                                            class="btn btn-dark">
                                            <i class="fas fa-download"></i>
                                        </a></li>
                                @endforeach
                            </ul>

                        </td>
                        <td>
                            @if ($data->status_pembayaran == 'Dalam Transaksi')
                                <button class="btn btn-secondary">Menunggu Pembayaran</button>
                            @elseif($data->status_pembayaran == 'Dibayar')
                                <button class="btn btn-info"> Dibayar</button>
                            @elseif($data->status_pembayaran == 'Belum Dibayar')
                                <button class="btn btn-primary">Diterima</button>
                            @elseif($data->status_pembayaran == 'Ditolak')
                                <button class="btn btn-danger">Batal</button>
                            @elseif($data->status_pembayaran == 'Selesai')
                                <button class="btn btn-success">Selesai</button>
                            @else
                                <button class="btn btn-info">Status Tidak Valid</button>
                            @endif
                        </td>
                        <td>
                            {{ $data->total_pesanan }}
                        </td>
                        <td> Rp. {{ number_format($data->total_harga) }}</td>
                        <td>
                            @if ($data->bukti_pembayaran == null)
                                Belum ada
                            @else
                                <a href="{{ asset('custom_designs/bukti-bayar/' . $data->bukti_pembayaran) }}"
                                    class="btn btn-info">
                                    <i class="fa fa-image" aria-hidden="true"></i> </a>
                            @endif

                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            @if ($data->delivery == 'Diantar Ke Tempat Pemesan')
                                <button class="btn btn-light shadow border">Diantar Ke Tempat Pemesan</button>
                            @else
                                <button class="btn btn-dark">Ambil Di Martaloka</button>
                            @endif
                        </td>
                        <td>
                            @switch($data->status_pembayaran)
                                @case('Dalam Transaksi')
                                    <button class="btn btn-block btn-secondary">Menunggu menyelesaikan pesanan</button>
                                @break

                                @case('Dibayar')
                                    <button href="#" class="btn btn-block btn-info" id="terimaTransaksi"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-transaksi-id="{{ $data->id }}">Terima transaksi</button>
                                    <button href="#" class="btn btn-block btn-danger" id="tolakTransaksi"
                                        data-bs-toggle="modal" data-bs-target="#tolakModal"
                                        data-transaksi-id="{{ $data->id }}">Tolak
                                        transaksi</button>
                                @break

                                @case('Ditolak')
                                    <a href="{{ route('transaksi.show',  $data->id) }}"
                                        class="btn btn-block btn-light border border-2">Detail Transaksi</a>
                                @break

                                @case('Selesai')
                                    {{-- <a href="{{ route('progress-pembelian.show', $data->id) }}">Lihat Progress</a> --}}
                                    <a class="btn btn-block btn-success">Selesai</a>
                                @break

                                @default
                                    <button class="btn btn-block btn-info">Status Tidak Valid</button>
                                @break
                            @endswitch
                            <a href="{{ route('transaksiCustom.show', $data->id) }}"
                                class="btn btn-block btn-light border border-1">Detail Transaksi</a>
                            <a href="https://wa.me/+62{{ $data->nomor_hp_pemesan ?? '85847728414' }} "
                                class="btn btn-block btn-outline-warning text-dark"><i class="fa fa-phone"
                                    aria-hidden="true"></i> Hubungi Pemesan</a>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $transaksi->links('pagination::bootstrap-5') }}
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Nomor Resi</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transaksiCustom.terima') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3">
                            <label for="">Nama Pemesan</label>
                            <input type="text" class="form-control" value="" id="nama_pemesan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Status Transaksi</label>
                            <input type="text" class="form-control" value="" id="status_pembayaran" readonly>
                        </div>




                        <div class="kirim" id="kirim">
                            <div class="mb-3">
                                <label for="kurir" class="form-label">Kurir</label>
                                <select class="form-control" aria-label="Default select example" id="kurir"
                                    name="kurir">
                                    <option selected>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="jnt">J&T</option>
                                    <option value="sicepat">Sicepat</option>
                                    <option value="anteraja">AnterAja</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nomor_resi" class="form-label">Nomor Resi</label>
                                <input type="text" class="form-control" id="no_resi" name="no_resi">
                            </div>
                        </div>

                        <div class="pick-up" id="pick-up">

                            <div class="mb-3">
                                <label for="nomor_resi" class="form-label">Tujuan Antar</label>
                                <input type="text" class="form-control" id="tujuan_antar" name="tujuan_antar">
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" onclick="preventDefault()" class="btn btn-primary">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('transaksiCustom.tolak') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" id="tolak_id" value="">
                        <div class="mb-3">
                            <label for="">Nama Pemesan</label>
                            <input type="text" class="form-control" value="" id="tolak_nama_pemesan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Status Transaksi</label>
                            <input type="text" class="form-control" value="" id="tolak_status_pembayaran"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Keterangan Ditolak</label>
                            <input type="text" class="form-control" name="keterangan_tambahan" value=""
                                id="tolak_keterangan_tambahan">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" onclick="preventDefault()" class="btn btn-primary">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(document).ready(function() {
        $('#terimaTransaksi').on('click', function() {
            var transaksiId = $(this).data('transaksi-id');

            // Lakukan AJAX request untuk mendapatkan detail transaksi
            $.ajax({
                url: '{{ route('response.detailCustom', ':id') }}'.replace(
                    ':id',
                    transaksiId),
                method: 'GET',
                success: function(response) {
                    // Isi nilai input pada modal
                    $('#id').val(transaksiId);
                    $('#nama_pemesan').val(response.nama_pemesan);
                    $('#status_pembayaran').val(response.status_pembayaran);

                    if (response.delivery_option === 'Diantar Ke Tempat Pemesan') {
                        $('#kirim').show();
                        $('#pick-up').hide();
                    } else {
                        $('#delivery_option').val('Ambil Di Martaloka');
                        $('#kirim').hide();
                        $('#pick-up').show();
                    }
                }
            });
        });


        $('#tolakTransaksi').on('click', function() {
            var transaksiId = $(this).data('transaksi-id');

            // Lakukan AJAX request untuk mendapatkan detail transaksi
            $.ajax({
                url: '{{ route('response.detailCustom', ':id') }}'.replace(
                    ':id',
                    transaksiId),
                method: 'GET',
                success: function(response) {
                    $('#tolak_id').val(transaksiId);
                    $('#tolak_nama_pemesan').val(response.nama_pemesan);
                    $('#tolak_status_pembayaran').val(response.status_pembayaran);
                    // ...
                }
            });
        });
    });
</script>
