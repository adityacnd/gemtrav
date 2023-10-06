<?php
// Include koneksi ke database dan fungsi helper
include_once("function/koneksi.php");
include_once("function/helper.php");

// Inisialisasi variabel pencarian
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

// Ambil data kategori
$queryKategori = mysqli_query($koneksi, "SELECT DISTINCT kategori FROM explore");
?>
<div class="container">
    <section class="content">
        <!-- Tampilkan konten berita -->
        <?php
            $limit = 10; // Jumlah berita per halaman
            // $page = isset($_GET['page']) ? $_GET['page'] : 1;
            // $offset = ($page - 1) * $limit;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page = max($page, 1); // Pastikan $page tidak kurang dari 1
            $offset = ($page - 1) * $limit;

        // Query untuk mengambil data berita dengan pencarian (jika ada)
        $queryExplore = mysqli_query($koneksi, "SELECT * FROM explore WHERE kategori = 'Berita' AND judul LIKE '%$keyword%' ORDER BY tgl_publikasi DESC LIMIT $offset, $limit");
        while ($rowExplore = mysqli_fetch_assoc($queryExplore)) {
            echo "<article class='berita'>
                    <h2>" . $rowExplore['judul'] . "</h2>
                    <p>" . $rowExplore['isi'] . "</p>
                </article>";
        }

        // Tampilkan pagination
        $totalBerita = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM explore WHERE kategori = 'Berita' AND judul LIKE '%$keyword%'"));
        $totalHalaman = ceil($totalBerita / $limit);
        echo "<div class='pagination'>";
        for ($i = 1; $i <= $totalHalaman; $i++) {
            $active = ($i == $page) ? "class='active'" : "";
            echo "<a href='berita.php?page=$i&keyword=$keyword' $active>$i</a>";
        }
        echo "</div>";
        ?>
    </section>
    <aside class="sidebar">
        <!-- Tampilkan daftar kategori -->
        <h3>Kategori</h3>
        <ul>
            <?php
            // Ganti 'nama_tabel_kategori' dengan nama tabel kategori di database Anda
            $queryKategori = mysqli_query($koneksi, "SELECT DISTINCT kategori FROM explore");
            while ($rowKategori = mysqli_fetch_assoc($queryKategori)) {
                echo "<li><a href='berita.php?kategori=" . $rowKategori['kategori'] . "'>" . $rowKategori['kategori'] . "</a></li>";
            }
            ?>
        </ul>
        <!-- Form pencarian -->
        <h3>Cari Berita</h3>
        <form action="berita.php" method="GET">
            <input type="text" name="keyword" placeholder="Cari berita" value="<?php echo $keyword; ?>">
            <button type="submit">Cari</button>
        </form>
    </aside>
</div>
