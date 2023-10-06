<div id="kiri">

	<?php

	echo kategori($kategori_id);

	?>

</div>

<div id="kanan">

	<div id="slides">

		<?php

		$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
		while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {
			echo "<a href='" . BASE_URL . "$rowBanner[link]'><img src='" . BASE_URL . "images/slide/$rowBanner[gambar]' /></a>";
		}
		?>

	</div>


	<div id="frame-barang">

		<ul>
			<?php

			if ($kategori_id) {
				$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
			} else {
				$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
			}

			$no = 1;
			while ($row = mysqli_fetch_assoc($query)) {

				$style = false;
				if ($no == 3) {
					$style = "style='margin-right:0px'";
					$no = 0;
				}

				echo "<li $style>
							<p class='price'>" . rupiah($row['harga']) . "</p>
							<a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>
								<img src='" . BASE_URL . "images/barang/$row[gambar]' />
							</a>
							<div class='keterangan-gambar'>
								<p><a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
								<span>kursi : $row[stok]</span>
							</div>
							<div class='button-add-cart'>
								<a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]'>+ Book</a>
							</div>";

				$no++;
			}

			?>
		</ul>

	</div>

</div>
<img class="open-button" onclick="openForm()" src="<?php echo BASE_URL."images/avtarchat.png"; ?>" />
<!-- <button class="open-button" onclick="openForm()">
	<i class="far fa-question-circle"></i> Bantuan
</button> -->


<div class="chat-popup" id="myForm">
	<form action="index.php?page=action_chat" class="form-container" method="POST">
		<h1>Pengaduan Layanan</h1>
		<label for="receiver_id"><b>Penerima</b></label>
		<select name="receiver_id">
			<option value="7">admin 1</option>
			<option value="8">admin 2</option>
			<option value="10">admin 3</option>
		</select>
		<label for="msg"><b>Message</b></label>
		<textarea placeholder="Type message.." name="msg" required></textarea>

		<button type="submit" class="btn">
			<i class="fa fa-paper-plane"></i> Send
		</button>
		<button type="button" class="btn cancel" onclick="closeForm()">
			<i class="fa fa-window-close" aria-hidden="true"></i> Close
		</button>

	</form>
</div>

<script>
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
		document.getElementById("myForm").style.display = "none";
	}
</script>