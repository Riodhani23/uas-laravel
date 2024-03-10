@extends('adminlte::page')
@section('title', 'Data Tamu')
@section('content_header')
<h1>Data Tamu</h1>
@stop
@section('content')
<!-- <p>Welcometo this beatiful admin panel.</p> -->
@php
$ar_judul = ['No', 'Nama', 'Jabatan', 'Tanggal dan Waktu', 'Keperluan','Action'];
$no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Tamu</h3>
        <br><br>
        <a href="{{ route('buku_tamu.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
        <a href="{{ url('buku_tamupdf') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Unduh Buku Tamu </a>
         <a class="btn btn-success" href="{{ url('buku_tamucsv') }}"><i class="fa fa-file-excel"></i> Export to CSV</a> 
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    @foreach($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($ar_buku_tamu as $bt)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $bt->tam }}</td>
                    <td>{{ $bt->jab }}</td>
                    <td>{{ $bt->tgl_bertemu }}</td>
                    <td>{{ $bt->keperluan }}</td>
                    <td>
                        <form method="POST" action="{{ route('buku_tamu.destroy', $bt->id) }}">
                            @csrf {{--security untuk menghindari dari serangan pada saat input form--}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('buku_tamu.show', $bt->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-success" href="{{ route('buku_tamu.edit', $bt->id) }}"><i class="fa fa-pen-square"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop
@section('js')
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- <script> console.log('Hi!')</script>  -->
@stop