<?php
session_start();
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
     $targets = array("/\\s+/", "/\\\\/", "/\"/", "/^ /", "/ $/", "/&lt/", "/&gt/");
     $replaces = array(" ", "", "'", "", "", "<", ">");
     $fname = preg_replace($targets, $replaces, $fname);
	 
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept")))  
	{

$image = $_GET["image"];

		$pic = $image;
	
		$new_width = 75;
		$new_height = 90;

		$pic_size = getimagesize($pic);
		$width = $pic_size[0];
		$height = $pic_size[1];
		$ptype = $pic_size[2];
		
		if ($width > $new_width)
		{
			$ratio = $new_width/$width;
			$new_height = $height * $ratio;
		}
		
		if ($width < $new_width)
		{
			$ratio = $new_height/$height;
			$new_width = $width * $ratio;
		}
		
		$new_pic = imagecreatetruecolor($new_width, $new_height);

	    switch ($ptype)
	    {
	        case 1: $src = imagecreatefromgif($pic); break;
	        case 2: $src = imagecreatefromjpeg($pic);  break;
	        case 3: $src = imagecreatefrompng($pic); break;
	        default: return '';  break;
	    }
	
		imagecopyresampled($new_pic, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
		header('Content-type: image/jpeg');
		imagejpeg($new_pic, null, 100);
		imagedestroy($new_pic); 

	} // end if DBOK
} // end if FOPEN
?>
