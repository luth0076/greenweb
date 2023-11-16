<?php

include 'function.php';

session_start();

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
    $rows = mysqli_fetch_array($cek);

    $id = $rows["id_user"];
    $jabatan = $rows["id_jabatan"];
    $pw = $rows["password"];

    if (mysqli_num_rows($cek) == 1) {

        $cekpw = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE password = '$password'");

        if (mysqli_num_rows($cekpw) == 1) {
            
            if ($jabatan == 1) {
                
                $_SESSION["id"] = $id;
                $_SESSION["admin"] = true;

                echo "
                <script>
                        document.location.href='../admin/index.php';
                    </script>    
                ";

            }
            else if ($jabatan == 2) {
                
                $_SESSION["id"] = $id;
                $_SESSION["guru"] = true;

                echo "
                <script>
                        document.location.href='../guru/index.php';
                    </script>    
                ";

            }
            else {

                $_SESSION["id"] = $id;
                $_SESSION["siswa"] = true;

                echo "
                <script>
                        document.location.href='../siswa/index.php';
                    </script>    
                ";

            }
            

        }
         else {
            echo "
            <script>
                    alert('Password Salah');
                    document.location.href='../index.php';
                </script>    
            ";
        }

    } else {
        echo "
            <script>
                    alert('Akun Tidak Ada');
                    document.location.href='../index.php';
                </script>    
            ";
    }
}
