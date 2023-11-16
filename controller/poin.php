<?php 

include 'function.php';

if (isset($_POST["submit"])) {
    
    $id_siswa = $_POST["siswa"];
    $quest = $_POST["quest"];
    $quantity = $_POST["quantity"];

    $siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_user = $id_siswa");
    $sis = mysqli_fetch_array($siswa);

    $poinsiswa = $sis["poin"];
    $poinquest = $quest;

    $poin = $poinsiswa + ($poinquest * $quantity);

    mysqli_query($koneksi, "UPDATE tb_siswa SET
                            poin = $poin,
                            updated_at = current_timestamp()
                            WHERE id_user = $id_siswa
                            ");

    echo "<script>
            alert('Poin Berhasil diberikan');
            document.location.href='../admin/inputpoin.php';
        </script>";

}

?>