 @extends('layouts.headerAdmin')
 @section('page', 'Kelas')


 @section('tittle', 'Data Kelas')
 @section('content')
 <div class="row clearfix">
     <div class="col-lg-12">
         <div class="card">
             <div class="header">
                 <div class="row">
                     <div class="col-6">
                         <h2><strong>Data</strong> Kelas </h2>
                     </div>
                     <div class="col-6">
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                             data-target="#tambahKelas">
                             Tambah Kelas
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
                                 <th>Kelas</th>
                                 <th>Jurusan</th>
                                 <th width="5%">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no =1; ?>
                             @foreach ($kelas as $item)
                             <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td>{{ $item->nama_kelas }}</td>
                                 <td>{{ $item->jurusan }}</td>
                                 <td class="d-flex">
                                     <button type="button" class="btn btn-warning" data-toggle="modal"
                                         data-target="#ubahKelas{{ $item->id }}">
                                         <i class="zmdi zmdi-edit"></i>
                                     </button>
                                     @if (Auth::user()->level == 'admin')
                                        <a href="/admin/hapusKelas/{{ $item->id }}" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                                     @elseif(Auth::user()->level == 'petugas')
                                         <a href="/petugas/hapusKelas/{{ $item->id }}" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
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
 <div class="modal fade" id="tambahKelas" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kelas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>   
             </div>
             <div class="modal-body">
                @if (Auth::user()->level == 'admin')
                    <form method="POST" action="/admin/tambahKelas">
                @elseif(Auth::user()->level == 'petugas')
                    <form method="POST" action="/petugas/tambahKelas">
                @endif
                         @csrf

                         <div class="row mb-3">
                             <label for="kelas" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>

                             <div class="col-md-8">
                                 <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror"
                                     name="kelas" value="{{ old('kelas') }}" required autocomplete="kelas" autofocus>

                                 @error('kelas')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">
                             <label for="jurusan"
                                 class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>

                             <div class="col-md-8">
                                 <input id="jurusan" type="jurusan"
                                     class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"
                                     value="{{ old('jurusan') }}" required autocomplete="jurusan">

                                 @error('jurusan')
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

 @foreach ($kelas as $item)
 <div class="modal fade" id="ubahKelas{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Form Ubah Kelas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                @if (Auth::user()->level == 'admin')
                <form method="POST" action="/admin/ubahKelas/{{ $item->id }}">
            @elseif(Auth::user()->level == 'petugas')
                <form method="POST" action="/petugas/ubahKelas/{{ $item->id }}">
            @endif
                     @csrf

                     <div class="row mb-3">
                         <label for="kelas" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>

                         <div class="col-md-8">
                             <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror"
                                 name="kelas" value="{{ $item->nama_kelas }}" autocomplete="kelas" autofocus>

                             @error('kelas')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                         </div>
                     </div>

                     <div class="row mb-3">
                         <label for="jurusan" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>

                         <div class="col-md-8">
                             <input id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror"
                                 name="jurusan" value="{{ $item->jurusan }}" autocomplete="jurusan">

                             @error('jurusan')
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
