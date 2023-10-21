<?php
use PHPUnit\Framework\TestCase;
require_once "NewsForm.php";

class NewsFormTest extends TestCase
{
    public function testValidateForm()
    {
        // Membuat instance kelas formulir
        $newsForm = new NewsForm();

        // Menyiapkan data palsu untuk diuji
        $fakeData = [
            'judul' => 'Judul Berita',
            'kategori' => 'Berita',
            'isi' => 'Isi berita yang panjang',
            'status' => 'on',
        ];

        // Memanggil metode validateForm dan memeriksa hasilnya
        $result = $newsForm->validateForm($fakeData);

        // Memeriksa apakah hasilnya benar (true)
        $this->assertTrue($result);
    }
}
?>