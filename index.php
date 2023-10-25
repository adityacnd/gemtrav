<?php
ob_start();
header("Cache-Control: no-cache, must-revalidate");
session_start();
// include_once('config.php');

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="<?php echo BASE_URL . "css/style.css"; ?>" type="text/css" rel="stylesheet" />
	<link href="<?php echo BASE_URL . "css/banner.css"; ?>" type="text/css" rel="stylesheet" />
	<link href="<?php echo BASE_URL . "css/snakbar.css"; ?>" type="text/css" rel="stylesheet" />
	<link href="<?php echo BASE_URL . "css/floatcht.css"; ?>" type="text/css" rel="stylesheet" />
	<link rel="icon" type="image/x-icon" href="/images/logo.png">
	<script src="<?php echo BASE_URL . "js/jquery-3.1.1.min.js"; ?>"></script>
	<script src="<?php echo BASE_URL . "js/notip.js"; ?>"></script>
	<script src="<?php echo BASE_URL . "js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&display=swap"
		rel="stylesheet">

	<script>
		$(function () {
			$('#slides').slidesjs({
				height: 350,
				play: {
					auto: true,
					interval: 3000
				},
				navigation: false
			});
		});
		function showSnak() {
			// Get the snackbar DIV
			var x = document.getElementById("snackbar");

			// Add the "show" class to DIV
			x.className = "show";

			// After 3 seconds, remove the show class from DIV
			setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
		}
	</script>
	<script type="module">
		// Import the functions you need from the SDKs you need
		import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
		// TODO: Add SDKs for Firebase products that you want to use
		// https://firebase.google.com/docs/web/setup#available-libraries

		// Your web app's Firebase configuration
		const firebaseConfig = {
			apiKey: "AIzaSyDFdHpb9MFr2hdHQkFLcHwjzf-6M-CJvaI",
			authDomain: "notip-all.firebaseapp.com",
			projectId: "notip-all",
			storageBucket: "notip-all.appspot.com",
			messagingSenderId: "271939312806",
			appId: "1:271939312806:web:cc45f8ffbe96b966d42867"
		};

		// Initialize Firebase
		const app = initializeApp(firebaseConfig);
	</script>
	<script>
		function takeScreenshot() {
			// Mendapatkan elemen <body> dalam sebuah tangkapan layar
			html2canvas(document.body).then(function (canvas) {
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
			//<a href='".BASE_URL."index.php?page=berita'>Berita</a>";
			//<a href='".BASE_URL."berita.php'>Berita</a>";
		}

	</script>
	<style>
  #user a {
    text-decoration: none;
    color: #333; /* warna teks normal */
    padding: 10px 15px;
    margin-right: 10px;
    position: relative;
    transition: color 0.3s; /* efek transisi untuk smooth hover */
  }

  #user a:hover {
    color: #007bff; /* warna teks aktif */
  }

  #user a::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px; /* tinggi garis bawah */
    bottom: 0;
    left: 0;
    background-color: #4CAF50; /* warna garis bawah normal */
    visibility: hidden;
    transform: scaleX(0);
    transition: all 0.3s ease-in-out; /* efek transisi untuk garis bawah */
  }

  #user a:hover::after {
    visibility: visible;
    transform: scaleX(1);
  }
</style>


</head>

<body>

	<div id="container">
		<div id="header">
			<!-- <a href="<?php echo BASE_URL . "index.php"; ?>">
					<img src="<?php echo BASE_URL . "images/logo-gemilang-rev-1.png"; ?>" />
				</a> -->

			<div id="menu">
				<a href="<?php echo BASE_URL . "index.php"; ?>" id="imghder">
					<img src="<?php echo BASE_URL . "images/logo-gemilang-rev-1.png"; ?>" />
				</a>
				<div id="user">
					<?php
					if ($user_id) {
						echo "<div id='midd'>
									  <a href='#'>Hi $nama</a>
									  <a href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'> <i class='fa fa-user' aria-hidden='true'></i> My Profile</a>
									  <a href='" . BASE_URL . "index.php?page=berita'> <i class='fa fa-newspaper-o' aria-hidden='true'></i> Berita</a>
									  <a href='" . BASE_URL . "logout.php'> <i class='fa fa-sign-out' aria-hidden='true' ></i> Logout</a></div>";
					} else {
						echo "<a href='" . BASE_URL . "index.php?page=login'>Login </a>
									 <a href='" . BASE_URL . "index.php?page=register'>Register </a>
									 <a href='" . BASE_URL . "index.php?page=berita'> Berita</a>";

					}
					?>
				</div>

				<a href="<?php echo BASE_URL . "index.php?page=keranjang"; ?>" id="button-keranjang">
				<i class="fa fa-suitcase" aria-hidden="true" style="font-size: 21px; color: white;"></i>
					<?php
					if ($totalBarang != 0) {
						echo "<span class='total-barang'>$totalBarang</span>";
					}
					?>
				</a>
			</div>
		</div>
		<div class="update-notification2" id="updateNotification2">
			<i class="fa fa-check-circle" aria-hidden="true"></i>
			<!--<span id="updateText">Web telah diupdate. Lihat update</span>-->
			<span id="updateText">Web telah diupdate. <a href="index.php?page=update"
					style="color: #FDE; text-decoration: underline;">Lihat update</a></span>
			<span class="close-button" onclick="closeNotification3()"><i class="fa fa-times"
					aria-hidden="true"></i></span>
		</div>
		<div id="content">
			<div id="snackbar">suksseess</div>
			<?php
			$filename = "$page.php";

			if (file_exists($filename)) {
				include_once($filename);
			} else {
				include_once("main.php");
			}
			?>

		</div>

		<div id="footer">
			<!-- <button onclick="showSnak()">Show Snackbar</button> -->
			<p>copyright 2023 Gemilang Travel</p>
			<!-- <button id="statusButton">Cek Status Pesanan</button>
					<button id="newsButton">Lihat Berita Terbaru</button> -->
		</div>

	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
	<script src="js/notip.js"></script>
	<script>
		// Fungsi untuk menampilkan div
		function showNotification3() {
			document.getElementById('updateNotification2').style.display = 'block';
		}

		// Fungsi untuk menghilangkan div
		function closeNotification3() {
			document.getElementById('updateNotification2').style.display = 'none';
			// Simpan informasi bahwa notifikasi telah ditutup di local storage
			localStorage.setItem('notificationClosed3', 'true');
		}

		// Periksa apakah notifikasi harus ditampilkan saat halaman dimuat
		window.onload = function () {
			var notificationClosed3 = localStorage.getItem('notificationClosed3');
			if (!notificationClosed3) {
				showNotification3();
			}
		}
	</script>
	
</body>
<style>
	img[alt="www.000webhost.com"] {
		display: none;
	}
</style>

</html>