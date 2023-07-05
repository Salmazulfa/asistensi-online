@extends('admin.partials.main')

@section('container')
<div class="container-fluid mt-5">
    @if (session()->has('success'))
            <div class="alert alert-success alert dismissible show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert dismissible show" role="alert">
                {{ session('error') }}
            </div>
        @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Edit Data Admin</h3>
                    <form action="/admin/updateAdmin" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-body">
                            {{-- <div class="">
                                <div class="form-group">
                                    <label>ID</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control" placeholder="Username" 
                                    value="<?= $admin->id ?>">
                                {{-- </div>
                            </div> --}}
                            <div class="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" 
                                    value="<?= $admin->user->username ?>" required>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" id="nama_lengkap" name="nama_admin" class="form-control" placeholder="Nama admin" 
                                    value="<?= $admin->nama_admin ?>">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="abc@example.com" value="<?= $admin->email ?>" id="email" name="email">
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
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="button" class="btn btn-dark" onclick="window.location='/admin/dataAdmin/'">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection