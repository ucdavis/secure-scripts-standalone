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
if ($fp = fopen("/var/www/non_www/.my.cnf", "r")) {
    while (! feof($fp)) {
        $line = fgets($fp, 4096);
        if (preg_match("/password=(\\w+)/", $line, $found)) $password = $found[1];
        elseif (preg_match("/user=(\\w+)/", $line, $found)) $user_name = $found[1];
        elseif (preg_match("/host=([\\w\\.]+)/", $line, $found)) $host_name = $found[1];
    }
    fclose($fp);
	$dbok = ($link = new mysqli($host_name, $user_name, $password, "cns"));
}
?>

<!--<span class="contentHead">Faculty</span> -->
      <P>
<?php
	if ($dbok) {
		$q_instrument = "SELECT * FROM instrument_search ORDER BY public_display DESC, instrument_title";
		if ($r_instrument = mysqli_query($link, $q_instrument)) {
?>
      <TABLE border="0" cellspacing="10" cellpadding="10" width="100%">
      
<?php
			$instrument_ct = 1;
			$no_show = 0;
						
			print "<tr><td colspan=\"4\">Instruments Displayed to the Public</td></tr>";

	      	print "<tr>";
    	    	print "<td>&nbsp;</td>";
        	    print "<td><strong>Instrument Title</strong></td>";
            	print "<td><strong>Type(s)</strong></td>";
				print "<td><strong>View Document</strong></td>";
	            print "<td><strong>Update Instrument</strong></td>";
    	    print "</tr>";


			while ($row_instrument = mysqli_fetch_array($r_instrument, MYSQLI_ASSOC)) 
			{
				$type_string = "";
				
				$id = $row_instrument["instrument_id"];
				$instrument_title = $row_instrument["instrument_title"];
				$type_education = $row_instrument["type_education"];
				$type_focus = $row_instrument["type_focus"];
				$type_kii = $row_instrument["type_kii"];
				$type_media = $row_instrument["type_media"];
				$type_observe = $row_instrument["type_observe"];
				$type_policy = $row_instrument["type_policy"];
				$type_public = $row_instrument["type_public"];
				$type_purchase = $row_instrument["type_purchase"];
				$type_other = $row_instrument["type_other"];
				$public_display = $row_instrument["public_display"];
				$instrument_hash = $row_instrument["instrument_hash"];
				
				$fileDocLink = "openDoc.php?file_id=$instrument_hash";
				
				if ($type_education == "1") $type_string .= "Education/Participant Survey;&nbsp;";
				if ($type_focus == "1") $type_string .= "Focus Group;&nbsp;";
				if ($type_kii == "1") $type_string .= "Key Informant Interview;&nbsp;";
				if ($type_media == "1") $type_string .= "Medica Activity Record;&nbsp;";
				if ($type_observe == "1") $type_string .= "Observation;&nbsp;";
				if ($type_policy == "1") $type_string .= "Policy Record;&nbsp;";
				if ($type_public == "1") $type_string .= "Public Interest Survey/Opinion Poll;&nbsp;";
				if ($type_purchase == "1") $type_string .= "Tobacco Purchase Survey;&nbsp;";
				if ($type_other == "1") $type_string .= "Other;&nbsp;";
				
				if (($public_display <> "1") && ($no_show == "0"))
				{
					$no_show = 1;
					$instrument_ct = 1;
					print "<tr><td>&nbsp;</td></tr>";
					print "<tr><td colspan=\"4\"><h2>Instruments Not Displayed to the Public<h2><p>&nbsp;</p></td></tr>";
					
			      	print "<tr>";
		    	    	print "<td>&nbsp;</td>";
        			    print "<td><strong>Instrument Title</strong></td>";
		            	print "<td><strong>Type(s)</strong></td>";
						print "<td><strong>View Document</strong></td>";
	    		        print "<td><strong>Update Instrument</strong></td>";
		    	    print "</tr>";
				}
				
				print "<tr>";
					print "<td valign=\"top\">($instrument_ct)</td>";
					print "<td valign=\"top\">$instrument_title</td>" ;
					print "<td valign=\"top\">$type_string</td>" ;
					
					if ($instrument_hash)
					{
						print "<td valign=\"top\"><a href= \"$fileDocLink\" target= \"_blank\">View Instrument Document</a></td>" ;
					}
					else
					{
						print "<td valign=\"top\">&nbsp;</td>";	
					}
					
					print "<td valign=\"top\">";
						print "<form name= \"instrument_view\" method=\"post\" action=\"instrument_search.php\">";
						print "<input type= \"submit\" name= \"sub_instrument\" value= \"Edit Instrument\">";
						print "<input type= \"hidden\" name= \"iid\" value= \"$id\">";
						print "</form>";
					print "</td>";
				print "<tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				$instrument_ct++;
			}
			
			print "<tr><td>&nbsp;</td></tr>";
			print "<tr><td>&nbsp;</td></tr>";

?>
       
      </TABLE>

<?php
	
	print "<p>";
		print "<form name= \"add_instrument\" method=\"post\" action=\"instrument_search.php\">";
		print "<input type= \"submit\" name= \"new_instrument\" value= \"Add New Instrument\">";
		print "</form>";
	print "</p>";

?>

<?php
		} // if r_news
		
		else
		{
			print "No News Features to Display";	
		}

	} // dbok
?>
    
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- content -->

 
<!-- End Main Content Col -->
 
</body>
</html>
 


