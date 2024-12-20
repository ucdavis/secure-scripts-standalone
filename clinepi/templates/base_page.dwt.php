<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- UTF-8 Character set -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- IE 8 Compatibility -->
<meta http-equiv="X-UA-Compatible" content="IE=8" />

<? 
// $__ROOTDIR = basename(dirname(__FILE__)); 
require_once "../config.inc.php";
?>  


<? include "../includes/css_scripts.php"; ?>

<!-- TemplateBeginEditable name="page_title" -->
<title>Department of Public Health Sciences - UC Davis School of Medicine</title>
<!-- TemplateEndEditable -->
<? include "../includes/meta_info.php"; ?> 
 
</head>
 
<body>
 
<table cellpadding="0" cellspacing="0" id="maincontainer"> 
<tr>
<td valign="top">
 
 
<!-- Start Header Section -->
 
<? include "../includes/top_header.php"; ?>
 
<!-- End Header Section -->
 
 
	<div id="titlebar">
    	<? include "../includes/site_title.php"; ?>
    	<p></p>
    </div> <!-- titlebar -->

 
 
 
<div id="main">
 
<!-- Start Left Nav Col -->
 
<div id="phsLeft-container"> 
<div id="leftNavMain">

<!--        <div class="leftnavitem" id="leftcolsidebar0">	-->
				
     <!--        	<div id="menu_phsLeft"> -->
				    	<? include "../includes/left_menu.php"; ?>	
<!--                 </div> menu_phsLeft -->           
        

<!--        </div> --> <!-- leftnavitem -->
    
   

</div> <!-- leftNavMain -->
</div> <!-- phsLeft-container -->

<!-- End Left Navigation -->


</div> <!-- main -->
 
<!-- End Left Nav Col -->
 
<!-- Begin Right Nav Column -->
 
 
 
    <div id="sidebarContainer">

		<div id="sidebar"><!-- TemplateBeginEditable name="right_teasers" -->
        <div id="phsRight">
          <h3>UC Links</h3>
          <ul class="menu">
            <li><a href="http://www.ucdavis.edu" target="_blank" >UC Davis</a></li>
            <li><span class="separator"></span></li>
            <li><a href="http://www.ucdmc.ucdavis.edu" target="_blank" >UC Davis Health Systems</a></li>
          </ul>
        </div>
		<!-- TemplateEndEditable --></div> 
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
 
 
	<div id="breadcrumb" class="breadcrumb" align="left"><!-- TemplateBeginEditable name="breadcrumbs" -->Breadcrumb Here<!-- TemplateEndEditable --></div> <!-- breadcrumb -->
 
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
	<!-- TemplateBeginEditable name="content" -->ENTER CONTENT HERE<!-- TemplateEndEditable --></div> 
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
<? include "../includes/footer.php"; ?>
</div> <!-- footer -->
 
 
<!-- End Footer Section -->
 
<!-- Start Analytics Tags -->
<? include "../includes/analytics.php"; ?>
<!-- End Analytics Tags -->
 
        
</div> <!-- footercontainer -->

<!-- End Footer -->
 
<!--- </div> --->
 
</td>
</tr>
</table>

<!-- TemplateBeginEditable name="rotate_images" -->
<? //include "../includes/home_images.js"; ?>
<!-- TemplateEndEditable -->



 
</body>
</html>
 


