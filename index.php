<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
	$totalBarang = count($keranjang);

?>
<!DOCTYPE html>
<html>

	<head>
		<title>Gemilang Travel | Perfect solution</title>
		
		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo BASE_URL."css/banner.css"; ?>" type="text/css" rel="stylesheet" />
		<link rel="icon" type="image/x-icon" href="/images/logo.png">
		<script src="<?php echo BASE_URL."js/jquery-3.1.1.min.js"; ?>"></script>
		<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
		
		<script>
		$(function() {
			$('#slides').slidesjs({
				height: 350,
				play: { auto : true,
					    interval : 3000
					  },
				navigation : false
			});
		});
		</script>
		<script>
        function takeScreenshot() {
            // Mendapatkan elemen <body> dalam sebuah tangkapan layar
            html2canvas(document.body).then(function(canvas) {
                // Membuat elemen <a> yang berisi tangkapan layar sebagai gambar
                var screenshotLink = document.createElement('a');
                screenshotLink.href = canvas.toDataURL();
                screenshotLink.download = 'e-tiket.png';
                screenshotLink.click();
            });
            
            // html2canvas(document.body).then(function(canvas) {
            //     var screenshotData = canvas.toDataURL();

            //     // Menginisialisasi objek jsPDF
            //     var pdf = new jsPDF();

            //     // Menghitung lebar dan tinggi halaman PDF sesuai dengan tangkapan layar
            //     var pdfWidth = pdf.internal.pageSize.getWidth();
            //     var pdfHeight = (canvas.height * pdfWidth) / canvas.width;

            //     // Menambahkan gambar tangkapan layar ke halaman PDF
            //     pdf.addImage(screenshotData, "PNG", 0, 0, pdfWidth, pdfHeight);

            //     // Mengunduh file PDF
            //     pdf.save("screenshot.pdf");
            // });
        }
        
    </script>
		
	</head>

	<body>
	
		<div id="container">
			<div id="header">
				<a href="<?php echo BASE_URL."index.php"; ?>">
					<img src="<?php echo BASE_URL."images/logo-gemilang-rev-1.png"; ?>" />
				</a>
				
				<div id="menu">
					<div id="user">
						<?php
							if($user_id){
								echo "Hi <b>$nama</b>,
									  <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
									  <a href='".BASE_URL."logout.php'>Logout</a>";
							}else{
								echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
									 <a href='".BASE_URL."index.php?page=register'>Register</a>";
							}
						?>
					</div>
					
					<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
						<img src="<?php echo BASE_URL."images/cart.png"; ?>" /> 
						<?php
							if($totalBarang != 0){
								echo "<span class='total-barang'>$totalBarang</span>";
							}
						?>
					</a>
				</div>
			</div>	

			<div id="content">
				
				<?php
					$filename = "$page.php";
					
					if(file_exists($filename)){
						include_once($filename);
					}else{
						include_once("main.php");
					}
				?>
			
			</div>
			
			<div id="footer">
				<p>copyright 2023 Gemilang Travel</p>
			</div>
			
		</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
	</body>
	<style>img[alt="www.000webhost.com"]{display:none;}</style>
</html>