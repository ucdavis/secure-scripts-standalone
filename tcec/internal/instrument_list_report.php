<?php
session_start();
// no direct access
?>

<? include "../includes/internal_authentication.php"; ?>


<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

<!-- Start Main Content Column -->

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


			if ($sub_instrument == "Find Instruments")
			{
				$search_type = "";
				$type_list = "";
				$search_topic = "";
				$topic_list = "";
				$search_lang = "";
				$lang_list = "";
				$put_or = "";
				$topic_or = "";
				$lang_or = "";
				
				// build search criteria for language
				if ($lang_en == "1") 
				{
					$search_lang .= "lang_en LIKE \"1\" ";
					$lang_or = "1";
					$lang_list .= "English; ";
				}
		
				if ($lang_sp == "1") 
				{
					if ($lang_or == "1") $search_lang .= "OR ";
					$search_lang .= "lang_sp LIKE \"1\" ";
					$lang_or = "1";
					$lang_list .= "Spanish; ";
				}
		
				if ($lang_other == "1") 
				{
					if ($lang_or == "1") $search_lang .= "OR ";
					$search_lang .= "lang_other LIKE \"1\" ";
					$lang_or = "1";
					$lang_list .= "Other Language; ";
				}
		
				// build search criteria for type
				if ($type_education == "1") 
				{
					$search_type .= "type_education LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Education/Participant Survey; ";
				}
		
				if ($type_focus == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_focus LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Focus Group; ";
				}
		
				if ($type_kii == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_kii LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Key Informant Interview; ";
				}
		
				if ($type_media == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_media LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Media Activity Record; ";
				}
		
				if ($type_observe == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_observe LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Observation; ";
				}
		
				if ($type_policy == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_policy LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Policy Record; ";
				}
		
				if ($type_public == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_public LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Public Intercept Survey/Opinion Poll; ";
				}
		
				if ($type_purchase == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_purchase LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Tobacco Purchase Survey; ";
				}
		
				if ($type_other == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_other LIKE \"1\" ";
					$put_or = "1";
					$type_list .= "Other; ";
				}
				
				// build search criteria for topic
				
				if ($topic_activity == "1") 
				{
					$search_topic .= "topic_activity LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Activity Record; ";
				}
		
				if ($topic_ad == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_ad LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Advertising/Marketing/Signage; ";
				}
		
				if ($topic_behave == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_behave LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Behavioral Health/Mental Health/Healthcare Providers; ";
				}
		
				if ($topic_cessation == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_cessation LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Cessation; ";
				}
		
				if ($topic_community == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_community LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Community Engagement/Coalitions/Youth/Community Leaders; ";
				}
		
				if ($topic_flavor == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_flavor LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Flavored Tobacco Products; ";
				}
		
				if ($topic_general == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_general LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "General Plan; ";
				}
		
				if ($topic_equity == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_equity LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Health Equity/Priority Populations; ";
				}
		
				if ($topic_implement == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_implement LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Implementation; ";
				}
		
				if ($topic_law == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_law LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Law Enforcement; ";
				}
		
				if ($topic_litter == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_litter LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Litter; ";
				}
		
				if ($topic_home == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_home LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Multi-Unit Housing/Smokefree Homes; ";
				}
		
				if ($topic_package == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_package LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Price/Package/Volume/Size; ";
				}
		
				if ($topic_retail == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_retail LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Retail/Sale of Tobacco; ";
				}
		
				if ($topic_school == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_school LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Schools/Academic Institutions; ";
				}
		
				if ($topic_secondhand == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_secondhand LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Smoke-free/Secondhand Smoke; ";
				}
		
				if ($topic_thirdhand == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_thirdhand LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Thirdhand Smoke; ";
				}
		
				if ($topic_tobacco == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_tobacco LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Tobacco Use; ";
				}
		
				if ($topic_training == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_training LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Training/Education; ";
				}
				
				if ($topic_other == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_other LIKE \"1\" ";
					$topic_or = "1";
					$topic_list .= "Other; ";
				}
				

				// build query
				
				$q_instruments = "SELECT * FROM instrument_search WHERE public_display LIKE \"1\" ";
				if (strlen($search_type) > 0) $q_instruments .= "AND ($search_type) ";
				if (strlen($search_topic) > 0) $q_instruments .= "AND ($search_topic)";
				if (strlen($search_lang) > 0) $q_instruments .= "AND ($search_lang)";
				if ($tcec_tested == 1) $q_instruments .= "AND tcec_tested LIKE \"1\" ";
				
				$q_instruments .= " ORDER BY tcec_tested DESC, instrument_title";
				
				$q_rpt = stripslashes($q_instruments);
				$q_report = str_replace('"', '', $q_rpt);
					
//				print "$q_instruments <br>";
				
				$r_instruments = mysqli_query($link, $q_instruments);
				
				if (mysqli_num_rows($r_instruments) < 1) 
				{
					print "<h2><font color=\"#FF0000\">No resources were found.  Please try again.</font></h2>";			
				}
				else
				{

					$instrument_ct = "1";
					$font_color = "#4682b4";
					$tested_tool = "#FF0000";
					
					print "<h2><strong><font color=\"$font_color\">Instrument Search Results&nbsp;(<font color=\"$tested_tool\">*</font> = TCEC Tested Instrument)</font></strong></h2>"; 
					//  for Types $type_list and Topics $topic_list and $lang_list Language(s)
print "$q_report";
					print "<table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"100%\">";
					
					// Button to download spreadsheet of query
					print "<tr>";
						print "<td align= \"center\">";
							print "<FORM name= \"export_instruments\" method= \"post\" action= \"rpt_export.php\">";
							print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
							print "<input type= \"hidden\" name= \"q_report\" value= \"$q_report\">";
							print "</FORM>";
						print "</td>";
					print "</tr>";

					
					print "<tr>";
						print "<td valign= \"top\">&nbsp;</td>";
						print "<td valign= \"top\"><strong>Instrument Name</strong></td>";
						print "<td valign= \"top\"><strong>Language</strong></td>";
						print "<td valign= \"top\"><strong>Notes</strong></td>";
						print "<td valign= \"top\"><strong>Click to View</strong></td>";
					print "</tr>";
					
					
					while ($row_instruments = mysqli_fetch_array($r_instruments, MYSQLI_ASSOC))
					{
												
						$show_lang = "";
						$show_notes = "";
						
											
						if ($row_instruments[lang_en] == 1) $show_lang = "English ";
						if ($row_instruments[lang_sp] == 1) $show_lang .= "Spanish ";
						if ($row_instruments[lang_other] == 1) $show_lang .= "$row_instruments[lang_other_spec] ";
						
						if ($row_instruments[type_other_spec]) $show_notes .= "Type: $row_instruments[type_other_spec]<br> ";
						if ($row_instruments[topic_other_spec]) $show_notes .= "Topic: $row_instruments[topic_other_spec]<br> ";
						if ($row_instruments[instrument_content]) $show_notes .= "Content: $row_instruments[instrument_content]) ";
						
						print "<tr>";
							print "<td valign=\"top\">($instrument_ct)</td>";
							
							if ($row_instruments[tcec_tested] == 1)
							{
								print "<td valign= \"top\">";
									print "$row_instruments[instrument_title]&nbsp;<font color=\"$tested_tool\">*</font>";
								print "</td>";
							}
							else
							{
								print "<td valign= \"top\">";
									print "$row_instruments[instrument_title]";
								print "</td>";
							}
							
							print "<td valign=\"top\">";
								print "$show_lang";
							print "</td>";
							
							
							print "<td valign=\"top\">";
								// print "$row_instruments[instrument_content]";
								print "$show_notes";
							print "</td>";
							
							
							$fileDocLink = "openDoc.php?file_id=$row_instruments[instrument_hash]";

							if ($row_instruments[instrument_hash])
							{
								print "<td valign=\"top\"><a href= \"$fileDocLink\" target= \"_blank\">View Instrument</a></td>" ;
							}
							else
							{
								print "<td valign=\"top\">&nbsp;</td>";	
							}
							
						print "</tr>";
				
						print "<tr><td colspan = \"5\"><hr color=\"#dee6f2\" /></td></tr>";
						
						$instrument_ct++;
		
					} // end while
					
					print "<tr><td>&nbsp;</td></tr>";
//					print "<tr><td>&nbsp;</td></tr>";
					
					print "</table>";

				} // end else q_instruments
				
//				print "<p>&nbsp;</p>";
//				print "<p>&nbsp;</p>";
				
//				print "<p><a href=\"instrument_lookup.php\">Return to Instrument Lookup Search Criteria</a></p>";

			
			} // end Find Instruments
			
			

			if (!$sub_instrument_lookup)
			{
				
				print "<h2>Select desired Types and Topics and click \"Find Instruments\"</h2>";
				
				
				print "<form name= \"find_instruments\" method= \"post\" action= \"instrument_list_report.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";
				
					
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Select Instrument Type(s)</strong></td>";
					print "</tr>";
					
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
						print ">&nbsp;&nbsp;Other</td>";
					print "</tr>";
					
					print "<tr>";						
//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_alumni\" value= \"1\" ";
//						if ($hear_alumni == 1) print "checked";
//						print ">&nbsp;&nbsp;Satisfaction Survey</td>";						
					print "</tr>";

					
					print "<tr><td>&nbsp;</td></tr>";
					
					
					
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Select Instrument Topic(s)</strong></td>";
					print "</tr>";
					
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
						print "<td><input type= \"checkbox\" name= \"topic_secondhand\" value= \"1\" ";
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
						print ">&nbsp;&nbsp;Other</td>";
//						print "<td>&nbsp;</td>";
					print "</tr>";
									
					print "<tr><td>&nbsp;</td></tr>";


					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Select Language(s)</strong></td>";
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
						print ">&nbsp;&nbsp;Other</td>";
					print "</tr>";
									

					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"tcec_tested\" value= \"1\" ";
						if ($tcec_tested == 1) print "checked";
						print ">&nbsp;&nbsp;<strong>Only Display Instruments that have been tested by TCEC?</strong></td>";
					print "</tr>";
									

					print "<tr><td>&nbsp;</td></tr>";
					
					
					print "<tr>";
						print "<td align= \"left\"><input type= \"submit\" name= \"sub_instrument\" value= \"Find Instruments\"></td>";
					print "</tr>";
										
				print "</table>";
				print "</form>";
				
			
			
			} // end Do Not Submit Information



		} // end if $dbok
	} // end if $fp = fopen
	
	?>
    
