<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <h4 class="text-center mt-3">List Data With Encrypt</h4>
    {{-- <h3 class="text-center mb-5">Detail Data</h3> --}}

    <table class="table table-bordered mt-3">
        <div class="container">
         <div class="row">
            <div class="clearfix col-md-6">
                <span class="pull-left">Nama Pemohon</span>
            </div>
            <div class="clearfix col-md-6">
                <strong class="pull-right">{{ $show->nama_pemohon }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6">
                <span class="pull-left">Tanggal Pengajuan</span>
            </div>
            <div class="clearfix col-md-6">
                <strong class="pull-right">{{ $show->tanggal_pengajuan }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Alamat</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->alamat }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Image</span>
            </div>
            <div class="clearfix col-md-6 ">
                <img src="{{ public_path('/storage/'.$show->image_encrypt) }}" style="width: 150px;height: 50px" alt="">
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Kab/Kota</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ strtoupper($show->kota) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Provinsi</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->provinsi }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Tel/Fax</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->fax }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Email</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->email }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Kode Pos</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->kodepos }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Warna dalam Merk</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->warna }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Deskripsi</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->deskripsi }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Merk</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->merk }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Kelas</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->kelas }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Jenis</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ $show->jenis }}</strong>
            </div>
         </div>
        </div>
    </table>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
