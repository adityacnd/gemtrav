<?php
if ($user_id == false) {
    $_SESSION["proses_pesanan"] = true;
    header("location: " . BASE_URL . "index.php?page=login");
    exit;
}
?>

<div id="frame-data-pengiriman">

    <h3 class="label-data-pengiriman">Detail Kursi</h3>

    <div id="frame-form-pengiriman">

        <!-- Add this error message div -->
        <div id="error-message" style="color: red;"></div>

        <form action="<?php echo BASE_URL . "proses_pemesanan.php"; ?>" method="POST" onsubmit="return validateForm()">

            <div class="element-form">
                <label>Nama</label>
                <span><input type="text" name="nama_penerima" /></span>
            </div>

            <div class="element-form">
                <label>Nomor hp(wa)</label>
                <span><input type="number" name="nomor_telepon" /></span>
            </div>

            <div class="element-form">
                <label>Alamat Penjemputan</label>
                <span><textarea name="alamat"></textarea></span>
            </div>

            <div class="element-form">
                <label>Kendaraan</label>
                <span>
                    <select name="kota">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kota");

                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<option value='$row[kota_id]'>$row[kota] (" . rupiah($row["tarif"]) . ")</option>";
                        }
                        ?>
                    </select>
                </span>
            </div>

            <div class="element-form">
                <span><input type="submit" value="submit" /></span>
            </div>

        </form>
    </div>
</div>

<div id="frame-data-detail">
    <h3 class="label-data-pengiriman">Detail Order</h3>

    <div id="frame-detail-order">

        <table class="table-list">
            <!-- ... (unchanged) ... -->
        </table>

    </div>
</div>

<script>
    function validateForm() {
        var nama_penerima = document.getElementsByName("nama_penerima")[0].value;
        var nomor_telepon = document.getElementsByName("nomor_telepon")[0].value;
        var alamat = document.getElementsByName("alamat")[0].value;

        if (nama_penerima.trim() === "" || nomor_telepon.trim() === "" || alamat.trim() === "") {
            document.getElementById("error-message").innerText = "Data tidak boleh kosong.";
            return false; // Formulir tidak akan dikirim
        }

        // Validasi berhasil, formulir dapat dikirim
        return true;
    }
</script>
