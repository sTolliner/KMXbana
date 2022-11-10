<?php session_start(); ?>
<!doctype html>
<?php include('conn.php')?>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<?php if ($_SESSION['loggedin'] == TRUE){?>
<title>Lista incheckade</title>
</head>

<body>
<div class="containercheckinform">
	<img id="header" src="bilder/header-kmx.jpg" alt="header">
		<a class="startbtn" href="main.html"><i class="fas fa-home"></i></a>
   		<a style="float: right;" class="startbtn" href="logout.php"><i class="fas fa-door-closed"></i></a>
		<h2 style="margin-top: 10px; text-align: center; color: white;">Incheckade just nu</h2>

	<?php
	$query = mysqli_query($link,("SELECT * FROM `checkedin` order by id asc"));while($row = mysqli_fetch_assoc($query)): ?>
	
	<br>
	<div class="infobox">
	<strong>ID: </strong><?= $row['id']?><br>
	<Strong>Namn: </Strong><?= $row['fname']?> <?= $row['lname']?><br>
	<strong>CC: </strong><?= $row['cc']?><br>
	<strong>Regnr: </strong><?= $row['regnr']?><br>
	<strong>Klubb: </strong><?= $row['club']?><br>
	<strong>Medlemskort: </strong><?= $row['memcard']?><br>
	<strong>Betalning</strong> <?= $row['payment']?> Kr <?= $row['paymethod']?> <br>
	<strong>Incheckning: </strong><?= $row['checkintime']?>
	</div>
	<?php endwhile ?>
</body><?php }?>
</html>