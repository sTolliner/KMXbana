<?php 
//Set the session timeout for 12 hours

$timeout = 43200;

//Set the maxlifetime of the session

ini_set( "session.gc_maxlifetime", $timeout );

//Set the cookie lifetime of the session

ini_set( "session.cookie_lifetime", $timeout );

session_start();?>
<!doctype html>
<?php
include 'conn.php';
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	echo("<script> alert ('Please fill both the username and password fields!');</script>");
	exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $link->prepare('SELECT fname, lname, password FROM accounts WHERE id = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('i', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	
if ($stmt->num_rows > 0) {
	$stmt->bind_result($fname, $lname, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['id'] = $_POST['username'];
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		echo("<script> alert ('Välkommen   $fname $lname  !');</script>");
		$stmt->close();?> 
<script>window.location.href = 'main.html';</script><?php
		
	} else {
		// Incorrect password
		echo("<script> alert ('Inkorrekt id och/eller lösenord!');</script>");
	}
} else {
	// Incorrect username
	echo("<script> alert ('Ingen användare har detta id!');</script>");
}

	$stmt->close();
} else{
	echo("<script> alert ('Failed at link prepare');</script>");
}

?>


