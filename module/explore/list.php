<div id="frame-tambah">
    <a class="tombol-action" href="<?php echo BASE_URL . "index.php?page=my_profile&module=explore&action=form"; ?>">+ Tambah Explore</a>
</div>

<?php
$no = 1;

$queryExplore = mysqli_query($koneksi, "SELECT * FROM explore ORDER BY id DESC");

if (!$queryExplore) {
    die("Error in SQL query: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($queryExplore) == 0) {
    echo "<h3>Saat ini belum ada entri Explore di dalam database</h3>";
} else {
    echo "<table class='table-list'>
            <tr class='baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Judul</th>
                <th class='kiri'>Kategori</th>
                <th class='tengah'>Tanggal Publikasi</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Isi</th>
                <th class='tengah'>Action</th>
                <th class='tengah'>Delete</th>
             </tr>";

    while ($rowExplore = mysqli_fetch_array($queryExplore)) {
        echo "<tr>
                <td class='kolom-nomor'>$no</td>
                <td>$rowExplore[judul]</td>
                <td>$rowExplore[kategori]</td>
                <td class='tengah'>$rowExplore[tgl_publikasi]</td>
                <td class='tengah'>$rowExplore[status]</td>
                <td class='tengah2'><textarea rows='3' readonly>$rowExplore[isi]</textarea></td>
                <td class='tengah'><a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=explore&action=form&explore_id=$rowExplore[id]" . "'>Edit</a></td>
                <td class='tengah'><a class='tombol-action' href='" . BASE_URL . "module/explore/action.php?delete_id=$rowExplore[id]" . "'>Delete</a></td>
             </tr>";

        $no++;
    }

    echo "</table>";
}
?>
