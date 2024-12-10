<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<? 
require_once "../mlgh/config.inc.php";
?>


<!-- TemplateBeginEditable name="doctitle" -->
<title>MLGH Conference</title>
<!-- TemplateEndEditable -->

<? include "../mlgh/includes/css_scripts.php" ?>

<link rel="icon" type="image/png" href="../images/favicon.png">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>
<div class="gridContainer clearfix">
  <div class="LayoutContainer">
  <div id="LayoutDiv1">
  
	<!-- Main Menu -->
	<div id="cssmenu" style="float:right">
		<? include "../mlgh/includes/main_menu.php" ?>
	</div>

	<script src="../responsive/js/jquery-1.8.3.min.js"></script>
	<script src="../responsive/js/menumaker.js"></script>
	<script type="text/javascript">
		$("#cssmenu").menumaker({
			title: "MLGH Links",
			format: "multitoggle"
		});
	</script>
  
	<!-- End Main Menu -->

  </div> <!-- LayoutDiv1 -->
  </div> <!-- LayoutContainer -->
  
  <div id="LayoutDiv2">
  	<div class="LayoutContainer">
	    <div class="bannerpic" align="center">&nbsp;</div>
    </div> <!-- LayoutContainer -->
  </div> <!-- LayoutDiv2 -->
  
  <div class="LayoutContainer">
  <div id="LayoutDiv1">
  
  <!-- TemplateBeginEditable name="SecondaryContent" -->
  	
  	<p><h1>Page Tile</h1></p>
    
    <p>Content</p>

  
  <!-- TemplateEndEditable -->
  
  </div> <!-- LayoutDiv1 -->  
  </div> <!-- LayoutContainer -->
  
    
  <div id="LayoutDiv7">&nbsp;</div>
  
    <div class="LayoutContainer"> 
  		<div id="LayoutDiv8">
	       <? include "../mlgh/includes/footer.php" ?>
        </div>  <!-- LayoutDiv8 -->
    </div> <!-- LayoutContainer -->

</div> <!-- gridLayout -->

</body>
</html>
