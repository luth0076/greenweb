<?php

session_start();

if($_SESSION['admin']=''){
    unset($_SESSION['admin']);
}if($_SESSION['guru']=''){
    unset($_SESSION['guru']);
}if($_SESSION['siswa']=''){
    unset($_SESSION['siswa']);
}


session_unset();
session_destroy();


echo "
    <script>
        document.location.href='../index.php';
    </script>
";