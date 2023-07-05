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
                    <form action="{{ url('/dosen/saveMateri') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Aslab</label> --}}
                                    <input type="hidden" id="aslab_id" name="aslab_id" class="form-control" value="{{ $aslab_id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Dosen</label> --}}
                                    <input type="hidden" id="dosen_id" name="dosen_id" class="form-control" value="{{ $dosen_id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Matkul</label> --}}
                                    <input type="hidden" id="matkul_id" name="matkul_id" class="form-control" value="{{ $matkul_id }}">
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
                                    <label>Judul Materi</label>
                                    <input type="text" id="judul_materi" name="judul_materi" class="form-control">
                                </div>
                            </div>
                            <div class="">
                                <form class="mt-3">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="3" name="keterangan" id="keterangan"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Upload Materi</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="materi" name="materi">
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <input type="date" name="tgl_deadline" id="tgl_deadline" class="form-control">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection