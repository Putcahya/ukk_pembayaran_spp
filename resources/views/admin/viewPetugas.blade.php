 @extends('layouts.headerAdmin')
 @section('page', 'Petugas')


 @section('tittle', 'Data Petugas')
 @section('content')
 <div class="row clearfix">
     <div class="col-lg-12">
         <div class="card">
             <div class="header">
                 <div class="row">
                     <div class="col-6">
                         <h2><strong>Data</strong> Petugas </h2>
                     </div>
                     <div class="col-6">
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                             data-target="#tambahPetugas">
                             Tambah Petugas
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
                                 <th>Nama</th>
                                 <th>Email</th>
                                 <th>Telepon</th>
                                 <th>Alamat</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no =1; ?>
                             @foreach ($petugas as $item)
                             <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td>{{ $item->name }}</td>
                                 <td>{{ $item->email }}</td>
                                 <td>{{ $item->telepon }}</td>
                                 <td>{{ $item->alamat }}</td>
                                 <td class="d-flex">
                                     <button type="button" class="btn btn-warning" data-toggle="modal"
                                         data-target="#ubahPetugas{{ $item->id }}">
                                         <i class="zmdi zmdi-edit"></i>
                                     </button>
                                     <a href="/admin/hapusPetugas/{{ $item->id }}" class="btn btn-danger"><i class="zmdi zmdi-delete"></i>
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
 <div class="modal fade" id="tambahPetugas" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Form Tambah Petugas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form method="POST" action="/admin/tambahPetugas">
                     @csrf

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
                     </div>

                     <div class="row mb-3">
                         <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                         <div class="col-md-8">
                             <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                 name="alamat"  required autocomplete="new-alamat">

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
                             <input id="telepon" type="number" min="0" class="form-control @error('telepon') is-invalid @enderror"
                                 name="telepon" required autocomplete="new-telepon">

                             @error('telepon')
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

 @foreach ($petugas as $item)
 <div class="modal fade" id="ubahPetugas{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Form Ubah Petugas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="/admin/ubahPetugas/{{ $item->id }}">
                     @csrf

                     <div class="row mb-3">
                         <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                         <div class="col-md-8">
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                 name="name" value="{{ $item->name }}" autocomplete="name" autofocus>

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
                                 name="email" value="{{ $item->email }}" autocomplete="email">

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
                                 name="alamat" value="{{ $item->alamat }}" autocomplete="new-alamat">

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
                             <input id="telepon" type="number" min="0" class="form-control @error('telepon') is-invalid @enderror"
                                value="{{ $item->telepon }}" name="telepon" autocomplete="new-telepon">

                             @error('telepon')
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

                     <div class="row mb-3">
                         <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                         <div class="col-md-8">
                             <input id="password" type="hidden" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{ $item->password }}">
                             <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="new-password">
                            <span class="text-danger">*reset password</span>
                             @error('password')
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
