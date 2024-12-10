<? include "../includes/internal_authentication.php"; ?>

<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

	<?php

	print "<h1>TEA Contact List Subscribers</h1>";

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

			print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\" width=\"100%\">";

				print "<tr>";
					print "<td>&nbsp;</td>";
					print "<td colspan= \"1\" class= \"recruit\"><strong>First Name</strong></td>";
					print "<td colspan= \"1\" class= \"recruit\"><strong>Last Name</strong></td>";
					print "<td colspan= \"1\" class= \"recruit\"><strong>Email</strong></td>";
					print "<td colspan= \"1\" class= \"recruit\"><strong>Agency</strong></td>";
					print "<td colspan= \"1\" class= \"recruit\"><strong>Phone</strong></td>";
					print "<td colspan= \"5\" class= \"recruit\"><strong>Position</strong></td>";
					print "<td colspan= \"1\" class= \"recruit\"><strong>Subscribe Date</strong></td>";
				print "</tr>";



			$q_alum = "SELECT * from tea_recruit WHERE tea_subscribe = \"1\" ORDER BY lname, fname ";
			$r_alum = mysqli_query($link, $q_alum);

			$list_ct = 1;

			while ($row_alum = mysqli_fetch_array($r_alum, MYSQLI_ASSOC))
			{
				$fname = $row_alum['fname'];
				$lname = $row_alum['lname'];
				$phone = $row_alum['phone'];
				$phone_ext = $row_alum['phone_ext'];
				$email = $row_alum['email'];
				$agency = $row_alum['agency'];
				$post_int_eval = $row_alum['post_int_eval'];
				$post_ext_eval = $row_alum['post_ext_eval'];
				$post_prog_mgr = $row_alum['post_prog_mgr'];
				$post_coalition = $row_alum['post_coalition'];
				$post_other = $row_alum['post_other'];
				$post_other_spec = $row_alum['post_other_spec'];
				$sub_date = $row_alum['sub_date'];

				$disp_date = strtotime($sub_date);
				$show_date = date("m-d-Y", $disp_date);


				$position_display = "";


				if ($post_int_eval == 1) $position_display .= "IE;&nbsp;";
				if ($post_ext_eval == 1) $position_display .= "EE;&nbsp;";
				if ($post_prog_mgr == 1) $position_display .= "IEPM;&nbsp;";
				if ($post_coalition == 1) $position_display .= "Coalition Member;&nbsp;";
				if ($post_other == 1) $position_display .= "$post_other_spec";

				print "<tr><td>&nbsp;</td></tr>";


				print "<tr>";
					print "<td>($list_ct)&nbsp;</td>";
					print "<td class= \"recruit\">$fname</td>";
					print "<td class= \"recruit\">$lname</td>";
					print "<td class= \"recruit\"><a href=\"mailto:$email\">$email</a></td>";
					print "<td class= \"recruit\">$agency</td>";
					print "<td class= \"recruit\">$phone";
					if ($phone_ext) print " ($phone_ext)";
					print "</td>";

					if ($post_int_eval == 1)
					{
						print "<td>IE;&nbsp;</td>";
					}
					else
					{
						print "<td> </td>";
					}

					if ($post_ext_eval == 1)
					{
						print "<td>EE;&nbsp;</td>";
					}
					else
					{
						print "<td> </td>";
					}

					if ($post_prog_mgr == 1)
					{
						print "<td>IEPM;&nbsp;</td>";
					}
					else
					{
						print "<td> </td>";
					}

					if ($post_coalition == 1)
					{
						print "<td>Coalition Member;&nbsp;</td>";
					}
					else
					{
						print "<td> </td>";
					}

					if ($post_other == 1)
					{
						print "<td>$post_other_spec</td>";
					}
					else
					{
						print "<td> </td>";
					}

					//print "<td>$position_display</td>";
					print "<td>$show_date</td>";
				print "</tr>";

				$list_ct++;

			} // end while

			print "</table>";

//			$q_rpt = stripslashes($q_alum);
//			$q_report = str_replace('"', '', $q_rpt);
			//$q_report = "SELECT fname, lname, agency, email, phone,   from tea_recruit WHERE tea_subscribe = \"1\" ORDER BY lname, fname ";

//			print "<table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"100%\">";

				// Button to download spreadsheet of query
//				print "<tr>";
//					print "<td align= \"center\">";
//						print "<FORM name= \"export_listserv\" method= \"post\" action= \"rpt_export.php\">";
//						print "<INPUT TYPE= \"submit\" VALUE= \"Export to List Excel\" name= \"$sub_export\">";
//						print "<input type= \"hidden\" name= \"q_report\" value= \"$q_report\">";
//						print "</FORM>";
//					print "</td>";
//				print "</tr>";
//			print "</table>";

		} // end if $dbok
	} // end if $fp = fopen
?>
