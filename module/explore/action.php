<?php
include("../../function/koneksi.php");
include("../../function/helper.php");

session_start();
ob_start();
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$kategori = $_POST['kategori'];
$tgl_publikasi = date("Y-m-d");
$penulis = isset($_SESSION['user']['nama']) ? $_SESSION['user']['nama'] : '';
$status = $_POST['status'];
$button = $_POST['button'];

if ($button == "Add") {
    mysqli_query($koneksi, "INSERT INTO explore (judul, isi, kategori, tgl_publikasi, penulis, status) VALUES ('$judul', '$isi', '$kategori', '$tgl_publikasi', '$penulis', '$status')");
} 
if ($button == "Update") {
    $explore_id = isset($_GET['explore_id']) ? $_GET['explore_id'] : '';

    if (!empty($explore_id)) {
        mysqli_query($koneksi, "UPDATE explore SET judul='$judul', isi='$isi', kategori='$kategori', tgl_publikasi='$tgl_publikasi', penulis='$penulis', status='$status' WHERE id='$explore_id'");
    }
}

// Fungsi untuk menghapus explore
if (isset($_GET['delete_id'])) {
    $deleteID = $_GET['delete_id'];
    mysqli_query($koneksi, "DELETE FROM explore WHERE id='$deleteID'");
}

header("location: " . BASE_URL . "index.php?page=my_profile&module=explore&action=list");
?>
