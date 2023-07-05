@extends('dosen.partials.main')

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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Input Materi Baru</h3>
                    <form action="{{ url('/dosen/updateMateri') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control" value="{{ $materi->id }}">
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
                                    {{-- <label>ID Dosen</label> --}}
                                    <input type="hidden" id="dosen_id" name="dosen_id" class="form-control" value="{{ $materi->dosen_id }}">
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
                                    {{-- <label>Tgl Upload</label> --}}
                                    <input type="hidden" id="tgl_upload" name="tgl_upload" class="form-control" value="{{ $materi->tgl_upload }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Judul Materi</label>
                                    <input type="text" id="judul_materi" name="judul_materi" class="form-control" value="{{ $materi->judul_materi }}">
                                </div>
                            </div>
                            <div class="">
                                <form class="mt-3">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="3" name="keterangan" id="keterangan">{{ $materi->keterangan }}</textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="form-group">
                                <label class="required tebal">File Materi</label><br>
                                <input type="hidden" class="form-control" name="surat_permohonan"id="surat_permohonan" disabled>
                                <embed src="{{ asset('storage/files/'.$materi->materi) }}" width="100%" height="600px"/>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Upload Materi</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="materi" name="materi" value="{{ $materi->materi }}">
                                            <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Deadline</label>
                                                <input type="date" id="tgl_deadline" name="tgl_deadline" class="form-control" value="{{ $materi->tgl_deadline }}">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="button" class="btn btn-danger" onclick="window.location='/dosen/materi'">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection