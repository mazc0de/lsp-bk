@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/02-Single-post/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/02-Single-post/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
<div>
    <h1>{{$infos->judul}}</h1>
    <p>{{$infos->isi}}</p>
</div>
@endsection
