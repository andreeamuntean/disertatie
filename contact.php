<?php include('db.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	body{
		margin: 0;
		background: #CBCBCB;
	}
	.header{
		width: 1200px;
		height: 85px;
		margin: auto;
		overflow: auto;
		background: #e1f6fb;
	}
	.header .logo{
		padding-left: 10px;
	}
	.middle{
		width: 1200px;
		margin: auto;
		overflow: auto;
		background: #FFF;
	}
	.footer{
		width: 100%;
		margin: auto;
		overflow: auto;
		background:#eaf2fb;
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

<body>
	<div style="width: 100%; background: #e1f6fb;">
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
		contact
	</div>
	<div class="footer">
		<div style="margin: auto; width: 1180px; height: 80px; padding: 10px;">contact
		</div>
	</div>
</body>
</html>