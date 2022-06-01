<?php

function e_admin() {
  if(!isset($_SESSION['auth']) || $_SESSION['auth']!="access" ) {
    header("Location: loginx.php");
    exit;
}
}
function e_admin_doc() {
  if(!isset($_SESSION['auth']) || $_SESSION['auth']!="access_doc" ) {
    header("Location: loginx.php");
    exit;
}
}

function auth($u,$p, $c) {
	$p = md5($p);
	$qq = mysqli_query($c, "SELECT * FROM pacienti WHERE email='$u' AND pass='$p'");
	$nr = mysqli_num_rows($qq);
	if($nr==1) {
		$d = mysqli_fetch_assoc($qq);
		$_SESSION['auth']="access";
		$_SESSION['name_pacient']=$d['name'];
		$_SESSION['id_pacient']=$d['id'];
		
    	header("Location: pacient.php");
	} else {
  		$msg = "Patient incorect credentials";
  		return $msg;
	}
}
function auth_doc($u,$p, $c) {
	$p = md5($p);
	$qq = mysqli_query($c, "SELECT * FROM doctor WHERE email='$u' AND pass='$p'") or die(mysqli_error($c));
	$nr = mysqli_num_rows($qq);
	if($nr==1) {
		$d = mysqli_fetch_assoc($qq);
    	$_SESSION['auth']="access_doc";
		$_SESSION['name_doctor'] = $d['name'];
		$_SESSION['id_doctor'] = $d['id'];
		$_SESSION['depart_doctor'] = $d['depart'];
    	header("Location: doctor.php?date=".date('Y-m-d'));
	} else {
  		$msg = "Doctor incorrect credentials";
  		return $msg;
	}
}
?>