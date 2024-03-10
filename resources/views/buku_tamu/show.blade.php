@extends('adminlte::page')
@section('title', 'Form Buku_tamu')
@section('content_header')
    <h1>Data Buku_tamu</h1>
@stop
@section('content')
    @foreach($ar_buku_tamu as $buku_tamu)
    <div class="media">
            <div class="media-body">
                <h3><u>{{ $buku_tamu->tam }}</u></h3>
                <p>
                    jabatan : {{ $buku_tamu->jab }}
                    <br>Tgl Bertemu : {{ $buku_tamu->tgl_bertemu }} <br>Keperluan : {{ $buku_tamu->keperluan }}
                </p>
                <hr><a href="{{ url('/buku_tamu') }}" class="btn btn-primary">Go Back</a>
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