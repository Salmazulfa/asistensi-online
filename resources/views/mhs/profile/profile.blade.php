@extends('mhs.partials.main')

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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Profile Mahasiswa</h3>
                    <form action="/updateprofile/mhs" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID Mahasiswa</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control"
                                    value="<?= $id ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                    value="<?= $user->username ?>" disabled>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $nama ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= $tempat_lahir ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $tanggal_lahir ?>" >
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <?php
                                        if ($jenis_kelamin == "Perempuan") { ?>
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
                                        <textarea class="form-control" rows="3" name="alamat" id="alamat"><?= $alamat ?></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                            <div class="">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="abc@example.com" id="email" name="email" value="<?= $email ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection