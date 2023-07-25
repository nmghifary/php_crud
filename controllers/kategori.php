<?php
include("../routers/kategori.php");

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $fungsi = tambah_data($_POST);

        if ($fungsi) {
            $_SESSION['msg'] = "Data berhasil ditambahkan,success";
            header("location: ../views/kategori.php");
        } else {
            echo $fungsi;
        }
    } elseif ($_POST['aksi'] == "edit") {

        $fungsi = ubah_data($_POST);
        
        if ($fungsi) {
            $_SESSION['msg'] = "Data berhasil diperbarui,success";
            header("location: ../views/kategori.php");
        } else {
            echo $fungsi;
        }
    }
}
if (isset($_GET['hapus'])) {
    $fungsi = hapus_data($_GET);

    $query = "DELETE FROM list_kategori WHERE id_kategori = '$id_kategori';";
    $sql = mysqli_query($conn, $query);

    if ($fungsi) {
        $_SESSION['msg'] = "Data berhasil dihapus,success";
        header("location: ../views/kategori.php");
    } else {
        echo $fungsi;
    }
}
