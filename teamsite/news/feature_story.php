<?php
// no direct access
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- UTF-8 Character set -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- IE 8 Compatibility -->
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title>Department of Public Health Sciences - UC Davis School of Medicine</title> 

<link type="text/css" rel="stylesheet" href="../css/faculty.css">

</head>
 
<body>

<!-- Start Main Content Column -->
    <div id="content">

<?php

$news_id = '';
if (isset($_GET['fid'])) $news_id = $_GET['fid'];


if ($fp = fopen("/var/www/non_www/.my.cnf", "r")) {
    while (! feof($fp)) {
        $line = fgets($fp, 4096);
        if (preg_match("/password=(\\w+)/", $line, $found)) $password = $found[1];
        elseif (preg_match("/user=(\\w+)/", $line, $found)) $user_name = $found[1];
        elseif (preg_match("/host=([\\w\\.]+)/", $line, $found)) $host_name = $found[1];
    }
    fclose($fp);
//	$dbok = ($link = mysql_connect($host_name, $user_name, $password) && mysql_select_db("dept"));
 $dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"));
}
//$entered = $_POST["entry"];
//if (preg_match("/^85491$/", $entered)) $not_spider = true;
//else $not_spider = false;

?>



<?php

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
	
	$dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"));
}


	if ($dbok) 
	{
		
		if ($news_id)
		{
			$q_news = "SELECT * FROM news_features WHERE news_id = \"$news_id\" ";
			$r_news = mysqli_query($link, $q_news);
			$row_news = mysqli_fetch_array($r_news, MYSQLI_ASSOC);

//			$news_id = $row_news["news_id"];
			$news_title = $row_news["news_title"];
			$title_url = $row_news["title_url"];
			$teaser = $row_news["teaser"];
			$head_img = $row_news["head_img"];
			$head_img_align = $row_news["head_img_align"];
			$news_text = $row_news["news_text"];
			$news_img1 = $row_news["news_img1"];
			$news_img1_align = $row_news["news_img1_align"];
			$news_img2 = $row_news["news_img2"];
			$news_img2_align = $row_news["news_img2_align"];
			$attach1 = $row_news["attach1"];
			$attach2 = $row_news["attach2"];
			$people_id = $row_news["people_id"];
			$keywords = $row_news["keywords"];
			$rank = $row_news["rank"];
			$top_rank = $row_news["top_rank"];
			$cat_people = $row_news["cat_people"];
			$cat_edu = $row_news["cat_edu"];
			$cat_outreach = $row_news["cat_outreach"];
			$cat_eoh = $row_news["cat_eoh"];
			$cat_epi = $row_news["cat_epi"];
			$cat_hi = $row_news["cat_hi"];
			$cat_hpm = $row_news["cat_hpm"];
			$cat_bio = $row_news["cat_bio"];
			$cat_alumni = $row_news["cat_alumni"];
			$cat_chair = $row_news["cat_chair"];
			$auth_fname = $row_news["auth_fname"];
			$auth_lname = $row_news["auth_lname"];
			$public_display = $row_news["public_display"];
			$headimg_link = $row_news["headimg_link"];
			$headimg_hash = $row_news["headimg_hash"];
			$headimg_name = $row_news["headimg_name"];
			$headimg_caption = $row_news["headimg_caption"];
			$newsimg_link = $row_news["newsimg_link"];
			$newsimg_hash = $row_news["newsimg_hash"];
			$newsimg_name = $row_news["newsimg_name"];
			$newsimg_caption = $row_news["newsimg_caption"];
			$newsdoc_link = $row_news["newsdoc_link"];
			$newsdoc_hash = $row_news["newsdoc_hash"];
			$newsdoc_name = $row_news["newsdoc_name"];

			print "<table border= \"0\" width= \"358px\">";
//			print "<table border= \"0\" width= \"760px\">";

				print "<tr>";
					print "<td><h4><a href=\"$title_url\" target=\"_blank\">$news_title</a></h4></td>";
				print "</tr>";

				// print the header image if it exists
				if ($headimg_hash)
				{
					$fileLink = "openHeadimg.php?file_id=$headimg_hash";
					print "<tr><td valign= \"top\"><img src=\"$fileLink\" alt=\"$headimg_caption\"></td></tr>";
				}
				else
				{
					print "<tr><td>&nbsp;</td></tr>";
				}


//				print "<tr>";
//					print "<td><strong>By $auth_fname $auth_lname</strong></td>";
//				print "</tr>";

				
				// print the header image if it exists
				if ($newsimg_hash)
				{
					$fileImgLink = "openNewsimg.php?file_id=$newsimg_hash";
//					print "<tr><td valign= \"top\"><img src=\"$fileImgLink\" align=\"$news_img1_align\">$news_text</td></tr>";
					print "<tr><td><br>$news_text</td></tr>";
				}
				else
				{
					print "<tr><td><br>$news_text</td></tr>";
				}


//				print "<tr>";
//					print "<td>$news_text</td>";
//				print "</tr>";
        

				// print the news doc if it exists
				if ($newsdoc_hash)
				{
					print "<tr><td valign= \"top\">&nbsp;</td></tr>";
					$fileDocLink = "openNewsdoc.php?file_id=$newsdoc_hash";
					print "<td valign= \"top\"><a href= \"$fileDocLink\" target= \"_blank\">View Additional Information</a></td>"; //<font size= \"-1\"></font>
				}
				else
				{
					print "<tr><td>&nbsp;</td></tr>";
				}



		        print "<tr><td>&nbsp;</td></tr>";
				print "<tr><td>By $auth_fname $auth_lname</td></tr>";
				// determine where and how to place images and documents links into content.  Specify image alignment
				
		
				print "<tr><td>&nbsp;</td></tr>";
				print "<tr><td><a href=\"features.php\">Back to news listing</a></td></tr>";

			print "</table>";
			
	} // end if news_id


} // END if dbok

?>
	</div> 
    <!-- content -->

 
<!-- End Main Content Col -->
 

</body>
</html>
 


