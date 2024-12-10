<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

			  <div id="content">
				  <div id="content_inner">
				    <h1>Online Listening Sessions for New Evaluation Guide</h1>
                    

<!--            <h2>Working with Evaluators Focus Group Sessions</h2> -->
            
<!--            <font color="#FF0000" size="3.0em"><strong>The April 28 training is full, but please register and you will be placed on a wait-list and contacted if a spot becomes available.</strong></font> -->
            
			<?php  
			$option = $_GET["option"];
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$title = $_POST["title"];
			$title_other = $_POST["title_other"];
			$proj_name = $_POST["proj_name"];
			$proj_type = $_POST["proj_type"];
			$proj_type_other = $_POST["proj_type_other"];
			$reg_type = $_POST["reg_type"];
			$reg_name = $_POST["reg_name"];
			$cancel = $_POST["cancel"];
			
			$sub_reg = $_POST["sub_reg"];


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
//			     $fname = preg_replace($targets, $replaces, $fname);
//			     $lname = preg_replace($targets, $replaces, $lname);
//				 $work_title = preg_replace($targets, $replaces, $work_title);
//			     $agency = preg_replace($targets, $replaces, $agency);	 
//			     $phone = preg_replace($targets, $replaces, $phone);
				 
				 $fname = filter_var($fname, FILTER_SANITIZE_STRING);
				 $lname = filter_var($lname, FILTER_SANITIZE_STRING);
				 $phone = filter_var($phone, FILTER_SANITIZE_STRING);
				 $title = filter_var($title, FILTER_SANITIZE_STRING);
				 $title_other = filter_var($title_other, FILTER_SANITIZE_STRING);
				 $proj_name = filter_var($proj_name, FILTER_SANITIZE_STRING);
				 $proj_name_other = filter_var($proj_name_other, FILTER_SANITIZE_STRING);
				 $email = filter_var($email, FILTER_SANITIZE_EMAIL);

	 
				if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "cns"))) 
				{

					if ($sub_reg == "Submit Registration")
					{
						$valid_form = true;


						// CAPTCHA VALIDATION		
		
						include_once $_SERVER['DOCUMENT_ROOT'] . '/tcec/training/securimage/securimage.php';
						$securimage = new Securimage();
						
		
						if ($securimage->check($_POST['captcha_code']) == false) 
						{
						  // the code was incorrect
						  // handle the error accordingly with your other error checking

						  // or you can do something really basic like this
						  print "<font color = \"red\"><strong>The security code you entered was incorrect.  
						  Try again.</strong><p></p></font>";
						  $valid_form = false;
						}
						//  END CAPTCHA VALIDATION
			
	
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
						if (!$phone)	// verify last name is entered
						{
							print "<font color= \"red\">Please enter your phone number.<br></font>";
							$valid_form = false;
						}
						if (!$title)	// verify title is entered
						{
							print "<font color= \"red\">Please enter your title.<br></font>";
							$valid_form = false;
						}
						if (!$proj_name)	// verify organization is entered
						{
							print "<font color= \"red\">Please enter your project name.<br></font>";
							$valid_form = false;
						}
						if (!$proj_type)	// verify last name is entered
						{
							print "<font color= \"red\">Please select your project type.<br></font>";
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
			
						if ($valid_form == true)
						{
							$sub_date = date(c);
							$sub_ip = $_SERVER['REMOTE_ADDR'];  //Get the IP address of the computer
				
						
// Check the headcount to determine if this registration exceeds the capacity.

						$capacity = 10;
						$wait_list= 0;
//						if ($train_date ==  8) $capacity = 10000;  // 2018 online no limit
						$reg_year = "2020";
						
						$q_headcount = "SELECT * FROM tcec_registration WHERE reg_type = $option AND reg_year LIKE \"$reg_year\"  and cancel = \"0\" ";
						$r_headcount = mysqli_query($link, $q_headcount);
						$headcount = mysqli_num_rows($r_headcount);
						
						// If the training date is not a webinar check capacity and determine if reg should be waitlisted
//						if ($train_date <> "9")
//						{
							if ($headcount >= $capacity) $wait_list = 1;
//						}

							// enter the information in the database
							$q_insert = "INSERT into tcec_registration (reg_year, fname, lname, email, title, title_other, proj_name, proj_type, proj_type_other, reg_type, reg_name, 
							wait_list, sub_date, sub_ip, phone) 
							VALUES (\"$reg_year\", \"$fname\", \"$lname\", \"$email\", \"$title\", \"$title_other\", \"$proj_name\", \"$proj_type\", \"$proj_type_other\", \"$option\",
							\"$reg_name\", \"$wait_list\", \"$sub_date\", \"$sub_ip\", \"$phone\")";
				
							$r_insert = mysqli_query($link, $q_insert);
							if (mysqli_affected_rows($link) >= 1)
							{
								if ($wait == 1)
								{
									print "<p>Note: You are currently on the waiting list for this training.</p>";
								}

								print "<p>Hello $fname, <br><br>Thank you for registering for the Online Listening Sessions for New Evaluation Guide - $reg_name.   
								<br><br>
								If you have any questions regarding the training please contact Catherine Dizon at <a href=\"mailto:czdizon@ucdavis.edu\">czdizon@ucdavis.edu</a>.</p> " ;
								
								// e-mail code here
			//  add notification that registrant is on the wait list					
								if ($wait == 1)
								{
									$wait_msg = "\nYou are currently on the waiting list for this training.\n";
								}
					
								$to = $email;
								$ccemail = "ddmitrevsky@ucdavis.edu; czdizon@ucdavis.edu";
								$subject = "Online Listening Sessions for New Evaluation Guide Confirmation";
								
								$contents = "";
								
								if ($wait == 1) $contents .= "Note: You are currently on the waiting list for this training.\n\n";
								
								
								$contents .= "Hello $fname, \n\nThank you for registering for the Online Listening Sessions for New Evaluation Guide - $reg_name.  \n\nIf you have any questions regarding the training please contact Catherine Dizon at czdizon@ucdavis.edu." ;
								
					
//								$contents .= "\n\nIf you have any questions regarding the training please contact Diana Dmitrevsky at ddmitrevsky@ucdavis.edu.";
								$contents .= "\n\nBest regards,";
								$contents .= "\nTobacco Control Evaluation Center";
								$from = "ddmitrevsky@ucdavis.edu";
								$header = "From: \"TCEC Regional Trainings\" <".$from.">\r\n";
								$header.= "CC:".$ccemail."\r\n";

								mail($to, $subject, $contents, $header);

							}
							else
							{
								print "Your registration was not submitted, please try again later";
							}
						} // end if valid_form = true

		

					} // end if sub_reg = Submit Registration

					if ((!$sub_reg) || (($sub_reg == "Submit Registration") && ($valid_form == false)))
					{
	
						if ($option == 1) $reg_name = "Evaluators: Tuesday, April 7, 2020, 12:30pm - 2:00pm";
						if ($option == 2) $reg_name = "Evaluators: Thursday, April 9, 2020, 2:30pm - 4:00pm";
						if ($option == 3) $reg_name = "Statewide Projects:  Thursday, April 9, 2020, 12:30pm - 2:00pm";
						if ($option == 4) $reg_name = "Local Lead Agencies: Tuesday, April 7, 2020, 2:30pm - 4:00pm";
						if ($option == 5) $reg_name = "Local Lead Agencies: Thursday, April 9, 2020, 10:00am - 11:30am";
						if ($option == 6) $reg_name = "Competitive Grantees: Tuesday, April 7, 2020, 10:00am - 11:30am";
						if ($option == 7) $reg_name = "Competitive Grantees: Wednesday, April 8, 2020, 12:30pm - 2:00pm";
						
						print "<h2>$reg_name</h2>";

						// check capacity and display note that capacity is filled if 10 have already registered.
						$capacity = 10;
						$wait_list= 0;
//						if ($train_date ==  8) $capacity = 10000;  // 2018 online no limit
						$reg_year = "2020";
						
						$q_headcount = "SELECT * FROM tcec_registration WHERE reg_type = $option AND reg_year LIKE \"$reg_year\"  and cancel = \"0\" ";
						$r_headcount = mysqli_query($link, $q_headcount);
						$headcount = mysqli_num_rows($r_headcount);
						
						if ($headcount >= $capacity)
						{
						 $wait_list = 1;
						 print "<font color=\"FF0000\">Note: Capacity for this training is full.  If you register you will be placed on the wait list and will be contacted if an opening 
						 becomes available</font>";
						}

					
					
					print "<form name= \"online_training\" method= \"post\" action= \"online_training.php\">";
						print "<table border= \"0\">";
			// General instructions on completing and submitting the registration form
							print "<tr><td>&nbsp;</td></tr>";
							print "<tr>";
								print "<td colspan= \"4\"><b><u>Please enter your name and contact information:</u></b><br></td>";
							print "</tr>";
							
							print "<tr><td>&nbsp;</td></tr>";
							
			// Name and contact information
							print "<tr>";
								print "<td>First Name</td>";
								print "<td>Last Name</td>";
							print "</tr>";

							print "<tr>";
								print "<td><input type= \"text\" name= \"fname\" value= \"$fname\" size= \"40\"></td>";
								print "<td><input type= \"text\" name= \"lname\" value= \"$lname\" size= \"40\"></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";
							
							print "<tr>";
								print "<td>Phone</td>";
								print "<td>E-mail</td>";
							print "</tr>";

							print "<tr>";
								print "<td><input type= \"text\" name= \"phone\" value= \"$phone\" size= \"40\"></td>";
								print "<td><input type= \"text\" name= \"email\" value= \"$email\" size= \"40\"></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";
							
							print "<tr>";
								print "<td>Title</td>";
								print "<td>Other Title</td>";
							print "</tr>";

							print "<tr>";
								
								print "<td valign= \"top\"><select name= \"title\" style=\"width:90%\">";
								print "<option value= \"none\" ";
								if ($title == "none") print "selected";
								print ">Please select.....</option>\n";
								
								print "<option value= \"Evaluator\" ";
								if ($title == "Evaluator") print "selected";
								print ">Evaluator</option>\n";
								
								print "<option value= \"Project Director\" ";
								if ($title == "Project Director") print "selected";
								print ">Project Director</option>\n";
				
								print "<option value= \"Health Educator\" ";
								if ($title == "Health Educator") print "selected";
								print ">Health Educator</option>\n";
				
								print "<option value= \"Other\" ";
								if ($title == "Other") print "selected";
								print ">Other (please specify -->)</option>\n";
								
								print "</select></td>";

								
								print "<td><input type= \"text\" name= \"title_other\" value= \"$title_other\" size= \"40\"></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";
							
							print "<tr>";
								print "<td>Project Name</td>";
								print "<td>Project Type</td>";
							print "</tr>";

							print "<tr>";
								print "<td><input type= \"text\" name= \"proj_name\" value= \"$proj_name\" size= \"40\"></td>";
								
								print "<td valign= \"top\"><select name= \"proj_type\" style=\"width:100%\">";
								print "<option value= \"none\" ";
								if ($proj_type == "none") print "selected";
								print ">Please select.....</option>\n";
								
								print "<option value= \"Statewide Project\" ";
								if ($proj_type == "Statewide Project") print "selected";
								print ">Statewide Project</option>\n";
								
								print "<option value= \"Local Lead Agency\" ";
								if ($proj_type == "Local Lead Agency") print "selected";
								print ">Local Lead Agency</option>\n";
				
								print "<option value= \"Competitive Grantee\" ";
								if ($proj_type == "Competitive Grantee") print "selected";
								print ">Competitive Grantee</option>\n";
				
								print "<option value= \"External Evaluator Contractor/Firm\" ";
								if ($proj_type == "External Evaluator Contractor/Firm") print "selected";
								print ">External Evaluator Contractor/Firm</option>\n";
								
								print "</select></td>";
								
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";
							
							print "<tr><td>&nbsp;</td></tr>";


							// CAPTCHA CODE				
							print "<tr>";
								print "<td><strong>Please enter the security code below</strong>
								<p>
								<img id=\"captcha\" src=\"securimage/securimage_show.php\" alt=\"CAPTCHA Image\" />
								</p>
								Enter code here: &nbsp;<input class= \"smcaptcha\" type=\"text\" name=\"captcha_code\" size=\"10\" maxlength=\"6\" />
								&nbsp;&nbsp;&nbsp;
								<a href=\"#\" onclick=\"document.getElementById('captcha').src = 'securimage/securimage_show.php?' + 			Math.random(); return false\">Reload Image</a>
								</td>";
							print "</tr>";
						// END CAPTCHA CODE

				print "<tr><td>&nbsp;</td></tr>";

			// Submit button
						print "<tr>";
						print "<td colspan = \"2\"><input type= \"submit\" name= \"sub_reg\" value= \"Submit Registration\"></td>";
						print "<td colspan = \"2\"><input type= \"hidden\" name= \"reg_name\" value= \"$reg_name\"></td>";
						print "<td colspan = \"2\"><input type= \"hidden\" name= \"option\" value= \"$option\"></td>";
						print "</tr>";
			
						print "</table>";
					print "</form>";
				} // end if !$sub_reg
		
				} // end if dbok
			} // end if fopen
		?>






          </div>
	    </div>
