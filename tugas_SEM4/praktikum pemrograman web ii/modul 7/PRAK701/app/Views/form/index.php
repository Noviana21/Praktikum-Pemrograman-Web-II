<?= $this->extend('show'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between bottom py-2">
        <h3 class="pb-2 mb-0">Data Buku</h3>
        <a href="/buku/create" class="btn btn-dark">Tambah Data</a>
    </div>
    <div class="pt-4">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $key => $row) { ?>
                    <tr>
                        <td><?= $row->id; ?></td>
                        <td><?= $row->judul; ?></td>
                        <td><?= $row->penulis; ?></td>
                        <td><?= $row->penerbit; ?></td>
                        <td><?= $row->tahun_terbit; ?></td>
                        <td>
                            <a href="/buku/edit/<?= $row->id; ?>" class="btn btn-warning">Edit</a>
                            <form action="/buku/delete/<?= $row->id; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="/" class="btn btn-secondary">Kembali</a>
    </div>
</div>
<?= $this->endSection(); ?>