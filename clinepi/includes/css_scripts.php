<?php
$rootdir=$GLOBALS['ROOT_DIR'];

if($_SERVER['SERVER_NAME'] == 'secure.phs.ucdavis.edu')
//	$rootdir="/phs-public";
	$rootdir=$GLOBALS['ROOT_DIR'];
?>

<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/css/header_design2.css\">" ?>
<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/css/default.css\" media=\"screen\">" ?>
<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/css/print.css\" media=\"print\">" ?>
<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/css/left_menu.css\">" ?>
<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/css/right_menu.css\">" ?>
<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/css/phs_slides.css\">" ?>

<!--<link rel="stylesheet" type="text/css" href="../css/header_design2.css">
<link rel="stylesheet" type="text/css" href="../css/default.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/print.css" media="print">
<link rel="stylesheet" type="text/css" href="../css/left_menu.css"/>
<link rel="stylesheet" type="text/css" href="../css/right_menu.css"/>
<link rel="stylesheet" type="text/css" href="../css/phs_slides.css"/> -->

<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/scripts/tabber.js\" type=\"text/javascript\">" ?>

<? print "<script type=\"text/javascript\"> 
document.write('<style type=\"text/css\">.tabber{display:none;}<\/style>');
</script>" ?>


<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/scripts/global.js\" type=\"text/javascript\" >" ?>
<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/scripts/scripts.js\" >" ?>
<? print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/clinepi/css/dhtml.js\">" ?>

 <!--
<script src="http://www.ucdmc.ucdavis.edu/global/jscripts/tabber/tabber.js" type="text/javascript"></script>
 
<script type="text/javascript"> 
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
 
<script language="JavaScript" src="http://www.ucdmc.ucdavis.edu/global/jscripts/global.js" type="text/javascript"></script>
<script language="JavaScript" src="http://www.ucdmc.ucdavis.edu/global/jscripts/scripts.js"></script>
<script language="JavaScript" src="http://www.ucdmc.ucdavis.edu/global/jscripts/dhtml.js"></script>
-->