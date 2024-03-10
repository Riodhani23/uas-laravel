@extends('adminlte::page')
@section('title', 'Form Tamu')
@section('content_header')
    <h1>Form Tamu</h1>
@stop
@section('content')

   <!-- General form elements -->
   <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Tamu</h3>
        </div>
        <!-- /.card-header -->
        <!-- Form start -->
        <form action="{{ route('tamu.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Masukkan Jenis Kelamin" required>
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
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
                <hr><a href="{{ url('/tamu') }}" class="btn btn-primary">Go Back</a>
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