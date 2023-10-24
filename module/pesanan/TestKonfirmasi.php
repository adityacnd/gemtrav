<?php

class TestKonfirmasi
{
    public function validateForm($data)
    {
        $errors = [];

        // Validasi judul
        if (empty($data['nomor_rekening'])) {
            $errors['nomor_rekening'] = 'Judul tidak boleh kosong';
        }

        // Validasi isi
        if (empty($data['nama_account'])) {
            $errors['nama_account'] = 'Isi tidak boleh kosong';
        }
        if (empty($data['tanggal_transfer'])) {
            $errors['tanggal_Transfer'] = 'Isi tidak boleh kosong';
        }
       

        // Jika ada kesalahan, kembalikan array kesalahan
        if (!empty($errors)) {
            return $errors;
        }

        // Jika tidak ada kesalahan, formulir dianggap valid
        return true;
    }
}
?>
