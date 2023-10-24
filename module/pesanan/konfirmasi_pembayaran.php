<?php
    $pesanan_id = $_GET["pesanan_id"];
?>

<table class="table-list">
    <form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST" onsubmit="return validateForm()">
        <div class="element-form">
            <label>Nomor Rekening</label>
            <span><input type="text" name="nomor_rekening" id="nomor_rekening" /></span>
            <span class="error-message" id="error_nomor_rekening"></span>
        </div>

        <div class="element-form">
            <label>Nama Account</label>
            <span><input type="text" name="nama_account" id="nama_account" /></span>
            <span class="error-message" id="error_nama_account"></span>
        </div>

        <div class="element-form">
            <label>Tanggal Transfer (format: yyyy-mm-dd)</label>
            <span><input type="text" name="tanggal_transfer" id="tanggal_transfer" /></span>
            <span class="error-message" id="error_tanggal_transfer"></span>
        </div>

        <div class="element-form">
            <span><input type="submit" value="Konfirmasi" name="button" /></span>
        </div>
    </form>
</table>

<script>
    function validateForm() {
        var nomorRekening = document.getElementById("nomor_rekening").value;
        var namaAccount = document.getElementById("nama_account").value;
        var tanggalTransfer = document.getElementById("tanggal_transfer").value;

        // Reset previous error messages
        document.getElementById("error_nomor_rekening").innerText = "";
        document.getElementById("error_nama_account").innerText = "";
        document.getElementById("error_tanggal_transfer").innerText = "";

        // Check if fields are empty
        if (nomorRekening.trim() === "") {
            document.getElementById("error_nomor_rekening").innerText = "Nomor Rekening harus diisi.";
            return false;
        }

        if (namaAccount.trim() === "") {
            document.getElementById("error_nama_account").innerText = "Nama Account harus diisi.";
            return false;
        }

        if (tanggalTransfer.trim() === "") {
            document.getElementById("error_tanggal_transfer").innerText = "Tanggal Transfer harus diisi.";
            return false;
        }

        // Continue with form submission if all fields are filled
        return true;
    }
</script>
