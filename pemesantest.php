<?php
use PHPUnit\Framework\TestCase;
require_once "tespemesan.php";

class pemesantest extends TestCase
{
    public function testValidateForm()
    {
        // Membuat instance kelas formulir
        $TestPemesan = new TestPemesan();

        // Menyiapkan data palsu untuk diuji
        $fakeData = [
            'nama_penerima' => 'adit',
            'nomor_telepon' => '087880436022',
            'alamat' => 'jl.123',
            'kota' => 'HRV (Rp,80,000)'
        ];

        // Memanggil metode validateForm dan memeriksa hasilnya
        $result = $TestPemesan->validateForm($fakeData);

        // Memeriksa apakah hasilnya benar (true)
        $this->assertTrue($result);
    }
}
?>