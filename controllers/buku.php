<?php
include("../routers/buku.php");

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        
        $fungsi = tambah_data($_POST, $_FILES);

        if ($fungsi) {
            $_SESSION['msg'] = "Data berhasil ditambahkan,success";
            header("location: ../index.php");
        } else {
            echo $fungsi;
        }
    } elseif ($_POST['aksi'] == "edit") {
        $fungsi = ubah_data($_POST, $_FILES);

        if ($fungsi) {
            $_SESSION['msg'] = "Data berhasil diperbarui,success";
            header("location: ../index.php");
        } else {
            echo $fungsi;
        }
    }
};
if (isset($_GET['hapus'])) {
    $fungsi = hapus_data($_GET);

    if ($fungsi) {
        $_SESSION['msg'] = "Data berhasil dihapus,success";
        header("location: ../index.php");
    } else {
        echo $fungsi;
    }
};
?>
