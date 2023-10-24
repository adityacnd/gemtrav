<?php

class TestPemesan
{
    public function validateForm($data)
    {
        $errors = [];

        // Validasi judul
        if (empty($data['nama_penerima'])) {
            $errors['nama_penerima'] = 'Judul tidak boleh kosong';
        }

        // Validasi isi
        if (empty($data['nomor_telepon'])) {
            $errors['nomor_telepon'] = 'Isi tidak boleh kosong';
        }
        if (empty($data['alamat'])) {
            $errors['alamat'] = 'Isi tidak boleh kosong';
        }
        $allowedCategories =['HRV (Rp,80,000)','Toyota Avanza (Rp,50,000)','Xenia (Rp,50,000)','Default(acak mengikuti kursi kosong) (Rp,0)'];
        if (!in_array($data['kota'], $allowedCategories)) {
            $errors['kota'] = 'Isi tidak boleh kosong';
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