<?php
use PHPUnit\Framework\TestCase;
require_once "TestKonfirmasi.php";

class KonfirmasiTest extends TestCase
{
    public function testValidateForm()
    {
        // Membuat instance kelas formulir
        $TestKonfirmasi = new TestKonfirmasi();

        // Menyiapkan data palsu untuk diuji
        $fakeData = [
            'nomor_rekening' => '0123',
            'nama_account' => 'adit',
            'tanggal_transfer' => '2023-10-24',
        ];

        // Memanggil metode validateForm dan memeriksa hasilnya
        $result = $TestKonfirmasi->validateForm($fakeData);

        // Memeriksa apakah hasilnya benar (true)
        $this->assertTrue($result);
    }
}
?>