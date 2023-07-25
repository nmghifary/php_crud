<?php
include("../core/init.php");

function tambah_data($post, $files)
{
    global $conn;

    $owner = $_SESSION['user'];
    $judul = $post['judul_buku'];
    $kategori = $post['kategori'];
    $jumlah = $post['jumlah_buku'];
    // image
    $splitImg = explode('.', $files['cover_buku']['name']);
    $ekstensiImg = $splitImg[count($splitImg) - 1];
    $cover = $judul . '.' . $ekstensiImg;

    $dirImg = "../assets/images/";
    $tmpImg = $files['cover_buku']['tmp_name'];

    move_uploaded_file($tmpImg, $dirImg . $cover);
    // pdf
    if ($files['file_buku']['name'] != "") {
        $splitPdf = explode('.', $files['file_buku']['name']);
        $ekstensiPdf = $splitPdf[count($splitPdf) - 1];
        $file = $judul . '.' . $ekstensiPdf;

        $dirPdf = "../assets/pdf/";
        $tmpPdf = $files['file_buku']["tmp_name"];

        move_uploaded_file($tmpPdf, $dirPdf . $file);
    }
    $query = "INSERT INTO list_buku VALUES(null,'$judul','$kategori','$jumlah','$cover','$file','$owner')";
    $sql = mysqli_query($conn, $query);

    return true;
};

function ubah_data($post, $files)
{
    global $conn;

    $id_buku = $post['id_buku'];
    $judul = $post['judul_buku'];
    $kategori = $post['kategori'];
    $jumlah = $post['jumlah_buku'];

    $queryShow = "SELECT * FROM list_buku WHERE id_buku = '$id_buku';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);
    // image
    if ($files['cover_buku']['name'] == "") {
        $cover = $result['cover_buku'];
    } else {
        $split = explode('.', $files['cover_buku']['name']);
        $ekstensi = $split[count($split) - 1];
        $cover = $judul . '.' . $ekstensi;

        $dir = "../assets/images/";
        $tmpFile = $files['cover_buku']["tmp_name"];

        unlink($dir . $result['cover_buku']);
        move_uploaded_file($tmpFile, $dir . $cover);
    }
    // pdf
    if ($files['file_buku']['name'] == "") {
        $file = $result['file_buku'];
    } else {
        $split = explode('.', $files['file_buku']['name']);
        $ekstensi = $split[count($split) - 1];
        $file = $judul . '.' . $ekstensi;

        $dir = "../assets/pdf/";
        $tmpFile = $files['file_buku']["tmp_name"];

        unlink($dir . $result['file_buku']);
        move_uploaded_file($tmpFile, $dir . $file);
    }

    $query = "UPDATE list_buku SET judul_buku='$judul', kategori='$kategori', jumlah_buku='$jumlah', cover_buku='$cover', file_buku='$file' WHERE id_buku='$id_buku';";
    $sql = mysqli_query($conn, $query);

    return true;
};
function hapus_data($get)
{
    global $conn;

    $id_buku = $get['hapus'];

    $queryShow = "SELECT * FROM list_buku WHERE id_buku = '$id_buku';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);
    // image
    $dirImg = "../assets/images/";

    unlink($dirImg . $result['cover_buku']);
    // pdf
    $dirPdf = "../assets/pdf/";

    unlink($dirPdf . $result['file_buku']);

    $query = "DELETE FROM list_buku WHERE id_buku = '$id_buku';";
    $sql = mysqli_query($conn, $query);

    return true;
};
