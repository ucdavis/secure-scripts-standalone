<?php
session_start();
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
     $targets = array("/\\s+/", "/\\\\/", "/\"/", "/^ /", "/ $/", "/&lt/", "/&gt/");
     $replaces = array(" ", "", "'", "", "", "<", ">");
//     $fname = preg_replace($targets, $replaces, $fname);
	 
	 $q_sample = "";
	 if(isset($_POST['q_sample'])) $q_sample = $_POST["q_sample"];
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "p66shc"))) 
	{
//			print "HI $q_sample";
			$q_export = $q_sample;
			$r_export = mysqli_query($link, $q_export);
			$fields_export = mysqli_num_fields($r_export);
			
			for ($field_ct = 0; $field_ct < $fields_export; $field_ct++)
			{
//				$header .= mysqli_field_name($r_export, $field_ct)."\t";
				$header .= mysqli_fetch_fields($r_export)."\t"; //, $field_ct <-- removed from call
			}
			
			while ($row_export = mysqli_fetch_array($r_export, MYSQLI_ASSOC))
			{
				$line = ' ';
				
				foreach($row_export as $value)
				{
					if ((!isset($value)) || ($value == " "))
					{
						$value = "\t";
					}
					else
					{
						$value = str_replace('"', '""', $value);
						$value = '"'.$value.'"'."\t";
					}
					$line .= $value;
				} // end foreach
				
				$data .= trim($line)."\n";
			} // end while
			
			$data = str_replace("\r", " ", $data);

			if ($data == " ") $data = "\n(0) Records Found!\n";
		
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"epo_rpt.xls\"");
			header("Pragma: no-cache");
			header("Expires: 0");
			print "$header\n$data";
	} // end if DBOK
} // end if FOPEN
?>