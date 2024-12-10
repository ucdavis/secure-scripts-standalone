<?php
session_start();
// no direct access
?>

<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

<!-- Start Main Content Column -->
	<?php
	// include function library
//	include "/includes/common.lib.php";


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

		if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "cns")))
		{


			// Get info from remote_request table
//			$exp_date = date("c");
//			$q_renew = "UPDATE tea_recruit SET tea_subscribe = \"0\", unsub_date = \"$exp_date\", last_update = \"$exp_date\" WHERE update_submitted <> \"1\" ";

			$q_renew = "SELECT * from tea_recruit where  tea_subscribe = \"1\" ORDER BY email"; //ORDER BY email,
			//$q_renew = "SELECT * from tea_recruit where  email LIKE \"sue@strategiesbydesignco.com\" ORDER BY email LIMIT 1";
			$r_renew = mysqli_query($link, $q_renew);

			print "<h2>TEA Listserv - Update Profile</h2>";

			print "$q_renew";

			$ct = 0;

			print "<table border=\"0\" cellpadding=\"2\" cellspacing=\"2\" width=\"50%\">";
				print "<tr>";
					print "<td>&nbsp;</td>";
					print "<td><strong>Name</strong></td>";
					print "<td><strong>Email</strong></td>";
				print "</tr>";

			while ($row_renew = mysqli_fetch_array($r_renew, MYSQLI_ASSOC))
			{
				$renew_id = $row_renew['tea_id'];
				$fname = $row_renew['fname'];
				$lname = $row_renew['lname'];
				$phone = $row_renew['phone'];
				$phone_ext = $row_renew['phone_ext'];
				$email = $row_renew['email'];
				$agency = $row_renew['agency'];
				$post_int_eval = $row_renew['post_int_eval'];
				$post_ext_eval = $row_renew['post_ext_eval'];
				$post_prog_mgr = $row_renew['post_prog_mgr'];
				$post_coalition = $row_renew['post_coalition'];
				$post_other = $row_renew['post_other'];
				$post_other_spec = $row_renew['post_other_spec'];
				$sub_date = $row_renew['sub_date'];

				$disp_date = strtotime($sub_date);
				$show_date = date("m-d-Y", $disp_date);

			//		$now = time();
			//	$datediff = $exp_date - $now;
			//	$days_to_expire = floor($datediff/86400);

				$ct++;

				print "<tr>";
					print "<td>($ct)</td>";
					print "<td>$fname $lname</td>";
					print "<td>$email</td>";
			//		print "<td>$days_to_expire</td>";
				print "</tr>";

				// send email to those whose access will expire in less than 30 days
		//		if ($days_to_expire <= 30)
		//		{

					// send email confirmation to person who submitted the request and their supervisor.
	//				$phs_to = "sue@strategiesbydesignco.com";
					$phs_to = $email;
	//				$phs_ccemail = $super_email;
					$phs_subject = "TEA Listserv - Please Update Profile";


					$phs_contents = "Greetings $fname! \n\nThe Tobacco Evaluator Alliance is requesting that you update your profile on the TEA Contact List, a web-based listserv of California Tobacco Prevention Program (CTPP)-funded evaluators and others interested in being part of a Community of Practice for evaluators. TEA hosts a quarterly meeting, special topic forums, and other events. The listserv is used to send direct email notifications regarding dates, times and agendas for TEA-related events.
					\nPlease use the link http://secure.phs.ucdavis.edu/tcec/listserv/tea_subscribe_renew.php?renew_id=$renew_id to update your profile by June 30, 2024. Any profiles not updated by the deadline will be removed from the TEA Listserv.
					\nIf you have any questions, please contact GrEEN TEA member Sue Haun at 707-537-6914 or sue@strategiesbydesignco.com.
					\n\nThank you.\n\n";

//					$phs_contents .= "User:  $fname $lname \n";

//					$phs_contents .= "\n\nPHS IT Services";
					$phs_from = "tobaccoevaluatoralliance@phmail.ucdavis.edu";
					$phs_header = "From: \"TEA Listserv\" <".$phs_from.">\r\n";
//					$phs_header.= "CC:".$phs_ccemail."\r\n";

	//				 print "$phs_contents";

	//			mail($phs_to, $phs_subject, $phs_contents, $phs_header);

		//		} // end if days_to_expire

			} // end while

		print "<tr><td>&nbsp;</td></tr>";
		print "</table>";



		} // end if $dbok
	} // end if $fp = fopen

	?>
