<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

			  <div id="content">
				  <div id="content_inner">
				    <h1>Regional Training Meetings Hosted by TCEC</h1>

            <h2>Cultural Humility:  Opportunities through Evaluation</h2>
            
            <h2>Join us for an interactive session encourages lively discussion and uses thoughtful exercises to engage participants in the topic of cultural humility in tobacco control evaluation.  We'll practice incorporating cultural humility in evaluation by exploring assumptions, implicit bias, and power dynamics; review how these may affect our work, and craft concrete steps to cultivate cultural humility moving forward.
 
</h2>
            
            <h3>
            Learning Objectives:
			<ol>
            <li>Apply the evaluation life cycle</li>
			<li>Recognize the need for cultural humility</li>
			<li>Justify cultural humility in evaluation life cycle</li>
            <li>Discuss opportunities in various communities</li>
            <li>Plan for a space to incorporate cultural humility into future work</li><br>
            </ol>
            
            <strong>Intended Audience:</strong><br><br>
            Everyone!  Everyone that engages in evaluation, which is everyone, is welcome to attend - project directors, evaluators, internal and external staff, coalition members, etc.  
            We will add additional dates and locations as needed.<br><br>
            
            <strong>Special Guests:</strong><br><br>
            Each training will include facetime and a section facilitated by our Statewide Coordinating Centers: AMPLIFY!, African American and Black Coordinating Center; American Indian Coordinating Center; SPARC, Pacific Islander and Asian American Coordinating Center, Hispanic Latino Coordinating Center; Rural Coordinating Center; and We Breathe, LGBTQ Coordinating Center.
            
            </h3>
            
            <h3>
            
            <table border="0" cellspacing="10" cellpadding="5" width="40%">
            	<tr>
                	<th colspan="3" align="left"><strong>Agenda:</strong></th>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                	<td align="right">8:00 am</td>
                    <td>&nbsp;</td>
                    <td> - Registration and Breakfast</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">8:30 am</td>
                    <td>&nbsp;</td>
                    <td> - Introductions and Community Agreements</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">9:00 am</td>
                    <td>&nbsp;</td>
                    <td> - Evaluation Life Cycle and Cultural Humility</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">10:00 am</td>
                    <td>&nbsp;</td>
                    <td> - Audience and Lenses</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">10:30 am</td>
                    <td>&nbsp;</td>
                    <td> - Break</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">10:45 am</td>
                    <td>&nbsp;</td>
                    <td> - Privilege and Power</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">11:30 am</td>
                    <td>&nbsp;</td>
                    <td> - Self-Reflection</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">12:45 pm</td>
                    <td>&nbsp;</td>
                    <td> - Lunch</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">1:30 pm</td>
                    <td>&nbsp;</td>
                    <td> - Opportunities and Resources in Various Communities</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">3:00 pm</td>
                    <td>&nbsp;</td>
                    <td> - Action Plans and Wrap up</td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
            
            	<tr>
                	<td align="right">3:30 pm</td>
                    <td>&nbsp;</td>
                    <td> - Questions and Office Hours</td>
                </tr>
            
<!--            	<tr><td>&nbsp;</td></tr> -->
            
            </table>
		</h3>
        
</div>
            
            
            
            
            
<!--            <p>There will also be extra time (optional) afterward to meet with TCEC staff if you would like individualized consultation. It will be the Friday after the PDM in the same location.  Hotel information is detailed on the PDM registration website.</p>
            
            <p>Registration is free and lunch is included. <strong>Please register early to save your spot!</strong>  For those who cannot attend in-person, a webinar will be provided at a later date. </p> -->
            
            
