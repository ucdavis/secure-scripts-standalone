<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

          <div id="breadcrumbs"><a href="index.php">Home</a> &raquo; Regional Training</div>
            
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
            
            <p>
            
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
            
            	<tr><td>&nbsp;</td></tr>
            
            </table>
		</p>



			</p>            

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
			     $fname = preg_replace($targets, $replaces, $fname);
	 
				if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "cns"))) 
				{
//						$train5_status = "open";
//						$q_limit = "SELECT * FROM training WHERE train5 = \"Costa\" ";
//						$r_limit = mysql_query($q_limit);
//						if (mysql_num_rows($r_limit) >= 43) $train5_status = "closed";
						
					$train_year = "2019";
				
				// Get head count for each location
				$q_train1 = "SELECT * FROM tcec_training WHERE train_date LIKE 1 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
				
				$q_train2 = "SELECT * FROM tcec_training WHERE train_date LIKE 2 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
				
				$q_train3 = "SELECT * FROM tcec_training WHERE train_date LIKE 3 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
				
				$q_train4 = "SELECT * FROM tcec_training WHERE train_date LIKE 4 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
				
				$q_train5 = "SELECT * FROM tcec_training WHERE train_date LIKE 5 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
				
				$q_train6 = "SELECT * FROM tcec_training WHERE train_date LIKE 6 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
				
				$q_train7 = "SELECT * FROM tcec_training WHERE train_date LIKE 7 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train8 = "SELECT * FROM tcec_training WHERE train_date LIKE 8 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train9 = "SELECT * FROM tcec_training WHERE train_date LIKE 9 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train10 = "SELECT * FROM tcec_training WHERE train_date LIKE 10 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train11 = "SELECT * FROM tcec_training WHERE train_date LIKE 11 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train12 = "SELECT * FROM tcec_training WHERE train_date LIKE 12 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train13 = "SELECT * FROM tcec_training WHERE train_date LIKE 13 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train14 = "SELECT * FROM tcec_training WHERE train_date LIKE 14 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
				$q_train15 = "SELECT * FROM tcec_training WHERE train_date LIKE 15 and train_year LIKE $train_year 
				and cancel LIKE 0 ";
					
//				$q_train8 = "SELECT * FROM tcec_training WHERE (train_date LIKE 8 or train_date LIKE 99) and train_year LIKE $train_year and cancel LIKE 0 ";
					
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
					$r_train11 = mysqli_query($link, $q_train11);
					$r_train12 = mysqli_query($link, $q_train12);
					$r_train13 = mysqli_query($link, $q_train13);
					$r_train14 = mysqli_query($link, $q_train14);
					$r_train15 = mysqli_query($link, $q_train15);
					
					$ct_train1 = mysqli_num_rows($r_train1);
					$ct_train2 = mysqli_num_rows($r_train2);
					$ct_train3 = mysqli_num_rows($r_train3);

					$ct_train4 = mysqli_num_rows($r_train4);
					$ct_train5 = mysqli_num_rows($r_train5);
					$ct_train6 = mysqli_num_rows($r_train6);
					$ct_train7 = mysqli_num_rows($r_train7);
					$ct_train8 = mysqli_num_rows($r_train8);
					$ct_train9 = mysqli_num_rows($r_train9);
					$ct_train10 = mysqli_num_rows($r_train10);
					$ct_train11 = mysqli_num_rows($r_train11);
					$ct_train12 = mysqli_num_rows($r_train12);
					$ct_train13 = mysqli_num_rows($r_train13);
					$ct_train14 = mysqli_num_rows($r_train14);
					$ct_train15 = mysqli_num_rows($r_train15);
					
					$capacity = 35;
					$sac_capacity = 30;
					$tehama_capacity = 25;
					
					$train1_ct = $sac_capacity - $ct_train1;
					$train2_ct = $capacity - $ct_train2;
					$train3_ct = $capacity - $ct_train3;
					$train4_ct = $capacity - $ct_train4;
					$train5_ct = $capacity - $ct_train5;
					$train6_ct = $capacity - $ct_train6;
					$train7_ct = $sac_capacity - $ct_train7;
					$train8_ct = $capacity - $ct_train8;
					$train9_ct = $capacity - $ct_train9;
					$train10_ct = $sac_capacity - $ct_train10;
					$train11_ct = $capacity - $ct_train11;
					$train12_ct = $capacity - $ct_train12;
					$train13_ct = $capacity - $ct_train13;
					$train14_ct = $capacity - $ct_train14;
					$train15_ct = $capacity - $ct_train15;
					
					print "<p><h4>Meeting Dates and Locations:</h4>";
					
					print "<table width= \"100%\" border= \"1\" cellpadding= \"2\" cellspacing= \"2\">";
						print "<tr>";
							print "<td><strong>Location</strong></td>";
							print "<td><strong>Date</strong></td>";
							print "<td align= \"center\"><strong>Current Headcount</strong></td>";
							print "<td align= \"center\"><strong>Export List</strong></td>";
						print "<tr>";
						
						print "<tr>";
							print "<td>Sacramento</td>";
							print "<td>June 14, 2019</td>";
							print "<td align= \"center\">$ct_train1</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std1\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train1\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>San Diego</td>";
							print "<td>July 11, 2019</td>";
							print "<td align= \"center\">$ct_train2</td>";
					// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std2\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train2\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Los Angeles</td>";
							print "<td>July 23, 2019</td>";
							print "<td align= \"center\">$ct_train3</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std3\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train3\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Fresno</td>";
							print "<td>August 1, 2019</td>";
							print "<td align= \"center\">$ct_train4</td>";
  							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std4\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train4\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Berkeley</td>";
							print "<td>August 7, 2019</td>";
							print "<td align= \"center\">$ct_train5</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std5\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train5\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Sacramento</td>";
							print "<td>August 13, 2019</td>";
							print "<td align= \"center\">$ct_train7</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std7\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train7\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Monterey</td>";
							print "<td>August 27, 2019</td>";
							print "<td align= \"center\">$ct_train6</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std6\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train6\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Redding</td>";
							print "<td>June 10, 2019</td>";
							print "<td align= \"center\">$ct_train8</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std8\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train8\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Riverside</td>";
							print "<td>September 16, 2019</td>";
							print "<td align= \"center\">$ct_train9</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std9\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train9\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
						print "<tr>";
							print "<td>Davis</td>";
							print "<td>September 24, 2019</td>";
							print "<td align= \"center\">$ct_train10</td>";
							// Export list button
							print "<td align= \"center\">";
								print "<FORM name= \"export_std10\" method= \"post\" action= \"rpt_export.php\">";
								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train10\">";
								print "</FORM>";
							print "</td>";
							
						print "</tr>";
		
//						print "<tr>";
//							print "<td>Red Bluff</td>";
//							print "<td>June 11, 2018</td>";
//							print "<td align= \"center\">$ct_train7</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std7\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train7\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Oxnard</td>";
//							print "<td>October 17, 2017</td>";
//							print "<td align= \"center\">$train8_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std8\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train8\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>San Diego</td>";
//							print "<td>October 23, 2017, 1 -3 pm</td>";
//							print "<td align= \"center\">$train14_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std14\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train14\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Los Angeles</td>";
//							print "<td>October 24, 2017, 10 -12pm</td>";
//							print "<td align= \"center\">$train12_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std12\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train12\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Lake Forest</td>";
//							print "<td>October 25, 2017, 10am-12pm</td>";
//							print "<td align= \"center\">$train9_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std9\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train9\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Santa Rosa</td>";
//							print "<td>October 27, 2017</td>";
//							print "<td align= \"center\">$train10_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std10\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train10\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Alpine County</td>";
//							print "<td>November 1, 2017</td>";
//							print "<td align= \"center\">$train15_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std15\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train15\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Monterey</td>";
//							print "<td>November 2, 2017</td>";
//							print "<td align= \"center\">$train11_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std11\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train11\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";
		
//						print "<tr>";
//							print "<td>Online</td>";
//							print "<td>TBA</td>";
//							print "<td align= \"center\">NA</td>";
	//							print "<td align= \"center\">$train7_ct</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std7\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train7\">";
//								print "</FORM>";
//							print "</td>";
					
//						print "</tr>";

//						print "<tr>";
//							print "<td>Online Course</td>";
//							print "<td>TBA</td>";
//							print "<td align= \"center\">NA</td>";
							// Export list button
//							print "<td align= \"center\">";
//								print "<FORM name= \"export_std8\" method= \"post\" action= \"rpt_export.php\">";
//								print "<INPUT TYPE= \"submit\" VALUE= \"Export to Excel\" name= \"$sub_export\">";
//								print "<input type= \"hidden\" name= \"q_train\" value= \"$q_train8\">";
//								print "</FORM>";
//							print "</td>";
							
//						print "</tr>";

					print "</table>";
		
				} // end if dbok
			} // end if fopen
		?>

</p>
            
            
            <h3><a href="regional_reg.php"><strong>Register Now!</strong></a></h3>
            
            <h3>A few weeks before the training, a confirmation email of the location (directions, parking or other information needed) will be sent to you. </h3>
            
            <h3>If you have any questions, please contact Catherine Dizon <a href="mailto:czdizon@ucdavis.edu">czdizon@ucdavis.edu</a> or 530-754-8317</h3>






