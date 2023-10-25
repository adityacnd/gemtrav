<?php

	if($user_id){
		header("location: ".BASE_URL);
	}

?>
<style>
	form{
		display: flex;
		/* width: 520px; */
		/* position: absolute; */
		flex-direction: column;
		/* background-color: white; */
		/* gap: 0.5em; */
		/* background-color: rgba(255,255,255,0.13); */
		padding: 41px 21px;
		border-radius: 11px;
		backdrop-filter: blur(11px);
		border: 5px solid rgba(255,255,255,0.1);
		box-shadow: 0 0 3px rgba(8,7,16,0.6);
	}
	form:hover{
		box-shadow: 0 0 21px rgba(8,7,16,0.6);
	}
	#lg{
		display: flex;
		width: 70px;
		height: 70px;
		object-fit: contain;
		border-radius: 50%;
	}
	
</style>

<div id="container-user-akses">

	<form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">
	
		<?php
		
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			
			if($notif == true){
				echo "<div class='notif'>Maaf, email atau password yang kamu masukan tidak cocok</div>";
			}
		
		?>
		<div class="midlog" style="display: flex; flex-direction: column; align-items: center;">
		<img src="images/logo.png" alt="logo" id="lg">
		<h1>Login Form</h1>
		</div>
		<div class="element-form">
			<label>Email</label>
			<span><input type="email" name="email" placeholder="example@com"/></span>
		</div>
		
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" placeholder="password"/></span>
		</div>	

		<div class="element-form">
			<span><input type="submit" value="Login"/></span>
		</div>	
	
	</form>
	
</div>