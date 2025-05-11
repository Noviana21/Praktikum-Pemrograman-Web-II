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
            max-width: 1200px;
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

    $id_member = "";
    $nama = "";
    $nomor = "";
    $alamat = "";
    $tgl_terakhir_bayar = "";
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
    if($op == 'delete') {
        $id_member = $_GET['id_member'];
        $result = delete("member", $id_member, "id_member");
        
        if($result) {
            $success = "Data berhasil dihapus";
            header("Refresh: 5; URL=Member.php");
        } else {
            $error = "Data gagal dihapus";
            header("Refresh: 5; URL=Member.php");
        }
    }
    ?>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header padd bg-pink">
                <b>Data Member Peminjaman Buku Online</b>
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
                            <th scope="col">ID Member</th>
                            <th scope="col">Nama Member</th>
                            <th scope="col">Nomor Member</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Mendaftar</th>
                            <th scope="col">Tanggal Terakhir Bayar</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                        <tbody>
                            <?php
                            $q2 = selectalldata("member");
                            while($row = mysqli_fetch_array($q2)) {
                                $id_member = $row['id_member'];
                                $nama = $row['nama_member'];
                                $nomor = $row['nomor_member'];
                                $alamat = $row['alamat'];
                                $tgl_mendaftar = $row['tgl_mendaftar'];
                                $tgl_terakhir_bayar = $row['tgl_terakhir_bayar'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $id_member ?></th>
                                    <td scope="row"><?php echo $nama ?></td>
                                    <td scope="row"><?php echo $nomor ?></td>
                                    <td scope="row"><?php echo $alamat ?></td>
                                    <td scope="row"><?php echo $tgl_mendaftar ?></td>
                                    <td scope="row"><?php echo $tgl_terakhir_bayar ?></td>
                                    <td scope="row">
                                        <div class="d-flex gap-2">
                                            <a href="FormMember.php?op=edit&id_member=<?php echo $id_member ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                            <a href="Member.php?op=delete&id_member=<?php echo $id_member ?>" onclick="return confirm('Anda yakin ingin menghapus data?')"><button type="button" class="btn btn-danger">Hapus</button></a>
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
                <a href="FormMember.php"><button type="button" class="btn bg-pink pad">Tambah Member</button></a>
            </div>
        </div>
    </div>
</body>
</html>