<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/p66Shc_text.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>p66Shc - Lifespan</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<link href="../css/p66Shc.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="0">

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7FAFF">
	<tr>
    	<td valign="top" background="../images/banner_bkgrd.jpg"><img src="../images/p66_banner.jpg" width="600" height="64" /></td>
  	</tr>

	<tr>
    	<td valign="middle" bgcolor="#FFFFFF" height="30px" class="top_menu">&nbsp;&nbsp;&nbsp;
          <a href="http://p66Shc.phs.ucdavis.edu/index.htm" class="top_menu">Introduction</a>&nbsp;&nbsp;&#8226;
          <a href="http://p66Shc.phs.ucdavis.edu/projects.htm" class="top_menu">Projects & Cores</a>&nbsp;&nbsp;&#8226;
          <a href="http://p66Shc.phs.ucdavis.edu/data_login.php" class="top_menu">Data Center</a>&nbsp;&nbsp;&#8226;
<!--          <a href="https://secure.phs.ucdavis.edu/p66Shc/data_login.php" class="top_menu">Data Center</a>&nbsp;&nbsp;&#8226; -->
          <a href="http://p66Shc.phs.ucdavis.edu/publications.php" class="top_menu">Publications</a>&nbsp;&nbsp;&#8226;
          <a href="http://p66Shc.phs.ucdavis.edu/contact.htm"  class="top_menu">Contact Us</a> </td>
  </tr>

	<tr>
    	<td height="1px" bgcolor="#18477B"></td>
    </tr>
    
	<tr>
    	<td valign="top">
        	<table width="100%" cellpadding="2" cellspacing="2" border="0">

            	<tr>
               	   <td width="20%" valign="top" bgcolor="#F8F7FF"><!-- InstanceBeginEditable name="LeftNav" -->
               	     <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php" class="left_nav">Data Center Home</a></div>
           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project1" class="left_nav">Project 1</a></div>
           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project2" class="left_nav">Project 2</a></div>
           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project3" class="left_nav">Project 3</a></div>
<!--           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project4" class="left_nav">Project 4</a></div> -->
               	     <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreA" class="left_nav">Core A 
                     (Internal Information)</a></div>
                     <div id="left_nav">&nbsp;<a href="data_center.php?getfiles=CoreB" class="left_nav">&nbsp;Core B</a></div>
                     <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreC" class="left_nav">Core C</a></div>
           	       <div id="left_nav">&nbsp;<a href="data_center.php?getfiles=Meetings" class="left_nav">&nbsp;Monthly Meetings</a></div>
                   <div id="left_nav">&nbsp;<a href="data_center.php?getfiles=Abstracts" class="left_nav">&nbsp;Abstracts</a></div>
                   <div id="left_nav">&nbsp;<a href="publications.php" class="left_nav">&nbsp;Publications</a></div>
                   <div id="left_nav">&nbsp;<a href="s_subject.php" class="left_nav">&nbsp;Sample Data</a></div>
                   <div id="left_nav">&nbsp;&nbsp;<a href="http://p66Shc.phs.ucdavis.edu/data_logout.php" class="left_nav">Logout</a></div>
               	   <!-- InstanceEndEditable --></td>

                   <td width="80%" valign="top"><!-- InstanceBeginEditable name="Content" -->
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
	 foreach ($_POST as $key=>$value) ${$key} = $value;
     $targets = array("/\\s+/", "/\\\\/", "/\"/", "/^ /", "/ $/", "/&lt/", "/&gt/");
     $replaces = array(" ", "", "'", "", "", "<", ">");
//	 $liv_key_text = preg_replace($targets, $replaces, $liv_key_text);
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "p66shc")))
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

		if ($sub_data == "Submit Lifespan Data")
		{
			$valid_form = true;

			if ($valid_form == true)
			{
				$upload_date = date("c");
				
				$q_update = "UPDATE lifespan SET food = '$food', p66_time = '$p66_time', p66_group = '$p66_group', censor = '$censor',
				day56 = '$day56' WHERE an_id LIKE '$an_id' and genotype LIKE '$genotype' ";
				
				$r_update = mysqli_query($link, $q_update);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "The lifespan data for ID $an_id Genotype $genotype has been successfully uploaded.  
					<a href= \"s_subject.php\">Go Back to Subject Sample Data Main Page</a>";

// SEND E-MAIL NOTIFICATION TO KYOUNGMI KIM AND ADDRESSES LISTED IN THE CC NOTIFICATION					
//					$file_type = "";
					
					$to = "kmkim@ucdavis.edu";
//					$cc_email = $notify_email;
					$subject = "p66Shc Lifespan Data Update notifcation";
					$contents = "Hello, \n\n";
					$contents .= "A p66Shc lifespan data for $an_id - $genotype has been uploaded by $upload_by.  \n\n";
					
					
					$contents .= "Please visit our website at http://p66shc.phs.ucdavis.edu/data_login.php to view this data. \n\n";
//					$contents .= "If you have any questions please contact Amber Carrere at (530) 754-4992. \n\n";
					$contents .= "Best regards, \n\n";
					$contents .= "p66Shc Program";
					$from = "noreply@ucdavis.edu";
					$header = "From: \"p66Shc Program\" <".$from.">\r\n"; 
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
		
		if ((!$sub_data) || (($sub_date == 'Submit Lifespan Data') && ($valid_form == false)))
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
			
			print "<FORM name= \"export_std\" method= \"post\" action= \"http://p66shc.phs.ucdavis.edu/sample_download.php\">";
			print "<INPUT TYPE= \"submit\" VALUE= \"Export this record to Excel\" name= \"sub_sample\">";
			print "<input type= \"hidden\" name= \"q_sample\" value= \"$q_sample\">";
			print "</FORM>";
			
			print "<p>&nbsp;</p>";


			print "<form name= 'lifespan' method= 'post' action= 's_lifespan.php'>";
			print "<table border= '0' width= '100%'>";

				print "<tr>";
					print "<td><strong>Animal ID</strong></td>";
					print "<td><strong>Genotype</strong></td>";
					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
				
				print "<tr>";
					print "<td>$an_id</td>";
					print "<td>$genotype</td>";
					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
				
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
				
				print "<input type= 'hidden' name= 'ls_id' value= '$ls_id'>";
				print "<input type= 'hidden' name= 'an_id' value= '$an_id'>";
				print "<input type= 'hidden' name= 'genotype' value= '$genotype'>";
				
				print "<tr>";
		            print "<td colspan= '5'><input type= \"submit\" name= \"sub_data\" value= \"Submit Lifespan Data\" /></td>";
		        print "</tr>";
					
			print "</table>";
			print "</form>";
			
			
			print "<p><a href= \"s_subject.php\">Back to Subject Sample Data Main Page</a><p>";
		
		} // end is !sub_data && $GETFILE
		

	} // end if DBOK
} // end fopen		


?>
   

	<p>&nbsp;</p>


<!-- InstanceEndEditable --> </td>
                </tr>
	       </table>
      </td>
    </tr>

	<tr>
    	<td height="3px" bgcolor="#18477B"></td>
    </tr>
    
    <tr>
    	<td valign="bottom" height="25px" bgcolor="#C4CCC9">
        <div id="p66_foot">
          <div align="left">
            <div id="p66_foot2">
              <div align="left">&nbsp;&nbsp;&nbsp;This project is supported by the US NIH/NIA under award number NIH/NIA P01 AG025532 &copy; 2009 p66Shc project. All rights reserved</div>
            </div>
          </div>
        </div></td>
  </tr>
</table>


</body>
<!-- InstanceEnd --></html>
