<?php
// include "../includes/tcec_authentication.php"; 
// no direct access
?>
<!DOCTYPE html>
<html class=""><!-- InstanceBegin template="/Templates/intranetBase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<!--<![endif]--><head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


<? 
// $__ROOTDIR = basename(dirname(__FILE__)); 
require_once "../../config.inc.php";
?>

<!-- InstanceBeginEditable name="page_title" -->
<title>Department of Public Health Sciences - UC Davis School of Medicine</title>
<!-- InstanceEndEditable -->


<!-- Comment this include for the admin/faculty_xxx.php pages --> 
<!-- InstanceBeginEditable name="cas_auth" -->
<? // include "../../includes/cas_auth.php"; ?>
<!-- InstanceEndEditable -->


<? include "../../includes/css_scripts.php"; ?>

<? include "../../includes/meta_info.php"; ?> 

<!-- Start Analytics Tags -->
<? include "../../includes/analytics.php"; ?>
<!-- End Analytics Tags -->
</head>

<body>
    <div class="gridContainer clearfix">
    
	  <div id="LayoutTitle">
  		<? include "../../includes/top_header.php"; ?>
	  </div> <!-- end Layout Title -->

	  <div id="LayoutMainMenu">
	  	<!-- responsive menu -->
		<div id='topcssmenu'>
			<div id='cssmenu'>
			<!--  Top Menu -->
				<? include "../../includes/top_menu.php"; ?>	
			<!--  End Top Menu -->  
			</div> <!-- cssmenu -->
		</div> <!-- topcssmenu -->  
		<!-- end responsive menu -->
	  </div> <!-- end LayoutMainMenu -->
      
      <div style="margin-top:0px;">&nbsp;</div>

  

        <div id="LayoutDiv1">
        <div id="phsContent">
		
		<!-- InstanceBeginEditable name="mainContent" -->
<script>
<!--
function wopen(url, name, w, h)
{
// Fudge factors for window decoration space.
 // In my tests these work well on all platforms & browsers.
w += 32;
h += 96;
 var win = window.open(url, 
  name, 
  'width=' + w + ', height=' + h + ', ' +
  'location=no, menubar=no, ' +
  'status=no, toolbar=no, scrollbars=yes, resizable=no');
 win.resizeTo(w, h);
 win.focus();
}
// -->
</script> 


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
//$entered = $_POST["entry"];
//if (preg_match("/^85491$/", $entered)) $not_spider = true;
//else $not_spider = false;
$not_spider = true;
?>

<!--<span class="contentHead">Faculty</span> -->
      <P>
<?php
	if ($dbok) {
		$q_instrument = "SELECT * FROM instrument_search ORDER BY public_display DESC, instrument_title";
		if ($r_instrument = mysqli_query($link, $q_instrument)) {
?>
      <TABLE border="0" cellspacing="0" cellpadding="3" width="100%">
      
<?php
			$instrument_ct = 1;
			$no_show = 0;
						
			print "<tr><td colspan=\"4\"><h3>Instruments Displayed to the Public</h3></td></tr>";

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
				
				if (($public_display == "0") && ($no_show == "0"))
				{
					$no_show = 1;
					print "<tr><td>&nbsp;</td></tr>";
					print "<tr><td colspan=\"4\">Features Not Displayed to the Public</td></tr>";
					
			      	print "<tr>";
		    	    	print "<td>&nbsp;</td>";
        			    print "<td><strong>Instrument Title</strong></td>";
		            	print "<td><strong>Type(s)</strong></td>";
						print "<td><strong>View Document</strong></td>";
	    		        print "<td><strong>Update Instrument</strong></td>";
		    	    print "</tr>";
				}
				
				print "<tr>";
					print "<td>$instrument_ct</td>";
					print "<td valign=\"top\">$instrument_title</td>" ;
					print "<td valign=\"top\">$type_string</td>" ;
					print "<td valign=\"top\"><a href= \"$fileDocLink\" target= \"_blank\">View Instrument Document</a></td>" ;
					
					print "<td valign=\"top\">";
						print "<form name= \"instrument_view\" method=\"post\" action=\"instrument_search.php\">";
						print "<input type= \"submit\" name= \"sub_instrument\" value= \"Update\">";
						print "<input type= \"hidden\" name= \"iid\" value= \"$id\">";
						print "</form>";
					print "</td>";
				print "<tr>";
				
				$news_ct++;
			}

?>
       
      </TABLE>

<?php
	print "<p>";
		print "<form name= \"add_instrument\" method=\"post\" action=\"instrument_search.php\">";
		print "<input type= \"submit\" name= \"new_instrument\" value= \"Add Instrument\">";
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
    
	
	<!-- InstanceEndEditable -->
        

        </div> <!-- phsContent -->
        </div> <!-- LayoutDiv1   End of main-content -->

	    <div id="LayoutFooter">
  		  <? include "../../includes/footer.php"; ?>
		</div> <!-- end LayoutFooter -->


    </div> <!-- gridContainer clearfix -->
<? // include "../../includes/phs_scripts.php"; ?>

</body>
<!-- InstanceEnd --></html>
 


