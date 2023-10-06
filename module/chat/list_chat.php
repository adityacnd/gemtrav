<?php
include_once("function/koneksi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message_id"]) && isset($_POST["status"])) {
  $message_id = (int)$_POST["message_id"];
  $status = mysqli_real_escape_string($koneksi, $_POST["status"]);
  $updateQuery = "UPDATE messages SET status = '$status' WHERE message_id = $message_id";
  
  if (mysqli_query($koneksi, $updateQuery)) {
      echo "success";
      exit;
  } else {
      echo "error: " . mysqli_error($koneksi);
      exit;
  }
}
// Query untuk mengambil pesan beserta nama pengirim dari tabel messages
$query = mysqli_query($koneksi, "
    SELECT messages.message_id, user.nama AS pengirim, messages.message_text, messages.timestamp, sender_id, receiver_id, user.phone, user.email, messages.status
    FROM messages
    INNER JOIN user ON messages.sender_id = user.user_id
    ORDER BY messages.timestamp ASC
");
$no=1;
if ($query) {
  if (mysqli_num_rows($query) > 0) {
    echo "<h1>Pengaduan Layanan User</h1>";
    echo "<table>";
    // <th>Status</th><th>Aksi</th>
    echo "<tr><th>no</th><th>id pengirim</th><th>Pengadu</th><th>to id</th><th>Pesan</th><th>No Hp</th><th>Email</th><th>Waktu</th></tr>";

    while ($row = mysqli_fetch_assoc($query)) {
      echo "<tr>";
      echo "<td>" . $no . "</td>";
      echo "<td>" . $row['sender_id'] . "</td>";
      echo "<td>" . $row['pengirim'] . "</td>";
      echo "<td>" . $row['receiver_id'] . "</td>";
      echo "<td>" . $row['message_text'] . "</td>";
      echo "<td>" . $row['phone'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['timestamp'] . "</td>";
      // echo "<td>";
      // echo "<select id='status_" . $row['message_id'] . "'>";
      // echo "<option value=\"proses\" " . ($row['status'] == 'proses' ? 'selected' : '') . ">Proses</option>";
      // echo "<option value=\"selesai\" " . ($row['status'] == 'selesai' ? 'selected' : '') . ">Selesai</option>";
      // echo "</select>";
      // echo "</td>";
      // echo "<td>";
      // echo "<button type='button' onclick='updateStatus(" . $row['message_id'] . ")'>Kirim</button>";
      // echo "</td>";
      echo "</tr>";
      $no++;
    }

    echo "</table>";
  } else {
    echo "Tidak ada pesan.";
  }
} else {
  echo "Error dalam eksekusi query: " . mysqli_error($koneksi);
}

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  h1 {
    text-align: center;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table,
  th,
  td {
    border: 1px solid #ccc;
  }

  th,
  td {
    padding: 10px;
    text-align: center;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
  }

  select {
    width: 100px;
  }

  /* button {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    } */
</style>

<script>
  function updateStatus(messageId) {
    const selectedStatus = document.getElementById(`status_${messageId}`).value;
    $.ajax({
      type: "POST",
      // url: "update_status.php",
      url: "<?php echo BASE_URL; ?>index.php?page=module&chat=list_chat",
      data: {
        message_id: messageId,
        status: selectedStatus
      },
      success: function (response) {
        if (response === "success") {
          alert("Status berhasil diperbarui.");
          location.reload();
        } else {
          alert("Gagal memperbarui status.");
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert("Terjadi kesalahan: " + error);
      }
    });
  }
</script>