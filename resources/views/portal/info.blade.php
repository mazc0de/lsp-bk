@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/03-About-me/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/03-About-me/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="recomend-area">
    <h4 class="title"><b class="light-color">Info</b></h4>
    <div class="row">

        @foreach ($data['infos'] as $infos)
        <div class="col-md-6">
            <a href="{{ url('info-detail/'.$infos->id) }}">
                <h1>
                    {{$infos->judul}}
                </h1>
                <b class="light-color">
                    {{ substr($infos->title, 0, 30).(strlen($infos->title) > 30 ? "..." : "") }}
                </b>
            </a>
            <div>
                {!! substr($infos->isi, 0, 30).(strlen($infos->isi) > 30 ? "..." : "") !!}
            </div>
        </div>
        @endforeach

    </div><!-- row -->
</div><!-- recomend-area -->
@endsection
