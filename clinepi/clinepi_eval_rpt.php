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
 
 
	<div id="breadcrumb" class="breadcrumb" align="left"><!-- InstanceBeginEditable name="breadcrumbs" --><a href="<?=$bcROOT?>/education.php">Education</a> -> <a href="<?=$bcROOT?>/education/cme.php">CME</a> -> <a href="<?=$bcROOT?>/education/clinepi.php">Clinical Epidemiology and Study Design</a> -> Evaluation Summary<!-- InstanceEndEditable --></div> <!-- breadcrumb -->
 
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

$sub_eval = $_POST["sub_eval"];
$eval_id = $_POST["eval_id"];

$cme_user = $_POST["cme_user"];
$cme_psswd = $_POST["cme_psswd"];


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
     $fname = preg_replace($targets, $replaces, $fname);
     $lname = preg_replace($targets, $replaces, $lname);
     $phys_spec = preg_replace($targets, $replaces, $phys_spec);
	 $other_phys_spec = preg_replace($targets, $replaces, $other_phys_spec);
	 $course_tech = preg_replace($targets, $replaces, $course_tech);
	 $course_aspects_best = preg_replace($targets, $replaces, $course_aspects_best);
	 $course_aspects_weak = preg_replace($targets, $replaces, $course_aspects_weak);
     $course_other_spec = preg_replace($targets, $replaces, $course_other_spec);
     $course_offer = preg_replace($targets, $replaces, $course_offer);
	 $course_barriers = preg_replace($targets, $replaces, $course_barriers);
	 $course_conflict = preg_replace($targets, $replaces, $course_conflict);
	 $course_comments = preg_replace($targets, $replaces, $course_comments);
	 $fac1_comments = preg_replace($targets, $replaces, $fac1_comments);
	 $fac2_comments = preg_replace($targets, $replaces, $fac2_comments);
	 $fac3_comments = preg_replace($targets, $replaces, $fac3_comments);
	 $fac4_comments = preg_replace($targets, $replaces, $fac4_comments);
	 $fac5_comments = preg_replace($targets, $replaces, $fac5_comments);
	 $fac6_comments = preg_replace($targets, $replaces, $fac6_comments);
	 $fac7_comments = preg_replace($targets, $replaces, $fac7_comments);
	 $fac8_comments = preg_replace($targets, $replaces, $fac8_comments);
	 $fac_leader_comments = preg_replace($targets, $replaces, $fac_leader_comments);
	 $fac_leader2_comments = preg_replace($targets, $replaces, $fac_leader2_comments);
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"))) 
	{
 		
function CHECK_DAYS($check_email, $check_ct, $check_name, $check_link)
{
	$q_check = "SELECT * FROM clinepi_survey WHERE email = \"$check_email\" AND eval_year = \"2017\" ";
	$r_check = mysqli_query($check_link, $q_check);
	
//	print "$q_check";
			
	while ($row_check = mysqli_fetch_array($r_check, MYSQLI_ASSOC))
	{
		$check_day = $row_check[day1];
				
//		print "$row_check[email] $row_check[day1]<br>";
						
		if ($check_day == "Monday") $monday = "X";
		if ($check_day == "Tuesday") $tuesday = "X";
		if ($check_day == "Wednesday") $wednesday = "X";
		if ($check_day == "Thursday") $thursday = "X";
		if ($check_day == "Friday") $friday = "X";
	} // end while $row_check

	print "<tr>";
		print "<td>$check_ct</td>";
		print "<td>$check_name</td>";
		print "<td align= \"center\">$monday&nbsp;</td>";		
		print "<td align= \"center\">$tuesday&nbsp;</td>";
		print "<td align= \"center\">$wednesday&nbsp;</td>";
		print "<td align= \"center\">$thursday&nbsp;</td>";
		print "<td align= \"center\">$friday&nbsp;</td>";
	print "</tr>";
					
					
} // end function


//		print "<div align= \"left\"><b><u>Clinical Epidemiology and Study Design Evaluation</u></b></div>";
		
		if ($sub_eval == "View Individual Evaluations")
		{
			$q_evals = "SELECT * FROM clinepi_survey WHERE eval_year = \"2017\" ORDER BY day_sort, sub_date ";
			$r_evals = mysqli_query($link, $q_evals);
			
			print "<table width = \"80%\" border= \"1\" cellspacing= \"0\" cellpadding= \"2\">";
				print "<tr>";
					print "<td>&nbsp;</td>";
					print "<td>Day of Week</td>";
					print "<td>Submit Date</td>";
					print "<td>Click to View</td>";
				print "</tr>";
				
				$eval_ct = 1;
				
				$monday_ct = 0;
				$tuesday_ct = 0;
				$wednesday_ct = 0;
				$thursday_ct = 0;
				$friday_ct = 0;
				
				while ($row_evals = mysqli_fetch_array($r_evals, MYSQLI_ASSOC))
				{
					if ($row_evals[day1] == "Monday") $monday_ct++;
					if ($row_evals[day1] == "Tuesday") $tuesday_ct++;
					if ($row_evals[day1] == "Wednesday") $wednesday_ct++;
					if ($row_evals[day1] == "Thursday") $thursday_ct++;
					if ($row_evals[day1] == "Friday") $friday_ct++;
					
					print "<tr>";
						print "<td>$eval_ct</td>";
						print "<td>$row_evals[day1]</td>";
						print "<td>$row_evals[sub_date]</td>";
						print "<td>";
							print "<form method= \"post\" action= \"clinepi_eval_rpt.php\" name= \"view_eval\">";
							print "<input type= \"submit\" name= \"sub_eval\" value= \"View Evaluation\">";
							print "<input type= \"hidden\" name= \"eval_id\" value= \"$row_evals[eval_id]\">";
							print "</form>";
						print "</td>";
					print "</tr>";
					
					$eval_ct++;
				} // end while
				
				print "<tr><td colspan= \"4\">&nbsp;</td></tr>";
				print "<tr><td colspan= \"4\"> <strong>Totals by day:</strong><br>
				Monday: ($monday_ct),
				Tuesday: ($tuesday_ct),
				Wednesday: ($wednesday_ct),
				Thursday: ($thursday_ct),
				Friday: ($friday_ct)
				</td></tr>";
				
			print "</table>";
			
			print "<p>&nbsp;</p><a href= \"clinepi_eval_rpt.php\">Back</a>";
		
		} // end if sub_eval == view individual evaluations
		

		if ($sub_eval == "View Evaluation")
		{

			$q_eval = "SELECT * FROM clinepi_survey WHERE eval_id = \"$eval_id\" AND eval_year = \"2017\" ";
			$r_eval = mysqli_query($link, $q_eval);
				
			if (mysqli_num_rows($r_eval) == 1)
				{
					$row_eval = mysql_fetch_array($r_eval);
					
					$day1 = $row_eval[day1];
					$fname = $row_eval[fname];
					$lname = $row_eval[lname];
					$email = $row_eval[email];
					$physician = $row_eval[physician];
					$phys_spec = $row_eval[phys_spec];
					$other_phys = $row_eval[other_phys];
					$other_phys_spec = $row_eval[other_phys_spec];
					$course_date = $row_eval[course_date];
					$course_tech = $row_eval[course_tech];
					$course_obj = $row_eval[course_obj];
					$course_needs = $row_eval[course_needs];
					$course_material = $row_eval[course_material];
					$course_expect = $row_eval[course_expect];
					$course_overall = $row_eval[course_overall];
					$course_aspects_best = $row_eval[course_aspects_best];
					$course_aspects_weak = $row_eval[course_aspects_weak];
					$course_syllabus = $row_eval[course_syllabus];
					$course_text = $row_eval[text];
					$course_amenities = $row_eval[course_amenities];
					$course_support = $row_eval[course_support];
					$course_flier = $row_eval[course_flier];
					$course_colleague = $row_eval[course_colleague];
					$course_super = $row_eval[course_super];
					$course_email = $row_eval[course_email];
					$course_other = $row_eval[course_other];
					$course_other_spec = $row_eval[course_other_spec];
					$course_offer = $row_eval[course_offer];
					$course_barriers = $row_eval[course_barriers];
					$course_conflict = $row_eval[course_conflict];
					$course_comments = $row_eval[course_comments];
					$fac1_name = $row_eval[fac1_name];
					$fac1_title = $row_eval[fac1_title];
					$fac1_rate = $row_eval[fac1_rate];
					$fac1_comments = $row_eval[fac1_comments];
					$fac2_name = $row_eval[fac2_name];
					$fac2_title = $row_eval[fac2_title];
					$fac2_rate = $row_eval[fac2_rate];
					$fac2_comments = $row_eval[fac2_comments];
					$fac3_name = $row_eval[fac3_name];
					$fac3_title = $row_eval[fac3_title];
					$fac3_rate = $row_eval[fac3_rate];
					$fac3_comments = $row_eval[fac3_comments];
					$fac4_name = $row_eval[fac4_name];
					$fac4_title = $row_eval[fac4_title];
					$fac4_rate = $row_eval[fac4_rate];
					$fac4_comments = $row_eval[fac4_comments];
					$fac5_name = $row_eval[fac5_name];
					$fac5_title = $row_eval[fac5_title];
					$fac5_rate = $row_eval[fac5_rate];
					$fac5_comments = $row_eval[fac5_comments];
					$fac6_name = $row_eval[fac6_name];
					$fac6_title = $row_eval[fac6_title];
					$fac6_rate = $row_eval[fac6_rate];
					$fac6_comments = $row_eval[fac6_comments];
					$fac_leader = $row_eval[fac_leader];
					$fac_leader_rate = $row_eval[fac_leader_rate];
					$fac_leader_comments = $row_eval[fac_leader_comments];
					$fac_leader2 = $row_eval[fac_leader2];
					$fac_leader2_rate = $row_eval[fac_leader2_rate];
					$fac_leader2_comments = $row_eval[fac_leader2_comments];
				}
				// end if $r_eval == 1
			
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
			
			
			print "<form name= \"clinepi_eval\" method= \"post\" action= \"clinepi_eval_rpt.php\">";

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
					print "<td colspan= \"7\"><textarea name= \"fac1_comments\" cols= \"60\" rows= \"6\">
					$fac1_comments</textarea></td>";
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
					print "<td colspan= \"7\"><textarea name= \"fac2_comments\" cols= \"60\" rows= \"6\">
					$fac2_comments</textarea></td>";
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
					print "<td colspan= \"7\"><textarea name= \"fac3_comments\" cols= \"60\" rows= \"6\">
					$fac3_comments</textarea></td>";
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
					print "<td colspan= \"7\"><textarea name= \"fac4_comments\" cols= \"60\" rows= \"6\">
					$fac4_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
// End Faculty 4
				
// Faculty 5				
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
					print "<td colspan= \"7\"><textarea name= \"fac5_comments\" cols= \"60\" rows= \"6\">
					$fac5_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
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
					print "<td colspan= \"7\"><textarea name= \"fac6_comments\" cols= \"60\" rows= \"6\">
					$fac6_comments</textarea></td>";
				print "</tr>";
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
			} // end if $day1- == Friday
// End Faculty 6
				
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
				
// COURSE AND FACULTY EVALUATION (DISPLAYED ON MONDAY ONLY)
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
					print "<td colspan= \"1\">$fac_leader</td>";

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
					print "<td colspan= \"7\"><textarea name= \"fac_leader_comments\" cols= \"60\" rows= \"6\">
					$fac_leader_comments</textarea></td>";
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
					print "<td colspan= \"6\"><strong>Pleae make any other comments that will help us improve the course.</strong></td>";
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
				
				print "<tr><td colspan= \"7\">&nbsp;</td></tr>";
				
// SUBMIT
				print "<tr>";
					print "<td><input type= \"submit\" name= \"sub_eval\" value= \"View Individual Evaluations\"></td>";
				print "</tr>";
			print "</table>";
			
			print "</form>";
		} // end if $sub_eval = View Evaluation
		
		if ($sub_eval == "Log on")
		{

			$q_user = "SELECT * FROM cme_user WHERE cme_user = \"$cme_user\" AND cme_psswd = md5(\"$cme_psswd\") ";
			$r_user = mysqli_query($link, $q_user);

			if (mysqli_num_rows($r_user) ==  1)
			{

				print "<table border= \"1\" cellspacing= \"2\" cellpadding= \"2\" width= \"70%\" align= \"center\">";
				
					print "<caption align= \"left\">";
//						print "<form name= \"evals\" method= \"post\" action= \"clinepi_eval_rpt.php\">";
//						print "<input type= \"submit\" name= \"sub_eval\" value= \"View Individual Evaluations\">";
//						print "</form>";
					
					print "<strong>Evaluation Submission by Registrant</strong></caption>";
				print "<form name= \"cme_eval\" method= \"post\" action= \"clinepi_eval_rpt.php\">";					
					print "<tr>";
						print "<td>&nbsp;</td>";
						print "<td><strong>Name</strong></td>";
						print "<td align= \"center\"><strong>Mon</strong></td>";
						print "<td align= \"center\"><strong>Tue</strong></td>";
						print "<td align= \"center\"><strong>Wed</strong></td>";
						print "<td align= \"center\"><strong>Thu</strong></td>";
						print "<td align= \"center\"><strong>Fri</strong></td>";
					print "</tr>";
				
				$q_eval = "SELECT * FROM cme_reg WHERE cme_reg.conf_year = \"2017\" ORDER BY cme_reg.lname, cme_reg.fname";
				
				$r_eval = mysqli_query($link, $q_eval);
				
				$ct = 1;
				
				while ($row_eval = mysqli_fetch_array($r_eval, MYSQLI_ASSOC))
				{
					$eval_email = $row_eval['email'];
					$eval_name = "$row_eval[fname] $row_eval[lname]";
					
					$monday = " ";
					$tuesday = " ";
					$wednesday = " ";
					$thursday = " ";
					$friday = " ";

					CHECK_DAYS($eval_email, $ct, $eval_name, $link);

					$ct++;
						
				
				} // end while $row_eval
				
				print "</table>";				
				
				print "</form>";
			} // if num_rows
		
		} //end if $sub_eval == Log on
		
		if (!$sub_eval)
		{
			print "<form name= \"eval_logon\" method= \"post\" action= \"clinepi_eval_rpt.php\">";
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
					print "<td colspan= \"2\"><input type= \"submit\" name= \"sub_eval\" value= \"Log on\"></td>";
				print "</tr>";
			print "</table>";
			print "</form>";
		} // end if ! $sub_eval
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
 


