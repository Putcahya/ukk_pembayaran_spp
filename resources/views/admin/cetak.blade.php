<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Cetak Pembayaran</title>
</head>

<body>
    <div class="border border-dark container p-4 px-5">
        <div class="text-center mb-3">
            <h3>Bukti Pembayaran SPP</h3>
            <h5>SMK N 1 Bantul</h5>
        </div>  
        @foreach ($pembayaran as $p)
        <div class="row justify-content-center mb-3">
            <div class="col">
                <table class="w-100">
                    <tr>
                        <td class="p font-weight-bold">NISN</td>
                        <td>:</td>
                        <td width="30%">{{ $p->tagihan->siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <td class="p font-weight-bold">NIS</td>
                        <td>:</td>
                        <td width="30%">{{ $p->tagihan->siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td class="p font-weight-bold">Nama Siswa</td>
                        <td>:</td>
                        <td width="30%">{{ $p->tagihan->siswa->name }}</td>
                    </tr>
                    <tr>
                        <td class="p font-weight-bold">Kelas</td>
                        <td>:</td>
                        <td width="30%">{{ $p->tagihan->siswa->kelas->nama_kelas }} {{ $p->tagihan->siswa->kelas->jurusan }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach

        <div class="table w-100">
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>No</th>
                    <th>Bulan Bayar</th>
                    <th>Tahun Bayar</th>
                    <th>Nominal</th>
                    <th>Tanggal Bayar</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <?php $no =1; ?>
                    @foreach ($pembayaran as $p)
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $p->tagihan->bulan }}</td>
                    <td>{{ $p->tagihan->siswa->spp->tahun }}</td>
                    <td>Rp. {{ number_format($p->tagihan->siswa->spp->nominal) }}</td>
                    <td>{{ date('d-m-Y', strtotime($p->tgl_bayar))}}</td>
                    <td>{{ $p->tagihan->status }}</td>
                        
                    @endforeach
                </tr>

            </table>
        </div>
        <div class="row justify-content-end">
            <div class="col-4">
                <div class="mb-3">
                    <strong>Total Bayar =</strong><span> Rp. {{ number_format($p->tagihan->siswa->spp->nominal) }}</span>
                </div>
                <div class="text-center">
                    <p>Petugas</p>
                    <p>{{ $p->petugas->name }}</p>
                </div>
            </div>
        </div>
    </div>





<script>
    window.print();
</script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>