<?php 
//koneksi database dengan parameter namaserver, username, password, namadatabase
$conn = mysqli_connect("localhost","root","","datadesa");

    function pendaftaran($dataUser){
        global $conn;

        //membuat agar tulisan usernam hurufnya kecil semua
        $username = strtolower(stripslashes($dataUser["username"]));
        //apabila user ingin memasukan password dengan tanda petik maka dibuat mysqli_real_escape_string
        $password = mysqli_real_escape_string($conn, $dataUser["password"]);
        $password2 = mysqli_real_escape_string($conn, $dataUser["password2"]);

         //untuk mengecek apakah username sudah masuk ke database atau belum
         $result = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");

         if(mysqli_fetch_assoc($result)){
             echo "<script> 
                        alert('username yang anda tambahkan sudah terdaftar!');
                </script>";
            
            return false; //memberhentikan function agar insert data gagal
         }
        //cara mengecek konfirmasi password 
        if ($password !== $password2){
            echo "<script> 
                    alert('Konfirmasi Password Anda Salah!');
                </script>";

            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        //menambahkan user baru kedalam database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }
?>