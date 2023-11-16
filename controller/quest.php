<?php 

include '../controller/function.php';

if (isset($_POST["tambah"])) {
    
    $kategori_quest = $_POST["kategori_quest"];
    $nama_quest = $_POST["nama_quest"];
    $poin = $_POST["poin"];
    $deskripsi = $_POST["deskripsi"];
    $gambar = upload();

    mysqli_query($koneksi,
            "INSERT INTO tb_quest
                VALUES
                ('','$kategori_quest','$nama_quest','$poin','$deskripsi','$gambar',current_timestamp(),current_timestamp()) ");

    echo "<script>
            alert('Quest Baru Berhasil ditambahkan');
            document.location.href='../admin/quest.php';
        </script>";

}

if (isset($_POST["ubah"])) {
    
    $id = $_POST["id"];
    $kategori = $_POST["kategori_quest"];
    $nama = $_POST["nama_quest"];
    $poin = $_POST["poin"];
    $deskripsi = $_POST["deskripsi"];
    $gambarlama = $_POST["gambarlama"];

    if( $_FILES["gambar"]["error"] == 4 ) {

        $gambar = $gambarlama;

    }else if($gambar = upload()){

        unlink("../assets/img/quest/".$gambarlama);

    }else {
        echo "<script>
            document.location.href='../admin/ubahquest.php?id=$id';
        </script>";exit;
    }
    
    mysqli_query($koneksi, "UPDATE tb_quest SET
                            id_kategori = $kategori,
                            nama_quest = '$nama',
                            gambar = '$gambar',
                            poin = $poin,
                            deskripsi = '$deskripsi',
                            updated_at = current_timestamp()
                            WHERE id_quest = $id
                            ");
    echo "<script>
        alert('Quest Berhasil diedit');
        document.location.href='../admin/quest.php';
    </script>";

}

if (isset($_POST["hapus"])) {
    
    $id = $_POST['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_quest WHERE id_quest = $id");  
    $result = mysqli_fetch_assoc($query);
    $gambar = $result["gambar"];

    unlink("../assets/img/quest/".$gambar);

    mysqli_query($koneksi, "DELETE FROM tb_quest WHERE id_quest = $id");

    echo "<script>
            alert('Quest Berhasil dihapus');
            document.location.href='../admin/quest.php';
        </script>";
    
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ( $error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu !');
        </script>";

        return false;
    }

    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda masukkan bukan gambar!');
        </script>";

        return false;
    }
    if ($ukuranFile > 9000000) {
        echo "<script>
            alert('ukuran gambar terlalu besar');
        </script>";

        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/img/quest/' . $namaFileBaru);

    return $namaFileBaru;
}
