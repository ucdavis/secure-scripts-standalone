<?php
// no direct access
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
if ($fp = fopen("/usr/local/secure_www/.my.cnf", "r")) {
    while (! feof($fp)) {
        $line = fgets($fp, 4096);
        if (preg_match("/password=(\\w+)/", $line, $found)) $password = $found[1];
        elseif (preg_match("/user=(\\w+)/", $line, $found)) $user_name = $found[1];
        elseif (preg_match("/host=([\\w\\.]+)/", $line, $found)) $host_name = $found[1];
    }
    fclose($fp);
	$dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"));
}
$entered = '';
if (isset($_POST['entry'])) $entered = $_POST["entry"];
//if (preg_match("/^74381$/", $entered)) $not_spider = true;
//else $not_spider = false;
$not_spider = true;
?>

<link type="text/css" rel="stylesheet" href="../css/faculty.css">


</head>
 
<body>


 

  <?php
if ($dbok) {
?>
      <TABLE border=0 cellspacing=0 cellpadding=2 width="100%">
  <?php
	$facstaff = 0;
	while ($facstaff < 6) {
		$facstaff++;
		if ($facstaff == 1) 
		{
			$sql = "select * from people where listing like \"%=12=%\" and listing like \"%=1=%\" order by lname";	
	?>				
	        <tr><td colspan=3><h3>Division of Biostatistics</h3></td></tr>		
	<?php
		}
		elseif ($facstaff == 2) 
		{
			$sql = "select * from people where listing like \"%=21=%\" and listing like \"%=1=%\" order by lname";
	?>
	        <tr><td colspan=3>
    	    <h3>Division of Environmental and Occupational Health</h3>
        	</td></tr>		
	<?php
		}
		elseif ($facstaff == 3) 
		{
			$sql = "select * from people where listing like \"%=20=%\" and listing like \"%=1=%\" order by lname";
	?>
	        <tr><td colspan=3>
    	    <h3>Division of Epidemiology</h3>
        	</td></tr>		
	<?php
		}
		elseif ($facstaff == 4) 
		{
			$sql = "select * from people where listing like \"%=35=%\" and listing like \"%=1=%\" order by lname";
	?>
	        <tr><td colspan=3>
    	    <h3>Division of Health Informatics</h3>
        	</td></tr>		
	<?php
		}
		elseif ($facstaff == 5) 
		{
			$sql = "select * from people where listing like \"%=36=%\" and listing like \"%=1=%\" order by lname";
	?>
	        <tr><td colspan=3>
    	    <h3>Division of Health Policy and Management</h3>
        	</td></tr>		

	<?php
    	}
	
		else {
			$sql = "select * from people where listing like \"=1=\" order by lname";
?>
        <tr><td colspan=3>
          <h3>Department of Public Health Sciences</h3>
          </td></tr>
  <?php
		}
		if ($result = mysqli_query($link, $sql)) {
			while ($line2 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				//$bio_url = "http://internet-stage.ucdmc.ucdavis.edu/";
				$bio_url = "http://www.ucdmc.ucdavis.edu/";
				$id = $line2["id"];
				$lname = $line2["lname"];
				$fmname = $line2["fmname"];
				$title = $line2["title"];
				$phone = $line2["phone"];
				$email = $line2["email"];
				$med_url = $line2["med_url"];
				$picture = $line2["picture"];
				$picture_width = $line2["picture_width"];
				$picture_height = $line2["picture_height"];
				$interests = $line2["interests"];
				$bio_url .= "$med_url";
?>
        <TR>
          <TD rowspan="2" valign=top><?php 
		  		if ((strlen($picture) > 0) && (strlen($med_url) > 0)) {
			?><div align="center"><a href="<?=$bio_url?>" target="_blank"><img src="<?=$picture?>" width="<?=$picture_width?>" height="<?=$picture_height?>" border="1" alt=""></a></div><?php 
				}
		  		elseif (strlen($picture) > 0) {
			?><div align="center"><img src="<?=$picture?>" width="<?=$picture_width?>" height="<?=$picture_height?>" alt=""></div><?php 
				}
				else print "&nbsp;"; ?></TD>
          <TD valign=top nowrap><span class="fac-name"><a name="<?=$id?>"></a><?php
		  		if (strlen($med_url) > 0) {
			?><a href="<?=$bio_url?>" target="_blank"><?=$fmname?> <?=$lname?></a><?php 
				}
				else {
		  ?><?=$fmname?> <?=$lname?><?php 
		  		}?></span><br /><?=$title?><br><a href="mailto:<?=$email?>"><?=$email?></a><br /><?=$phone?></TD>
<!--          <TD rowspan="2" valign=top><?//=$interests?></TD>     -->     
          </TR>
        <tr><td colspan=3>&nbsp;</td></tr>
        <tr><td colspan=3><hr></td></tr>
        <?php
			}
		}
	}
			?>
      </TABLE>
<?php
}
?>

</body>
</html>
 

