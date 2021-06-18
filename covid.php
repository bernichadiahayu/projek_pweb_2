<?php include 'corona.php';?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            body{
                background-color:rgb(232, 238, 247);
            }
        </style>
    <title>Website Desa</title>
    </head>
    <body id="page-top">

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand" href="#page-top">WEBSITE DESA KEDUNGSIGIT</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link js-scroll-trigger" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="covid.php">Covid</a>
                <li class="nav-item dropdown"> 
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="sejarah.php">Sejarah Desa</a>
                <li class="nav-item dropdown"> 
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Informasi
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="video.php">Video Referensi</a>
                    <a class="dropdown-item" href="artikel.php">Artikel Kesehatan</a>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="signup.php">Sign Up</a>
              </ul>
            </div>
            </div>
          </nav>
          <br><br>

          <main role="main" class="flex-shrink 0">
              <div class="container">
                  <h1 class="text-center mt-5"> SEBARAN COVID-19</h1><br><br>

                  <h6>INDONESIA</h6>
                  <div class="row">
                    <div class="col-sm-4">
                        <div class="card text-white bg-danger" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                <h5 class="card-title">TOTAL POSITIF</h5>
                                <h1><?=$positif;?></h1>
                                <p class="card-text">ORANG</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="group.png" alt="" height="100" width="100">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                <h5 class="card-title">TOTAL SEMBUH</h5>
                                <h1><?=$sembuh;?></h1>
                                <p class="card-text">ORANG</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="checklist.png" alt="" height="100" width="100">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-white bg-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                <h5 class="card-title">TOTAL MENINGGAL</h5>
                                <h1><?=$meninggal;?></h1>
                                <p class="card-text">ORANG</p>
                                </div><br>
                                <div class="col-md-4">
                                    <img src="worldwide.png" alt="" height="80" width="80">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <br>

                <h6>PROVINSI</h6>
                <div class="row mt5 mb-5">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Positif</th>
                    <th scope="col">Sembuh</th>
                    <th scope="col">Meninggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($data_prov as $rows) { ?>
                    <tr>
                        <th scope="row"><?php echo $no;?></th>
                        <td><?php echo $rows->attributes->Provinsi;?></td>
                        <td><?php echo $rows->attributes->Kasus_Posi;?></td>
                        <td><?php echo $rows->attributes->Kasus_Semb;?></td>
                        <td><?php echo $rows->attributes->Kasus_Meni;?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>

          </main>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>