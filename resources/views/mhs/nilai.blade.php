@extends('mhs.partials.main')

@section('container')

  {{-- <div class="page-breadcrumb">
    <div class="row">
      <div class="col-7 align-self-center">
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item" style="font-size: 15px"><a href="#web">Web Programming</a></li>
              <li class="breadcrumb-item" style="font-size: 15px"><a href="#fr">Frameworok Programming</a></li>
              <li class="breadcrumb-item" style="font-size: 15px"><a href="#si">Sistem Informasi</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div> --}}


<div class="container-fluid mt-5">
    {{-- PESAN ALERT --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- END OF PESAN ALERT --}}
    <div class="row" id="web">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Web Programming</h4>
                    <div class="table-responsive mt-3">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="15px">Praktikum ke-</th>
                                    <th>Materi</th>
                                    <th>Nilai</th>
                                    <th>Komentar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($web as $row):$no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->materi->judul_materi; ?></td>
                                    <td><?= $row->nilai; ?></td>
                                    <td><?= $row->komentar; ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="fr">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Framework Programming</h4>
                    <div class="table-responsive mt-3">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="15px">Praktikum ke-</th>
                                    <th>Materi</th>
                                    <th>Nilai</th>
                                    <th>Komentar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($fr as $row):$no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->materi->judul_materi; ?></td>
                                    <td><?= $row->nilai; ?></td>
                                    <td><?= $row->komentar; ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="si">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sistem Informasi</h4>
                    <div class="table-responsive mt-3">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10px">Praktikum ke-</th>
                                    <th>Materi</th>
                                    <th>Nilai</th>
                                    <th>Komentar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($si as $row):$no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->materi->judul_materi; ?></td>
                                    <td><?= $row->nilai; ?></td>
                                    <td><?= $row->komentar; ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Danger Alert Modal -->
    <div id="hapusAdmin" class="modal fade" tabindex="-1" role="dialog"
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
          {{-- <form action="/admin/hapusAdmin/{{ $row->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark my-2">Iyaps</button>
          </form> --}}
        </div>
      </div>
    </div>
    </div>
</div>
@endsection