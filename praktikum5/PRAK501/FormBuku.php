<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        .mx-auto {
            max-width: 800px;
            margin: 0;
            margin-top: 40vh;
            transform: translateY(-50%);
        }
        
        b {
            color: rgb(100, 27, 40)
        }

        .bg-pink {
            background-color: #F3B7C5;
        }

        .card {
            margin-top: 16px;
        }

        .pad {
            margin: 5px;
            padding: 10px 20px;
        }

        .padd {
            padding: 10px 20px;
        }

        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <?php
    include 'Koneksi.php';
    include 'Model.php';

    $id_buku = "";
    $judul = "";
    $penulis = "";
    $penerbit = "";
    $tahun_terbit = "";
    $success = "";
    $error = "";

    if(isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }

    if($op == 'edit') {
        $id_buku = $_GET['id_buku'];
        $data = selectdatabyid("buku", $id_buku, "id_buku");

        if ($data) {
            $judul = $data['judul_buku'];
            $penulis = $data['penulis'];
            $penerbit = $data['penerbit'];
            $tahun_terbit = $data['tahun_terbit'];
        } else {
            $error = "Data tidak ditemukan.";
        }
    }

    if(isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];

        if($judul && $penulis && $penerbit && $tahun_terbit) {
            $data = [
                'judul_buku' => $judul,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit
            ];

            if ($op == 'edit') {
                $result = update($data, "buku", $id_buku, "id_buku");
            } else {
                $result = insert($data, "buku");
            }

            if ($result) {
                $success = ($op == 'edit') ? "Data berhasil di-update" : "Data berhasil disimpan";
                header("refresh:5;url=Buku.php");
            } else {
                $error = "Gagal menyimpan data (" . mysqli_error($koneksi) . ")";
            }
        } else {
            $error = "Semua field harus diisi!";
        }
    }
    ?>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header padd bg-pink">
                <?php if ($op == 'edit') { ?>
                    <b>Edit Data Buku Peminjaman Buku Online</b>
                <?php } else { ?>
                    <b>Tambah Data Buku Peminjaman Buku Online</b>
                <?php } ?>
            </div>
            <div class="card-body">
                <?php if (isset($_POST['submit']) && $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php
                if($success) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success?>
                </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $penulis; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $tahun_terbit; ?>">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <input type="submit" name="submit" value="Simpan Data Buku" class="btn bg-pink pad">
                    </div>
                </form>
            </div>
            <div class="card-footer d-flex justify-content-between text-muted padd">
                <a href="Buku.php"><button type="button" class="btn btn-secondary pad">Kembali</button></a>
                <?php if ($op == 'edit') : ?>
                    <a href="Buku.php?op=delete&id_buku=<?php echo $id_buku ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">
                        <button type="button" class="btn btn-danger pad">Hapus Buku</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>