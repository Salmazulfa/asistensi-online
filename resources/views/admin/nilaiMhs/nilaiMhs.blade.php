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
                    <h4 class="card-title">Nilai Praktikum Mahasiswa</h4>
                    <h6 class="card-subtitle">Penilaian laporan praktikan dilakukan oleh asisten praktikum dibawah pengawasan dosen pengampu</h6>
                    <div class="table-responsive mt-3">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Mata Kuliah</th>
                                    <th>Dosen Pengampu</th>
                                    <th>Asisten Praktikum</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($laporan as $row):$no++;?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->mahasiswa->user->username; ?></td>
                                    <td><?= $row->materi->aslab->dosen->matkul->matkul; ?></td>
                                    <td><?= $row->materi->aslab->dosen->nama_dosen; ?></td>
                                    <td><?= $row->materi->aslab->nama_aslab; ?></td>
                                    <td><?= $row->nilai; ?></td>
                                    <td>
                                        <button type="button" class="btn waves-effect waves-light btn-outline-info" onclick="window.location='/admin/detailNilai/{{ $row->id }}'"><span><i class="fas fa-eye"></i></span> Detail </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection