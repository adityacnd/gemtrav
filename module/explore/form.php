<?php
$explore_id = isset($_GET['explore_id']) ? $_GET['explore_id'] : "";
$judul = "";
$isi = "";
$kategori = "";
$status = "";
$button = "Add";

if ($explore_id) {
    $button = "Update";

    $queryExplore = mysqli_query($koneksi, "SELECT * FROM explore WHERE id='$explore_id'");
    $row = mysqli_fetch_array($queryExplore);

    $judul = $row["judul"];
    $isi = $row["isi"];
    $kategori = $row["kategori"];
    $status = $row["status"];
}
?>
<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>
<form action="<?php echo BASE_URL . "module/explore/action.php?explore_id=$explore_id"; ?>" method="post" onsubmit="return validateForm()">
    <!-- Kode HTML Formulir -->

    <div class="element-form">
        <label>Judul</label>
        <span><input type="text" name="judul" id="judul" value="<?php echo $judul; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select name="kategori">
                <option value="Berita" <?php if ($kategori == "Berita") echo "selected"; ?>>Berita</option>
                <option value="Tips" <?php if ($kategori == "Tips") echo "selected"; ?>>Tips</option>
                <option value="Blog" <?php if ($kategori == "Blog") echo "selected"; ?>>Blog</option>
            </select>
        </span>
    </div>

    <div style="margin-bottom:10px">
        <label style="font-weight:bold">Deskripsi</label>
        <span><textarea name="isi" id="editor"><?php echo $isi; ?></textarea></span>
        <p id="error-message" style="color: red;"></p>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <select name="status">
                <option value="on" <?php if ($status == "on") echo "selected"; ?>>On</option>
                <option value="off" <?php if ($status == "off") echo "selected"; ?>>Off</option>
            </select>
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
    </div>

    <input type="hidden" name="explore_id" value="<?php echo $explore_id; ?>" />
</form>

<script>
    CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: '<?php echo BASE_URL . "ckfinder/ckfinder.html"; ?>',
    });

    function validateForm() {
        var judul = document.getElementById("judul").value;
        var isi = CKEDITOR.instances.editor.getData();

        if (judul.trim() === "" || isi.trim() === "") {
            document.getElementById("error-message").innerText = "Judul dan isi tidak boleh kosong.";
            return false; // Formulir tidak akan dikirim
        }

        // Validasi berhasil, formulir dapat dikirim
        return true;
    }
</script>
