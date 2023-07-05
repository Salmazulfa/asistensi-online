@extends('admin.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Input Data Baru</h3>
                    <form action="{{ url('/admin/saveData') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <form>
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Level</label>
                                            <select class="custom-select mr-sm-2" id="level" name="level" onchange="return matkul()">
                                                <option selected>Pilih...</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Dosen" onchange="return matkul()" id="dosen">Dosen</option>
                                                <option value="Asisten Praktikum">Asisten Praktikum</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="" id="matkul" style="display: none">
                                <div class="form-group">
                                    <div class="form-group mb-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Mata Kuliah</label>
                                        <select class="custom-select mr-sm-2" id="matkul_id" name="matkul_id">
                                            <option value="">Pilih...</option>
                                            @foreach ($matkul as $row)
                                                <option value="{{ $row->id }}">{{ $row->matkul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="aslab" style="display: none">
                                <div class="form-group">
                                    <div class="form-group mb-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Mata Kuliah Praktikum</label>
                                        <select class="custom-select mr-sm-2" id="dosen_id" name="dosen_id">
                                            <option value="">Pilih...</option>
                                            @foreach ($dosen as $row)
                                                <option value="{{ $row->id }}">{{ $row->matkul->matkul }} - {{ $row->nama_dosen }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection