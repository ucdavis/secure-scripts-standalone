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
 
 
	<div id="breadcrumb" class="breadcrumb" align="left"><!-- InstanceBeginEditable name="breadcrumbs" --><a href="<?=$bcROOT?>/education.php">Education</a> -> <a href="<?=$bcROOT?>/education/cme.php">CME</a> -> <a href="<?=$bcROOT?>/education/clinepi.php">Clinical Epidemiology and Study Design</a> -> Evaluation<!-- InstanceEndEditable --></div> <!-- breadcrumb -->
 
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
<h1>Clinical Epidemiology and Study Design Registration</h1>

<?php

require_once "/usr/local/secure_www/db.config.php"; 
 
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

$day1 = $_POST["day1"];
$eval_year = $_POST["eval_year"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$physician = $_POST["physician"];
$phys_spec = $_POST["phys_spec"];
$other_phys = $_POST["other_phys"];
$other_phys_spec = $_POST["other_phys_spec"];
$course_date = $_POST["course_date"];
$course_tech = $_POST["course_tech"];
$course_obj = $_POST["course_obj"];
$course_needs = $_POST["course_needs"];
$course_material = $_POST["course_material"];
$course_expect = $_POST["course_expect"];
$course_present = $_POST["course_present"];
$course_overall = $_POST["course_overall"];
$course_aspects_best = $_POST["course_aspects_best"];
$course_aspects_weak = $_POST["course_aspects_weak"];
$course_syllabus = $_POST["course_syllabus"];
$course_text = $_POST["course_text"];
$course_amenities = $_POST["course_amenities"];
$course_support = $_POST["course_support"];
$course_flier = $_POST["course_flier"];
$course_colleague = $_POST["course_colleague"];
$course_super = $_POST["course_super"];
$course_email = $_POST["course_email"];
$course_other = $_POST["course_other"];
$course_email_spec = $_POST["course_email_spec"];
$course_offer = $_POST["course_offer"];
$course_barriers = $_POST["course_barriers"];
$course_conflict = $_POST["course_conflict"];
$course_comments = $_POST["course_comments"];
$fac1_name = $_POST["fac1_name"];
$fac1_title = $_POST["fac1_title"];
$fac1_rate = $_POST["fac1_rate"];
$fac1_comments = $_POST["fac1_comments"];
$fac2_name = $_POST["fac2_name"];
$fac2_title = $_POST["fac2_title"];
$fac2_rate = $_POST["fac2_rate"];
$fac2_comments = $_POST["fac2_comments"];
$fac3_name = $_POST["fac3_name"];
$fac3_title = $_POST["fac3_title"];
$fac3_rate = $_POST["fac3_rate"];
$fac3_comments = $_POST["fac3_comments"];
$fac4_name = $_POST["fac4_name"];
$fac4_title = $_POST["fac4_title"];
$fac4_rate = $_POST["fac4_rate"];
$fac4_comments = $_POST["fac4_comments"];
$fac5_name = $_POST["fac5_name"];
$fac5_title = $_POST["fac5_title"];
$fac5_rate = $_POST["fac5_rate"];
$fac5_comments = $_POST["fac5_comments"];
$fac6_name = $_POST["fac6_name"];
$fac6_title = $_POST["fac6_title"];
$fac6_rate = $_POST["fac6_rate"];
$fac6_comments = $_POST["fac6_comments"];
$fac7_name = $_POST["fac7_name"];
$fac7_title = $_POST["fac7_title"];
$fac7_rate = $_POST["fac7_rate"];
$fac7_comments = $_POST["fac7_comments"];
$fac8_name = $_POST["fac8_name"];
$fac8_title = $_POST["fac8_title"];
$fac8_rate = $_POST["fac8_rate"];
$fac8_comments = $_POST["fac8_comments"];
$fac_leader = $_POST["fac_leader"];
$fac_leader_rate = $_POST["fac_leader_rate"];
$fac_leader_comments = $_POST["fac_leader_comments"];
$fac_leader2 = $_POST["fac_leader2"];
$fac_leader2_rate = $_POST["fac_leader2_rate"];
$fac_leader2_comments = $_POST["fac_leader2_comments"];

$sub_eval = $_POST["sub_eval"];

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

	 $email = filter_var($email, FILTER_SANITIZE_EMAIL);
	 
     $fname = filter_var($fname, FILTER_SANITIZE_STRING);
     $lname = filter_var($lname, FILTER_SANITIZE_STRING);
     $phys_spec = filter_var($phys_spec, FILTER_SANITIZE_STRING);
	 $other_phys_spec = filter_var($other_phys_spec, FILTER_SANITIZE_STRING);
	 $course_tech = filter_var($course_tech, FILTER_SANITIZE_STRING);
	 $course_aspects_best = filter_var($course_aspects_best, FILTER_SANITIZE_STRING);
	 $course_aspects_weak = filter_var($course_aspects_weak, FILTER_SANITIZE_STRING);
     $course_other_spec = filter_var($course_other_spec, FILTER_SANITIZE_STRING);
     $course_offer = filter_var($course_offer, FILTER_SANITIZE_STRING);
	 $course_barriers = filter_var($course_barriers, FILTER_SANITIZE_STRING);
	 $course_conflict = filter_var($course_conflict, FILTER_SANITIZE_STRING);
	 $course_comments = filter_var($course_comments, FILTER_SANITIZE_STRING);
	 $fac1_comments = filter_var($fac1_comments, FILTER_SANITIZE_STRING);
	 $fac2_comments = filter_var($fac2_comments, FILTER_SANITIZE_STRING);
	 $fac3_comments = filter_var($fac3_comments, FILTER_SANITIZE_STRING);
	 $fac4_comments = filter_var($fac4_comments, FILTER_SANITIZE_STRING);
	 $fac5_comments = filter_var($fac5_comments, FILTER_SANITIZE_STRING);
	 $fac6_comments = filter_var($fac6_comments, FILTER_SANITIZE_STRING);
	 $fac7_comments = filter_var($fac7_comments, FILTER_SANITIZE_STRING);
	 $fac8_comments = filter_var($fac8_comments, FILTER_SANITIZE_STRING);
	 $fac_leader_comments = filter_var($fac_leader_comments, FILTER_SANITIZE_STRING);
	 $fac_leader2_comments = filter_var($fac_leader2_comments, FILTER_SANITIZE_STRING);
	
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept")))
	{
 		
		print "<div align= \"left\"><b><u>Clinical Epidemiology and Study Design Evaluation</u></b></div>";
print "$day1<p>";

		
		
		if ($sub_eval == "Closed")
		{
			print "<blockquote>";

			print "<table width= \"100%\">";

				print "<tr>";
					print "<td colspan= \"2\">
					<p>
					<strong>The Clinical Epidemiology and Study Design Evaluation is now closed.</strong> 
					<p>&nbsp;</p>";
					
				print "</tr>";
			print "</table>";			
		
			print "</blockquote>";	
		} // end sub_reg == closed
		

		if ($sub_eval == "Do Not Submit")
		{
			print "The evaluation was not submitted.<p><a href= \"https://secure.phs.ucdavis.edu/clinepi/clinepi_eval.php\">Return to Evaluation homepage</a>.";
			
		} // end sub_eval == Do Not Submit
		
		if (preg_match("/Submit Evaluation/", $sub_eval))
		{
			$valid_form = true;
			


// CAPTCHA VALIDATION		
		
//		include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/clinepi/securimage/securimage.php';
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


//			$q_check = "SELECT * FROM cme_reg WHERE fname = \"$fname\" AND lname= \"$lname\" AND conf_year = \"2009\" ";

//			$r_check = mysql_query($q_check);
			
//			if (mysql_num_rows($r_check) == 1)
//			{
//				print "<font color= \"red\">You have already registered for this training.  If you need to modify your 
//				information please contact <a href= \"mailto:acarrere@ucdavis.edu\">Amber Carrere</a>.<br></font>";
//				$valid_form = false;
//			}
			
			
		if ($day1 == "Friday")
		{
			if (!$course_obj)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for the course objectives.<br></font>";
				$valid_form = false;
			}
		
			if (!$course_needs)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for how the course objectives met your needs.<br></font>";
				$valid_form = false;
			}
		
			if (!$course_material)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for the course material.<br></font>";
				$valid_form = false;
			}

			if (!$course_expect)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for how the program met your expectations.<br></font>";
				$valid_form = false;
			}

			if (!$course_present)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for the course presentations.<br></font>";
				$valid_form = false;
			}

			if (!$course_overall)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter an overall rating for the course.<br></font>";
				$valid_form = false;
			}

			if (!$course_syllabus)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for the course syllabus.<br></font>";
				$valid_form = false;
			}

			if (!$course_text)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for the course text.<br></font>";
				$valid_form = false;
			}

			if (!$course_amenities)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for the course amenities.<br></font>";
				$valid_form = false;
			}

			if (!$course_support)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for the course computer support.<br></font>";
				$valid_form = false;
			}
		
			if ($fac_leader == "none")	// verify fac_leader
			{
				print "<font color= \"red\">Please select your small group leader.<br></font>";
				$valid_form = false;
			}
			if (!$fac_leader_rate)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for small group leader $fac_leader.<br></font>";
				$valid_form = false;
			}
//			if ($fac_leader2 <> "none")			// verify e-mail address syntax is correct
//			{
//				if (!$fac_leader2_rate)
//				{
//					print "<font color= \"red\">Please enter a rating for small group co-leader $fac_leader2.<br></font>";
//					$valid_form = false;
//				}
//			}	

		} // end if day1 == Friay validation
		
		
			if (!$fac1_rate)	// verify fac1_rate
			{
				print "<font color= \"red\">Please enter a rating for $fac1_name ($fac1_title).<br></font>";
				$valid_form = false;
			}
			if (!$fac2_rate)	// verify fac2_rate
			{
				print "<font color= \"red\">Please enter a rating for $fac2_name ($fac2_title).<br></font>";
				$valid_form = false;
			}
			if (!$fac3_rate)	// verify fac3_rate
			{
				print "<font color= \"red\">Please enter a rating for $fac3_name ($fac3_title).<br></font>";
				$valid_form = false;
			}
			if (!$fac4_rate)	// verify fac4_rate
			{
				print "<font color= \"red\">Please enter a rating for $fac4_name ($fac4_title).<br></font>";
				$valid_form = false;
			}
	if ($day1 <> "Thursday")
	{
			if (!$fac5_rate)	// verify fac5_rate
			{
				print "<font color= \"red\">Please enter a rating for $fac5_name ($fac5_title).<br></font>";
				$valid_form = false;
			}
	} // end if day1 <> Thursday
	
//	if ($day1 == "Friday")
//	{
//			if (!$fac6_rate)	// verify fac6_rate
//			{
//				print "<font color= \"red\">Please enter a rating for $fac6_name ($fac6_title).<br></font>";
//				$valid_form = false;
//			}
//	} // end if $day1 == friday
	
//			if (!$lname)	// verify last name is entered
//			{
//				print "<font color= \"red\">Please enter your last name.<br></font>";
//				$valid_form = false;
//			}
//			if ((!$md) && (!$dro)	&& (!$phd) && (!$other_doc))// verify degree is entered
//			{
//				print "<font color= \"red\">Please specify your medical degree.<br></font>";
//				$valid_form = false;
//			}
//			if ($other_doc)
//			{
//				if (!$doc_spec)
//				{
//					print "<font color= \"red\">Please specify your other medical degree.<br></font>";
//				}
//			}
//			if (!$address)	// verify address is entered
//			{
//				print "<font color= \"red\">Please enter your address.<br></font>";
//				$valid_form = false;
//			}
//			if (!$city)	// verify city is entered
//			{
//				print "<font color= \"red\">Please enter your city.<br></font>";
//				$valid_form = false;
//			}
//			if (!$state)	// verify state is entered
//			{
//				print "<font color= \"red\">Please enter your state.<br></font>";
//				$valid_form = false;
//			}
//			if (!$zip)	// verify zip code is entered
//			{
//				print "<font color= \"red\">Please enter your zip code.<br></font>";
//				$valid_form = false;
//			}
//			if (!$phone)	// verify last name is entered
//			{
//				print "<font color= \"red\">Please enter your phone number.<br></font>";
//				$valid_form = false;
//			}
//			if (!$email)	// verify last name is entered
//			{
//				print "<font color= \"red\">Please enter your e-mail address.<br></font>";
//				$valid_form = false;
//			}
//			if ($email)			// verify e-mail address syntax is correct
//			{
//				if (!(preg_match("/@.+\\./", $email)))
//				{
//					print "<font color= \"red\">The syntax of your e-mail address is incorrect.  Please re-enter.<br></font>";
//					$valid_form = false;
//				}
//			}	
//			if (!$specialty)	// verify specialty is selected
//			{
//				print "<font color= \"red\">Please enter your primary medical specialty.<br></font>";
//				$valid_form = false;
//			}
//			if (!$employer)	// verify employer is selected
//			{
//				print "<font color= \"red\">Please enter your affiliation/employer.<br></font>";
//				$valid_form = false;
//			}
//			if (!$dept)	// verify specialty is selected
//			{
//				print "<font color= \"red\">Please enter your department.<br></font>";
//				$valid_form = false;
//			}
//			if (!$position)	// verify specialty is selected
//			{
//				print "<font color= \"red\">Please enter your position.<br></font>";
//				$valid_form = false;
//			}
//			if (!$last_four)	// verify specialty is selected
//			{
//				print "<font color= \"red\">Please enter the last four digits of your SSN.<br></font>";
//				$valid_form = false;
//			}

//			if ((!$check_pay) && ((!$sub) && (!$chart) && (!$account)))
//			{
//				print "<font color= \"red\">Please enter your payment method.<br></font>";
//				$valid_form = false;
//			}
//			if ($sub)
//			{
//				if (!$chart)
//				{
//					print "<font color= \"red\">Please specify recharge account.<br></font>";
//					$valid_form = false;
//				}
//				if (!$cont_first)
//				{
//					print "<font color= \"red\">Please specify the first name of the recharge account contact.<br></font>";
//					$valid_form = false;
//				}
//				if (!$cont_last)
//				{
//					print "<font color= \"red\">Please specify the last name of the recharge account contact.<br></font>";
//					$valid_form = false;
//				}
//				if (!$cont_phone)
//				{
//					print "<font color= \"red\">Please specify the phone number of the recharge account contact.<br></font>";
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
			
			if ($valid_form == true)
			{

				// Build an identifier for the request
//				$q_regid = "SELECT MAX(reg_id) FROM cme_reg"; // GET current highest key
//				$r_regid = mysql_query($q_regid);	
//				$row_regid = mysql_fetch_array($r_regid);
				
//				$wait = "0";
//				$today = getdate();	//get today's date
//				$today_date = $today[yday];	//get the Nth day of the year (ex. the yday for January 4 would be 4)
//				if ($today_date > 162) $wait = "1";
				
				$eval_year = "2017";
//				$conf_num = "CME";				
//				$conf_id = $row_regid[0] + 1;	// add 1 to the highest key so the id will be equal to the new highest upon insert
//				$conf_num .= "$conf_id";
				
				$sub_date = date(c);
				$sub_ip = $_SERVER['REMOTE_ADDR'];  //Get the IP address of the computer submitting the registration
//				$course = "Clinical Epidemiology and Study Design";
				
				// reg fee is $600 unless employed by UCD, then it is $500
//				$reg_fee = 600;
//				if ($ucd == "yes") $reg_fee = 500;

				// enter the information in the database
				$q_insert = "INSERT into clinepi_survey (eval_year, day1, day2, day3, day4, day5, fname, lname, email, physician,
				phys_spec, other_phys, other_phys_spec, course_date, course_tech, course_obj, course_needs, course_material,
				course_expect, course_present, course_overall, course_aspects_best, course_aspects_weak, course_syllabus, 
				course_text, course_amenities, course_support, course_flier, course_colleague, course_super, course_email, 
				course_other, course_other_spec, course_offer, course_barriers, course_conflict, course_comments, fac1_name, 
				fac1_title, fac1_rate, fac1_comments, fac2_name, fac2_title, fac2_rate, fac2_comments, fac3_name, fac3_title,
				fac3_rate, fac3_comments, fac4_name, fac4_title, fac4_rate, fac4_comments, fac5_name, fac5_title, fac5_rate,
				fac5_comments, fac6_name, fac6_title, fac6_rate, fac6_comments, fac7_name, fac7_title, fac7_rate, fac7_comments,
				fac8_name, fac8_title, fac8_rate, fac8_comments, fac_leader, fac_leader_rate, fac_leader_comments, 
				fac_leader2, fac_leader2_rate, fac_leader2_comments,sub_date, sub_ip)
				
				VALUES (\"$eval_year\", \"$day1\", \"$day2\", \"$day3\", \"$day4\", \"$day5\", \"$fname\", \"$lname\", 
				\"$email\", \"$physician\", \"$phys_spec\", \"$other_phys\", \"$other_phys_spec\", \"$course_date\", 
				\"$course_tech\", \"$course_obj\", \"$course_needs\", \"$course_material\", \"$course_expect\", \"$course_present\",
				\"$course_overall\", \"$course_aspects_best\", \"$course_aspects_weak\", \"$course_syllabus\", 
				\"$course_text\", \"$course_amenities\", \"$course_support\", \"$course_flier\", \"$course_colleague\", 
				\"$course_super\", \"$course_email\", \"$course_other\", \"$course_other_spec\", \"$course_offer\", 
				\"$course_barriers\", \"$course_conflict\", \"$course_comments\", \"$fac1_name\", \"$fac1_title\", \"$fac1_rate\",
				\"$fac1_comments\", \"$fac2_name\", \"$fac2_title\", \"$fac2_rate\", \"$fac2_comments\", \"$fac3_name\", 
				\"$fac3_title\", \"$fac3_rate\", \"$fac3_comments\", \"$fac4_name\", \"$fac4_title\", \"$fac4_rate\", 
				\"$fac4_comments\", \"$fac5_name\", \"$fac5_title\", \"$fac5_rate\", \"$fac5_comments\", \"$fac6_name\", 
				\"$fac6_title\", \"$fac6_rate\", \"$fac6_comments\", \"$fac7_name\", \"$fac7_title\", \"$fac7_rate\", 
				\"$fac7_comments\", \"$fac8_name\", \"$fac8_title\", \"$fac8_rate\", \"$fac8_comments\", \"$fac_leader\", 
				\"$fac_leader_rate\", \"$fac_leader_comments\", \"$fac_leader2\", \"$fac_leader2_rate\",
				\"$fac_leader2_comments\",\"$sub_date\", \"$sub_ip\")";

				
				$r_insert = mysqli_query($link, $q_insert);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "Thank you.  Your evaluation has been submitted. <p>";
					print "<br><a href= \"https://secure.phs.ucdavis.edu/clinepi/clinepi_eval.php\">Back to Evaluation homepage</a></a>";
					
//					print "<p>$q_insert  $today_date";
					
					// e-mail code here
					
//					$pay_method = "by DaFIS recharge account $sub $chart $acct";
//					if ($check_pay == "yes") $pay_method = "by check";

					
//					$to = $email;
///					$ccemail = "bawickson@ucdavis.edu";
//					$subject = "Clinical Epidemiology and Study Design Confirmation";

//					$contents = "Hello $fname, \n\nThank you for registering for Clinical Epidemiology and Study Design, July 6-10, 2009. Your confirmation number is $conf_num.  Please retain this message for your records.\n\n";
					
//					if ($wait == "1") $contents .= "You have been placed on the waiting list.  We will contact you if space becomes available.\n\n";
					
//					$contents .= "Your registration fee is $$reg_fee payable $pay_method.  If you have any questions please contact Barbara Wickson at bawickson@ucdavis.edu.";
//					$from = "bawickson@ucdavis.edu";
//					$header = "From: \"Continuing Medical Education\" <".$from.">\r\n";
//					$header.= "CC:".$ccemail."\r\n";
//
//					mail($to, $subject, $contents, $header);

				}
				else
				{
					print "Your evaluation was not submitted, please try again later<br>$q_insert";
				}
			} // end if valid_form = true
		} // end if preg_match $sub_eval

		if (($sub_eval == "Go To Evaluation") || (($sub_eval == "Submit Evaluation") && ($valid_form == false)))
		{

			// if no day was selected the date should default to Monday
			if ($day1 == "none") $day1 = "Monday";
			
			// verify that the e-mail address is found in the clinepi_reg table. After verification, check to see if 
			// evalauation has been submitted for the day selected.
			
			$q_reg = "SELECT * FROM cme_reg WHERE email = \"$email\" AND conf_year = \"2017\" ";
			$r_reg = mysqli_query($link, $q_reg);
			
			// if the record(s) for this e-mail address is found check to see if an eval has been submitted for the selected day
			if (mysqli_num_rows($r_reg) >= 1)
			{
				$q_eval = "SELECT * FROM clinepi_survey WHERE email = \"$email\" AND eval_year = \"2017\" AND day1 = \"$day1\" ";
				$r_eval = mysqli_query($link, $q_eval);
				
				// if this person has already submitted an eval for this day redirect back to main page
				if (mysqli_num_rows($r_eval) == 1)
				{
					print "You have already completed this section and it is no longer available for editing. 
					<a href= \"https://secure.phs.ucdavis.edu/clinepi/clinepi_eval.php\">Please return to the homepage</a> to select another day.<p>";
					
//					print "$q_reg<p>$q_eval<p>";	
					die();
				}
				// end if $r_eval == 1
			}
			// if the record is not found then deny access and redirect to homepage
			else
			{
				print "The e-mail address you entered does match the e-mail you used to register for the course.
				Please <a href= \"https://secure.phs.ucdavis.edu/clinepi/clinepi_eval.php\">return to the homepage</a> and try again. <p>";
				
//				print "$q_reg<p>$q_eval<p>";
				die();
			}
			// end if $r_reg >= 1
				
			
			// set values based on the which day of the course is being evaluated
			// set values based on the which day of the course is being evaluated
			if ($day1 == "Monday")
			{
				$disp_date = "Monday, September 12, 2016";
				
				$fac1_name = "Patrick Romano, MD MPH";
				$fac1_title = "Welcome: Developing a Research Question";
				
				$fac2_name = "Stephen McCurdy, MD MPH";
				$fac2_title = "Study Design: Overview and Cohort Studies";
				
				$fac3_name = "Janice Bell, MN MPH PhD";
				$fac3_title = "Using Secondary Data Sources";
				
				$fac4_name = "Patrick Romano, MD MPH";
				$fac4_title = "Literature Synthesis Meta-analysis";
				
				$fac5_name = "Stephen McCurdy, MD MPH";
				$fac5_title = "Case Control Studies";
				
//				$fac6_name = "Stephen McCurdy, MD MPH";
//				$fac6_title = "Study Design: Experimental Trials";
				
//				$fac7_name = "Lorien Dalrymple";
//				$fac7_title = "Diagnostic Tests";
				
//				$fac8_name = "Connie Koog";
//				$fac8_title = "Institutional Review Board and Research Ethics II";
			}
			
			if ($day1 == "Tuesday")
			{
				$disp_date = "Tuesday, September 13, 2016";
				
				$fac1_name = "Eleanor Bimla Schwartz, MD";
				$fac1_title = "Study Design: Cross-Sectional Studies";
				
				$fac2_name = "Stephen McCurdy, MD MPH";
				$fac2_title = "Study Design: Experimental Trials I";
				
				$fac3_name = "Eleanor Bimla Schwartz, MD";
				$fac3_title = "Qualitative Research Methods";
				
				$fac4_name = "Laurel Beckett, PhD";
				$fac4_title = "Biostatistics I: Basic Descriptive Statistics";
				
				$fac5_name = "Patrick Romano, MD MPH";
				$fac5_title = "Choosing Study Subjects and Recruitment";
				
//				$fac6_name = "Daniel Tancredi, PhD";
//				$fac6_title = "Biostatistics II: Basic Analytic Statistics";
				
//				$fac7_name = "Lorien Dalrymple";
//				$fac7_title = "Diagnostic Tests";
				
//				$fac8_name = "Connie Koog";
//				$fac8_title = "Institutional Review Board and Research Ethics II";
			}

			if ($day1 == "Wednesday")
			{
				$disp_date = "Wednesday, September 14, 2016";
				
				$fac1_name = "Patrick Romano, MD MPH";
				$fac1_title = "Planning Measurements: Precision and Accuracy";
				
				$fac2_name = "Patrick Romano, MD MPH";
				$fac2_title = "Questionnaire Design";
				
				$fac3_name = "Laurel Beckett, PhD";
				$fac3_title = "Biostatistics II: Basic Analytic Statistics";
				
				$fac4_name = "Banafesh Sadeghi, MD, PhD";
				$fac4_title = "Diagnostic and Screening Tests";
				
				$fac5_name = "Stephen McCurdy, MD MPH";
				$fac5_title = "Avoiding Errors: Confounding and Bias";
				
//				$fac6_name = "Laurel Beckett, PhD";
//				$fac6_title = "Biostatistics III: Linear Regression";
				
//				$fac7_name = "Lorien Dalrymple";
//				$fac7_title = "Diagnostic Tests";
				
//				$fac8_name = "Connie Koog";
//				$fac8_title = "Institutional Review Board and Research Ethics II";
			}
			
			if ($day1 == "Thursday")
			{
				$disp_date = "Thursday, Stephanie 15, 2016";
				
				$fac1_name = "Patrick Romano, MD MPH";
				$fac1_title = "Sample Size Planning";
				
				$fac2_name = "Laurel Beckett, PhD and Danielle Harvey, PhD";
				$fac2_title = "Hands-On Statistics Lab (SAS & R)";
				
				$fac3_name = "Laurel Beckett, PhD";
				$fac3_title = "Biostatistics III: Linear Regression (with one or more predictors)";
				
				$fac4_name = "Brian Jonas, MD, PhD";
				$fac4_title = "Clinical Trials II";
				
//				$fac5_name = "Ted Wun, MD FACP";
//				$fac5_title = "Clinical Trials II";
				
//				$fac6_name = "Hands on STATA Session";
//				$fac6_title = "Please rate the overall effectiveness of the Thursday afternoon STATA Session.";
				
//				$fac7_name = "Lorien Dalrymple";
//				$fac7_title = "Diagnostic Tests";
				
//				$fac8_name = "Connie Koog";
//				$fac8_title = "Institutional Review Board and Research Ethics II";
			}
			
			if ($day1 == "Friday")
			{
				$disp_date = "Friday, September 16, 2016";
				
				$fac1_name = "Patrick Romano, MD MPH";
				$fac1_title = "Implementing the Study: Pretesting, Quality Control, Protocol Revisions";
				
				$fac2_name = "Nicole Walters, BS CIP";
				$fac2_title = "Human Subjects & Research Ethics";
				
				$fac3_name = "Laurel Beckett, PhD";
				$fac3_title = "Biostat IV: Overview of Logistic Regression and Survival Analysis ";
				
				$fac4_name = "Stephen McCurdy, MD MPH";
				$fac4_title = "Data Management and Analysis";
				
				$fac5_name = "Patrick Romano, MD MPH and Stephen McCurdy, MD, MPH";
				$fac5_title = "The Publication Game";
				
//				$fac6_name = "Hands on STATA Session";
//				$fac6_title = "Please rate the overall effectiveness of the Thursday afternoon STATA Session.";
				
//				$fac7_name = "Lorien Dalrymple";
//				$fac7_title = "Diagnostic Tests";
				
//				$fac8_name = "Connie Koog";
//				$fac8_title = "Institutional Review Board and Research Ethics II";
			}
			
			
			print "<form name= \"clinepi_eval\" method= \"post\" action= \"https://secure.phs.ucdavis.edu/clinepi/clinepi_eval.php\">";

			print "<table>";
			
// FACULTY EVALUATION - LECTURE COMPONENT
				print "<tr>";
					print "<td colspan= \"7\"><strong>Faculty Evaluation: Lecture Component</strong></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td colspan= \"7\" align= \"right\">Rate the overall teaching effectiveness on a scale of 5 - 1<br>
					(5 = Excellent and 1 = Poor)</td>";
				print "</tr>";

// Faculty 1				
				print "<tr>";
					print "<td><strong>1. $fac1_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac1_title</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac1_rate\" value= \"5\" ";
					if ($fac1_rate == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac1_rate\" value= \"4\" ";
					if ($fac1_rate == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac1_rate\" value= \"3\" ";
					if ($fac1_rate == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac1_rate\" value= \"2\" ";
					if ($fac1_rate == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac1_rate\" value= \"1\" ";
					if ($fac1_rate == 1) print "checked";
					print ">1</label></td>";
					
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac1_rate\" value= \"6\" ";
					if ($fac1_rate == 6) print "checked";
					print ">N/A</label></td>";
				print "</tr>";
				
				print "<tr><td>Comments</td></tr>";
				
				print "<tr>";
print "<td colspan= \"7\"><textarea name= \"fac1_comments\" cols= \"60\" rows= \"6\">$fac1_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
// End Faculty 1
				
// Faculty 2				
				print "<tr>";
					print "<td><strong>2. $fac2_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac2_title</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac2_rate\" value= \"5\" ";
					if ($fac2_rate == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac2_rate\" value= \"4\" ";
					if ($fac2_rate == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac2_rate\" value= \"3\" ";
					if ($fac2_rate == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac2_rate\" value= \"2\" ";
					if ($fac2_rate == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac2_rate\" value= \"1\" ";
					if ($fac2_rate == 1) print "checked";
					print ">1</label></td>";
					
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac2_rate\" value= \"6\" ";
					if ($fac2_rate == 6) print "checked";
					print ">N/A</label></td>";
				print "</tr>";
				
				print "<tr><td>Comments</td></tr>";
				
				print "<tr>";
print "<td colspan= \"7\"><textarea name= \"fac2_comments\" cols= \"60\" rows= \"6\">$fac2_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
// End Faculty 2
				
// Faculty 3				
				print "<tr>";
					print "<td><strong>3. $fac3_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac3_title</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac3_rate\" value= \"5\" ";
					if ($fac3_rate == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac3_rate\" value= \"4\" ";
					if ($fac3_rate == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac3_rate\" value= \"3\" ";
					if ($fac3_rate == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac3_rate\" value= \"2\" ";
					if ($fac3_rate == 2) print "checked";
					print ">2</label></td>";
										

					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac3_rate\" value= \"1\" ";
					if ($fac3_rate == 1) print "checked";
					print ">1</label></td>";
					
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac3_rate\" value= \"6\" ";
					if ($fac3_rate == 6) print "checked";
					print ">N/A</label></td>";
				print "</tr>";
				
				print "<tr><td>Comments</td></tr>";
				
				print "<tr>";
print "<td colspan= \"7\"><textarea name= \"fac3_comments\" cols= \"60\" rows= \"6\">$fac3_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
// End Faculty 3
				
// Faculty 4				
				print "<tr>";
					print "<td><strong>4. $fac4_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac4_title</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac4_rate\" value= \"5\" ";
					if ($fac4_rate == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac4_rate\" value= \"4\" ";
					if ($fac4_rate == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac4_rate\" value= \"3\" ";
					if ($fac4_rate == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac4_rate\" value= \"2\" ";
					if ($fac4_rate == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac4_rate\" value= \"1\" ";
					if ($fac4_rate == 1) print "checked";
					print ">1</label></td>";
					
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac4_rate\" value= \"6\" ";
					if ($fac4_rate == 6) print "checked";
					print ">N/A</label></td>";
				print "</tr>";
				
				print "<tr><td>Comments</td></tr>";
				
				print "<tr>";
print "<td colspan= \"7\"><textarea name= \"fac4_comments\" cols= \"60\" rows= \"6\">$fac4_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
// End Faculty 4
				
// Faculty 5				
// there is no 5th session for Thursday in 2014
if ($day1 <> "Thursday")
{
				print "<tr>";
					print "<td><strong>5. $fac5_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac5_title</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac5_rate\" value= \"5\" ";
					if ($fac5_rate == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac5_rate\" value= \"4\" ";
					if ($fac5_rate == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac5_rate\" value= \"3\" ";
					if ($fac5_rate == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac5_rate\" value= \"2\" ";
					if ($fac5_rate == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac5_rate\" value= \"1\" ";

					if ($fac5_rate == 1) print "checked";
					print ">1</label></td>";
					
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac5_rate\" value= \"6\" ";
					if ($fac5_rate == 6) print "checked";
					print ">N/A</label></td>";
				print "</tr>";
				
				print "<tr><td>Comments</td></tr>";
				
				print "<tr>";
print "<td colspan= \"7\"><textarea name= \"fac5_comments\" cols= \"60\" rows= \"6\">$fac5_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
} // end if not Thursday
// End Faculty 5

	if ($day1 == "FridayX")
	{	
// Faculty 6				
		print "<tr>";
					print "<td><strong>6. $fac6_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac6_title</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac6_rate\" value= \"5\" ";
					if ($fac6_rate == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac6_rate\" value= \"4\" ";
					if ($fac6_rate == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac6_rate\" value= \"3\" ";
					if ($fac6_rate == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac6_rate\" value= \"2\" ";
					if ($fac6_rate == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac6_rate\" value= \"1\" ";
					if ($fac6_rate == 1) print "checked";
					print ">1</label></td>";
					
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac6_rate\" value= \"6\" ";
					if ($fac6_rate == 6) print "checked";
					print ">N/A</label></td>";
				print "</tr>";
				
				print "<tr><td>Comments</td></tr>";
				
				print "<tr>";
print "<td colspan= \"7\"><textarea name= \"fac6_comments\" cols= \"60\" rows= \"6\">$fac6_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
// End Faculty 6
	} // END IF DAY1 = FRIDAY
				
// Faculty 7				
//				print "<tr>";
//					print "<td><strong>7. $fac7_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac7_title</td>";
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac7_rate\" value= \"5\" ";
//					if ($fac7_rate == 5) print "checked";
//					print ">5</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac7_rate\" value= \"4\" ";
//					if ($fac7_rate == 4) print "checked";
//					print ">4</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac7_rate\" value= \"3\" ";
//					if ($fac7_rate == 3) print "checked";
//					print ">3</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac7_rate\" value= \"2\" ";
//					if ($fac7_rate == 2) print "checked";
//					print ">2</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac7_rate\" value= \"1\" ";
//					if ($fac7_rate == 1) print "checked";
//					print ">1</label></td>";
//				print "</tr>";
				
//				print "<tr><td>Comments</td></tr>";
				
//				print "<tr>";
//					print "<td colspan= \"6\"><textarea name= \"fac7_comments\" cols= \"60\" rows= \"6\">
//					$fac7_comments</textarea></td>";
//				print "</tr>";
				
//				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
// End Faculty 7
				
// Faculty 8				
//				print "<tr>";
//					print "<td><strong>8. $fac8_name</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fac8_title</td>";
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac8_rate\" value= \"5\" ";

//					if ($fac8_rate == 5) print "checked";
//					print ">5</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac8_rate\" value= \"4\" ";
//					if ($fac8_rate == 4) print "checked";
//					print ">4</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac8_rate\" value= \"3\" ";
//					if ($fac8_rate == 3) print "checked";
//					print ">3</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac8_rate\" value= \"2\" ";
//					if ($fac8_rate == 2) print "checked";
//					print ">2</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac8_rate\" value= \"1\" ";
//					if ($fac8_rate == 1) print "checked";
//					print ">1</label></td>";
//				print "</tr>";
				
//				print "<tr><td>Comments</td></tr>";
				
//				print "<tr>";
//					print "<td colspan= \"6\"><textarea name= \"fac8_comments\" cols= \"60\" rows= \"6\">
//					$fac8_comments</textarea></td>";
//				print "</tr>";
				
//				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
// End Faculty 8
				
// COURSE AND FACULTY EVALUATION (DISPLAYED ON FRIDAY ONLY)
		if ($day1 == "Friday")
		{
//FACULTY EVALUATION - SMALL GROUP COMPONENT
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td colspan= \"7\"><strong>Faculty Evaluation: Small Group Component</strong><br>
					(Please rate only your small group)</td>";
				print "</tr>";

				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td colspan= \"7\">Please select your small group</td>";
				print "</tr>";
					
				print "<tr>";
					print "<td colspan= \"1\">";
					print "<select name= \"fac_leader\">";
					print "<option value= \"none\" ";
					if ($fac_leader == "none") print "selected";
					print "> (Select Group)</option>\n";

					print "<option value= \"Laurel Beckett\" ";
					if ($fac_leader == "Laurel Beckett") print "selected";
					print "> Laurel Beckett, PhD</option>\n";
					
					print "<option value= \"Lars Berglund\" ";
					if ($fac_leader == "Lars Berglund") print "selected";
					print "> Lars Berglund, MD, PhD</option>\n";
					
					print "<option value= \"Lorien Dalrymple\" ";
					if ($fac_leader == "Lorien Dalrymple") print "selected";
					print "> Lorien Dalrymple, MD, MPH</option>\n";
					
//					print "<option value= \"Madan Dharmar\" ";
//					if ($fac_leader == "Madan Dharmar") print "selected";
//					print "> Madan Dharmar, MBBS, PhD</option>\n";

//					print "<option value= \"Hinton - Mungas\" ";
//					if ($fac_leader == "Hinton - Mungas") print "selected";
//					print "> Ladson Hinton, MD and Dan Mungas, PhD</option>\n";

//					print "<option value= \"Calvin Hirsch\" ";
//					if ($fac_leader == "Calvin Hirsch") print "selected";
//					print "> Calvin Hirsch, MD</option>\n";

					print "<option value= \"Hirsch - Lane\" ";
					if ($fac_leader == "Hirsch - Lane") print "selected";
					print ">Calvin Hirsch, MD/Nancy Lane, MD</option>\n";

					print "<option value= \"Holmes - Mumma\" ";
					if ($fac_leader == "Holmes - Mumma") print "selected";
					print "> James Holmes, MD MPH/Bryan Mumma, MD</option>\n";

//					print "<option value= \"George Kaysen\" ";
//					if ($fac_leader == "George Kaysen") print "selected";
//					print "> George Kaysen, MD, MPH</option>\n";
					
//					print "<option value= \"Nancy Lane\" ";
//					if ($fac_leader == "Nancy Lane") print "selected";
//					print "> Nancy Lane, MD</option>\n";
					
//					print "<option value= \"James Marcin\" ";
//					if ($fac_leader == "James Marcin") print "selected";
//					print "> James P. Marcin, MD</option>\n";

//					print "<option value= \"Helene Margolis\" ";
//					if ($fac_leader == "Helene Margolis") print "selected";
//					print "> Helene Margolis, MA PhD</option>\n";
					
					print "<option value= \"Dan Mungas\" ";
					if ($fac_leader == "Dan Mungas") print "selected";
					print "> Dan Mungas, MD</option>\n";

//					print "<option value= \"Stephen McCurdy\" ";
//					if ($fac_leader == "Stephen McCurdy") print "selected";
//					print "> Stephen McCurdy, MD MPH</option>\n";

					print "<option value= \"McCurdy - Margolis\" ";
					if ($fac_leader == "McCurdy - Margolis") print "selected";
					print "> Stephen McCurdy, MD MPH/Helene Margolis, MA PhD </option>\n";

					print "<option value= \"Patrick Romano\" ";
					if ($fac_leader == "Patrick Romano") print "selected";
					print "> Patrick Romano, MD MPH</option>\n";

					//print "<option value= \"Schenker Kim\" ";
					//if ($fac_leader == "Schenker Kim") print "selected";
					//print "> Marc Schenker, MD MPH/Sunny Kim, PhD</option>\n";
					
					print "<option value= \"Banafsheh Sadeghi\" ";
					if ($fac_leader == "Banafsheh Sadeghi") print "selected";
					print "> Banafsheh Sadeghi, PhD</option>\n";

					print "<option value= \"Eleanor Bimla Schwarz\" ";
					if ($fac_leader == "Eleanor Bimla Schwarz") print "selected";
					print "> Eleanor Bimla Schwarz, MD, MS</option>\n";

					print "<option value= \"Ted Wun\" ";
					if ($fac_leader == "Ted Wun") print "selected";
					print "> Ted Wun, MD FACP</option>\n";

//					print "<option value= \"BK Yoo\" ";
//					if ($fac_leader == "BK Yoo") print "selected";
//					print "> BK Yoo, MD, PhD, MS</option>\n";
					
//					print "<option value= \"Lars Berglund\" ";
//					if ($fac_leader == "Lars Berglundr") print "selected";
//					print "> Lars Berglund, MD, PhD</option>\n";
					
//					print "<option value= \"Mark Underwood\" ";
//					if ($fac_leader == "Mark Underwood") print "selected";
//					print "> Mark Underwood, MD, MAS</option>\n";
					
//					print "<option value= \"Lane - Wise\" ";
//					if ($fac_leader == "Lane - Wise") print "selected";
//					print ">Nancy Lane, MD/Bart Wise, MD</option>\n";

					print "</select></td>";

					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader_rate\" value= \"5\" ";
					if ($fac_leader_rate == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader_rate\" value= \"4\" ";
					if ($fac_leader_rate == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader_rate\" value= \"3\" ";
					if ($fac_leader_rate == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader_rate\" value= \"2\" ";
					if ($fac_leader_rate == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader_rate\" value= \"1\" ";
					if ($fac_leader_rate == 1) print "checked";
					print ">1</label></td>";
					
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader_rate\" value= \"6\" ";
					if ($fac_leader_rate == 6) print "checked";
					print ">N/A</label></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
				print "<tr><td colspan= \"7\">Comments</td></tr>";
				print "<tr>";
print "<td colspan= \"7\"><textarea name= \"fac_leader_comments\" cols= \"60\" rows= \"6\">$fac_leader_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
//				print "<tr>";
//					print "<td colspan= \"7\">Please select your main small group co-leader (if applicable)</td>";
//				print "</tr>";
					
//				print "<tr>";
//					print "<td colspan= \"1\">";
//					print "<select name= \"fac_leader2\">";
//					print "<option value= \"none\" ";
//					if ($fac_leader2 == "none") print "selected";
//					print "> (Select Co-Leader)</option>\n";

//					print "<option value= \"Josh Breslau\" ";
//					if ($fac_leader2 == "Josh Breslau") print "selected";
//					print "> Josh Breslau, PhD ScD</option>\n";

//					print "<option value= \"Elisa Tong\" ";
//					if ($fac_leader2 == "Elisa Tong") print "selected";
//					print "> Elisa Tong, MD MA</option>\n";

//					print "<option value= \"Elizabeth Miller\" ";
//					if ($fac_leader2 == "Elizabeth Miller") print "selected";
//					print "> Elizabeth Miller, MD</option>\n";

//					print "</select></td>";

//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader2_rate\" value= \"5\" ";
//					if ($fac_leader2_rate == 5) print "checked";
//					print ">5</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader2_rate\" value= \"4\" ";
//					if ($fac_leader2_rate == 4) print "checked";
//					print ">4</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader2_rate\" value= \"3\" ";
//					if ($fac_leader2_rate == 3) print "checked";
//					print ">3</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader2_rate\" value= \"2\" ";
//					if ($fac_leader2_rate == 2) print "checked";
//					print ">2</label></td>";
										
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader2_rate\" value= \"1\" ";
//					if ($fac_leader2_rate == 1) print "checked";
//					print ">1</label></td>";
					
//					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"fac_leader2_rate\" value= \"6\" ";
//					if ($fac_leader2_rate == 6) print "checked";
//					print ">N/A</label></td>";
//				print "</tr>";
				
//				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
//				print "<tr><td colspan= \"7\">Comments</td></tr>";
//				print "<tr>";
//					print "<td colspan= \"7\"><textarea name= \"fac_leader2_comments\" cols= \"60\" rows= \"6\">
//					$fac_leader2_comments</textarea></td>";
//				print "</tr>";

//				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
// End Faculty Leader
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
// OVERALL COURSE RATINGS
	print "<tr><td colspan= \"7\">";
			print "<table>";
				print "<tr>";
					print "<td colspan= \"6\"><strong>Overall Course</strong></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
// COURSE TECHNIQUES				
				print "<tr>";
					print "<td colspan= \"6\"><strong>1. From the program, please identify information or techniques you acquired
					that will be useful in your work</strong></td>";
				print "</tr>";
				
				print "<tr>";
print "<td colspan= \"6\"><textarea name= \"course_tech\" cols= \"60\" rows= \"6\">$course_tech</textarea></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td colspan= \"6\"><strong>Please circle the number that appropriately measures your response
					</strong></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";

// COURSE OBJECTIVES				
				print "<tr>";
					print "<td colspan= \"6\" align= \"right\">(5 = Exceeded Expectations, 1 = Did Not Meet Expectations)</td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><strong>2. Were the identified course objectives met?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_obj\" value= \"5\" ";
					if ($course_obj == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_obj\" value= \"4\" ";
					if ($course_obj == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_obj\" value= \"3\" ";
					if ($course_obj == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_obj\" value= \"2\" ";
					if ($course_obj == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_obj\" value= \"1\" ";
					if ($course_obj == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE OBJECTIVES
				
// COURSE NEEDS				
				print "<tr>";
					print "<td><strong>3. Did the course objectives meet your needs?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_needs\" value= \"5\" ";
					if ($course_needs == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_needs\" value= \"4\" ";
					if ($course_needs == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_needs\" value= \"3\" ";
					if ($course_needs == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_needs\" value= \"2\" ";
					if ($course_needs == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_needs\" value= \"1\" ";
					if ($course_needs == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE NEEDS
				
// COURSE MATERIAL				
				print "<tr>";
					print "<td><strong>4. Will the material presented be useful in your work?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_material\" value= \"5\" ";
					if ($course_material == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_material\" value= \"4\" ";
					if ($course_material == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_material\" value= \"3\" ";
					if ($course_material == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_material\" value= \"2\" ";
					if ($course_material == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_material\" value= \"1\" ";
					if ($course_material == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE MATERIAL
				
// COURSE EXPECT				
				print "<tr>";
					print "<td><strong>5. Did the program meet your expectations?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_expect\" value= \"5\" ";
					if ($course_expect == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_expect\" value= \"4\" ";
					if ($course_expect == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_expect\" value= \"3\" ";
					if ($course_expect == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_expect\" value= \"2\" ";
					if ($course_expect == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_expect\" value= \"1\" ";
					if ($course_expect == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE EXPECT
				
// COURSE PRESENT				
				print "<tr>";
					print "<td><strong>6. Were the presentations well balanced and objective?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_present\" value= \"5\" ";
					if ($course_present == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_present\" value= \"4\" ";
					if ($course_present == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_present\" value= \"3\" ";
					if ($course_present == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_present\" value= \"2\" ";
					if ($course_present == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_present\" value= \"1\" ";
					if ($course_present == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE PRESENT
				
// COURSE OVERALL				
				print "<tr>";
					print "<td><strong>7. What is your overall rating of the course?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_overall\" value= \"5\" ";
					if ($course_overall == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_overall\" value= \"4\" ";
					if ($course_overall == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_overall\" value= \"3\" ";
					if ($course_overall == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_overall\" value= \"2\" ";
					if ($course_overall == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_overall\" value= \"1\" ";
					if ($course_overall == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE OVERALL

				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
				
// COURSE ASPECTS	BEST
				print "<tr>";
					print "<td colspan= \"6\"><strong>8. What aspects of the course did you like best? Why?</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td colspan= \"6\">
<textarea name= \"course_aspects_best\" cols= \"60\" rows= \"6\">$course_aspects_best</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
				
// COURSE ASPECTS	WEAK
				print "<tr>";
					print "<td colspan= \"6\"><strong>9. What aspects of the course were the weakest and should be changed? Why?
					</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td colspan= \"6\">
<textarea name= \"course_aspects_weak\" cols= \"60\" rows= \"6\">$course_aspects_weak</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
				
// COURSE SYLLABUS				
				print "<tr>";
					print "<td colspan= \"6\" align= \"right\">(5 = Exceeded Expectations, 1 = Did Not Meet Expectations)</td>";
				print "</tr>";

				print "<tr>";
					print "<td><strong>10. Please rate the syllabus?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_syllabus\" value= \"5\" ";
					if ($course_syllabus == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_syllabus\" value= \"4\" ";
					if ($course_syllabus == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_syllabus\" value= \"3\" ";
					if ($course_syllabus == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_syllabus\" value= \"2\" ";
					if ($course_syllabus == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_syllabus\" value= \"1\" ";
					if ($course_syllabus == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE SYLLABUS
				
// COURSE TEXT				
				print "<tr>";
					print "<td><strong>11. Please rate the text?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_text\" value= \"5\" ";
					if ($course_text == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_text\" value= \"4\" ";
					if ($course_text == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_text\" value= \"3\" ";
					if ($course_text == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_text\" value= \"2\" ";
					if ($course_text == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_text\" value= \"1\" ";
					if ($course_text == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE NEEDS
				
// COURSE AMENITIES				
				print "<tr>";
					print "<td><strong>12. Please rate the physical amentities?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_amenities\" value= \"5\" ";
					if ($course_amenities == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_amenities\" value= \"4\" ";
					if ($course_amenities == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_amenities\" value= \"3\" ";
					if ($course_amenities == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_amenities\" value= \"2\" ";
					if ($course_amenities == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_amenities\" value= \"1\" ";
					if ($course_amenities == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE AMENITIES
				
// COURSE SUPPORT
				print "<tr>";
					print "<td><strong>13. Please rate the computer support?</td>";
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_support\" value= \"5\" ";
					if ($course_support == 5) print "checked";
					print ">5</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_support\" value= \"4\" ";
					if ($course_support == 4) print "checked";
					print ">4</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_support\" value= \"3\" ";
					if ($course_support == 3) print "checked";
					print ">3</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_support\" value= \"2\" ";
					if ($course_support == 2) print "checked";
					print ">2</label></td>";
										
					print "<td colspan= \"1\" valign= \"top\"><label><input type= \"radio\" name= \"course_support\" value= \"1\" ";
					if ($course_support == 1) print "checked";
					print ">1</label></td>";
				print "</tr>";
// End COURSE SUPPORT

				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";

// HOW DID YOU LEARN ABOUT THE PROGRAM?

				print "<tr>";
					print "<td colspan= \"6\"><strong>14. How did you learn about the program?</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td colspan= \"6\">";
						print "<table>";
							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"course_flier\" value= \"1\" ";
								if ($course_flier == 1) print "checked";
								print "> Flier</td>";
						
								print "<td><input type= \"checkbox\" name= \"course_colleague\" value= \"1\" ";
								if ($course_colleague == 1) print "checked";
								print "> Colleague</td>";
						
								print "<td><input type= \"checkbox\" name= \"course_super\" value= \"1\" ";
								if ($course_super == 1) print "checked";
								print "> Supervisor</td>";
							print "</tr>";
						
							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"course_email\" value= \"1\" ";
								if ($course_email == 1) print "checked";
								print "> E-mail Announcement</td>";
						
								print "<td><input type= \"checkbox\" name= \"course_other\" value= \"1\" ";
								if ($course_other == 1) print "checked";
								print "> Other -></td>";
						
								print "<td><input type= \"text\" name= \"course_other_spec\" value= \"$course_other_spec\"><td>";
							print "</tr>";
						print "</table>";
					print "</td>";
				print "</tr>";
				
				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
										
// COURSE TIME OF YEAR
				print "<tr>";
					print "<td colspan= \"6\"><strong>15. What time of the year is best for offering the course?</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td colspan= \"6\">
<textarea name= \"course_offer\" cols= \"60\" rows= \"6\">$course_offer</textarea></td>";
				print "</tr>";
				
// COURSE BARRIERS
				print "<tr>";
					print "<td colspan= \"6\"><strong>16. Please indicate any barriers to attendance that your experienced<br>
					(e.g., personal/family responsibilities, call or clinical responsibilities, etc.)</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td colspan= \"6\">
<textarea name= \"course_barriers\" cols= \"60\" rows= \"6\">$course_barriers</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
				
// COURSE CONFLICT
				print "<tr>";
					print "<td colspan= \"6\"><strong>17. This presentation was free from commercial bias. If a conflict of interest
					was noted, please specify</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td colspan= \"6\">
<textarea name= \"course_conflict\" cols= \"60\" rows= \"6\">$course_conflict</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
				
// COURSE COMMENTS
				print "<tr>";
					print "<td colspan= \"6\"><strong>Please make any other comments that will help us improve the course.</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td colspan= \"6\">
<textarea name= \"course_comments\" cols= \"60\" rows= \"6\">$course_comments</textarea></td>";
				print "</tr>";
				
			
			print "<tr><td colspan= \"6\">&nbsp;</td></tr>";
			print "<tr><td colspan= \"6\"><hr></td></tr>";
			print "<tr><td colspan= \"6\">&nbsp;</td></tr>";

			print "</table>";
		print "</td></tr>";
		} // END IF DAY1 = FRIDAY

				print "<tr><td>&nbsp;</td></tr>";
// CAPTCHA CODE	
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



// SUBMIT
				print "<tr>";
					print "<td><input type= \"submit\" name= \"sub_eval\" value= \"Submit Evaluation\">&nbsp;&nbsp;";
					print "<input type= \"submit\" name= \"sub_eval\" value= \"Do Not Submit\"></td>";
				print "</tr>";
			print "</table>";
			
			print "<input type= \"hidden\" name= \"day1\" value= \"$day1\">";
			print "<input type= \"hidden\" name= \"email\" value= \"$email\">";
			print "<input type= \"hidden\" name= \"fac1_name\" value= \"$fac1_name\">";
			print "<input type= \"hidden\" name= \"fac1_title\" value= \"$fac1_title\">";
			print "<input type= \"hidden\" name= \"fac2_name\" value= \"$fac2_name\">";
			print "<input type= \"hidden\" name= \"fac2_title\" value= \"$fac2_title\">";
			print "<input type= \"hidden\" name= \"fac3_name\" value= \"$fac3_name\">";
			print "<input type= \"hidden\" name= \"fac3_title\" value= \"$fac3_title\">";
			print "<input type= \"hidden\" name= \"fac4_name\" value= \"$fac4_name\">";
			print "<input type= \"hidden\" name= \"fac4_title\" value= \"$fac4_title\">";
			print "<input type= \"hidden\" name= \"fac5_name\" value= \"$fac5_name\">";
			print "<input type= \"hidden\" name= \"fac5_title\" value= \"$fac5_title\">";
			print "<input type= \"hidden\" name= \"fac6_name\" value= \"$fac6_name\">";
			print "<input type= \"hidden\" name= \"fac6_title\" value= \"$fac6_title\">";
			print "<input type= \"hidden\" name= \"fac7_name\" value= \"$fac7_name\">";
			print "<input type= \"hidden\" name= \"fac7_title\" value= \"$fac7_title\">";
			print "<input type= \"hidden\" name= \"fac8_name\" value= \"$fac8_name\">";
			print "<input type= \"hidden\" name= \"fac8_title\" value= \"$fac8_title\">";
			
			print "</form>";
		} // end if $sub_eval = Go to Evaluation
		
		if (!$sub_eval)
		{
			print "<form name= \"cme_eval\" method= \"post\" action= \"https://secure.phs.ucdavis.edu/clinepi/clinepi_eval.php\">";
				print "<table>";
					
					print "<tr>";
						print "<td colspan= \"3\">Welcome to the Clinical Epidemiology and Study Design Evaluation Website. 
						Your feedback is important to us. After each day we ask that you come and complete the daily course 
						evaluation. All evaluations are confidential and will be kept anonymous.  After you submit a daily 
						evaluation you will not be allowed back into that evaluation and will be directed to the evaluation home 
						page. If you forget to complete any evaluation at the end of the week you will be sent a reminder.
						</td>";
					print "</tr>";
					
					print "<tr><td>&nbsp;</tr></td>";
					
					print "<tr>";
						print "<td colspan= \"3\">To access the evaluation, please enter the e-mail address you entered on your
						registration form, select the day of the course you are evaluating, and click the 'Go To Evaluation'
						button.</td>";
					print "</tr>";
					
					print "<tr><td>&nbsp;</tr></td>";
					
					print "<tr>";
						print "<td><strong>E-mail Address</strong></td>";
						print "<td><strong>Course Date</strong></td>";
						print "<td>&nbsp;</td>";
					print "</tr>";
					
					print "<tr>";
					
						print "<td><input type= \"text\" name= \"email\" value= \"$email\">";
												
						print "<td colspan= \"1\">";
						print "<select name= \"day1\">";
						print "<option value= \"none\" ";
						if ($day1 == "none") print "selected";
						print "> (Select Date)</option>\n";

						print "<option value= \"Monday\" ";
						if ($day1 == "Monday") print "selected";
						print "> Monday, September 12</option>\n";
					
						print "<option value= \"Tuesday\" ";
						if ($day1 == "Tuesday") print "selected";
						print "> Tuesday, September 13</option>\n";
					
						print "<option value= \"Wednesday\" ";
						if ($day1 == "Wednesday") print "selected";
						print "> Wednesday, September 14</option>\n";

						print "<option value= \"Thursday\" ";
						if ($day1 == "Thursday") print "selected";
						print "> Thursday, September 15</option>\n";

						print "<option value= \"Friday\" ";
						if ($day1 == "Friday") print "selected";
						print "> Friday, September 16</option>\n";

						print "</select></td>";
					
						print "<td><input type= \"submit\" name= \"sub_eval\" value= \"Go To Evaluation\"></td>";
					
					print "</tr>";
				print "</table>";
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
 


