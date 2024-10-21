@extends('admin.layout')
@section('title', 'Kontak')
@section('content')
    {{-- <a href="{{ route('kontak.create') }}" class="btn btn-info">
        <i class="fas fa-plus-circle"></i> Tambah Kontak
    </a> --}}

    <div class="table-responsive mt-4">
        <div class="row mt-4 mb-3">
            <div class="col-md-5">
                <form action="{{ route('kontak.index') }}" method="GET">
                    <div class="input-group">
                        <input name="search" type="text" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari kontak..." aria-label="Search">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form action="{{ route('kontak.index') }}" method="GET">
                    <div class="input-group">
                        <select name="filter" id="filter" class="form-select">
                            <option value="">--Filter Jenis Kelamin--</option>
                            <option value="L" {{ request('filter') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ request('filter') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-2 text-end">
                <a href="{{ route('kontak.index') }}" class="btn btn-warning">
                    <i class="fas fa-retweet"></i> Reset
                </a>
            </div>
        </div>

        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Telepon</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center" style="width: 130px;">Jenis Kelamin</th>
                    <th scope="col" class="text-center"style="width: 300px;">Pesan</th>
                    <th scope="col" class="text-center" style="width: 190px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kontaks as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->telepon }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $data->pesan }}</td>
                        <td class="text-center">
                            <a href="{{ route('kontak.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('kontak.destroy', $data->id) }}" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $kontaks->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
