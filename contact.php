<?php include('db.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Medicelan</title>
<style>
	body{
		margin: 0;
		background: #FFFFFF;
	}
	.header{
		width: 1200px;
		height: 85px;
		margin: auto;
		overflow: auto;
		background: #FFA500;
	}
	.header .logo{
		padding-left: 10px;
	}
	.middle{
		width: 1200px;
		margin: auto;
		overflow: auto;
		background: #FFA500;
	}
	.footer{
		width: 100%;
		margin: auto;
		overflow: auto;
		background:#FFA500;
	}
	.logo{
		float: left;
	}
	.meniu{
		float: left;
		width: 90%;
		height: 65px;
		padding: 10px;
	}
	.meniu a {
		display: block;
		text-decoration: none;
		color: #000;
		float: right;
		background:#FFFFFF;
		margin-left: 10px;
		margin-top: 10px;
		padding: 10px;
		border-radius: 10px;
	}
	.meniu a:hover{box-shadow: 0 0 11px rgba(33,33,33,.2); }
	.middle .banner{
		width: 600px;
		background-image: url("images/WG4Hvm 1.png");
		height: 428px;
		background-size:100% 100%;
		padding-top: 100px;
		padding-left: 600px;
	}
</style>
</head>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<body>
	<!-- <div style="width: 100%; background-image:url(https://goo.gl/maps/EdtLGuLcz6NDo9ww5)"> -->
	<div style="width: 100%; background: #FFA500;">
		<div class="header">
			<div class="logo"><a href="index.php"><img src="images/Untitled-2 1.png" height="80"></a>

			</div>
			<div class="meniu">
				<?php if(isset($_SESSION['auth'])){ ?>
				<?php switch($_SESSION['auth']){ 
					case 'access': ?>
					<a href="logout.php">Logout</a>
					<a href="contact.php">Contact</a>
					<a href="pacient.php">My account</a>
					<a href="service.php">Services and prices</a>
					<a href="appoint.php">Make an appointment</a>
					<a href="index.php">How it works</a>
				<?php break; case 'access_doc': ?>
					<a href="logout.php">Logout</a>
					<a href="contact.php">Contact</a>
					<a href="doctor.php">My account</a>
					<a href="index.php">How it works</a>
				<?php break; ?>
				<?php } } else { ?>
					<a href="contact.php">Contact</a>
					<a href="login.php">Login / Register</a>
					<a href="service.php">Services and prices</a>
					<a href="appoint.php">Make an appointment</a>
					<a href="index.php">How it works</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="middle">
		
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10477134.798233375!2d-3.3654035000000504!3d50.12570100000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470bed127ff5b569%3A0xc0dcd36d9a1f4f53!2sSAFEMED%20Medical%20Devices%20Ltd.!5e0!3m2!1sro!2sro!4v1652249550667!5m2!1sro!2sro" 
				width="1200"
				height="450"; 
				style="border:0;" 
				allowfullscreen="" 
				loading="lazy" 
				referrerpolicy="no-referrer-when-downgrade"
				></iframe>
		<div style="margin: auto; width: 1100px; height: auto; padding: 20px; ">CONTACT <br> <br>
			<div style="float: left; width: 350px; margin-right: 20px; margin-bottom: 25px; overflow: auto;">
			<i class="fas fa-map-marker-alt">Address</i>
			<p> Ciocarliei Street, no. 11 </p>
			<p>Timisoara</p>
			</div>

			<div style="float: left; width: 350px; overflow: auto;">
			<i class="fas fa-phone-alt">Phone</i> 
			<p>+40 748 951 427</p>
			</div>

			<div style="float: left; width: 350px; overflow: auto;">
			<i class="fas fa-envelope">Email</i>
				<p>mediclean@gmail.com</p>
			</div>


		</div>
	<!-- <div class="footer">
		<div></div>
		<div style="margin: auto; width: 1180px; height: auto; padding: 20px; ">CONTACT <br> <br>
		<div style="float: left; width: 380px; margin-right: 20px; margin-bottom: 25px; overflow: auto;">
		<i class="fas fa-map-marker-alt">Address</i>
		<p> Crizantemelor Street, no. 123 </p>
		<p>Timisoara</p>
		</div>

		<div style="float: left; width: 380px; overflow: auto;">
		<i class="fas fa-phone-alt">Phone</i> 
		<p>+40 722 950 010</p>
		</div>

		<div style="float: left; width: 380px; overflow: auto;">
		<i class="fas fa-envelope">Email</i>
			<p>safemed@gmail.com</p>
		</div>
	</div> -->
</body>
</html>