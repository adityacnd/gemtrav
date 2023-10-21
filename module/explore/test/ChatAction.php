<?php
// ChatAction.php
class ChatAction
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function processMessage($sender_id, $receiver_id, $message_text)
    {
        // Logika pengiriman pesan
        $query = "INSERT INTO messages (sender_id, receiver_id, message_text, timestamp) 
                  VALUES ('$sender_id', '$receiver_id', '$message_text', NOW())";

        return mysqli_query($this->koneksi, $query);
    }
}

// CustomMysqliMock.php