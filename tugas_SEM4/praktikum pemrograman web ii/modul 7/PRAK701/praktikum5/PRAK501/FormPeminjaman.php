<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
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

    $id_peminjaman = "";
    $id_member = "";
    $id_buku = "";
    $tgl_kembali = "";
    $success = "";
    $error = "";

    if(isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }

    if($op == 'edit') {
        $id_peminjaman = $_GET['id_peminjaman'];
        $data = selectdatabyid("peminjaman", $id_peminjaman, "id_peminjaman");

        if ($data) {
            $tgl_kembali = $data['tgl_kembali'];
            $id_member = $data['id_member'];
            $id_buku = $data['id_buku'];
        } else {
            $error = "Data tidak ditemukan";
        }
    }

    if(isset($_POST['submit'])) {
        $tgl_kembali = $_POST['tgl_kembali'];
        $id_member = $_POST['id_member'];
        $id_buku = $_POST['id_buku'];

        if ($tgl_kembali && $id_member && $id_buku) {
            $data = [
                'tgl_kembali' => $tgl_kembali,
                'id_member' => $id_member,
                'id_buku' => $id_buku
            ];

            if ($op == 'edit') {
                $result = update($data, "peminjaman", $id_peminjaman, "id_peminjaman");
            } else {
                $result = insert($data, "peminjaman");
            }

            if ($result) {
                $success = ($op == 'edit') ? "Data berhasil di-update" : "Data berhasil disimpan";
                header("refresh:5;url=Peminjaman.php");
            } else {
                $error = "Data gagal disimpan: " . mysqli_error($koneksi);
            }
        } else {
            $error = "Semua field harus diisi!";
        }
    }

    $members = selectalldata("member");
    $bukus = selectalldata("buku");
    ?>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header padd bg-pink">
                <?php if ($op == 'edit') { ?>
                    <b>Edit Data Peminjaman Buku Online</b>
                <?php } else { ?>
                    <b>Tambah Data Peminjaman Buku Online</b>
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
                        <label for="tgl_kembali" class="col-sm-3 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgl_kembali" value="<?php echo $tgl_kembali ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_member" class="col-sm-3 col-form-label">Nama Member</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="id_member">
                                <option value="">-- Pilih Member --</option>
                                <?php while($row = mysqli_fetch_array($members)) { ?>
                                    <option value="<?php echo $row['id_member']; ?>" <?php if($row['id_member'] == $id_member) echo 'selected'; ?>>
                                        <?php echo $row['nama_member']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_buku" class="col-sm-3 col-form-label">Judul Buku</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="id_buku">
                                <option value="">-- Pilih Judul Buku --</option>
                                <?php while($row = mysqli_fetch_array($bukus)) { ?>
                                    <option value="<?php echo $row['id_buku']; ?>" <?php if($row['id_buku'] == $id_buku) echo 'selected'; ?>>
                                        <?php echo $row['judul_buku']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <input type="submit" name="submit" value="Simpan Data Peminjaman" class="btn bg-pink pad">
                    </div>
                </form>
                <div class="card-footer d-flex justify-content-between text-muted padd">
                    <a href="Peminjaman.php"><button type="button" class="btn btn-secondary pad">Kembali</button></a>
                    <?php if ($op == 'edit') : ?>
                        <a href="Peminjaman.php?op=delete&id_peminjaman=<?php echo $id_peminjaman ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">
                            <button type="button" class="btn btn-danger pad">Hapus Peminjaman</button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>