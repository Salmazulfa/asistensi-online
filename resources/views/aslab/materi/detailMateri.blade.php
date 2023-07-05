@extends('aslab.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row" id="materi">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $titleheader }}</h3>
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
                                <button type="button" class="btn btn-dark" onclick="window.location='/aslab/materi'">Kembali</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection