@extends('adminlte::page')
@section('title', 'Form Jabatan')
@section('content_header')
    <h1>Form Jabatan</h1>
@stop
@section('content')
    <!-- <p>Welcome to this beautiful admin panel.</p> -->

   <!-- general form elements -->
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Data Jabatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($data as $rs)
              <form action="{{ route('jabatan.update',$rs->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input value="{{ $rs->nama }}"  type="text" class="form-control" name="nama" placeholder="">
                  </div>
                      @if($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
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
              @endforeach
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