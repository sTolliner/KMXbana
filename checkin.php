<?php session_start(); ?>
<?php include 'conn.php';?> 

<?php 
$time = date("H:i l d/m Y ");
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cc = $_POST['cc'];
$club = $_POST['club'];
$memcard = $_POST['memcard'];
$payment = $_POST['payment'];
$paymethod = $_POST['paymethod'];
$regnr = $_POST['regnr'];
$sql = "INSERT INTO checkedin (id, fname, lname, cc, club, memcard, payment, paymethod, checkintime, regnr) VALUES 

('$id', '$fname', '$lname', '$cc', '$club', '$memcard', '$payment', '$paymethod', '$time', '$regnr')"; 

mysqli_query($link, $sql) or die ("<script> alert ('Uppdateringen misslyckades, du är redan incheckad');</script>"); 

echo "<script> alert ('Du har checkat in!');</script>" ;
?> 
<script>window.location.href = 'main.html';</script>