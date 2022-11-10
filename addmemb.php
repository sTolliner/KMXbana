<?php session_start(); ?>
<?php include 'conn.php';?> 

<?php 
$password = $_POST['password'];
$zero = 0;
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$club = $_POST['club'];
$mail = $_POST['mail'];
$telnr = $_POST['telnr'];
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO accounts (id, fname, lname, club, mail, telnr, password, memcard, resetcode, resetvalid) VALUES 

('$id', '$fname', '$lname', '$club', '$mail', '$telnr', '$hashedpassword', '$zero', '$zero', '$zero')"; 

mysqli_query($link, $sql) or die ("<script> alert ('Uppdateringen misslyckades, detta id är nog redan använt'); </script>"); 

echo "<script> alert ('Du har registrerat dig!');</script>" ;


?> 
<script>
		
             window.location.href = 'main.html';
     </script>