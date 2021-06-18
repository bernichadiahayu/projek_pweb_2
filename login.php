<?php 
session_start();

    if (isset($_COOKIE['login'])){
        if($_COOKIE['login']==='true'){
            $_SESSION['login'] = true;
        }
    }
    if (isset($_SESSION["login"])){
        header("Location: dashboard.php");
        exit;
    }
require 'functions.php';

    if (isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

    //untuk mengecek apakah ada username yang diinputkan oleh pengguna kedalam database
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_num_rows($result) == 1){

        //untuk mengecek password yang diinputkan oleh user
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {

                $_SESSION["login"] = true;

                //penggunaan cookie 
                if(isset($_POST['checkbox'])){

                    setcookie('login','true',time()+60);
                }

            header("Location:dashboard.php");
            exit;
            }
        }

    $error = true;

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>

<?php if (isset($error)):?>
    <?php echo "<script> 
                    alert('Username / Password Salah!');
                </script>"; 
    ?>
<?php endif; ?>

    <div class="container">
        <div class="row-content">
            <div class="col-md-6 mb-3">
                <img src="tampilan.svg" class="img-fluid" alt="image">
            </div>
                <form action="" method="post">
                    <div class="col-md-6">
                        <h3 class="text mb-3">Login</h3>
                    </div>
                    <div class="form-grup">
                        <label for="username">username</label><br>
                        <input type="text" name="username" id="username" class="form-control"><br>
                    </div>
                    <div class="form-grup">
                        <label for="password">password</label><br>
                        <input type="password" name="password" id="password" class="form-control"><br>
                    </div>
                    <div class="form-grup form-check">
                        <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Remember Me</label><br>
                    </div>
                    <br>
                    <div class="btn">
                        <button type="submit" class="btn-primary" name="login">Login</button>
                        <a class="btn btn-primary" href="signup.php" role="button">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>