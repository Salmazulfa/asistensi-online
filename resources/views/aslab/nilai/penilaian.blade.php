@extends('aslab.partials.main')

@section('container')
<div class="container-fluid mt-5">
    @if (session()->has('success'))
            <div class="alert alert-success alert dismissible show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert dismissible show" role="alert">
                {{ session('error') }}
            </div>
        @endif
        
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $titleheader }}</h3>
                    <form action="/aslab/penilaian/save" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Materi</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control" value="{{ $laporan->id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Judul Materi :</label>
                                    <p class="ml-5" id="judul_materi" name="judul_materi">{{ $laporan->materi->judul_materi }}</p>
                                </div>
                            </div>
                            <div class="">
                                <form class="mt-3">
                                    <div class="form-group">
                                        <label class="text-dark">Keterangan :</label>
                                        <p class="ml-5" name="keterangan" id="keterangan">{{ $laporan->materi->keterangan }}</p>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Deadline :</label>
                                    <?php
                                        $tgl_deadline = $laporan->materi->tgl_deadline;
                                        if ($tgl_deadline == "") { ?>
                                            <p class="ml-5" id="tgl_deadline" name="tgl_deadline">-</p>
                                        <?php } else { ?>
                                            <p class="ml-5" id="tgl_deadline" name="tgl_deadline">{{ $laporan->materi->tgl_deadline }}</p>
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Tanggal Upload Laporan :</label>
                                    <?php
                                        $tgl_deadline = $laporan->materi->tgl_deadline;
                                        $tgl_upload = $laporan->tgl_upload;
                                        if ($tgl_upload > $tgl_deadline) { ?>
                                            <p id="tgl_upload" name="tgl_upload" class="ml-5 text-danger">{{ $laporan->tgl_upload }}</p>
                                        <?php } else { ?>
                                            <p id="tgl_upload" name="tgl_upload" class="ml-5">{{ $laporan->tgl_upload }}</p>
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">File Laporan :</label><br>
                                <embed src="{{ asset('storage/'.$laporan->laporan) }}" width="100%" height="600px"/>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Komentar : </label>
                                    <input type="text" id="komentar" name="komentar" class="form-control" value="{{ $laporan->komentar }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-dark">Nilai : </label>
                                    <input type="text" id="nilai" name="nilai" class="form-control" value="{{ $laporan->nilai }}">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="button" class="btn btn-dark" onclick="window.location='/aslab/nilai'">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection