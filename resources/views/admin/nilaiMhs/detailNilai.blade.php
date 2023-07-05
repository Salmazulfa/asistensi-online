@extends('admin.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Detail Nilai Mahasiswa</h3>
                        <div class="form-body">
                            {{-- <div class="">
                                <div class="form-group">
                                    <label>ID</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control" placeholder="ID" 
                                    value="<?= $laporan->id ?>">
                                {{-- </div>
                            </div> --}}
                            <div class="">
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" 
                                    value="<?= $user->username ?>"
                                    >
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $laporan->mahasiswa->nama ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Mata Kuliah</label>
                                    <input type="text" id="matkul" name="matkul" class="form-control"
                                    value="<?= $laporan->materi->aslab->dosen->matkul->matkul ?>"
                                    >
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Dosen Pengampu</label>
                                    <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="<?= $laporan->materi->aslab->dosen->nama_dosen ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Asisten Praktikum</label>
                                    <input type="text" id="nama_aslab" name="nama_aslab" class="form-control" value="<?= $laporan->materi->aslab->nama_aslab ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Tanggal Upload Laporan</label>
                                    <?php
                                        $tgl_deadline = $laporan->materi->tgl_deadline;
                                        $tgl_upload = $laporan->tgl_upload;
                                        if ($tgl_upload >= $tgl_deadline) { ?>
                                            <input type="text" id="tgl_upload" name="tgl_upload" class="form-control text-danger" value="{{ $laporan->tgl_upload }}">
                                        <?php } else { ?>
                                            <input type="text" id="tgl_upload" name="tgl_upload" class="form-control" value="{{ $laporan->tgl_upload }}">
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Nilai Laporan</label>
                                    <input type="text" id="nilai" name="nilai" class="form-control" value="<?= $laporan->nilai ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Komentar Laporan</label>
                                    <input type="text" id="komentar" name="komentar" class="form-control" value="<?= $laporan->komentar ?>">
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="button" class="btn btn-dark" onclick="window.location='/admin/nilaiMhs'">Kembali</button>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection