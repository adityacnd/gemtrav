<?php
// include_once("../../function/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["status"]) && isset($_POST["message_id"])) {
    $status = $_POST["status"];
    $messageID = (int)$_POST["message_id"];

    // Lakukan update status di sini, contohnya:
    $query = "UPDATE messages SET status = '$status' WHERE message_id = $messageID";

    if (mysqli_query($koneksi, $query)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request";
}
?>