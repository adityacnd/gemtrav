<?php

class NewsForm
{
    public function validateForm($data)
    {
        $errors = [];

        // Validasi judul
        if (empty($data['judul'])) {
            $errors['judul'] = 'Judul tidak boleh kosong';
        }

        // Validasi isi
        if (empty($data['isi'])) {
            $errors['isi'] = 'Isi tidak boleh kosong';
        }

        // Validasi kategori
        $allowedCategories = ['Berita', 'Tips', 'Blog'];
        if (!in_array($data['kategori'], $allowedCategories)) {
            $errors['kategori'] = 'Kategori tidak valid';
        }

        // Validasi status
        $allowedStatus = ['on', 'off'];
        if (!in_array($data['status'], $allowedStatus)) {
            $errors['status'] = 'Status tidak valid';
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
