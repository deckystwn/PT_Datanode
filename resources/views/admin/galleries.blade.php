@extends('admin.template')
@section('content')
<div class="container-fluid">
  <div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
      <div class="card-header text-uppercase">
        <span class="ml-5">
            <a href="/admin/gallery/create" class="me-2">
                <i class='fas fa-plus-circle fa-lg'></i> Tambah
            </a>
        </span>
      </div>
        <div class="card-body">
            {!! session('msg') !!}
            <div class="table-responsive">
                <table id="tableStandar" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->judul }}</td>
                                <td>{{ $row->gallerycategory->name }}</td>
                                <td>
                                    <img src="{{ $row->gambar ? '/storage/' . $row->gambar : '' }}"
                                        class="img-thumbnail" width="100px">
                                </td>
                                <td>
                                    <form action="/admin/gallery/{{ $row->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/admin/gallery/{{ $row->id }}/edit" class="btn btn-datatable btn-icon btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button 
                                            type="submit" class="btn btn-datatable btn-icon btn-danger"
                                            onclick="return confirm('Yakin ingin melanjutkan?')"><i class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($galleries->count() == 0)
                            <tr>
                                <td colspan="6" style="text-align: center;font-style:italic">Belum Ada Data Yang
                                    Tersedia
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection