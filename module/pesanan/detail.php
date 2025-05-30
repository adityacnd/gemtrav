
<?php
$pesanan_id = $_GET["pesanan_id"];
$query = mysqli_query($koneksi, "SELECT pesanan.*, pesanan.status, pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");
$row = mysqli_fetch_assoc($query);

$tanggal_pemesanan = $row['tanggal_pemesanan'];
$nama_penerima = $row['nama_penerima'];
$nomor_telepon = $row['nomor_telepon'];
$alamat = $row['alamat'];
$tarif = $row['tarif'];
$nama = $row['nama'];
$kota = $row['kota'];
$status = $row['status'];
$backgroundImage = "";

if ($status == "lunas") {
  $backgroundImage = "background-image: url('https://png.pngtree.com/png-vector/20221029/ourlarge/pngtree-payment-stamp-red-white-png-image_6402644.png');";
}
?>

<div id="frame-faktur" style="<?php echo $backgroundImage; ?>">
  <h3><center>Detail Pesanan</center></h3>
  <hr/>
  <table>
    <tr>
      <td>Nomor pemesanan</td>
      <td>:</td>
      <td><?php echo $pesanan_id; ?></td>
    </tr>
    <tr>
      <td>Nama Pemesan</td>
      <td>:</td>
      <td><?php echo $nama; ?></td>
    </tr>
    <tr>
      <td>Nama pemilik Kursi</td>
      <td>:</td>
      <td><?php echo $nama_penerima; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $alamat; ?></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td>:</td>
      <td><?php echo $nomor_telepon; ?></td>
    </tr>
    <tr>
      <td>Tanggal Pemesanan</td>
      <td>:</td>
      <td><?php echo $tanggal_pemesanan; ?></td>
    </tr>
    <tr>
      <td>Status</td>
      <td>:</td>
      <td>
        <button onclick="takeScreenshot()" style="background-color: orange;border:none"><?php echo $arrayStatusPesanan[$status]; ?></button>
      </td>
    </tr>
  </table>
</div>

<table class="table-list">
  <tr class="baris-title">
    <th class="no">No</th>
    <th class="kiri">Nama Paket</th>
    <th class="tengah">Qty</th>
    <th class="kanan">Harga /kursi</th>
    <th class="kanan">Total</th>
  </tr>

  <?php
  $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
  $no = 1;
  $subtotal = 0;

  while ($rowDetail = mysqli_fetch_assoc($queryDetail)) {
    $total = $rowDetail["harga"] * $rowDetail["quantity"];
    $subtotal = $subtotal + $total;

    echo "<tr>
            <td class='no'>$no</td>
            <td class='kiri'>$rowDetail[nama_barang]</td>
            <td class='tengah'>$rowDetail[quantity]</td>
            <td class='kanan'>" . rupiah($rowDetail["harga"]) . "</td>
            <td class='kanan'>" . rupiah($total) . "</td>
          </tr>";

    $no++;
  }

  $subtotal = $subtotal + $tarif;
  ?>

  <tr>
    <td class="kanan" colspan="4">Mobil Pilihan</td>
    <td class="kanan"><?php echo rupiah($tarif); ?></td>
  </tr>
  <tr>
    <td class="kanan" colspan="4"><b>Sub total</b></td>
    <td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
  </tr>
</table>

<div id="frame-keterangan-pembayaran">
  <p>Silahkan Lakukan pembayaran ke Bank BCA DIGITAL<br/> Nomor Account : 0000-9999-8888 (A/N Gemilang Travel).<br/> Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id"?>">Disini</a>.<br/> </p>

  <?php if ($status == 2) { ?>
    <button onclick="takeScreenshot()" style="background-color: yellow;border:none;display: flex;justify-content:flex-end">cetak tiket</button>
  <?php } else { ?>
    <p>Status pesanan belum lunas. Tidak dapat mencetak tiket.</p>
  <?php } ?>

  <h5> kendala transaksi? <br/>Hubungi admin(wa) <a href="https://wa.me/6281246575092?text=Halo%20admin%20gemilang%20travel%0Asaya%20terkendala%20pesanan%20saya%0Aatas%20nama%20..%20dengan%20id%20pesananan%20..%0A">Disini</a> </h5>
</div>