<?php  

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
				 $fname = filter_var($fname, FILTER_SANITIZE_STRING);
	 
				if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "cns"))) 
				{
//						$train5_status = "open";
//						$q_limit = "SELECT * FROM training WHERE train5 = \"Costa\" ";
//						$r_limit = mysql_query($q_limit);
//						if (mysql_num_rows($r_limit) >= 43) $train5_status = "closed";
						
				$train_year = "2019";
				// Get head count for each location
					$q_train1 = "SELECT * FROM tcec_training WHERE train_date LIKE \"1\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train2 = "SELECT * FROM tcec_training WHERE train_date LIKE \"2\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train3 = "SELECT * FROM tcec_training WHERE train_date LIKE \"3\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train4 = "SELECT * FROM tcec_training WHERE train_date LIKE \"4\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train5 = "SELECT * FROM tcec_training WHERE train_date LIKE \"5\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train6 = "SELECT * FROM tcec_training WHERE train_date LIKE \"6\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train7 = "SELECT * FROM tcec_training WHERE train_date LIKE \"7\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train8 = "SELECT * FROM tcec_training WHERE train_date LIKE \"8\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train9 = "SELECT * FROM tcec_training WHERE train_date LIKE \"9\" and train_year LIKE $train_year and cancel = \"0\" ";
					$q_train10 = "SELECT * FROM tcec_training WHERE train_date LIKE \"10\" and train_year LIKE $train_year and cancel = \"0\" ";
					
					$r_train1 = mysqli_query($link, $q_train1);
					$r_train2 = mysqli_query($link, $q_train2);
					$r_train3 = mysqli_query($link, $q_train3);
					$r_train4 = mysqli_query($link, $q_train4);
					$r_train5 = mysqli_query($link, $q_train5);
					$r_train6 = mysqli_query($link, $q_train6);
					$r_train7 = mysqli_query($link, $q_train7);
					$r_train8 = mysqli_query($link, $q_train8);
					$r_train9 = mysqli_query($link, $q_train9);
					$r_train10 = mysqli_query($link, $q_train10);
					
					$ct_train1 = mysqli_num_rows($r_train1);
					$ct_train2 = mysqli_num_rows($r_train2);
					$ct_train3 = mysqli_num_rows($r_train3);
					$ct_train4 = mysqli_num_rows($r_train4);
					$ct_train5 = mysqli_num_rows($r_train5);
					$ct_train6 = mysqli_num_rows($r_train6);
					$ct_train7 = mysqli_num_rows($r_train7);
					$ct_train8 = mysqli_num_rows($r_train8);
					$ct_train10 = mysqli_num_rows($r_train10);
					
					$capacity = 35;
					$sac_capacity = 30;
					$sac2_capacity = 26;
					
					$train1_ct = $sac_capacity - $ct_train1;
					if ($train1_ct < 0) $train1_ct = 0;
					
					$train2_ct = $capacity - $ct_train2;
					if ($train2_ct < 0) $train2_ct = 0;
					
					$train3_ct = $capacity - $ct_train3;  
					if ($train3_ct < 0) $train3_ct = 0;
					
					$train4_ct = $capacity - $ct_train4;
					if ($train4_ct < 0) $train5_ct = 0;
					
					$train5_ct = $capacity - $ct_train5;
					if ($train5_ct < 0) $train5_ct = 0;
					
					$train6_ct = $capacity - $ct_train6;
					if ($train6_ct < 0) $train6_ct = 0;
					
					$train7_ct = $sac2_capacity - $ct_train7;
					if ($train7_ct < 0) $train7_ct = 0;
					
					$train8_ct = $capacity - $ct_train8;
					if ($train8_ct < 0) $train8_ct = 0;
					
					$train9_ct = $capacity - $ct_train9;
					if ($train9_ct < 0) $train9_ct = 0;
					
					$train10_ct = $sac_capacity - $ct_train10;
					if ($train10_ct < 0) $train10_ct = 0;
					
					print "<h4>Meeting Date and Location:</h4>";
					
					print "<p>";
					
					print "<table width= \"70%\" border= \"1\" cellpadding= \"2\" cellspacing= \"2\">";
						print "<tr>";
							print "<td><strong>City</strong></td>";
							print "<td><strong>Location</strong></td>";
							print "<td><strong>Date</strong></td>";
							print "<td align= \"center\"><strong>Available Seats</strong></td>";
						print "<tr>";
						
						//print "<tr>";
						//	print "<td>Sacramento</td>";
						//	print "<td>The California Endowment</td>";
						//	print "<td>June 14, 2019</td>";
						//	print "<td align= \"center\">$train1_ct</td>";
						//print "</tr>";
						
//						print "<tr>";
//							print "<td colspan=\"3\">";
//								print "<ol>";
//								print "<li>Distance learning option about the new reporting guidelines and expectations.</li>";
//								print "<li>2-part webinar for those that cannot attend the in-person training or want a refresher</li>";
//								print "<li><a href=\"http://tobaccoeval.ucdavis.edu/training/regional_reg.php\">Click here to register for Distance Learning</a></li>";
//								print "</ol>";
//							print "</td>";
//						print "</tr>";

		
//						print "<tr>";
//							print "<td>San Diego</td>";
//							print "<td>County Operations Center</td>";
//							print "<td>July 11, 2019</td>";
//							print "<td align= \"center\">$train2_ct</td>";
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Los Angeles</td>";
//							print "<td>LA County Department of Public Health</td>";
//							print "<td>July 23, 2019</td>";
//							print "<td align= \"center\">$train3_ct</td>";
//						print "</tr>";
		
						print "<tr>";
							print "<td>Fresno</td>";
							print "<td>California Health Collaborative</td>";
							print "<td>August 1, 2019</td>";
							print "<td align= \"center\">$train4_ct</td>";
						print "</tr>";
		
						print "<tr>";
							print "<td>Berkeley</td>";
							print "<td>City of Berkeley</td>";
							print "<td>August 7, 2019</td>";
							print "<td align= \"center\">$train5_ct</td>";
						print "</tr>";
		
						print "<tr>";
							print "<td>Sacramento</td>";
							print "<td>The California Endowment</td>";
							print "<td>August 13, 2019</td>";
							print "<td align= \"center\">$train7_ct</td>";
						print "</tr>";

						print "<tr>";
							print "<td>Monterey</td>";
							print "<td>Monterey County Health Department</td>";
							print "<td>August 27, 2019</td>";
							print "<td align= \"center\">$train6_ct</td>";
						print "</tr>";
		
						print "<tr>";
							print "<td>Riverside</td>";
							print "<td>Riverside County EMS Agency</td>";
 							print "<td>September 16, 2019</td>";
							print "<td align= \"center\">$train9_ct</td>";
						print "</tr>";
		
						print "<tr>";
							print "<td>Davis</td>";
							print "<td>UC Davis Conference Center</td>";
 							print "<td>September 24, 2019</td>";
							print "<td align= \"center\">$train10_ct</td>";
						print "</tr>";
		
//						print "<tr>";
//							print "<td>Red Bluff</td>";
//							print "<td>Sonoma County Dept. of Health Services</td>";
//							print "<td>June 11, 2018</td>";
//							print "<td align= \"center\">$train7_ct</td>";
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Online Course</td>";
//							print "<td>April 14, 2014 @ 1:30pm</td>";
//							print "<td align= \"center\">$train8_ct</td>";
//							print "<td align= \"center\">NA</td>";
//						print "</tr>";
		
					print "</table>";
					
					print "</p>";
		
				} // end if dbok
			} // end if fopen
		?>

			<p>&nbsp;</p>

	        <h3>
			<a href="regional_reg.php"><strong>Please register here</strong></a>
    	    </h3>


            <h3>
                <table border="0" style="margin-left:25px">
                	<tr>
                    	<td><strong>Topic:</strong></td>
                        <td><font color="#dc3c01"><strong>Cultural Humility:  Opportunities through Evaluation</strong></font></td>
                    </tr>
                    
                    
                    <tr><td>&nbsp;</td></tr>
                    
                	<tr>
                    	<td><strong>Registration:</strong></td>
<!--                        <td><strong>Coming Soon</strong></td> -->
                        <td><strong><a href="regional_reg.php">http://tobaccoeval.ucdavis.edu/training/regional_reg.php</a></strong></td> 
                    </tr>
                 </table>
				

                </strong>
            </h3>

            <h3>Please contact Diana Dmitrevsky at ddmitrevsky@ucdavis.edu or (530) 752-9951 for more information. </h3>
            
            <p>



<!--            <ul>
            		<li>Redding - June 13, 2016</li>
                    <li>Sacramento - June 22, 2016</li>
                    <li>Salinas - June 29, 2016</li>
                    <li>Santa Ana - July 8, 2016</li>
                    <li>Fresno - July 14, 2016</li>
                    <li>Santa Rose - July 15, 201 </li>
                    <li>Online - TBA</li>
            </ul> -->
</p>
            
            
<!--            <p>
            A few weeks before the training, a confirmation email of the location (directions, parking or other information needed) and a survey that needs to be filled out prior to training, will be sent to you.
            </p> -->


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>



          </div>
	    </div>
