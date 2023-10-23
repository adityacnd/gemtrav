<?php

$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

$kota = "";
$tarif = "";
$status = "";
$button = "Add";

if ($kota_id) {
    $queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
    $row = mysqli_fetch_assoc($queryKota);

    $kota = $row['kota'];
    $tarif = $row['tarif'];
    $status = $row['status'];

    $button = "Update";
}

?>
<form action="<?php echo BASE_URL.'module/kota/action.php?kota_id='.$kota_id; ?>" method="post" onsubmit="return validateForm();">

    <div class="element-form">
        <label>Kendaraan</label>
        <span><input type="text" id="kota" name="kota" value="<?php echo $kota; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Tarif</label>
        <span><input type="text" id="tarif" name="tarif" value="<?php echo $tarif; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status == "on") echo "checked"; ?> /> On
            <input type="radio" name="status" value="off" <?php if ($status == "off") echo "checked"; ?> /> Off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
    </div>
    <p id="error-message" style="color: red;"></p>

</form>

<script>
    function validateForm() {
        var kota = document.getElementById("kota").value;
        var tarif = document.getElementById("tarif").value;
        var errorMessage = document.getElementById("error-message");

        if (kota.trim() === "" || tarif.trim() === "") {
            errorMessage.innerText = "Data tidak boleh kosong.";
            return false; // Formulir tidak akan dikirim
        }

        // Validasi berhasil, formulir dapat dikirim
        errorMessage.innerText = ""; // Hapus pesan kesalahan jika ada
        return true;
    }
</script>
