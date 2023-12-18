<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_peserta'])) {
        $id_peserta=input($_GET["id_peserta"]);

        $sql="select * from peserta where id_peserta=$id_peserta";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_peserta=htmlspecialchars($_POST["id_peserta"]);
        $nama=input($_POST["nama"]);
        $prodi=input($_POST["prodi"]);
        $tgl_lahir=input($_POST["tgl_lahir"]);
        $jenkel=input($_POST["jenkel"]);
        $email=input($_POST["email"]);

        //Query update data pada tabel anggota
        $sql="update peserta set
			nama='$nama',
			prodi='$prodi',
			tgl_lahir='$tgl_lahir',
			jenkel='$jenkel',
			email='$email'
			where id_peserta=$id_peserta";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<script>alert('Data telah berhasil disimpan');window.location='index.php';</script>";
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <center><h2>Form Edit Data</h2></center>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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

        <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>
<footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <p class="text-white text-center">&copy; <?php echo date("Y"); ?> Muhammad Alfarizi. NIM. 121140093</p>
        </div>
    </footer>
</body>
</html>