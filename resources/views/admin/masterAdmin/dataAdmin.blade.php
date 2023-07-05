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
                    <h4 class="card-title">Data Admin</h4>
                    <h6 class="card-subtitle">Admin memanajemen seluruh data master dan memiliki seluruh hak akses untuk pengolahan data</h6>
                    <button class="btn btn-rounded btn-primary mt-1 mb-2" onclick="window.location='/admin/tambahData/'"><span><i class="fas fa-plus-circle"></i></span> Tambah Data </button>
                    <div class="table-responsive mt-3">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Admin</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($admin as $row):$no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->user->username; ?></td>
                                    <td><?= $row->nama_admin; ?></td>
                                    <td><?= $row->email; ?></td>
                                    <td>
                                        <button type="button" class="btn waves-effect waves-light btn-outline-info" onclick="window.location='/admin/editAdmin/{{ $row->id }}'"><span><i class="far fa-edit"></i></span> Edit </button>
                                        <button type="button" class="btn waves-effect waves-light btn-outline-danger" data-toggle="modal"
                                        data-target="#hapusAdmin" data-id="{{ $row->id }}"><span><i class="far fa-trash-alt"></i></span> Hapus </button>
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
          <form action="/admin/hapusAdmin/{{ $row->id }}" method="POST">
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