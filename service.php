<?php include('db.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Safemed</title>
<style>
	body{
		margin: 0;
		background: #ffffff;
	}
	.header{
		width: 1200px;
		height: 85px;
		margin: auto;
		overflow: auto;
		background: #def2f1;
	}
	.header .logo{
		padding-left: 10px;
	}
	.middle{
		width: 1160px;
		margin: auto;
		overflow: auto;
		background: #FFF;
		padding: 20px;
	}
	.footer{
		width: 100%;
		margin: auto;
		overflow: auto;
		background:#def2f1;
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
		background:#FFF;
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
	<div style="width: 100%; background: #def2f1;">
		<div class="header">
			<div class="logo"><a href=""><img src="images/Untitled-2 1.png" height="80"></a>

			</div>
			<div class="meniu">
				<?php if(isset($_SESSION['auth'])){ ?>
				<?php switch($_SESSION['auth']){ 
					case 'access': ?>
					<a href="logout.php">logout</a>
					<a href="contact.php">Contact</a>
					<a href="pacient.php">My account</a>
					<a href="service.php">Services and prices</a>
					<a href="appoint.php">Make an appointment</a>
					<a href="index.php">How it works</a>
				<?php break; case 'access_doc': ?>
					<a href="logout.php">logout</a>
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
		<h1>Services and prices</h1>
		<div style="width: 100%; overflow: auto; margin-bottom: 20px;">
			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" align="center">NEUROLOGIE</td>
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
				</tr>
			</table>
		</div>
		<div style="width: 100%; overflow: auto; margin-bottom: 20px;">
			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" align="center">NEUROLOGIE</td>
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
				</tr>
			</table>
		</div>

		<div style="width: 100%; overflow: auto; margin-bottom: 20px;">
			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" align="center">NEUROLOGIE</td>
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
				</tr>
			</table>
		</div>

		<div style="width: 100%; overflow: auto; margin-bottom: 20px;">
			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" align="center">NEUROLOGIE</td>
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
				</tr>
			</table>
		</div>

		<div style="width: 100%; overflow: auto; margin-bottom: 20px;">
			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" align="center">NEUROLOGIE</td>
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
				</tr>
			</table>
		</div>

		<div style="width: 100%; overflow: auto; margin-bottom: 20px;">
			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" align="center">NEUROLOGIE</td>
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
					
				</tr>

				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
					
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
					
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
					
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
					
				</tr>
			</table>
		</div>

		<div style="width: 100%; overflow: auto; margin-bottom: 20px;">
			<table style="width: 100%" border="1">
				<tr>
					<td colspan="2" align="center">NEUROLOGIE</td>
				</tr>
				<tr>
					<td>ADMINISTRARE TRATAMENT</td>
					<td>50 LEI</td>
				</tr>
			</table>
		</div>
		
	</div>
	<div class="footer">

		<div class="logo">
			<img src="images/Untitled-2 1.png" height="80" style="vertical-align:top;margin:20px 20px">
		</div>

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
	</div>
</body>
</html>