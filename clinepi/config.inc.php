<?
$GLOBALS['PRODUCTION_HOST_NAME'] = "secure.phs.ucdavis.edu";
//$GLOBALS['ROOT_DIR'] = basename(dirname(__FILE__));

// This shouldn't hurt the writing of http://phs.ucdavis.edu for the left nav when browing in https://secure.phs.ucdavis.edu
// I believe that writing of the left nav will not relay on this ROOT_DIR variable, and is instead hard coded. 
if(isset($_SERVER['HTTPS']))
	$GLOBALS['ROOT_DIR'] = "https://";
else
	$GLOBALS['ROOT_DIR'] = "http://";

// if current HTTP_HOST is NOT the production host, then we need to customize the web directory, up to one level deep (for staging/development purposes)
if($_SERVER['HTTP_HOST'] != $GLOBALS['PRODUCTION_HOST_NAME'])
{
	$requestString = $_SERVER['REQUEST_URI'];
	$GLOBALS['WEB_ROOT'] = strtok($requestString,'/');
}
else // site is running on production virtual host
	$GLOBALS['WEB_ROOT'] = ''; 

if (!$GLOBALS['WEB_ROOT'] == '') 
{
	$GLOBALS['ROOT_DIR'] .= $_SERVER['HTTP_HOST']."/".$GLOBALS['WEB_ROOT'];
}
else
{
	$GLOBALS['ROOT_DIR'] .= $_SERVER['HTTP_HOST'];	
}

// Debugging -- comment out on production
//echo "HTTP_HOST: ".$_SERVER['HTTP_HOST'];
//echo "<br />";
//echo "WEB ROOT: ".$GLOBALS['WEB_ROOT'];
//echo "<br />";
//echo "ROOT DIR: ".$GLOBALS['ROOT_DIR'];
?>