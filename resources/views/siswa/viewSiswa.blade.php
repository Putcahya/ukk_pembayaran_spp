@extends('layouts.headerSiswa')
@section('content')
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
                <h1>Pembayaran SPP</h1>
                <h2>Yuk bayar SPP !</h2>
            </div>
        </div>

        <div class="row icon-boxes">
            @foreach ($tagihan as $item)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 pb-3" data-aos="zoom-in"
                data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon h1"><i class="ri-stack-line"></i></div>
                    <h4 class="title"><a href="">{{ $item->bulan }}</a></h4>

                   <p class="description mx-4 text-center">SPP Tahun : {{ $item->siswa->spp->tahun }}</p>
                    <p class="description mx-4 text-center">Rp. {{ $item->siswa->spp->nominal }}</p>

                    @if ($item->status == 'Dibayar')
                    <button type="button" class="btn btn-success btn-sm mt-3">Telah Dibayar</button>
                    <a href="/siswa/detail/{{  $item->id  }}" class="btn btn-warning btn-sm mt-3"><i class="bi bi-eye"></i></a>
                    @else
                    <button type="button" class="btn btn-danger btn-sm mt-3">Belum Dibayar</button>
                    @endif
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
