<?= $this->extend('show'); ?>
<?= $this->section('content'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between bottom py-2">
        <h3 class="pb-2 mb-0">Tambah Data Buku</h3>
        <a href="/buku" class="btn btn-dark">Kembali</a>
    </div>
    <div class="pt-4">
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger m-2">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        
        <form action="/buku/store" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ?>" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis') ?>" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit') ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit') ?>" required>
            </div>
            <button type="submit" class="btn btn-secondary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>