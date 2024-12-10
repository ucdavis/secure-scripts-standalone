<?php
// gather client IP information
$client_ip = $_SERVER['REMOTE_ADDR'];
$client_ip_chunks = explode(".",$client_ip);
$client_ip_subnet = $client_ip_chunks[0].".".$client_ip_chunks[1].".".$client_ip_chunks[2];

// Listing ID to check against personnel DB so that only TCEC staff can access internal site
$it_listing = "=22=";

// list of subnets not requiring authentication
$allowed_subnets = array('169.237.157','169.237.40'); 

//echo $client_ip_subnet;

//if(!in_array($client_ip_subnet,$allowed_subnets))
//{
	include_once('CAS/CAS.php');
	phpCAS::setDebug();
	phpCAS::client(CAS_VERSION_2_0,'cas.ucdavis.edu',443,'cas');
	phpCAS::setNoCasServerValidation();
	phpCAS::forceAuthentication();
	$userID = phpCAS::getUser();
	
	if ($fp = fopen("/usr/local/secure_www/.my.cnf", "r")) 
	{
		while (! feof($fp)) 
		{
			$line = fgets($fp, 4096);
			if (preg_match("/password=(\\w+)/", $line, $found)) $password = $found[1];
			elseif (preg_match("/user=(\\w+)/", $line, $found)) $user_name = $found[1];
			elseif (preg_match("/host=([\\w\\.]+)/", $line, $found)) $host_name = $found[1];
		}
		fclose($fp);
		
		if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"))) 
		{
			$sql2 = "select * from people where authid like \"$userID\" AND  listing like \"%$it_listing%\" ";
			if ($result2 = mysqli_query($link, $sql2)) 
			{
				if ($line2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
				{
					$auth_lname = $line2["lname"];
					$auth_fmname = $line2["fmname"];
				}
				else 
				{
					header("Location: http://phs.ucdavis.edu/error/forbidden_intranet.php");
					exit;	
				}
			}
			else 
			{
				header("Location: http://phs.ucdavis.edu/error/forbidden_intranet.php");
				exit;
			}
		}
		else 
		{
			header("Location: http://phs.ucdavis.edu/error/error_intranet.php?error=DatabaseError");
			exit;
		}
	}
	else 
	{
		header("Location: http://phs.ucdavis.edu/error/error_intranet.php?error=NoMyCnf");
		exit;
	}

//} // auth-user if

//session_start();
?> 
