@extends('layouts.masterguest')

@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Data</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">List Data</li>
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
                                <a href="javascript:void(0)" id="btnDelete" data-id="#"
                                    class="btn btn-danger btn-sm shadow"><i class="fas fa-download mr-2"></i>Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade" id="modal-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        {{-- <input type="hidden" id="id"> --}}
                        <div class="form-group">
                            <label for="nama_pemohon">Nama Pemohon</label>
                            <input type="text" class="form-control" name="nama_pemohon" id="nama_pemohon"
                                aria-describedby="nama_pemohon" placeholder="Nama Pemohon">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
                        </div>
                        <div class="form-group">
                            <img id="img-preview" class="img-fluid mb-3 mt-2 col-sm-5 rounded">
                            <div class="custom-file">
                                {{-- <input type="hidden" id="old_image_encrypt"> --}}
                                <input type="file" class="custom-file-input" name="image_encrypt" id="image_encrypt"
                                    onchange="previewImage()">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCancel" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
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
                $('#btnSave').html('Save changes')
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
                fdata.append('nama_pemohon', $("#nama_pemohon").val());
                fdata.append('alamat', $("#alamat").val());
                fdata.append('image_encrypt', files);
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
                        $('#btnSave').html('Save changes');
                        $('#modal-data').modal('hide');
                        window.location.href = "";
                    },
                    error: function(data) {
                        console.log(data);
                        $('#btnSave').html('Save changes');

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
                    $('#title-modal').html('Ubah Data')

                    console.log(url);
                    // document.getElementById("id").value = response.id;
                    document.getElementById("nama_pemohon").value = response.nama_pemohon;
                    document.getElementById("alamat").value = response.alamat;

                    document.getElementById("image_encrypt").value = '';
                    const imgPreview = document.getElementById("img-preview");
                    imgPreview.style.display = 'block';
                    imgPreview.src = "{{ asset('storage') }}/" + response.image_encrypt;

                    $('#btnSave').html('Save changes')
                    $('#modal-data').modal('show');
                })

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
