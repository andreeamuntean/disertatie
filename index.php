<?php include('db.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Mediclean</title>

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
		background: #0e4d92;
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
		background:#FFF;
		margin-left: 10px;
		margin-top: 10px;
		padding: 10px;
		border-radius: 10px;
	}
	.meniu a:hover{box-shadow: 0 0 11px rgba(33,33,33,.2); }
	.middle .banner{
		width: 600px;
		background-image: url("images/try.png");
		height: 428px;
		background-size:100% 100%;
		padding-top: 100px;
		padding-left: 600px;
	}

	.card{
		width: 450px; 
		min-height: 300px; 
		padding: 10px; 
		border-radius: 20px; 
		background: #FFA500; 
		text-align: center;
		margin-left:45px; 
		
	}

	.card_princ{
		width: 500px; 
		min-height: 300px; 
		padding: 20px; 
		border-radius: 10px; 
		background: #0e4d92; 
		text-align: center; 
		color:#FFFFFF;
	}


	.card_princ:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 40px 0 rgba(24, 115, 141, 0.8);
        z-index: 3;
        border-color: #007bff !important;
    }

</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
	<div style="width: 100%; background: #0e4d92;">
		<div class="header">
			<div class="logo"><a href="index.php"><img src="images/Untitled-2 1.png" height="80"></a>

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
					<a href="index.php">Welcome</a>
				<?php break; case 'access_doc': ?>
					<a href="logout.php">Logout</a>
					<a href="contact.php">Contact</a>
					<a href="doctor.php">My account</a>
					<a href="index.php">How it works</a>
				<?php break; ?>
				<?php } } else { ?>
					<a href="contact.php">Contact</a>
					<a href="login.php">
	
						Login | Register
				
					</a>
					<a href="service.php">Services</a>
					<a href="appoint.php">Appointment</a>
					<a href="index.php">Welcome</a>
				<?php } ?>
				
				
			</div>
		</div>
	</div>
	<div class="middle">
		<div class="banner">
			<!-- <div style="width: 540px; min-height: 300px;"> -->
			<div class="card_princ">
				Welcome to our website! We hope you are well and Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
				 sunt in culpa qui officia deserunt mollit anim id est laborum.
				 orem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:
				“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn't distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.

			</div>
			
		</div>
		<div style="background: #def2f1; padding: 10px;">
			<div style="width: 1180; overflow: auto; margin-top: 30px; margin-top: 30px;">
				<div style="float: left; width: 570px; padding: 10px;">
					<div style="text-align: center; margin-top: 25px; margin-bottom: 25px; overflow: auto">
						<div style="float: left; width: 50%;"><img src="images/doctor 1.png" width="150" margin="auto"></div>
						<div style="float: left; width: 40%; height: 70px; margin-top: 80px;"><h1 style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFA500">If you are a doctor</h1></div>
					</div>
				</div>
				<div style="float: left; width: 569px; border-left: 1px solid #FFA500; padding: 10px; overflow: auto;">
				<div class="card">		
						<ul><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF">You have to <a href="login.php">register/login</a> as a doctor</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFF">A virtual agenda right in front of you.</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFF">You can update your schedule anytime</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFF">See when patients made an appointment, a short description of the issue</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFF">Cancel an appointment or making an appointment on your time slot</li><br>
						</ul>
					</div>
				</div>
			</div>
			<div style="width: 1180; overflow: auto; margin-top: 30px; margin-top: 30px;">
				<div style="float: left; width: 570px; padding: 10px;">
					<div style="text-align: center; margin-top: 25px; margin-bottom: 25px; overflow: auto">
						<div style="float: left; width: 50%;"><img src="images/patient 1.png" height="175.14"></div>
						<div style="float: left; width: 40%; height: 70px; margin-top: 80px;"><h1 style="font-family:Georgia, 'Times New Roman', Times, serif; color:#3A8490">If you are a patient</h1></div>
					</div>
				</div>
				<div style="float: left; width: 569px; border-left: 1px solid #FFA500; padding: 10px; overflow: auto;">
				<div class="card">
						<ul><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF">You have to <a href="login.php">register/login</a> as a doctor</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF">A virtual agenda right in front of you.</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF">You can update your schedule anytime</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF">See when patients made an appointment, a short description of the issue</li><br>
							<li style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF">Cancel an appointment or making an appointment on your time slot</li><br>
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

		<div style="margin: auto; width: 1180px; height: auto; padding: 20px; "><h1 style="font-family:Georgia, 'Times New Roman', Times, serif; color:#FFFFFF; text-align:center">CONTACT</h1> <br> <br>
		<div style="float: left; width: 380px; margin-right: 20px; margin-bottom: 25px; overflow: auto;">
		<i class="fas fa-map-marker-alt"><h2>Address</h2></i>
		<address>Crizantemelor Street, no. 123</address>
		<address>Timisoara</address>
		</div>

		<div style="float: left; width: 380px; overflow: auto;">
		<i class="fas fa-phone-alt"><h2>Phone</h2></i> 
		<p>+40 722 950 010</p>
		</div>

		<div style="float: left; width: 380px; overflow: auto;">
		<i class="fas fa-envelope"><h2>Email</h2></i>
			<p>safemed@gmail.com</p>
		</div>
	</div>
</body>
</html>