@extends('mhs.partials.main')

@section('container')
<div class="container-fluid mt-5">
    {{-- PESAN ALERT --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- END OF PESAN ALERT --}}
    <div class="row" id="materi">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Detail Materi</h3>
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Materi</label> --}}
                                    <input type="hidden" id="materi_id" name="materi_id" class="form-control" value="{{ $materi->id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Aslab</label> --}}
                                    <input type="hidden" id="id_aslab" name="id_aslab" class="form-control" value="<?= $materi->id_aslab ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Judul Materi :</label>
                                    <p class="ml-5" id="judul_materi" name="judul_materi">{{ $materi->judul_materi }}</p>
                                </div>
                            </div>
                            <div class="">
                                <form class="mt-3">
                                    <div class="form-group">
                                        <label class="text-dark">Keterangan :</label>
                                        <p class="ml-5" name="keterangan" id="keterangan">{{ $materi->keterangan }}</p>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Diupload tanggal : </label>
                                    <p class="ml-5" id="tgl_upload" name="tgl_upload">{{ $materi->tgl_upload }}</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Deadline :</label>
                                    <?php
                                        $tgl_deadline = $materi->tgl_deadline;
                                        if ($tgl_deadline == "") { ?>
                                            <p class="ml-5" id="tgl_deadline" name="tgl_deadline">-</p>
                                        <?php } else { ?>
                                            <p class="ml-5" id="tgl_deadline" name="tgl_deadline">{{ $materi->tgl_deadline }}</p>
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">File Materi :</label><br>
                                <embed src="{{ asset('storage/files/'.$materi->materi) }}" width="100%" height="600px"/>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" onclick="kerjakan()">Kerjakan</button>
                                <button type="button" class="btn btn-dark" onclick="window.location='/mk/web'">Kembali</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="kerjakan" style="display: none">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    @if ($json != "null") 
                    <form action="{{ url('/web/laporan/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Laporan</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control" value="{{ $id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                {{-- <label class="text-dark">File Laporan :</label><br> --}}
                                <embed src="{{ asset('storage/'.$laporan) }}" width="100%" height="600px"/>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Edit Laporan</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="laporan" name="laporan">
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Tanggal Upload Laporan :</label>
                                    @if ($tgl_upload > $materi->tgl_upload)
                                    <p class="text-danger ml-5" id="tgl_upload" name="tgl_upload">{{ $tgl_upload }}</p>
                                    @else
                                    <p class="ml-5 text-dark" id="tgl_upload" name="tgl_upload">{{ $tgl_upload }}</p>
                                    @endif
                                    <input type="hidden" id="tgl_upload" name="tgl_upload" class="form-control" value="<?= date("Y-m-d") ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Komentar : </label>
                                    @if ($komentar == "")
                                    <p class="ml-5" id="komentar" name="komentar">-</p>
                                    @else
                                    <p class="ml-5" id="komentar" name="komentar">{{ $komentar }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Nilai : </label>
                                    @if ($nilai == "")
                                    <p class="ml-5" id="nilai" name="nilai">-</p>
                                    @else
                                    <p class="ml-5" id="nilai" name="nilai">{{ $nilai }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Update</button>
                                <button type="button" onclick="cancel()" class="btn btn-dark">Cancel</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ url('/web/laporan/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Materi</label> --}}
                                    <input type="hidden" id="materi_id" name="materi_id" class="form-control" value="{{ $materi->id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Matkul</label> --}}
                                    <input type="hidden" id="matkul_id" name="matkul_id" class="form-control" value="{{ $materi->matkul_id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Dosen</label> --}}
                                    <input type="hidden" id="dosen_id" name="dosen_id" class="form-control" value="{{ $materi->dosen_id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Aslab</label> --}}
                                    <input type="hidden" id="aslab_id" name="aslab_id" class="form-control" value="{{ $materi->aslab_id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>Tanggal Upload</label> --}}
                                    <input type="hidden" id="tgl_upload" name="tgl_upload" class="form-control" value="<?= date("Y-m-d") ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Mahasiswa</label> --}}
                                    <input type="hidden" id="mahasiswa_id" name="mahasiswa_id" class="form-control" value="{{ $mhs_id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Upload Laporan</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="laporan" name="laporan">
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="button" onclick="cancel()" class="btn btn-dark">Cancel</button>
                            </div>
                        </div>
                    </form>         
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection