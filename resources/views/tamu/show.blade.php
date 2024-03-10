@extends('adminlte::page')
@section('title', 'Detail Tamu')
@section('content_header')
    <h1>Data tamu</h1>
@stop
@section('content')
    @foreach($ar_tamu as $tamu)
    <div class="media">
            <div class="media-body">
                <h3><u>{{ $tamu->name }}</u></h3>
                <p>
                    Gender : {{ $tamu->gender }}
                    <br>No_hp : {{ $tamu->no_hp }} <br>Alamat : {{ $tamu->alamat }}
                </p>
                <hr><a href="{{ url('/tamu') }}" class="btn btn-primary">Go Back</a>
            </div>
    </div>
    @endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop