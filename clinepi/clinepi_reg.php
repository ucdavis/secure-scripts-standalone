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
<title>Department and Division of Internal Medicine - UC Davis School of Medicine</title>
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
            <li><a href="https://ucdavis.edu" target="_blank" >UC Davis</a></li>
            <li><span class="separator"></span></li>
            <li><a href="https://health.ucdavis.edu" target="_blank" >UC Davis Health Systems</a></li>
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


	<div id="breadcrumb" class="breadcrumb" align="left"><!-- InstanceBeginEditable name="breadcrumbs" --><!--<a href="<?//=$bcROOT?>/education.php">Education</a> -> <a href="<?//=$bcROOT?>/education/cme.php">CME</a> -> <a href="<?//=$bcROOT?>/education/clinepi.php">Clinical Epidemiology and Study Design</a> -> Registration --><!-- InstanceEndEditable --></div> <!-- breadcrumb -->

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
<h1>Introduction to Clinical Research</h1>

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

$degree = "";

$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$ucd_affiliate = $_POST["ucd_affiliate"];
$ucd_student = $_POST["ucd_student"];
$kerb_id = $_POST["kerb_id"];
$md = $_POST["md"];
$dro = $_POST["dro"];
$phd = $_POST["phd"];
$other_doc = $_POST["other_doc"];
$doc_spec = $_POST["doc_spec"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];
$fax = $_POST["fax"];
$email = $_POST["email"];
$alt_email = $_POST["alt_email"];
$specialty = $_POST["specialty"];
$employer = $_POST["employer"];
$dept = $_POST["dept"];
$position = $_POST["position"];
$last_four = $_POST["last_four"];
$ucd = $_POST["ucd"];
//$reg_fee = $_POST["reg_fee"];
$sub = $_POST["sub"];
$chart = $_POST["chart"];
$acct = $_POST["acct"];
$cont_first = $_POST["cont_first"];
$cont_last = $_POST["cont_last"];
$cont_phone = $_POST["cont_phone"];
$check_pay = $_POST["check_pay"];
$dafis_pay = $_POST["dafis_pay"];
$cancel = $_POST["cancel"];
//$cancel_date = $_POST["cancel_date"];
$cmec = $_POST["cmec"];
$veg = $_POST["veg"];
$diet = $_POST["diet"];
$lodge = $_POST["lodge"];
$disability = $_POST["disability"];
$notes = $_POST["notes"];
$vegan = $_POST["vegan"];
$no_kerberos = $_POST["no_kerberos"];
$ctsc_affiliation = $_POST["ctsc_affiliation"];
$ctsc_affiliation_other = $_POST["ctsc_affiliation_other"];
$research_interest = $_POST["research_interest"];

// fields for file upload
$upload_doc_dir = "/usr/local/secure_www/clinepi/";  //this directory needs to be created 2/19/2014
$doc_location = $_POST["doc_location"];

$sub_reg = $_POST["sub_reg"];
//$sub_reg = "Closed";



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
//     $targets = array("/\\s+/", "/\\\\/", "/\"/", "/^ /", "/ $/", "/&lt/", "/&gt/");
//     $replaces = array(" ", "", "'", "", "", "<", ">");


//	 $fname = preg_replace($targets, $replaces, $fname);
//	 $mname = preg_replace($targets, $replaces, $mname);
//     $lname = preg_replace($targets, $replaces, $lname);
//     $doc_spec = preg_replace($targets, $replaces, $doc_spec);
//	 $address = preg_replace($targets, $replaces, $address);
//	 $city = preg_replace($targets, $replaces, $city);
//	 $specialty = preg_replace($targets, $replaces, $specialty);
//	 $employer = preg_replace($targets, $replaces, $employer);
//     $position = preg_replace($targets, $replaces, $position);
//     $dept = preg_replace($targets, $replaces, $dept);
//	 $cont_first = preg_replace($targets, $replaces, $cont_first);
//	 $cont_last = preg_replace($targets, $replaces, $cont_last);
//	 $diet = preg_replace($targets, $replaces, $diet);
//	 $notes = preg_replace($targets, $replaces, $notes);

	 $fname = filter_var($fname, FILTER_SANITIZE_STRING);
	 $mname = filter_var($mname, FILTER_SANITIZE_STRING);
     $lname = filter_var($lname, FILTER_SANITIZE_STRING);
	 $kerb_id = filter_var($kerb_id, FILTER_SANITIZE_STRING);
     $doc_spec = filter_var($doc_spec, FILTER_SANITIZE_STRING);
	 $address = filter_var($address, FILTER_SANITIZE_STRING);
	 $city = filter_var($city, FILTER_SANITIZE_STRING);
	 $state = filter_var($state, FILTER_SANITIZE_STRING);
	 $zip = filter_var($zip, FILTER_SANITIZE_STRING);
	 $phone = filter_var($phone, FILTER_SANITIZE_STRING);
	 $fax = filter_var($fax, FILTER_SANITIZE_STRING);
	 $specialty = filter_var($specialty, FILTER_SANITIZE_STRING);
	 $employer = filter_var($employer, FILTER_SANITIZE_STRING);
     $position = filter_var($position, FILTER_SANITIZE_STRING);
     $dept = filter_var($dept, FILTER_SANITIZE_STRING);
	 $sub = filter_var($sub, FILTER_SANITIZE_STRING);
	 $chart = filter_var($chart, FILTER_SANITIZE_STRING);
	 $acct = filter_var($acct, FILTER_SANITIZE_STRING);
	 $cont_first = filter_var($cont_first, FILTER_SANITIZE_STRING);
	 $cont_last = filter_var($cont_last, FILTER_SANITIZE_STRING);
	 $cont_phone = filter_var($cont_phone, FILTER_SANITIZE_STRING);
	 $last_four = filter_var($last_four, FILTER_SANITIZE_STRING);
	 $diet = filter_var($diet, FILTER_SANITIZE_STRING);
	 $notes = filter_var($note, FILTER_SANITIZE_STRING);
	 $email = filter_var($email, FILTER_SANITIZE_EMAIL);
	 $alt_email = filter_var($alt_email, FILTER_SANITIZE_EMAIL);
	 $ctsc_affiliation_other = filter_var($ctsc_affiliation_other, FILTER_SANITIZE_STRING);
	 $research_interest = filter_var($research_interest, FILTER_SANITIZE_STRING);


	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept")))
//	if ($dbok = ($link = mysqli_connect	("localhost", "DBUSER", "DBPASSWD", "database")))
	{


//		print "<div align= \"left\"><font color=\"#002266\"><b>Clinical Epidemiology and Study Design Online Registration</b></font></div>";

		if ($sub_reg == "Closed")
		{
			print "<blockquote>";

			print "<table width= \"100%\">";

				print "<tr>";
					print "<td colspan= \"2\">
					<p>
					<strong>Registration is now closed.</strong>
					<p>&nbsp;</p>";

				print "</tr>";
			print "</table>";

			print "</blockquote>";
		} // end sub_reg == closed


		if (preg_match("/Submit Registration/", $sub_reg))
		{
			$valid_form = true;

// CAPTCHA VALIDATION
//		require_once $_SERVER['DOCUMENT_ROOT'] . '/phs-public/education/securimage/securimage.php';
		require_once 'securimage/securimage.php';
//		include "securimage/securimage.php";
		$securimage = new Securimage();

		if ($securimage->check($_POST['captcha_code']) == false)
		{
		  // the code was incorrect
		  // handle the error accordingly with your other error checking

		  // or you can do something really basic like this
		  print "<font color = \"red\"><strong>The security code you entered was incorrect.  Try again.</strong><p></p></font>";
		  $valid_form = false;
	}

//  END CAPTCHA VALIDATION


			$q_check = "SELECT * FROM cme_reg WHERE fname = \"$fname\" AND lname= \"$lname\" AND conf_year = \"2024\" ";

			$r_check = mysqli_query($link, $q_check);

			if (mysqli_num_rows($r_check) == 1)
			{
				print "<font color= \"red\">You have already registered for this training.  If you need to modify your
				information please contact <a href= \"mailto:ymsanchez@ucdavis.edu\">Yadira Sanchez</a>.<br></font>";
				$valid_form = false;
			}

			// move files from temporary location to server subdirectory

			$upload_doc_file = basename($_FILES["doc_location"]["name"]);
			$upload_date = date("c");

			//get the highest key number attach to the beginning of the file name to avoid duplicate names
			$q_maxid = "SELECT MAX(reg_id) FROM cme_reg";
			$r_maxid = mysqli_query($link, $q_maxid);
			$row_maxid = mysqli_fetch_row($r_maxid);

			$upload_id = $row_maxid[0] + 1;



//			$doc_link = $upload_doc_dir.basename($_FILES["doc_location"]["name"]);
			$doc_link = $upload_doc_dir.$upload_id.$upload_doc_file;
			$doc_name = $upload_id.$upload_doc_file;
			$doc_hash = MD5($upload_id.$upload_doc_file);

// check required fields
			if (!$fname)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter your first name.<br></font>";
				$valid_form = false;
			}
			if (!$lname)	// verify last name is entered
			{
				print "<font color= \"red\">Please enter your last name.<br></font>";
				$valid_form = false;
			}
			if ((!$kerb_id) && (!$no_kerberos))// verify Kerberos ID is entered
			{
				print "<font color= \"red\">Please enter your Kerberos login ID.<br></font>";
				$valid_form = false;
			}
			if ((!$md) && (!$dro)	&& (!$phd) && (!$other_doc))// verify degree is entered
			{
				print "<font color= \"red\">Please specify your degree.<br></font>";
				$valid_form = false;
			}
			if ($other_doc)
			{
				if (!$doc_spec)
				{
					print "<font color= \"red\">Please specify your other degree.<br></font>";
				}
			}
			if (!$address)	// verify address is entered
			{
				print "<font color= \"red\">Please enter your address.<br></font>";
				$valid_form = false;
			}
			if (!$city)	// verify city is entered
			{
				print "<font color= \"red\">Please enter your city.<br></font>";
				$valid_form = false;
			}
			if (!$state)	// verify state is entered
			{
				print "<font color= \"red\">Please enter your state.<br></font>";
				$valid_form = false;
			}
			if (!$zip)	// verify zip code is entered
			{
				print "<font color= \"red\">Please enter your zip code.<br></font>";
				$valid_form = false;
			}
			if (!$phone)	// verify last name is entered
			{
				print "<font color= \"red\">Please enter your phone number.<br></font>";
				$valid_form = false;
			}
			if (!$email)	// verify last name is entered
			{
				print "<font color= \"red\">Please enter your e-mail address.<br></font>";
				$valid_form = false;
			}
			if ($email)			// verify e-mail address syntax is correct
			{
				if (!(preg_match("/@.+\\./", $email)))
				{
					print "<font color= \"red\">The syntax of your e-mail address is incorrect.  Please re-enter.<br></font>";
					$valid_form = false;
				}
			}
			if ($alt_email)			// verify e-mail address syntax is correct
			{
				if (!(preg_match("/@.+\\./", $alt_email)))
				{
					print "<font color= \"red\">The syntax of your CC e-mail address is incorrect.  Please re-enter.<br></font>";
					$valid_form = false;
				}
			}
			if (!$specialty)	// verify specialty is selected
			{
				print "<font color= \"red\">Please enter your primary medical specialty.<br></font>";
				$valid_form = false;
			}

			if ($ctsc_affiliation == "Other")			// verify e-mail address syntax is correct
			{
				if (!$ctsc_affiliation_other)
				{
					print "<font color= \"red\">Please specify your CTSC affiliation.<br></font>";
					$valid_form = false;
				}
			}

			if (!$employer)	// verify employer is selected
			{
				print "<font color= \"red\">Please enter your affiliation/employer.<br></font>";
				$valid_form = false;
			}
			if (!$dept)	// verify specialty is selected
			{
				print "<font color= \"red\">Please enter your department.<br></font>";
				$valid_form = false;
			}
			if (!$position)	// verify specialty is selected
			{
				print "<font color= \"red\">Please enter your position.<br></font>";
				$valid_form = false;
			}

			if ((!$research_interest) && (!$upload_doc_file))	// verify statement or document included
			{
				print "<font color= \"red\">Please state your research interest.<br></font>";
				$valid_form = false;
			}

//			if (!$cmec)	// verify CME Credits are required
//			{
//				print "<font color= \"red\">Please specify whether you require CME credits.<br></font>";
//				$valid_form = false;
//			}

//			if (!$last_four)	// verify specialty is selected
//			{
//				print "<font color= \"red\">Please enter the last four digits of your SSN.<br></font>";
//				$valid_form = false;
//			}

			//if ((!$check_pay) && ((!$chart) && (!$account)))
			if (!$chart)
			{
				print "<font color= \"red\">Please enter your payment method.<br></font>";
				$valid_form = false;
			}
//			if ($sub)
//			{
//				if (!$chart)
//				{
//					print "<font color= \"red\">Please specify recharge account.<br></font>";
//					$valid_form = false;
//				}
//			}
//			if ($chart)
//			{
//				if (!$sub)
//				{
//					print "<font color= \"red\">Please specify recharge loc.<br></font>";
//					$valid_form = false;
//				}
//			}

			if (!$cont_first)
			{
				print "<font color= \"red\">Please specify the first name of the recharge account contact.<br></font>";
				$valid_form = false;
			}

			if (!$cont_last)
			{
				print "<font color= \"red\">Please specify the last name of the recharge account contact.<br></font>";
				$valid_form = false;
			}

			if (!$cont_phone)
			{
				print "<font color= \"red\">Please specify the phone number of the recharge account contact.<br></font>";
				$valid_form = false;
			}

// after verifying required fields check the file upload
if ($valid_form == true)
{
	// verfify valid form upload if a file is uploaded
	if ($upload_doc_file)
	{

			// verify file is in PDF format
			if ($_FILES["doc_location"]["type"] != "application/pdf")
			{
				print "<font color=\"#FF0000\">Invalid file type.  You must upload a PDF file.</font><br>";
				$valid_form = false;
			}


			elseif (!move_uploaded_file($_FILES["doc_location"]["tmp_name"], $doc_link))	// verify file is attached
			{
				print "<font color= \"red\">Your data file has not been uploaded.<br></font>";
//				print_r($_FILES);
				print "<p>$upload_doc_file<p>";
				$valid_form = false;
			}
	} // end if $upload_doc_file

//			$file_type = $_FILES["doc_location"]["type"];
//			print "Results:  1-$doc_link, 2-$doc_hash, 3-$upload_doc_file, 4-$upload_date, 5-$file_type END<br>";


} // end if $valid_field true after checking required fields


			if ($valid_form == true)
			{

				// Build an identifier for the request
				$q_regid = "SELECT MAX(reg_id) FROM cme_reg"; // GET current highest key
				$r_regid = mysqli_query($link, $q_regid);
				$row_regid = mysqli_fetch_row($r_regid);

				$wait = "0";
				$today = getdate();	//get today's date
				$today_date = $today[yday];	//get the Nth day of the year (ex. the yday for January 4 would be 4)
				if ($today_date > 249) $wait = "1";  // September 3

				$conf_year = "2024";
				$conf_num = "CME";
				$conf_id = $row_regid[0] + 1;	// add 1 to the highest key so the id will be equal to the new highest upon insert
				$conf_num .= "$conf_id";

				$reg_date = date(c);
				$reg_ip = $_SERVER['REMOTE_ADDR'];  //Get the IP address of the computer submitting the registration
				$course = "Introduction to Clinical Research";

				// reg fee is $850 unless employed by UCD, then it is $750
				$reg_fee = 450;
				if ($ucd_affiliate == "1") $reg_fee = 350;
				if ($ucd_student == "1") $reg_fee = 0;
				//if ($check_pay <> "yes") $reg_fee = 350; // if not paying by check a recharge account is used.  Recharge implies UCD affiliation and fee is $350

				//populate degree field based on entries
				if ($md == "yes") $degree .= "MD ";
				if ($dro == "yes") $degree .= "DO ";
				if ($phd == "yes") $degree .= "PhD ";
				if ($other_doc == "yes") $degree .= "$doc_spec ";

				// enter the information in the database
				$q_insert = "INSERT into cme_reg (course, fname, lname, mname, kerb_id, md, dro, phd, other_doc, doc_spec, address, city, state,
				zip, phone, fax, email, alt_email, specialty, employer, dept, position, last_four, ucd, sub, chart, acct, cont_first, cont_last,
				cont_phone, check_pay, cmec, veg, diet, lodge, disability, reg_fee, reg_date, reg_ip, conf_num, conf_year, wait, vegan, no_kerberos, ctsc_affiliation, ctsc_affiliation_other, research_interest, dafis_pay, doc_link, doc_hash, doc_name, degree,
				ucd_affiliate, ucd_student)
				VALUES (\"$course\", \"$fname\", \"$lname\", \"$mname\", \"$kerb_id\", \"$md\", \"$dro\", \"$phd\", \"$other_doc\", \"$doc_spec\",
				\"$address\", \"$city\", \"$state\", \"$zip\", \"$phone\", \"$fax\", \"$email\", \"$alt_email\", \"$specialty\", \"$employer\", \"$dept\",
				 \"$position\", \"$last_four\", \"$ucd\", \"$sub\", \"$chart\", \"$acct\", \"$cont_first\", \"$cont_last\",
				 \"$cont_phone\", \"$check_pay\", \"$cmec\", \"$veg\", \"$diet\", \"$lodge\", \"$disability\", \"$reg_fee\", \"$reg_date\",
				  \"$reg_ip\", \"$conf_num\", \"$conf_year\", \"$wait\", \"$vegan\", \"$no_kerberos\", \"$ctsc_affiliation\", \"$ctsc_affiliation_other\", \"$research_interest\", \"$dafis_pay\", \"$doc_link\", \"$doc_hash\", \"$doc_name\", \"$degree\",
					\"$ucd_affiliate\", \"$ucd_student\")";

				$r_insert = mysqli_query($link, $q_insert);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "Thank you $fname.  Your registration has been submitted.  A confirmation message has been sent to $email. <p>";
					print "<br><a href=\"http://www.ucdmc.ucdavis.edu/internalmedicine/general/clin-epi/index.html\">
					Back to Course page</a>";

//					print "<p>$q_insert  $today_date";

					// e-mail code here

					$pay_method = "by UC Davis account recharge (for faculty, staff, and trainees)"; // recharge account $sub $chart $acct
					if ($check_pay == "yes") $pay_method = "by check";


					$to = $email;
					$ccemail = "ymsanchez@ucdavis.edu";
					if ($alt_email) $ccemail .= ", $alt_email";
					$subject = "Introduction to Clinical Research Confirmation";

					$contents = "Hello $fname, \n\nThank you for registering for Introduction to Clinical Research, September 10-16, and September 18-20, 2024. Your confirmation number is $conf_num.  Please retain this message for your records. ";

					if ($wait == "1") $contents .= "You have been placed on the waiting list.  We will contact you if space becomes available. ";

					$contents .= "We will be confirming acceptance into the course after September 6, 2024.\n\n";

					$contents .= "Books and course information will be distributed at a mandatory orientation meeting in early September.  Notification will be forwarded later.\n\n";

					if (!$kerb_id) $contents .= "A Kerberos ID number is required to access course materials. If you did not provide a Kerberos ID during the registration process, you must provide one prior to the first day of class.\n\n";

					$contents .= "Your registration fee is $$reg_fee payable $pay_method.  If you have any questions please contact Yadira Sanchez at 916-734-2177 or by email at ymsanchez@ucdavis.edu.\n\n";

					$from = "ymsanchez@ucdavis.edu";
					$header = "From: \"Continuing Medical Education\" <".$from.">\r\n";
					$header.= "CC:".$ccemail."\r\n";

					mail($to, $subject, $contents, $header);

				}
				else
				{
					print "Your registration was not submitted, please try again later<br>$q_insert";
				}
			} // end if valid_form = true
		} // end if preg_match $sub_reg

		if ((!$sub_reg) || (($sub_reg == "Submit Registration") && ($valid_form == false)))
		{
			// Secure path:  https://secure.phs.ucdavis.edu/education/
			print "<form enctype= \"multipart/form-data\" method= \"post\" action= \"clinepi_reg.php\">";
//			print "<form enctype= \"multipart/form-data\" method= \"post\" action= \"https://secure.phs.ucdavis.edu/phs-public/education/clinepi_reg.php\">";
			print "<table>";
				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\" colspan= \"1\"><b>First Name</b></td>";
					print "<td valign= \"top\" colspan= \"1\"><b>Middle Initial</b></td>";
					print "<td valign= \"top\" colspan= \"1\"><b>Last Name</b></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\"><input type= \"text\" name= \"fname\" value= \"$fname\"></td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"mname\" value= \"$mname\"></td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"lname\" value= \"$lname\"></td>";
				print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\"><input type= \"checkbox\" name= \"ucd_affiliate\" value= \"1\" ";
					if ($ucd_affiliate == "1") print "checked";
					print ">&nbsp;&nbsp;<strong>I am affiliated with UC Davis</strong></td>";
					print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\"><input type= \"checkbox\" name= \"ucd_student\" value= \"1\" ";
					if ($ucd_student == "1") print "checked";
					print ">&nbsp;&nbsp;<strong>I am a UC Davis Student.</strong></td>";
					print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";



				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\" colspan= \"3\"><b>Kerberos Login</b>&nbsp;&nbsp;(required for access to course materials)</td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" colspan= \"3\"><input type= \"text\" name= \"kerb_id\" value= \"$kerb_id\"></td>";
				print "</tr></table></td>";
				print "</tr>";


//				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\"><input type= \"checkbox\" name= \"no_kerberos\" value= \"yes\" ";
					if ($no_kerberos == "yes") print "checked";
					print ">&nbsp;&nbsp;I do not have have Kerberos login, but will obtain one prior to the
					first day of the course.</td>";
					print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"8\"><b>Degree:</b></td>";
				print "</tr>";
				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\"><input type= \"checkbox\" name= \"md\" value= \"yes\" ";
					if ($md == "yes") print "checked";
					print "></td>";
					print "<td valign= \"top\">M.D.</td>";
				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\"><input type= \"checkbox\" name= \"dro\" value= \"yes\" ";
					if ($dro == "yes") print "checked";
					print "></td>";
					print "<td valign= \"top\">D.O.</td>";
				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\"><input type= \"checkbox\" name= \"phd\" value= \"yes\" ";
					if ($phd == "yes") print "checked";
					print "></td>";
					print "<td valign= \"top\">Ph.D.</td>";
				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\"><input type= \"checkbox\" name= \"other_doc\" value= \"yes\" ";
					if ($other_doc == "yes") print "checked";
					print "></td>";
					print "<td valign= \"top\">Other</td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"doc_spec\" value= \"$doc_spec\"></td>";
				print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"8\"><b>Mailing address:</b></td>";
				print "</tr>";

				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\">Address:</td>";
					print "<td valign= \"top\" colspan= \"6\"><input type= \"text\" name= \"address\" value= \"$address\" size= \"63\"></td>";
				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\">City:</td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"city\" value= \"$city\"></td>";
					print "<td valign= \"top\">State:</td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"state\" value= \"$state\"size = \"2\"></td>";
					print "<td valign= \"top\">Zip:</td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"zip\" value= \"$zip\"></td>";
				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\">Phone:</td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"phone\" value= \"$phone\"></td>";
				print "</tr>";

//				print "<tr>";
//					print "<td valign= \"top\">Fax:</td>";
//					print "<td valign= \"top\"><input type= \"text\" name= \"fax\" value= \"$fax\"></td>";
//				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\">E-mail: </td>";
					print "<td valign= \"top\" colspan= \"6\"><input type= \"text\" name= \"email\" value= \"$email\" size= \"40\"><br>(Used for course-related communication)</td>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\">CC E-mail: </td>";
					print "<td valign= \"top\" colspan= \"6\"><input type= \"text\" name= \"alt_email\" value= \"$alt_email\" size= \"40\"><br>(Send registration confirmation to this address)</td>";

				print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
				print "<td colspan= \"5\"><table><tr>";
					print "<td valign= \"top\" colspan= \"2\"><b>Please indicate your primary medical specialty or field of graduate study</b></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" colspan= \"2\"><input type= \"text\" name= \"specialty\" value= \"$specialty\" size= \"60\"></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

			// CTSC Affiliation
				print "<tr>";
					print "<td colspan= \"4\"><b>Please select your CTSC affiliation if applicable:</b></td>";
				print "</tr>";

				print "<td><table><tr>";

				print "<tr>";
					print "<td colspan= \"1\" valign= \"top\"><select name= \"ctsc_affiliation\">";
					print "<option value= \"none\" ";
					if ($ctsc_affiliation == "none") print "selected";
					print ">Please select.....</option>\n";

					print "<option value= \"BIRCWH Scholar\" ";
					if ($ctsc_affiliation == "BIRCWH Scholar") print "selected";
					print ">BIRCWH Scholar</option>\n";

					print "<option value= \"K12 Scholar\" ";
					if ($ctsc_affiliation == "K12 Scholar") print "selected";
					print ">K12 Scholar</option>\n";

					print "<option value= \"MCRTP\" ";
					if ($ctsc_affiliation == "MCRTP") print "selected";
					print ">MCRTP</option>\n";

					print "<option value= \"T32 Scholar\" ";
					if ($ctsc_affiliation == "T32 Scholar") print "selected";
					print ">T32 Scholar</option>\n";

//					print "<option value= \"UNR/UNLV\" ";
//					if ($ctsc_affiliation == "UNR/UNLV") print "selected";
//					print ">UNR/UNLV</option>\n";

					print "<option value= \"Other\" ";
					if ($ctsc_affiliation == "Other") print "selected";
					print ">Other (Specify -->)</option>\n";


					print "</select>&nbsp;&nbsp;&nbsp;</td>";

					print "<td valign= \"top\" colspan= \"1\"><input type= \"text\" name= \"ctsc_affiliation_other\" value= \"$ctsc_affiliation_other\"></td>";

					print "</tr></table></td>";

				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"2\"><b>Institutional Affiliation/Employer:</b></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" colspan= \"2\"><input type= \"text\" name= \"employer\" value= \"$employer\" size= \"60\"></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"2\"><b>Department:</b></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" colspan= \"2\"><input type= \"text\" name= \"dept\" value= \"$dept\" size= \"60\"></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"2\"><b>Position or Title:</b></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" colspan= \"2\"><input type= \"text\" name= \"position\" value= \"$position\" size= \"60\"></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"8\"><b>Tuition: $350 UCD/UCDMC, $450 All Others - PAYMENT DEADLINE: September 6, 2024</b></td>";
				print "</tr>";

//				print "<tr>";
//				print "<td colspan= \"5\"><table><tr>";
//					print "<td valign= \"top\"><input type= \"checkbox\" name= \"ucd\" value= \"yes\" ";
//					if ($ucd == "yes") print "checked";
//					print "></td>";
//					print "<td valign= \"top\">Check this box if you are employed by or affiliated with UCD or UCDMC</td>";
//				print "</tr></table></td>";
//				print "</tr>";

				print "<tr><td valign= \"top colspan' \"6\">Cancellations after September 6, 2024 or \"no shows\" will not receive a refund.
				<br>Cancellations prior to September 6, 2024 will receive a refund with a service charge of $100.</td></tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"8\"><b>Enter Chart of Accounts (CoA). (Payment must be received before	enrollment is confirmed.)</b></td>";
				print "</tr>";

				//print "<tr><td>&nbsp;</td></tr>";

//				print "<tr>";
//					print "<td colspan = \"5\"><table><tr>";
//					print "<td valign= \"top\"><input type= \"checkbox\" name= \"check_pay\" value= \"yes\" ";
//					if ($check_pay == "yes") print "checked";
//					print ">&nbsp;&nbsp;</td>";
//					print "<td colspan= \"4\"valign= \"top\"><b>Check payable to UC Regents:</b><br> Send check to:<br>
//						   <a href= \"mailto:ymsanchez@ucdavis.edu\">Yadira Sanchez</a>
//						   <br>UC Davis Health<br>Department and Division of Internal Medicine<br>Division of General Medicine<br>
//						   4150 V Street, Suite 2400<br>Sacramento, CA 95817</td>";
//				print "</tr></table></td>";
//				print "</tr>";

//				print "<tr><td>&nbsp;</td></tr>";

//				print "<tr>";
//				print "<td colspan= \"5\"><table><tr>";
//					print "<td valign= \"top\" colspan= \"8\">";

//					print "<input type= \"checkbox\" name= \"dafis_pay\" value= \"yes\" ";
//					if ($dafis_pay == "yes") print "checked";
//					print ">&nbsp;&nbsp;";

//					print "<b>Chart of Accounts:</b></td>";
//				print "</tr>";

				print "<tr>";
//					print "<td valign= \"top\">Loc:</td>";
					print "<td valign= \"top\">Chart String:</td>";
					//print "<td valign= \"top\">Sub-Account:</td>";
				print "</tr>";

				print "<tr>";
//					print "<td valign= \"top\"><input type= \"text\" name= \"sub\" size= \"7\" maxlength= \"1\" value= \"$sub\"></td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"chart\" size= \"60\" maxlength= \"70\" value= \"$chart\"></td>";
					//print "<td valign= \"top\"><input type= \"text\" name= \"acct\" size= \"7\" maxlength= \"5\" value= \"$acct\"></td>";
				print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"8\"><b>Payment Contact Person:</b></td>";
				print "</tr>";

				print "<tr>";
				print "<td><table><tr>";
					print "<td valign= \"top\">First Name:</td>";
					print "<td valign= \"top\">Last Name:</td>";
					print "<td valign= \"top\">Phone:</td>";
				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\"><input type= \"text\" name= \"cont_first\" value= \"$cont_first\"></td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"cont_last\" value= \"$cont_last\"></td>";
					print "<td valign= \"top\"><input type= \"text\" name= \"cont_phone\" value= \"$cont_phone\"></td>";
				print "</tr></table></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"8\"><b>Please briefly describe your proposed
					research project or topic of interest:</b>
					<br>(Minimum 2 sentences - Required for
					acceptance into course and appropriate group assignment.)</td>";
				print "</tr>";

//					<br><font color=\"#FF0000\">You may either upload a document or enter description in the text box below.</font>



 		      //  print "<tr><td>&nbsp;</td></tr>";

			//    print "<tr>";
		  //      	print "<td colspan=\"4\"><strong>Upload proposed topic here:</strong>&nbsp;&nbsp;";
		//   			print "<input type= \"hidden\" name= \"MAX_FILE_SIZE\" value= \"15000000\">";
	//				print "<input type= \"file\" name= \"doc_location\" value= \"\" size= \"30\"></td>";
//		        print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td valign= \"top\" colspan= \"8\"><textarea name=\"research_interest\" rows=\"6\"
					cols=\"55\">$research_interest</textarea></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";


				print "<tr><td>&nbsp;</td></tr>";

//				print "<tr>";
//					print "<td valign= \"top\" colspan= \"8\"><b>Continuing Medical Education Credits:</b></td>";
//				print "</tr>";

//				print "<tr>";
//				print "<td><table><tr>";
//					print "<td valign= \"top\"><input type= \"radio\" name= \"cmec\" value= \"yes\" ";
//					if ($cmec == "yes") print "checked";
//					print "></td>";
//					print "<td valign= \"top\" colspan= \"1\">CME Credits Desired&nbsp;&nbsp;&nbsp;&nbsp;</td>";

//					print "<td valign= \"top\"><input type= \"radio\" name= \"cmec\" value= \"no\" ";
////					if ($cmec == "no") print "checked";
////					print "></td>";
//					print "<td valign= \"top\" colspan= \"1\">I do not desire CME credits for this course</td>";

//				print "</tr></table></td>";
//				print "</tr>";


//				print "<tr><td>&nbsp;</td></tr>";

//				print "<tr>";
//					print "<td valign= \"top\" colspan= \"3\"><b>Last four digits of Social Security  Number (for transcript purposes only):</b></td>";
//				print "</tr>";

//				print "<tr>";
//					print "<td valign= \"top\" colspan= \"1\"><input type= \"text\" name= \"last_four\" value= \"$last_four\"></td>";
//				print "</tr></table></td>";
//				print "</tr>";


//				print "<tr><td>&nbsp;</td></tr>";

//				print "<tr>";
//					print "<td valign= \"top\" colspan= \"8\"><b>Special Dietary Needs:</b></td>";
//				print "</tr>";

//				print "<tr>";
//				print "<td><table><tr>";
//					print "<td valign= \"top\"><input type= \"checkbox\" name= \"veg\" value= \"yes\" ";
//					if ($veg == "yes") print "checked";
//					print "></td>";
//					print "<td valign= \"top\" colspan= \"1\">Vegetarian&nbsp;&nbsp;&nbsp;</td>";

//					print "<td valign= \"top\"><input type= \"checkbox\" name= \"vegan\" value= \"yes\" ";
//					if ($vegan == "yes") print "checked";
//					print "></td>";
//					print "<td valign= \"top\" colspan= \"1\">Vegan</td>";
//				print "</tr></table></td>";
//				print "</tr>";

//				print "<tr><td>&nbsp;</td></tr>";

//				print "<tr>";
//				print "<td colspan= \"5\"><table><tr>";
//					print "<td valign= \"top\" colspan= \"1\">Other Special Dietary need (specify)</td>";
//					print "<td valign= \"top\"><input type= \"text\" name= \"diet\" value= \"$diet\" size= \"60\"></td>";
//				print "</tr></table></td>";
//				print "</tr>";


				print "<tr><td>&nbsp;</td></tr>";

				//				print "<tr>";
//					print "<td valign= \"top\" colspan= \"8\"><b>Housing Accomodations:</b></td>";
//				print "</tr>";

//				print "<tr>";
//				print "<td colspan= \"5\"><tr><table>";
//					print "<td valign= \"top\"><input type= \"checkbox\" name= \"lodge\" value= \"yes\" ";
//					if ($lodge == "yes") print "checked";
//					print "></td>";
//					print "<td valign= \"top\" colspan= \"1\">Send Davis lodging information</td>";
//				print "</tr>";

//				print "<tr>";
//					print "<td valign= \"top\"><input type= \"checkbox\" name= \"disability\" value= \"yes\" ";
//					if ($disability == "yes") print "checked";
//					print "></td>";
//					print "<td valign= \"top\" colspan= \"1\">Contact me regarding disability accomodations</td>";
//				print "</tr></table></td>";
//				print "</tr>";


				print "<tr><td>&nbsp;</td></tr>";
// CAPTCHA CODE	** enter this path when made secure:  https://secure.phs.ucdavis.edu/phs-public/education/
// .src:  http://phs.ucdavis.edu/education/
				print "<tr>";
					print "<td align= \"left\"><strong>Please enter the security code below</strong>
					<p>
					<img id=\"captcha\" src=\"securimage/securimage_show.php\" alt=\"CAPTCHA Image\" />
					</p>
					Enter code here: &nbsp;<input type=\"text\" name=\"captcha_code\" size=\"10\" maxlength=\"6\" />&nbsp;&nbsp;&nbsp;
					<a href=\"#\" onclick=\"document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false\">Reload Image</a>
					</td>";
				print "</tr>";

// END CAPTCHA CODE

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><input type= \"submit\" name= \"sub_reg\" value= \"Submit Registration\">&nbsp;&nbsp;";
					print "<input type= \"submit\" name= \"sub_reg\" value= \"Do Not Submit\"></td>";
				print "</tr>";
			print "</table>";
//			print "<input type= \"hidden\" name= \"reg_key\" value= \"$reg_key\">";
			print "</form>";

//			$serve = $_SERVER['SERVER_NAME'];
//			print "$serve $__ROOTDIR Parent Dir $parentdir";
		} // end if !$sub_reg
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
