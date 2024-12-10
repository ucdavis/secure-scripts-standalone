<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

			  <div id="content">
				  <div id="content_inner">
				    <h1>Making the Most of Your Evaluation Team</h1>
                    

<!--            <h2>Working with Evaluators Focus Group Sessions</h2> -->
            
<!--            <font color="#FF0000" size="3.0em"><strong>The April 28 training is full, but please register and you will be placed on a wait-list and contacted if a spot becomes available.</strong></font> -->
            
			<?php  
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$work_title = $_POST["work_title"];
			$agency = $_POST["agency"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$train_loc = $_POST["train_loc"];
			$train_date = $_POST["train_date"];

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
				 $work_title = filter_var($work_title, FILTER_SANITIZE_STRING);
				 $agency = filter_var($agency, FILTER_SANITIZE_STRING);
				 $phone = filter_var($phone, FILTER_SANITIZE_STRING);
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
						if (!$work_title)	// verify title is entered
						{
							print "<font color= \"red\">Please enter your title.<br></font>";
							$valid_form = false;
						}
						if (!$agency)	// verify organization is entered
						{
							print "<font color= \"red\">Please enter your agency.<br></font>";
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
						if ($train_loc ==  "none")
						{
							print "<font color= \"red\">Please select a training location.<br></font>";
							$valid_form = false;
						}
			
						if ($valid_form == true)
						{
							$sub_date = date(c);
							$sub_ip = $_SERVER['REMOTE_ADDR'];  //Get the IP address of the computer
				
						switch($train_loc):
							case("Sacramento - June 14, 2019") :
								$train_date = "1";
								break;
							case("San Diego - July 11, 2019") :
								$train_date = "2";
								break;
							case("Los Angeles - July 23, 2019") :
								$train_date = "3";
								break;
							case("Fresno - August 1, 2019") :
								$train_date = "4";
								break;
							case("Berkeley - August 7, 2019") :
								$train_date = "5";
								break;
							case("Monterey - August 27, 2019") :
								$train_date = "6";
								break;
							case("Sacramento - August 13, 2019") :
								$train_date = "7";
								break;
							case("Redding - June 10, 2019") :
								$train_date = "8";
								break;
							case("Riverside - September 16, 2019") :
								$train_date = "9";
								break;
							case("Davis - September 24, 2019") :
								$train_date = "10";
								break;
//							case("Online") :
//								$train_date = "8";
//								break;
//							case("San Diego - October 23, 2017-1") :
//								$train_date = "13";
//								break;
//							case("San Diego - October 23, 2017-2") :
//								$train_date = "14";
//								break;
//							case("Lake Forest - October 25, 2017-1") :
//								$train_date = "9";
//								break;
//							case("Los Angeles - October 24, 2017") :
//								$train_date = "12";
//								break;
//							case("Santa Rosa - October 27, 2017") :
//								$train_date = "10";
//								break;
//							case("Alpine - November 1, 2017") :
//								$train_date = "15";
//								break;
//							case("Monterey - November 2, 2017") :
//								$train_date = "11";
//								break;
							default :
								$train_date = "99";
								break;
						endswitch;
						
// Check the headcount to determine if this registration exceeds the capacity.
						$train_time = "; Time: 9:30am - 3:30pm";
						if ($train_date == 9) $train_time = " - September 16, 2019; Time: 8:00am - 4:00pm";
						if ($train_date == 10) $train_time = " - September 24, 2019; Time: 8:00am - 4:00pm";

						$capacity = 35;
						if ($train_date ==  1) $capacity = 30;  // 2019 sacramento limit
						if ($train_date ==  7) $capacity = 26;  // 2019 sacramento 2 limit
						if ($train_date ==  10) $capacity = 30;  // 2019 davis limit
//						if ($train_date ==  8) $capacity = 10000;  // 2018 online no limit
						$train_year = "2019";
						
						$q_headcount = "SELECT * FROM tcec_training WHERE train_date = $train_date AND train_year LIKE \"$train_year\"  and cancel = \"0\" ";
						$r_headcount = mysqli_query($link, $q_headcount);
						$headcount = mysqli_num_rows($r_headcount);
						
						// If the training date is not a webinar check capacity and determine if reg should be waitlisted
						if ($train_date <> "9")
						{
							if ($headcount >= $capacity) $wait = "yes";
						}

							// enter the information in the database
							$q_insert = "INSERT into tcec_training (fname, lname, work_title, agency, phone, email, train_loc, 
							train_date, sub_date, sub_ip, train_year) 
							VALUES (\"$fname\", \"$lname\", \"$work_title\", \"$agency\", \"$phone\", \"$email\", \"$train_loc\",
							\"$train_date\", \"$sub_date\", \"$sub_ip\", \"$train_year\")";
				
							$r_insert = mysqli_query($link, $q_insert);
							if (mysqli_affected_rows($link) >= 1)
							{
								if ($wait == "yes")
								{
									print "<p>Note: You are currently on the waiting list for this training.</p>";
								}

								print "<p>Hello $fname, <br><br>Thank you for registering for the 2019 Regional Training: Cultural Humility: Opportunities through Evaluation - $train_loc.   
								<br><br>
								If you have any questions regarding the training please contact Diana Dmitrevsky at <a href=\"mailto:ddmitrevsky@ucdavis.edu\">ddmitrevsky@ucdavis.edu</a>.</p> " ;
								
								// e-mail code here
					
					
			//  add notification that registrant is on the wait list					
					
								if (($train_date == "1") || ($train_date == "7"))
								{
									$training_address = "The California Endowment\n1414 K Street, Suite 500\nSacramento, CA 95814\n\n";
								}
					
								if ($train_date == "2")
								{
									$training_address = "County Operations Center\n5530 Overland, Training Room 124\nSan Diego, CA 92123\n\n";
								}
					
								if ($train_date == "3")
								{
									$training_address = "LA County Department of Public Health\n3530 Wilshire Blvd, 8th Floor, Room C\nLos Angeles, CA 90010\n\n";
								}
					
								if ($train_date == "4")
								{
									$training_address = "California Health Collaborative\n1680 W. Shaw Avenue\nFresno, CA 93711\n\n";
								}
					
								if ($train_date == "5")
								{
									$training_address = "City of Berkeley\nMagnolia Conference Room, 3rd Floor\n1947 Center Street\nBerkeley, CA 94704\n\n";
								}
					
								if ($train_date == "6")
								{
									$training_address = "Monterey County Health Department\n1441 Schilling Place\nSalina, CA 93901\n\n";
								}
					
//								if ($train_date == "7")
//								{
//									$training_address = "\n\nOnline\n\n";
//								}

								if ($train_date == "8")
								{
									$training_address = "Redding Library, Community Room\n1100 Parkview Ave\nRedding, CA 96001\n\n";
								}
					
								if ($train_date == "9")
								{
									$training_address = "Riverside County EMS Agency\n4210 Riverwalk Parkway, 1st Floor\nRiverside, CA 92505\n\n";
								}
					
								if ($train_date == "10")
								{
									$training_address = "UC Davis Conference Center, Room A\nUniversity of California Davis\nDavis, CA 95616\n\n";
								}
					
					
								if ($wait == "yes")
								{
									$wait_msg = "\nYou are currently on the waiting list for this training.\n";
								}
					
								$to = $email;
								$ccemail = "ddmitrevsky@ucdavis.edu";
								$subject = "TCEC Regional Training Confirmation";
								
								$loc_msg = "";
//								if ($train_date == "1") $loc_msg = "At this time registration is full but you will be added to a waitlist if anyone cancels.  You will receive an email if a seat becomes available.";
//								if ($train_date == "8") $loc_msg = "This is an online course 10-11:30am on May 10th & 11th.  You must attend BOTH sessions.\n\n* To participate live, call in to 1.866.740.1260 and enter access code 2974659 for audio.\n\n* Go to http://www.readytalk.com and enter the access code 2974659 to access visuals.";

								$contents = "";
								
								if ($wait == "yes") $contents .= "Note: You are currently on the waiting list for this training.\n\n";
								
								
								$contents .= "Hello $fname, \n\nThank you for registering for the 2019 Regional Training: Cultural Humility: Opportunities through Evaluation - $train_loc.  \n\nLocation: $training_address \nIf you have any questions regarding the training please contact Diana Dmitrevsky at ddmitrevsky@ucdavis.edu." ;
								
								

//								$contents = "Hello $fname, \n\nThank you for registering for the 2017 Regional Training: Tell Your Story: Writing Useful Final Evaluation Reports.  $loc_msg ";
								
//								$contents = "Hello $fname, \n\nThank you for registering for the 2017 Regional Training: Tell Your Story: Writing Useful Final Evaluation Reports in $train_loc from 8am-1pm with a working lunch provided by TCEC. The training will be located at $training_address ";
//								$contents .= "$wait_msg";
								
//								$contents .= "\n\nSince this is the day after the PDM training in the same location, you should have already received information about the hotel, directions, parking, and other logistics.  If you have Final Evaluation Report materials drafted or in progress, feel free to bring them so that we can work on it during the training or afterward during office hours with TCEC staff.";
								
//								$contents .= "Please retain this message for your records.\n\n";
					
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
	
//						$train5_status = "open";
//						$q_limit = "SELECT * FROM training WHERE train5 = \"Costa\" ";
//						$r_limit = mysql_query($q_limit);
//						if (mysql_num_rows($r_limit) >= 43) $train5_status = "closed";
						
					
					print "<form name= \"regional_reg\" method= \"post\" action= \"regional_reg.php\">";
						print "<table border= \"0\">";
			// General instructions on completing and submitting the registration form
							print "<tr><td>&nbsp;</td></tr>";
							print "<tr>";
								print "<td colspan= \"4\"><b><u>Please enter your name and contact information:</u></b><br></td>";
							print "</tr>";
							
							print "<tr><td>&nbsp;</td></tr>";
							
			// Name and contact information
							print "<tr>";
				print "<td colspan= \"4\"><table><tr>";			
								print "<td>First Name</td>";
								print "<td>Last Name</td>";
							print "</tr>";

							print "<tr>";
								print "<td><input type= \"text\" name= \"fname\" value= \"$fname\"></td>";
								print "<td><input type= \"text\" name= \"lname\" value= \"$lname\"></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";
							
							print "<tr>";
								print "<td>Title</td>";
								print "<td>TCP-Funded Project</td>";
							print "</tr>";

							print "<tr>";
								print "<td><input type= \"text\" name= \"work_title\" value= \"$work_title\"></td>";
								print "<td><input type= \"text\" name= \"agency\" value= \"$agency\" size= \"40\"></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";
							
							print "<tr>";
								print "<td>Phone</td>";
								print "<td>E-mail</td>";
							print "</tr>";

							print "<tr>";
								print "<td><input type= \"text\" name= \"phone\" value= \"$phone\"></td>";
								print "<td><input type= \"text\" name= \"email\" value= \"$email\"></td>";
				print "</tr></table></td>";
							print "</tr>";
			
							print "<tr><td>&nbsp;</td></tr>";
			
							print "<tr>";
								print "<td colspan= \"4\"><b><u>Select training location:</u></b></td>";
							print "</tr>";

						// TRAINING LOCATION		
							print "<tr>";
								print "<td colspan= \"4\" valign= \"top\"><select name= \"train_loc\">";
								print "<option value= \"none\" ";
								if ($train_loc == "none") print "selected";
								print ">Please select.....</option>\n";
								
								print "<option value= \"Sacramento - June 14, 2019\" ";
								if ($train_loc == "Sacramento - June 14, 2019") print "selected";
								print ">Sacramento - June 14, 2019</option>\n";
								
								print "<option value= \"San Diego - July 11, 2019\" ";
								if ($train_loc == "San Diego - July 11, 2019") print "selected";
								print ">San Diego - July 11, 2019</option>\n";
				
								print "<option value= \"Los Angeles - July 23, 2019\" ";
								if ($train_loc == "Los Angeles - July 23, 2019") print "selected";
								print ">Los Angeles - July 23, 2019</option>\n";
				
								print "<option value= \"Fresno - August 1, 2019\" ";
								if ($train_loc == "Fresno - August 1, 2019") print "selected";
								print ">Fresno - August 1, 2019</option>\n";
				
								print "<option value= \"Berkeley - August 7, 2019\" ";
								if ($train_loc == "Berkeley - August 7, 2019") print "selected";
								print ">Berkeley - August 7, 2019</option>\n";
				
//								print "<option value= \"Online\" ";
//								if ($train_loc == "Online") print "selected";
//								print ">Online - May 15, 2018</option>\n";
				
//								print "<option value= \"Santa Rosa - May 17, 2018\" ";
//								if ($train_loc == "Santa Rosa - May 17, 2018") print "selected";
//								print ">Santa Rosa - May 17, 2018</option>\n";
				
								print "<option value= \"Sacramento - August 13, 2019\" ";
								if ($train_loc == "Sacramento - August 13, 2019") print "selected";
								print ">Sacramento - August 13, 2019</option>\n";
				
								print "<option value= \"Monterey - August 27, 2019\" ";
								if ($train_loc == "Monterey - August 27, 2019") print "selected";
								print ">Monterey - August 27, 2019</option>\n";
				
								print "<option value= \"Riverside - September 16, 2019\" ";
								if ($train_loc == "Riverside - September 16, 2019") print "selected";
								print ">Riverside - September 16, 2019</option>\n";
				
								print "<option value= \"Davis - September 24, 2019\" ";
								if ($train_loc == "Davis - September 24, 2019") print "selected";
								print ">Davis - September 24, 2019</option>\n";
				
//								print "<option value= \"San Diego - October 23, 2017-2\" ";
//								if ($train_loc == "San Diego - October 23, 2017-2") print "selected";
//								print ">San Diego - October 23, 2017, 1-3 pm</option>\n";
				
//								print "<option value= \"Los Angeles - October 24, 2017\" ";
//								if ($train_loc == "Los Angeles - October 24, 2017") print "selected";
//								print ">Los Angeles - October 24, 2017, 10am-12pm</option>\n";
				
//								print "<option value= \"Lake Forest - October 25, 2017-1\" ";
//								if ($train_loc == "Lake Forest - October 25, 2017-1") print "selected";
//								print ">Lake Forest - October 25, 2017, 10am-12pm</option>\n";
				
//								print "<option value= \"Santa Rosa - October 27, 2017\" ";
//								if ($train_loc == "Santa Rosa - October 27, 2017") print "selected";
//								print ">Santa Rosa - October 27, 2017, 10am-12pm</option>\n";
				
//								print "<option value= \"Alpine - November 1, 2017\" ";
//								if ($train_loc == "Alpine - November 1, 2017") print "selected";
//								print ">Alpine County - November 1, 2017, 10am-12pm</option>\n";
				
//								print "<option value= \"Monterey - November 2, 2017\" ";
//								if ($train_loc == "Monterey - November 2, 2017") print "selected";
//								print ">Monterey - November 2, 2017, 10am-12pm</option>\n";
				
								print "</select></td>";

							print "</tr>";

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
						print "</tr>";
			
						print "</table>";
					print "</form>";
				} // end if !$sub_reg
		
				} // end if dbok
			} // end if fopen
		?>






          </div>
	    </div>
