<?php 

$koneksi = mysqli_connect("localhost","root","","greenweb");

global $koneksi;

function query($query) {
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }

    return $rows;

}

function sesi() {
    if( isset($_SESSION["admin"]) == 1 ){

        echo"
                <script>
                    document.location.href='admin/index.php';
                </script>
                ";
        
        }if( isset($_SESSION["guru"]) == 1 ){
        
        echo"
                <script>
                    document.location.href='guru/index.php';
                </script>
                ";
        
        }if( isset($_SESSION["siswa"]) == 1 ){
        
        echo"
                <script>
                    document.location.href='siswa/index.php';
                </script>
                ";
        
        }
}

function sesiAdmin(){
        
    if( !isset($_SESSION["admin"]) == 1 )
    {
        echo"
        <script>
            document.location.href='../404.php';
        </script>
        ";
    }
}

function sesiSiswa()
{
    if(!isset($_SESSION["siswa"]))
    {
        echo"
        <script>
            document.location.href='../404.php';
        </script>
        ";
    }
}

function sesiGuru()
{
    if(!isset($_SESSION["guru"]))
    {
        echo"
        <script>
            document.location.href='../404.php';
        </script>
        ";
    }
}
?>