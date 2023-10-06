<?php
// session_start();
include_once("function/koneksi.php");

if (!isset($_SESSION['user_id'])) {
    echo "Anda harus login untuk menggunakan fitur chat.";
    // die("Anda harus login untuk menggunakan fitur chat.");
    echo "<script>
        setTimeout(function() {
            window.location.href = 'index.php?page=login';
        }, 2000); // Penundaan selama 2 detik (2000 milidetik)
    </script>";
    die();
}

$sender_id = $_SESSION['user_id'];
$receiver_id = ($_POST['receiver_id'] == 'superadmin') ? 'superadmin' : (int)$_POST['receiver_id'];
$message_text = $_POST['msg'];

$query = "INSERT INTO messages (sender_id, receiver_id, message_text, timestamp) 
          VALUES ('$sender_id', '$receiver_id', '$message_text', NOW())";

if (mysqli_query($koneksi, $query)) {
    echo "<script>showSnak();</script>";
    echo "<script>
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 2000); // Penundaan selama 2 detik (2000 milidetik)
    </script>";
} else {
    echo "Terjadi kesalahan saat mengirim pesan: " . mysqli_error($koneksi);
}



mysqli_close($koneksi);
?>
