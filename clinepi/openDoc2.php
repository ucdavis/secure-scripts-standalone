<h1>Document Download Test</h1>

<?php

require_once "/usr/local/secure_www/db.config.php"; 
 
// uncomment for debugging
//ini_set('error_reporting', E_ALL);


// include function library
//include "../include/common.lib.php";

// -------------------------------------------------------------------------------
// END MASTER MODULE INCLUDE
// -------------------------------------------------------------------------------


// fields for file upload
$upload_doc_dir = "/usr/local/secure_www/clinepi/";  //this directory needs to be created 2/19/2014
$doc_location = $_POST["doc_location"];

$sub_reg = $_POST["sub_reg"];
//$sub_reg = "Closed";

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

		
//		$fileName = "1HEAT_Poster1_Spanish.pdf";
		$fileName = '107PPG Meeting - Mar 31 2015.pdf';
		$fileName = clean($fileName);
		
//		$fileLocation = "/usr/local/secure_www/clinepi/1HEAT_Poster1_Spanish.pdf";
		$fileLocation = '/usr/local/secure_www/p66Shc/107PPG Meeting - Mar 31 2015.pdf';
		
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
