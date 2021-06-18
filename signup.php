<?php 
session_start();

if(isset($_SESSION["login"])){
    header("Location: login.php");

    exit;
}
require 'functions.php';

    if(isset($_POST["register"])){
        if(pendaftaran($_POST) > 0 ){
            echo "<script> 
                    alert('user baru berhasil di tambahkan');
            </script>";
        } else{
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
</head>
<body>

    <div class="container">
        <div class="row-content">
            <div class="col-md-6 mb-3">
                <img src="tampilan.svg" class="img-fluid" alt="image">
            </div>
                <form action="" method="post">
                    <div class="col-md-6">
                        <h3 class="text mb-3">Sign Up</h3>
                    </div>
                    <div class="form-grup">
                        <label for="username">username</label><br>
                        <input type="text" name="username" class="form-control"><br>
                    </div>
                    <div class="form-grup">
                        <label for="password">password</label><br>
                        <input type="password" name="password" id="password" class="form-control"><br>
                    </div>
                    <div class="form-grup">
                        <label for="password2">Konfirmasi Password</label><br>
                        <input type="password" name="password2" id="password2" class="form-control"><br>
                    </div>
                    <div class="form-grup form-check">
                        <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Remember Me</label><br>
                    </div>
                    <br>
                    <div class="btn">
                        <button type="submit" class="btn btn-primary btn-sm" name="register">Submit</button>
                    </div>
                    <a class="btn btn-primary" href="index.html" role="button">Login</a>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>