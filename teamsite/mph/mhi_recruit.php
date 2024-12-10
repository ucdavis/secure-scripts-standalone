<?php
// no direct access
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- UTF-8 Character set -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- IE 8 Compatibility -->
<meta http-equiv="X-UA-Compatible" content="IE=8" />

<link type="text/css" rel="stylesheet" href="../css/faculty.css">
 
</head>
 
<body>

 
<!-- Start Main Content Column -->


	<p><font color="#002666" style="font-size:13px; font-weight:bold">Please complete and submit this form to register your interest</font></p>


	<?php
	// include function library
//	include "/includes/common.lib.php";
	
//	$recruit_upd = "";
	$mhi_id = "";
	
	if(isset($_POST['recruit_upd'])) $recruit_upd = $_POST['recruit_upd'];
	if(isset($_POST['mhi_id'])) $mhi_id = $_POST['mhi_id'];
	
	$fname = "";
	$lname = "";
	$email = "";
	$hear_university = "";
	$hear_fb = "";
	$hear_linkd = "";
	$hear_twitter = "";
	$hear_refer = "";
	$hear_alumni = "";
	$hear_website = "";
	$hear_other = "";
	$hear_other_spec = "";
	$enroll_yr = "";
	$enroll_qtr = "";
	$mhi_subscribe = "";

	$sub_recruit = "";
	$recruit_upd = "";
	$mr_id = "";
	
	if(isset($_POST['fname'])) $fname = $_POST['fname'];
	if(isset($_POST['lname'])) $lname = $_POST['lname'];
	if(isset($_POST['email'])) $email = $_POST['email'];
	if(isset($_POST['hear_university'])) $hear_university = $_POST['hear_university'];
	if(isset($_POST['hear_fb'])) $hear_fb = $_POST['hear_fb'];
	if(isset($_POST['hear_linkd'])) $hear_linkd = $_POST['hear_linkd'];
	if(isset($_POST['hear_twitter'])) $hear_twitter = $_POST['hear_twitter'];
	if(isset($_POST['hear_refer'])) $hear_refer = $_POST['hear_refer'];
	if(isset($_POST['hear_alumni'])) $hear_alumni = $_POST['hear_alumni'];
	if(isset($_POST['hear_website'])) $hear_website = $_POST['hear_website'];
	if(isset($_POST['hear_other'])) $hear_other = $_POST['hear_other'];
	if(isset($_POST['hear_other_spec'])) $hear_other_spec = $_POST['hear_other_spec'];
	if(isset($_POST['enroll_yr'])) $enroll_yr = $_POST['enroll_yr'];
	if(isset($_POST['enroll_qtr'])) $enroll_qtr = $_POST['enroll_qtr'];
	if(isset($_POST['mhi_subscribe'])) $mhi_subscribe = $_POST['mhi_subscribe'];
	
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
	 
		if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "sph"))) 
		{

			if ($sub_recruit == "Do Not Submit Information")
			{
				print "The MHI Listserv information has not been submitted.<p>
				<a href= \"http://ucdmc.ucdavis.edu/informatics\">Return to the Health Informatics home page.</a>";
			
			} // end Do Not Submit Information

			if (($sub_recruit == "Submit Information") || ($sub_recruit == "Update Information"))
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
				}	
		
		
