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
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->nama_pemohon), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6">
                <span class="pull-left">Tanggal Pengajuan</span>
            </div>
            <div class="clearfix col-md-6">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->tanggal_pengajuan), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Alamat</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->alamat), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Image</span>
            </div>
            <div class="clearfix col-md-6 ">
                {{-- <strong class="pull-right">{{ strtoupper($show->nama_pemohon) }}</strong> --}}
                {{-- <img src="{{ storage_path($show->image_encrypt) }}" alt=""> --}}
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->image_encrypt), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Kab/Kota</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->kota), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Provinsi</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->provinsi), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Tel/Fax</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->fax), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Email</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->email), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Kode Pos</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->kodepos), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Warna dalam Merk</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->warna ), 25)}}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Deskripsi</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->deskripsi), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Merk</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->merk), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Kelas</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->kelas), 25) }}</strong>
            </div>
         </div>
         <div class="row mt-3">
            <div class="clearfix col-md-6 ">
                <span class="pull-left">Jenis</span>
            </div>
            <div class="clearfix col-md-6 ">
                <strong class="pull-right">{{ Str::limit(Crypt::encryptString($show->jenis), 25) }}</strong>
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
