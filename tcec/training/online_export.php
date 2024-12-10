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
//     $fname = preg_replace($targets, $replaces, $fname);
	 
	 if(isset($_POST['q_train'])) $q_train = $_POST['q_train'];
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "cns"))) 
	{
			$q_export = $q_train;
			$r_export = mysqli_query($link, $q_export);
			$fields_export = mysqli_num_fields($r_export);
			
// ***********************************************************************************

function cleanData($str) { 
    $str = preg_replace("/\t/", " ", $str); // clean out tabs in data - replace with space
    $str = preg_replace("/\n/", ", ", $str); // clean out line breaks and replace with comma+space
    $str = preg_replace("/\r/", "", $str); // clean out extra line breaks
    return $str;
} 


$fields = mysqli_fetch_fields($r_export);
$row_export = mysqli_fetch_assoc($r_export);
$totalRows_export = mysqli_num_rows($r_export);

$d = "\t";
$nl = "\n";

$contents = '';

// write out fields
foreach($fields as $field) {
    $contents .= $field->name.$d;
}
// close fields list
$contents .= $nl;

// write out data
do {
    foreach($fields as $field) { // loop through fileds to output
        $contents .= cleanData($row_export[$field->name]).$d;
    }
    // close record line
    $contents .= $nl;
}while($row_export = mysqli_fetch_assoc($r_export));

// free memory
mysqli_free_result($r_export);

// ***********************************************************************************
			
//			$data = str_replace("\r", " ", $data);

//			if ($data == " ") $data = "\n(0) Records Found!\n";
		
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"tcec_rpt.xls\"");
			header("Pragma: no-cache");
			header("Expires: 0");
			print "$contents";
	} // end if DBOK
} // end if FOPEN
?>