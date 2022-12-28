@extends('layouts.masterguest');

@section('breadcumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Show Data Encrypt</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Show Data Encrypt</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data With Encrypt</h6>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="">
                            <p class="font-weight-bold">Nama Pemohon</p>
                            <hr>
                            <p class="font-weight-bold">Tanggal Pengajuan</p>
                            <hr>
                            <p class="font-weight-bold">Alamat</p>
                            <hr>
                            <p class="font-weight-bold">Logo</p>
                            <hr>
                            <p class="font-weight-bold">Kab/Kota</p>
                            <hr>
                            <p class="font-weight-bold">Provinsi</p>
                            <hr>
                            <p class="font-weight-bold">Tel/Fax</p>
                            <hr>
                            <p class="font-weight-bold">Email</p>
                            <hr>
                            <p class="font-weight-bold">Kode Pos</p>
                            <hr>
                            <p class="font-weight-bold">Warna dalam Merk</p>
                            <hr>
                            <p class="font-weight-bold">Kelas</p>
                            <hr>
                            <p class="font-weight-bold">Nama Merk</p>
                            <hr>
                            <p class="font-weight-bold">Deskripsi Produk</p>
                            <hr>
                            <p class="font-weight-bold">Jenis Barang</p>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="">
                            <p>{{ $show->nama_pemohon }}</p>
                            <hr>
                            <p>{{ $show->tanggal_pengajuan }}</p>
                            <hr>
                            <p>{{ $show->alamat }}</p>
                            <hr>
                            <p>{{ Str::limit(Crypt::encryptString($show->image_encrypt), 25) }}</p>
                            <hr>
                            <p>{{ $show->kota }}</p>
                            <hr>
                            <p>{{ $show->provinsi }}</p>
                            <hr>
                            <p>{{ $show->fax }}</p>
                            <hr>
                            <p>{{ $show->email }}</p>
                            <hr>
                            <p>{{ $show->kodepos }}</p>
                            <hr>
                            <p>{{ Str::limit(Crypt::encryptString($show->warna), 25) }}</p>
                            <hr>
                            <p>{{ $show->deskripsi }}</p>
                            <hr>
                            <p>{{ Str::limit(Crypt::encryptString($show->merk), 25) }}</p>
                            <hr>
                            <p>{{ $show->kelas }}</p>
                            <hr>
                            <p>{{ $show->jenis }}</p>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('listdata.guest') }}" class="btn btn-warning">Close</a>
                </div>
            </div>
        </div>
    </div>
@endsection
