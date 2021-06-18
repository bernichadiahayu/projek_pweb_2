<?php
    //koneksi database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "datadesa";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    // jika tombol simpan di klik
    if(isset($_POST['bsimpan']))
    {
        //pengujian apakah data akan diedit atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE penduduk set
                                                        nama = '$_POST[tnama]',
                                                        nik = '$_POST[tnik]',
                                                        rt = '$_POST[trt]',
                                                        rw = '$_POST[trw]'
                                                    WHERE id = '$_GET[id]'
                                                    ");
            if($edit) //jika data berhasil disimpan
            {
                echo "<script>
                        alert('Data Berhasil Diedit');
                        document.location='index2.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Data Gagal Diedit');
                        document.location='index2.php';
                    </script>"; 
            }

        }else
        {
            //data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO penduduk (nama, nik, rt, rw)
                                                            VALUES ('$_POST[tnama]',
                                                                    '$_POST[tnik]',
                                                                    '$_POST[trt]',
                                                                    '$_POST[trw]')
                                                            ");
            if($simpan) //jika data berhasil disimpan
            {
                echo "<script>
                        alert('Data Berhasil Disimpan');
                        document.location='index2.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Data Gagal Disimpan');
                        document.location='index2.php';
                    </script>"; 
            }
        }
    }

    // pengujian jika tombol edit / hapus diklik
    if(isset($_GET['hal']))
    {
        //pengujian edit data
        if($_GET['hal'] == "edit")
        {
            //tampilkan data yang akan diedit
            $tampil = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE id = '$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan maka data ditampung dulu kedalam variabel
                $vnama = $data['nama'];
                $vnik = $data['nik'];
                $vrt = $data['rt'];
                $vrw = $data['rw'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
            //hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM penduduk WHERE id = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                        alert('Data Berhasil Dihapus');
                        document.location='index2.php';
                    </script>";
            }
        }
    }

?>





<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href=css/style2.css>
</head>
<body>
<body id="page-top">

 <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="mainNav">
    <div class="container">
    <a class="navbar-brand font-weight-bold text-white" href="#page-top">WEBSITE DESA KEDUNGSIGIT</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-white" href="index.html">Log Out</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
<section class="jumbotron-bg">
    <div class="jumbotron warna-bg text-white">
        <div class="container">
            <h1 class="display-4">Kedungsigit</h1>
            <p class="lead">Kedungsigit merupakan desa dengan pemukiman indah bernuansa sawah dan ladang yang berada di kecamatan Karangan, Kabupaten Trenggalek, Jawa Timur, Indonesia.</p>
        </div>
    </div>
</section>
<br>
<div class = "container">
    <h1 class="text-center">Data Penduduk</h1>
    <br>
    <br>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Tambah Data Penduduk
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Masukan nama penduduk" required></input>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="tnik" value="<?=@$vnik?>" class="form-control" placeholder="Masukan NIK penduduk" required></input>
                </div>
                <div class="form-group">
                    <label>RT</label>
                    <select class="form-control" name="trt">
                        <option value="<?=@$vrt?>"><?=@$vrt?></option>
                        <option value="001">001</option>
                        <option value="002">002</option>
                        <option value="003">003</option>
                        <option value="004">004</option>
                        <option value="005">005</option>
                        <option value="006">006</option>
                        <option value="007">007</option>
                        <option value="008">008</option>
                        <option value="009">009</option>
                        <option value="010">010</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>RW</label>
                    <select class="form-control" name="trw">
                        <option value="<?=@$vrw?>"><?=@$vrw?></option>
                        <option value="001">001</option>
                        <option value="002">002</option>
                        <option value="003">003</option>
                        <option value="004">004</option>
                        <option value="005">005</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                <button type="reset" class="btn btn-danger" name="breset">Hapus</button>
            </form>
        </div>
    </div>

    <!-- tabel data penduduk -->
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            Daftar Penduduk
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from penduduk order by id desc");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['nik']?></td>
                    <td><?=$data['rt']?></td>
                    <td><?=$data['rw']?></td>
                    <td>
                        <a href="index2.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning">Edit</a>
                        <a href="index2.php?hal=hapus&id=<?=$data['id']?>" 
                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; // penutup perulangan ?>
            </table>
        </div>
    </div>

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html> 