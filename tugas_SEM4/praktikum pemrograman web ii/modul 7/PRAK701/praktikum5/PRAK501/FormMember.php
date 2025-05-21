<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
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

    $id_member = "";
    $nama = "";
    $nomor = "";
    $alamat = "";
    $tgl_terakhir_bayar = "";
    $success = "";
    $error = "";

    if(isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }

    if($op == 'edit') {
        $id_member = $_GET['id_member'];
        $data = selectdatabyid("member", $id_member, "id_member");
        
        if ($data) {
            $data = selectdatabyid("member", $id_member, "id_member");
            $nama = $data['nama_member'];
            $nomor = $data['nomor_member'];
            $alamat = $data['alamat'];
            $tgl_terakhir_bayar = $data['tgl_terakhir_bayar'];
        } else {
            $error = "Data tidak ditemukan untuk ID Member: $id_member";
        }
    }


    if(isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $nomor = $_POST['nomor'];
        $alamat = $_POST['alamat'];
        $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

        if($nama && $nomor && $alamat && $tgl_terakhir_bayar) {
            $data = [
                'nama_member' => $nama,
                'nomor_member' => $nomor,
                'alamat' => $alamat,
                'tgl_terakhir_bayar' => $tgl_terakhir_bayar
            ];

            if ($op == 'edit') {
                $result = update($data, "member", $id_member, "id_member");
            } else {
                $result = insert($data, "member");
            }

            if($result) {
                $success = ($op == 'edit') ? "Data berhasil di-update" : "Data berhasil disimpan";
                header("refresh:5;url=Member.php");
            } else {
                $error = "Data gagal disimpan (" . mysqli_error($koneksi) . ")";
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
                    <b>Edit Data Member Peminjaman Buku Online</b>
                <?php } else { ?>
                    <b>Tambah Data Member Peminjaman Buku Online</b>
                <?php } ?>
            </div>
            <div class="card-body">
                <?php if (isset($_POST['simpan']) && $error): ?>
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
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $nomor; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_terakhir_bayar" class="col-sm-2 col-form-label">Tanggal Terakhir Bayar</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" value="<?php echo $tgl_terakhir_bayar; ?>">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <input type="submit" name="simpan" value="Simpan Data Member" class="btn bg-pink pad">
                    </div>
                </form>
            </div>
            <div class="card-footer d-flex justify-content-between text-muted padd">
                <a href="Member.php"><button type="button" class="btn btn-secondary pad">Kembali</button></a>
                <?php if ($op == 'edit') : ?>
                    <a href="Member.php?op=delete&id_member=<?php echo $id_member ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">
                        <button type="button" class="btn btn-danger pad">Hapus Member</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>