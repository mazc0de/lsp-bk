@extends('admin.app')
@section('content')
    <h3>Tambah Running Text</h3>
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
        <form action="{{ url('admin/runningtext/edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{$data->judul}}">
            <label for="link">Link</label>
            <input type="text" name="link" class="form-control" value="{{$data->link}}">
            
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1" {{ (1 == $data->status) ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ (0 == $data->status) ? 'selected' : '' }}>Tidak Publish</option>
            </select>
            <div class='mt-3'>
                <input type="submit" name="submit" class="btn btn-md btn-primary" value="Update Data">
                <a href="{{ url('admin/runningtext') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
            </div>
        </form>
    </div>
@endsection
