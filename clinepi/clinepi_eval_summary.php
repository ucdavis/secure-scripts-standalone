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
$day1 = $_POST["day1"];

$cme_user = $_POST["cme_user"];
$cme_psswd = $_POST["cme_psswd"];

//$sub_eval = "View Evaluation Summary";
//$day1 = "Thursday";

$eval_id = $_POST["eval_id"];

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
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"))) 
	{
 		
function CHECK_DAYS($check_email, $check_ct, $check_name)
{
	$q_check = "SELECT * FROM clinepi_survey WHERE email = \"$check_email\" AND eval_year = \"2017\" ";
	$r_check = mysqli_query($link, $q_check);
	
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

function AVG($num1, $num2)
{
	$percent = $num1/$num2;
//	$percent = $percent * 100;
	$percent = round($percent,1);
	return $percent;
} // end function

		
		print "<div align= \"left\"><b><u>Clinical Epidemiology and Study Design Evaluation</u></b></div>";
		
		print "<p>&nbsp;</p>";
		
		if (($sub_eval == "Log on") || ($sub_eval == "View Evaluation Summary"))
		{

// show day of week selection
			print "<form name= \"evals\" method= \"post\" action= \"clinepi_eval_summary.php\">";
						
				print "<table border= \"0\" width= \"100%\" cellspacing= \"0\" cellpadding= \"0\" align= \"center\">";
					print "<tr>";
						print "<td colspan= \"6\"><strong>Show evaluation summary for this day of the week:</strong></td>";
					print "</tr>";
							
					print "<tr>";
						print "<td colspan= \"6\">";
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

						print "</select>&nbsp;&nbsp;&nbsp;";

						print "&nbsp;<input type= \"submit\" name= \"sub_eval\" value= \"View Evaluation Summary\"></td>";
					print "</tr>";
					
					print "<tr><td>&nbsp;</tr></td>";
					
					print "<tr>";
						print "<td><a href= \"clinepi_eval_summary.php#lecture\">Lecture Ratings</a></td>";
 if ($day1 == "Monday") print "<td><a href= \"clinepi_eval_summary.php#leader\">Group Leader Ratings</a></td>";
//						print "<td><a href= \"clinepi_eval_summary.php#coleader\">Group Co-Leader Ratings</a></td>";
						print "<td><a href= \"clinepi_eval_summary.php#course\">Overall Course Ratings</a></td>";
						print "<td><a href= \"clinepi_eval_summary.php#hear\">How Did you Hear About Us Stats</a></td>";
						print "<td><a href= \"clinepi_eval_summary.php#comments\">Course Comments</a></td>";
					print "</tr>";
					
					print "<tr><td><a name=\"top\">&nbsp;</td></tr>";
					
				print "</table>";
						
			print "</form>";
			
			

// end display day of week selection		

// LECTURER EVALUATIONS
			if (!$day1) $day1 = "Monday";
			
			$q_evals = "SELECT * FROM clinepi_survey WHERE day1 LIKE \"$day1\" AND eval_year = \"2017\" ";
			$r_evals = mysqli_query($link, $q_evals);
			
			$fac1_one = 0;
			$fac1_two = 0;
			$fac1_three = 0;
			$fac1_four = 0;
			$fac1_five = 0;
			$fac1_na = 0;
			$fac1_sum = 0;
			$fac1_ct = 0;
			$fac1_comments = "";
			
			$fac2_one = 0;
			$fac2_two = 0;
			$fac2_three = 0;
			$fac2_four = 0;
			$fac2_five = 0;
			$fac2_na = 0;
			$fac2_sum = 0;
			$fac2_ct = 0;
			$fac2_comments = "";
			
			$fac3_one = 0;
			$fac3_two = 0;
			$fac3_three = 0;
			$fac3_four = 0;
			$fac3_five = 0;
			$fac3_na = 0;
			$fac3_sum = 0;
			$fac3_ct = 0;
			$fac3_comments = "";
			
			$fac4_one = 0;
			$fac4_two = 0;
			$fac4_three = 0;
			$fac4_four = 0;
			$fac4_five = 0;
			$fac4_na = 0;
			$fac4_sum = 0;
			$fac4_ct = 0;
			$fac4_comments = "";
			
			$fac5_one = 0;
			$fac5_two = 0;
			$fac5_three = 0;
			$fac5_four = 0;
			$fac5_five = 0;
			$fac5_na = 0;
			$fac5_sum = 0;
			$fac5_ct = 0;
			$fac5_comments = "";
			
			$fac6_one = 0;
			$fac6_two = 0;
			$fac6_three = 0;
			$fac6_four = 0;
			$fac6_five = 0;
			$fac6_na = 0;
			$fac6_sum = 0;
			$fac6_ct = 0;
			$fac6_comments = "";
			
			while ($row_evals = mysqli_fetch_array($r_evals, MYSQLI_ASSOC))
			{
// FACULTY 1
				if ($row_evals[fac1_rate] == 1)
				{
					$fac1_one++;
					$fac1_ct++;
					$fac1_sum = $fac1_sum + $row_evals[fac1_rate];
				}
			
				if ($row_evals[fac1_rate] == 2)
				{
					$fac1_two++;
					$fac1_ct++;
					$fac1_sum = $fac1_sum + $row_evals[fac1_rate];
				}
			
				if ($row_evals[fac1_rate] == 3)
				{
					$fac1_three++;
					$fac1_ct++;
					$fac1_sum = $fac1_sum + $row_evals[fac1_rate];
				}
			
				if ($row_evals[fac1_rate] == 4)
				{
					$fac1_four++;
					$fac1_ct++;
					$fac1_sum = $fac1_sum + $row_evals[fac1_rate];
				}
			
				if ($row_evals[fac1_rate] == 5)
				{
					$fac1_five++;
					$fac1_ct++;
					$fac1_sum = $fac1_sum + $row_evals[fac1_rate];
				}
			
				if ($row_evals[fac1_rate] == 6)
				{
					$fac1_na++;
				}
				
				if (str_word_count($row_evals[fac1_comments]) > 0) $fac1_comments .= "$row_evals[fac1_comments]<br><br>";
			
// FACULTY 2
				if ($row_evals[fac2_rate] == 1)
				{
					$fac2_one++;
					$fac2_ct++;
					$fac2_sum = $fac2_sum + $row_evals[fac2_rate];
				}
			
				if ($row_evals[fac2_rate] == 2)
				{
					$fac2_two++;
					$fac2_ct++;
					$fac2_sum = $fac2_sum + $row_evals[fac2_rate];
				}
			
				if ($row_evals[fac2_rate] == 3)
				{
					$fac2_three++;
					$fac2_ct++;
					$fac2_sum = $fac2_sum + $row_evals[fac2_rate];
				}
			
				if ($row_evals[fac2_rate] == 4)
				{
					$fac2_four++;
					$fac2_ct++;
					$fac2_sum = $fac2_sum + $row_evals[fac2_rate];
				}
			
				if ($row_evals[fac2_rate] == 5)
				{
					$fac2_five++;
					$fac2_ct++;
					$fac2_sum = $fac2_sum + $row_evals[fac2_rate];
				}

			
				if ($row_evals[fac2_rate] == 6)
				{
					$fac2_na++;
				}
				
				if (str_word_count($row_evals[fac2_comments]) > 0) $fac2_comments .= "$row_evals[fac2_comments]<br><br>";

// FACULTY 3
				if ($row_evals[fac3_rate] == 1)
				{
					$fac3_one++;
					$fac3_ct++;
					$fac3_sum = $fac3_sum + $row_evals[fac3_rate];
				}
			
				if ($row_evals[fac3_rate] == 2)
				{
					$fac3_two++;
					$fac3_ct++;
					$fac3_sum = $fac3_sum + $row_evals[fac3_rate];
				}
			
				if ($row_evals[fac3_rate] == 3)
				{
					$fac3_three++;
					$fac3_ct++;
					$fac3_sum = $fac3_sum + $row_evals[fac3_rate];
				}
			
				if ($row_evals[fac3_rate] == 4)
				{
					$fac3_four++;
					$fac3_ct++;
					$fac3_sum = $fac3_sum + $row_evals[fac3_rate];
				}
			
				if ($row_evals[fac3_rate] == 5)
				{
					$fac3_five++;
					$fac3_ct++;
					$fac3_sum = $fac3_sum + $row_evals[fac3_rate];
				}
			
				if ($row_evals[fac3_rate] == 6)
				{
					$fac3_na++;
				}
				
				if (str_word_count($row_evals[fac3_comments]) > 0) $fac3_comments .= "$row_evals[fac3_comments]<br><br>";

//FACULTY 4
				if ($row_evals[fac4_rate] == 1)
				{
					$fac4_one++;
					$fac4_ct++;
					$fac4_sum = $fac4_sum + $row_evals[fac4_rate];
				}
			
				if ($row_evals[fac4_rate] == 2)
				{
					$fac4_two++;
					$fac4_ct++;
					$fac4_sum = $fac4_sum + $row_evals[fac4_rate];
				}
			
				if ($row_evals[fac4_rate] == 3)
				{
					$fac4_three++;
					$fac4_ct++;
					$fac4_sum = $fac4_sum + $row_evals[fac4_rate];
				}
			
				if ($row_evals[fac4_rate] == 4)
				{
					$fac4_four++;
					$fac4_ct++;
					$fac4_sum = $fac4_sum + $row_evals[fac4_rate];
				}
			
				if ($row_evals[fac4_rate] == 5)
				{
					$fac4_five++;
					$fac4_ct++;
					$fac4_sum = $fac4_sum + $row_evals[fac4_rate];
				}
			
				if ($row_evals[fac4_rate] == 6)
				{
					$fac4_na++;
				}
				
				if (str_word_count($row_evals[fac4_comments]) > 0) $fac4_comments .= "$row_evals[fac4_comments]<br><br>";

// FACULTY 5
				if ($row_evals[fac5_rate] == 1)
				{
					$fac5_one++;
					$fac5_ct++;
					$fac5_sum = $fac5_sum + $row_evals[fac5_rate];
				}
			
				if ($row_evals[fac5_rate] == 2)
				{
					$fac5_two++;
					$fac5_ct++;
					$fac5_sum = $fac5_sum + $row_evals[fac5_rate];
				}
			
				if ($row_evals[fac5_rate] == 3)
				{
					$fac5_three++;
					$fac5_ct++;
					$fac5_sum = $fac5_sum + $row_evals[fac5_rate];
				}
			
				if ($row_evals[fac5_rate] == 4)
				{
					$fac5_four++;
					$fac5_ct++;
					$fac5_sum = $fac5_sum + $row_evals[fac5_rate];
				}
			
				if ($row_evals[fac5_rate] == 5)
				{
					$fac5_five++;
					$fac5_ct++;
					$fac5_sum = $fac5_sum + $row_evals[fac5_rate];
				}
			
				if ($row_evals[fac5_rate] == 6)
				{
					$fac5_na++;
				}
				
				if (str_word_count($row_evals[fac5_comments]) > 0) $fac5_comments .= "$row_evals[fac5_comments]<br><br>";

// FACULTY 6
				if ($row_evals[fac6_rate] == 1)
				{
					$fac6_one++;
					$fac6_ct++;
					$fac6_sum = $fac6_sum + $row_evals[fac6_rate];
				}
			
				if ($row_evals[fac6_rate] == 2)
				{
					$fac6_two++;
					$fac6_ct++;
					$fac6_sum = $fac6_sum + $row_evals[fac6_rate];
				}
			
				if ($row_evals[fac6_rate] == 3)
				{
					$fac6_three++;
					$fac6_ct++;
					$fac6_sum = $fac6_sum + $row_evals[fac6_rate];
				}
			
				if ($row_evals[fac6_rate] == 4)
				{
					$fac6_four++;
					$fac6_ct++;
					$fac6_sum = $fac6_sum + $row_evals[fac6_rate];
				}
			
				if ($row_evals[fac6_rate] == 5)
				{
					$fac6_five++;
					$fac6_ct++;
					$fac6_sum = $fac6_sum + $row_evals[fac6_rate];
				}
			
				if ($row_evals[fac6_rate] == 6)
				{
					$fac6_na++;
				}
				
				if (str_word_count($row_evals[fac6_comments]) > 0) $fac6_comments .= "$row_evals[fac6_comments]<br><br>";

			} // end while
			
			$fac1_avg = AVG($fac1_sum, $fac1_ct);
			$fac2_avg = AVG($fac2_sum, $fac2_ct);
			$fac3_avg = AVG($fac3_sum, $fac3_ct);
			$fac4_avg = AVG($fac4_sum, $fac4_ct);
			if ($day1 <> "Thursday")$fac5_avg = AVG($fac5_sum, $fac5_ct);
			if ($day1 == "Friday")$fac6_avg = AVG($fac6_sum, $fac6_ct);
			
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
			
			print "<a name=\"lecture\"></a>";
			print "<table width = \"100%\" border= \"1\" cellspacing= \"0\" cellpadding= \"2\">";
				print "<tr>";
					print "<td><font color= \"#FF0000\"><strong>$disp_date</strong></font></td>";
					print "<td valign= \"top\" align= \"center\"><strong>5s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>4s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>3s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>2s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>1s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>NAs</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>Avg</strong></td>";
					print "<td valign= \"top\" align= \"left\"><strong>Comments</strong></td>";
				print "</tr>";
				
// lecturer 1
				print "<tr>";
					print "<td valign= \"top\"><strong>$fac1_name</strong><br>$fac1_title</td>";
					print "<td valign= \"top\" align= \"center\">$fac1_five</td>";
					print "<td valign= \"top\" align= \"center\">$fac1_four</td>";
					print "<td valign= \"top\" align= \"center\">$fac1_three</td>";
					print "<td valign= \"top\" align= \"center\">$fac1_two</td>";
					print "<td valign= \"top\" align= \"center\">$fac1_one</td>";
					print "<td valign= \"top\" align= \"center\">$fac1_na</td>";
					print "<td valign= \"top\" align= \"center\">$fac1_avg</td>";
					print "<td valign= \"top\" align= \"left\">$fac1_comments</td>";
				print "</tr>";

// lecturer 2
				print "<tr>";
					print "<td valign= \"top\"><strong>$fac2_name</strong><br>$fac2_title</td>";
					print "<td valign= \"top\" align= \"center\">$fac2_five</td>";
					print "<td valign= \"top\" align= \"center\">$fac2_four</td>";
					print "<td valign= \"top\" align= \"center\">$fac2_three</td>";
					print "<td valign= \"top\" align= \"center\">$fac2_two</td>";
					print "<td valign= \"top\" align= \"center\">$fac2_one</td>";
					print "<td valign= \"top\" align= \"center\">$fac2_na</td>";
					print "<td valign= \"top\" align= \"center\">$fac2_avg</td>";
					print "<td valign= \"top\" align= \"left\">$fac2_comments</td>";
				print "</tr>";

// lecturer 3
				print "<tr>";
					print "<td valign= \"top\" valign= \"top\"><strong>$fac3_name</strong><br>$fac3_title</td>";
					print "<td valign= \"top\" align= \"center\">$fac3_five</td>";
					print "<td valign= \"top\" align= \"center\">$fac3_four</td>";
					print "<td valign= \"top\" align= \"center\">$fac3_three</td>";
					print "<td valign= \"top\" align= \"center\">$fac3_two</td>";
					print "<td valign= \"top\" align= \"center\">$fac3_one</td>";
					print "<td valign= \"top\" align= \"center\">$fac3_na</td>";
					print "<td valign= \"top\" align= \"center\">$fac3_avg</td>";
					print "<td valign= \"top\" align= \"left\">$fac3_comments</td>";
				print "</tr>";

// lecturer 4
				print "<tr>";
					print "<td valign= \"top\"><strong>$fac4_name</strong><br>$fac4_title</td>";
					print "<td valign= \"top\" align= \"center\">$fac4_five</td>";
					print "<td valign= \"top\" align= \"center\">$fac4_four</td>";
					print "<td valign= \"top\" align= \"center\">$fac4_three</td>";
					print "<td valign= \"top\" align= \"center\">$fac4_two</td>";
					print "<td valign= \"top\" align= \"center\">$fac4_one</td>";
					print "<td valign= \"top\" align= \"center\">$fac4_na</td>";
					print "<td valign= \"top\" align= \"center\">$fac4_avg</td>";
					print "<td valign= \"top\" align= \"left\">$fac4_comments</td>";
				print "</tr>";

// lecturer 5
if ($day1 <> "Thursday")
{
				print "<tr>";
					print "<td valign= \"top\"><strong>$fac5_name</strong><br>$fac5_title</td>";
					print "<td valign= \"top\" align= \"center\">$fac5_five</td>";
					print "<td valign= \"top\" align= \"center\">$fac5_four</td>";
					print "<td valign= \"top\" align= \"center\">$fac5_three</td>";
					print "<td valign= \"top\" align= \"center\">$fac5_two</td>";
					print "<td valign= \"top\" align= \"center\">$fac5_one</td>";
					print "<td valign= \"top\" align= \"center\">$fac5_na</td>";
					print "<td valign= \"top\" align= \"center\">$fac5_avg</td>";
					print "<td valign= \"top\" align= \"left\">$fac5_comments</td>";
				print "</tr>";

}
// lecturer 6
if ($day1 == "Friday")
{
				print "<tr>";
					print "<td valign= \"top\"><strong>$fac6_name</strong><br>$fac6_title</td>";
					print "<td valign= \"top\" align= \"center\">$fac6_five</td>";
					print "<td valign= \"top\" align= \"center\">$fac6_four</td>";
					print "<td valign= \"top\" align= \"center\">$fac6_three</td>";
					print "<td valign= \"top\" align= \"center\">$fac6_two</td>";
					print "<td valign= \"top\" align= \"center\">$fac6_one</td>";
					print "<td valign= \"top\" align= \"center\">$fac6_na</td>";
					print "<td valign= \"top\" align= \"center\">$fac6_avg</td>";
					print "<td valign= \"top\" align= \"left\">$fac6_comments</td>";
				print "</tr>";
} // end if $day1 == Friday
				
			print "</table>";
			print "<p>&nbsp;</p><a href= \"#top\">Back to Top</a>";
			print "<p>&nbsp;</p>";
			
// CALCULATE SUMMARY FOR FACULTY GROUP LEADERS BY DATE
		if ($day1 == "Friday")
		{
			$q_leader = "SELECT fac_leader, fac_leader_rate, fac_leader_comments FROM clinepi_survey WHERE day1 = \"$day1\" and eval_year LIKE \"2017\" ORDER BY fac_leader";
			$r_leader = mysqli_query($link, $q_leader);
			
			print "<a name=\"leader\"></a>";
			print "<table width = \"100%\" border= \"1\" cellspacing= \"0\" cellpadding= \"2\">";
				print "<tr>";
					print "<td colspan= \"9\"><strong><font color= \"#FF0000\">Group Leader Ratings</font></strong></td>";
				print "</tr>";

				print "<tr>";
					print "<td><font color= \"#FF0000\"><strong>$disp_date</strong></font></td>";
					print "<td valign= \"top\" align= \"center\"><strong>5s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>4s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>3s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>2s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>1s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>NAs</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>Avg</strong></td>";
					print "<td valign= \"top\" align= \"left\"><strong>Comments</strong></td>";
				print "</tr>";
				
			$fac_leader = "";
			
			while ($row_leader = mysqli_fetch_array($r_leader, MYSQLI_ASSOC))
			{
				// reset the counter whenever the leader changes
				if ($fac_leader <> $row_leader[fac_leader])
				{
					
// Once the fac_leader name changes print the totals that were calculated and then reset the counter. Do not print if no leader name					
					if ($fac_leader <> "")
					{
						$fac_leader_avg = AVG($fac_leader_sum, $fac_leader_ct);
						
						print "<tr>";
							print "<td valign= \"top\"><strong>$fac_leader</strong></td>";
							print "<td valign= \"top\" align= \"center\">$fac_leader_five</td>";
							print "<td valign= \"top\" align= \"center\">$fac_leader_four</td>";
							print "<td valign= \"top\" align= \"center\">$fac_leader_three</td>";
							print "<td valign= \"top\" align= \"center\">$fac_leader_two</td>";
							print "<td valign= \"top\" align= \"center\">$fac_leader_one</td>";
							print "<td valign= \"top\" align= \"center\">$fac_leader_na</td>";
							print "<td valign= \"top\" align= \"center\">$fac_leader_avg</td>";
							print "<td valign= \"top\" align= \"left\">$fac_leader_comments&nbsp;</td>";
						print "</tr>";
					} // end if
					
					$fac_leader_one = 0;
					$fac_leader_two = 0;
					$fac_leader_three = 0;
					$fac_leader_four = 0;
					$fac_leader_five = 0;
					$fac_leader_na = 0;
					$fac_leader_sum = 0;
					$fac_leader_ct = 0;
					$fac_leader_comments = "";
				} // END IF fac_leader <> $row_leader[fac_leader]
				
				$fac_leader = $row_leader[fac_leader];
			
// FAC LEADER CALCULATE TOTALS
				if ($row_leader[fac_leader_rate] == 1)
				{
					$fac_leader_one++;
					$fac_leader_ct++;
					$fac_leader_sum = $fac_leader_sum + $row_leader[fac_leader_rate];
				}
			
				if ($row_leader[fac_leader_rate] == 2)
				{
					$fac_leader_two++;
					$fac_leader_ct++;
					$fac_leader_sum = $fac_leader_sum + $row_leader[fac_leader_rate];
				}
			
				if ($row_leader[fac_leader_rate] == 3)
				{
					$fac_leader_three++;
					$fac_leader_ct++;
					$fac_leader_sum = $fac_leader_sum + $row_leader[fac_leader_rate];
				}
			
				if ($row_leader[fac_leader_rate] == 4)
				{
					$fac_leader_four++;
					$fac_leader_ct++;
					$fac_leader_sum = $fac_leader_sum + $row_leader[fac_leader_rate];
				}
			
				if ($row_leader[fac_leader_rate] == 5)
				{
					$fac_leader_five++;
					$fac_leader_ct++;
					$fac_leader_sum = $fac_leader_sum + $row_leader[fac_leader_rate];
				}
			
				if ($row_leader[fac_leader_rate] == 6)
				{
					$fac_leader_na++;
				}
				
				if (str_word_count($row_leader[fac_leader_comments]) > 0) $fac_leader_comments .= "$row_leader[fac_leader_comments]<br><br>";

			} // end while
			
			// print the last record from the table -- this is printed because each row on the faculty name change and the last row does not result in a new change and was not printed in the while statement.
				print "<tr>";
					print "<td valign= \"top\"><strong>$fac_leader</strong></td>";
					print "<td valign= \"top\" align= \"center\">$fac_leader_five</td>";
					print "<td valign= \"top\" align= \"center\">$fac_leader_four</td>";
					print "<td valign= \"top\" align= \"center\">$fac_leader_three</td>";
					print "<td valign= \"top\" align= \"center\">$fac_leader_two</td>";
					print "<td valign= \"top\" align= \"center\">$fac_leader_one</td>";
					print "<td valign= \"top\" align= \"center\">$fac_leader_na</td>";
					print "<td valign= \"top\" align= \"center\">$fac_leader_avg</td>";
					print "<td valign= \"top\" align= \"left\">$fac_leader_comments&nbsp;</td>";
				print "</tr>";

			
			print "</table>";			
			print "<p>&nbsp;</p><a href= \"#top\">Back to Top</a>";
			print "<p>&nbsp;</p>";
	} // end while $day1 -== Monday
				
// CALCULATE SUMMARY FOR SECONDARY FACULTY GROUP LEADERS BY DATE
			$q_leader2 = "SELECT fac_leader, fac_leader2, fac_leader2_rate, fac_leader2_comments FROM clinepi_survey 
			WHERE day1 = \"$day1\" AND eval_year LIKE \"2017\" ORDER BY fac_leader2";   // AND fac_leader2 <> \"none\" 
			$r_leader2 = mysqli_query($link, $q_leader2);
			
//			print "<a name=\"coleader\"></a>";
//			print "<table width = \"100%\" border= \"1\" cellspacing= \"0\" cellpadding= \"2\">";
//				print "<tr>";
//					print "<td colspan= \"9\"><strong><font color= \"#FF0000\">Co-Group Leader Ratings</font></strong></td>";
//				print "</tr>";

//				print "<tr>";
//					print "<td><font color= \"#FF0000\"><strong>$disp_date</strong></font></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>5s</strong></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>4s</strong></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>3s</strong></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>2s</strong></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>1s</strong></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>NAs</strong></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>Avg</strong></td>";
//					print "<td valign= \"top\" align= \"left\"><strong>Comments</strong></td>";
//				print "</tr>";
				
//			$fac_leader2 = "none";
			
//			while ($row_leader2 = mysql_fetch_array($r_leader2))
//			{
				// reset the counter whenever the leader changes
//				if ($fac_leader2 <> $row_leader2[fac_leader2])
//				{
					
// Once the fac_leader name changes print the totals that were calculated and then reset the counter. Do not print if no leader name					
//					if ($fac_leader2 <> "none")
//					{
//						$fac_leader2_avg = AVG($fac_leader2_sum, $fac_leader2_ct);
						
//						print "<tr>";
//							print "<td valign= \"top\"><strong>$fac_leader2</strong><br>(Group leader $fac_leader)</td>";
//							print "<td valign= \"top\" align= \"center\">$fac_leader2_five</td>";
//							print "<td valign= \"top\" align= \"center\">$fac_leader2_four</td>";
//							print "<td valign= \"top\" align= \"center\">$fac_leader2_three</td>";
//							print "<td valign= \"top\" align= \"center\">$fac_leader2_two</td>";
//							print "<td valign= \"top\" align= \"center\">$fac_leader2_one</td>";
//							print "<td valign= \"top\" align= \"center\">$fac_leader2_na</td>";
//							print "<td valign= \"top\" align= \"center\">$fac_leader2_avg</td>";
//							print "<td valign= \"top\" align= \"left\">$fac_leader2_comments&nbsp;</td>";
//						print "</tr>";
//					} // end if
					
//					$fac_leader2_one = 0;
//					$fac_leader2_two = 0;
//					$fac_leader2_three = 0;
//					$fac_leader2_four = 0;
//					$fac_leader2_five = 0;
//					$fac_leader2_na = 0;
//					$fac_leader2_sum = 0;
//					$fac_leader2_ct = 0;
//					$fac_leader2_comments = "";
//				} // END IF fac_leader <> $row_leader[fac_leader]
				
//				$fac_leader2 = $row_leader2[fac_leader2];
//				$fac_leader = $row_leader2[fac_leader];
			
// FAC LEADER CALCULATE TOTALS
//				if ($row_leader2[fac_leader2_rate] == 1)
//				{
//					$fac_leader2_one++;
//					$fac_leader2_ct++;
//					$fac_leader2_sum = $fac_leader2_sum + $row_leader2[fac_leader2_rate];
//				}
			
//				if ($row_leader2[fac_leader2_rate] == 2)
//				{
//					$fac_leader2_two++;
//					$fac_leader2_ct++;
//					$fac_leader2_sum = $fac_leader2_sum + $row_leader2[fac_leader2_rate];
//				}
			
//				if ($row_leader2[fac_leader2_rate] == 3)
//				{
//					$fac_leader2_three++;
//					$fac_leader2_ct++;
//					$fac_leader2_sum = $fac_leader2_sum + $row_leader2[fac_leader2_rate];
//				}
			
//				if ($row_leader2[fac_leader2_rate] == 4)
//				{
//					$fac_leader2_four++;
//					$fac_leader2_ct++;
//					$fac_leader2_sum = $fac_leader2_sum + $row_leader2[fac_leader2_rate];
//				}
			
//				if ($row_leader2[fac_leader2_rate] == 5)
//				{
//					$fac_leader2_five++;
//					$fac_leader2_ct++;
//					$fac_leader2_sum = $fac_leader2_sum + $row_leader2[fac_leader2_rate];
//				}
			
//				if ($row_leader2[fac_leader2_rate] == 6)
//				{
//					$fac_leader2_na++;
//				}
				
//				if ($row_leader2[fac_leader2_comments]) $fac_leader2_comments .= "$row_leader2[fac_leader2_comments]<br><br>";

//			} // end while
			
//			print "</table>";			
//			print "<p>&nbsp;</p><a href= \"ClinEpi_eval_summary.php\">Back to Top</a>";
//			print "<p>&nbsp;</p>";

// COURSE EVALUATIONS
			
			$q_course = "SELECT * FROM clinepi_survey WHERE day1 LIKE \"Friday\" AND eval_year = \"2017\" ";
			$r_course = mysqli_query($link, $q_course);
			
			$course_obj_one = 0;
			$course_obj_two = 0;
			$course_obj_three = 0;
			$course_obj_four = 0;
			$course_obj_five = 0;
			$course_obj_na = 0;
			$course_obj_sum = 0;
			$course_obj_ct = 0;

			$course_needs_one = 0;
			$course_needs_two = 0;
			$course_needs_three = 0;
			$course_needs_four = 0;
			$course_needs_five = 0;
			$course_needs_na = 0;
			$course_needs_sum = 0;
			$course_needs_ct = 0;

			$course_material_one = 0;
			$course_material_two = 0;
			$course_material_three = 0;
			$course_material_four = 0;
			$course_material_five = 0;
			$course_material_na = 0;
			$course_material_sum = 0;
			$course_material_ct = 0;

			$course_expect_one = 0;
			$course_expect_two = 0;
			$course_expect_three = 0;
			$course_expect_four = 0;
			$course_expect_five = 0;
			$course_expect_na = 0;
			$course_expect_sum = 0;
			$course_expect_ct = 0;

			$course_present_one = 0;
			$course_present_two = 0;
			$course_present_three = 0;
			$course_present_four = 0;
			$course_present_five = 0;
			$course_present_na = 0;
			$course_present_sum = 0;
			$course_present_ct = 0;

			$course_overall_one = 0;
			$course_overall_two = 0;
			$course_overall_three = 0;
			$course_overall_four = 0;
			$course_overall_five = 0;
			$course_overall_na = 0;
			$course_overall_sum = 0;
			$course_overall_ct = 0;

			$course_syllabus_one = 0;
			$course_syllabus_two = 0;
			$course_syllabus_three = 0;
			$course_syllabus_four = 0;
			$course_syllabus_five = 0;
			$course_syllabus_na = 0;
			$course_syllabus_sum = 0;
			$course_syllabus_ct = 0;

			$course_text_one = 0;
			$course_text_two = 0;
			$course_text_three = 0;
			$course_text_four = 0;
			$course_text_five = 0;
			$course_text_na = 0;
			$course_text_sum = 0;
			$course_text_ct = 0;

			$course_amenities_one = 0;
			$course_amenities_two = 0;
			$course_amenities_three = 0;
			$course_amenities_four = 0;
			$course_amenities_five = 0;
			$course_amenities_na = 0;
			$course_amenities_sum = 0;
			$course_amenities_ct = 0;

			$course_support_one = 0;
			$course_support_two = 0;
			$course_support_three = 0;
			$course_support_four = 0;
			$course_support_five = 0;
			$course_support_na = 0;
			$course_support_sum = 0;
			$course_support_ct = 0;

			$course_flier_one = 0;
			$course_flier_na = 0;
			$course_flier_sum = 0;
			$course_flier_ct = 0;

			$course_colleague_one = 0;
			$course_colleague_na = 0;
			$course_colleague_sum = 0;
			$course_colleague_ct = 0;

			$course_super_one = 0;
			$course_super_na = 0;
			$course_super_sum = 0;
			$course_super_ct = 0;

			$course_email_one = 0;
			$course_email_na = 0;
			$course_email_sum = 0;
			$course_email_ct = 0;

			$course_other_one = 0;
			$course_other_na = 0;
			$course_other_sum = 0;
			$course_other_ct = 0;

			$course_other_spec_comments = "";
			$course_tech_comments = "";
			$course_aspect_best_comments = "";
			$course_aspect_weak_comments = "";
			$course_offer_comments = "";
			$course_barriers_comments = "";
			$course_conflict_comments = "";
			$course_comments = "";
			
			
			while ($row_course = mysqli_fetch_array($r_course, MYSQLI_ASSOC))
			{
// COURSE OBJECTTIVE
				if ($row_course[course_obj] == 1)
				{
					$course_obj_one++;
					$course_obj_ct++;
					$course_obj_sum = $course_obj_sum + $row_course[course_obj];
				}
			
				if ($row_course[course_obj] == 2)
				{
					$course_obj_two++;
					$course_obj_ct++;
					$course_obj_sum = $course_obj_sum + $row_course[course_obj];
				}
			
				if ($row_course[course_obj] == 3)
				{
					$course_obj_three++;
					$course_obj_ct++;
					$course_obj_sum = $course_obj_sum + $row_course[course_obj];
				}
			
				if ($row_course[course_obj] == 4)
				{
					$course_obj_four++;
					$course_obj_ct++;
					$course_obj_sum = $course_obj_sum + $row_course[course_obj];
				}
			
				if ($row_course[course_obj] == 5)
				{
					$course_obj_five++;
					$course_obj_ct++;
					$course_obj_sum = $course_obj_sum + $row_course[course_obj];
				}
			
				if ($row_course[course_obj] == 0)
				{
					$course_obj_na++;
				}
				
// COURSE NEEDS
				if ($row_course[course_needs] == 1)
				{
					$course_needs_one++;
					$course_needs_ct++;
					$course_needs_sum = $course_needs_sum + $row_course[course_needs];
				}
			
				if ($row_course[course_needs] == 2)
				{
					$course_needs_two++;
					$course_needs_ct++;
					$course_needs_sum = $course_needs_sum + $row_course[course_needs];
				}
			
				if ($row_course[course_needs] == 3)
				{
					$course_needs_three++;
					$course_needs_ct++;
					$course_needs_sum = $course_needs_sum + $row_course[course_needs];
				}
			
				if ($row_course[course_needs] == 4)
				{
					$course_needs_four++;
					$course_needs_ct++;
					$course_needs_sum = $course_needs_sum + $row_course[course_needs];
				}
			
				if ($row_course[course_needs] == 5)
				{
					$course_needs_five++;
					$course_needs_ct++;
					$course_needs_sum = $course_needs_sum + $row_course[course_needs];
				}
			
				if ($row_course[course_needs] == 0)
				{
					$course_needs_na++;
				}
				
// COURSE MATERIAL
				if ($row_course[course_material] == 1)
				{
					$course_material_one++;
					$course_material_ct++;
					$course_material_sum = $course_material_sum + $row_course[course_material];
				}
			
				if ($row_course[course_material] == 2)
				{
					$course_material_two++;
					$course_material_ct++;
					$course_material_sum = $course_material_sum + $row_course[course_material];
				}
			
				if ($row_course[course_material] == 3)
				{
					$course_material_three++;
					$course_material_ct++;
					$course_material_sum = $course_material_sum + $row_course[course_material];
				}
			
				if ($row_course[course_material] == 4)
				{
					$course_material_four++;
					$course_material_ct++;
					$course_material_sum = $course_material_sum + $row_course[course_material];
				}
			
				if ($row_course[course_material] == 5)
				{
					$course_material_five++;
					$course_material_ct++;
					$course_material_sum = $course_material_sum + $row_course[course_material];
				}
			
				if ($row_course[course_material] == 0)
				{
					$course_material_na++;
				}
				
// COURSE EXPECT
				if ($row_course[course_expect] == 1)
				{
					$course_expect_one++;
					$course_expect_ct++;
					$course_expect_sum = $course_expect_sum + $row_course[course_expect];
				}
			
				if ($row_course[course_expect] == 2)
				{
					$course_expect_two++;
					$course_expect_ct++;
					$course_expect_sum = $course_expect_sum + $row_course[course_expect];
				}
			
				if ($row_course[course_expect] == 3)
				{
					$course_expect_three++;
					$course_expect_ct++;
					$course_expect_sum = $course_expect_sum + $row_course[course_expect];
				}
			
				if ($row_course[course_expect] == 4)
				{
					$course_expect_four++;
					$course_expect_ct++;
					$course_expect_sum = $course_expect_sum + $row_course[course_expect];
				}
			
				if ($row_course[course_expect] == 5)
				{
					$course_expect_five++;
					$course_expect_ct++;
					$course_expect_sum = $course_expect_sum + $row_course[course_expect];
				}
			
				if ($row_course[course_expect] == 0)
				{
					$course_expect_na++;
				}
				
// COURSE PRESENT
				if ($row_course[course_present] == 1)
				{
					$course_present_one++;
					$course_present_ct++;
					$course_present_sum = $course_present_sum + $row_course[course_present];
				}
			
				if ($row_course[course_present] == 2)
				{
					$course_present_two++;
					$course_present_ct++;
					$course_present_sum = $course_present_sum + $row_course[course_present];
				}
			
				if ($row_course[course_present] == 3)
				{
					$course_present_three++;
					$course_present_ct++;
					$course_present_sum = $course_present_sum + $row_course[course_present];
				}
			
				if ($row_course[course_present] == 4)
				{
					$course_present_four++;
					$course_present_ct++;
					$course_present_sum = $course_present_sum + $row_course[course_present];
				}
			
				if ($row_course[course_present] == 5)
				{
					$course_present_five++;
					$course_present_ct++;
					$course_present_sum = $course_present_sum + $row_course[course_present];
				}
			
				if ($row_course[course_present] == 0)
				{
					$course_present_na++;
				}
				
// COURSE OVERALL
				if ($row_course[course_overall] == 1)
				{
					$course_overall_one++;
					$course_overall_ct++;
					$course_overall_sum = $course_overall_sum + $row_course[course_overall];
				}
			
				if ($row_course[course_overall] == 2)
				{
					$course_overall_two++;
					$course_overall_ct++;
					$course_overall_sum = $course_overall_sum + $row_course[course_overall];
				}
			
				if ($row_course[course_overall] == 3)
				{
					$course_overall_three++;
					$course_overall_ct++;
					$course_overall_sum = $course_overall_sum + $row_course[course_overall];
				}
			
				if ($row_course[course_overall] == 4)
				{
					$course_overall_four++;
					$course_overall_ct++;
					$course_overall_sum = $course_overall_sum + $row_course[course_overall];
				}
			
				if ($row_course[course_overall] == 5)
				{
					$course_overall_five++;
					$course_overall_ct++;
					$course_overall_sum = $course_overall_sum + $row_course[course_overall];
				}
			
				if ($row_course[course_overall] == 0)
				{
					$course_overall_na++;
				}
				
// COURSE SYLLABUS
				if ($row_course[course_syllabus] == 1)
				{
					$course_syllabus_one++;
					$course_syllabus_ct++;
					$course_syllabus_sum = $course_syllabus_sum + $row_course[course_syllabus];
				}
			
				if ($row_course[course_syllabus] == 2)
				{
					$course_syllabus_two++;
					$course_syllabus_ct++;
					$course_syllabus_sum = $course_syllabus_sum + $row_course[course_syllabus];
				}
			
				if ($row_course[course_syllabus] == 3)
				{
					$course_syllabus_three++;
					$course_syllabus_ct++;
					$course_syllabus_sum = $course_syllabus_sum + $row_course[course_syllabus];
				}
			
				if ($row_course[course_syllabus] == 4)
				{
					$course_syllabus_four++;
					$course_syllabus_ct++;
					$course_syllabus_sum = $course_syllabus_sum + $row_course[course_syllabus];
				}
			
				if ($row_course[course_syllabus] == 5)
				{
					$course_syllabus_five++;
					$course_syllabus_ct++;
					$course_syllabus_sum = $course_syllabus_sum + $row_course[course_syllabus];
				}
			
				if ($row_course[course_syllabus] == 0)
				{
					$course_syllabus_na++;
				}
				
// COURSE TEXT
				if ($row_course[course_text] == 1)
				{
					$course_text_one++;
					$course_text_ct++;
					$course_text_sum = $course_text_sum + $row_course[course_text];
				}
			
				if ($row_course[course_text] == 2)
				{
					$course_text_two++;
					$course_text_ct++;
					$course_text_sum = $course_text_sum + $row_course[course_text];
				}
			
				if ($row_course[course_text] == 3)
				{
					$course_text_three++;
					$course_text_ct++;
					$course_text_sum = $course_text_sum + $row_course[course_text];
				}
			
				if ($row_course[course_text] == 4)
				{
					$course_text_four++;
					$course_text_ct++;
					$course_text_sum = $course_text_sum + $row_course[course_text];
				}
			
				if ($row_course[course_text] == 5)
				{
					$course_text_five++;
					$course_text_ct++;
					$course_text_sum = $course_text_sum + $row_course[course_text];
				}
			
				if ($row_course[course_text] == 0)
				{
					$course_text_na++;
				}
				
// COURSE AMENITIES
				if ($row_course[course_amenities] == 1)
				{
					$course_amenities_one++;
					$course_amenities_ct++;
					$course_amenities_sum = $course_amenities_sum + $row_course[course_amenities];
				}
			
				if ($row_course[course_amenities] == 2)
				{
					$course_amenities_two++;
					$course_amenities_ct++;
					$course_amenities_sum = $course_amenities_sum + $row_course[course_amenities];
				}
			
				if ($row_course[course_amenities] == 3)
				{
					$course_amenities_three++;
					$course_amenities_ct++;
					$course_amenities_sum = $course_amenities_sum + $row_course[course_amenities];
				}
			
				if ($row_course[course_amenities] == 4)
				{
					$course_amenities_four++;
					$course_amenities_ct++;
					$course_amenities_sum = $course_amenities_sum + $row_course[course_amenities];
				}
			
				if ($row_course[course_amenities] == 5)
				{
					$course_amenities_five++;
					$course_amenities_ct++;
					$course_amenities_sum = $course_amenities_sum + $row_course[course_amenities];
				}
			
				if ($row_course[course_amenities] == 0)
				{
					$course_amenities_na++;
				}
				
// COURSE SUPPORT
				if ($row_course[course_support] == 1)
				{
					$course_support_one++;
					$course_support_ct++;
					$course_support_sum = $course_support_sum + $row_course[course_support];
				}
			
				if ($row_course[course_support] == 2)
				{
					$course_support_two++;
					$course_support_ct++;
					$course_support_sum = $course_support_sum + $row_course[course_support];
				}
			
				if ($row_course[course_support] == 3)
				{
					$course_support_three++;
					$course_support_ct++;
					$course_support_sum = $course_support_sum + $row_course[course_support];
				}
			
				if ($row_course[course_support] == 4)
				{
					$course_support_four++;
					$course_support_ct++;
					$course_support_sum = $course_support_sum + $row_course[course_support];
				}
			
				if ($row_course[course_support] == 5)
				{
					$course_support_five++;
					$course_support_ct++;
					$course_support_sum = $course_support_sum + $row_course[course_support];
				}
			
				if ($row_course[course_support] == 0)
				{
					$course_support_na++;
				}
				
// COURSE FLIER
				if ($row_course[course_flier] == 1)
				{
					$course_flier_one++;
					$course_flier_ct++;
					$course_flier_sum = $course_flier_sum + $row_course[course_flier];
				}
				
// COURSE COLLEAGUE
				if ($row_course[course_colleague] == 1)
				{
					$course_colleague_one++;
					$course_colleague_ct++;
					$course_colleague_sum = $course_colleague_sum + $row_course[course_colleague];
				}
				
// COURSE SUPER
				if ($row_course[course_super] == 1)
				{
					$course_super_one++;
					$course_super_ct++;
					$course_super_sum = $course_super_sum + $row_course[course_super];
				}
				
// COURSE EMAIL
				if ($row_course[course_email] == 1)
				{
					$course_email_one++;
					$course_email_ct++;
					$course_email_sum = $course_email_sum + $row_course[course_email];
				}
				
// COURSE OTHER
				if ($row_course[course_other] == 1)
				{
					$course_other_one++;
					$course_other_ct++;
					$course_other_sum = $course_other_sum + $row_course[course_other];
				}
				
// COURSE COMMENTS
				if ($row_course[course_other_spec]) $course_other_spec_comments .= "$row_course[course_other_spec]<br><br>";
				if ($row_course[course_tech]) $course_tech_comments .= "$row_course[course_tech]<br><br>";
				if ($row_course[course_aspects_best]) $course_aspects_best_comments .= "$row_course[course_aspects_best]<br><br>";
				if ($row_course[course_aspects_weak]) $course_aspects_weak_comments .= "$row_course[course_aspects_weak]<br><br>";
				if ($row_course[course_offer]) $course_offer_comments .= "$row_course[course_offer]<br><br>";
				if ($row_course[course_barriers]) $course_barriers_comments .= "$row_course[course_barriers]<br><br>";
				if ($row_course[course_conflict]) $course_conflict_comments .= "$row_course[course_conflict]<br><br>";
				if ($row_course[course_comments]) $course_comments .= "$row_course[course_comments]<br><br>";
			

			} // end while
			
			$course_obj_avg = AVG($course_obj_sum, $course_obj_ct);
			$course_needs_avg = AVG($course_needs_sum, $course_needs_ct);
			$course_material_avg = AVG($course_material_sum, $course_material_ct);
			$course_expect_avg = AVG($course_expect_sum, $course_expect_ct);
			$course_present_avg = AVG($course_present_sum, $course_present_ct);
			$course_overall_avg = AVG($course_overall_sum, $course_overall_ct);
			$course_syllabus_avg = AVG($course_syllabus_sum, $course_syllabus_ct);
			$course_text_avg = AVG($course_text_sum, $course_text_ct);
			$course_amenities_avg = AVG($course_amenities_sum, $course_amenities_ct);
			$course_support_avg = AVG($course_support_sum, $course_support_ct);
			
			print "<p>&nbsp;</p>";

			print "<a name=\"course\"></a>";
			print "<table width = \"100%\" border= \"1\" cellspacing= \"0\" cellpadding= \"2\">";
				print "<tr>";
					print "<td><font color= \"#FF0000\"><strong>OVERALL COURSE RATINGS</strong></font></td>";
					print "<td valign= \"top\" align= \"center\"><strong>5s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>4s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>3s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>2s</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>1s</strong></td>";
//					print "<td valign= \"top\" align= \"center\"><strong>NAs</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>Avg</strong></td>";
//					print "<td valign= \"top\" align= \"left\"><strong>Comments</strong></td>";
				print "</tr>";
				
// course obj
				print "<tr>";
					print "<td valign= \"top\"><strong>Were the overall course objectives met?</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_obj_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_obj_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_obj_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_obj_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_obj_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_obj_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_obj_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_obj_comments</td>";
				print "</tr>";

// course needs
				print "<tr>";
					print "<td valign= \"top\"><strong>Did the course objectives meet your needs?</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_needs_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_needs_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_needs_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_needs_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_needs_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_needs_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_needs_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_needs_comments</td>";
				print "</tr>";

// course material
				print "<tr>";
					print "<td valign= \"top\"><strong>Will the material presented be useful in your work?</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_material_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_material_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_material_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_material_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_material_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_material_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_material_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_material_comments</td>";
				print "</tr>";

// course expect
				print "<tr>";
					print "<td valign= \"top\"><strong>Did the program meet your expectations?</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_expect_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_expect_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_expect_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_expect_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_expect_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_expect_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_expect_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_expect_comments</td>";
				print "</tr>";

// course present
				print "<tr>";
					print "<td valign= \"top\"><strong>Were the presentations well balanced and objective?</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_present_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_present_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_present_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_present_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_present_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_present_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_present_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_present_comments</td>";
				print "</tr>";

// course overall
				print "<tr>";
					print "<td valign= \"top\"><strong>What is your overall rating of the course?</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_overall_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_overall_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_overall_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_overall_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_overall_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_overall_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_overall_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_overall_comments</td>";
				print "</tr>";

// course syllabus
				print "<tr>";
					print "<td valign= \"top\"><strong>Please rate the syllabus</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_syllabus_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_syllabus_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_syllabus_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_syllabus_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_syllabus_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_syllabus_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_syllabus_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_syllabus_comments</td>";
				print "</tr>";

// course text
				print "<tr>";
					print "<td valign= \"top\"><strong>Please rate the text</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_text_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_text_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_text_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_text_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_text_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_text_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_text_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_text_comments</td>";
				print "</tr>";

// course amenities
				print "<tr>";
					print "<td valign= \"top\"><strong>Please rate the physical amenities</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_amenities_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_amenities_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_amenities_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_amenities_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_amenities_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_amenities_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_amenities_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_amenities_comments</td>";
				print "</tr>";

// course support
				print "<tr>";
					print "<td valign= \"top\"><strong>Please rate the computer support</strong></td>";
					print "<td valign= \"top\" align= \"center\">$course_support_five</td>";
					print "<td valign= \"top\" align= \"center\">$course_support_four</td>";
					print "<td valign= \"top\" align= \"center\">$course_support_three</td>";
					print "<td valign= \"top\" align= \"center\">$course_support_two</td>";
					print "<td valign= \"top\" align= \"center\">$course_support_one</td>";
//					print "<td valign= \"top\" align= \"center\">$course_support_na</td>";
					print "<td valign= \"top\" align= \"center\">$course_support_avg</td>";
//					print "<td valign= \"top\" align= \"left\">$course_support_comments</td>";
				print "</tr>";

				
			print "</table>";
			print "<p>&nbsp;</p><a href= \"#top\">Back to Top</a>";
			print "<p>&nbsp;</p>";
			
			print "<a name=\"hear\"></a>";
			print "<table width = \"100%\" border= \"1\" cellspacing= \"0\" cellpadding= \"2\">";
				print "<tr>";
					print "<td colspan=\"6\"><font color=\"#FF0000\"><strong>HOW DID YOU HEAR ABOUT THE PROGRAM</strong></font></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td valign= \"top\" align= \"center\"><strong>Flier</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>Colleague</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>Supervisor</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>E-mail Announcement</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>Other</strong></td>";
					print "<td valign= \"top\" align= \"center\"><strong>Other specified</strong></td>";
				print "</tr>";

				print "<tr>";
					print "<td valign= \"top\" align= \"center\">$course_flier_ct</td>";
					print "<td valign= \"top\" align= \"center\">$course_colleague_ct</td>";
					print "<td valign= \"top\" align= \"center\">$course_super_ct</td>";
					print "<td valign= \"top\" align= \"center\">$course_email_ct</td>";
					print "<td valign= \"top\" align= \"center\">$course_other_ct</td>";
					print "<td valign= \"top\" align= \"center\">$course_other_spec_comments</td>";
				print "</tr>";

			print "</table>";
			print "<p>&nbsp;</p><a href= \"#top\">Back to Top</a>";
			print "<p>&nbsp;</p>";


			print "<a name=\"comments\"></a>";
			print "<table width = \"100%\" border= \"1\" cellspacing= \"0\" cellpadding= \"2\">";
				print "<tr>";
					print "<td><font color= \"#FF0000\"><strong>OVERALL COURSE COMMENTS</strong></font></td>";
				print "</tr>";
				
// course tech
				print "<tr>";
					print "<td valign= \"top\"><strong>Please identify information or techniques you acquired that will be 
					useful in your work</strong></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" align= \"left\">$course_tech_comments</td>";
				print "</tr>";
				print "<tr><td>&nbsp;</td></tr>";

// course aspects best
				print "<tr>";
					print "<td valign= \"top\"><strong>What aspects of the course did you like best? Why?</strong></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" align= \"left\">$course_aspects_best_comments</td>";
				print "</tr>";
				print "<tr><td>&nbsp;</td></tr>";

// course aspects weak
				print "<tr>";
					print "<td valign= \"top\"><strong>What aspects of the course were the weakest and what should be changed? Why?
					</strong></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" align= \"left\">$course_aspects_weak_comments</td>";
				print "</tr>";
				print "<tr><td>&nbsp;</td></tr>";
				
// course offer
				print "<tr>";
					print "<td valign= \"top\"><strong>What time of the year is best for offering the course?</strong></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" align= \"left\">$course_offer_comments</td>";
				print "</tr>";
				print "<tr><td>&nbsp;</td></tr>";
				
// course barriers
				print "<tr>";
					print "<td valign= \"top\"><strong>Please indicate any barriers to attendance that your experienced</strong></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" align= \"left\">$course_barriers_comments</td>";
				print "</tr>";
				print "<tr><td>&nbsp;</td></tr>";
				
// course conflict
				print "<tr>";
					print "<td valign= \"top\"><strong>This presentation was free from commercial bias. 
					If a conflict of interest was noted, please specify</strong></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" align= \"left\">$course_conflict_comments</td>";
				print "</tr>";
				print "<tr><td>&nbsp;</td></tr>";
				
// course conflict
				print "<tr>";
					print "<td valign= \"top\"><strong>Pleae make any other comments that will help us improve the course</strong></td>";
				print "</tr>";
				print "<tr>";
					print "<td valign= \"top\" align= \"left\">$course_comments</td>";
				print "</tr>";
				print "<tr><td>&nbsp;</td></tr>";
				
				
			print "</table>";
			print "<p>&nbsp;</p><a href= \"#top\">Back to Top</a>";
			print "<p>&nbsp;</p>";




			print "<p>&nbsp;</p><a href= \"clinepi_eval_rpt.php\">Go to Individual Evaluation Report</a>";
		
		} // end if sub_eval == view individual evaluations
		
		if (!$sub_eval)
		{
			print "<form name= \"eval_logon\" method= \"post\" action= \"clinepi_eval_summary.php\">";
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
			
		} // end if !$sub_eval
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
 


