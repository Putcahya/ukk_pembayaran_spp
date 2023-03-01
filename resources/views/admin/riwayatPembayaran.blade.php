@extends('layouts.headerAdmin')
@section('page', 'Detail Pembayaran')

@section('tittle', 'Detail Pembayaran')
@section('content')

@foreach ($pembayaran as $item)

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card mcard_3">
                <div class="body">
                    <a href="#"><img src="{{ asset('/') }}images/profile.jpg" class="rounded-circle shadow "
                            alt="profile-image"></a>
                    <h4>{{ $item->tagihan->siswa->name }}</h4>
                    <h5 class="m-t-10">{{ $item->level }}</h5>
                </div>
            </div>
            <div class="card">
                <div class="body">
                    <small class="text-muted">NISN : </small>
                    <p>{{ $item->tagihan->siswa->nisn }}</p>
                    <hr>
                    <small class="text-muted">NIS : </small>
                    <p>{{ $item->tagihan->siswa->nis }}</p>
                    <hr>
                    <small class="text-muted">Alamat : </small>
                    <p>{{ $item->tagihan->siswa->alamat }}</p>
                    <hr>
                    <small class="text-muted">Telepon : </small>
                    <p>{{ $item->tagihan->siswa->telepon }}</p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="body py-3">
                    <div class="text-center pt-3">
                        <h3>Riwayat Pembayaran</h3>
                    </div>
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

@endforeach

@endsection
