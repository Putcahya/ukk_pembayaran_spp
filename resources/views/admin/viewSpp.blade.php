 @extends('layouts.headerAdmin')
 @section('page', 'Data Spp')


 @section('tittle', 'Data spp')
 @section('content')
 <div class="row clearfix">
     <div class="col-lg-12">
         <div class="card">
             <div class="header">
                 <div class="row">
                     <div class="col-6">
                         <h2><strong>Data</strong> Spp </h2>
                     </div>
                     <div class="col-6">
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                             data-target="#tambahSpp">
                             Tambah Spp
                         </button>
                     </div>
                 </div>
             </div>
             <div class="body">
                 <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                         <thead>
                             <tr class ="text-center">
                                 <th width="5%">No</th>
                                 <th>Tahun</th>
                                 <th>Nominal Tiap Bulan</th>
                                 <th width="5%">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no =1; ?>
                             @foreach ($spp as $item)
                             <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td>{{ $item->tahun }}</td>
                                 <td>Rp. {{ number_format($item->nominal) }}</td>
                                 <td class="d-flex">
                                     <button type="button" class="btn btn-warning" data-toggle="modal"
                                         data-target="#ubahSpp{{ $item->id }}">
                                         <i class="zmdi zmdi-edit"></i>
                                     </button>
                                     @if (Auth::user()->level == 'admin')
                                        <a href="/admin/hapusSpp/{{ $item->id }}" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                                     @elseif(Auth::user()->level == 'petugas')
                                         <a href="/petugas/hapusSpp/{{ $item->id }}" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                                     @endif
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
 <div class="modal fade" id="tambahSpp" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Form Tambah Spp</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 @if (Auth::user()->level == 'admin')
                 <form method="POST" action="/admin/tambahSpp">
                     @elseif(Auth::user()->level == 'petugas')
                     <form method="POST" action="/petugas/tambahSpp">
                         @endif
                         @csrf

                         <div class="row mb-3">
                             <label for="tahun" class="col-md-4 col-form-label text-md-end">{{ __('Tahun') }}</label>

                             <div class="col-md-8">
                                 <input id="tahun" type="number" min="0"
                                     class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                                     value="{{ old('tahun') }}" required autocomplete="tahun">

                                 @error('tahun')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">
                             <label for="nominal"
                                 class="col-md-4 col-form-label text-md-end">{{ __('Nominal') }}</label>

                             <div class="col-md-8">
                                 <input id="nominal" type="number" min="0"
                                     class="form-control @error('nominal') is-invalid @enderror" name="nominal"
                                     value="{{ old('nominal') }}" required autocomplete="nominal">

                                 @error('nominal')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-0 justify-content-right">
                             <div class="modal-footer float-right">
                                 <button type="button" class="btn btn-danger float-right"
                                     data-dismiss="modal">Close</button>
                                 <button type="submit" name="submit" class="btn btn-success float-right">Save</button>
                             </div>
                         </div>
                     </form>
             </div>
         </div>
     </div>
 </div>

 @foreach ($spp as $item)
 <div class="modal fade" id="ubahSpp{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Form Ubah Spp</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 @if (Auth::user()->level == 'admin')
                 <form method="POST" action="/admin/ubahSpp/{{ $item->id }}">
                     @elseif(Auth::user()->level == 'petugas')
                     <form method="POST" action="/petugas/ubahSpp/{{ $item->id }}">
                         @endif
                         @csrf
                         <div class="row mb-3">
                             <label for="tahun" class="col-md-4 col-form-label text-md-end">{{ __('tahun') }}</label>

                             <div class="col-md-8">
                                 <input id="tahun" type="text" min="0" class="form-control @error('tahun') is-invalid @enderror"
                                     name="tahun" value="{{ $item->tahun }}" autocomplete="tahun">

                                 @error('tahun')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>
                         <div class="row mb-3">
                             <label for="nominal"
                                 class="col-md-4 col-form-label text-md-end">{{ __('Nominal') }}</label>

                             <div class="col-md-8">
                                 <input id="nominal" type="number" min="0"
                                     class="form-control @error('nominal') is-invalid @enderror" name="nominal"
                                     value="{{ $item->nominal }}" required autocomplete="nominal">

                                 @error('nominal')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-0 justify-content-right">
                             <div class="modal-footer float-right">
                                 <button type="button" class="btn btn-danger float-right"
                                     data-dismiss="modal">Close</button>
                                 <button type="submit" name="submit" class="btn btn-success float-right">Save</button>
                             </div>
                         </div>
                     </form>
             </div>
         </div>
     </div>
 </div>
 @endforeach
 @endsection
