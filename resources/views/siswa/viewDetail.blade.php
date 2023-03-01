@extends('layouts.headerSiswa')
@section('content')
@foreach ($pembayaran as $item)
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
            <h1>Pembayaran SPP</h1>
            <h2>Riwayat Pembayaran</h2>
        </div>
    </div>
    <div class="row mt-5"> 
        <div class="col-lg-4 col-md-12">
            <div class="card shadow">
                <ul class="list-group">
                    <li class="list-group-item">
                        <small class="text-muted">NISN : </small>
                        <p>{{ $item->tagihan->siswa->nisn }}</p>
                    </li>
                    <li class="list-group-item">
                        <small class="text-muted">NIS : </small>
                        <p>{{ $item->tagihan->siswa->nis }}</p>
                    </li>
                    <li class="list-group-item">
                        <small class="text-muted">Alamat : </small>
                        <p>{{ $item->tagihan->siswa->alamat }}</p>
                    </li>
                    <li class="list-group-item">
                        <small class="text-muted">Telepon : </small>
                        <p>{{ $item->tagihan->siswa->telepon }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card shadow">
                <div class="body py-4">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <div class="form-group mb-3">
                                <label>Pembayaran SPP Bulan</label>
                                <input type="text" disabled class="form-control" value="{{ $item->tagihan->bulan }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Pembayaran SPP Tahun</label>
                                <input type="text" disabled class="form-control"
                                    value="{{ $item->tagihan->siswa->spp->tahun }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Nominal Bayar</label>
                                <input type="text" disabled class="form-control"
                                    value="Rp. {{ number_format($item->tagihan->siswa->spp->nominal) }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Dibayar Pada</label>
                                <input type="text" disabled class="form-control"
                                    value="{{ date('d-m-Y', strtotime($item->tgl_bayar)) }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Petugas</label>
                                <input type="text" disabled class="form-control"
                                    value="{{ $item->petugas->name }}">
                            </div>
                            <div class="mb-3">
                                <a href="{{ URL::previous() }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endforeach
@endsection
