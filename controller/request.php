<?php 

include 'function.php';

if (isset($_POST["request"])) {
        
    $id_siswa = $_POST["id_user"];
    $id_quest = $_POST["quest"];

    mysqli_query($koneksi, "INSERT INTO tb_request VALUES 
                            ('','$id_siswa','$id_quest','Pending',current_timestamp(),current_timestamp())
                            ");

    echo "<script>
            alert('Request Berhasil di Kirim');
            document.location.href='../siswa/index.php';
        </script>";

}

if (isset($_POST["terima"])) {
    
    $id_user = $_POST["id_guru"];
    $id_request = $_POST["id_request"];
    $id_siswa = $_POST["id_siswa"];
    $id_quest = $_POST["id_quest"];

    $quest = mysqli_query($koneksi, "SELECT poin FROM tb_quest WHERE id_quest = $id_quest");
    $que = mysqli_fetch_assoc($quest);
    $siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa = $id_siswa");
    $sis = mysqli_fetch_assoc($siswa);

    $poinquest = $que["poin"];
    $poinsiswa = $sis["poin"];

    $poin = $poinquest + $poinsiswa;

    mysqli_query($koneksi, "UPDATE tb_siswa SET
                            poin = $poin,
                            updated_at = current_timestamp()
                            WHERE id_siswa = $id_siswa
                            ");
    
    mysqli_query($koneksi, "UPDATE tb_request SET
                            status = 'Success',
                            updated_at = current_timestamp()
                            WHERE id_request = $id_request
                            ");

    mysqli_query($koneksi, "INSERT INTO tb_approve VALUES
                            ('','$id_request','$id_user','Sukses',current_timestamp(),current_timestamp())
                            ");

    echo "<script>
            alert('Request Berhasil di Terima');
            document.location.href='../guru/index.php';
        </script>";

}

if (isset($_POST["tolak"])) {
    
    $id_request = $_POST["id_request"];
    
    mysqli_query($koneksi, "UPDATE tb_request SET
                            status = 'Rejected',
                            updated_at = current_timestamp()
                            WHERE id_request = $id_request
                            ");

    echo "<script>
            alert('Request Berhasil di Tolak');
            document.location.href='../guru/index.php';
        </script>";

}

?>