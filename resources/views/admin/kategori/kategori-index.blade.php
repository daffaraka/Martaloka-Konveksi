@extends('admin.layout')
@section('title','Kategori')
@section('content')
    <a href="{{route('kategori.create')}}" class="btn btn-primary">Tambah Kategori</a>

    <div class="table-responsive mt-5 ">
        <table class="table table-striped table-bordered shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($kategoris as $data)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kategori }}</td>
                        <td>
                            <a href="{{route('kategori.edit',$data->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('kategori.destroy',$data->id)}}" class="btn btn-danger">Hapus</a>

                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
