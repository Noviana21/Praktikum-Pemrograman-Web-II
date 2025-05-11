<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }

        b {
            color: rgb(100, 27, 40)
        }

        .mx-auto {
            max-width: 1000px;
            padding: 20px;
            margin: 0;
        }

        .bg-pink {
            background-color: #F3B7C5;
        }

        .card {
            margin-top: 16px;
        }

        th, td {
        padding: 8px;
        }

        table {
            margin: auto;
        }

        .pad {
            margin: 5px;
            padding: 10px 20px;
        }

        .padd {
            padding: 10px 20px;
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
    $tgl_pinjam = "";
    $tgl_kembali = "";
    $success = "";
    $error = "";

    if (isset($_GET['message'])) {
        if ($_GET['message'] == 'success') {
            $success = "Data berhasil dihapus";
        } elseif ($_GET['message'] == 'error') {
            $error = "Data gagal dihapus";
        }
    }

    $op = isset($_GET['op']) ? $_GET['op'] : '';
    if ($op == 'delete') {
        $id_peminjaman = $_GET['id_peminjaman'];
        $result = delete("peminjaman", $id_peminjaman, "id_peminjaman");

        if ($result) {
            $success = "Data berhasil dihapus";
            header("Refresh: 5; URL=Peminjaman.php");
        } else {
            $error = "Data gagal dihapus";
            header("Refresh: 5; URL=Peminjaman.php");
        }
    }
    ?>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header padd bg-pink">
            <b>Data Peminjaman Buku</b>
        </div>
        <div class="card-body">
            <?php if($success) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php } ?>
                <?php if($error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php } ?>

                <table>
                    <thead>
                        <tr>
                            <th scope="col">ID Peminjaman</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Nama Member</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                        <tbody>
                            <?php
                            $sql = "SELECT p.id_peminjaman, p.tgl_pinjam, p.tgl_kembali, m.nama_member, b.judul_buku
                                    FROM peminjaman p
                                    JOIN member m ON p.id_member = m.id_member
                                    JOIN buku b ON p.id_buku = b.id_buku";
                            $q2 = selectJoin($sql);

                            while($row = mysqli_fetch_array($q2)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['id_peminjaman']  ?></th>
                                <td scope="row"><?php echo $row['tgl_pinjam']  ?></td>
                                <td scope="row"><?php echo $row['tgl_kembali']  ?></td>
                                <td scope="row"><?php echo $row['nama_member'] ?></td>
                                <td scope="row"><?php echo $row['judul_buku'] ?></td>
                                <td scope="row">
                                    <div class="d-flex gap-2">
                                        <a href="FormPeminjaman.php?op=edit&id_peminjaman=<?php echo $row['id_peminjaman'] ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                        <a href="Peminjaman.php?op=delete&id_peminjaman=<?php echo $row['id_peminjaman'] ?>" onclick="return confirm('Anda yakin ingin menghapus data?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="index.php"><button type="button" class="btn btn-secondary pad">Kembali</button></a>
                <a href="FormPeminjaman.php"><button type="button" class="btn bg-pink pad">Tambah Peminjaman</button></a>
            </div>
        </div>
    </div>
</body>
</html>