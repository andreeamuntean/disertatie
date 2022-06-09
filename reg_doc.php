<?php

include('db.php');
if(isset($_POST['trimite'])){ 
	$rez = mysqli_query($conn, "INSERT INTO doctor (name, depart, clinic, email, pass, tel, file, adresa) VALUES ('".$_POST['name']."', '".$_POST['depart']."', '".$_POST['clinic']."', '".$_POST['email']."', '".md5($_POST['pass'])."', '".$_POST['tel']."', '".$_FILES['files']['name']."', '".$_POST['address']."')") or die (mysqli_error($conn));
	if($rez) {
		if($_FILES['files']['type'] == 'image/jpg' || $_FILES['files']['type'] == 'image/JPG'){
			move_uploaded_file($_FILES['files']['tmp_name'], "images/doctor/".$_FILES['files']['name']);
			$error = "<div style='background:green; color:#FFFFFF; font-weight:bold;'>Successfully registered</div>";
			echo '<META HTTP-EQUIV=Refresh CONTENT="2; URL=login.php">';
		}
	}
} else { $error = "&nbsp"; }
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
		/* background: #FFF; */
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
		background-image: url("images/login.png");
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
		width: 300px;
		height: 30px;
		border-radius: 5px;
		background: #FFF;
	}
	.search{
		width: 150px;
		height: 40px;
		background: #5AEBAE;
		border-radius: 10px;
	}
	.reg{
		margin-left: 350px;
		margin-top: 150px;
		margin-bottom: 150px;
		width: 500px; 
		min-height: 400px; 
		padding: 20px; 
		border-radius: 10px; 
		background: #D2F4FD; 
		text-align: center
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
		<div class="reg">
			<p><strong><h3>Register as a doctor</h3></strong></p><br><br>
			<form action="reg_doc.php" method="post" enctype="multipart/form-data">
					<input type="text" name="name" id="name" placeholder="First name and Last name" class="input"><br><br><br>
					<select name="depart" id="depart" class="input">
						<option>Select the department</option>
						<?php 
							$sel = mysqli_query($conn, "select * from depart") or die (mysqli_error($conn));
							while($rez = mysqli_fetch_row($sel)) {
								?><option value="<?php echo $rez[0]; ?>"><?php echo $rez[1]; ?></option><?php
							}
						?>
					</select><br><br><br>

					<!-- <input type="text" name="clinica" id="clinica" placeholder="clinica" class="input" required><br><br><br> -->
					<select name="clinic" id="clinic" class="input">
						<option>Select the Clinic</option>
						<?php 
							$sel = mysqli_query($conn, "select * from clinic") or die (mysqli_error($conn));
							while($rez = mysqli_fetch_row($sel)) {
								?><option value="<?php echo $rez[0]; ?>"><?php echo $rez[1]; ?></option><?php
							}
						?>
					</select><br><br><br>

					<input type="email" name="email" id="email" placeholder="E-mail" class="input" required><br><br><br>
					<input type="password" name="pass" id="pass" placeholder="Password" class="input" required><br><br><br>
					<input type="tel" name="tel" id="tel" placeholder="Phone" class="input" required><br><br><br>
					<input type="text" name="address" id="address" placeholder="Address" class="input" required><br><br><br>
					<input type="file" name="files" id="files" placeholder="Photo" class="input"><br><br><br>
					<?php echo $error; ?>
					<input type="submit" name="trimite" id="trimite" value="Register" class="search"><br><br><br>
					
				</form>
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