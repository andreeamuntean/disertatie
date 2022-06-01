<?php include("db.php");

include("functii.php");
e_admin();
if(isset($_POST['upload'])){
	move_uploaded_file($_FILES['files']['tmp_name'], "doc/".$_FILES['files']['name']);
	$ins = mysqli_query($conn, "insert into files (desc_file, file, id_pacient) values ('".$_POST['name_file']."', '".$_FILES['files']['name']."', '".$_SESSION['id_pacient']."')") or die (mysqli_error($conn));
	 if($ins) {
		$error = "<div style='background:green; color:#FFFFFF; font-weight:bold;'>Successfully saved</div>";
		#echo '<META HTTP-EQUIV=Refresh CONTENT="2; URL=pacient.php">';
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
		background: #FFF;
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
		<div style="margin-left: 50px; width: 1000px; overflow: auto; padding: 20px 40px;">
			<div style="float: left; width: 100px;">
				<img src="images/doctor 1.png" width="100">
			</div>
			<div style="float: left; width: 720px; padding-left: 30px; padding-top: 20px; height: 96.76px;">
				<?php $sel_pac = mysqli_query($conn, "select * from pacienti where id = '".$_SESSION['id_pacient']."'") or die (mysqli_error($conn)); $rez_pac = mysqli_fetch_row($sel_pac); ?>
				<strong>Patient - First Name, Last Name: </strong><?php echo $rez_pac[1]; ?><br>
				<strong>Age: </strong><?php echo $rez_pac[6]; ?><br>
				<strong>Gender: </strong><?php if($rez_pac[5] == '1'){ echo "Masculin"; } else { echo "Feminin"; } ?><br>
				<strong>E-mail: </strong><?php echo $rez_pac[2]; ?><br>
				<strong>Phone: </strong><?php echo $rez_pac[4]; ?><br>
			</div>
			<div style="float: left; width: 150px; height: 76.76px; padding-top: 38.38px; text-align: center;">
			</div>
		</div>
		<div style=" margin-bottom: 30px; margin-left: 50px; width: 1080px; overflow: auto; padding: 20px 0px;">
			<form action="pacient.php" method="post" enctype="multipart/form-data">
				<input type="file" name="files" id="files">&nbsp;File description:&nbsp;<input type="text" name="name_file" id="name_file">&nbsp;&nbsp;&nbsp;<button type="submit" name="upload" id="upload">Upload file</button>
			</form>
		</div>
		<div style=" margin-bottom: 30px; margin-left: 50px; width: 1080px; overflow: auto; padding: 20px 0px;">
			<h3>Files</h3>
			<table style="width: 100%">
				<!-- <tr color=#def2f1 text-align="center"> -->
					<td>Name file</td>
					<td>Description</td>
					<td>Open</td>
				</tr>
				<?php 
					$sel = mysqli_query($conn, "select * from files where id_pacient = '".$_SESSION['id_pacient']."'") or die (mysqli_error($conn));
					while($rez = mysqli_fetch_row($sel)) { ?>
						<tr>
							<td><?php echo $rez[2]; ?></td>
							<td><?php echo $rez[1]; ?></td>
							<td><a href="doc/<?php echo $rez[2]; ?>"><?php echo $rez[2]; ?></a></td>
						</tr>
				<?php }?>
			</table>
		
		</div>
		<div style=" margin-bottom: 30px; margin-left: 50px; width: 1080px; overflow: auto; padding: 20px 0px;">
			<div style="float: left; background: #3E91FF; margin-right: 20px; width: 520px; text-align: center; color: #FFFFFF;">
				<h2>My future appointments</h2>
				<ul>
				<?php 
					$sel = mysqli_query($conn, "select * from programari where id_pacient = '".$_SESSION['id_pacient']."' and data >= '".date('Y-m-d')."'") or die (mysqli_error($conn));
					while($rez = mysqli_fetch_row($sel)) {
						$sel_doc = mysqli_query($conn, "select * from doctor where id = '".$rez[1]."'") or die (mysqli_error($conn)); $rez_doc = mysqli_fetch_row($sel_doc);
						$sel_dep = mysqli_query($conn, "select * from depart where id = '".$rez[2]."'") or die (mysqli_error($conn)); $rez_dep = mysqli_fetch_row($sel_dep);
						echo '<li>'.$rez_doc[1].' - '.$rez_dep[1].' - '.$rez[4].' - '.$rez[5]."</li>";
					}
				?>
				</ul>
			</div>
			<div style="float: left; background: #3E9196; margin-left: 20px; width: 520px; text-align: center; color: #FFFFFF;">
				<h2>Previous appointments</h2>
				<ul>
				<?php 
					$sel = mysqli_query($conn, "select * from programari where id_pacient = '".$_SESSION['id_pacient']."' and data < '".date('Y-m-d')."'") or die (mysqli_error($conn));
					while($rez = mysqli_fetch_row($sel)) {
						$sel_doc = mysqli_query($conn, "select * from doctor where id = '".$rez[1]."'") or die (mysqli_error($conn)); $rez_doc = mysqli_fetch_row($sel_doc);
						$sel_dep = mysqli_query($conn, "select * from depart where id = '".$rez[2]."'") or die (mysqli_error($conn)); $rez_dep = mysqli_fetch_row($sel_dep);
						echo '<li>'.$rez_doc[1].' - '.$rez_dep[1].' - '.$rez[4].' - '.$rez[5]."</li>";
					}
				?>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer">
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