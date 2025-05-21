<?= $this->extend('show'); ?>
<?= $this->section('content'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between bottom py-2">
        <h3 class="pb-2 mb-0">Edit Data Buku</h3>
        <a href="/buku" class="btn btn-dark">Kembali</a>
    </div>
    <div class="pt-4">
        <form action="/buku/update/<?= $buku->id; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku->judul ?>" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku->penulis ?>" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku->penerbit ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $buku->tahun_terbit ?>" required>
            </div>
            <button type="submit" class="btn btn-success mx-2">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>