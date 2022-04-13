<?php
include('db.php');
if(isset($_POST['reg_pac'])){ echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=reg_pac.php">'; }
if(isset($_POST['reg_doc'])){ echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=reg_doc.php">'; }
if(isset($_POST['trimite'])){
	$rez = mysqli_query($conn, "INSERT INTO pacienti (name, email, pass, tel, gen, varsta) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".md5($_POST['pass'])."', '".$_POST['tel']."', '".$_POST['gen']."', '".$_POST['varsta']."')") or die (mysqli_error($conn));
	if($rez) {
		$error = "<div style='background:green; color:#FFFFFF; font-weight:bold;'>S-a salvat cu succes</div>";
		echo '<META HTTP-EQUIV=Refresh CONTENT="2; URL=login.php">';
	}
} else { $error = "&nbsp;"; }
?>
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
		<div class="reg">
			<p><strong><h3>Register as a patient</h3></strong></p><br><br>
			<form action="reg_pac.php" method="post" enctype="multipart/form-data">
					<input type="text" name="name" id="name" placeholder="First name and Last name" class="input"><br><br><br>
					<input type="text" name="email" id="email" placeholder="E-mail" class="input"><br><br><br>
					<input type="password" name="pass" id="pass" placeholder="Password" class="input"><br><br><br>
					<input type="text" name="tel" id="tel" placeholder="Telefon" class="input"><br><br><br>
					Genul <input type="radio" name="gen" id="f" value="0"> Feminin&nbsp;&nbsp;<input type="radio" name="gen" id="m" value="1"> Masculin<br><br><br>
					<input type="text" name="varsta" id="varsta" placeholder="varsta" class="input"><br><br><br><br><br>
					<?php echo $error; ?>
					<input type="submit" name="trimite" id="trimite" value="Register" class="search"><br><br><br>
					
				</form>
		</div>		
	</div>
	<div class="footer">
		<div style="margin: auto; width: 1180px; height: 80px; padding: 10px;">contact
		</div>
	</div>
</body>
</html>