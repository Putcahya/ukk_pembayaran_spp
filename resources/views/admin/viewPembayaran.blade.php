@extends('layouts.headerAdmin')
@section('page', 'Pembayaran')


@section('tittle', 'Data Pembayaran')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6">
                        <h2><strong>Data</strong> Siswa </h2>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>NISN</th>
                                <th>Nis</th>
                                <th>Kelas</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1; ?>
                            @foreach ($siswa as $item)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->kelas->nama_kelas }} {{ $item->kelas->jurusan }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="d-flex">
                                    @if (Auth::user()->level =='admin')
                                        <a href="/admin/tagihanBulan/{{ $item->id }}" class="btn btn-primary">Lihat Detail
                                    @else
                                        <a href="/petugas/tagihanBulan/{{ $item->id }}" class="btn btn-primary">Lihat Detail 
                                    @endif
                                    </a>
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection