@extends('admin.layout')
@section('title', 'Produk')
@section('content')
    <a href="{{ route('produk.create') }}" class="btn btn-info">
        <i class="fas fa-plus-circle "></i> Tambah Produk
    </a>

    <div class="table-responsive mt-4">
        <div class="row mb-3">
            <div class="col-md-5">
                <form action="{{ route('produk.index') }}" method="GET">
                    <div class="input-group">
                        <input name="search" type="text" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari..." aria-label="Search">
                        <button class="btn btn-secondary" type="submit" id="button-addon2">
                            <i class="fas fa-search"></i> Cari
                        </button>

                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <form action="{{ route('produk.index') }}" method="GET">
                    <div class="input-group">
                        <select name="filter" id="filter" class="form-select">
                            <option value="">--Filter kategori--</option>
                            <option value="polo" {{ request('filter') == 'polo' ? 'selected' : '' }}>Polo</option>
                            <option value="kemeja" {{ request('filter') == 'kemeja' ? 'selected' : '' }}>Kemeja</option>
                            <option value="jersey" {{ request('filter') == 'jersey' ? 'selected' : '' }}>Jersey</option>
                        </select>
                        <button class="btn btn-secondary" type="submit" id="button-addon2">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-5 text-end">
                <a href="{{ route('produk.index') }}" class="btn btn-warning">
                    <i class="fas fa-retweet"></i> Reset
                </a>
            </div>
        </div>




        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nama Produk</th>
                    <th scope="col" class="text-center" style="width: 170px;">Kategori Produk</th>
                    <th scope="col" class="text-center" style="width: 200px;">Gambar Produk</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Stok</th>
                    <th scope="col" class="text-center" style="width: 190px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_produk }}</td>
                        <td>{{ $data->kategori->nama_kategori }}</td>
                        <td>
                            <img src="{{ asset('produk/' . $data->gambar_produk) }}" width="200" alt="Gambar Produk">
                        </td>
                        <td>{{ number_format($data->harga_produk) }}</td>
                        <td class="text-center">{{ $data->stok }}</td>
                        <td>
                            <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('produk.destroy', $data->id) }}" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $produk->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
