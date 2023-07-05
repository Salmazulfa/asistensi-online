@extends('mhs.partials.main')

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
                    <h3 class="card-title">Ubah Password</h3>
                    <form action="/updatepw/mhs" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>Username</label> --}}
                                    <input type="hidden" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Masukkan Password Lama</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" id="newpass" name="newpass">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="confirmpass" name="confirmpass">
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