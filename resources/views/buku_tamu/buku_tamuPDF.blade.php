@php
$ar_judul = ['No', 'Nama', 'Jabatan', 'Tanggal dan Waktu', 'Keperluan'];
$no = 1;
@endphp


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Buku_Tamu</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table e border="1" width="100%" cellspacing="1" align="center">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>