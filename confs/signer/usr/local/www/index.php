<?php
session_start();
/**
 * Write data to a file.
 * @param $filename  Name of the file to create.
 * @param $data  The data to write.
 * @return Number of characters written.
 * An error is raised if any of the operations fail.
 */
function file_write_string($filename, $data)
{
	$fh = fopen($filename, "w");
	if (! $fh) {
		send_error(500, "fopen failed in file_write_string()");
	}
	$rc = fwrite($fh, $data);
	if ($rc === FALSE) {
		send_error(500, "fwrite failed in file_write_string()");
	}
	if (! fclose($fh)) {
		send_error(500, "fclose failed in file_write_string()");
	}
	return $rc;
}

if  (isset($_POST['logging'])) {
	if ($_POST['username'] == "user1" && $_POST['password'] == "user1_secret") {
		$_SESSION['domain'] = "domain1.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user2" && $_POST['password']== "user2_secret") {
		$_SESSION['domain'] = "domain2.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user3" && $_POST['password']== "user3_secret") {
		$_SESSION['domain'] = "domain3.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user4" && $_POST['password']== "user4_secret") {
		$_SESSION['domain'] = "domain4.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user5" && $_POST['password']== "user5_secret") {
		$_SESSION['domain'] = "domain5.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user6" && $_POST['password']== "user6_secret") {
		$_SESSION['domain'] = "domain6.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user7" && $_POST['password']== "user7_secret") {
		$_SESSION['domain'] = "domain7.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user8" && $_POST['password']== "user8_secret") {
		$_SESSION['domain'] = "domain8.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user9" && $_POST['password']== "user9_secret") {
		$_SESSION['domain'] = "domain9.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user10" && $_POST['password'] == "user10_secret") {
		$_SESSION['domain'] = "domain10.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user11" && $_POST['password'] == "user11_secret") {
		$_SESSION['domain'] = "domain11.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user12" && $_POST['password'] == "user12_secret") {
		$_SESSION['domain'] = "domain12.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user13" && $_POST['password'] == "user13_secret") {
		$_SESSION['domain'] = "domain13.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user14" && $_POST['password'] == "user14_secret") {
		$_SESSION['domain'] = "domain14.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user15" && $_POST['password'] == "user15_secret") {
		$_SESSION['domain'] = "domain15.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user16" && $_POST['password'] == "user16_secret") {
		$_SESSION['domain'] = "domain16.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user17" && $_POST['password'] == "user17_secret") {
		$_SESSION['domain'] = "domain17.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user18" && $_POST['password'] == "user18_secret") {
		$_SESSION['domain'] = "domain18.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user19" && $_POST['password'] == "user19_secret") {
		$_SESSION['domain'] = "domain19.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user20" && $_POST['password'] == "user20_secret") {
		$_SESSION['domain'] = "domain20.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user21" && $_POST['password'] == "user21_secret") {
		$_SESSION['domain'] = "domain21.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user22" && $_POST['password'] == "user22_secret") {
		$_SESSION['domain'] = "domain22.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user23" && $_POST['password'] == "user23_secret") {
		$_SESSION['domain'] = "domain23.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user24" && $_POST['password'] == "user24_secret") {
		$_SESSION['domain'] = "domain24.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user25" && $_POST['password'] == "user25_secret") {
		$_SESSION['domain'] = "domain25.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user26" && $_POST['password'] == "user26_secret") {
		$_SESSION['domain'] = "domain26.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user27" && $_POST['password'] == "user27_secret") {
		$_SESSION['domain'] = "domain27.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user28" && $_POST['password'] == "user28_secret") {
		$_SESSION['domain'] = "domain28.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user29" && $_POST['password'] == "user29_secret") {
		$_SESSION['domain'] = "domain29.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
	if ($_POST['username'] == "user30" && $_POST['password'] == "user30_secret") {
		$_SESSION['domain'] = "domain30.workshop";
		$_SESSION['login'] = "yes";
		header('Location: index.php');
	}
}

elseif (isset($_SESSION['login']) && !isset($_POST['content']))
{

//print_r($_SESSION);	
?>



	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="http://workbench.ripe.net/static/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="http://workbench.ripe.net/static/favicon.ico" type="image/x-icon">
		<title>RIPE NCC DNSSEC Training Course Panel</title>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link href="http://workbench.ripe.net/static/css/signin.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>

		<body>
			<div class="container">
				<div class="alert alert-info">Your domain is <b><?php print($_SESSION['domain'])?></b></div>
				<div class="text-center">
					<form action="index.php" method="POST">

					<table>
						<tr>

		
							<td nowrap class="tbl_Bcopy" nowrap><b>Entry 1:</b></td> 

							<td nowrap class="tbl_Bcopy">&nbsp;&nbsp;Keytag/Key ID:</span>&nbsp;
								<input type="text" name="keytag1" value="" size="6">
							</td>
						</tr>
						<tr>
							<td nowrap class="tbl_Bcopy" nowrap>&nbsp;</td>

							<td nowrap class="tbl_Bcopy ">&nbsp;&nbsp;Algorithm:</span>&nbsp;
								<select name="alg1">
									<option value="5">5 - RSA/SHA-1</option>
									<option value="8">8 - RSA/SHA-256</option>
									<option value="10">10 - RSA/SHA-512</option>
								</select>
							</td>
						</tr>
						<tr>

							<td nowrap class="tbl_Bcopy" nowrap>&nbsp;</td>  

							<td nowrap class="tbl_Bcopy">&nbsp;&nbsp;Digest type:</span>&nbsp;
								<select name="digest_type1">
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
							</td>
						</tr>
	
						<tr>

							<td nowrap class="tbl_Bcopy" nowrap>&nbsp;</td>    

							<td nowrap class="tbl_Bcopy">&nbsp;&nbsp;HASH:</span>&nbsp;
								<input type="text" name="digest1" value="" size="60">
							</td>
						</tr>


					</table>
					<hr >
					<table>
						<tr>
							<td nowrap class="tbl_Bcopy" nowrap><b>Entry 2:</b></td>  

							<td nowrap class="tbl_Bcopy">&nbsp;&nbsp;Keytag/Key ID:</span>&nbsp;
								<input type="text" name="keytag2" value="" size="6">
							</td>
						</tr>
						<tr>
							<td nowrap class="tbl_Bcopy" nowrap>&nbsp;</td>

							<td nowrap class="tbl_Bcopy ">&nbsp;&nbsp;Algorithm:</span>&nbsp;
								<select name="alg2">
									<option value="5">5 - RSA/SHA-1</option>
									<option value="8">8 - RSA/SHA-256</option>
									<option value="10">10 - RSA/SHA-512</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap class="tbl_Bcopy" nowrap>&nbsp;</td>  

							<td nowrap class="tbl_Bcopy">&nbsp;&nbsp;Digest type:</span>&nbsp;
								<select name="digest_type2">
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap class="tbl_Bcopy" nowrap>&nbsp;</td>    

							<td nowrap class="tbl_Bcopy">&nbsp;&nbsp;HASH:</span>&nbsp;
								<input type="text" name="digest2" value="" size="60">
							</td>
						</tr>

					</table>
					<input type="hidden" name="content" value="yes" />

					<input type="submit" name="Submit" value="Submit">

				</form>
			</div>
<?php
}

elseif (isset($_SESSION['login']) && isset($_POST['content'])) {
	$ns_command = "server 10.0.3.53\n";
	$ns_command .= "zone workshop\n";
	$ns_command .= "update delete " . $_SESSION["domain"]  . " DS\n";
	$ns_command .= "update add " . $_SESSION["domain"] . " 10 DS " . $_POST["keytag1"] . " " . $_POST["alg1"] . " " . $_POST["digest_type1"] . " " . $_POST["digest1"] . "\n";
	$ns_command .= "update add " . $_SESSION["domain"] . " 10 DS " . $_POST["keytag2"] . " " . $_POST["alg2"] . " " . $_POST["digest_type2"] . " " . $_POST["digest2"] . "\n";
 	$ns_command .= "send\n";
	
	print("<pre>" . $ns_command . "</pre>");
	
	$tmpfname = tempnam("", "nsupdate.");
	
	file_write_string($tmpfname, $ns_command);
	
	passthru("/usr/local/bin/nsupdate -k /usr/local/Ksignerkey.+157+05245.private $tmpfname", $ex);
	//print ($tmpfname);
	unlink($tmpfname);
	
	if ($ex != 0)
	{
		print ("Update did not go through");
		print ($rc);
	}
	else 
	{
		print ("Records have been updated!");
	}
}

else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="http://workbench.ripe.net/static/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://workbench.ripe.net/static/favicon.ico" type="image/x-icon">
	<title>RIPE NCC DNSSEC Training Course Panel</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href="http://workbench.ripe.net/static/css/signin.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="container">
			<div class="text-center">
				<img src="http://workbench.ripe.net/static/images/logo.png" alt="RIPE NCC" class="img-rounded" width="300">
			</div>
			<p></p>
			<form class="form-signin" role="form" action="index.php" method="post">
				<!--<h2 class="form-signin-heading">Please login:</h2>-->
				<input type="text" name='username' class="form-control" placeholder="Username" required autofocus />
				<input type="password" name='password' class="form-control" placeholder="Password" required />
				<input type="hidden" name="logging" value="yes" />
				<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        
				<p></p>
				<div class="alert alert-info">Please login with the same username and password used for the rest of the lab.</div>
			</form>
			<p></p>
			<div class="text-center">
				<a href="https://www.google.com/intl/en/chrome/browser/"><img src="http://workbench.ripe.net/static/images/chrome.png" alt="Chrome" class="img-rounded" width="100"></a>
				<a href="https://www.firefox.com/"><img src="http://workbench.ripe.net/static/images/firefox.png" alt="Firefox" class="img-rounded" width="100"></a>
				<a href="http://support.apple.com/downloads/#safari"><img src="http://workbench.ripe.net/static/images/safari.png" alt="Safari" class="img-rounded" width="100"></a>
			</div>
		</div>
	</body>
</html>

<?php

}

?>

