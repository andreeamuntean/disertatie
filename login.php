<?php
include("db.php");
include("functii.php");
if(isset($_POST['reg_pac'])){ echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=reg_pac.php">'; }
if(isset($_POST['reg_doc'])){ echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=reg_doc.php">'; }
if(isset($_POST['auth'])) {
	if(isset($_POST['medic']) == '1'){
		if(strlen($_POST['email'])<1) {
			$eroare = "You have to complete the email field - doctor";
		}
		else if(strlen($_POST['pass'])<1) {
			$eroare = "You have to complete the password field - doctor";
		}
		else{
		  $nume = $_POST['email'];
		  $parola = $_POST['pass'];

		  $eroare = auth_doc($nume,$parola,$conn);
		}
	} else {
		if(strlen($_POST['email'])<1) {
			$eroare = "You have to complete the email! - patient";
		}
		else if(strlen($_POST['pass'])<1) {
			$eroare = "You have to complete the password! - patient";
		}
		else{
		  $nume = $_POST['email'];
		  $parola = $_POST['pass'];

		  $eroare = auth($nume,$parola,$conn);
		}	
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Safemed</title>
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
		background: #def2f1;
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
		background: #FFF;
		margin-left: 10px;
		margin-top: 10px;
		padding: 10px;
		border-radius: 10px;
	}
	.meniu a:hover{box-shadow: 0 0 11px rgba(33,33,33,.2); }
	.middle .banner{
		width: 600px;
		background-image: url("images/bg2.png");
		height: 478px;
		background-size:100% 100%;
		padding-top: 50px;
		padding-left: 600px;
	}
	select{
		width: 270px;
		height: 40px;
		border-radius: 10px;
		background: #D2F4FD;
	}
	.input{
		width: 270px;
		height: 40px;
		border-radius: 10px;
		background: #D2F4FD;
	}
	.search{
		width: 150px;
		height: 40px;
		background: #5AEBAE;
		border-radius: 10px;
	}



	
</style>
</head>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<body>
	<div style="width: 100%; background: #def2f1;">
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
		<div class="banner">
			<div style="width: 400px; min-height: 400px; padding: 20px; border-radius: 10px; background: #FFFFFF; text-align: center">
				<p>Login</p>
				<form action="login.php" method="post" enctype="multipart/form-data">
					<input type="email" name="email" id="email" placeholder="e-mail" class="input" ><br><br>
					<input type="password" name="pass" id="pass" placeholder="Password" class="input" ><br><br>
					<input type="checkbox" name="medic" id="medic" value="1" ><label>I'm a doctor</label><br><br>
					<span style="color: red;"><?php if(isset($eroare)){ echo $eroare; } ?></span><br><br>
					<input type="submit" name="auth" id="auth" value="Login" class="search"><br><br>
					You have no account<br><br>
					<button type="submit" name="reg_pac" id="reg_pac" class="search">Register as a patient</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" name="reg_doc" id="reg_pac" class="search">Register as a doctor</button>
				</form>
			</div>
			
		</div>
		<div style="background: #def2f1; padding: 10px;">
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