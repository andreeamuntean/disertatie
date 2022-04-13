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
		<div class="banner">
			<div style="width: 540px; min-height: 300px;">
				test de verificare
			</div>
			
		</div>
		<div style="background: #F5F5F5; padding: 10px;">
			<div style="width: 1180; overflow: auto; margin-top: 30px; margin-top: 30px;">
				<div style="float: left; width: 570px; padding: 10px;">
					<div style="text-align: center; margin-top: 25px; margin-bottom: 25px; overflow: auto">
						<div style="float: left; width: 50%;"><img src="images/doctor 1.png" width="150"></div>
						<div style="float: left; width: 40%; height: 70px; margin-top: 80px;">If you are a doctor</div>
					</div>
				</div>
				<div style="float: left; width: 569px; border-left: 1px solid #6eadb0; padding: 10px; overflow: auto;">
					<div>
						<ul><br>
							<li>You have to register/login as a doctor</li><br>
							<li>A virtual agenda right in front of you.</li><br>
							<li>You can update your schedule anytime</li><br>
							<li>See when patients made an appointment, a short description of the issue</li><br>
							<li>Cancel an appointment or making an appointment on your time slot</li><br>
						</ul>
					</div>
				</div>
			</div>
			<div style="width: 1180; overflow: auto; margin-top: 30px; margin-top: 30px;">
				<div style="float: left; width: 570px; padding: 10px;">
					<div style="text-align: center; margin-top: 25px; margin-bottom: 25px; overflow: auto">
						<div style="float: left; width: 50%;"><img src="images/patient 1.png" height="175.14"></div>
						<div style="float: left; width: 40%; height: 70px; margin-top: 80px;">If you are a doctor</div>
					</div>
				</div>
				<div style="float: left; width: 569px; border-left: 1px solid #6eadb0; padding: 10px; overflow: auto;">
					<div>
						<ul><br>
							<li>You have to register/login as a doctor</li><br>
							<li>A virtual agenda right in front of you.</li><br>
							<li>You can update your schedule anytime</li><br>
							<li>See when patients made an appointment, a short description of the issue</li><br>
							<li>Cancel an appointment or making an appointment on your time slot</li><br>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div style="margin: auto; width: 1180px; height: 80px; padding: 10px;">contact
		</div>
	</div>
</body>
</html>