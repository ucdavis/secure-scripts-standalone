<?php
include "../includes/service_authentication.php";
// no direct access
?>
<!DOCTYPE html>
<html class=""><!-- InstanceBegin template="/Templates/intranetBase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<!--<![endif]--><head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


<?
// $__ROOTDIR = basename(dirname(__FILE__));
require_once "../../config.inc.php";
?>

<!-- InstanceBeginEditable name="page_title" -->
<title>Department of Public Health Sciences - UC Davis School of Medicine</title>
<!-- InstanceEndEditable -->


<!-- Comment this include for the admin/faculty_xxx.php pages -->
<!-- InstanceBeginEditable name="cas_auth" -->
<?  //include "../../includes/cas_auth.php"; ?>
<!-- InstanceEndEditable -->


<? include "../../includes/css_scripts.php"; ?>

<? include "../../includes/meta_info.php"; ?>

<!-- Start Analytics Tags -->
<? include "../../includes/analytics.php"; ?>
<!-- End Analytics Tags -->
</head>

<body>
    <div class="gridContainer clearfix">

	  <div id="LayoutTitle">
  		<? include "../../includes/top_header.php"; ?>
	  </div> <!-- end Layout Title -->

	  <div id="LayoutMainMenu">
	  	<!-- responsive menu -->
		<div id='topcssmenu'>
			<div id='cssmenu'>
			<!--  Top Menu -->
				<? include "../../includes/top_menu.php"; ?>
			<!--  End Top Menu -->
			</div> <!-- cssmenu -->
		</div> <!-- topcssmenu -->
		<!-- end responsive menu -->
	  </div> <!-- end LayoutMainMenu -->

      <div style="margin-top:0px;">&nbsp;</div>



        <div id="LayoutDiv1">
        <div id="phsContent">

		<!-- InstanceBeginEditable name="mainContent" -->
<?php
include "../includes/common.lib.php";

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
//    $award_title = preg_replace($targets, $replaces, $award_title);

	$dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"));
}


	if ($dbok)
	{

		// Get info from remote_request table
		$q_renew = "SELECT * from remote_request where access_granted = \"1\" and faculty <> \"1\" and expired <> \"1\" and vpn_disabled <> \"1\" ORDER BY expire_date, lname ";
		$r_renew = mysqli_query($link, $q_renew);

		print "<h2>PHS Remote Access VPN - Account Expiration Checklist</h2>";

		$ct = 0;

		print "<table border=\"0\" cellpadding=\"2\" cellspacing=\"2\" width=\"50%\">";
			print "<tr>";
				print "<td>&nbsp;</td>";
				print "<td><strong>Name</strong></td>";
				print "<td><strong>Days Until Expiration</strong></td>";
			print "</tr>";

		while ($row_renew = mysqli_fetch_array($r_renew, MYSQLI_ASSOC))
		{
			$renew_id = $row_renew[req_id];
			$fname = $row_renew[fname];
			$lname = $row_renew[lname];
			$email = $row_renew[email];
			$super_email = $row_renew[super_email];
			$req_reason = $row_renew[req_reason];
			$dept_device = $row_renew[dept_device];
			$cpu_tag = $row_renew[cpu_tag];
			$cpu_make = $row_renew[cpu_make];
			$cpu_model = $row_renew[cpu_model];
			$admin_fs = $row_renew[admin_fs];
			$research_fs = $row_renew[research_fs];
			$research_db = $row_renew[research_db];
			$db_specify = $row_renew[db_specify];
			$expire_date = $row_renew[expire_date];

			$exp_date = strtotime($expire_date); // change format of expiration date to calculate date difference
			$now = time();
			$datediff = $exp_date - $now;
			$days_to_expire = floor($datediff/86400);

			$ct++;

			print "<tr>";
				print "<td>($ct)</td>";
				print "<td>$fname $lname</td>";
				print "<td>$days_to_expire</td>";
			print "</tr>";

			// send email to those whose access will expire in less than 30 days
			if ($days_to_expire <= 30)
			{

				// send email confirmation to person who submitted the request and their supervisor.
				$phs_to = "cewade@ucdavis.edu";
//				$phs_to = $email;
//				$phs_ccemail = $super_email;
				$phs_subject = "PHS Remote Access Request Submission Update";

				$file_share = "";
				if ($admin_fs == 1) $file_share .= "Admin-FS; ";
				if ($research_fs == 1) $file_share .= "Research-FS; ";
				if ($research_db == 1) $file_share .= "$db_specify";

				$phs_contents = "Hello $fname, \n\nYour PHS Remote VPN Access is set to expire in $days_to_expire days.  If you would like to continue to have remote VPN access to the department file shares click here http://intranet.phs.ucdavis.edu/admin/services/remote_renew.php?renew_id=$renew_id to request to have your access extended for another year. Details of your expiring access are listed below.\n\n";

				$phs_contents .= "User:  $fname $lname \n";
				$phs_contents .= "Computer used for remote access:  $cpu_make $cpu_model $cpu_tag \n";
				$phs_contents .= "Available file share(s): $file_share \n\n";

				$phs_contents .= "Request Reason: $req_reason \n\n";

				$phs_contents .= "If you have any questions regarding your remote VPN access send a message to PHS IT at ithelp@phmail.ucdavis.edu \n\n";

				$phs_contents .= "\n\nPHS IT Services";
				$phs_from = "noreply-phsit@ucdavis.edu";
				$phs_header = "From: \"PHS IT Services\" <".$phs_from.">\r\n";
				$phs_header.= "CC:".$phs_ccemail."\r\n";

//				 print "$phs_contents";

//				mail($phs_to, $phs_subject, $phs_contents, $phs_header);

			} // end if days_to_expire

		} // end while

	print "<tr><td>&nbsp;</td></tr>";
	print "</table>";






} // END if dbok

?>



	<!-- InstanceEndEditable -->


        </div> <!-- phsContent -->
        </div> <!-- LayoutDiv1   End of main-content -->

	    <div id="LayoutFooter">
  		  <? include "../../includes/footer.php"; ?>
		</div> <!-- end LayoutFooter -->


    </div> <!-- gridContainer clearfix -->
<? // include "../../includes/phs_scripts.php"; ?>

</body>
<!-- InstanceEnd --></html>
