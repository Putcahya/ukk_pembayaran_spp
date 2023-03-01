@extends('layouts.headerAdmin')
@section('page', 'Laporan Pembayaran')


@section('tittle', 'Laporan Pembayaran')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6">
                        <h2><strong>Laporan</strong> Siswa </h2>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if (Auth::user()->level == 'admin')
                        <a href="/admin/cetakLaporan" class="btn btn-success my-3"><i class="zmdi zmdi-print"></i> Cetak Laporan</a>
                    @else
                        <a href="/petugas/cetakLaporan" class="btn btn-success my-3"><i class="zmdi zmdi-print"></i> Cetak Laporan</a>
                    @endif
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Nama Petugas</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>SPP Bulan</th>
                                <th>SPP Tahun</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nominal Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1; ?>
                            @foreach ($pembayaran as $item)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $item->petugas->name }}</td>
                                <td>{{ $item->tagihan->siswa->nisn }}</td>
                                <td>{{ $item->tagihan->siswa->nis }}</td>
                                <td>{{ $item->tagihan->siswa->name }}</td>
                                <td>{{ $item->tagihan->siswa->kelas->nama_kelas }} {{ $item->tagihan->siswa->kelas->jurusan }} </td>
                                <td>{{ $item->tagihan->bulan }}</td>
                                <td>{{ $item->tagihan->siswa->spp->tahun }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_bayar)) }}</td>
                                <td>Rp. {{ number_format($item->tagihan->siswa->spp->nominal) }}</td>
                                
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
