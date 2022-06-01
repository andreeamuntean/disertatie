<?php include('db.php');
include("functii.php");
e_admin_doc();
?>
<?php
	$sel = mysqli_query($conn, "select * from doctor inner join depart on depart.id = doctor.depart where doctor.id = '".$_SESSION['id_doctor']."'") or die (mysqli_error($conn));
	$rez = mysqli_fetch_row($sel);
	$sel_prog = mysqli_query($conn, "select * from programari where  id_doctor = '".$_SESSION['id_doctor']."'") or die (mysqli_error($conn));
	$rez_prog = mysqli_fetch_row($sel_prog);
	
	$list_ora = array("8:00", "8:20", "8:40", "9:00", "9:20", "9:40", "10:00", "10:20", "10:40", "11:00", "11:20", "11:40", "12:00", "12:20", "12:40", "13:00", "13:20", "13:40", "14:00", "14:20", "14:40", "15:00", "15:20", "15:40", "16:00", "16:20", "16:40", "17:00", "17:20", "17:40", "18:00", "18:20", "18:40", "19:00", "19:20", "19:40");
?>
<?php 
 if(isset($_POST['prog'])){
	 $ins = mysqli_query($conn, "insert into programari (id_doctor, id_depart, id_pacient, data, ora, description) values ('".$_SESSION['id_doctor']."', '".$_POST['id_depart']."', '".$_POST['id_pacient']."', '".$_POST['date']."', '".$_POST['ora']."', '".$_POST['description']."')") or die (mysqli_error($conn));
	 if($ins) {
		$error = "<div style='background:green; color:#FFFFFF; font-weight:bold;'>S-a salvat cu succes</div>";
		echo '<META HTTP-EQUIV=Refresh CONTENT="2; URL=doctor.php?date='.date('Y-m-d').'">';
	}
 }
?>
<?php
// Set your timezone
date_default_timezone_set('Europe/Bucharest');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = substr($_GET['ym'],0 ,7);
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('Y / m', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
     
    if ($today == $date) {
        $week .= '<td class="today"><a href="?ym='.$ym.'-'.$day.'">' . $day.'</a>';
    } else {
		$week .= '<td><a href="?ym='.$ym.'-'.$day.'">' . $day.'</a>';
    }
    $week .= '</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
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
	
	.container {
            font-family: 'Noto Sans', sans-serif;
            margin: auto;
			background: #FFF;
			width: 700px;
        }
        h3 {
            margin-bottom: 30px;
        }
        .container table th {
            width: 100px;
			height: 60px;
            text-align: center;
        }
        td {
            width: 100px;
			height: 60px;
            text-align: center;
        }
	td a{
		text-decoration: none;
		color: black;
	}
        .today {
            background: orange;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            color: red;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }
	td:nth-of-type(1) a {
		color: red;
		text-decoration: none;
	}
	td:nth-of-type(7) a{
		color: blue;
		text-decoration: none;
	}
	.link_prev{
		display: block;
		padding: 10px;
		width: 78px;
		text-decoration: none;
		color: #000;
		border: 1px solid #A9A9A9;
	}
	.link_prev:hover{
		box-shadow: 0 0 11px rgba(33,33,33,.2);
	}
	.link_next{
		display: block;
		padding: 10px;
		width: 78px;
		text-decoration: none;
		color: #000;
		border: 1px solid #A9A9A9;
	}
	.link_next:hover{
		box-shadow: 0 0 11px rgba(33,33,33,.2);
	}
	
</style>
</head>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<body>
	<div style="width: 100%; background: #e1f6fb;">
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
		<?php if(isset($_GET['date'])){
				?><form action="doctor.php?date=<?php echo $_GET['date']; ?>" method="post" enctype="multipart/form-data"><?php 
		} else {
			?><form action="doctor.php?date=<?php echo $_GET['ym']; ?>" method="post" enctype="multipart/form-data"><?php 
		} ?>
		
		<div style=" margin-bottom: 30px; margin-left: 50px; width: 1000px; overflow: auto; padding: 20px 40px; ">
				<div style="float: left; width: 100px;">
					<img src="images/doctor 1.png" width="100">
				</div>
				<div style="float: left; width: 720px; padding-left: 30px; padding-top: 20px; height: 96.76px;">
					<strong>Doctor: </strong><?php echo $rez[1]; ?><br><input type="hidden" name="id_doctor" id="id_doctor" value="<?php echo $rez[0]; ?>">
					<strong>Clinic: </strong><?php echo $rez[3]; ?><br>
					<strong>Adress: </strong><?php echo $rez[8]; ?><br>
					<strong>Department: </strong><?php echo $rez[10]; ?><br><input type="hidden" name="id_depart" id="id_depart" value="<?php echo $rez[9]; ?>">
					<strong>Phone: </strong><?php echo $rez[6]; ?><br>
				</div>
				<div style="float: left; width: 150px; height: 76.76px; padding-top: 38.38px; text-align: center;">
					
				</div>
		</div>
		<div style=" margin-bottom: 30px; margin-left: 50px; width: 1000px; overflow: auto; padding: 20px 40px; ">
			<h3>Appointments</h3>
			<div style="overflow: auto; background: #D8D8D8;">
				<div style="float: left; width: 200px;">Department</div>
				<div style="float: left; width: 200px;">Patient First and Last Name</div>
				<div style="float: left; width: 200px;">Consultation Date</div>
				<div style="float: left; width: 200px;">Consultation Hour</div>
				<div style="float: left; width: 200px;">Symptoms</div>
			</div>
			<?php 
				$sel = mysqli_query($conn, "select * from programari where id_doctor = '".$_SESSION['id_doctor']."' and data >= '".date('Y-m-d')."'") or die (mysqli_error($conn));
				while($rez = mysqli_fetch_row($sel)) {
					$sel_pac = mysqli_query($conn, "select * from pacienti where id = '".$rez[3]."'") or die (mysqli_error($conn)); $rez_pac = mysqli_fetch_row($sel_pac);
					$sel_dep = mysqli_query($conn, "select * from depart where id = '".$rez[2]."'") or die (mysqli_error($conn)); $rez_dep = mysqli_fetch_row($sel_dep); ?>
					<div style="overflow: auto;">
						<div style="float: left; width: 200px;"><?php echo $rez_dep[1]; ?></div>
						<div style="float: left; width: 200px;"><?php if(isset($rez_pac[1])) { echo $rez_pac[1]; } else { echo "&nbsp;"; }?></div>
						<div style="float: left; width: 200px;"><?php echo $rez[4]; ?></div>
						<div style="float: left; width: 200px;"><?php echo $rez[5]; ?></div>
						<div style="float: left; width: 200px;"><?php echo $rez[6]; ?></div>
					</div>
			<?php }	?>
		</div>
		<div style="background:#D2F4FD; margin-bottom: 30px; margin-left: 50px; width: 1000px; overflow: auto; padding: 20px 40px; ">
			
			<div class="container">
				<div style="width: 100%; background: #396cf0; overflow: auto; text-align: center; color: #FFF; margin-bottom: 30px;">
					SELECT YOUR DATE
					<?php if(isset($_GET['date'])){
						?><input type="hidden" name="date" id="date" value="<?php echo $_GET['date']; ?>"><?php 
					} else {
						?><input type="hidden" name="date" id="date" value="<?php echo $_GET['ym']; ?>"><?php 
					}
					?>
				</div>
				<div style="width: 100%; overflow: auto;">
					<div style="float: left; width: 100px; text-align: center;">
						<a href="?ym=<?php echo $prev; ?>" class="link_prev">PREV</a>
					</div>
					<div style="float: left; width: 500px; text-align: center;">
						<?php echo $html_title; ?>
					</div>
					<div style="float: left; width: 100px; text-align: center;">
						<a href="?ym=<?php echo $next; ?>" class="link_next">NEXT</a>
					</div>
				</div>
				<div style="width: 100%; overflow: auto;">
					<table class="table table-bordered">
						<tr>
							<th>S</th>
							<th>M</th>
							<th>T</th>
							<th>W</th>
							<th>T</th>
							<th>F</th>
							<th>S</th>
						</tr>
						<?php
							foreach ($weeks as $week) {
								echo $week;
							}
						?>
					</table>
				</div>
				<div style="width: 100%; background: #396cf0; overflow: auto; text-align: center; color: #FFF; margin-bottom: 30px; margin-top: 30px;">
					SELECT TIME
				</div>
				<div>
					<div style="margin: auto; text-align: center;"><strong>Selecteaza Ora</strong>
						<select name="ora" id="ora"><option></option>
							<?php foreach($list_ora as $item){
								if(isset($_GET['date'])){
									$sel_pro = mysqli_query($conn, "select * from programari where id_depart = '".$_SESSION['depart_doctor']."' and id_doctor = '".$_SESSION['id_doctor']."' and data = '".$_GET['date']."' and ora = '".$item."'") or die (mysqli_error($conn));
									$nr = mysqli_num_rows($sel_pro);	
								} else { 
									$sel_pro = mysqli_query($conn, "select * from programari where id_depart = '".$_SESSION['depart_doctor']."' and id_doctor = '".$_SESSION['id_doctor']."' and data = '".$_GET['ym']."' and ora = '".$item."'") or die (mysqli_error($conn));
									$nr = mysqli_num_rows($sel_pro);
								}
								
								if($nr==0){
									echo "<option value='$item'>$item</option>";
								}
							} ?>
						</select>
					</div>
				</div>
				<div style="width: 100%; background: #396cf0; overflow: auto; text-align: center; color: #FFF; margin-bottom: 30px; margin-top: 30px;">
					SELECT PACIENT
				</div>
				<div>
					<div style="margin: auto; text-align: center;"><strong>Selecteaza Pacientul</strong>
						<select name="id_pacient" id="id_pacient"><option></option>
							<?php $sel_list_pac = mysqli_query($conn, "select * from pacienti ") or die (mysqli_error($conn));
								while($rez_list_pac = mysqli_fetch_row($sel_list_pac)) {
									echo "<option value='$rez_list_pac[0]'>$rez_list_pac[1]</option>";
							} ?>
						</select>
					</div>
				</div>
				<div style="width: 100%; background: #396cf0; overflow: auto; text-align: center; color: #FFF; margin-bottom: 30px; margin-top: 30px;">
					DESCRIBE HOW YOU FEEL
				</div>
				<div style="text-align: center;margin-bottom: 30px;">
					<textarea name="description" id="description" rows="10" cols="80"></textarea>
				</div>
				<div style="text-align: center;margin-bottom: 30px;">
					<button type="submit" name="prog" id="prog"?>Salveaza programarea</button>
				</div>
			</div>
		</div>
		</form>
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