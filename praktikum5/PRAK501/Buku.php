<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
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

    $id_buku = "";
    $judul = "";
    $penulis = "";
    $penerbit = "";
    $tahun_terbit = "";
    $success = "";
    $error = "";

    if (isset($_GET['message'])) {
        if ($_GET['message'] == "success") {
            $success = "Data berhasil dihapus";
        } elseif ($_GET['message'] == "error") {
            $error = "Data gagal dihapus";
        }
    }

    $op = isset($_GET['op']) ? $_GET['op'] : '';

    if ($op == 'delete') {
        $id_buku = $_GET['id_buku'];
        $result = delete("buku", $id_buku, "id_buku");
        if ($result) {
            header("Location: Buku.php?message=success");
        } else {
            header("Location: Buku.php?message=error");
        }
    }
    ?>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header padd bg-pink">
                <b>Data Buku Peminjaman Buku Online</b>
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
                            <th scope="col">ID Buku</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col" class="text-center">Aksi</th>
                        <tbody>
                            <?php
                            $result = selectalldata("buku");
                            while ($row = mysqli_fetch_array($result)) {
                                $id_buku = $row['id_buku'];
                                $judul = $row['judul_buku'];
                                $penulis = $row['penulis'];
                                $penerbit = $row['penerbit'];
                                $tahun_terbit = $row['tahun_terbit'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $id_buku ?></th>
                                    <td scope="row"><?php echo $judul ?></td>
                                    <td scope="row"><?php echo $penulis ?></td>
                                    <td scope="row"><?php echo $penerbit ?></td>
                                    <td scope="row"><?php echo $tahun_terbit ?></td>
                                    <td scope="row">
                                        <div class="d-flex gap-2">
                                            <a href="FormBuku.php?op=edit&id_buku=<?php echo $id_buku ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                            <a href="Buku.php?op=delete&id_buku=<?php echo $id_buku ?>" onclick="return confirm('Anda yakin ingin menghapus data?')"><button type="button" class="btn btn-danger">Hapus</button></a>
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
                    <a href="FormBuku.php"><button type="button" class="btn bg-pink pad">Tambah Buku</button></a>
            </div>
        </div>
    </div>
</body>
</html>