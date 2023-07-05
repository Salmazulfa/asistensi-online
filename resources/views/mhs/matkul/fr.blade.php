@extends('mhs.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Materi Kuliah Praktikum {{ $titleheader }}</h4>
                    <div class="row">
                        <?php $no=0; foreach($materi as $row):$no++; ?>
                        <div class="card col-md-5 m-3">
                            <div class="card-header">
                                Pertemuan ke-{{ $no }}
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">{{ $row->judul_materi }}</h5>
                              <p class="card-text">{{ $row->keterangan}}</p>
                              <a href="/mk/fr/detail/{{ $row->id }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection