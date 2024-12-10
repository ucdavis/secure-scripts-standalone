<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ketosis - Lifespan Data</title>
</head>

<body>

	<div id="left_nav">&nbsp;&nbsp;<a href="data_center.php" class="left_nav">Data Center Home</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project1" class="left_nav">Project 1</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project2" class="left_nav">Project 2</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project3" class="left_nav">Project 3</a></div>
<!--<div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project4" class="left_nav">Project 4</a></div> -->
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreA" class="left_nav">Core A (Internal Information)</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreB" class="left_nav">Core B</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreC" class="left_nav">Core C</a></div>
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Meetings" class="left_nav">Monthly Meetings</a></div> -->
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Abstracts" class="left_nav">Abstracts</a></div> -->
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="publications.php" class="left_nav">Publications</a></div> -->
    <div id="left_nav">&nbsp;&nbsp;<a href="subject.php" class="left_nav">Sample Data</a></div>
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="http://p66Shc.phs.ucdavis.edu/data_logout.php" class="left_nav">Logout</a></div> -->

<p>&nbsp;</p>


<?php

// include function library
include "./include/common.lib.php";
//ini_set('upload_max_filesize', '102,400,000 ');
//$max_size =  ini_get('upload_max_filesize');
//print "$max_size!";

$upload_by = "";
$sub_data = "";
$target_id = "";
$an_id = "";
$genotype = "";
$food = "";
$p66_time = "";
$p66_group = "";
$censor = "";
$day56 = "";
$notify_email = "";
$sub_target = "";

if(isset($_SESSION['p66_user'])) $upload_by = $_SESSION["p66_user"];
if(isset($_POST['sub_data'])) $sub_data = $_POST["sub_data"];
if(isset($_POST['target_id'])) $target_id = $_POST["target_id"];
if(isset($_POST['an_id'])) $an_id = $_POST["an_id"];
if(isset($_POST['genotype'])) $genotype = $_POST["genotype"];
if(isset($_POST['food'])) $food = $_POST["food"];
if(isset($_POST['p66_time'])) $p66_time = $_POST["p66_time"];
if(isset($_POST['p66_group'])) $p66_group = $_POST["p66_group"];
if(isset($_POST['censor'])) $censor = $_POST["censor"];
if(isset($_POST['day56'])) $day56 = $_POST["day56"];
if(isset($_POST['notify_email'])) $notify_email = $_POST["notify_email"];
if(isset($_POST['sub_target'])) $sub_target = $_POST["sub_target"];

if ($fp = fopen("/var/www/non_www/.my.cnf", "r"))
{

     while (! feof($fp)) 
	 {
         $line = fgets($fp, 4096);
         if (preg_match("/password=(\\w+)/", $line, $found)) $password = $found[1];
         elseif (preg_match("/user=(\\w+)/", $line, $found)) $user_name = $found[1];
         elseif (preg_match("/host=([\\w\\.]+)/", $line, $found)) $host_name = $found[1];
     }

     fclose($fp);
	 foreach ($_POST as $key=>$value) ${$key} = $value;
     $targets = array("/\\s+/", "/\\\\/", "/\"/", "/^ /", "/ $/", "/&lt/", "/&gt/");
     $replaces = array(" ", "", "'", "", "", "<", ">");
//	 $liv_key_text = preg_replace($targets, $replaces, $liv_key_text);
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "ketosis")))
	{
		if ($_SESSION["p66_access"] == "p66_OK")
		{
			print "";
		}
		else
		{
			print "You are not authorized to view this page";
			die();
		}

		if (($sub_data == "Insert Lifespan Data") ||($sub_data == "Update Lifespan Data")) 
		{
			$valid_form = true;

			if ($valid_form == true)
			{
				if ($sub_data == "Insert Lifespan Data")
				{
					$upload_date = date("c");
				
					$q_update = "INSERT into lifespan (an_id, genotype, food, p66_time, p66_group, censor, day56) VALUES 
					('$an_id', '$genotype', '$food', '$p66_time', '$p66_group', '$censor', '$day56') ";
				}
				
				if ($sub_data == "Update Lifespan Data")
				{
					$upload_date = date("c");
				
					$q_update = "UPDATE lifespan SET food = '$food', p66_time = '$p66_time', p66_group = '$p66_group', censor = '$censor',
					day56 = '$day56' WHERE an_id LIKE '$an_id' and genotype LIKE '$genotype' ";
				}
				
				$r_update = mysqli_query($link, $q_update);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "The lifespan data for ID $an_id Genotype $genotype has been successfully uploaded.  
					<a href= \"subject.php\">Go Back to Subject Sample Data Main Page</a>";

// SEND E-MAIL NOTIFICATION TO KYOUNGMI KIM AND ADDRESSES LISTED IN THE CC NOTIFICATION					
//					$file_type = "";
					
					$to = "kmkim@ucdavis.edu";
//					$cc_email = $notify_email;
					$subject = "Ketosis Lifespan Data Update notifcation";
					$contents = "Hello, \n\n";
					$contents .= "A Ketosis lifespan data for $an_id - $genotype has been uploaded by $upload_by.  \n\n";
					
					
					$contents .= "Please visit our website at http://ketosis.ucdavis.edu/data_login.php to view this data. \n\n";
//					$contents .= "If you have any questions please contact Amber Carrere at (530) 754-4992. \n\n";
					$contents .= "Best regards, \n\n";
					$contents .= "Ketosis Study";
					$from = "noreply@ucdavis.edu";
					$header = "From: \"Ketosis Study\" <".$from.">\r\n"; 
					$header.= "CC:".$cc_email."\r\n";
	
//					mail($to, $subject, $contents, $header);
// END E-MAIL NOTIFICATION					

				
				} // end if mysql_affected_rows >= 1
				
				else
				{
					print "The lifespan data for this subject has not been been updated.<p>$q_update";
					$valid_form = false;
				}
			
			} // end if $valid_form == true
		
		
		} // end if sub_data = Submit Lifespan Data
		
		
// IF !SUB_DATA && $GETFILES
		
		if ((!$sub_data) || (($sub_date == 'Insert Lifespan Data') && ($valid_form == false)) || (($sub_date == 'Update Lifespan Data') && ($valid_form == false)))
		{

			if (preg_match("/Insert/", $sub_target)) $query_action = "Insert";
			if (preg_match("/Update/", $sub_target)) $query_action = "Update";	
			
			if ($query_action == "Update")
			{		
				//			$q_lifespan = "SELECT * FROM lifespan WHERE an_id LIKE '1' AND genotype LIKE 'C57BL/6' ";
				$q_sample = "SELECT * FROM lifespan WHERE an_id LIKE $an_id ";
				$q_lifespan = "SELECT * FROM lifespan WHERE an_id LIKE '$an_id' ";
				$r_lifespan = mysqli_query($link, $q_lifespan);
			
				$row_lifespan = mysqli_fetch_array($r_lifespan, MYSQLI_ASSOC);
			
				$ls_id = $row_lifespan['ls_id'];
				$an_id = $row_lifespan['an_id'];
				$genotype = $row_lifespan['genotype'];
				$food = $row_lifespan['food'];
				$p66_time = $row_lifespan['p66_time'];
				$p66_group = $row_lifespan['p66_group'];
				$censor = $row_lifespan['censor'];
				$day56 = $row_lifespan['day56'];
			
				//			print "Target $target_id, Animal $an_id";
			
				print "<br />";
				
				print "<FORM name= \"export_std\" method= \"post\" action= \"http://ketosis.ucdavis.edu/sample_download.php\">";
				print "<INPUT TYPE= \"submit\" VALUE= \"Export this record to Excel\" name= \"sub_sample\">";
				print "<input type= \"hidden\" name= \"q_sample\" value= \"$q_sample\">";
				print "</FORM>";
			
				print "<p>&nbsp;</p>";
			}


			print "<form name= 'lifespan' method= 'post' action= 'lifespan.php'>";
			print "<table border= '0' width= '100%'>";

				print "<tr>";
					print "<td><strong>Animal ID</strong></td>";
					print "<td><strong>Genotype</strong></td>";
					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
				
		if ($query_action == "Insert")
		{	
				print "<tr>";
					print "<td><input type= 'text' name= 'an_id' value= '$an_id'></td>";
					print "<td><input type= 'text' name= 'genotype' value= '$genotype'></td>";
					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
		}
				
		if ($query_action == "Update")
		{	
				print "<tr>";
					print "<td>$an_id</td>";
					print "<td>$genotype</td>";
					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
		}
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Food</strong></td>";
					print "<td><strong>Time</strong></td>";
					print "<td><strong>Group</strong></td>";
					print "<td><strong>Censor</strong></td>";
					print "<td><strong>Day56</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input type= 'text' name= 'food' value= '$food'></td>";
					print "<td><input type= 'text' name= 'p66_time' value= '$p66_time'></td>";
					print "<td><input type= 'text' name= 'p66_group' value= '$p66_group'></td>";
					print "<td><input type= 'text' name= 'censor' value= '$censor'></td>";
					print "<td><input type= 'text' name= 'day56' value= '$day56'></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";
				
		if ($query_action == "Update")
		{	
				print "<input type= 'hidden' name= 'ls_id' value= '$ls_id'>";
				print "<input type= 'hidden' name= 'an_id' value= '$an_id'>";
				print "<input type= 'hidden' name= 'genotype' value= '$genotype'>";
		}
				
				print "<tr>";
		            print "<td colspan= '5'><input type= \"submit\" name= \"sub_data\" value= \"$query_action Lifespan Data\" /></td>";
					print "<td colspan= '5'><input type= \"hidden\" name= \"sub_target\" value= \"$sub_target\" /></td>";
		        print "</tr>";
					
			print "</table>";
			print "</form>";
			
			
			print "<p><a href= \"subject.php\">Back to Subject Sample Data Main Page</a><p>";
		
		} // end is !sub_data && $GETFILE
		

	} // end if DBOK
} // end fopen		


?>

</body>
</html>