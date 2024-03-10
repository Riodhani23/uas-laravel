@extends('adminlte::page')
@section('title', 'Form Tamu')
@section('content_header')
    <h1>Form Tamu</h1>
@stop
@section('content')
    <!-- <p>Welcome to this beautiful admin panel.</p> -->

   <!-- general form elements -->
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Data Tamu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($data as $rs)
              <form action="{{ route('tamu.update', $rs->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input value="{{ $rs->name }}"  type="text" class="form-control" name="name" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <input value="{{ $rs->gender }}"  type="text" class="form-control" name="gender" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No_hp</label>
                    <input value="{{ $rs->no_hp }}"  type="text" class="form-control" name="no_hp" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input value="{{ $rs->alamat }}"  type="text" class="form-control" name="alamat" placeholder="">
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
                <hr><a href="{{ url('/tamu') }}" class="btn btn-primary">Go Back</a>
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