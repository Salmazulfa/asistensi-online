@extends('aslab.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row" id="web">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nilai Praktikan</h4>
                    <h6 class="card-subtitle">Penilaian laporan praktikan dilakukan oleh asisten praktikum dibawah pengawasan dosen pengampu</h6>
                    <div class="table-responsive mt-3">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Materi</th>
                                    <th>Nilai</th>
                                    <th>Komentar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($laporan as $row):$no++; ?>
                                <tr>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $row->mahasiswa->nama; ?></td>
                                    <td><?= $row->materi->judul_materi; ?></td>
                                    <td><?= $row->nilai; ?></td>
                                    <td><?= $row->komentar; ?></td>
                                    <td>
                                        <button type="button" class="btn waves-effect waves-light btn-outline-info" onclick="window.location='/aslab/penilaian/{{ $row->id }}'"><span><i class="far fa-edit"></i></span> Nilai </button>
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
</div>
@endsection