<?php
//include "../includes/tcec_authentication.php"; 
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


	<p><font color="#002666" style="font-size:13px; font-weight:bold">Instrument Search</font></p>


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
	$type_education = "";
	$type_focus = "";
	$type_kii = "";
	$type_media = "";
	$type_observe = "";
	$type_policy = "";
	$type_public = "";
	$type_purchase = "";
	$type_other = "";
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

	$sub_instrument = "";
	
	if(isset($_POST['sub_instrument'])) $sub_instrument = $_POST['sub_instrument'];
	if(isset($_POST['instrument_id'])) $instrument_id = $_POST['instrument_id'];
	if(isset($_POST['instrument_title'])) $instrument_title = $_POST['instrument_title'];
	if(isset($_POST['instrument_url'])) $instrument_url = $_POST['instrument_url'];
	if(isset($_POST['instrument_web'])) $instrument_web = $_POST['instrument_web'];
	if(isset($_POST['instrument_doc'])) $instrument_doc = $_POST['instrument_doc'];
	if(isset($_POST['instrument_content'])) $instrument_content = $_POST['instrument_content'];
	if(isset($_POST['public_display'])) $public_display = $_POST['public_display'];

	if(isset($_POST['type_education'])) $type_education = $_POST['type_education'];
	if(isset($_POST['type_focus'])) $type_focus = $_POST['type_focus'];
	if(isset($_POST['type_kii'])) $type_kii = $_POST['type_kii'];
	if(isset($_POST['type_media'])) $type_media = $_POST['type_media'];
	if(isset($_POST['type_observe'])) $type_observe = $_POST['type_observe'];
	if(isset($_POST['type_policy'])) $type_policy = $_POST['type_policy'];
	if(isset($_POST['type_public'])) $type_public = $_POST['type_public'];
	if(isset($_POST['type_purchase'])) $type_purchase = $_POST['type_purchase'];
	if(isset($_POST['type_other'])) $type_other = $_POST['type_other'];

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
				$put_or = "";
				$topic_or = "";
				
				// build search criteria for type
				if ($type_education == "1") 
				{
					$search_type .= "type_education = \"1\" ";
					$put_or = "1";
					$type_list .= "Education/Participant Survey; ";
				}
		
				if ($type_focus == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_focus = \"1\" ";
					$put_or = "1";
					$type_list .= "Focus Group; ";
				}
		
				if ($type_kii == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_kii = \"1\" ";
					$put_or = "1";
					$type_list .= "Key Informant Interview; ";
				}
		
				if ($type_media == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_media = \"1\" ";
					$put_or = "1";
					$type_list .= "Media Activity Record; ";
				}
		
				if ($type_observe == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_observe = \"1\" ";
					$put_or = "1";
					$type_list .= "Observation; ";
				}
		
				if ($type_policy == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_policy = \"1\" ";
					$put_or = "1";
					$type_list .= "Policy Record; ";
				}
		
				if ($type_public == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_public = \"1\" ";
					$put_or = "1";
					$type_list .= "Public Intercept Survey/Opinion Poll; ";
				}
		
				if ($type_purchase == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_purchase = \"1\" ";
					$put_or = "1";
					$type_list .= "Tobacco Purchase Survey; ";
				}
		
				if ($type_other == "1") 
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_other = \"1\" ";
					$put_or = "1";
					$type_list .= "Other; ";
				}
				
				// build search criteria for topic
				
				if ($topic_ad == "1") 
				{
					$search_topic .= "topic_ad = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Advertising/Marketing/Signage; ";
				}
		
				if ($topic_behave == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_behave = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Behavioral Health/Mental Health/Healthcare Providers; ";
				}
		
				if ($topic_cessation == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_cessation = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Cessation; ";
				}
		
				if ($topic_community == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_community = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Community Engagement/Coalitions/Youth/Community Leaders; ";
				}
		
				if ($topic_flavor == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_flavor = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Flavored Tobacco Products; ";
				}
		
				if ($topic_general == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_general = \"1\" ";
					$topic_or = "1";
					$topic_list .= "General Plan; ";
				}
		
				if ($topic_equity == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_equity = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Health Equity/Priority Populations; ";
				}
		
				if ($topic_law == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_law = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Law Enforcement; ";
				}
		
				if ($topic_litter == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_litter = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Litter; ";
				}
		
				if ($topic_home == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_home = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Multi-Unit Housing/Smokefree Homes; ";
				}
		
				if ($topic_package == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_package = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Price/Package/Volume/Size; ";
				}
		
				if ($topic_retail == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_retail = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Retail/Sale of Tobacco; ";
				}
		
				if ($topic_school == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_school = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Schools/Academic Institutions; ";
				}
		
				if ($topic_secondhand == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_secondhand = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Smoke-free/Secondhand Smoke; ";
				}
		
				if ($topic_thirdhand == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_thirdhand = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Thirdhand Smoke; ";
				}
		
				if ($topic_tobacco == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_tobacco = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Tobacco Use; ";
				}
		
				if ($topic_training == "1") 
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_training = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Training/Education; ";
				}
				

				// build query
				
				$q_instruments = "SELECT * FROM instrument_search WHERE public_display = \"1\" ";
				if (strlen($search_type) > 0) $q_instruments .= "AND ($search_type) ";
				if (strlen($search_topic) > 0) $q_instruments .= "AND ($search_topic)";
					
//				print "$q_instruments <br>";
				
				$r_instruments = mysqli_query($link, $q_instruments);
				
				if (mysqli_num_rows($r_instruments) < 1) 
				{
					print "<p>No resources were found.  Please try again.</p>";			
				}
				else
				{

					print "<p><strong>Search results for Types $type_list and Topics $topic_list</strong></p>";

					print "<table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"20%\">";
					
					$instrument_ct = "1";
					
					while ($row_instruments = mysqli_fetch_array($r_instruments, MYSQLI_ASSOC))
					{
						print "<tr>";
							print "<td valign=\"top\">$instrument_ct</td>";
							
							print "<td valign= \"top\">";
								print "<strong>$row_instruments[instrument_title]</strong>";
							print "</td>";
							
							$fileDocLink = "openDoc.php?file_id=$row_instruments[instrument_hash]";

							if ($row_instruments[instrument_hash])
							{
								print "<td valign=\"top\"><a href= \"$fileDocLink\" target= \"_blank\">View Instrument Document</a></td>" ;
							}
							else
							{
								print "<td valign=\"top\">&nbsp;</td>";	
							}
							
						print "</tr>";
				
						print "<tr><td colspan = \"3\"><hr color=\"#dee6f2\" /></td></tr>";
						
						$instrument_ct++;
		
					} // end while
					
					print "<tr><td>&nbsp;</td></tr>";
					print "<tr><td>&nbsp;</td></tr>";
					
					print "</table>";

				} // end else q_instruments
				
				print "<p>&nbsp;</p>";
				print "<p>&nbsp;</p>";
				
				print "<p><a href=\"instrument_lookup.php\">Return to Instrument Lookup Search Criteria</a></p>";

			
			} // end Find Instruments
			
			

			if (!$sub_instrument)
			{
				
				print "<h3>Select desired Types and Topics and click \"Find Instruments\"</h3>";
				
				
				print "<form name= \"find_instruments\" method= \"post\" action= \"instrument_lookup.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";
				
					
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>Select Instrument Type(s)</b></td>";
					print "</tr>";
					

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_education\" value= \"1\" ";
						if ($type_education == 1) print "checked";
						print ">&nbsp;&nbsp;Education/Participant Survey</td>";

						print "<td><input type= \"checkbox\" name= \"type_focus\" value= \"1\" ";
						if ($type_focus == 1) print "checked";
						print ">&nbsp;&nbsp;Focus Group</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_kii\" value= \"1\" ";
						if ($type_kii == 1) print "checked";
						print ">&nbsp;&nbsp;Key Informant Interview</td>";

						print "<td><input type= \"checkbox\" name= \"type_media\" value= \"1\" ";
						if ($type_media == 1) print "checked";
						print ">&nbsp;&nbsp;Media Activity Record</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_observe\" value= \"1\" ";
						if ($type_observe == 1) print "checked";
						print ">&nbsp;&nbsp;Observation</td>";

						print "<td><input type= \"checkbox\" name= \"type_policy\" value= \"1\" ";
						if ($type_policy == 1) print "checked";
						print ">&nbsp;&nbsp;Policy Record</td>";
					print "</tr>";
									
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"type_public\" value= \"1\" ";
						if ($type_public == 1) print "checked";
						print ">&nbsp;&nbsp;Public Intercept Survey/Opinion Poll</td>";

						print "<td><input type= \"checkbox\" name= \"type_purchase\" value= \"1\" ";
						if ($type_purchase == 1) print "checked";
						print ">&nbsp;&nbsp;Tobacco Purchase Survey</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"type_other\" value= \"1\" ";
						if ($type_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other</td>";
						
//						print "<td class= \"recruit\"><input type= \"checkbox\" name= \"hear_alumni\" value= \"1\" ";
//						if ($hear_alumni == 1) print "checked";
//						print ">&nbsp;&nbsp;Satisfaction Survey</td>";
						print "<td>&nbsp;</td>";						
					print "</tr>";

					
					print "<tr><td>&nbsp;</td></tr>";
					
					print "<tr><td>&nbsp;</td></tr>";
					
					
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><b>Select Instrument Topic(s)</b></td>";
					print "</tr>";
					

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_ad\" value= \"1\" ";
						if ($topic_ad == 1) print "checked";
						print ">&nbsp;&nbsp;Advertising/Marketing/Signage</td>";

						print "<td><input type= \"checkbox\" name= \"topic_behave\" value= \"1\" ";
						if ($topic_behave == 1) print "checked";
						print ">&nbsp;&nbsp;Behavioral Health/Mental Health/Healthcare Providers</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_cessation\" value= \"1\" ";
						if ($topic_cessation == 1) print "checked";
						print ">&nbsp;&nbsp;Cessation</td>";

						print "<td><input type= \"checkbox\" name= \"topic_community\" value= \"1\" ";
						if ($topic_community == 1) print "checked";
						print ">&nbsp;&nbsp;Community Engagement/Coalitions/Youth/Community Leaders</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_flavor\" value= \"1\" ";
						if ($topic_flavor == 1) print "checked";
						print ">&nbsp;&nbsp;Flavored Tobacco Products</td>";

						print "<td><input type= \"checkbox\" name= \"topic_general\" value= \"1\" ";
						if ($topic_general == 1) print "checked";
						print ">&nbsp;&nbsp;General Plan</td>";
					print "</tr>";
									
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_equity\" value= \"1\" ";
						if ($topic_equity == 1) print "checked";
						print ">&nbsp;&nbsp;Health Equity/Priority Populations</td>";

						print "<td><input type= \"checkbox\" name= \"topic_law\" value= \"1\" ";
						if ($topic_law == 1) print "checked";
						print ">&nbsp;&nbsp;Law Enforcement</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_litter\" value= \"1\" ";
						if ($topic_litter == 1) print "checked";
						print ">&nbsp;&nbsp;Litter</td>";

						print "<td><input type= \"checkbox\" name= \"topic_home\" value= \"1\" ";
						if ($topic_home == 1) print "checked";
						print ">&nbsp;&nbsp;Multi-Unit Housing/Smokefree Homes</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_package\" value= \"1\" ";
						if ($topic_package == 1) print "checked";
						print ">&nbsp;&nbsp;Price/Package/Volume Size</td>";

						print "<td><input type= \"checkbox\" name= \"topic_retail\" value= \"1\" ";
						if ($topic_retail == 1) print "checked";
						print ">&nbsp;&nbsp;Retail/Sale of Tobacco (price, pack/volume size, density, zoning)</td>";
					print "</tr>";
									

					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_school\" value= \"1\" ";
						if ($topic_school == 1) print "checked";
						print ">&nbsp;&nbsp;Schools/Academic Institutions</td>";

						print "<td><input type= \"checkbox\" name= \"topic_secondhand\" value= \"1\" ";
						if ($topic_secondhand == 1) print "checked";
						print ">&nbsp;&nbsp;Smoke-free/Secondhand Smoke (dining, parks, non-recreational public areas, taxi, rental cars, Uber, Lyft, casinos, hotels)</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_thirdhand\" value= \"1\" ";
						if ($topic_thirdhand == 1) print "checked";
						print ">&nbsp;&nbsp;Thirdhand Smoke</td>";

						print "<td><input type= \"checkbox\" name= \"topic_tobacco\" value= \"1\" ";
						if ($topic_tobacco == 1) print "checked";
						print ">&nbsp;&nbsp;Tobacco Use (ESDs, smokeless, emerging products)</td>";
					print "</tr>";
									
					print "<tr>";
						print "<td><input type= \"checkbox\" name= \"topic_training\" value= \"1\" ";
						if ($topic_training == 1) print "checked";
						print ">&nbsp;&nbsp;Training/Education</td>";

//						print "<td><input type= \"checkbox\" name= \"topic_behave\" value= \"1\" ";
//						if ($topic_behave == 1) print "checked";
//						print ">&nbsp;&nbsp;Behavioral Health/Mental Health/Healthcare Providers</td>";
						print "<td>&nbsp;</td>";
					print "</tr>";
									
					print "<tr><td>&nbsp;</td></tr>";
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
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- content -->

 
<!-- End Main Content Col -->
 
</body>
</html>
 


