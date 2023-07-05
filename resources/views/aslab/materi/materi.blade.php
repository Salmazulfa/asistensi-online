@extends('aslab.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php $no=0; foreach($materi as $row):$no++; ?>
                        <div class="col-lg-4">
                            <div class="jumbotron">
                                <h2 style="font-size: 28px">Pertemuan ke-{{ $no }}</h2>
                                <p>{{ $row->keterangan}}</p>
                                <hr class="my-4">
                                <p class="mb-4">
                                    <a class="btn btn-primary btn-md" href="/aslab/detailMateri/{{ $row->id }}" role="button">Detail</a>
                                </p>
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