<?php 

require 'function.php';

if (isset($_POST["register"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if( $password != $password2 ) {
    
        echo "<script>
            alert('Konfirmasi Password tidak sesuai');
            document.location.href='../register.php';
        </script>";

        return false;

    }

    $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username yang dipilih sudah terdaftar');
                document.location.href='../register.php';
            </script>";

            return false;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($koneksi, "INSERT INTO tb_user 
            VALUES 
            ('','$username','$password',1,current_timestamp(),current_timestamp())
            ");

        echo "<script>
                alert('Akun Berhasil di Buat');
                document.location.href='../index.php';
            </script>";

}

else {
    mysqli_error($koneksi);
}