<?php
include("../core/init.php");

function tambah_data($post)
{
    global $conn;

    $kategori = $post['nama_kategori'];

    $query = "INSERT INTO list_kategori VALUES(null,'$kategori')";
    $sql = mysqli_query($conn, $query);

    return true;
};

function ubah_data($post)
{
    global $conn;

    $id_kategori = $post['id_kategori'];
    $kategori = $post['nama_kategori'];

    $query = "UPDATE list_kategori SET nama_kategori='$kategori' WHERE id_kategori='$id_kategori';";
    $sql = mysqli_query($conn, $query);

    return true;
};
function hapus_data($get)
{
    global $conn;

    $id_kategori = $get['hapus'];

    $query = "DELETE FROM list_kategori WHERE id_kategori = '$id_kategori';";
    $sql = mysqli_query($conn, $query);

    return true;
};
