@extends('templates.userLayout')
@section('title', 'UMKM - Bannermu')
@section('content')

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h4 class="display-4 fw-bold lh-1 mb-3">Selamat datang kembali {{ auth()->user()->name }} !!</h4>
            <p class="col-lg-10 fs-4">by <a target="_blank" href="https://kritimauludin.github.io/">GO UMKM</a></p>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
              </div>
            @endif
            <div class="table-responsive mb-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Business Name</th>
                            <th>Owner</th>
                            <th>URL Instagram</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($umkms as $umkm) : ?>
                        <tr>
                            <th><?= $i++?></th>
                            <th><?= $umkm['business_name'] ?></th>
                            <th><?= $umkm['business_owner'] ?></th>
                            <th><?= $umkm['url_instagram'] ?></th>
                            <th>
                                <a href="/banner/<?= $umkm['id']?>/edit" class=""><i class="fas fa-fw fa-edit text-warning"></i></a>
                                <form action="/banner/{{ $umkm['id'] }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;"
                                        onclick="return confirm(`Hapus Data Banner Promosi?`);">
                                        <span><i class="fas fa-fw fa-trash-alt text-danger"></i></span>
                                    </button>
                                </form>
                            </th>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="form-floating mb-3">
                    <a href="/banner/create" class="w-100 btn btn-lg btn-primary">Post Banner <i class="fas fa-plus color-gold fa-sm fa-fw mr-5"></i></a>
                </div>
                <div class="form-floating mb-3">
                    <form action="/auth/logout" method="POST">
                        @csrf
                        <button class="w-100 btn btn-lg btn-danger"
                            onclick="return confirm('Anda ingin logout ?');">Logout 
                            <i class="fas fa-sign-out color-gold fa-sm fa-fw mr-5"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection