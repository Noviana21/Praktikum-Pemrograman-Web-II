<?= $this->extend('show'); ?>
<?= $this->section('content'); ?>
<div class="p-5 text-center bg-white rounded-3 shadow-sm mb-4">
    <?php if(session()->get('login')): ?>
    <div class="my-3 text-center fs-4">
        <h4>Halo, <?= session()->get('username'); ?>!</h4>
        <p>Selamat datang di Aplikasi Perpustakaan.</p>
    </div>
    <hr>
    <?php else: ?>
    <div class="my-3 text-center fs-3">
        <h4>Selamat Datang di Aplikasi Perpustakaan!</h4>
        <p>Silakan login atau daftar untuk mengakses data buku.</p>
        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="/login" class="btn btn-primary">Login</a>
            <a href="/signup" class="btn btn-success">Sign Up</a>
        </div>
    </div>
    <hr>
    <?php endif; ?>
    <h1 class="text-body-emphasis">APLIKASI CRUD PERPUSTAKAAN</h1>
    <p class="lead">Tambahkan dan Edit Data Buku</p>
    <a href="/buku" class="btn btn-dark px-4 mt-2">Lihat Data Buku</a>
</div>
<?= $this->endSection(); ?>