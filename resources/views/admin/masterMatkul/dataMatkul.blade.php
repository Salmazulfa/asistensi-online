@extends('admin.partials.main')

@section('container')
<div class="container-fluid mt-5">
    {{-- PESAN ALERT --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- END OF PESAN ALERT --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Mata Kuliah</h4>
                    <h6 class="card-subtitle">Admin memanajemen seluruh data master dan memiliki seluruh hak akses untuk pengolahan data</h6>
                    <button type="button" class="btn btn-rounded btn-primary mt-1 mb-2" data-toggle="modal" data-target="#tambahMatkul"><span><i class="fas fa-plus-circle"></i></span> Tambah Data </button>
                    <div class="table-responsive mt-3">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Kuliah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($matkul as $row):$no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->matkul; ?></td>
                                    <td>
                                        <button type="button" class="btn waves-effect waves-light btn-outline-info" data-toggle="modal"
                                        data-target="#editMatkul" data-id="{{ $row->id }}" data-matkul="{{ $row->matkul }}" data-foto="{{ $row->foto }}"><span><i class="far fa-edit"></i></span> Edit </button>
                                        <button type="button" class="btn waves-effect waves-light btn-outline-danger" data-toggle="modal"
                                        data-target="#hapusMatkul" data-id="{{ $row->id }}"><span><i class="far fa-trash-alt"></i></span> Hapus </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Matkul -->
    <div class="modal fade" id="tambahMatkul" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Tambah Data Mata Kuliah</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="/admin/saveMatkul/" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                        <div class="form-group">
                            <label>Mata Kuliah</label>
                            <input type="text" id="matkul" name="matkul" class="form-control" placeholder="Mata Kuliah">
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Upload Foto</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                            <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Edit Matkul -->
    <div class="modal fade" id="editMatkul" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Edit Data Mata Kuliah</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="/admin/updateMatkul/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                        {{-- <div class="form-group">
                            <label>ID</label> --}}
                            <input type="hidden" id="id" name="id" class="form-control" placeholder="ID" value="">
                        {{-- </div> --}}
                        <div class="form-group">
                            <label>Mata Kuliah</label>
                            <input type="text" id="matkul" name="matkul" class="form-control" placeholder="Mata Kuliah" value="">
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Upload Foto</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                            <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Submit</button>
                            {{-- <button type="button" class="btn btn-dark">Kembali</button>     --}}
                        </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Hapus Matkul -->
    <div id="hapusMatkul" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Sistem bertanya-tanya?!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <i class="dripicons-wrong h1"></i>
            <p class="mt-3">Yakin mau hapus data?</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Gajadi deh</button>
            <form action="/admin/hapusMatkul/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dark my-2">Iyaps</button>
            </form>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection