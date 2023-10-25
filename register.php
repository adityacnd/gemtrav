<style>
	form{
		display: flex;
		/* width: 100%; */
		/* width: 520px; */
		/* position: absolute; */
		flex-direction: column;
		/* background-color: white; */
		/* gap: 0.5em; */
		/* background-color: rgba(255,255,255,0.13); */
		padding: 41px 31px;
		border-radius: 11px;
		backdrop-filter: blur(11px);
		border: 5px solid rgba(255,255,255,0.1);
		box-shadow: 0 0 3px rgba(8,7,16,0.6);
	}
	form:hover{
		box-shadow: 0 0 21px rgba(8,7,16,0.6);
	}
	
</style>
<div id="container-user-akses">

	<form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">
	
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
			$email = isset($_GET['email']) ? $_GET['email'] : false;
			$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
			$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
			
			if($notif == "require"){
				echo "<div class='notif'>Maaf, kamu harus melengkapi form dibawah ini</div>";
			}else if($notif == "password"){
				echo "<div class='notif'>Maaf, password yang kamu masukan tidak sama</div>";
			}else if($notif == "email"){
				echo "<div class='notif'>Maaf, email yang kamu masukan sudah terdaftar</div>";
			}
		?>
		<h1>Register Form</h1>
		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="ex: shin ryujinn"/></span>
		</div>

		<div class="element-form">
			<label>Email</label>
			<span><input type="email" name="email" value="<?php echo $email; ?>" placeholder="example@g.com"/></span>
		</div>

		<div class="element-form">
			<label>Nomor Telepon / Handphone</label>
			<span><input type="number" name="phone" value="<?php echo $phone; ?>" placeholder="081823.."/></span>
		</div>

		<div class="element-form">
			<label>Alamat</label>
			<span><textarea placeholder="jl. teross" name="alamat"><?php echo $alamat; ?></textarea></span>
		</div>
	
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" placeholder="password"/></span>
		</div>	

		<div class="element-form">
			<label>Re-type Password</label>
			<span><input type="password" name="re_password" placeholder="password"/></span>
		</div>	

		<div class="element-form">
			<span><input type="submit" value="Register" /></span>
		</div>	
	
	</form>
	
</div>