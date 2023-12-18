<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $prodi=input($_POST["prodi"]);
        $tgl_lahir=input($_POST["tgl_lahir"]);
        $jenkel=input($_POST["jenkel"]);
        $email=input($_POST["email"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (nama,prodi,tgl_lahir,jenkel,email) values
		('$nama','$prodi','$tgl_lahir','$jenkel','$email')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<script>alert('Data telah berhasil ditambahkan');window.location='index.php';</script>";
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal ditambahkan.</div>";

        }

    }
    ?>
    <center><h2>Form Tambah Data</h2></center>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Program Studi :</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan Program Studi" required/>
        </div>
       <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir :</label>
            <input type="date" name="tgl_lahir" class="form-control" required/>
        </div>
        <div class="form-group">
            <label for="jenkel">Jenis Kelamin :</label>
            <select name="jenkel" class="form-control" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Alamat Email" required>
        </div>
     
        <button type="submit" name="submit" class="btn btn-primary">Tambahkan Data</button>
    </form>
</div>
<footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <p class="text-white text-center">&copy; <?php echo date("Y"); ?> Muhammad Alfarizi. NIM. 121140093</p>
        </div>
    </footer>
</body>
</html>