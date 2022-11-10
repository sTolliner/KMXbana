<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<title>Registrera</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
	<img id="header" src="bilder/header-kmx.jpg" alt="header">
	<h2 style="margin-top: 0;">Välkommen till Karlstad MX & Enduro</h2>
    <h3 style="margin-top: 0;">Registrera dig för att komma in på sidan</h3>
    <div class="center-center" style="top: 22%;">
	<form action="addmemb.php" autocomplete="off" method="post">
		<label for="id" class="labletxt"> Licens ID</label><br>
		<input type="number" name="id" class="inputbox" style="margin-bottom: 0;" ><br>

		<label for="fname" class="labletxt">Förnamn</label><br>
		<input type="text" name="fname" class="inputbox" style="margin-bottom: 0;" ><br>

		<label for="lname" class="labletxt">Efternamn</label><br>
		<input type="text" name="lname" class="inputbox" style="margin-bottom: 0;" ><br>

		<label for="password" class="labletxt">Lösenord</label><br>
		<input type="text" name="password" class="inputbox" style="margin-bottom: 0;" ><br>

		<label for="club" class="labletxt">Klubb</label><br>
		<input type="text" name="club" class="inputbox" style="margin-bottom: 0;" ><br>

		<label for="telnr" class="labletxt">Telefonnummer</label><br>
		<input type="text" name="telnr" class="inputbox" style="margin-bottom: 0;" ><br>

		<label for="mail" class="labletxt">Mail</label><br>
		<input type="text" name="mail" class="inputbox" style="margin-bottom: 0;" ><br>

		<input type="submit" value="Registrera" class="subbtn">
	</form>
	</div>
	</div>
</body>
</html>