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
                    <h3 class="card-title">Profile Admin</h3>
                    <form action="/updateProfile/admin" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-body">
                            <div class="">
                                <div class="form-group">
                                    {{-- <label>ID</label> --}}
                                    <input type="hidden" id="id" name="id" class="form-control"
                                    value="{{ $id }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                    value="{{ $user->username }}" disabled>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" id="nama_admin" name="nama_admin" class="form-control"
                                    value="{{ $nama_admin }}">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $email }}" 
                                    >
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