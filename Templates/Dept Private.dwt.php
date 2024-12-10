<?php
include "../knowledgebase/kb_authentication.php"; 
require_once "/usr/local/secure_www/db.config.php";
//require_once "http://intranet.phs.ucdavis.edu/config.inc.php";
// $leftnavROOT=$GLOBALS['ROOT_DIR'];
$leftnavROOT="http://intranet.phs.ucdavis.edu";
$auth_lname = "";
$auth_fmname = "";

// gather client IP information
$client_ip = $_SERVER['REMOTE_ADDR'];
$client_ip_chunks = explode(".",$client_ip);
$client_ip_subnet = $client_ip_chunks[0].".".$client_ip_chunks[1].".".$client_ip_chunks[2];

// list of subnets not requiring authentication
$allowed_subnets = array('169.237.157','169.237.40'); 

//echo $client_ip_subnet;

if(!in_array($client_ip_subnet,$allowed_subnets))
{
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
			$sql2 = "select * from people where authid like \"$userID\"";
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

} // auth-user if

session_start();
?> 
<HTML><!-- TemplateInfo codeOutsideHTMLIsLocked="true" -->
<link href="http://intranet.phs.ucdavis.edu/inc/default.css" rel="stylesheet" type="text/css">
<HEAD>
<STYLE> <!-- body { margin-top: 0; margin-left: 0 } --> </STYLE>
<link rel="StyleSheet" type="text/css" href="http://intranet.phs.ucdavis.edu/inc/default.css">

<!-- #BeginEditable "doctitle" -->
<TITLE>PHS Department Only</TITLE>


<!-- #EndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>
<BODY background="http://intranet.phs.ucdavis.edu/images/MedSchBack.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#333399"><table width="100%" border="0" cellpadding="2" cellspacing="0">
	<tr>
		<td align="left" nowrap>&nbsp; <b><font color="#FFCC00">PHS Intranet Web Site</font></b></td>
		<td align="center" nowrap><b><font color="#FFCC00"><?php if ($auth_lname) print "Hello"; ?> <?=$auth_fmname?> <?=$auth_lname?></font></b></td>
		<td align="right" nowrap><a href="http://www.ucdavis.edu/" class="navW80">UC Davis Home </a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; <a href="http://www.ucdmc.ucdavis.edu/medicalgroup/" class="navW80"></a><a href="http://www.ucdmc.ucdavis.edu/" class="navW80">Health
   		System</a> &nbsp;</td>
	</tr>
</table>
</td>
  </tr>
  <tr>
  	<td bgcolor="#000000"><a href="/welcome.php"><img src="http://intranet.phs.ucdavis.edu/images/PHStitle.gif" alt="" width="775" height="60" border="0"></a></td>
  	</tr>
  <tr>
  	<td bgcolor="#FFCC00"><img src="http://intranet.phs.ucdavis.edu/images/GoldBar.gif" alt="" width="775" height="4"></td>
  	</tr>
  <tr>
  	<td bgcolor="#333399"><table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td nowrap>&nbsp; <a href= "<?=$leftnavROOT?>/welcome.php" class="navW">Home</a>  &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href="http://phs.ucdavis.edu/" class="navW">Public Web</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/Misc/phonelist.php" class="navW">Employees</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/database.php" class="navW">Databases</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/CPP/compindex.php" class="navW">Computer</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/CPP/dppindex.php" class="navW">Policy</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/travel/TravelToDo.php" class="navW">Travel</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/Misc/press.php" class="navW">Publicity</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/MailLists/Mail_Lists.php" class="navW">E-mail Lists</a></td>
	</tr>
</table></td>
  	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td><!-- #BeginEditable "Content" -->{Content}<!-- #EndEditable --> 
      <p> 
    </td>
  </tr>
  <tr>
    <td>
      <p> 
      <hr>
      <p><a href="mailto:webmaster@phmail.ucdavis.edu">Mail Comments to webmaster@phmail.ucdavis.edu</a> 
    </td>
  </tr>
</table>

</BODY>
</HTML>
