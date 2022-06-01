<?php include('db.php'); ?>
<?php $mes = '';
if(isset($_POST['prog'])) { echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=prog.php?date='.date('Y-m-d').'&id_doctor='.$_POST['id_doctor'].'&id_depart='.$_POST['id_depart'].'">'; }
if(isset($_POST['log'])) { echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=login.php">'; }

if(isset($_POST['trimite'])){
	if($_POST['depart'] > 0){ 
		$sel = mysqli_query($conn, "select * from doctor inner join depart on depart.id = doctor.depart where doctor.depart = '".$_POST['depart']."' order by doctor.name asc") or die (mysqli_error($conn));
		while($rez = mysqli_fetch_row($sel)){
		 $mes = $mes.'<div style=" margin-bottom: 30px; margin-left: 50px; width: 1000px; background: #def2f1; overflow: auto; padding: 20px 40px; ">
				<div style="float: left; width: 100px;">
					<img src="images/doctor/'.$rez[7].'" width="100">
				</div>
				<div style="float: left; width: 720px; padding-left: 30px; padding-top: 20px; height: 96.76px;">
					<strong>Doctor: </strong>'.$rez[1].'<br>
					<strong>Clinic: </strong>'.$rez[3].'<br>
					<strong>Address: </strong>'.$rez[8].'<br>
					<strong>Department: </strong>'.$rez[10].'<br>
					<strong>Phone: </strong>'.$rez[6].'<br>
				</div>
				<div style="float: left; width: 150px; height: 76.76px; padding-top: 38.38px; text-align: center;">
					<form action="appoint.php" method="post">
						<input type="hidden" name="id_doctor" id="id_doctor" value="'.$rez[0].'">
						<input type="hidden" name="id_depart" id="id_depart" value="'.$rez[9].'">';
			if(isset($_SESSION['auth']) == 'access'){
				$mes = $mes.'<button type="submit" name="prog" style="height: 40px; border-radius: 5px; background: #5AEBAE;">Make an appointment</button>';
			} else {
				$mes = $mes.'<button type="submit" name="log" style="height: 40px; border-radius: 5px; background: #5AEBAE;">Login</button>';
			}
						
		 $mes = $mes.'</form>
				</div>
			</div>';
		}
	} else {
		if($_POST['doctor'] > 0){
			$sel = mysqli_query($conn, "select * from doctor inner join depart on depart.id = doctor.depart where doctor.id = '".$_POST['doctor']."' order by doctor.name asc") or die (mysqli_error($conn));	
			while($rez = mysqli_fetch_row($sel)){
		 $mes = $mes.'<div style=" margin-bottom: 30px; margin-left: 50px; width: 1000px; background: #E6F6FB; overflow: auto; padding: 20px 40px; ">
				<div style="float: left; width: 100px;">
					<img src="images/doctor/'.$rez[7].'" width="100">
				</div>
				<div style="float: left; width: 720px; padding-left: 30px; padding-top: 20px; height: 96.76px;">
					<strong>Doctor: </strong>'.$rez[1].'<br>
					<strong>Clinic: </strong>'.$rez[3].'<br>
					<strong>Address: </strong>'.$rez[8].'<br>
					<strong>Department: </strong>'.$rez[10].'<br>
					<strong>Phone: </strong>'.$rez[6].'<br>
				</div>
				<div style="float: left; width: 150px; height: 76.76px; padding-top: 38.38px; text-align: center;">
					<form action="appoint.php" method="post">
						<input type="hidden" name="id_doctor" id="id_doctor" value="'.$rez[0].'">
						<input type="hidden" name="id_depart" id="id_depart" value="'.$rez[9].'">';
			if(isset($_SESSION['auth']) == 'access'){
				$mes = $mes.'<button type="submit" name="prog" style="height: 40px; border-radius: 5px; background: #5AEBAE;">Fa o programare</button>';
			} else {
				$mes = $mes.'<button type="submit" name="log" style="height: 40px; border-radius: 5px; background: #5AEBAE;">Logheaza-te</button>';
			}
						
		 $mes = $mes.'</form>
				</div>
			</div>';
		}
		} else {
			$sel = mysqli_query($conn, "select * from doctor inner join depart on depart.id = doctor.depart order by doctor.name asc") or die (mysqli_error($conn));	
			while($rez = mysqli_fetch_row($sel)){
			 $mes = $mes.'<div style=" margin-bottom: 30px; margin-left: 50px; width: 1000px; background: #E6F6FB; overflow: auto; padding: 20px 40px; ">
				<div style="float: left; width: 100px;">
					<img src="images/doctor/'.$rez[7].'" width="100">
				</div>
				<div style="float: left; width: 720px; padding-left: 30px; padding-top: 20px; height: 96.76px;">
					<strong>Doctor: </strong>'.$rez[1].'<br>
					<strong>Clinica: </strong>'.$rez[3].'<br>
					<strong>Adresa: </strong>'.$rez[8].'<br>
					<strong>Specializarea: </strong>'.$rez[10].'<br>
					<strong>Telefon: </strong>'.$rez[6].'<br>
				</div>
				<div style="float: left; width: 150px; height: 76.76px; padding-top: 38.38px; text-align: center;">
					<form action="appoint.php" method="post">
						<input type="hidden" name="id_doctor" id="id_doctor" value="'.$rez[0].'">
						<input type="hidden" name="id_depart" id="id_depart" value="'.$rez[9].'">';
			if(isset($_SESSION['auth']) == 'access'){
				$mes = $mes.'<button type="submit" name="prog" style="height: 40px; border-radius: 5px; background: #5AEBAE;">Fa o programare</button>';
			} else {
				$mes = $mes.'<button type="submit" name="log" style="height: 40px; border-radius: 5px; background: #5AEBAE;">Logheaza-te</button>';
			}
						
		 $mes = $mes.'</form>
				</div>
			</div>';
			}
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
		background:#FFF;
		margin-left: 10px;
		margin-top: 10px;
		padding: 10px;
		border-radius: 10px;
	}
	.meniu a:hover{box-shadow: 0 0 11px rgba(33,33,33,.2); }
	.middle .banner{
		width: 500px;
		background-image: url("images/bg2.png");
		height: 428px;
		background-size:100% 100%;
		padding-top: 100px;
		padding-left: 700px;
	}
	select{
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

	.center {
		display: block;
		margin-left: auto;
		margin-right: auto;
		/* width: 50%; */
	}

	.card_l{
		float: left; 
		width: 380px; 
		margin-right: 20px; 
		overflow: auto; 
		background: #FFF; 
		text-align: center; 
		border-radius: 10px;
	}

	.card_m{
		float: left; 
		width: 380px; 
		overflow: auto; 
		background: #FFF; 
		text-align: center; 
		border-radius: 10px;
	}

	.card_m{
		float: left; width: 380px; overflow: auto; background: #FFF; text-align: center; border-radius: 10px;
	}

	.card_r{
		float: left; 
		width: 380px; 
		margin-left: 20px; 
		overflow: auto; 
		background: #FFF;
		text-align: center; 
		border-radius: 10px;
	}

	.card_l:hover{box-shadow: 0 0 11px rgba(33,33,33,.5); }
	.card_m:hover{box-shadow: 0 0 11px rgba(33,33,33,.5); }
	.card_r:hover{box-shadow: 0 0 11px rgba(33,33,33,.5); }

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
			<div style="width: 300px; min-height: 300px; padding: 20px; border-radius: 10px; background: #FFF; text-align: center">
				<p>Search a doctor, <br>Make an appointment</p>
				<form action="appoint.php" method="post" enctype="multipart/form-data">
					<select name="depart" id="depart">
						<option value="0">Select a specialization</option>
						<?php 
							$sel = mysqli_query($conn, "select * from depart") or die (mysqli_error($conn));
							while($rez = mysqli_fetch_row($sel)) {
								?><option value="<?php echo $rez[0]; ?>"><?php echo $rez[1]; ?></option><?php
							}
						?>
					</select><br><br>
					<select name="doctor" id="doctor">
						<option value="0">Select a doctor</option>
						<?php 
							$sel = mysqli_query($conn, "select * from doctor") or die (mysqli_error($conn));
							while($rez = mysqli_fetch_row($sel)) {
								?><option value="<?php echo $rez[0]; ?>"><?php echo $rez[1]; ?></option><?php
							}
						?>
					</select><br><br><br><br>
					<input type="submit" name="trimite" id="trimite" value="Search" class="search">
				</form>
			</div>
			
		</div>

		<div style="background: #def2f1; padding: 10px; overflow: auto;">
			
			<?php 
				if(isset($mes))
					if(strlen($mes) > 0){
						echo $mes;
					} else {
						if(isset($mes))
						?>
			<div style="background: #def2f1; width: 1180px; overflow: auto; margin-bottom: 20px;">
				<div class="card_l">
					<img src="images/neurology.png"; height=100px; class="center";> Neurology
					<br> Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal
				
				</div>

				<div class="card_m">
				<img src="images/cardiologie.jpg"; height=80px; class="center";>Cardiology <br> <br>
				Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal
				</div>

				<div class="card_r">
				<img src="images/pediatrics.jpg"; height=100px; class="center";>Pediatrics <br>
				Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal

				</div>
			</div>
			<div style="background: #def2f1; width: 1180px; overflow: auto; margin-bottom: 20px;">
				<div class="card_l">test1</div>
				<div class="card_m">test2</div>
				<div class="card_r">test3</div>
			</div>
				
				
	<?php	}
			?>

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