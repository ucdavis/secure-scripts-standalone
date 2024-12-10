<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/p66Shc_text.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>p66Shc - Subjects Sample Data</title>
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

$upload_by = $_SESSION["p66_user"];

$sub_data = "";
$an_id = "";
$genotype = "";
$food = "";
$p66_time = "";
$p66_group = "";
$censor = "";
$day56 = "";
$notify_email = "";

if(isset($_POST['sub_data'])) $sub_data = $_POST["sub_data"];
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

		if (preg_match("/Go to/", $sub_data))
		{
			if (preg_match("/Bodyweight/", $sub_data))
			{
				$go_to = "s_bodyweight.php";
				$target = "Bodyweight";
			}
			if (preg_match("/Lifespan/", $sub_data) )
			{
				$go_to = "s_lifespan.php";
				$target = "Lifespan";
			}
			if (preg_match("/Pathology/", $sub_data)) 
			{
				$go_to = "s_pathology.php";
				$target= "Pathology";
			}
			
			print "<form name= 'go_to' method= 'post' action= '$go_to'>";
			print "<table border= '0' width= '100%'>";
			
		        print "<tr><td>Select Animal ID</td></tr>";
				
				print "<tr>";
					print "<td>";
						DropDown('subjects', 'an_id', 'sub_id', 'an_id', $link);
					print "</td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
//				print "<input type= 'hidden' name= 'target_id' value= '$target_id'>";
				
				print "<tr>";
		            print "<td colspan= '5'><input type= \"submit\" name= \"sub_target\" value= \"Update $target Data\" /></td>";
		        print "</tr>";
			print "</table>";
			print "</form>";
		} // end if pregmatch $sub_data goto

		
		
// IF !SUB_DATA
		
		if (!$sub_data)
		{
			print "<form name= 'subject' method= 'post' action= 's_subject.php'>";
			print "<table border= '0' width= '100%'>";
			
				print "<tr>";
					print "<td><strong>p66Shc Sample Data</strong>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
		            print "<td colspan= '5'><input type= \"submit\" name= \"sub_data\" value= \"Go to Bodyweight Data\" /></td>";
		        print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
		            print "<td colspan= '5'><input type= \"submit\" name= \"sub_data\" value= \"Go to Lifespan Data\" /></td>";
		        print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
			
				print "<tr>";
		            print "<td colspan= '5'><input type= \"submit\" name= \"sub_data\" value= \"Go to Pathology Data\" /></td>";
		        print "</tr>";

			print "</table>";
			print "</form>";
			
			print "<p><a href= \"data_center.php\">Go Back</a><p>";
		
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
