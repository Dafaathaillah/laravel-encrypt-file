@extends('layouts.master')

@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Data</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">List Data</li>
        </ol>
    </div>
@endsection

@section('content')
    @if (auth()->user()->role == 'user')
        <button type="button" class="btn btn-primary mb-3" id="btnAdd">
            Tambah List Data
        </button>
    @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">List Data</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
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
                    @if ($list == null)
                        <tr>
                            <td class="text-center">There are no data found</td>
                        </tr>
                    @else
                        @foreach ($list as $lsdta)
                            <tr>
                                {{-- <td>{{ $lsdta->id }}</td> --}}
                                <td>{{ $no++ }}</td>
                                <td>{{ Str::limit($lsdta->nama_pemohon, 10) }}</td>
                                <td>
                                    <img src="{{ asset('storage') . '/' . $lsdta->image_encrypt }}"
                                        style="height: 50px; width: 100px" alt="" class="rounded">
                                </td>
                                <td>{{ Str::limit($lsdta->alamat, 10) }}</td>
                                <td>
                                    @if (auth()->user()->role == 'user')
                                        <a href="javascript:void(0)" id="btnEdit" data-id="{{ $lsdta->id }}"
                                            class="btn btn-info btn-sm shadow">Detail</a>
                                        <a href="{{ route('download.pdf', $lsdta->id) }}"
                                            class="btn btn-danger btn-sm shadow" target="_blank"><i
                                                class="fas fa-download mr-2"></i>Download</a>
                                    @else
                                        <a href="javascript:void(0)" id="btnEdit" data-id="{{ $lsdta->id }}"
                                            class="btn btn-success btn-sm shadow">Detail</a>
                                        <a href="{{ route('download.pdf', $lsdta->id) }}"
                                            class="btn btn-info btn-sm shadow"><i
                                                class="fas fa-download mr-2"></i>Download</a>
                                        <a href="javascript:void(0)" id="btnDelete" data-id="{{ $lsdta->id }}"
                                            class="btn btn-danger btn-sm shadow">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade" id="modal-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-modal">Tambah List Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-data">
                        <input type="hidden" id="id">
                        <div class="row">
                            <div class="form-group col-lg-6" id="simple-date1">
                                <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="2022/12/12" id="tanggal_pengajuan">
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="nama_pemohon">Nama Pemohon</label>
                                <input type="text" class="form-control" name="nama_pemohon" id="nama_pemohon"
                                    aria-describedby="nama_pemohon" placeholder="ex: mr.jacob...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                    placeholder="ex: jl. Candi...">
                            </div>
                            <div class="form-group col-lg-6">
                                <img id="img-preview" class="img-fluid mb-3 mt-2 col-sm-5 rounded">
                                <div class="custom-file">
                                    {{-- <input type="hidden" id="old_image_encrypt"> --}}
                                    <input type="file" class="custom-file-input" name="image_encrypt" id="image_encrypt"
                                        onchange="previewImage()">
                                    <label class="custom-file-label" for="image">Upload Logo</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="kota">Kab/Kota</label>
                                <input type="text" class="form-control" name="kota" id="kota"
                                    aria-describedby="kota" placeholder="ex: Surabaya">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" name="provinsi" id="provinsi"
                                    aria-describedby="provinsi" placeholder="ex:Jawa Timur">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="fax">Tel/fax</label>
                                <input type="text" class="form-control" name="fax" id="fax"
                                    aria-describedby="fax" placeholder="ex: 08323...">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    aria-describedby="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="kodepos">kode pos</label>
                                <input type="text" class="form-control" name="kodepos" id="kodepos"
                                    aria-describedby="kodepos" placeholder="ex: 72171">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="warna">Warna dalam Merk</label>
                                <input type="text" class="form-control" name="warna" id="warna"
                                    aria-describedby="warna" placeholder="ex: Biru">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas"
                                    aria-describedby="kelas" placeholder="ex: 1...">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="jenis">Jenis Barang</label>
                                <input type="text" class="form-control" name="jenis" id="jenis"
                                    aria-describedby="jenis" placeholder="ex: jenis1...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="deskripsi">Deskripsi Produk</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" aria-describedby="deskripsi"
                                    placeholder="ex: barang bagus..." name="deskripsi" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="merk">Nama Merk</label>
                                <input type="text" class="form-control" name="merk" id="merk"
                                    aria-describedby="merk" placeholder="ex: Sanco">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCancel" class="btn btn-outline-primary">Close</button>
                    <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('body').on('click', '#btnAdd', function() {
                $('#title-modal').html('Form Tambah Post');
                document.getElementById("form-data").reset();
                $('#btnSave').html('Save').show()
                $('#modal-data').modal('show');
            });
        });

        $(document).ready(function() {
            $('body').on('click', '#btnCancel', function() {
                $("#img-preview").hide();
                $('#modal-data').modal('hide');
            });
        });

        $(document).ready(function() {
            $('body').on('click', '#btnSave', function() {
                var fdata = new FormData();
                var files = $('#image_encrypt')[0].files[0];
                if (typeof(files) == "undefined") {
                    files = '';
                }
                fdata.append('id', $('#id').val());
                fdata.append('nama_pemohon', $("#nama_pemohon").val());
                fdata.append('alamat', $("#alamat").val());
                fdata.append('tanggal_pengajuan', $("#tanggal_pengajuan").val());
                fdata.append('kota', $("#kota").val());
                fdata.append('provinsi', $("#provinsi").val());
                fdata.append('fax', $("#fax").val());
                fdata.append('email', $("#email").val());
                fdata.append('kodepos', $("#kodepos").val());
                fdata.append('warna', $("#warna").val());
                fdata.append('kelas', $("#kelas").val());
                fdata.append('jenis', $("#jenis").val());
                fdata.append('deskripsi', $("#deskripsi").val());
                fdata.append('merk', $("#merk").val());
                fdata.append('image_encrypt', files);
                // console.log(fdata);
                $.ajax({
                    data: fdata,
                    url: "{{ route('listdata.save') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        $('#btnSave').html('Save').show();
                        $('#modal-data').modal('hide');
                        window.location.href = "";
                    },
                    error: function(data) {
                        console.log(data);
                        $('#btnSave').html('Save');

                    }
                });
            });
        });

        $(document).ready(function() {
            $('body').on('click', '#btnEdit', function() {
                ids = $(this).attr("data-id");
                console.log(ids);
                var url = "{{ route('listdata.show', ['listdata' => ':id']) }}";
                url = url.replace(':id', ids);
                $.get(url, function(response) {
                    $('#title-modal').html('Detail Data')                       
                        console.log(url);
                        document.getElementById("id").value = response.id;
                        document.getElementById("nama_pemohon").value = response.nama_pemohon;
                        document.getElementById("tanggal_pengajuan").value = response.tanggal_pengajuan;
                        document.getElementById("kota").value = response.kota;
                        document.getElementById("provinsi").value = response.provinsi;
                        document.getElementById("fax").value = response.fax;
                        document.getElementById("email").value = response.email;
                        document.getElementById("kodepos").value = response.kodepos;
                        document.getElementById("warna").value = response.warna;
                        document.getElementById("deskripsi").value = response.deskripsi;
                        document.getElementById("merk").value = response.merk;
                        document.getElementById("kelas").value = response.kelas;
                        document.getElementById("jenis").value = response.jenis;
                        document.getElementById("alamat").value = response.alamat;
    
                        document.getElementById("image_encrypt").value = '';
                        const imgPreview = document.getElementById("img-preview");
                        imgPreview.style.display = 'block';
                        imgPreview.src = "{{ asset('storage') }}/" + response.image_encrypt;
    
                        $('#btnSave').hide();
                        $('#modal-data').modal('show');
                })

            });
        });

        $(document).ready(function() {
            $('body').on('click', '#btnDelete', function() {
                var dataId = $(this).attr("data-id");
                var data = dataId.split('#');
                var url = "{{ route('listdata.destroy', ['listdata' => ':id']) }}"
                url = url.replace(':id', data[0]);
                $.ajax({
                    url: url,
                    type: "DELETE",
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = "";
                    },
                    error: function(data) {
                        console.log(url);
                    }
                });
            });
        });

        function previewImage() {
            const image = document.querySelector('#image_encrypt');
            const imgPreview = document.querySelector('#img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
