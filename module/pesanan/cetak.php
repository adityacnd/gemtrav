<div id="frame-rekap">
    <a class='tombol-action' href="#" onclick="window.print(); return false;">
    	Cetak Rekap
	</a>
</div>
<?php

	if($level == "superadmin"){
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
	}else{
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
	}
	
	if(mysqli_num_rows($queryPesanan) == 0){
		echo "<h3>Saat ini belum ada data pesanan</h3>";
	}
	else{
	
		echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='kiri'>Nomor Pesanan</th>
					<th class='kiri'>Status</th>
					<th class='kiri'>Nama</th>
					<th class='kiri'>Tanggal</th>
					<th class='kiri'>Alamat</th>
					<th class='kiri'>No. Handphone</th>
				</tr>";
		
		$adminButton = "";
		while($row=mysqli_fetch_assoc($queryPesanan)){
		
			$status = $row['status'];
			echo "<tr>
					<td class='kiri'>$row[pesanan_id]</td>
					<td class='kiri'>$arrayStatusPesanan[$status]</td>
					<td class='kiri'>$row[nama]</td>
					<td class='kiri'>$row[tanggal_pemesanan]</td>
					<td class='kiri'>$row[alamat]</td>
					<td class='kiri'>$row[nomor_telepon]</td>
					
				 </tr>";
		}
		
		echo "</table>";
	}
	
?>