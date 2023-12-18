<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>UAS PEMWEB</title>
<body>
    <nav class="navbar navbar-light bg-info">
            <marquee><span class="navbar-brand mb-0 h1">Ujian Akhir Semester (UAS) Pemrograman Web</span></marquee>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR MAHASISWA</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_peserta'])) {
        $id_peserta=htmlspecialchars($_GET["id_peserta"]);

        $sql="delete from peserta where id_peserta='$id_peserta' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                echo "<script>alert('Data telah berhasil dihapus');window.location='index.php';</script>";

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-hover">
            <tr class="table-success">           
            <th>No</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from peserta order by id_peserta desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["prodi"];   ?></td>
                <td><?php echo $data["tgl_lahir"];   ?></td>
                <td><?php echo $data["jenkel"];   ?></td>
                <td><?php echo $data["email"];   ?></td>
                <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-primary" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Hapus</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-success" role="button">Tambah Data</a>
</div>
<footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <p class="text-white text-center">&copy; <?php echo date("Y"); ?> Muhammad Alfarizi. NIM. 121140093</p>
        </div>
    </footer>
</body>
</html>