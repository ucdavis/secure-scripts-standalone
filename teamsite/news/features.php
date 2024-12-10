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


      <P>
  <?php

	if ($dbok) 
	{
		$q_news = "SELECT * FROM news_features WHERE public_display = \"1\" ORDER BY top_rank DESC, rank LIMIT 3 ";
		$r_news = mysqli_query ($link, $q_news);
	
		if (mysqli_num_rows($r_news) >= 1)
		{

			print "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\">";
			
			while ($row_news = mysqli_fetch_array($r_news, MYSQLI_ASSOC))
			{
				$news_id = $row_news["news_id"];
				$news_title = $row_news["news_title"];
				$title_url = $row_news["title_url"];
				$teaser = $row_news["teaser"];
				$teaser = substr($teaser, 0, 180);
//				$head_img = $row_news["head_img"];
//				$head_img_align = $row_news["head_img_align"];
				$news_text = $row_news["news_text"];
				$news_img1 = $row_news["news_img1"];
//				$news_img1_align = $row_news["news_img1_align"];
//				$news_img2 = $row_news["news_img2"];
//				$news_img2_align = $row_news["news_img2_align"];
//				$attach1 = $row_news["attach1"];
//				$attach2 = $row_news["attach2"];
//				$people_id = $row_news["people_id"];
//				$keywords = $row_news["keywords"];
//				$rank = $row_news["rank"];
//				$top_rank = $row_news["top_rank"];
//				$cat_people = $row_news["cat_people"];
//				$cat_edu = $row_news["cat_edu"];
//				$cat_outreach = $row_news["cat_outreach"];
//				$cat_eoh = $row_news["cat_eoh"];
//				$cat_epi = $row_news["cat_epi"];
//				$cat_hi = $row_news["cat_hi"];
//				$cat_hpm = $row_news["cat_hpm"];
//				$cat_bio = $row_news["cat_bio"];
//				$cat_alumni = $row_news["cat_alumni"];
//				$cat_chair = $row_news["cat_chair"];
//				$auth_fname = $row_news["auth_fname"];
//				$auth_lname = $row_news["auth_lname"];
//				$public_display = $row_news["public_display"];
				$newsimg_link = $row_news["newsimg_link"];
				$newsimg_hash = $row_news["newsimg_hash"];
				$newsimg_name = $row_news["newsimg_name"];
				$newsimg_caption = $row_news["newsimg_caption"];


				print "<tr>";
					print "<td colspan=\"2\"><span class=\"fac-name\">$news_title</span></td>";
				print "</tr>";
				
				if ($newsimg_hash)
				{
					$fileImgLink = "openNewsimg.php?file_id=$newsimg_hash";
//					print "<tr><td valign= \"top\"><img src=\"$fileImgLink\" align=\"left\" alt=\"$newsimg_caption\"></td><td valign=\"top\">$teaser</td></tr>";
					print "<tr><td valign= \"top\"><img src=\"ResizeImage.php?image=$newsimg_link\" align=\"left\" alt=\"$newsimg_caption\"></td><td valign=\"top\">$teaser</td></tr>";
				}
				else
				{
					print "<tr><td colspan=\"2\">$teaser</td></tr>";
				}

//				print "<tr>";
//					print "<td>$teaser</td>";
//				print "</tr>";
				
//				print "<tr>";
//					print "<td colspan=\"2\"><a href=\"feature_story.php?fid=$news_id\">Read More</a></td>";
//				print "</tr>";
				
				print "<tr>";
					print "<td colspan=\"2\"><a href=\"$title_url\" target= \"_blank\">Read More</a></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
//				print "<tr><td colspan=\"2\"><hr></td></tr>";
								
			} // end while
			
			print "</table>";
			
		} // end if
		
		else
		{
			print "<span class=\"fac-name\">Come back soon to check for more PHS Features</span>";	
		}
		
?>
          
          


<?php


	}
?>
	</div> 
    <!-- content -->

 
<!-- End Main Content Col -->
 

</body>
</html>
 