// if all of the required fields are entered clean the text fields and submit to the database
				
				if ($valid_form == true)
				{						
					$fname = filter_var($fname, FILTER_SANITIZE_STRING);
					$lname = filter_var($lname, FILTER_SANITIZE_STRING);
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);

					$sub_date = date("c"); //Get the timestamp of when the survey is entered
					
					if ($sub_recruit == "Submit Information")
					{
						if ($mhi_subscribe <> "1") $mhi_subscribe = "0";

					$q_insert = "INSERT INTO mhi_recruit 
					(fname, lname, email, hear_university, hear_fb, hear_linkd, hear_twitter, hear_refer, hear_alumni, hear_website, hear_other, hear_other_spec, enroll_yr, enroll_qtr, 
					mhi_subscribe, sub_date)
					VALUES
					(\"$fname\", \"$lname\", \"$email\", \"$hear_university\", \"$hear_fb\", \"$hear_linkd\", \"$hear_twitter\", \"$hear_refer\", \"$hear_alumni\", \"$hear_website\", 
					\"$hear_other\", \"$hear_other_spec\", \"$enroll_yr\", \"$enroll_qtr\", \"$mhi_subscribe\", \"$sub_date\")";
					} // end if sub_recruit == submit information
					
					if ($sub_recruit == "Update Information")
					{
						if ($mhi_subscribe == "2") $unsub_date = $sub_date; //if unsubscribing set the unsubscribe date
					
					$q_insert = "UPDATE mhi_recruit SET
					fname = \"$fname\", lname = \"$lname\", email = \"$email\", hear_university = \"$hear_university\", hear_fb = \"$hear_fb\", hear_linkd = \"$hear_linkd\", 
					hear_twitter = \"$hear_twitter\", hear_refer = \"$hear_refer\", hear_alumni = \"$hear_alumni\", hear_website = \"$hear_website\", 
					hear_other = \"$hear_other\", hear_other_spec = \"$hear_other_spec\", enroll_yr = \"$enroll_yr\", enroll_qtr = \"$enroll_qtr\", mhi_subscribe = \"$mhi_subscribe\", 
					unsub_date = \"$unsub_date\"
					WHERE mhi_id = \"$mhi_id\" ";
					} // end /if sub_recruit == update information
					
					$r_insert = mysqli_query($link, $q_insert);

					if (mysqli_affected_rows($link) >= 1)
					{
						
						print "<blockquote>";
						print "Your information has been updated.  Thank you for your interest in the UC Davis MHI Program.<p>
						<a href= \"http://ucdmc.ucdavis.edu/informatics\">Return to the MHI home page</a>";
						print "</blockquote>";
						
						// e-mail a confirmation message to the applicant
						$to = $email;
//						$cc_email = "PHSInstAffairs@phlistserv.ucdavis.edu";
						$subject = "Thanks for your interest in the Master of Health Informatics at UC Davis!";
//						$contents = "Content-Disposition: inline; filename=\"recruit_email.html\"\n\n";

						$contents = "<html><head>";
						$contents .= "<STYLE TYPE=\"text/css\"><!--";
						$contents .= "body { font-family: arial, helvetica, san-serif; font-size: 12px; }";
						$contents .= "--></STYLE>";
						$contents .= "<title></title></head>";
						$contents .= "<body>";
						$contents .= "<table border= \"0\">";
						
						$contents .= "<tr><td>";
						$contents .= "<img src= \"http://mph.ucdavis.edu/recruitLogo.jpg\">";
						$contents .= "</td></tr>";
						
						$contents .= "<tr><td>";
						$contents .= "<p>&nbsp;</p>Dear prospective student,<p>";
						
						$contents .= "<p>I am pleased you are considering the Master of Public Health (MPH) Program at the University of California, Davis. You will be weighing many factors when
						considering your future career, and a legitimate question to as is, why should I consider UC Davis? What makes the UCD program special? The UCD MPH Program aims to help 
						meet a growing need for public health professionals at local, state, and national levels. Our students graduate with the knowledge and experience that transforms their
						passion for making a difference in public health into their profession. UC Davis is fortunate to have many unique resources – collectively known as \"The UC Davis Advantage\"
						- that contribute to a high-quality MPH program.  The campus has a national and world reputation in many areas of public health, including epidemiology, biostatistics,
						infectious diseases, nutrition, and informatics. Our location near the state capital and the headquarters of the California Department of Public Health has facilitated
						long-standing and fruitful collaboration with state and local county health departments in research and teaching, resulting in a wealth of professional contacts and
						hands-on-experience for the students. </p>";
						
						$contents .= "<p>Our philosophy is that each student's success matters to us. Making the transition to graduate studies can be daunting, and students need a responsive
						environment in which to excel. At some institutions, you are one among the hundreds – <em>and it will feel that way</em>. Here, we are small enough (38 students per 
						entering class) to provide you with the personal attention necessary to meet your desired goal.  And yet, we have all the options, opportunities, and world- class 
						facilities that come with a large research university. At UC Davis, we are fortunate to share a culturally rich and vibrant learning environment, unique to California and
						uncommon to many of our peer institutions. And we understand that, as an academic institution, our diversity is integral to our pursuit of excellence. To learn more about 
						the UC Davis MPH Program please visit our website <a href=\"http://mph.ucdavis.edu/\">http://mph.ucdavis.edu/</a> where you will find more information regarding admission
						requirements, program faculty, and degree requirements.  </p>";
						
						$contents .= "<p>If you want to be part of a very special community, I hope you will apply to the MPH program. We would be happy to answer any questions. 
						Kindly send an email to <a href=\"mailto:PHSInstAffairs@ucdavis.edu\">PHSInstAffairs@ucdavis.edu</a>.  </p>";
						
						$contents .= "Sincerely,<p>";
						
						$contents .= "<p>Stepen A. McCurdy, MD MPH<br>Professor and Director<br>UCD MPH Program<br>
						Division of Environmental and Occupational Health<br>Department of Public Health Sciences, Med Sci 1C<br>
						Univeristy of California, Davis";
						
						$contents .= "</td></tr>";
						$contents .= "</table>";
						
						$contents .= "</body></html>";

						$from = "noreply@ucdavis.edu";
						$header  = 'MIME-Version: 1.0' . "\r\n";
						$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

						$header .= "From: \"UC Davis Master of Public Health\" <".$from.">\r\n";
						$header .= "BCC:".$cc_email."\r\n";
	
//						if ($sub_recruit == "Submit Information") mail($to, $subject, $contents, $header);
						// e-mail welcome letter only if this is the initial entry

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


				if ($recruit_upd)
				{
					
					$q_alum = "SELECT * from mhi_recruit WHERE mhi_id = $recruit_upd";
					$r_alum = mysqli_query($link, $q_alum);
					$row_alum = mysqli_fetch_array($r_alum, MYSQLI_ASSOC);
					
					$fname = $row_alum['fname'];
					$lname = $row_alum['lname'];
					$email = $row_alum['email'];
					$hear_university = $row_alum['hear_university'];
					$hear_fb = $row_alum['hear_fb'];
					$hear_linkd = $row_alum['hear_linkd'];
					$hear_twitter = $row_alum['hear_twitter'];
					$hear_refer = $row_alum['hear_refer'];
					$hear_alumni = $row_alum['hear_alumni'];
					$hear_website = $row_alum['hear_website'];
					$hear_other = $row_alum['hear_other'];
					$hear_other_spec = $row_alum['hear_other_spec'];
					$enroll_yr = $row_alum['enroll_yr'];
					$enroll_qtr = $row_alum['enroll_qtr'];
					$mhi_subscribe = $row_alum['mhi_subscribe'];
				} // end if recruit_upd

				
				print "<form name= \"info_req\" method= \"post\" action= \"mhi_recruit.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";
				
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>Personal Information</b></td>";
					print "</tr>";
					
					print "<tr>";
						print "<td class= \"recruit\">First Name</td>";
						print "<td class= \"recruit\">Last Name</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"fname\" value= \"$fname\"></td>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"lname\" value= \"$lname\"></td>";
					print "</tr>";
					
					
					print "<tr>";
						print "<td class= \"recruit\">E-mail</td>";
						print "<td class= \"recruit\">&nbsp;</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"email\" value= \"$email\"></td>";
						print "<td class= \"recruit\">&nbsp;</td>";
					print "</tr>";
					

					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";


					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>How did you hear about us?:</b></td>";
					print "</td>";
					
					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_university\" value= \"1\" ";
						if ($hear_university == 1) print "checked";
						print ">&nbsp;&nbsp;University Event</td>";

						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_fb\" value= \"1\" ";
						if ($hear_fb == 1) print "checked";
						print ">&nbsp;&nbsp;Facebook</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_twitter\" value= \"1\" ";
						if ($hear_twitter == 1) print "checked";
						print ">&nbsp;&nbsp;Twitter</td>";

						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_linkd\" value= \"1\" ";
						if ($hear_linkd == 1) print "checked";
						print ">&nbsp;&nbsp;LinkedIn</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_refer\" value= \"1\" ";
						if ($hear_refer == 1) print "checked";
						print ">&nbsp;&nbsp;Referred by a Graduate</td>";

						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_alumni\" value= \"1\" ";
						if ($hear_alumni == 1) print "checked";
						print ">&nbsp;&nbsp;Alumni Event</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_website\" value= \"1\" ";
						if ($hear_website == 1) print "checked";
						print ">&nbsp;&nbsp;Department Website</td>";

						print "<td class= \"recruit\">&nbsp;</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"hear_other\" value= \"1\" ";
						if ($hear_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other (specify -->)&nbsp;&nbsp;&nbsp;";

						print "<input type= \"text\" name= \"hear_other_spec\" value= \"$hear_other_spec\" size= \"50\"></td>";
					print "</tr>";
					
//					print "<tr>";
//						print "<td colspan= \"2\" class= \"recruit\"><b>Planned year of enrollment</b></td>";
//					print "<tr>";
					
//					print "<tr>";
//						print "<td class= \"recruit\">Quarter</td>";
//						print "<td class= \"recruit\">Year</td>";
//					print "</tr>";
					
//					print "<tr>";
//						print "<td class= \"recruit\"><select name= \"enroll_qtr\">";
//						print "<option value= \"0\" ";
//						if ($enroll_qtr == "0") print "selected";
//						print "> (Select Quarter)</option>\n";

//						print "<option value= \"Fall\" ";
//						if ($enroll_qtr == "Fall") print "selected";
//						print "> Fall</option>\n";

//						print "<option value= \"Winter\" ";
//						if ($enroll_qtr == "Winter") print "selected";
//						print "> Winter</option>\n";

//						print "<option value= \"Spring\" ";
//						if ($enroll_qtr == "Spring") print "selected";
//						print "> Spring</option>\n";

//						print "<option value= \"Summer\" ";
//						if ($enroll_qtr == "Summer") print "selected";
//						print "> Summer</option>\n";
//						print "</select></td>";

//						print "<td class= \"recruit\"><select name= \"enroll_year\">";
//						print "<option value= \"0\" ";
//						if ($enroll_year == "0") print "selected";
//						print "> (Select Year)</option>\n";

//						print "<option value= \"2018\" ";
//						if ($enroll_year == "2018") print "selected";
//						print "> 2018</option>\n";

//						print "<option value= \"2019\" ";
//						if ($enroll_year == "2019") print "selected";
//						print "> 2019</option>\n";

//						print "<option value= \"2020\" ";
//						if ($enroll_year == "2020") print "selected";
//						print "> 2020</option>\n";

//						print "<option value= \"2021\" ";
//						if ($enroll_year == "2021") print "selected";
//						print "> 2021</option>\n";

//						print "<option value= \"2022\" ";
//						if ($enroll_year == "2022") print "selected";
//						print "> 2022</option>\n";

//						print "</select></td>";

//					print "</tr>";
					
					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
										
					
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"mhi_subscribe\" value= \"1\" ";
//						if ($mph_subscribe == 1) print "checked";
						print "checked";
						print ">&nbsp;&nbsp;<strong>Do you want to subscribe to the MHI Interest list?
						</strong></td>";
					print "</tr>";
					

					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
					
					print "<tr>";
					if ($recruit_upd)
					{
						print "<td align= \"center\"><input type= \"submit\" name= \"sub_recruit\" value= \"Update Information\">";
						print "<input type= \"hidden\" name= \"mr_id\" value= \"$recruit_upd\"></td>";
					}
					else
					{
						print "<td align= \"center\"><input type= \"submit\" name= \"sub_recruit\" value= \"Submit Information\"></td>";
					}
						print "<td align= \"center\"><input type= \"submit\" name= \"sub_recruit\" value= \"Do Not Submit Information\"></td>";
					print "</tr>";
										
				print "</table>";
				print "</form>";
			
			
			} // end Do Not Submit Information



		} // end if $dbok
	} // end if $fp = fopen
	
	?>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- content -->

 
<!-- End Main Content Col -->
 
</body>
</html>
 


