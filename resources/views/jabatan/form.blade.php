@extends('adminlte::page')
@section('title', 'Form Jabatan')
@section('content_header')
    <h1>Form Jabatan</h1>
@stop
@section('content')

   <!-- General form elements -->
   <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Jabatan</h3>
        </div>
        <!-- /.card-header -->
        <!-- Form start -->
        <form action="{{ route('jabatan.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Jabatan" required>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>   
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
                <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
                <hr><a href="{{ url('/jabatan') }}" class="btn btn-primary">Go Back</a>
            </div>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop