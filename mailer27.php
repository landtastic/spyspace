<?php
include 'db.php';

//test
//$sql = 'SELECT * FROM `users` WHERE `email` LIKE CONVERT(_utf8 \'%@l4nd.com\' USING latin1) COLLATE latin1_swedish_ci';

$sql = "SELECT ssusername, email, password, subscribed FROM users WHERE subscribed > 0 ORDER BY date_registered ASC";

$result = mysql_query($sql);

if ($HTTP_POST_VARS['subm']) {

	if ($result){
		while ($userdata = mysql_fetch_object($result)) {
			$ssusername = $userdata -> ssusername;
			$email = $userdata -> email;
			$password = $userdata -> password;
			$subscribed = $userdata -> subscribed;
		
			echo("$email,");
			
$message = "
hey, spyspace is working again.  remember spyspace?  anyway, because you donated last time, i'd like to invite you on over before i open up registration and the server explodes, or the code gets blocked, or whatever.  you can use your old username ($ssusername) and password ($password).  

get the new code into your profile as soon as possible, available here:  http://spyspace.standoffish.com/instructions.php?ssusername=$ssusername

once it's in your profile and working, try not to update that section of your profile to reduce the chance of it being filtered.

once again, thank you for donating, and welcome to the spyspace 2.0 elite beta squadron.

<3 spyspace
";
			
			mail( $email, "shhhhh... spyspace 2.0 beta", $message, "From: spyspace@gmail.com", '-fspyspace@gmail.com' );
		}
	}
	else {
		die( "ERROR: " . mysql_error() );
	}

}
?>
		<form name="go" method="post" action="mailer27.php">
			<input name="subm" type="submit" value="   LETS DO THIS   ">
		</form>	