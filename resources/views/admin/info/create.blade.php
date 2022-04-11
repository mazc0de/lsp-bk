@extends('admin.app')
@section('content')
    <h3>Tambah Info</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('admin/info/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control">
            <label for="isi">isi</label>
            <textarea name="isi" id="" cols="30" rows="10" class="form-control"></textarea>
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select>
            <div class='mt-3'>
                <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
                <a href="{{ url('admin/info') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
            </div>
        </form>
    </div>
@endsection
