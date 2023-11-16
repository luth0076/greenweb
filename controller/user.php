<?php 

include 'function.php';

if (isset($_POST["tambah"])) {
    
    $jabatan = $_POST["jabatan"];
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    
    if ($password != $password2) {

         echo "<script>
                alert('Konfirmasi Password tidak sesuai');
                document.location.href='../admin/tambahuser.php';
            </script>";

        return false;
    }

    $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username yang dipilih sudah terdaftar');
                document.location.href='../admin/tambahuser.php';
            </script>";

            return false;
    }

    mysqli_query($koneksi, "INSERT INTO tb_user 
            VALUES 
            ('','$username','$nama','$password',$jabatan,'',current_timestamp(),current_timestamp())
            ");
    
    $id_user = mysqli_insert_id($koneksi);

    if ($jabatan == 2) {

        mysqli_query($koneksi, "INSERT INTO tb_guru 
                    VALUES
                    ('','$id_user','$username',current_timestamp(),current_timestamp())
                    ");
        echo "<script>
                alert('User Berhasil ditambahkan');
                document.location.href='../admin/user.php';
            </script>";
   
    } else {

        mysqli_query($koneksi, "INSERT INTO tb_siswa 
                    VALUES
                    ('','$id_user','$username','',0,current_timestamp(),current_timestamp())
                    ");
        echo "<script>
                alert('User Berhasil ditambahkan');
                document.location.href='../admin/user.php';
            </script>";

    }
}

else {
    mysqli_error($koneksi);
}

if (isset($_POST["ubah"])) {
    
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password != $password2) {
        
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
                document.location.href='../admin/ubahuser.php?id=$id';
            </script>";

        return false;

    }

    mysqli_query($koneksi, "UPDATE tb_user SET
                            nama = '$nama',
                            password = '$password',
                            updated_at = current_timestamp()
                            WHERE id_user = $id;
                            ");

    echo "<script>
        alert('User Berhasil di ubah');
        document.location.href='../admin/user.php';
    </script>";

}

else {
    mysqli_error($koneksi);
}

if (isset($_POST["hapus"])) {

    $id = $_POST['id']; 

    mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = $id");

    echo "<script>
        alert('User Berhasil dihapus');
        document.location.href='../admin/user.php';
    </script>";

}

else {
    mysqli_error($koneksi);
}

if (isset($_POST["tambahsiswa"])) {
    
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $sekolah = $_POST["sekolah"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password != $password2) {

        echo "<script>
               alert('Konfirmasi Password tidak sesuai');
               document.location.href='../guru/tambahsiswa.php';
           </script>";

       return false;
   }

   $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

   if (mysqli_fetch_assoc($result)) {
       echo "<script>
               alert('NIS yang dipilih sudah terdaftar');
               document.location.href='../guru/tambahsiswa.php';
           </script>";

           return false;
   }

   mysqli_query($koneksi, "INSERT INTO tb_user 
            VALUES 
            ('','$username','$nama','$password',3,current_timestamp(),current_timestamp())
            ");
    
    $id_user = mysqli_insert_id($koneksi);

    mysqli_query($koneksi, "INSERT INTO tb_siswa 
                    VALUES
                    ('','$id_user','$username','$sekolah',0,current_timestamp(),current_timestamp())
                    ");

    echo "<script>
            alert('Siswa Berhasil ditambahkan');
            document.location.href='../guru/siswa.php';
        </script>";

}
else {
    mysqli_error($koneksi);
}

if (isset($_POST["ubahsiswa"])) {
    
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $sekolah = $_POST["sekolah"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password != $password2) {
        
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
                document.location.href='../guru/ubahsiswa.php?id=$id';
            </script>";

        return false;

    }

    mysqli_query($koneksi, "UPDATE tb_user SET
                            nama = '$nama',
                            password = '$password',
                            updated_at = current_timestamp()
                            WHERE id_user = $id
                            ");

    mysqli_query($koneksi, "UPDATE tb_siswa SET
                            sekolah = '$sekolah',
                            updated_at = current_timestamp()
                            WHERE id_user = $id
                            ");

    echo "<script>
            alert('Siswa Berhasil di ubah');
            document.location.href='../guru/siswa.php';
        </script>";

}
else {
    mysqli_error($koneksi);
}

if (isset($_POST["hapussiswa"])) {
    
    $id = $_POST["id"];

    mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = $id");

    echo "<script>
            alert('Siswa Berhasil dihapus');
            document.location.href='../guru/siswa.php';
        </script>";

}
else {
    mysqli_error($koneksi);
}

?>