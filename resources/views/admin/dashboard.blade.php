@extends('admin.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-4 col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><i class="fas fa-user-secret mr-3"></i>Data Admin</h4>
                <div class="text-center">
                    <input data-plugin="knob" data-width="220" data-height="220" data-linecap=round
                        data-fgColor="#01caf1" value="{{ $admin }}" data-skin="tron" data-angleOffset="180"
                        data-readOnly=true data-thickness=".2" />
                </div>
                <div class="text-right mt-3 text-info">
                  <a href="/admin/dataAdmin"><i class="fas fa-list-alt"></i> Lihat Detail</a>
                </div>
            </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><i class="fas fa-female"></i><i class="fas fa-male mr-3"></i>Data Dosen</h4>
                <div class="text-center">
                    <input data-plugin="knob" data-width="220" data-height="220" data-linecap=round
                        data-fgColor="#01caf1" value="{{ $dosen }}" data-skin="tron" data-angleOffset="180"
                        data-readOnly=true data-thickness=".2" />
                </div>
                <div class="text-right mt-3 text-info">
                  <a href="/admin/dataDosen"><i class="fas fa-list-alt"></i> Lihat Detail</a>
                </div>
            </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-3">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title"><i class="fas fa-book mr-3"></i>Data Aslab</h4>
                  <div class="text-center">
                      <input data-plugin="knob" data-width="220" data-height="220" data-linecap=round
                          data-fgColor="#01caf1" value="{{ $aslab }}" data-skin="tron" data-angleOffset="180"
                          data-readOnly=true data-thickness=".2" />
                  </div>
                  <div class="text-right mt-3 text-info">
                    <a href="/admin/dataAslab"><i class="fas fa-list-alt"></i> Lihat Detail</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-4 col-md-3">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title"><i class="fas fa-graduation-cap mr-3"></i>Data Mahasiswa</h4>
                  <div class="text-center">
                      <input data-plugin="knob" data-width="220" data-height="220" data-linecap=round
                          data-fgColor="#01caf1" value="{{ $mhs }}" data-skin="tron" data-angleOffset="180"
                          data-readOnly=true data-thickness=".2" />
                  </div>
                  <div class="text-right mt-3 text-info">
                    <a href="/admin/dataMhs"><i class="fas fa-list-alt"></i> Lihat Detail</a>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection