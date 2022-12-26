@extends('layouts.masterguest')

@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Data Encrypt</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">List Data Encrypt</li>
        </ol>
    </div>
@endsection

@section('content')
    {{-- <button type="button" class="btn btn-primary mb-3" id="btnAdd">
        Tambah List Data
    </button> --}}
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">List Data With Encrypt</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="table-data">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemohon</th>
                        <th>image</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($list as $lsdta)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{  Str::limit(Crypt::encryptString($lsdta->nama_pemohon), 10) }}</td>
                            <td>
                                {{-- <img src="{{ asset('storage').'/'.($lsdta->image_encrypt) }}" style="height: 50px; width: 100px"
                                    alt="" class="rounded"> --}}
                                    {{ Str::limit(Crypt::encryptString($lsdta->image_encrypt), 10) }}
                            </td>
                            <td>{{ Str::limit(Crypt::encryptString($lsdta->alamat), 10) }}</td>
                            <td>
                                <a href="{{ route('listdatashow.guest', $lsdta->id) }}" id="btnEdit"
                                    class="btn btn-success btn-sm shadow">Detail</a>
                                <a href="{{ route('downloadguest.pdf', $lsdta->id) }}" target="_blank"
                                    class="btn btn-danger btn-sm shadow"><i class="fas fa-download mr-2"></i>Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

