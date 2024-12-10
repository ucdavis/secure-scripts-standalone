<? //include "../includes/internal_authentication.php"; ?>

<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

<h1>Instrument Detail</h1>

	<?php
	// include function library
//	include "/includes/common.lib.php";
	
	$instrument_id = "";
	$instrument_title = "";
	$instrument_url = "";
	$instrument_web = "";
	$instrument_doc = "";
	$instrument_content = "";
	$public_display = "";
	$tcec_tested = "";
	$type_education = "";
	$type_focus = "";
	$type_kii = "";
	$type_media = "";
	$type_observe = "";
	$type_policy = "";
	$type_public = "";
	$type_purchase = "";
	$type_other = "";
	$type_other_spec = "";
	$topic_ad = "";
	$topic_behave = "";
	$topic_cessation = "";
	$topic_community = "";
	$topic_flavor = "";
	$topic_general = "";
	$topic_equity = "";
	$topic_law = "";
	$topic_litter = "";
	$topic_home = "";
	$topic_package = "";
	$topic_retail = "";
	$topic_school = "";
	$topic_secondhand = "";
	$topic_thirdhand = "";
	$topic_tobacco = "";
	$topic_training = "";
	$topic_other = "";
	$topic_other_spec = "";
	$topic_implement = "";
	$topic_activity = "";
	$lang_en = "";
	$lang_sp = "";
	$lang_other = "";
	$lang_other_spec = "";

	$sub_instrument = "";
	
	if(isset($_POST['sub_instrument'])) $sub_instrument = $_POST['sub_instrument'];
	
	if ($sub_instrument == "Edit Instrument")
	{
		$instrumentID = $_POST['iid'];
	}
	
	if(isset($_POST['instrument_id'])) $instrument_id = $_POST['instrument_id'];
	if(isset($_POST['instrument_title'])) $instrument_title = $_POST['instrument_title'];
	if(isset($_POST['instrument_url'])) $instrument_url = $_POST['instrument_url'];
	if(isset($_POST['instrument_web'])) $instrument_web = $_POST['instrument_web'];
	if(isset($_POST['instrument_doc'])) $instrument_doc = $_POST['instrument_doc'];
	if(isset($_POST['instrument_content'])) $instrument_content = $_POST['instrument_content'];
	if(isset($_POST['public_display'])) $public_display = $_POST['public_display'];
	if(isset($_POST['tcec_tested'])) $tcec_tested = $_POST['tcec_tested'];

	if(isset($_POST['type_education'])) $type_education = $_POST['type_education'];
	if(isset($_POST['type_focus'])) $type_focus = $_POST['type_focus'];
	if(isset($_POST['type_kii'])) $type_kii = $_POST['type_kii'];
	if(isset($_POST['type_media'])) $type_media = $_POST['type_media'];
	if(isset($_POST['type_observe'])) $type_observe = $_POST['type_observe'];
	if(isset($_POST['type_policy'])) $type_policy = $_POST['type_policy'];
	if(isset($_POST['type_public'])) $type_public = $_POST['type_public'];
	if(isset($_POST['type_purchase'])) $type_purchase = $_POST['type_purchase'];
	if(isset($_POST['type_other'])) $type_other = $_POST['type_other'];
	if(isset($_POST['type_other_spec'])) $type_other_spec = $_POST['type_other_spec'];

	if(isset($_POST['topic_ad'])) $topic_ad = $_POST['topic_ad'];
	if(isset($_POST['topic_behave'])) $topic_behave = $_POST['topic_behave'];
	if(isset($_POST['topic_cessation'])) $topic_cessation = $_POST['topic_cessation'];
	if(isset($_POST['topic_community'])) $topic_community = $_POST['topic_community'];
	if(isset($_POST['topic_flavor'])) $topic_flavor = $_POST['topic_flavor'];
	if(isset($_POST['topic_general'])) $topic_general = $_POST['topic_general'];
	if(isset($_POST['topic_equity'])) $topic_equity = $_POST['topic_equity'];
	if(isset($_POST['topic_law'])) $topic_law = $_POST['topic_law'];
	if(isset($_POST['topic_litter'])) $topic_litter = $_POST['topic_litter'];
	if(isset($_POST['topic_home'])) $topic_home = $_POST['topic_home'];
	if(isset($_POST['topic_package'])) $topic_package = $_POST['topic_package'];
	if(isset($_POST['topic_retail'])) $topic_retail = $_POST['topic_retail'];
	if(isset($_POST['topic_school'])) $topic_school = $_POST['topic_school'];
	if(isset($_POST['topic_secondhand'])) $topic_secondhand = $_POST['topic_secondhand'];
	if(isset($_POST['topic_thirdhand'])) $topic_thirdhand = $_POST['topic_thirdhand'];
	if(isset($_POST['topic_tobacco'])) $topic_tobacco = $_POST['topic_tobacco'];
	if(isset($_POST['topic_training'])) $topic_training = $_POST['topic_training'];
	if(isset($_POST['topic_other'])) $topic_other = $_POST['topic_other'];
	if(isset($_POST['topic_other_spec'])) $topic_other_spec = $_POST['topic_other_spec'];
	if(isset($_POST['topic_implement'])) $topic_implement = $_POST['topic_implement'];
	if(isset($_POST['topic_activity'])) $topic_activity = $_POST['topic_activity'];
	
	if(isset($_POST['lang_en'])) $lang_en = $_POST['lang_en'];
	if(isset($_POST['lang_sp'])) $lang_sp = $_POST['lang_sp'];
	if(isset($_POST['lang_other'])) $lang_other = $_POST['lang_other'];
	if(isset($_POST['lang_other_spec'])) $lang_other_spec = $_POST['lang_other_spec'];
	
	
	$upload_instrument_dir = "/var/www/non_www/uploads/tcec_instruments/";
	
	
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

			// upload files validation

			//get the highest key number attach to the beginning of the file name to avoid duplicate names
//			$q_maxid = "SELECT MAX(instrument_id) FROM instrument_search";
//			$r_maxid = mysqli_query($link, $q_maxid);
//			$row_maxid = mysqli_fetch_row($r_maxid);
			
//			$upload_id = $row_maxid[0] + 1;
			

			//construct time stamp string to append to the end of the file name to avoid duplicate names
			$upload_year = date("Y");
			$upload_month = date("m");
			$upload_day = date("d");
			$upload_epoch = date("U");
			$upload_stamp = $upload_year.$upload_month.$upload_day."_".$upload_epoch."_";

			// move files from temporary location to server subdirectory
			$upload_instrument_file = basename($_FILES["instrument_doc"]["name"]);

			// end upload files validation


			if ($sub_instrument == "Do Not Submit Information")
			{
				print "<h2>The Instrument information has not been submitted.<br>
				<a href= \"instrument_listing.php\">Return to Instruments Listing.</a></h2>";
			
			} // end Do Not Submit Information

			if (($sub_instrument == "Add Instrument") || ($sub_instrument == "Update Instrument"))
			{
			
				$valid_form = true;
				
				if (!$instrument_title)
				{
					print "<strong><font color= \"red\">Please enter a title for the instrument.</font></strong><br>";
					$valid_form = false;
				}
		
		
//				if ($email)			// verify e-mail address syntax is correct
//				{
//					if (!(preg_match("/@.+\\./", $email)))
//					{
//						print "<b><font color= \"red\">The syntax of your e-mail address is incorrect.  Please re-enter.</b><br></font>";
//						$valid_form = false;
//					}
//				}	
		
		
// if all of the required fields are entered clean the text fields and submit to the database
				
				if ($valid_form == true)
				{						

					// verfify valid form upload if a file is uploaded
					if ($upload_instrument_file)
					{

						// document path hash
						$instrument_link = $upload_instrument_dir.$upload_instrument_file;
						$instrument_name = $upload_instrument_file;
						$instrument_hash = MD5($upload_instrument_file);	

//						$instrument_link = $upload_stamp.$upload_instrument_dir.$upload_instrument_file;
//						$instrument_name = $upload_stamp.$upload_instrument_file;
//						$instrument_hash = MD5($upload_stamp.$upload_instrument_file);	



						// verify file is in PDF or Word format
						if (($_FILES["instrument_doc"]["type"] != "application/pdf") && ($_FILES["instrument_doc"]["type"] != "application/msword") && 
						($_FILES["instrument_doc"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ))
						{
							print "<font color=\"#FF0000\">Invalid file type.  You must upload a PDF or Word file.</font><br>";
							$valid_form = false;
						}
			
						elseif (!move_uploaded_file($_FILES["instrument_doc"]["tmp_name"], $instrument_link))	// verify file is attached
						{
							print "<font color= \"red\">Your document file has not been uploaded.<br></font>";
			//				print_r($_FILES);
							print "<p>$upload_instrument_file<p>";
							$valid_form = false;
						}
					} // end if $upload_doc_file


					$instrument_title = filter_var($instrument_title, FILTER_SANITIZE_STRING);
//					$instrument_url = filter_var($instrument_url, FILTER_SANITIZE_URL);
					$instrument_web = filter_var($instrument_web, FILTER_SANITIZE_STRING);
					$instrument_content = filter_var($instrument_content, FILTER_SANITIZE_STRING);

					$sub_date = date("c"); //Get the timestamp of when the survey is entered
					
					if ($sub_instrument == "Add Instrument")
					{

					$q_insert = "INSERT INTO instrument_search 
					(instrument_title, instrument_url, instrument_web, type_education, type_focus, type_kii, type_media, type_observe, type_policy, type_public, type_purchase, type_other, 
					topic_ad, topic_behave, topic_cessation, topic_community, topic_flavor, topic_general, topic_equity, topic_law, topic_litter, topic_home, topic_package, topic_retail,
					topic_school, topic_secondhand, topic_thirdhand, topic_tobacco, topic_training, sub_date, instrument_link, instrument_name, instrument_hash, public_display, instrument_content,
					tcec_tested, topic_other, topic_implement, topic_activity, type_other_spec, topic_other_spec, lang_en, lang_sp, lang_other, lang_other_spec)
					VALUES
					(\"$instrument_title\", \"$instrument_url\", \"$instrument_web\", \"$type_education\", \"$type_focus\", \"$type_kii\", \"$type_media\", \"$type_observe\", \"$type_policy\",
					\"$type_public\", \"$type_purchase\", \"$type_other\", \"$topic_ad\", \"$topic_behave\", \"$topic_cessation\", \"$topic_community\", \"$topic_flavor\", \"$topic_general\",
					\"$topic_equity\", \"$topic_law\", \"$topic_litter\", \"$topic_home\", \"$topic_package\", \"$topic_retail\", \"$topic_school\", \"$topic_secondhand\", \"$topic_thirdhand\",
					\"$topic_tobacco\", \"$topic_training\", \"$sub_date\", \"$instrument_link\", \"$instrument_name\", \"$instrument_hash\", \"$public_display\", \"$instrument_content\",
					\"$tcec_tested\", \"$topic_other\", \"$topic_implement\", \"$topic_activity\", \"$type_other_spec\", \"$topic_other_spec\", \"$lang_en\", \"$lang_sp\", \"$lang_other\",
					\"$lang_other_spec\")";
					} // end if sub_recruit == submit information
					
					if ($sub_instrument == "Update Instrument")
					{
					
					$q_insert = "UPDATE instrument_search SET

					instrument_title = \"$instrument_title\", instrument_url = \"$instrument_url\", instrument_web = \"$instrument_web\", type_education = \"$type_education\", 
					type_focus = \"$type_focus\", type_kii = \"$type_kii\", type_media = \"$type_media\", type_observe = \"$type_observe\", type_policy = \"$type_policy\", 
					type_public = \"$type_public\", type_purchase = \"$type_purchase\", type_other = \"$type_other\", topic_ad = \"$topic_ad\", topic_behave = \"$topic_behave\", 
					topic_cessation = \"$topic_cessation\", topic_community = \"$topic_community\", topic_flavor = \"$topic_flavor\", topic_general = \"$topic_general\", 
					topic_equity = \"$topic_equity\", topic_law = \"$topic_law\", topic_litter = \"$topic_litter\", topic_home = \"$topic_home\", topic_package = \"$topic_package\", 
					topic_retail = \"$topic_retail\", topic_school = \"$topic_school\", topic_secondhand = \"$topic_secondhand\", topic_thirdhand = \"$topic_thirdhand\", 
					topic_tobacco = \"$topic_tobacco\", topic_training = \"$topic_training\", mod_date = \"$sub_date\", public_display = \"$public_display\", 
					instrument_content = \"$instrument_content\", tcec_tested = \"$tcec_tested\", topic_other = \"$topic_other\", topic_implement = \"$topic_implement\",
					topic_activity = \"$topic_activity\", type_other_spec = \"$type_other_spec\", topic_other_spec = \"$topic_other_spec\", lang_en = \"$lang_en\", lang_sp = \"$lang_sp\", 
					lang_other = \"$lang_other\", lang_other_spec = \"$lang_other_spec\" ";
					
					// upload file fields only if a file is being uploaded
					if ($upload_instrument_file) $q_insert .= ", instrument_link = \"$instrument_link\", instrument_hash = \"$instrument_hash\", instrument_name = \"$instrument_name\" ";
					
					$q_insert .= "WHERE instrument_id = \"$instrument_id\" ";
					
					} // end /if sub_recruit == update information
					
					$r_insert = mysqli_query($link, $q_insert);

					if (mysqli_affected_rows($link) >= 1)
					{
						
						print "<blockquote>";
						print "<h2>Your Instrument has been updated.<br>
						<a href= \"instrument_listing.php\">Return to Instruments List</a><br><br>
						<a href= \"instrument_hidden_listing.php\">Return to Deleted Instruments List</a></h2>";
						print "</blockquote>";
						
					}
					else
					{
						print "An error has occurred during submission.<br> $q_insert<p>"; //$q_insert
					}
				} // end if valid_form = true
					
			
			
			
			} // end Submit Information

			if ((!$sub_instrument) || ($sub_instrument == "Edit Instrument") || ((($sub_instrument == "Add Instrument") || ($sub_instrument == "Update Instrument")) && ($valid_form == false)))
			{
				$submit = "Add Instrument";
			
				if (($sub_instrument == "Edit Instrument") || ($sub_instrument == "Update Instrument"))
				{
					$submit = "Update Instrument";

					if ($sub_instrument == "Update Instrument")
					{
						$instrumentID = $instrument_id;	
					}
					if ($sub_instrument == "Edit Instrument")
					{
						$q_instrument = "SELECT * from instrument_search WHERE instrument_id = $instrumentID";
						$r_instrument = mysqli_query($link, $q_instrument);
						$row_instrument = mysqli_fetch_array($r_instrument, MYSQLI_ASSOC);
					
						$public_display = $row_instrument['public_display'];
						$tcec_tested = $row_instrument['tcec_tested'];					
						$instrument_title = $row_instrument['instrument_title'];
						$instrument_url = $row_instrument['instrument_url'];
						$instrument_web = $row_instrument['instrument_web'];
						$instrument_content = $row_instrument['instrument_content'];

						$type_education = $row_instrument['type_education'];
						$type_focus = $row_instrument['type_focus'];
						$type_kii = $row_instrument['type_kii'];
						$type_media = $row_instrument['type_media'];
						$type_observe = $row_instrument['type_observe'];
						$type_policy = $row_instrument['type_policy'];
						$type_public = $row_instrument['type_public'];
						$type_purchase = $row_instrument['type_purchase'];
						$type_other = $row_instrument['type_other'];
						$type_other_spec = $row_instrument['type_other_spec'];
					
						$topic_ad = $row_instrument['topic_ad'];
						$topic_behave = $row_instrument['topic_behave'];
						$topic_cessation = $row_instrument['topic_cessation'];
						$topic_community = $row_instrument['topic_community'];
						$topic_flavor = $row_instrument['topic_flavor'];
						$topic_general = $row_instrument['topic_general'];
						$topic_equity = $row_instrument['topic_equity'];
						$topic_law = $row_instrument['topic_law'];
						$topic_litter = $row_instrument['topic_litter'];
						$topic_home = $row_instrument['topic_home'];
						$topic_package = $row_instrument['topic_package'];
						$topic_retail = $row_instrument['topic_retail'];
						$topic_school = $row_instrument['topic_school'];
						$topic_secondhand = $row_instrument['topic_secondhand'];
						$topic_thirdhand = $row_instrument['topic_thirdhand'];
						$topic_tobacco = $row_instrument['topic_tobacco'];
						$topic_training = $row_instrument['topic_training'];
						$topic_other = $row_instrument['topic_other'];
						$topic_other_spec = $row_instrument['topic_other_spec'];
						$topic_implement = $row_instrument['topic_implement'];
						$topic_activity = $row_instrument['topic_activity'];
						$lang_en = $row_instrument['lang_en'];
						$lang_sp = $row_instrument['lang_sp'];
						$lang_other = $row_instrument['lang_other'];
						$lang_other_spec = $row_instrument['lang_other_spec'];

					} // end if edit
				} // end if edit or update
				
				print "<form enctype= \"multipart/form-data\" method= \"post\" action= \"instrument_detail.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";
				

					
					print "<tr>";
						print "<td colspan= \"1\"><strong>Instrument Title</strong></td>";
					print "</tr>";
					
					print "<tr>";
						print "<td colspan= \"1\"><input type=\"text\" name=\"instrument_title\" value=\"$instrument_title\" size=\"75\"></td>";
					print "</tr>";
					
//					print "<tr><td>&nbsp;</td></tr>";					
					
//					print "<tr>";
//						print "<td colspan= \"1\"><strong>Instrument URL</strong></td>";
//						print "<td colspan= \"1\"><input type=\"text\" name=\"instrument_url\" value=\"$instrument_url\" size=\"50\"></td>";
//					print "</tr>";
					
//					print "<tr><td>&nbsp;</td></tr>";
					
					print "<tr>";
						print "<td colspan=\"1\"><strong>Upload Instrument File (Word or PDF only)</strong></td>";
					print "</tr>";
					
//					print "<tr><td>&nbsp;</td></tr>";
					
					print "<tr>";
			   			print "<td><input type= \"hidden\" name= \"MAX_FILE_SIZE\" value= \"15000000\">";
						print "<input type= \"file\" name= \"instrument_doc\" value= \"\" size= \"75\"></td>";
			        print "</tr>";
				
					print "<tr><td>&nbsp;</td></tr>";
//					print "<tr><td>&nbsp;</td></tr>";
					
//					print "<tr><td>&nbsp;</td></tr>";
					
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Select Instrument Type(s)</strong></td>";
					print "</tr>";
					
//					print "<tr><td>&nbsp;</td></tr>";
					

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_education\" value= \"1\" ";
						if ($type_education == 1) print "checked";
						print ">&nbsp;&nbsp;Education/Participant Survey</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_focus\" value= \"1\" ";
						if ($type_focus == 1) print "checked";
						print ">&nbsp;&nbsp;Focus Group</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_kii\" value= \"1\" ";
						if ($type_kii == 1) print "checked";
						print ">&nbsp;&nbsp;Key Informant Interview</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_media\" value= \"1\" ";
						if ($type_media == 1) print "checked";
						print ">&nbsp;&nbsp;Media Activity Record</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_observe\" value= \"1\" ";
						if ($type_observe == 1) print "checked";
						print ">&nbsp;&nbsp;Observation</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_policy\" value= \"1\" ";
						if ($type_policy == 1) print "checked";
						print ">&nbsp;&nbsp;Policy Record</td>";
					print "</tr>";
									
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_public\" value= \"1\" ";
						if ($type_public == 1) print "checked";
						print ">&nbsp;&nbsp;Public Intercept Survey/Opinion Poll</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_purchase\" value= \"1\" ";
						if ($type_purchase == 1) print "checked";
						print ">&nbsp;&nbsp;Tobacco Purchase Survey</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"type_other\" value= \"1\" ";
						if ($type_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other (Specify ->) <input type=\"text\" name=\"type_other_spec\" value=\"$type_other_spec\" size=\"50\"></td>";
					print "</tr>";
					
					print "<tr>";						
//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_alumni\" value= \"1\" ";
//						if ($hear_alumni == 1) print "checked";
//						print ">&nbsp;&nbsp;Satisfaction Survey</td>";
						print "<td>&nbsp;</td>";						
					print "</tr>";

					
//					print "<tr><td>&nbsp;</td></tr>";
					
//					print "<tr><td>&nbsp;</td></tr>";
					
					
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Select Instrument Topic(s)</strong></td>";
					print "</tr>";
					
//					print "<tr><td>&nbsp;</td></tr>";
					

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_activity\" value= \"1\" ";
						if ($topic_activity == 1) print "checked";
						print ">&nbsp;&nbsp;Activity Record</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_ad\" value= \"1\" ";
						if ($topic_ad == 1) print "checked";
						print ">&nbsp;&nbsp;Advertising/Marketing/Signage</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_behave\" value= \"1\" ";
						if ($topic_behave == 1) print "checked";
						print ">&nbsp;&nbsp;Behavioral Health/Mental Health/Healthcare Providers</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_cessation\" value= \"1\" ";
						if ($topic_cessation == 1) print "checked";
						print ">&nbsp;&nbsp;Cessation</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_community\" value= \"1\" ";
						if ($topic_community == 1) print "checked";
						print ">&nbsp;&nbsp;Community Engagement/Coalitions/Youth/Community Leaders</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_flavor\" value= \"1\" ";
						if ($topic_flavor == 1) print "checked";
						print ">&nbsp;&nbsp;Flavored Tobacco Products</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_general\" value= \"1\" ";
						if ($topic_general == 1) print "checked";
						print ">&nbsp;&nbsp;General Plan</td>";
					print "</tr>";
									
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_equity\" value= \"1\" ";
						if ($topic_equity == 1) print "checked";
						print ">&nbsp;&nbsp;Health Equity/Priority Populations</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_implement\" value= \"1\" ";
						if ($topic_implement == 1) print "checked";
						print ">&nbsp;&nbsp;Implementation</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_law\" value= \"1\" ";
						if ($topic_law == 1) print "checked";
						print ">&nbsp;&nbsp;Law Enforcement</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_litter\" value= \"1\" ";
						if ($topic_litter == 1) print "checked";
						print ">&nbsp;&nbsp;Litter</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_home\" value= \"1\" ";
						if ($topic_home == 1) print "checked";
						print ">&nbsp;&nbsp;Multi-Unit Housing/Smokefree Homes</td>";
					print "</tr>";
									
//					print "<tr>";
//						print "<td><input type= \"checkbox\" name= \"topic_package\" value= \"1\" ";
//						if ($topic_package == 1) print "checked";
//						print ">&nbsp;&nbsp;Price/Package/Volume Size</td>";
//					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_retail\" value= \"1\" ";
						if ($topic_retail == 1) print "checked";
						print ">&nbsp;&nbsp;Retail/Sale of Tobacco (price, pack/volume size, density, zoning)</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_school\" value= \"1\" ";
						if ($topic_school == 1) print "checked";
						print ">&nbsp;&nbsp;Schools/Academic Institutions</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td colspan=\"2\"><input type= \"checkbox\" name= \"topic_secondhand\" value= \"1\" ";
						if ($topic_secondhand == 1) print "checked";
						print ">&nbsp;&nbsp;Smoke-free/Secondhand Smoke (dining, parks, non-recreational public areas, taxi, rental cars, Uber, Lyft, casinos, hotels)</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_thirdhand\" value= \"1\" ";
						if ($topic_thirdhand == 1) print "checked";
						print ">&nbsp;&nbsp;Thirdhand Smoke</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_tobacco\" value= \"1\" ";
						if ($topic_tobacco == 1) print "checked";
						print ">&nbsp;&nbsp;Tobacco Use (ESDs, smokeless, emerging products)</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_training\" value= \"1\" ";
						if ($topic_training == 1) print "checked";
						print ">&nbsp;&nbsp;Training/Education</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_other\" value= \"1\" ";
						if ($topic_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other (Specify ->) <input type=\"text\" name=\"topic_other_spec\" value=\"$topic_other_spec\" size=\"50\"></td>";
						print "<td>&nbsp;</td>";
					print "</tr>";
									
//					print "<tr><td>&nbsp;</td></tr>";

			        print "<tr><td>&nbsp;</td></tr>";
				
					print "<tr>";
						print "<td valign=\"top\"><strong>Instrument Information</strong></td>";
					print "</tr>";
					
					print "<tr>";
						print "<td valign=\"top\" colspan=\"2\"><textarea name=\"instrument_content\" cols=\"78\" rows=\"10\">$instrument_content</textarea></td>";
					print "</tr>";
        
					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";


					print "<tr>";
						print "<td colspan=\"1\"><strong>Language</strong></td>";
					print "</tr>";

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"lang_en\" value= \"1\" ";
						if ($lang_en == 1) print "checked";
						print ">&nbsp;&nbsp;English</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"lang_sp\" value= \"1\" ";
						if ($lang_sp == 1) print "checked";
						print ">&nbsp;&nbsp;Spanish</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"lang_other\" value= \"1\" ";
						if ($lang_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other (Specify ->) <input type=\"text\" name=\"lang_other_spec\" value=\"$lang_other_spec\" size=\"50\"></td>";
						print "<td>&nbsp;</td>";
					print "</tr>";
									
					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

				
					print "<tr>";						
						print "<td colspan=\"1\"><input type= \"checkbox\" name= \"tcec_tested\" value= \"1\" ";
						if ($tcec_tested == 1) print "checked";
						print ">&nbsp;&nbsp;<strong>TCEC Tested?</strong></td>";
					print "</tr>";
									
//					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
//						print "<td colspan=\"1\"><strong>Display this instrument to the Public?</strong></td>";
						
						print "<td colspan=\"1\"><input type= \"checkbox\" name= \"public_display\" value= \"1\" ";
						if ($public_display == 1) print "checked";
						print ">&nbsp;&nbsp;<strong>Display this instrument to the Public?</strong></td>";
					print "</tr>";
									
					print "<tr><td>&nbsp;</td></tr>";



//					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
//					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
					
					print "<tr>";
						print "<td align= \"left\"><input type= \"submit\" name= \"sub_instrument\" value= \"$submit\"></td>";
						print "<td align= \"left\"><input type= \"hidden\" name= \"instrument_id\" value= \"$instrumentID\">
						<a href=\"instrument_listing.php\">Go back to Instruments List without Making Changes</a></td>";
					print "</tr>";
										
				print "</table>";
				print "</form>";
				
			
			
			} // end Do Not Submit Information



		} // end if $dbok
	} // end if $fp = fopen
	
	?>
