<?php
//session_start();
// no direct access
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/base_page.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- UTF-8 Character set -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- IE 8 Compatibility -->
<meta http-equiv="X-UA-Compatible" content="IE=8" />

<? 
// $__ROOTDIR = basename(dirname(__FILE__)); 
require_once "config.inc.php";
?>  


<? include "includes/css_scripts.php"; ?>

<!-- InstanceBeginEditable name="page_title" -->
<title>Department of Public Health Sciences - UC Davis School of Medicine</title>
<!-- InstanceEndEditable -->
<? include "includes/meta_info.php"; ?> 
 
</head>
 
<body>
 
<table cellpadding="0" cellspacing="0" id="maincontainer"> 
<tr>
<td valign="top">
 
 
<!-- Start Header Section -->
 
<? include "includes/top_header.php"; ?>
 
<!-- End Header Section -->
 
 
	<div id="titlebar">
    	<? include "includes/site_title.php"; ?>
    	<p></p>
    </div> <!-- titlebar -->

 
 
 
<div id="main">
 
<!-- Start Left Nav Col -->
 
<div id="phsLeft-container"> 
<div id="leftNavMain">

<!--        <div class="leftnavitem" id="leftcolsidebar0">	-->
				
     <!--        	<div id="menu_phsLeft"> -->
				    	<? include "includes/left_menu.php"; ?>	
<!--                 </div> menu_phsLeft -->           
        

<!--        </div> --> <!-- leftnavitem -->
    
   

</div> <!-- leftNavMain -->
</div> <!-- phsLeft-container -->

<!-- End Left Navigation -->


</div> <!-- main -->
 
<!-- End Left Nav Col -->
 
<!-- Begin Right Nav Column -->
 
 
 
    <div id="sidebarContainer">

		<div id="sidebar"><!-- InstanceBeginEditable name="right_teasers" -->
        <div id="phsRight">
          <h3>UC Links</h3>
          <ul class="menu">
            <li><a href="http://www.ucdavis.edu" target="_blank" >UC Davis</a></li>
            <li><span class="separator"></span></li>
            <li><a href="http://www.ucdmc.ucdavis.edu" target="_blank" >UC Davis Health Systems</a></li>
          </ul>
        </div>
		<!-- InstanceEndEditable --></div> 
		<!-- sidebar -->
 
    </div> <!-- sidebarContainer -->
 
 
 
<!-- End Right Nav Column -->
 
<!-- Start Main Content Column -->
    <div id="content">

	<!-- Start Breadcrumb -->
 
 <?
if($_SERVER['SERVER_NAME'] == 'secure.phs.ucdavis.edu')
	$bcROOT="http://phs.ucdavis.edu";
else
//	$bcROOT="";
	$bcROOT=$GLOBALS['ROOT_DIR'];
?>
 
 
	<div id="breadcrumb" class="breadcrumb" align="left"><!-- InstanceBeginEditable name="breadcrumbs" --><a href="<?=$bcROOT?>/education.php">Education</a> -> <a href="<?=$bcROOT?>/education/cme.php">CME</a> -> <a href="<?=$bcROOT?>/education/clinepi.php">Clinical Epidemiology and Study Design</a> -> Registration<!-- InstanceEndEditable --></div> <!-- breadcrumb -->
 
	<!-- End Breadcrumb -->



	<!-- Start Slide Show Section -->
<!--	<table>
    	<tr><td> 
		<div id="phsslides">
	        <jdoc:include type="modules" name="phs_slides" style="xhtml"/> 
        </div>
        </td></tr>
	</table>  -->
	<!-- Slide Show -->
	<!-- InstanceBeginEditable name="content" -->
<h1>Clinical Epidemiology and Study Design Registration</h1>

<?php

require_once "/usr/local/secure_www/db.config.php"; 
 
// uncomment for debugging
//ini_set('error_reporting', E_ALL);


// include function library
//include "../include/common.lib.php";

// -------------------------------------------------------------------------------
// END MASTER MODULE INCLUDE
// -------------------------------------------------------------------------------

$getDoc = $_GET["file_id"];

function clean($string) 
{
   $stripThese = array(" ", "@", "~", "/", "|", "#", "$", "%", "*", "-");
   $string = str_replace($stripThese, '', $string); // Replaces all spaces with hyphens.
   return $string; // Removes special chars.
}

if ($fp = fopen("/usr/local/secure_www/.my.cnf", "r"))
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
//     $targets = array("/\\s+/", "/\\\\/", "/\"/", "/^ /", "/ $/", "/&lt/", "/&gt/");
//     $replaces = array(" ", "", "'", "", "", "<", ">");
     

	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"))) 
	{

		$q_select = "SELECT doc_link, doc_name FROM cme_reg WHERE doc_hash LIKE '$getDoc' ";
		
		$r_select = mysqli_query($link, $q_select);
		$row_select = mysqli_fetch_array($r_select, MYSQLI_ASSOC);
		
		$fileName = $row_select['doc_name'];
		$fileLocation = $row_select['doc_link'];
		
//		print "$getDoc Doc, $fileName, $fileLocation <br>$q_select <br>";
		
		$fileName = clean($fileName);
		
		if (file_exists($fileLocation)) 
		{
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename='.$fileName); 
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($fileLocation));
		    ob_clean();
		    flush();
		    readfile($fileLocation);
		    exit;
	    }		

	} // end if DBOK
} // end if FOPEN
?>
	<!-- InstanceEndEditable --></div> 
    <!-- content -->

 
<!-- End Main Content Col -->
 
</td>
</tr>
 
<tr>
<td class="footerrow" >
 
<!-- Begin Footer -->
<div id="footercontainer">
    
 
<!-- Start Footer Section -->
 
<div id="footer" align="center">
<? include "includes/footer.php"; ?>
</div> <!-- footer -->
 
 
<!-- End Footer Section -->
 
<!-- Start Analytics Tags -->
<? include "includes/analytics.php"; ?>
<!-- End Analytics Tags -->
 
        
</div> <!-- footercontainer -->

<!-- End Footer -->
 
<!--- </div> --->
 
</td>
</tr>
</table>

<!-- InstanceBeginEditable name="rotate_images" -->
<? //include "../includes/home_images.js"; ?>
<!-- InstanceEndEditable -->



 
</body>
<!-- InstanceEnd --></html>
 


