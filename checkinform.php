<?php session_start(); 
include'conn.php';?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<title>Checka in</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
	
	<?php
	
	if (!isset($_SESSION['loggedin'])) {
		?><script> alert('Du är inte inloggad!');
	window.location.href = 'index.html';</script><?php
	
}

if($stmt = $link->prepare('SELECT club, memcard FROM accounts WHERE id = ?')){
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($club, $memcard);
$stmt->fetch();
$stmt->close();
	}
	
	
	?>
	
	<div class="containercheckinform">
	<img id="header" src="bilder/header-kmx.jpg" alt="header">
		<a class="startbtn" href="main.html"><i class="fas fa-home"></i></a>
   		<a style="float: right;" class="startbtn" href="logout.php"><i class="fas fa-door-closed"></i></a>
		<h2 style="margin-top: 10px; text-align: center; color: white;">Checka in på banan</h2>

	<div class="center-center">
	<form action="checkin.php" method="post">
		<label for="cc" class="labletxt"> cc </label>
		<br>
		<input type="number" name="cc" class="inputbox">
		<br>
		<label for="regnr" class="labletxt"> Reg-nummer </label>
		<br>
		<input type="text" name="regnr" class="inputbox">
		<input type="hidden" name="club" value="<?=$club?>">
		<input type="hidden" name="memcard" value="<?=$memcard?>">
		<input type="hidden" name="id" value="<?=$_SESSION['id']?>">
		<input type="hidden" name="fname" value="<?=$_SESSION['fname']?>">
		<input type="hidden" name="lname" value="<?=$_SESSION['lname']?>">
		<?php
		if( !$memcard > 0){	
		?>
		<br>
		<label for="payment" class="labletxt"> Betalning </label>
		<br>
		<input type="number" name="payment" class="inputbox">
		<br>
		<label for="paymethod" class="labletxt"> Betalningsmetod </label>
		<br>
		<input type="text" name="paymethod" class="inputbox">
		<?php } ?>
		<br>
		<input type="submit" value="Checka in" class="subbtn">
	</form>
	</div>
	</div>
</body>
</html>