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
$not_spider = true;
?>


      <P>
  <?php
	if ($dbok) {
//		$sql = "select * from people where listing like \"%=2=%\" or listing like \"%=22=%\" or (listing not like \"\" AND staff_type like \"%admstf\") order by lname";

	$facstaff = 0;
	while ($facstaff < 2) {
		$facstaff++;
		if ($facstaff == 1)
		{
			$sql = "select * from people where id like \"967\" and listing like \"%=2=%\" order by lname";
		}

		elseif ($facstaff == 2)
		{
			$sql = "select * from people where (id not like \"967\") and ((listing like \"%=2=%\" or listing like \"%=22=%\") or (listing not like \"\" AND staff_type like \"%admstf\")) order by lname";
		}


		if ($result = mysqli_query($link, $sql)) {
?>
      <TABLE border=0 cellspacing=0 cellpadding=3>
        <tr valign="top">
  <?php
			$cell_ct = 0;

			while ($line2 = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				$id = $line2["id"];
				$lname = $line2["lname"];
				$fmname = $line2["fmname"];
				$title = $line2["title"];
				$phone = $line2["phone"];
				$email = $line2["email"];
				$url = $line2["url"];
				$picture = $line2["picture"];
				$picture_width = $line2["picture_width"];
				$picture_height = $line2["picture_height"];
				$interests = $line2["interests"];
				$webpage = $line2["webpage"];
				$responsibilities = $line2["responsibilities"];
				$official_title = $line2["official_title"];

?>


          <td valign="top">
            <!-- name -->
            <table>
              <tr><td valign="top">
				  <span class="fac-name"><a name="<?=$fmname?>" id="<?=$fmname?>"><?=$fmname?> <?=$lname?></a></span>
              </td></tr>

              <tr><td valign="top">
                <!-- title -->
                <?php
					print "$title<br>";
			?>

                <!-- phone -->
                <?php
				if ($phone) print "$phone<br>";
				else print "";
			?>

                <!-- email -->

                <?php
				if ((strlen($email) > 0) && $not_spider)
				{
				?><script language="JavaScript" type="text/javascript">
					<!--
					document.write( " <a href=\"mailt" );
					document.write( "o:" );
			<?php
				$etmp = $email;
				$counter = 0;
				print "document.write( \"";
				while (strlen($etmp) > 0)
				{
					if ($counter > 3)
					{
						print "\" );\ndocument.write( \"";
						$counter = 0;
					}
					print $etmp[0];
					$etmp = substr($etmp, 1);
					$counter++;
				}
			print "\" );\n";
			?>
					document.write( "\">" );
			<?php
				$etmp = $email;
				$counter = 0;
				print "document.write( \"";
				while (strlen($etmp) > 0)
				{
					if ($counter > 3)
					{
						print "\" );\ndocument.write( \"";
						$counter = 0;
					}
					print $etmp[0];
					$etmp = substr($etmp, 1);
					$counter++;
				}
				print "\" );\n";
			?>
					document.write( "<\/a>" );
					//-->
			</script>
                <br><?php
			} // strlen email ?>

                </td></tr>
              </table>
            </td>
  </p>
          <?php $cell_ct++;
						if (($cell_ct % 2) == 0)
						{
							print "</tr>";
							print "<tr><td>&nbsp;</td></tr>";
							print "<tr>";
						}

						if (($cell_ct % 2) == 1)
						{
							print "<td valign=\"top\" width=\"30\"></td>";
						}
					} // end while

					if (($cell_ct % 2) == 1)  // if the last cell printed was a left cell, close the row
					{
						print "</tr>";
					}
				?>


  <!-- verify that this close row needs to be there.  It should be conditional based on the last row -->

  <!--       </tr>

       <tr>
       		<td colspan="2"></td>
       </tr>


		<tr><td colspan=3><hr align="center" width="100%" size="1" noshade></td></tr> -->
          <?php
//			}
			?>
        </TABLE>


<?php
		}
	}
	}
?>
	</div>
    <!-- content -->


<!-- End Main Content Col -->


</body>
</html>
