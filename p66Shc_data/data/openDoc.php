<h2>p66Shc File Download</h2>

<?php

//require_once "/usr/local/secure_www/db.config.php"; 
 
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
     

	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "p66shc"))) 
	{

		$q_select = "SELECT doc_link, doc_name FROM liv3express WHERE doc_hash LIKE '$getDoc' ";
		
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
