@extends('layouts.headerAdmin')
@section('page', 'Data Tagihan')


@section('tittle', 'Data Tagihan')
@section('content')
<div class="row clearfix justify-content-center">
    <div class="col-6 ">
        <form class="card small_mcard_1 p-4 ">
            <h5 class="text-center">Data Siswa</h5>
            @foreach ($siswa as $item)
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" disabled class="form-control" value="{{ $item->name }}"
                    placeholder="{{ $item->name }}">

            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" disabled class="form-control"
                    value="{{ $item->kelas->nama_kelas }} {{ $item->kelas->jurusan }}"
                    placeholder="{{ $item->kelas->nama_kelas }} {{ $item->kelas->jurusan }}">
            </div>
            @endforeach
        </form>
    </div>
    {{-- <div class="col-6 ">
        <form class="card small_mcard_1 p-4 ">
            <label>Kekurangan</label>
            <h5 class="text-center">Data Siswa</h5>
            <div class="form-group">
                @foreach ($spps as $sp)
                <input type="text" disabled class="form-control" value="Rp. {{ $sp->tahun }}">
                <input type="text" disabled class="form-control" value="Rp. {{ $sp->nominal }}">
                @endforeach
                <input type="text" disabled class="form-control" value="Rp. {{ $kekurangan }}">
            </div>
        </form>
    </div> --}}
</div>

<div class="row clearfix">
    @foreach ($tagihan as $item)
    <div class="col-lg-4 col-md-12">
        <div class="card small_mcard_1 shadow">
            <div class="user">
                <div class="details">
                    <h6 class="mb-0 mt-2 font-weight-bold">{{ $item->bulan }}</h6>
                    @if ($item->status == 'Belum Dibayar')
                    <p class="mb-0 text-danger"><small>{{ $item->status }}</small></p>
                    @else
                    <p class="mb-0 text-success"><small>{{ $item->status }}</small></p>
                    @endif
                    <p class="">Rp. {{ number_format($item->siswa->spp->nominal) }}</p>
                </div>
            </div>
            <div class="footer">
                @if($item->status== 'Belum Dibayar')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bayar{{ $item->id }}">
                    Bayar
                </button>
                @else
                @if (Auth::user()->level == 'admin')
                <a class="btn btn-primary" href="/admin/detailPembayaran/{{ $item->id }}">Detail</a>
                <a class="btn btn-warning" href="/admin/cetak/{{ $item->id }}">Cetak</a>
                @else
                <a class="btn btn-primary" href="/petugas/detailPembayaran/{{ $item->id }}">Detail</a>
                <a class="btn btn-warning" href="/petugas/cetak/{{ $item->id }}">Cetak</a>

                @endif
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@foreach ($tagihan as $item)
<!-- Modal -->
<div class="modal fade" id="bayar{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Pembayaran SPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (Auth::user()->level == 'admin')
                <form action="/admin/bayar" method="POST" enctype="multipart/form-data">
                    @else
                    <form action="/petugas/bayar" method="POST" enctype="multipart/form-data">

                        @endif
                        @csrf
                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-end">{{ __('NISN') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                    placeholder="" aria-label="" name="nisn" value="{{ $item->siswa->nisn }}" disabled>
                                @error('nisn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- hidden --}}
                            <div class="form-group mb-3">
                                {{-- <label for="">Id Tagihan</label> --}}
                                <input type="hidden" name="id_tagihan" class="form-control" placeholder="" aria-label=""
                                    value="{{ $item->id }}">
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="">Id Petugas</label> --}}
                                <input type="hidden" name="id_petugas" class="form-control" placeholder="" aria-label=""
                                    value="{{ Auth::User()->id }}">
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="">Id Siswa</label> --}}
                                <input type="hidden" name="id_siswa" class="form-control" placeholder="" aria-label=""
                                    value="{{ $item->siswa->id }}">
                            </div>
                        {{-- hidden --}}

                        <div class="row mb-3">
                            <label for="nama_siswa"
                                class="col-md-4 col-form-label text-md-end">{{ __('Nama Siswa') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    placeholder="" aria-label="" \ value="{{ $item->siswa->name }}" disabled>
                                @error('nama_siswa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bulan_spp"
                                class="col-md-4 col-form-label text-md-end">{{ __('SPP Bulan') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('bulan_spp') is-invalid @enderror"
                                    placeholder="" aria-label="" value="{{ $item->bulan }}" disabled>
                                @error('bulan_spp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bulan_tahun"
                                class="col-md-4 col-form-label text-md-end">{{ __('SPP Tahun') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('spp_tahun') is-invalid @enderror"
                                    placeholder="" aria-label="" value="{{ $item->siswa->spp->tahun }}" disabled>
                                @error('spp_tahun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bulan_tahun"
                                class="col-md-4 col-form-label text-md-end">{{ __('Nominal Tagihan') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('nominal_tagihan') is-invalid @enderror"
                                    placeholder="" aria-label="" value="{{ $item->siswa->spp->nominal }}" disabled
                                    name="nominal">
                                @error('nominal_tagihan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl_bayar"
                                class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Bayar') }}</label>
                            <div class="col-md-8">
                                <input type="date" name="tgl_bayar" class="form-control" placeholder="" aria-label="">
                                @error('tgl_bayar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nominal"
                                class="col-md-4 col-form-label text-md-end">{{ __('Jumlah Bayar') }}</label>
                            <div class="col-md-8">
                                <input type="number" name="nominal" min="{{  $item->siswa->spp->nominal }}"
                                    class="form-control" placeholder="" aria-label="">
                                @error('nominal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
            </div>
            <div class="row mb-0 justify-content-right">
                <div class="modal-footer float-right">
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success float-right">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
