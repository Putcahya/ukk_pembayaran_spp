@extends('layouts.headerAdmin')
@section('page', 'Siswa')


@section('tittle', 'Data Siswa')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6">
                        <h2><strong>Data</strong> Siswa </h2>
                    </div>
                    <div class="col-6">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#tambahSiswa">
                            Tambah Siswa
                        </button>
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
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tahun</th>
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
                                <td>{{ $item->spp->tahun }}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#ubahSiswa{{ $item->id }}">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <a href="/admin/hapusSiswa/{{ $item->id }}" class="btn btn-danger"><i
                                            class="zmdi zmdi-delete"></i>
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

<!-- Modal -->
@foreach ($siswa as $item)
<div class="modal fade" id="ubahSiswa{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (Auth::user()->level == 'admin')
                    <form method="POST" action="/admin/ubahSiswa/{{ $item->id }}">
                @else
                    <form method="POST" action="/petugas/ubahSiswa/{{ $item->id }}">
                @endif
                    @csrf


                    <div class="row mb-3">
                        <label for="nis" class="col-md-4 col-form-label text-md-end">{{ __('NIS') }}</label>

                        <div class="col-md-8">
                            <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror"
                                name="nis" value="{{ $item->nis }}" required autocomplete="nis" autofocus>

                            @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nisn" class="col-md-4 col-form-label text-md-end">{{ __('NISN') }}</label>

                        <div class="col-md-8">
                            <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror"
                                name="nisn" value="{{ $item->nisn }}" required autocomplete="nisn" autofocus>

                            @error('nisn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $item->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                         <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div> --}}

            <div class="row mb-3">
                <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                <div class="col-md-8">
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                        name="alamat" value="{{ $item->alamat }}" required autocomplete="new-alamat">

                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="telepon" class="col-md-4 col-form-label text-md-end">{{ __('Telepon') }}</label>

                <div class="col-md-8">
                    <input id="telepon" type="number" min="0"
                        class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                        value="{{ $item->telepon }}" required autocomplete="new-telepon">

                    @error('telepon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row ">
                <label for="kelas" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>

                <div class="col-md-8">
                    <div class="form-group">
                        <select class="form-control" id="id_kelas" name="id_kelas">
                            <option value="{{ $item->id_kelas }}" selected>{{ $item->kelas->nama_kelas }}
                                {{ $item->kelas->jurusan }}</option>
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }} {{ $kls->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('nis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row ">
                <label for="id_spp" class="col-md-4 col-form-label text-md-end">{{ __('Tahun') }}</label>

                <div class="col-md-8">
                    <div class="form-group">
                        <select class="form-control" id="id_spp" name="id_spp">
                            <option value="{{ $item->id_spp }}" selected>{{ $item->spp->tahun }}</option>
                            @foreach ($spp as $sp)
                            <option value="{{ $sp->id }}">{{ $sp->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_spp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                {{-- <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>
                --}}

                <div class="col-md-8">
                    <input id="level" type="hidden" value="petugas"
                        class="form-control @error('level') is-invalid @enderror" name="level" required
                        autocomplete="new-level">

                    @error('level')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
</div>
@endforeach
<!-- Modal -->
<div class="modal fade" id="tambahSiswa" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (Auth::user()->level == 'admin')
                    <form method="POST" action="/admin/tambahSiswa">
                @else
                    <form method="POST" action="/petugas/tambahSiswa">
                    
                @endif
                    @csrf


                    <div class="row mb-3">
                        <label for="nis" class="col-md-4 col-form-label text-md-end">{{ __('NIS') }}</label>

                        <div class="col-md-8">
                            <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror"
                                name="nis" value="{{ old('nis') }}" required autocomplete="nis" autofocus>

                            @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nisn" class="col-md-4 col-form-label text-md-end">{{ __('NISN') }}</label>

                        <div class="col-md-8">
                            <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror"
                                name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn" autofocus>

                            @error('nisn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <label for="nis" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>

                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="form-control" id="id_kelas" name="id_kelas">
                                    @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kelas }} {{ $item->jurusan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                        <div class="col-md-8">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" required autocomplete="new-alamat">

                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telepon" class="col-md-4 col-form-label text-md-end">{{ __('Telepon') }}</label>

                        <div class="col-md-8">
                            <input id="telepon" type="number" min="0"
                                class="form-control @error('telepon') is-invalid @enderror" name="telepon" required
                                autocomplete="new-telepon">

                            @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        {{-- <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>
                        --}}

                        <div class="col-md-8">
                            <input id="level" type="hidden" value="siswa"
                                class="form-control @error('level') is-invalid @enderror" name="level" required
                                autocomplete="new-level">

                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_spp" class="col-md-4 col-form-label text-md-end">{{ __('Tahun') }}</label>
                        <div class="col-md-8">

                            <div class="form-group">
                                <select class="form-control" id="id_spp" name="id_spp">
                                    @foreach ($spp as $item)
                                    <option value="{{ $item->id }}">{{ $item->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_spp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
</div>
@endsection
