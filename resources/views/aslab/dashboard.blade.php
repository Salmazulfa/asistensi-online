@extends('aslab.partials.main')

@section('container')
<div class="container-fluid">
      <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-4">Data Penilaian</h4>
                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-5 col-lg-5 col-xlg-3">
                            <div class="card card-hover">
                                <div class="p-2 bg-primary text-center" style="height: 150px">
                                    <h1 class="font-light text-white mt-2" style="font-size: 60px">{{ $dinilai }}</h1>
                                    <h5 class="text-white">Already assessed</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-xlg-3">
                            <div class="card card-hover">
                                <div class="p-2 bg-danger text-center" style="height: 150px">
                                    <h1 class="font-light text-white mt-2" style="font-size: 60px">{{ $belum }}</h1>
                                    <h5 class="text-white">Not yet assessed</h5>
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