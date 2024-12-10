<h2>PHS News File Download</h2>

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
//     $targets = array("/\\s+/", "/\\\\/", "/\"/", "/^ /", "/ $/", "/&lt/", "/&gt/");
//     $replaces = array(" ", "", "'", "", "", "<", ">");
     

	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"))) 
	{

		$q_select = "SELECT headimg_link, headimg_name FROM news_features WHERE headimg_hash LIKE '$getDoc' ";
		
		$r_select = mysqli_query($link, $q_select);
		$row_select = mysqli_fetch_array($r_select, MYSQLI_ASSOC);
		
		$fileName = $row_select['headimg_name'];
		$fileLocation = $row_select['headimg_link'];
		
//		print "$getDoc Doc, $fileName, $fileLocation <br>$q_select <br>";
		
		$fileName = clean($fileName);
		
		if (file_exists($fileLocation)) 
		{
			// Determine file extension type
    		$mime_type = mime_content_type($fileLocation);

			if ($mime_type == "image/jpeg")
			{
				header('Content-Description: File Transfer');
//			    header('Content-Type: application/octet-stream');
			    header('Content-Type: image/jpeg');
//			    header('Content-Type: image/png');			
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
		    } // if jpg		
			
			if ($mime_type == "image/png")
			{
			    header('Content-Description: File Transfer');
//			    header('Content-Type: application/octet-stream');
//			    header('Content-Type: image/jpeg');
			    header('Content-Type: image/png');			
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
		    } // if png		
		} //end if fileLocation
		

	} // end if DBOK
} // end if FOPEN
?>
