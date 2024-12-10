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

	$recruit_upd = "";
	$phd_id = "";

	if(isset($_POST['recruit_upd'])) $recruit_upd = $_POST['recruit_upd'];
	if(isset($_POST['phd_id'])) $phd_id = $_POST['phd_id'];

	$aoe_epm = "";
	$aoe_nut = "";
	$aoe_eoh = "";
	$aoe_hzid = "";
	$aoe_vph = "";
	$aoe_gph = "";
	$aoe_other = "";
	$aoe_other_spec = "";
	$enroll_year = "";
	$enroll_qtr = "";
	$fname = "";
	$lname = "";
	$gender = "";
	$address = "";
	$address2 = "";
	$city = "";
	$state = "";
	$zip = "";
	$email = "";
	$phone = "";
	$ca_res = "";
	$us_cit = "";
	$perm_res = "";
	$int_stud = "";
	$ethnic = "";
	$cur_inst = "";
	$cur_maj = "";
	$cur_class = "";
	$cur_class_other = "";
	$deg_ba = "";
	$deg_ma = "";
	$deg_other = "";
	$deg_other_spec = "";
	$deg_na = "";
	$deg_dvm = "";
	$deg_phd = "";
	$deg_md = "";
	$deg_jd = "";
	$deg_pharmd = "";
	$deg_rn = "";
	$deg_np = "";
	$deg_pa = "";
	$cur_emp = "";
	$cur_post = "";
	$gpa = "";
	$gre_v = "";
	$gre_a = "";
	$gre_q = "";
	$mcat = "";
	$usmle1 = "";
	$usmle2 = "";
	$learn_alum = "";
	$learn_fac = "";
	$learn_fac_spec = "";
	$learn_friend = "";
	$learn_grad_fair = "";
	$learn_grad_spec = "";
	$learn_pubs = "";
	$learn_ucd_broch = "";
	$learn_ucd_post = "";
	$learn_other = "";
	$learn_other_spec = "";
	$learn_grad_com = "";
	$learn_pete_com = "";
	$learn_emp = "";
	$more_ed = "";
	$more_admit = "";
	$more_reqs = "";
	$more_courses = "";
	$more_fac = "";
	$more_other = "";
	$more_other_spec = "";
	$high_degree = "";
	$phd_subscribe = "";
	$sub_recruit = "";
	$recruit_upd = "";
	$phd_id = "";

	if(isset($_POST['aoe_epm'])) $aoe_epm = $_POST['aoe_epm'];
	if(isset($_POST['aoe_nut'])) $aoe_nut = $_POST['aoe_nut'];
	if(isset($_POST['aoe_eoh'])) $aoe_eoh = $_POST['aoe_eoh'];
	if(isset($_POST['aoe_hzid'])) $aoe_hzid = $_POST['aoe_hzid'];
	if(isset($_POST['aoe_vph'])) $aoe_vph = $_POST['aoe_vph'];
	if(isset($_POST['aoe_gph'])) $aoe_gph = $_POST['aoe_gph'];
	if(isset($_POST['aoe_other'])) $aoe_other = $_POST['aoe_other'];
	if(isset($_POST['aoe_other_spec'])) $aoe_other_spec = $_POST['aoe_other_spec'];
	if(isset($_POST['enroll_year'])) $enroll_year = $_POST['enroll_year'];
	if(isset($_POST['enroll_qtr'])) $enroll_qtr = $_POST['enroll_qtr'];
	if(isset($_POST['fname'])) $fname = $_POST['fname'];
	if(isset($_POST['lname'])) $lname = $_POST['lname'];
	if(isset($_POST['gender'])) $gender = $_POST['gender'];
	if(isset($_POST['address'])) $address = $_POST['address'];
	if(isset($_POST['address2'])) $address2 = $_POST['address2'];
	if(isset($_POST['city'])) $city = $_POST['city'];
	if(isset($_POST['state'])) $state = $_POST['state'];
	if(isset($_POST['zip'])) $zip = $_POST['zip'];
	if(isset($_POST['email'])) $email = $_POST['email'];
	if(isset($_POST['phone'])) $phone = $_POST['phone'];
	if(isset($_POST['ca_res'])) $ca_res = $_POST['ca_res'];
	if(isset($_POST['us_cit'])) $us_cit = $_POST['us_cit'];
	if(isset($_POST['perm_res'])) $perm_res = $_POST['perm_res'];
	if(isset($_POST['int_stud'])) $int_stud = $_POST['int_stud'];
	if(isset($_POST['ethnic'])) $ethnic = $_POST['ethnic'];
	if(isset($_POST['cur_inst'])) $cur_inst = $_POST['cur_inst'];
	if(isset($_POST['cur_maj'])) $cur_maj = $_POST['cur_maj'];
	if(isset($_POST['cur_class'])) $cur_class = $_POST['cur_class'];
	if(isset($_POST['cur_class_other'])) $cur_class_other = $_POST['cur_class_other'];
	if(isset($_POST['deg_ba'])) $deg_ba = $_POST['deg_ba'];
	if(isset($_POST['deg_ma'])) $deg_ma = $_POST['deg_ma'];
	if(isset($_POST['deg_other'])) $deg_other = $_POST['deg_other'];
	if(isset($_POST['deg_other_spec'])) $deg_other_spec = $_POST['deg_other_spec'];
	if(isset($_POST['deg_na'])) $deg_na = $_POST['deg_na'];
	if(isset($_POST['deg_dvm'])) $deg_dvm = $_POST['deg_dvm'];
	if(isset($_POST['deg_phd'])) $deg_phd = $_POST['deg_phd'];
	if(isset($_POST['deg_md'])) $deg_md = $_POST['deg_md'];
	if(isset($_POST['deg_jd'])) $deg_jd = $_POST['deg_jd'];
	if(isset($_POST['deg_pharmd'])) $deg_pharmd = $_POST['deg_pharmd'];
	if(isset($_POST['deg_rn'])) $deg_rn = $_POST['deg_rn'];
	if(isset($_POST['deg_np'])) $deg_np = $_POST['deg_np'];
	if(isset($_POST['deg_pa'])) $deg_pa = $_POST['deg_pa'];
	if(isset($_POST['cur_emp'])) $cur_emp = $_POST['cur_emp'];
	if(isset($_POST['cur_post'])) $cur_post = $_POST['cur_post'];
	if(isset($_POST['gpa'])) $gpa = $_POST['gpa'];
	if(isset($_POST['gre_v'])) $gre_v = $_POST['gre_v'];
	if(isset($_POST['gre_a'])) $gre_a = $_POST['gre_a'];
	if(isset($_POST['gre_q'])) $gre_q = $_POST['gre_q'];
	if(isset($_POST['mcat'])) $mcat = $_POST['mcat'];
	if(isset($_POST['usmle1'])) $usmle1 = $_POST['usmle1'];
	if(isset($_POST['usmle2'])) $usmle2 = $_POST['usmle2'];
	if(isset($_POST['learn_alum'])) $learn_alum = $_POST['learn_alum'];
	if(isset($_POST['learn_fac'])) $learn_fac = $_POST['learn_fac'];
	if(isset($_POST['learn_fac_spec'])) $learn_fac_spec = $_POST['learn_fac_spec'];
	if(isset($_POST['learn_friend'])) $learn_friend = $_POST['learn_friend'];
	if(isset($_POST['learn_grad_fair'])) $learn_grad_fair = $_POST['learn_grad_fair'];
	if(isset($_POST['learn_grad_spec'])) $learn_grad_spec = $_POST['learn_grad_spec'];
	if(isset($_POST['learn_pubs'])) $learn_pubs = $_POST['learn_pubs'];
	if(isset($_POST['learn_ucd_broch'])) $learn_ucd_broch = $_POST['learn_ucd_broch'];
	if(isset($_POST['learn_ucd_post'])) $learn_ucd_post = $_POST['learn_ucd_post'];
	if(isset($_POST['learn_other'])) $learn_other = $_POST['learn_other'];
	if(isset($_POST['learn_other_spec'])) $learn_other_spec = $_POST['learn_other_spec'];
	if(isset($_POST['learn_grad_com'])) $learn_grad_com = $_POST['learn_grad_com'];
	if(isset($_POST['learn_pete_com'])) $learn_pete_com = $_POST['learn_pete_com'];
	if(isset($_POST['learn_emp'])) $learn_emp = $_POST['learn_emp'];
	if(isset($_POST['more_ed'])) $more_ed = $_POST['more_ed'];
	if(isset($_POST['more_admit'])) $more_admit = $_POST['more_admit'];
	if(isset($_POST['more_reqs'])) $more_reqs = $_POST['more_reqs'];
	if(isset($_POST['more_courses'])) $more_courses = $_POST['more_courses'];
	if(isset($_POST['more_fac'])) $more_fac = $_POST['more_fac'];
	if(isset($_POST['more_other'])) $more_other = $_POST['more_other'];
	if(isset($_POST['more_other_spec'])) $more_other_spec = $_POST['more_other_spec'];
	if(isset($_POST['high_degree'])) $high_degree = $_POST['high_degree'];
	if(isset($_POST['phd_subscribe'])) $phd_subscribe = $_POST['phd_subscribe'];
	if(isset($_POST['sub_recruit'])) $sub_recruit = $_POST['sub_recruit'];

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

			if ($sub_recruit == "Unsubscribe")
			{
					$unsub_date = date("c"); //Get the timestamp of when the unsubscribe request is submitted
					$q_insert = "UPDATE phd_recruit SET phd_subscribe = \"0\", unsub_date = \"$unsub_date\" WHERE email = \"$email\" ";
					$r_insert = mysqli_query($link, $q_insert);

					if (mysqli_affected_rows($link) >= 1)
					{
						print "$email has been unsubscribed from the Ph.D. Interest mailing list.";
					}
					else
					{
						print "Your unsubscribe request has been received.";
					}

			} // end unsubscribe

			if ($sub_recruit == "Do Not Submit Information")
			{
				print "No information has been sent to the Ph.D. Program database.<p>
				<a href= \"https://health.ucdavis.edu/phs/education/PhD/ph_phd.html\">Return to the Ph.D. Program home page.</a>";

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

				if (!$gender)
				{
					print "<b><font color= \"red\">Please select your gender.</font></b><br>";
					$valid_form = false;
				}

//				if (!$address)
//				{
//					print "<b><font color= \"red\">Please enter your address.</font></b><br>";
//					$valid_form = false;
//				}

//				if (!$city)
//				{
//					print "<b><font color= \"red\">Please enter your city.</font></b><br>";
//					$valid_form = false;
//				}

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

//				if (!$phone)
//				{
//					print "<b><font color= \"red\">Please enter your phone number.</font></b><br>";
//					$valid_form = false;
//				}

				if ((!$us_cit) && (!$ca_res) && (!$perm_res) && (!$int_stud))
				{
					print "<b><font color= \"red\">Please enter your residency status.</font></b><br>";
					$valid_form = false;
				}

				if ($ethnic == "0")
				{
					print "<b><font color= \"red\">Please select your ethnicity.</font></b><br>";
					$valid_form = false;
				}

// if all of the required fields are entered clean the text fields and submit to the database

				if ($valid_form == true)
				{
					$fname = filter_var($fname, FILTER_SANITIZE_STRING);
					$lname = filter_var($lname, FILTER_SANITIZE_STRING);
					$address = filter_var($address, FILTER_SANITIZE_STRING);
					$address2 = filter_var($address2, FILTER_SANITIZE_STRING);
					$city = filter_var($city, FILTER_SANITIZE_STRING);
					$state = filter_var($state, FILTER_SANITIZE_STRING);
					$cur_inst = filter_var($cur_inst, FILTER_SANITIZE_STRING);
					$cur_class_other = filter_var($cur_class_other, FILTER_SANITIZE_STRING);
					$deg_other_spec = filter_var($deg_other_spec, FILTER_SANITIZE_STRING);
					$cur_emp = filter_var($cur_emp, FILTER_SANITIZE_STRING);
					$cur_post = filter_var($cur_post, FILTER_SANITIZE_STRING);
					$learn_fac_spec = filter_var($learn_fac_spec, FILTER_SANITIZE_STRING);
					$learn_grad_spec = filter_var($learn_grad_spec, FILTER_SANITIZE_STRING);
					$learn_other_spec = filter_var($learn_other_spec, FILTER_SANITIZE_STRING);
					$more_other_spec = filter_var($more_other_spec, FILTER_SANITIZE_STRING);

					$sub_date = date("c"); //Get the timestamp of when the survey is entered
					if ($phd_subscribe <> "1") $phd_subscribe = "0";


					if ($sub_recruit == "Submit Information")
					{
					$q_insert = "INSERT INTO phd_recruit
					(aoe_epm, aoe_nut, aoe_eoh, aoe_hzid, aoe_vph, aoe_gph, aoe_other,
					aoe_other_spec, enroll_year, enroll_qtr, fname, lname, gender, address, address2, city, state, zip, email,
					phone, us_cit, ca_res, perm_res, int_stud, ethnic, cur_inst, cur_maj, cur_class, cur_class_other,
					deg_ba, deg_ma, deg_other, deg_other_spec, deg_na, deg_dvm, deg_phd, deg_md, deg_jd, deg_pharmd, deg_rn,
					deg_np, deg_pa, cur_emp, cur_post, gpa, gre_a, gre_v, gre_q, mcat, usmle1, usmle2, learn_alum, learn_fac,
					learn_fac_spec, learn_friend, learn_grad_fair, learn_grad_spec, learn_pubs, learn_ucd_broch, learn_ucd_post,
					learn_other, learn_other_spec, learn_grad_com, learn_pete_com, learn_emp, more_ed, more_admit, more_reqs, more_fac,
					more_courses, more_other, more_other_spec, high_degree, sub_date, phd_subscribe)
					VALUES
					(\"$aoe_epm\", \"$aoe_nut\", \"$aoe_eoh\", \"$aoe_hzid\", \"$aoe_vph\", \"$aoe_gph\", \"$aoe_other\",
					\"$aoe_other_spec\", \"$enroll_year\", \"$enroll_qtr\", \"$fname\", \"$lname\", \"$gender\", \"$address\",
					\"$address2\", \"$city\", \"$state\", \"$zip\", \"$email\", \"$phone\", \"$us_cit\", \"$ca_res\",
					\"$perm_res\", \"$int_stud\", \"$ethnic\", \"$cur_inst\", \"$cur_maj\", \"$cur_class\", \"$cur_class_other\",
					\"$deg_ba\", \"$deg_ma\", \"$deg_other\", \"$deg_other_spec\", \"$deg_na\", \"$deg_dvm\", \"$deg_phd\",
					\"$deg_md\", \"$deg_jd\", \"$deg_pharmd\", \"$deg_rn\", \"$deg_np\", \"$deg_pa\", \"$cur_emp\", \"$cur_post\",
					\"$gpa\", \"$gre_a\", \"$gre_v\", \"$gre_q\", \"$mcat\", \"$usmle1\", \"$usmle2\", \"$learn_alum\", \"$learn_fac\",
					\"$learn_fac_spec\", \"$learn_friend\", \"$learn_grad_fair\", \"$learn_grad_spec\", \"$learn_pubs\",
					\"$learn_ucd_broch\", \"$learn_ucd_post\", \"$learn_other\", \"$learn_other_spec\", \"$learn_grad_com\",
					\"$learn_pete_com\", \"$learn_emp\", \"$more_ed\", \"$more_admit\", \"$more_reqs\", \"$more_fac\",
					\"$more_courses\", \"$more_other\", \"$more_other_spec\", \"$high_degree\", \"$sub_date\", \"$phd_subscribe\")";
					} // end if sub_recruit == submit information

					if ($sub_recruit == "Update Information")
					{
					$q_insert = "UPDATE phd_recruit SET
					aoe_epm = \"$aoe_epm\", aoe_nut = \"$aoe_nut\", aoe_eoh = \"$aoe_eoh\", aoe_hzid = \"$aoe_hzid\",
					aoe_vph = \"$aoe_vph\", aoe_gph = \"$aoe_gph\", aoe_other = \"$aoe_other\", aoe_other_spec = \"$aoe_other_spec\",
					enroll_year = \"$enroll_year\", enroll_qtr = \"$enroll_qtr\", fname = \"$fname\", lname = \"$lname\",
					gender = \"$gender\", address = \"$address\", address2 = \"$address2\", city = \"$city\", state = \"$state\",
					zip = \"$zip\", email = \"$email\", phone = \"$phone\", us_cit = \"$us_cit\", ca_res = \"$ca_res\",
					perm_res = \"$perm_res\", int_stud = \"$int_stud\", ethnic = \"$ethnic\", cur_inst = \"$cur_inst\",
					cur_maj = \"$cur_maj\", cur_class = \"$cur_class\", cur_class_other = \"$cur_class_other\",
					deg_ba = \"$deg_ba\", deg_ma = \"$deg_ma\", deg_other = \"$deg_other\", deg_other_spec = \"$deg_other_spec\",
					deg_na = \"$deg_na\", deg_dvm = \"$deg_dvm\", deg_phd = \"$deg_phd\", deg_md = \"$deg_md\", deg_jd = \"$deg_jd\",
					deg_pharmd = \"$deg_pharmd\", deg_rn = \"$deg_rn\", deg_np = \"$deg_np\", deg_pa = \"$deg_pa\",
					cur_emp = \"$cur_emp\", cur_post = \"$cur_post\", gpa = \"$gpa\", gre_a = \"$gre_a\", gre_v = \"$gre_v\",
					gre_q = \"$gre_q\", mcat = \"$mcat\", usmle1 = \"$usmle1\", usmle2 = \"$usmle2\", learn_alum = \"$learn_alum\",
					learn_fac = \"$learn_fac\",	learn_fac_spec = \"$learn_fac_spec\", learn_friend = \"$learn_friend\",
					learn_grad_fair = \"$learn_grad_fair\", learn_grad_spec = \"$learn_grad_spec\", learn_pubs = \"$learn_pubs\",
					learn_ucd_broch = \"$learn_ucd_broch\", learn_ucd_post = \"$learn_ucd_post\", learn_other = \"$learn_other\",
					learn_other_spec = \"$learn_other_spec\", learn_grad_com = \"$learn_grad_com\", learn_pete_com = \"$learn_pete_com\", 					learn_emp = \"$learn_emp\", more_ed = \"$more_ed\", more_admit = \"$more_admit\", more_reqs = \"$more_reqs\",
					more_fac =\"$more_fac\", more_courses = \"$more_courses\", more_other = \"$more_other\",
					more_other_spec = \"$more_other_spec\", high_degree = \"$high_degree\", update_date = \"$sub_date\",
					phd_subscribe = \"$phd_subscribe\" WHERE phd_id = \"$phd_id\" ";
					} // end /if sub_recruit == update information

					$r_insert = mysqli_query($link, $q_insert);

					if (mysqli_affected_rows($link) >= 1)
					{

						print "<blockquote>";
						print "Your information has been submitted.  Thank you for your interest in the UC Davis PhD Program.<p>
						<a href= \"https://health.ucdavis.edu/phs/education/PhD/ph_phd.html\">Return to the UC Davis PhD Program home page</a>";
						print "</blockquote>";

						// e-mail a confirmation message to the applicant
						$to = $email;
//						$cc_email = "PHSInstAffairs@phlistserv.ucdavis.edu";
						$subject = "Thanks for your interest in the Master of Public Health at UC Davis!";
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

				//		if ($sub_recruit == "Submit Information") mail($to, $subject, $contents, $header);
						// e-mail welcome letter only if this is the initial entry

					}
					else
					{
						print "An error has occurred during submission.<p>$q_insert";
					}
				} // end if valid_form = true




			} // end Submit Information

			if ((!$sub_recruit) || (($sub_recruit == "Submit Information") && ($valid_form == false)))
			{

//				print "<b><font size= \"2px\">To register your interest in the UCD MPH program, please complete and submit this form:</font></b>";


				if ($recruit_upd)
				{

					$q_alum = "SELECT * from phd_recruit WHERE phd_id = $recruit_upd";
					$r_alum = mysqli_query($link, $q_alum);
					$row_alum = mysqli_fetch_array($r_alum, MYSQLI_ASSOC);

					$aoe_epm = $row_alum['aoe_epm'];
					$aoe_nut = $row_alum['aoe_nut'];
					$aoe_eoh = $row_alum['aoe_eoh'];
					$aoe_hzid = $row_alum['aoe_hzid'];
					$aoe_vph = $row_alum['aoe_vph'];
					$aoe_gph = $row_alum['aoe_gph'];
					$aoe_other = $row_alum['aoe_other'];
					$aoe_other_spec = $row_alum['aoe_other_spec'];
					$enroll_year = $row_alum['enroll_year'];
					$enroll_qtr = $row_alum['enroll_qtr'];
					$fname = $row_alum['fname'];
					$lname = $row_alum['lname'];
					$gender = $row_alum['gender'];
					$address = $row_alum['address'];
					$address2 = $row_alum['address2'];
					$city = $row_alum['city'];
					$state = $row_alum['state'];
					$zip = $row_alum['zip'];
					$email = $row_alum['email'];
					$phone = $row_alum['phone'];
					$us_cit = $row_alum['us_cit'];
					$ca_res = $row_alum['ca_res'];
					$perm_res = $row_alum['perm_res'];
					$int_stud = $row_alum['int_stud'];
					$ethnic = $row_alum['ethnic'];
					$cur_inst = $row_alum['cur_inst'];
					$cur_maj = $row_alum['cur_maj'];
					$cur_class = $row_alum['cur_class'];
					$cur_class_other = $row_alum['cur_class_other'];
					$deg_ba = $row_alum['deg_ba'];
					$deg_ma = $row_alum['deg_ma'];
					$deg_other = $row_alum['deg_other'];
					$deg_other_spec = $row_alum['deg_other_spec'];
					$deg_na = $row_alum['deg_na'];
					$deg_dvm = $row_alum['deg_dvm'];
					$deg_phd = $row_alum['deg_phd'];
					$deg_md = $row_alum['deg_md'];
					$deg_jd = $row_alum['deg_jd'];
					$deg_pharmd = $row_alum['deg_pharmd'];
					$deg_rn = $row_alum['deg_rn'];
					$deg_np = $row_alum['deg_np'];
					$deg_pa = $row_alum['deg_pa'];
					$cur_emp = $row_alum['cur_emp'];
					$cur_post = $row_alum['cur_post'];
					$gpa = $row_alum['gpa'];
					$gre_v = $row_alum['gre_v'];
					$gre_a = $row_alum['gre_a'];
					$gre_q = $row_alum['gre_q'];
					$mcat = $row_alum['mcat'];
					$usmle1 = $row_alum['usmle1'];
					$usmle2 = $row_alum['usmle12'];
					$learn_alum = $row_alum['learn_alum'];
					$learn_fac = $row_alum['learn_fac'];
					$learn_fac_spec = $row_alum['learn_fac_spec'];
					$learn_friend = $row_alum['learn_friend'];
					$learn_grad_fair = $row_alum['learn_grad_fair'];
					$learn_grad_spec = $row_alum['learn_grad_spec'];
					$learn_grad_com = $row_alum['learn_grad_com'];
					$learn_pete_com = $row_alum['learn_pete_com'];
					$learn_emp = $row_alum['learn_emp'];
					$more_ed = $row_alum['more_ed'];
					$more_admit = $row_alum['more_admit'];
					$more_reqs = $row_alum['more_reqs'];

					$more_courses = $row_alum['more_courses'];
					$more_fac = $row_alum['more_fac'];
					$more_other = $row_alum['more_other'];
					$more_other_spec = $row_alum['more_other_spec'];
					$high_degree = $row_alum['high_degree'];
					$rpt_exclude = $row_alum['rpt_exclude'];
					$phd_subscribe = $row_alum['phd_subscribe'];
				} // end if recruit_upd


				print "<form name= \"info_req\" method= \"post\" action= \"phd_recruit.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>1. Please select professional interest:</b></td>";
					print "</td>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"aoe_epm\" value= \"1\" ";
						if ($aoe_epm == 1) print "checked";
						print ">&nbsp;&nbsp;Epidemiology</td>";

						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"aoe_nut\" value= \"1\" ";
						if ($aoe_nut == 1) print "checked";
						print ">&nbsp;&nbsp;Nutrition</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"aoe_eoh\" value= \"1\" ";
						if ($aoe_eoh == 1) print "checked";
						print ">&nbsp;&nbsp;Env. and Occupational Health</td>";

						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"aoe_hzid\" value= \"1\" ";
						if ($aoe_hzid == 1) print "checked";
						print ">&nbsp;&nbsp;Human and Zoonotic Infectious Diseases</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"aoe_vph\" value= \"1\" ";
						if ($aoe_vph == 1) print "checked";
						print ">&nbsp;&nbsp;Veterinary Public Health</td>";

						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"aoe_gph\" value= \"1\" ";
						if ($aoe_gph == 1) print "checked";
						print ">&nbsp;&nbsp;General Public Health</td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"aoe_other\" value= \"1\" ";
						if ($aoe_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other (specify -->)&nbsp;&nbsp;&nbsp;";

						print "<input type= \"text\" name= \"aoe_other_spec\" value= \"$aoe_other_spec\" size= \"50\"></td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>Planned year of enrollment</b></td>";
					print "<tr>";

					print "<tr>";
						print "<td class= \"recruit\">Quarter</td>";
						print "<td class= \"recruit\">Year</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><select name= \"enroll_qtr\">";
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

						print "<option value= \"Summer\" ";
						if ($enroll_qtr == "Summer") print "selected";
						print "> Summer</option>\n";
						print "</select></td>";

						print "<td class= \"recruit\"><select name= \"enroll_year\">";
						print "<option value= \"0\" ";
						if ($enroll_year == "0") print "selected";
						print "> (Select Year)</option>\n";

						print "<option value= \"2024\" ";
						if ($enroll_year == "2024") print "selected";
						print "> 2024</option>\n";

						print "<option value= \"2025\" ";
						if ($enroll_year == "2025") print "selected";
						print "> 2025</option>\n";

						print "<option value= \"2026\" ";
						if ($enroll_year == "2026") print "selected";
						print "> 2026</option>\n";

						print "<option value= \"2027\" ";
						if ($enroll_year == "2027") print "selected";
						print "> 2027</option>\n";

						print "<option value= \"2028\" ";
						if ($enroll_year == "2028") print "selected";
						print "> 2028</option>\n";

						print "</select></td>";

					print "</tr>";

					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>2. Personal Information</b></td>";
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
						print "<td colspan= \"2\" class= \"recruit\">Gender:</td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"radio\" name= \"gender\" value= \"M\" ";
						if ($gender == "M") print "checked";
						print ">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						print "<input type= \"radio\" name= \"gender\" value= \"F\" ";
						if ($gender == "F") print "checked";
						print ">Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						print "<input type= \"radio\" name= \"gender\" value= \"NA\" ";
						if ($gender == "NA") print "checked";
						print ">Not Specified</td>";
					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\">Current Address</td>";
//						print "<td class= \"recruit\">Address 2</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"address\" value= \"$address\"></td>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"address2\" value= \"$address2\"></td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\">City</td>";
//						print "<td class= \"recruit\">State, Zip</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"city\" value= \"$city\"></td>";
//						print "<td class= \"recruit\"><input size= \"2\" type= \"text\" name= \"state\" value= \"$state\">,&nbsp;&nbsp;";
//						print "<input type= \"text\" name= \"zip\" value= \"$zip\"></td>";
//					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\">E-mail</td>";
						print "<td class= \"recruit\">Phone</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"email\" value= \"$email\"></td>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"phone\" value= \"$phone\"></td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>Residency (check all that apply)</b></td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"us_cit\" value= \"1\" ";
						if ($us_cit == "1") print "checked";
						print ">&nbsp;&nbsp;U.S. Citizen</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"int_stud\" value= \"1\" ";
						if ($int_stud == "1") print "checked";
						print ">&nbsp;&nbsp;International Student</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"ca_res\" value= \"1\" ";
						if ($ca_res == "1") print "checked";
						print ">&nbsp;&nbsp;CA Resident</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"perm_res\" value= \"1\" ";
						if ($perm_res == "1") print "checked";
						print ">&nbsp;&nbsp;Permanent Resident</td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\">Race/Ethnicity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						print "<select name= \"ethnic\">";
					print "<option value= \"0\" ";
					if ($ethnic == "0") print "selected";
					print "> (Select Ethnicity)</option>\n";

					print "<option value= \"AF\" ";
					if ($ethnic == "AF") print "selected";
					print "> African-American/Black</option>\n";

					print "<option value= \"CH\" ";
					if ($ethnic == "CH") print "selected";
					print "> Chinese-American/Chinese</option>\n";

					print "<option value= \"EI\" ";
					if ($ethnic == "EI") print "selected";
					print "> East Indian/Pakistani</option>\n";

					print "<option value= \"FP\" ";
					if ($ethnic == "FP") print "selected";
					print "> Filipino/Philipino</option>\n";

					print "<option value= \"AI\" ";
					if ($ethnic == "AI") print "selected";
					print "> American Indian/(Alaskan Native)*</option>\n";

					print "<option value= \"SA\" ";
					if ($ethnic == "SA") print "selected";
					print "> Southeast Asian</option>\n";

					print "<option value= \"JA\" ";
					if ($ethnic == "JA") print "selected";
					print "> Japanese-American/Japanese</option>\n";

					print "<option value= \"LA\" ";
					if ($ethnic == "LA") print "selected";
					print "> Latino/Hispanic*</option>\n";

					print "<option value= \"OA\" ";
					if ($ethnic == "OA") print "selected";
					print "> Other Asian</option>\n";

					print "<option value= \"PM\" ";
					if ($ethnic == "PM") print "selected";
					print "> Puerto Rican - Mainland</option>\n";

					print "<option value= \"PC\" ";
					if ($ethnic == "PC") print "selected";
					print "> Puerto Rican - Commonwealth</option>\n";

					print "<option value= \"PI\" ";
					if ($ethnic == "PI") print "selected";
					print "> Pacific Islander/Polynesian</option>\n";

					print "<option value= \"WH\" ";
					if ($ethnic == "WH") print "selected";
					print "> White/Causcasian</option>\n";

					print "<option value= \"OT\" ";
					if ($ethnic == "OT") print "selected";
					print "> Other</option>\n";

					print "<option value= \"DS\" ";
					if ($ethnic == "DS") print "selected";
					print "> Decline to State</option>\n";

					print "</select></td>";

					print "</tr>";

					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>3. Current Institution</b></td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\">Current Institution</td>";
						print "<td class= \"recruit\">Major</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"cur_inst\" value= \"$cur_inst\"></td>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"cur_maj\" value= \"$cur_maj\"></td>";
					print "</tr>";

//					print "<tr>";
//						print "<td colspan= \"2\" class= \"recruit\"><b>Current Class Standing:</b></td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td colspan= \"2\" class= \"recruit\"><input type= \"radio\" name= \"cur_class\" value= \"Junior\" ";
//						if ($cur_class == "Junior") print "checked";
//						print ">Jr&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//						print "<input type= \"radio\" name= \"cur_class\" value= \"Senior\" ";
//						if ($cur_class == "Senior") print "checked";
//						print ">Sr&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//						print "<input type= \"radio\" name= \"cur_class\" value= \"Graduate\" ";
//						if ($cur_class == "Graduate") print "checked";
//						print ">Graduate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//						print "<input type= \"radio\" name= \"cur_class\" value= \"NA\" ";
//						if ($cur_class == "NA") print "checked";
//						print ">NA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//						print "<input type= \"radio\" name= \"cur_class\" value= \"Other\" ";
//						if ($cur_class == "Other") print "checked";
//						print ">Other -->&nbsp;&nbsp;";
//						print "<input type= \"text\" name= \"cur_class_other\" value= \"$cur_class_other\"></td>";
//					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>Degrees Held</b></td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_ba\" value= \"1\" ";
						if ($deg_ba == "1") print "checked";
						print ">&nbsp;&nbsp;B.A./B.S.</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_ma\" value= \"1\" ";
						if ($deg_ma == "1") print "checked";
						print ">&nbsp;&nbsp;M.A./M.S.</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_dvm\" value= \"1\" ";
						if ($deg_dvm == "1") print "checked";
						print ">&nbsp;&nbsp;D.V.M.</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_phd\" value= \"1\" ";
						if ($deg_phd == "1") print "checked";
						print ">&nbsp;&nbsp;Ph.D.</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_md\" value= \"1\" ";
						if ($deg_md == "1") print "checked";
						print ">&nbsp;&nbsp;M.D.</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_jd\" value= \"1\" ";
						if ($deg_jd == "1") print "checked";
						print ">&nbsp;&nbsp;J.D.</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_pharmd\" value= \"1\" ";
						if ($deg_pharmd == "1") print "checked";
						print ">&nbsp;&nbsp;Pharm.D.</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_rn\" value= \"1\" ";
						if ($deg_rn == "1") print "checked";
						print ">&nbsp;&nbsp;R.N.</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_np\" value= \"1\" ";
						if ($deg_np == "1") print "checked";
						print ">&nbsp;&nbsp;N.P.</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_pa\" value= \"1\" ";
						if ($deg_pa == "1") print "checked";
						print ">&nbsp;&nbsp;P.A.</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_na\" value= \"1\" ";
						if ($deg_na == "1") print "checked";
						print ">&nbsp;&nbsp;N/A</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"deg_other\" value= \"1\" ";
						if ($deg_other == "1") print "checked";
						print ">&nbsp;&nbsp;Other ";
						print "&nbsp;&nbsp;&nbsp;<input type= \"text\" name= \"deg_other_spec\" value= \"$deg_other_spec\"></td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\" colspan= \"2\">Highest Degree Earned&nbsp;&nbsp;&nbsp; <select name= \"high_degree\">";
						print "<option value= \"0\" ";
						if ($high_degree == "0") print "selected";
						print "> (Select Degree)</option>\n";

						print "<option value= \"BABS\" ";
						if ($high_degree == "BABS") print "selected";
						print "> B.A./B.S.</option>\n";

						print "<option value= \"MAMS\" ";
						if ($high_degree == "MAMS") print "selected";
						print "> M.A./M.S.</option>\n";

						print "<option value= \"DVM\" ";
						if ($high_degree == "DVM") print "selected";
						print "> D.V.M.</option>\n";

						print "<option value= \"Ph.D.\" ";
						if ($high_degree == "PhD") print "selected";
						print "> Ph.D.</option>\n";

						print "<option value= \"MD\" ";
						if ($high_degree == "MD") print "selected";
						print "> M.D.</option>\n";

						print "<option value= \"JD\" ";
						if ($high_degree == "JD") print "selected";
						print "> J.D.</option>\n";

						print "<option value= \"PharmD\" ";
						if ($high_degree == "PharmD") print "selected";
						print "> Pharm.D.</option>\n";

						print "<option value= \"RN\" ";
						if ($high_degree == "RN") print "selected";
						print "> R.N.</option>\n";

						print "<option value= \"NP\" ";
						if ($high_degree == "NP") print "selected";
						print "> N.P.</option>\n";

						print "<option value= \"PA\" ";
						if ($high_degree == "PA") print "selected";
						print "> P.A.</option>\n";

						print "<option value= \"NA\" ";
						if ($high_degree == "NA") print "selected";
						print "> N/A</option>\n";

						print "<option value= \"Other\" ";
						if ($high_degree == "Other") print "selected";
						print "> Other</option>\n";
						print "</select></td>";
					print "</tr>";



					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

//					print "<tr>";
//						print "<td colspan= \"2\" class= \"recruit\"><b>4. GPA/GRE</b></td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\">GPA</td>";
//						print "<td class= \"recruit\">GRE Verbal Score</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"gpa\" value= \"$gpa\"></td>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"gre_v\" value= \"$gre_v\"></td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\">GRE Analytical Score</td>";
//						print "<td class= \"recruit\">GRE Quantitative Score</td>";
//					print "</tr>";

//				print "<tr>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"gre_a\" value= \"$gre_a\"></td>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"gre_q\" value= \"$gre_q\"></td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\">USMLE 1</td>";
//						print "<td class= \"recruit\">USMLE 2</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"usmle1\" value= \"$usmle1\"></td>";
//						print "<td class= \"recruit\"><input type= \"text\" name= \"usmle2\" value= \"$usmle2\"></td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td colspan= \"2\" class= \"recruit\">MCAT</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td colspan= \"2\" class= \"recruit\"><input type= \"text\" name= \"mcat\" value= \"$mcat\"></td>";
//					print "</tr>";

//					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>4. Current Employment Status</b></td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\">Employer</td>";
						print "<td class= \"recruit\">Position</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"cur_emp\" value= \"$cur_emp\"></td>";
						print "<td class= \"recruit\"><input type= \"text\" name= \"cur_post\" value= \"$cur_post\"></td>";
					print "</tr>";

					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>5. How did you learn about the UC Davis Ph.D. Program?</b>&nbsp;(check all that apply)</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_alum\" value= \"1\" ";
						if ($learn_alum == "1") print "checked";
						print ">&nbsp;&nbsp;Alumni of UC Davis</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_friend\" value= \"1\" ";
						if ($learn_friend == "1") print "checked";
						print ">&nbsp;&nbsp;Friend/family member</td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"learn_fac\" value= \"1\" ";
						if ($learn_fac == "1") print "checked";
						print ">&nbsp;&nbsp;Faculty member at my institution (please specify) ";
						print "&nbsp;&nbsp;&nbsp;<input type= \"text\" name= \"learn_fac_spec\" value= \"$learn_fac_spec\" size= \"30\"></td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"learn_grad_fair\" value= \"1\" ";
						if ($learn_grad_fair == "1") print "checked";
						print ">&nbsp;&nbsp;Graduate School Fair (please specify) ";
						print "&nbsp;&nbsp;&nbsp;<input type= \"text\" name= \"learn_grad_spec\" value= \"$learn_grad_spec\" size= \"30\"></td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_pubs\" value= \"1\" ";
						if ($learn_pubs == "1") print "checked";
						print ">&nbsp;&nbsp;Publications about graduate schools</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_ucd_broch\" value= \"1\" ";
						if ($learn_ucd_broch == "1") print "checked";
						print ">&nbsp;&nbsp;UC Davis brochure</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_ucd_post\" value= \"1\" ";
						if ($learn_ucd_post == "1") print "checked";
						print ">&nbsp;&nbsp;UC Davis poster</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_emp\" value= \"1\" ";
						if ($learn_emp == "1") print "checked";
						print ">&nbsp;&nbsp;Employer</td>";
					print "</tr>";

//					print "<tr>";
//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_grad_com\" value= \"1\" ";
//						if ($learn_grad_com == "1") print "checked";
//						print ">&nbsp;&nbsp;GradSchools.com</td>";
//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"learn_pete_com\" value= \"1\" ";
//						if ($learn_pete_com == "1") print "checked";
//						print ">&nbsp;&nbsp;Peterson's.com</td>";
//					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"learn_other\" value= \"1\" ";
						if ($learn_other == "1") print "checked";
						print ">&nbsp;&nbsp;Other (please specify) ";
						print "&nbsp;&nbsp;&nbsp;<input type= \"text\" name= \"learn_other_spec\" value= \"$learn_other_spec\" size= \"30\"></td>";
					print "</tr>";

					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>6. I am interested in receiving more information about:</b>&nbsp;(check all that apply)</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"more_ed\" value= \"1\" ";
						if ($more_ed == "1") print "checked";
						print ">&nbsp;&nbsp;Distance Education</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"more_admit\" value= \"1\" ";
						if ($more_admit == "1") print "checked";
						print ">&nbsp;&nbsp;Admissions</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"more_reqs\" value= \"1\" ";
						if ($more_reqs == "1") print "checked";
						print ">&nbsp;&nbsp;Degree Requirments</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"more_courses\" value= \"1\" ";
						if ($more_courses == "1") print "checked";
						print ">&nbsp;&nbsp;Courses</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"more_fac\" value= \"1\" ";
						if ($more_fac == "1") print "checked";
						print ">&nbsp;&nbsp;Faculty</td>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"more_other\" value= \"1\" ";
						if ($more_other == "1") print "checked";
						print ">&nbsp;&nbsp;Other (please specify) ";
						print "&nbsp;&nbsp;&nbsp;<input type= \"text\" name= \"more_other_spec\" value= \"$more_other_spec\" size= \"30\"></td>";

					print "</tr>";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><input type= \"checkbox\" name= \"phd_subscribe\" value= \"1\" ";
//						if ($phd_subscribe == 1) print "checked";
						print "checked";
						print ">&nbsp;&nbsp;<strong>7. Do you want to subscribe to the Ph.D. Interest list?
						</strong></td>";
					print "</tr>";


					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
					if ($recruit_upd)
					{
						print "<td align= \"center\"><input type= \"submit\" name= \"sub_recruit\" value= \"Update Information\">";
						print "<input type= \"hidden\" name= \"phd_id\" value= \"$recruit_upd\"></td>";
					}
					else
					{
						print "<td align= \"center\"><input type= \"submit\" name= \"sub_recruit\" value= \"Submit Information\"></td>";
					}
						print "<td align= \"center\"><input type= \"submit\" name= \"sub_recruit\" value= \"Do Not Submit Information\"></td>";
					print "</tr>";

				print "</table>";
				print "</form>";

				// THIS IS THE SECTION TO UNSUBSCRIBE FROM THE LIST


								print "<form name= \"unsubscribe\" method= \"post\" action= \"phd_recruit.php\">";
								print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";

									print "<tr>";
										print "<td><hr></td>";
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

								print "</table>";
								print "</form>";



				// END UNSUBSCRIBE



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
