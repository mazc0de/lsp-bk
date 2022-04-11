@extends('admin.app')
@section('content')
    <h3>Running Text</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/runningtext/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>

    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Judul</th>
                <th>Link</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $runningtext)
        <tr>
            <td>{{$runningtext->judul}}</td>
            <td>{{$runningtext->link}}</td>
            <td>{{($runningtext->status == 1) ? "publish" : "tidak publish"}}</td>
            <td>
                <a href="{{ url('admin/runningtext/edit/'.$runningtext->id) }}" class="btn btn-primary btn-md"><i class="far fa-edit"></i> Edit</a>
                <a onclick="return confirm('Are you sure?')" href="{{ url('admin/runningtext/delete/'.$runningtext->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash" ></i> Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection
