<?php
session_start();
// no direct access
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/base_page.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- UTF-8 Character set -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- IE 8 Compatibility -->
<meta http-equiv="X-UA-Compatible" content="IE=8" />

<?
// $__ROOTDIR = basename(dirname(__FILE__));
require_once "config.inc.php";
?>


<? include "includes/css_scripts.php"; ?>

<!-- InstanceBeginEditable name="page_title" -->
<title>Department of Public Health Sciences - UC Davis School of Medicine</title>
<!-- InstanceEndEditable -->
<? include "includes/meta_info.php"; ?>

</head>

<body>

<table cellpadding="0" cellspacing="0" id="maincontainer">
<tr>
<td valign="top">


<!-- Start Header Section -->

<? include "includes/top_header.php"; ?>

<!-- End Header Section -->


	<div id="titlebar">
    	<? include "includes/site_title.php"; ?>
    	<p></p>
    </div> <!-- titlebar -->




<div id="main">

<!-- Start Left Nav Col -->

<div id="phsLeft-container">
<div id="leftNavMain">

<!--        <div class="leftnavitem" id="leftcolsidebar0">	-->

     <!--        	<div id="menu_phsLeft"> -->
				    	<? include "includes/left_menu.php"; ?>
<!--                 </div> menu_phsLeft -->


<!--        </div> --> <!-- leftnavitem -->



</div> <!-- leftNavMain -->
</div> <!-- phsLeft-container -->

<!-- End Left Navigation -->


</div> <!-- main -->

<!-- End Left Nav Col -->

<!-- Begin Right Nav Column -->



    <div id="sidebarContainer">

		<div id="sidebar"><!-- InstanceBeginEditable name="right_teasers" -->
        <div id="phsRight">
          <h3>UC Links</h3>
          <ul class="menu">
            <li><a href="http://www.ucdavis.edu" target="_blank" >UC Davis</a></li>
            <li><span class="separator"></span></li>
            <li><a href="http://www.ucdmc.ucdavis.edu" target="_blank" >UC Davis Health Systems</a></li>
          </ul>
        </div>
		<!-- InstanceEndEditable --></div>
		<!-- sidebar -->

    </div> <!-- sidebarContainer -->



<!-- End Right Nav Column -->

<!-- Start Main Content Column -->
    <div id="content">

	<!-- Start Breadcrumb -->

 <?
if($_SERVER['SERVER_NAME'] == 'secure.phs.ucdavis.edu')
	$bcROOT="http://phs.ucdavis.edu";
else
//	$bcROOT="";
	$bcROOT=$GLOBALS['ROOT_DIR'];
?>


	<div id="breadcrumb" class="breadcrumb" align="left"><!-- InstanceBeginEditable name="breadcrumbs" --><a href="<?=$bcROOT?>/education.php">Education</a> -> <a href="<?=$bcROOT?>/education/cme.php">CME</a> -> <a href="<?=$bcROOT?>/education/clinepi.php">Introduction to Clinical Research</a> -> Registration<!-- InstanceEndEditable --></div> <!-- breadcrumb -->

	<!-- End Breadcrumb -->



	<!-- Start Slide Show Section -->
<!--	<table>
    	<tr><td>
		<div id="phsslides">
	        <jdoc:include type="modules" name="phs_slides" style="xhtml"/>
        </div>
        </td></tr>
	</table>  -->
	<!-- Slide Show -->
	<!-- InstanceBeginEditable name="content" -->
<h1>Introduction to Clinical Research Registration</h1>

<?php

//require_once "/usr/local/secure_www/db.config.php";

// uncomment for debugging
//ini_set('error_reporting', E_ALL);


// include function library
//include "../include/common.lib.php";

function sanitizeString($string)
{
	if(is_string($string))
	{
		$string = ereg_replace("[^[:space:]a-zA-Z0-9*_.-]", "", $string);
	    $dblink = new mysqli("localhost", DBUSER, DBPASSWD);
		$string = mysqli_real_escape_string($dblink, $string);
		return $string;
	}
	else
		return NULL;
}

// -------------------------------------------------------------------------------
// END MASTER MODULE INCLUDE
// -------------------------------------------------------------------------------

$fname = "";
if (isset($_POST["fname"])) $fname = $_POST["fname"];
$mname = "";
if (isset($_POST["mname"])) $mname = $_POST["mname"];
$lname = "";
if (isset($_POST["lname"])) $lname = $_POST["lname"];
$md = "";
if (isset($_POST["md"])) $md = $_POST["md"];
$dro = "";
if (isset($_POST["dro"])) $dro = $_POST["dro"];
$phd = "";
if (isset($_POST["phd"])) $phd = $_POST["phd"];
$other_doc = "";
if (isset($_POST["other_doc"])) $other_doc = $_POST["other_doc"];
$doc_spec = "";
if (isset($_POST["doc_spec"])) $doc_spec = $_POST["doc_spec"];
$address = "";
if (isset($_POST["address"])) $address = $_POST["address"];
$city = "";
if (isset($_POST["city"])) $city = $_POST["city"];
$state = "";
if (isset($_POST["state"])) $state = $_POST["state"];
$zip = "";
if (isset($_POST["zip"])) $zip = $_POST["zip"];
$phone = "";
if (isset($_POST["phone"])) $phone = $_POST["phone"];
$fax = "";
if (isset($_POST["fax"])) $fax = $_POST["fax"];
$email = "";
if (isset($_POST["email"])) $email = $_POST["email"];
$specialty = "";
if (isset($_POST["specialty"])) $specialty = $_POST["specialty"];
$employer = "";
if (isset($_POST["employer"])) $employer = $_POST["employer"];
$dept = "";
if (isset($_POST["dept"])) $dept = $_POST["dept"];
$position = "";
if (isset($_POST["position"])) $position = $_POST["position"];
$last_four = "";
if (isset($_POST["last_four"])) $last_four = $_POST["last_four"];
$ucd = "";
if (isset($_POST["ucd"])) $ucd = $_POST["ucd"];
//$reg_fee = $_POST["reg_fee"];
$sub = "";
if (isset($_POST["sub"])) $sub = $_POST["sub"];
$chart = "";
if (isset($_POST["chart"])) $chart = $_POST["chart"];
$acct = "";
if (isset($_POST["acct"])) $acct = $_POST["acct"];
$cont_first = "";
if (isset($_POST["cont_first"])) $cont_first = $_POST["cont_first"];
$cont_last = "";
if (isset($_POST["cont_last"])) $cont_last = $_POST["cont_last"];
$cont_phone = "";
if (isset($_POST["cont_phone"])) $cont_phone = $_POST["cont_phone"];
$check_pay = "";
if (isset($_POST["check_pay"])) $check_pay = $_POST["check_pay"];
$cancel = "";
if (isset($_POST["cancel"])) $cancel = $_POST["cancel"];
//$cancel_date = $_POST["cancel_date"];
$veg = "";
if (isset($_POST["veg"])) $veg = $_POST["veg"];
$diet = "";
if (isset($_POST["diet"])) $diet = $_POST["diet"];
$lodge = "";
if (isset($_POST["lodge"])) $lodge = $_POST["lodge"];
$disability = "";
if (isset($_POST["disability"])) $disability = $_POST["disability"];
$notes = "";
if (isset($_POST["notes"])) $notes = $_POST["notes"];
$sub_reg = "";
if (isset($_POST["sub_reg"])) $sub_reg = $_POST["sub_reg"];
$cme_user = "";
if (isset($_POST["cme_user"])) $cme_user = $_POST["cme_user"];
$cme_psswd = "";
if (isset($_POST["cme_psswd"])) $cme_psswd = $_POST["cme_psswd"];

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
     $fname = preg_replace($targets, $replaces, $fname);
	 $mname = preg_replace($targets, $replaces, $mname);
     $lname = preg_replace($targets, $replaces, $lname);
     $doc_spec = preg_replace($targets, $replaces, $doc_spec);
	 $address = preg_replace($targets, $replaces, $address);
	 $city = preg_replace($targets, $replaces, $city);
	 $specialty = preg_replace($targets, $replaces, $specialty);
	 $employer = preg_replace($targets, $replaces, $employer);
     $position = preg_replace($targets, $replaces, $position);
     $dept = preg_replace($targets, $replaces, $dept);
	 $cont_first = preg_replace($targets, $replaces, $cont_first);
	 $cont_last = preg_replace($targets, $replaces, $cont_last);
	 $diet = preg_replace($targets, $replaces, $diet);
	 $notes = preg_replace($targets, $replaces, $notes);


	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept")))
	{

		print "<div align= \"left\"><b><u>Introduction to Clinical Research Registration List</u></b></div>";
		print "<p>";

		if (preg_match("/Show/", $sub_reg))
		{

			print "<table border= \"0\" align= \"center\" cellspacing= \"1\" cellpadding= \"2\" width=\"100%\">";
				print "<tr>";
					print "<td>&nbsp;</td>";
					print "<td><strong>Name</strong></td>";
					print "<td><strong>Position/Title</strong></td>";
					print "<td><strong>Department</strong></td>";
//					print "<td><strong>Research Interest (PDF)</strong></td>";
//					print "<td><strong>Reg Fee</strong></td>";
				print "</tr>";

				$reg_ct = 1;
			// Get registration records to list on the page
				$q_reg= "SELECT * FROM cme_reg WHERE cancel <> \"yes\" AND conf_year = \"2024\" AND wait = \"0\" ORDER BY lname, fname"; // GET current highest key
				$r_reg = mysqli_query($link, $q_reg);

			while ($row_reg = mysqli_fetch_array($r_reg, MYSQLI_ASSOC))
			{
				print "<tr>";
					print "<td valign= \"top\"><strong>$reg_ct</strong></td>";
					print "<td valign= \"top\"><font size= \"-1\"><a href=\"mailto:$row_reg[email]\">$row_reg[fname] $row_reg[lname], $row_reg[degree]</a></font></td>";
					print "<td valign= \"top\"><font size= \"-1\">$row_reg[position]</font></td>";
					print "<td valign= \"top\"><font size= \"-1\">$row_reg[dept]</font></td>";
//					print "<td valign= \"top\"><font size= \"-1\">$row_reg[ctsc_affiliation]</font></td>";
//					print "<td valign= \"top\"><font size= \"-1\">$$row_reg[reg_fee]</font></td>";

//					if (substr($row_reg[doc_link], -4) == ".pdf")
//					{
//						$fileLink = "openDocs.php?file_id=$row_reg[doc_hash]";
//						print "<td valign= \"top\"><font size= \"-1\"><a href= \"$fileLink\" target= \"_blank\">$row_reg[fname]'s Interests</a></font></td>";
//					}
//					else
//					{
//						print "<td>&nbsp;</td>";
//					}

				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				$reg_ct++;
			} // end while

			// WAIT LIST

			print "<tr><td>&nbsp;</td></tr>";

			print "<tr>";
				print "<td colspan= \"6\" align= \"center\">WAIT LIST</td>";
			print "</tr>";

				$wt_ct = 1;
			// Get registration records to list on the page
				$q_wt= "SELECT * FROM cme_reg WHERE cancel <> \"yes\" AND conf_year = \"2024\" AND wait = \"1\" ";
				$r_wt = mysqli_query($link, $q_wt);

			while ($row_wt = mysqli_fetch_array($r_wt, MYSQLI_ASSOC))
			{
				print "<tr>";
					print "<td valign= \"top\"><strong>$wt_ct</strong></td>";
					print "<td valign= \"top\"><font size= \"-1\">$row_wt[fname] $row_wt[lname]</font></td>";
					print "<td valign= \"top\"><font size= \"-1\">$row_wt[dept]</font></td>";
					print "<td valign= \"top\"><font size= \"-1\">$row_wt[specialty]</font></td>";
					print "<td valign= \"top\"><font size= \"-1\">$row_wt[email]</font></td>";
					print "<td valign= \"top\"><font size= \"-1\">$row_wt[sub]&nbsp;$row_reg[chart]&nbsp;$row_wt[account]</font></td>";
				print "</tr>";

				$wt_ct++;
			} // end WAIT while

			print "<tr><td>&nbsp;</td></tr>";

			print "</table>";

			print "<p><a href=\"clinepi_download.php\"><strong>Download list to Excel File</strong></a>";

		} // end if preg_match $sub_reg, Show

		if (preg_match("/Export/", $sub_reg))
		{
			$q_export = "SELECT * FROM cme_reg WHERE cancel <> \"yes\" AND conf_year = \"2024\" ORDER BY lname, fname";
			$r_export = mysqli_query($link, $q_export);
			$fields_export = mysqli_num_fields($r_export);

			for ($field_ct = 0; $field_ct < $fields_export; $field_ct++)
			{
//				$header .= mysql_field_name($r_export, $field_ct)."\t";
				$header .= mysqli_fetch_fields($r_export)."\t";
			}

			while ($row_export = mysqli_fetch_array($r_export, MYSQLI_ASSOC))
			{
				$line = ' ';

				foreach($row_export as $value)
				{
					if ((!isset($value)) || ($value == " "))
					{
						$value = "\t";
					}
					else
					{
						$value = str_replace('"', '""', $value);
						$value = '"'.$value.'"'."\t";
					}
					$line .= $value;
				} // end foreach

				$data .= trim($line)."\n";
			} // end while

			$data = str_replace("\r", " ", $data);

			if ($data == " ") $data = "\n(0) Records Found!\n";

			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"cme_data.csv\"");
			header("Pragma: no-cache");
			header("Expires: 0");
			print "$header\n$data";

			print "<p><a href= \"clinepi_reglist.php\">Back</a>";

		} // end if preg_match $sub_reg, Export

		if ($sub_reg == "Log on")
		{
			$q_user = "SELECT * FROM cme_user WHERE cme_user = \"$cme_user\" AND cme_psswd = md5(\"$cme_psswd\") ";
			$r_user = mysqli_query($link, $q_user);

			if (mysqli_num_rows($r_user) ==  1)
			{
				print "<form name= \"clinepi_reglist\" method= \"post\" action= \"clinepi_reglist.php\">";
					print "<input type= \"submit\" name= \"sub_reg\" value= \"Show Registration List\">";
				print "</form>";

				print "<form name= \"clinepi_download\" method= \"post\" action= \"clinepi_download.php\">";
					print "<input type= \"submit\" name= \"sub_reg\" value= \"Export and Save Data\">";
				print "</form>";
			}

			else
			{
				print "The user or password was incorrect.&nbsp;&nbsp;<a href= \"clinepi_reglist.php\">Back</a>";
			}

		} // end if $sub_reg = Log on

		if (!$sub_reg)
		{
			print "<form name= \"reg_logon\" method= \"post\" action= \"clinepi_reglist.php\">";
			print "<table>";
				print "<tr>";
					print "<td>User:</td>";
					print "<td><input type= \"text\" name= \"cme_user\"></td>";
				print "</tr>";
				print "<tr>";
					print "<td>Password:</td>";
					print "<td><input type= \"password\" name= \"cme_psswd\"></td>";
				print "</tr>";
				print "<tr>";
					print "<td colspan= \"2\"><input type= \"submit\" name= \"sub_reg\" value= \"Log on\"></td>";
				print "</tr>";
			print "</table>";
			print "</form>";
		} // end if ! $sub_reg


	} // end if DBOK
} // end if FOPEN
?>
	<!-- InstanceEndEditable --></div>
    <!-- content -->


<!-- End Main Content Col -->

</td>
</tr>

<tr>
<td class="footerrow" >

<!-- Begin Footer -->
<div id="footercontainer">


<!-- Start Footer Section -->

<div id="footer" align="center">
<? include "includes/footer.php"; ?>
</div> <!-- footer -->


<!-- End Footer Section -->

<!-- Start Analytics Tags -->
<? include "includes/analytics.php"; ?>
<!-- End Analytics Tags -->


</div> <!-- footercontainer -->

<!-- End Footer -->

<!--- </div> --->

</td>
</tr>
</table>

<!-- InstanceBeginEditable name="rotate_images" -->
<? //include "../includes/home_images.js"; ?>
<!-- InstanceEndEditable -->




</body>
<!-- InstanceEnd --></html>
