@extends('admin.partials.main')

@section('container')
<div class="container-fluid mt-5">
    {{-- PESAN ALERT --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert dismissible show" role="alert">
            {{ session('error') }}
        </div>
    @endif
    {{-- END OF PESAN ALERT --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Edit Data Aslab</h3>
                    <form action="/admin/updateAslab" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-body">
                            {{-- <div class="">
                                <div class="form-group">
                                    <label>ID</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control" placeholder="ID" 
                                    value="<?= $aslab->id ?>">
                                {{-- </div>
                            </div> --}}
                            <div class="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" 
                                    value="<?= $aslab->user->username ?>"
                                    >
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Nama Aslab</label>
                                    <input type="text" id="nama_aslab" name="nama_aslab" class="form-control" placeholder="Nama Aslab" 
                                    value="<?= $aslab->nama_aslab ?>"
                                    >
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Mata Kuliah Praktikum</label>
                                            <select class="custom-select mr-sm-2" id="dosen_id" name="dosen_id">
                                                <option value="">Pilih Mata Kuliah...</option>
                                                <option value="<?= $aslab->dosen_id ?>" selected><?= $aslab->dosen->matkul->matkul ?> - <?= $aslab->dosen->nama_dosen ?></option>
                                                @foreach ($dosen as $row)
                                                    <option value="{{ $row->id }}">{{ $row->matkul->matkul }} - {{ $row->nama_dosen }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" 
                                    value="<?= $aslab->tempat_lahir ?>"
                                    >
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $aslab->tanggal_lahir ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <?php
                                        if ($aslab->jenis_kelamin == "Perempuan") { ?>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="jenis_kelamin1" name="jenis_kelamin"
                                                    class="custom-control-input" value="Laki-Laki">
                                                <label class="custom-control-label" for="jenis_kelamin1">Laki-Laki</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin"
                                                    class="custom-control-input" value="Perempuan"  checked>
                                                <label class="custom-control-label" for="jenis_kelamin">Perempuan</label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="jenis_kelamin1" name="jenis_kelamin"
                                                    class="custom-control-input" value="Laki-Laki" checked>
                                                <label class="custom-control-label" for="jenis_kelamin1">Laki-Laki</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin"
                                                    class="custom-control-input" value="Perempuan">
                                                <label class="custom-control-label" for="jenis_kelamin">Perempuan</label>
                                            </div>
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="">
                                <form class="mt-3">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows="3" name="alamat" id="alamat"><?= $aslab->alamat ?></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="abc@example.com" value="<?= $aslab->email ?>" id="email" name="email">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Masukkan Password Baru...">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Konfirmasi Password Baru...">
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="button" class="btn btn-dark" onclick="window.location='/admin/dataAslab/'">Kembali</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection