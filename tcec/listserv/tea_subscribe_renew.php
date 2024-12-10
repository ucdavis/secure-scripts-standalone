<?php
session_start();
// no direct access
?>

<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

<!-- Start Main Content Column -->
	<?php
	// include function library
//	include "/includes/common.lib.php";

//	$recruit_upd = "";
	$tea_id = "";

	if(isset($_GET['renew_id'])) $tea_id = $_GET['renew_id'];

	if(isset($_POST['recruit_upd'])) $recruit_upd = $_POST['recruit_upd'];
	if(isset($_POST['tea_id'])) $minor_id = $_POST['tea_id'];

	$fname = "";
	$lname = "";
	$phone = "";
	$phone_ext = "";
	$email = "";
	$agency = "";
	$post_int_eval = "";
	$post_ext_eval = "";
	$post_prog_mgr = "";
	$post_proj_dir = "";
	$post_coalition = "";
	$post_other = "";
	$post_other_spec = "";
	$tea_subscribe = "";

	$sub_recruit = "";

	$update_submitted = "";
	//$recruit_upd = "";
	//$mr_id = "";

	if(isset($_POST['fname'])) $fname = $_POST['fname'];
	if(isset($_POST['lname'])) $lname = $_POST['lname'];
	if(isset($_POST['phone'])) $phone = $_POST['phone'];
	if(isset($_POST['phone_ext'])) $phone = $_POST['phone_ext'];
	if(isset($_POST['email'])) $email = $_POST['email'];
	if(isset($_POST['agency'])) $agency = $_POST['agency'];
	if(isset($_POST['post_int_eval'])) $post_int_eval = $_POST['post_int_eval'];
	if(isset($_POST['post_ext_eval'])) $post_ext_eval = $_POST['post_ext_eval'];
	if(isset($_POST['post_prog_mgr'])) $post_prog_mgr = $_POST['post_prog_mgr'];
	if(isset($_POST['post_proj_dir'])) $post_proj_dir = $_POST['post_proj_dir'];
	if(isset($_POST['post_coalition'])) $post_coalition = $_POST['post_coalition'];
	if(isset($_POST['post_other'])) $post_other = $_POST['post_other'];
	if(isset($_POST['post_other_spec'])) $post_other_spec = $_POST['post_other_spec'];
	if(isset($_POST['tea_subscribe'])) $tea_subscribe = $_POST['tea_subscribe'];

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

			if ($sub_recruit == "Unsubscribe")
			{
					$unsub_date = date("c");
					$last_update = date("c");

					$q_insert = "UPDATE tea_recruit SET tea_subscribe = \"0\", unsub_date = \"$unsub_date\", last_update = \"$last_update\" WHERE email = \"$email\" ";
					$r_insert = mysqli_query($link, $q_insert);

					if (mysqli_affected_rows($link) >= 1)
					{
						print "$email has been unsubscribed from the TEA mailing list.";
					}
					else
					{
						print "Your unsubscribe request has been received.";
					}

			} // end unsubscribe




			if ($sub_recruit == "Do Not Submit Information")
			{
				print "The TEA Contact List information has not been submitted.<p>
				<a href= \"http://tobaccoeval.ucdavis.edu/tea\">Go to the TEA web page</a>";

			} // end Do Not Submit Information

			if (($sub_recruit == "Submit Information") || ($sub_recruit == "Update Subscription"))
			{

				$valid_form = true;

				if (!$fname)
				{
					print "<b><font color= \"red\">Please enter your first name.</font></b><br>";
					$valid_form = false;
				}

				if (!$lname)
				{
					print "<b><font color= \"red\">Please enter your last name.</font></b><br>";
					$valid_form = false;
				}

				if (!$phone)
				{
					print "<b><font color= \"red\">Please enter your phone number.</font></b><br>";
					$valid_form = false;
				}

				if (!$email)
				{
					print "<b><font color= \"red\">Please enter your e-mail address.</font></b><br>";
					$valid_form = false;
				}

				if ($email)			// verify e-mail address syntax is correct
				{
					if (!(preg_match("/@.+\\./", $email)))
					{
						print "<b><font color= \"red\">The syntax of your e-mail address is incorrect.  Please re-enter.</b><br></font>";
						$valid_form = false;
					}

//					$q_check = "SELECT * FROM tea_recruit WHERE email LIKE \"$email\" and tea_subscribe LIKE \"1\" ";
//					$r_check = mysqli_query($link, $q_check);

//					if (mysqli_num_rows($r_check) >= 1)
//					{
//						print "<b><font color= \"red\">This email address is already subscribed to this mailing list</b><br></font>";
//						$valid_form = false;
//					}

				}

				if (!$agency)
				{
					print "<b><font color= \"red\">Please enter your Agency.</font></b><br>";
					$valid_form = false;
				}


// if all of the required fields are entered clean the text fields and submit to the database

				if ($valid_form == true)
				{
					$fname = filter_var($fname, FILTER_SANITIZE_STRING);
					$lname = filter_var($lname, FILTER_SANITIZE_STRING);
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);

					$sub_date = date("c"); //Get the timestamp of when the survey is originally submitted
					$last_update = date("c"); //Get the timestamp of when the survey is last updated

					if ($sub_recruit == "Submit Information")
					{
						if ($tea_subscribe <> "1") $tea_subscribe = "0";

					$q_insert = "INSERT INTO tea_recruit
					(fname, lname, phone, phone_ext, email, post_int_eval, post_ext_eval, post_prog_mgr, post_proj_dir, post_other, post_other_spec, tea_subscribe, sub_date, agency, post_coalition)
					VALUES
					(\"$fname\", \"$lname\", \"$phone\", \"$phone_ext\", \"$email\", \"$post_int_eval\", \"$post_ext_eval\", \"$post_prog_mgr\", \"$post_proj_dir\", \"$post_other\", \"$post_other_spec\", \"$tea_subscribe\",
					 \"$sub_date\", \"$agency\", \"$post_coalition\")";
					} // end if sub_recruit == submit information

					if ($sub_recruit == "Update Subscription")
					{
						if ($tea_subscribe <> "1") $unsub_date = $sub_date; //if unsubscribing set the unsubscribe date

					$update_submitted = "1";

					$q_insert = "UPDATE tea_recruit SET
					fname = \"$fname\", lname = \"$lname\", phone = \"$phone\", phone_ext = \"$phone_ext\", email = \"$email\", post_int_eval = \"$post_int_eval\", post_ext_eval = \"$post_ext_eval\",
					post_prog_mgr = \"$post_prog_mgr\", post_proj_dir = \"$post_proj_dir\", post_other = \"$post_other\", post_other_spec = \"$post_other_spec\", tea_subscribe = \"$tea_subscribe\",
					unsub_date = \"$unsub_date\", agency = \"$agency\", post_coalition = \"$post_coalition\", last_update = \"$last_update\", update_submitted = \"$update_submitted\"
					WHERE tea_id = \"$tea_id\" ";
					} // end /if sub_recruit == update information

					$r_insert = mysqli_query($link, $q_insert);

					if (mysqli_affected_rows($link) >= 1)
					{

						print "<blockquote>";
						print "Your subscription has been updated.  Thank you for your interest in the Tobacco Evaluator Alliance (TEA).<p>
						<a href= \"http://tobaccoeval.ucdavis.edu/tea\">Go to the TEA web page</a>";
						print "</blockquote>";
					}
					else
					{
						print "An error has occurred during submission.<p>"; //$q_insert
					}
				} // end if valid_form = true


			} // end Submit Information

			if ((!$sub_recruit) || (($sub_recruit == "Submit Information") && ($valid_form == false)))
			{

//				print "<b><font size= \"2px\">To register your interest in the UCD MPH program, please complete and submit this form:</font></b>";
				print "<h2>Please review and submit this form to stay subscribed to or unsubscribe from the Tobacco Evaluator Alliance (TEA) Contact List.
				<br>If you would like to stay remain on the contact list, TEA will use this information to contact you about upcoming meetings and events related to our Community of Practice for Evaluators.</h2>";



				if ($tea_id)
				{

					$q_alum = "SELECT * from tea_recruit WHERE tea_id = $tea_id";
					$r_alum = mysqli_query($link, $q_alum);
					$row_alum = mysqli_fetch_array($r_alum, MYSQLI_ASSOC);

					$fname = $row_alum['fname'];
					$lname = $row_alum['lname'];
					$phone = $row_alum['phone'];
					$phone_ext = $row_alum['phone_ext'];
					$email = $row_alum['email'];
					$agency = $row_alum['agency'];
					$post_int_eval = $row_alum['post_int_eval'];
					$post_ext_eval = $row_alum['post_ext_eval'];
					$post_prog_mgr = $row_alum['post_prog_mgr'];
					$post_proj_dir = $row_alum['post_proj_dir'];
					$post_coalition = $row_alum['post_coalition'];
					$post_other = $row_alum['post_other'];
					$post_other_spec = $row_alum['post_other_spec'];
					$tea_subscribe = $row_alum['tea_subscribe'];
				} // end if tea_id


				print "<form name= \"info_req\" method= \"post\" action= \"tea_subscribe_renew.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Contact Information</strong></td>";
					print "</tr>";

					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td class= \"recruit\">First Name</td>";
						print "<td class= \"recruit\">Last Name</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"fname\" value= \"$fname\"></td>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"lname\" value= \"$lname\"></td>";
					print "</tr>";


					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td class= \"recruit\">Phone (include area code)</td>";
						print "<td class= \"recruit\">Phone Ext.</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"phone\" value= \"$phone\"></td>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"phone_ext\" value= \"$phone_ext\"></td>";
					print "</tr>";

					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td class= \"recruit\" colspan=\"2\">E-mail Address</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\" colspan=\"2\"><input type= \"text\" name= \"email\" value= \"$email\" size=\"65\"></td>";
					print "</tr>";


					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
					print "<tr>";
						print "<td class= \"recruit\" colspan=\"2\">Agency</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\" colspan=\"2\"><input type= \"text\" name= \"agency\" value= \"$agency\" size=\"65\"></td>";
					print "</tr>";


					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
					print "<tr><td>&nbsp;</td></tr>";


					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Position:</strong></td>";
					print "</tr>";

					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"post_int_eval\" value= \"1\" ";
						if ($post_int_eval == 1) print "checked";
						print ">&nbsp;&nbsp;Internal Evaluator (IE)</td>";

						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"post_ext_eval\" value= \"1\" ";
						if ($post_ext_eval == 1) print "checked";
						print ">&nbsp;&nbsp;External Evaluator (EE)</td>";
					print "</tr>";

					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"2\"  class= \"recruit\"><input type= \"checkbox\" name= \"post_proj_dir\" value= \"1\" ";
						if ($post_proj_dir == 1) print "checked";
						print ">&nbsp;&nbsp;Project Director/Coordinator</td>";

//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"post_coalition\" value= \"1\" ";
//						if ($post_coalition == 1) print "checked";
//						print ">&nbsp;&nbsp;Coalition Member</td>";

					print "</tr>";

					print "<tr><td>&nbsp;</td></tr>";

//					print "<tr>";
//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"post_prog_mgr\" value= \"1\" ";
//						if ($post_prog_mgr == 1) print "checked";
//						print ">&nbsp;&nbsp;Internal Evaluation Program Manager (IEPM)</td>";

//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"post_coalition\" value= \"1\" ";
//						if ($post_coalition == 1) print "checked";
//						print ">&nbsp;&nbsp;Coalition Member</td>";

//					print "</tr>";

//					print "<tr><td>&nbsp;</td></tr>";


					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"post_other\" value= \"1\" ";
						if ($post_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other (specify -->)&nbsp;&nbsp;&nbsp;";

						print "<input type= \"text\" name= \"post_other_spec\" value= \"$post_other_spec\" size= \"40\"></td>";
					print "</tr>";


					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
					print "<tr><td>&nbsp;</td></tr>";
//					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"tea_subscribe\" value= \"1\" ";
//						if ($minor_subscribe == 1) print "checked";
						print "checked";
						print ">&nbsp;&nbsp;<strong>I want to stay subscribed to the TEA Contact list.
						</strong></td>";
					print "</tr>";


					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
					if ($tea_id)
					{
						print "<td align= \"left\"><input type= \"submit\" name= \"sub_recruit\" value= \"Update Subscription\">";
						print "<input type= \"hidden\" name= \"tea_id\" value= \"$tea_id\"></td>";
					}
					else
					{
						print "<td align= \"left\"><input type= \"submit\" name= \"sub_recruit\" value= \"Submit Information\"></td>";
					}
//						print "<td align= \"center\"><input type= \"submit\" name= \"sub_recruit\" value= \"Do Not Submit Information\"></td>";
					print "</tr>";

//				print "</table>";
				print "</form>";

				// THIS IS THE SECTION TO UNSUBSCRIBE FROM THE LIST
								print "<form name= \"unsubscribe\" method= \"post\" action= \"tea_subscribe_renew.php\">";
				//				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";

									print "<tr>";
										print "<td colspan= \"2\"><hr></td>";
									print "</tr>";

									print "<tr>";
										print "<td>&nbsp;</td>";
									print "</tr>";

									print "<tr>";
										print "<td colspan= \"2\" class= \"recruit\"><b>If you would like to unsubscribe from the list enter your email below and click Unsubscribe</b></td>";
									print "</tr>";

									print "<tr>";
										print "<td class= \"recruit\"><input type= \"text\" name= \"email\" value= \"$email\" size=\"50\"></td>";
									print "</tr>";

									print "<tr>";
										print "<td align= \"left\"><input type= \"submit\" name= \"sub_recruit\" value= \"Unsubscribe\"></td>";
									print "</tr>";

								print "</form>";
								print "</table>";
				// END UNSUBSCRIBE




			} // end Do Not Submit Information



		} // end if $dbok
	} // end if $fp = fopen

	?>
