<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/p66Shc_text.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>p66Shc - Pathology</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<link href="../css/p66Shc.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="0">

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7FAFF">
	<tr>
    	<td valign="top" background="../images/banner_bkgrd.jpg"><img src="../images/p66_banner.jpg" width="600" height="64" /></td>
  	</tr>

	<tr>
    	<td valign="middle" bgcolor="#FFFFFF" height="30px" class="top_menu">&nbsp;&nbsp;&nbsp;
          <a href="http://p66Shc.phs.ucdavis.edu/index.htm" class="top_menu">Introduction</a>&nbsp;&nbsp;&#8226;
          <a href="http://p66Shc.phs.ucdavis.edu/projects.htm" class="top_menu">Projects & Cores</a>&nbsp;&nbsp;&#8226;
          <a href="http://p66Shc.phs.ucdavis.edu/data_login.php" class="top_menu">Data Center</a>&nbsp;&nbsp;&#8226;
<!--          <a href="https://secure.phs.ucdavis.edu/p66Shc/data_login.php" class="top_menu">Data Center</a>&nbsp;&nbsp;&#8226; -->
          <a href="http://p66Shc.phs.ucdavis.edu/publications.php" class="top_menu">Publications</a>&nbsp;&nbsp;&#8226;
          <a href="http://p66Shc.phs.ucdavis.edu/contact.htm"  class="top_menu">Contact Us</a> </td>
  </tr>

	<tr>
    	<td height="1px" bgcolor="#18477B"></td>
    </tr>
    
	<tr>
    	<td valign="top">
        	<table width="100%" cellpadding="2" cellspacing="2" border="0">

            	<tr>
               	   <td width="20%" valign="top" bgcolor="#F8F7FF"><!-- InstanceBeginEditable name="LeftNav" -->
               	     <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php" class="left_nav">Data Center Home</a></div>
           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project1" class="left_nav">Project 1</a></div>
           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project2" class="left_nav">Project 2</a></div>
           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project3" class="left_nav">Project 3</a></div>
<!--           	       <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project4" class="left_nav">Project 4</a></div> -->
               	     <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreA" class="left_nav">Core A 
                     (Internal Information)</a></div>
                     <div id="left_nav">&nbsp;<a href="data_center.php?getfiles=CoreB" class="left_nav">&nbsp;Core B</a></div>
                     <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreC" class="left_nav">Core C</a></div>
           	       <div id="left_nav">&nbsp;<a href="data_center.php?getfiles=Meetings" class="left_nav">&nbsp;Monthly Meetings</a></div>
                   <div id="left_nav">&nbsp;<a href="data_center.php?getfiles=Abstracts" class="left_nav">&nbsp;Abstracts</a></div>
                   <div id="left_nav">&nbsp;<a href="publications.php" class="left_nav">&nbsp;Publications</a></div>
                   <div id="left_nav">&nbsp;<a href="s_subject.php" class="left_nav">&nbsp;Sample Data</a></div>
                   <div id="left_nav">&nbsp;&nbsp;<a href="http://p66Shc.phs.ucdavis.edu/data_logout.php" class="left_nav">Logout</a></div>
               	   <!-- InstanceEndEditable --></td>

                   <td width="80%" valign="top"><!-- InstanceBeginEditable name="Content" -->
<?php

// include function library
include "./include/common.lib.php";
//ini_set('upload_max_filesize', '102,400,000 ');
//$max_size =  ini_get('upload_max_filesize');
//print "$max_size!";

$upload_by = $_SESSION["p66_user"];

$sub_data = "";
$an_id = "";
$genotype = "";
$an_num = "";
$cpl = "";
$death_age = "";
$diet = "";
$diet_amt = "";
$case_summary = "";
$necropsy_summary = "";
$heart = "";
$lung = "";
$liver = "";
$kidney = "";
$spleen = "";
$gall_bladder = "";
$gastro_tract = "";
$perp_gland = "";
$sarcoma = "";
$repro_tract = "";
$brain = "";
$ear = "";
$head_area = "";
$mouth = "";
$fat_tissue = "";
$thyroid = "";
$bone = "";
$sal_glands = "";
$hard_glands = "";
$eyes = "";
$lymph_nodes = "";
$skin = "";
$joints = "";
$notify_email = "";

if(isset($_POST['sub_data'])) $sub_data = $_POST["sub_data"];
if(isset($_POST['an_id'])) $an_id = $_POST["an_id"];
if(isset($_POST['genotype'])) $genotype = $_POST["genotype"];
if(isset($_POST['an_num'])) $an_num = $_POST["an_num"];
if(isset($_POST['cpl'])) $cpl = $_POST["cpl"];
if(isset($_POST['death_age'])) $death_age = $_POST["death_age"];
if(isset($_POST['diet'])) $diet = $_POST["diet"];
if(isset($_POST['diet_amt'])) $diet_amt = $_POST["diet_amt"];
if(isset($_POST['case_summary'])) $case_summary = $_POST["case_summary"];
if(isset($_POST['necropsy_summary'])) $necropsy_summary = $_POST["necropsy_summary"];
if(isset($_POST['heart'])) $heart = $_POST["heart"];
if(isset($_POST['lung'])) $lung = $_POST["lung"];
if(isset($_POST['liver'])) $liver = $_POST["liver"];
if(isset($_POST['kidney'])) $kidney = $_POST["kidney"];
if(isset($_POST['spleen'])) $spleen = $_POST["spleen"];
if(isset($_POST['gall_bladder'])) $gall_bladder = $_POST["gall_bladder"];
if(isset($_POST['gastro_tract'])) $gastro_tract = $_POST["gastro_tract"];
if(isset($_POST['perp_gland'])) $perp_gland = $_POST["perp_gland"];
if(isset($_POST['sarcoma'])) $sarcoma = $_POST["sarcoma"];
if(isset($_POST['repro_tract'])) $repro_tract = $_POST["repro_tract"];
if(isset($_POST['brain'])) $brain = $_POST["brain"];
if(isset($_POST['ear'])) $ear = $_POST["ear"];
if(isset($_POST['head_area'])) $head_area = $_POST["head_area"];
if(isset($_POST['mouth'])) $mouth = $_POST["mouth"];
if(isset($_POST['fat_tissue'])) $fat_tissue = $_POST["fat_tissue"];
if(isset($_POST['thyroid'])) $thyroid = $_POST["thyroid"];
if(isset($_POST['bone'])) $bone = $_POST["bone"];
if(isset($_POST['sal_glands'])) $sal_glands = $_POST["sal_glands"];
if(isset($_POST['hard_glands'])) $hard_glands = $_POST["hard_glands"];
if(isset($_POST['eyes'])) $eyes = $_POST["eyes"];
if(isset($_POST['lymph_nodes'])) $lymph_nodes = $_POST["lymph_nodes"];
if(isset($_POST['skin'])) $skin = $_POST["skin"];
if(isset($_POST['joints'])) $joints = $_POST["joints"];
if(isset($_POST['notify_email'])) $notify_email = $_POST["notify_email"];

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
//	 $liv_key_text = preg_replace($targets, $replaces, $liv_key_text);

	$case_summary = filter_var($case_summary, FILTER_SANITIZE_STRING);
	$necropsy_summary = filter_var($necropsy_summary, FILTER_SANITIZE_STRING);
	$heart = filter_var($heart, FILTER_SANITIZE_STRING);
	$lung = filter_var($lung, FILTER_SANITIZE_STRING);
	$liver = filter_var($liver, FILTER_SANITIZE_STRING);
	$kidney = filter_var($kidney, FILTER_SANITIZE_STRING);
	$spleen = filter_var($spleen, FILTER_SANITIZE_STRING);
	$gall_bladder = filter_var($gall_bladder, FILTER_SANITIZE_STRING);
	$gastro_tract = filter_var($gastro_tract, FILTER_SANITIZE_STRING);
	$perp_gland = filter_var($perp_gland, FILTER_SANITIZE_STRING);
	$sarcoma = filter_var($sarcoma, FILTER_SANITIZE_STRING);
	$repro_tract = filter_var($repro_tract, FILTER_SANITIZE_STRING);
	$brain = filter_var($brain, FILTER_SANITIZE_STRING);
	$ear = filter_var($ear, FILTER_SANITIZE_STRING);
	$head_area = filter_var($head_area, FILTER_SANITIZE_STRING);
	$mouth = filter_var($mouth, FILTER_SANITIZE_STRING);
	$fat_tissue = filter_var($fat_tissue, FILTER_SANITIZE_STRING);
	$thyroid = filter_var($thyroid, FILTER_SANITIZE_STRING);
	$bone = filter_var($bone, FILTER_SANITIZE_STRING);
	$sal_glands = filter_var($sal_glands, FILTER_SANITIZE_STRING);
	$hard_glands = filter_var($hard_glands, FILTER_SANITIZE_STRING);
	$eyes = filter_var($eyes, FILTER_SANITIZE_STRING);
	$lymph_nodes = filter_var($lymph_nodes, FILTER_SANITIZE_STRING);
	$skin = filter_var($skin, FILTER_SANITIZE_STRING);
	$joints = filter_var($joints, FILTER_SANITIZE_STRING);
	 
//	$case_summary = sanitizeString($case_summary);
//	$necropsy_summary = sanitizeString($necropsy_summary);
//	$heart = sanitizeString($heart);
//	$lung = sanitizeString($lung);
//	$liver = sanitizeString($liver);
//	$kidney = sanitizeString($kidney);
//	$spleen = sanitizeString($spleen);
//	$gall_bladder = sanitizeString($gall_bladder);
//	$gastro_tract = sanitizeString($gastro_tract);
//	$perp_gland = sanitizeString($perp_gland);
//	$sarcoma = sanitizeString($sarcoma);
//	$repro_tract = sanitizeString($repro_tract);
//	$brain = sanitizeString($brain);
//	$ear = sanitizeString($ear);
//	$head_area = sanitizeString($head_area);
//	$mouth = sanitizeString($mouth);
//	$fat_tissue = sanitizeString($fat_tissue);
//	$thyroid = sanitizeString($thyroid);
//	$bone = sanitizeString($bone);
//	$sal_glands = sanitizeString($sal_glands);
//	$hard_glands = sanitizeString($hard_glands);
//	$eyes = sanitizeString($eyes);
//	$lymph_nodes = sanitizeString($lymph_nodes);
//	$skin = sanitizeString($skin);
//	$joints = sanitizeString($joints);
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "p66shc"))) 
	{
		if ($_SESSION["p66_access"] == "p66_OK")
		{
			print "";
		}
		else
		{
			print "You are not authorized to view this page";
			die();
		}

		if ($sub_data == "Submit Pathology Data")
		{
			$valid_form = true;

			if ($valid_form == true)
			{
				$upload_date = date("c");
				
				$q_update = "UPDATE pathology SET an_num = '$an_num', cpl = '$cpl', death_age = '$death_age', diet = '$diet',
				diet_amt = '$diet_amt', case_summary = '$case_summary', necropsy_summary = '$necropsy_summary', heart = '$heart',
				lung = '$lung', liver = '$liver', kidney = '$kidney', spleen = '$spleen', gall_bladder = '$gall_bladder',
				gastro_tract = '$gastro_tract', perp_gland = '$perp_gland', sarcoma = '$sarcoma', repro_tract = '$repro_tract',
				brain = '$brain', ear = '$ear', head_area = '$head_area', mouth = '$mouth', fat_tissue = '$fat_tissue',
				thyroid = '$thyroid', bone = '$bone', sal_glands = '$sal_glands', hard_glands = '$hard_glands', eyes = '$eyes',
				lymph_nodes = '$lymph_nodes', skin = '$skin', joints = '$joints' 
				WHERE an_id LIKE '$an_id' and genotype LIKE '$genotype' ";
				
				$r_update = mysqli_query($link, $q_update);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "The pathology data for ID $an_id Genotype $genotype has been successfully updated.  
					<a href= \"s_subject.php\">Go Back to Subject Sample Data Main Page</a><p>$q_update";

// SEND E-MAIL NOTIFICATION TO KYOUNGMI KIM AND ADDRESSES LISTED IN THE CC NOTIFICATION					
//					$file_type = "";
					
					$to = "kmkim@ucdavis.edu";
//					$cc_email = $notify_email;
					$subject = "p66Shc Pathology Data Update notifcation";
					$contents = "Hello, \n\n";
					$contents .= "A p66Shc lifespan data for $an_id - $genotype has been updated by $upload_by.  \n\n";
					
					
					$contents .= "Please visit our website at http://p66shc.phs.ucdavis.edu/data_login.php to view this data. \n\n";
//					$contents .= "If you have any questions please contact Amber Carrere at (530) 754-4992. \n\n";
					$contents .= "Best regards, \n\n";
					$contents .= "p66Shc Program";
					$from = "noreply@ucdavis.edu";
					$header = "From: \"p66Shc Program\" <".$from.">\r\n"; 
					$header.= "CC:".$cc_email."\r\n";
	
//					mail($to, $subject, $contents, $header);
// END E-MAIL NOTIFICATION					

				
				} // end if mysql_affected_rows >= 1
				
				else
				{
					print "The pathology data for this subject has not been been updated.";
					$valid_form = false;
				}
			
			} // end if $valid_form == true
		
		
		} // end if sub_data = Submit Lifespan Data
		
		
// IF !SUB_DATA && $GETFILES
		
		if ((!$sub_data) || (($sub_date == 'Submit Pathology Data') && ($valid_form == false)))
		{
//			$q_pathology = "SELECT * FROM pathology WHERE an_id LIKE '74' AND genotype LIKE 'C57BL/6' ";
			$q_sample = "SELECT * FROM pathology WHERE an_id LIKE $an_id ";
			$q_pathology = "SELECT * FROM pathology WHERE an_id LIKE '$an_id' ";
			$r_pathology = mysqli_query($link, $q_pathology);
			
			$row_pathology = mysqli_fetch_array($r_pathology, MYSQLI_ASSOC);
			
			$ps_id = $row_pathology['ps_id'];
			$an_id = $row_pathology['an_id'];
			$genotype = $row_pathology['genotype'];
			$an_num = $row_pathology['an_num'];
			$cpl = $row_pathology['cpl'];
			$death_age = $row_pathology['death_age'];
			$diet = $row_pathology['diet'];
			$diet_amt = $row_pathology['diet_amt'];
			
			$case_summary = $row_pathology['case_summary'];
			$necropsy_summary = $row_pathology['necropsy_summary'];
			$heart = $row_pathology['heart'];
			$lung = $row_pathology['lung'];
			$liver = $row_pathology['liver'];
			$kidney = $row_pathology['kidney'];
			$spleen = $row_pathology['spleen'];
			$gall_bladder = $row_pathology['gall_bladder'];
			$gastro_tract = $row_pathology['gastro_tract'];
			$perp_gland = $row_pathology['perp_gland'];
			$sarcoma = $row_pathology['sarcoma'];
			$repro_tract = $row_pathology['repro_tract'];
			$brain = $row_pathology['brain'];
			$ear = $row_pathology['ear'];
			$head_area = $row_pathology['head_area'];
			$mouth = $row_pathology['mouth'];
			$fat_tissue = $row_pathology['fat_tissue'];
			$thyroid = $row_pathology['thyroid'];
			$bone = $row_pathology['bone'];
			$sal_glands = $row_pathology['sal_glands'];
			$hard_glands = $row_pathology['hard_glands'];
			$eyes = $row_pathology['eyes'];
			$lymph_nodes = $row_pathology['lymph_nodes'];
			$skin = $row_pathology['skin'];
			$joints = $row_pathology['joints'];
			
			print "<br />";
			
			print "<FORM name= \"export_std\" method= \"post\" action= \"http://p66shc.phs.ucdavis.edu/sample_download.php\">";
			print "<INPUT TYPE= \"submit\" VALUE= \"Export this record to Excel\" name= \"sub_sample\">";
			print "<input type= \"hidden\" name= \"q_sample\" value= \"$q_sample\">";
			print "</FORM>";
			
			print "<p>&nbsp;</p>";


			print "<form name= 'pathology' method= 'post' action= 's_pathology.php'>";
			print "<table border= '0' width= '100%'>";

				print "<tr>";
					print "<td><strong>Animal ID</strong></td>";
					print "<td><strong>Genotype</strong></td>";
					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
				
				print "<tr>";
					print "<td>$an_id</td>";
					print "<td>$genotype</td>";
					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Animal #</strong></td>";
					print "<td><strong>CPL #</strong></td>";
					print "<td><strong>Age at Death</strong></td>";
					print "<td><strong>Diet</strong></td>";
					print "<td><strong>Diet Amt</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input type= 'text' name= 'an_num' value= '$an_num'></td>";
					print "<td><input type= 'text' name= 'cpl' value= '$cpl'></td>";
					print "<td><input type= 'text' name= 'death_age' value= '$death_age'></td>";
					print "<td><input type= 'text' name= 'diet' value= '$diet'></td>";
					print "<td><input type= 'text' name= 'diet_amt' value= '$diet_amt'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
			print "</table>";
			
			print "<table border= '0' width= '100%'>";
				print "<tr>";
					print "<td><strong>Case Summary</strong></td>";
					print "<td><strong>Necropsy Summary</strong></td>";
					print "<td><strong>Heart</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'case_summary' rows= '4' cols= '30'>$case_summary</textarea></td>";
					print "<td><textarea name= 'necropsy_summary' rows= '4' cols= '30'>$necropsy_summary</textarea></td>";
					print "<td><textarea name= 'heart' rows= '4' cols= '30'>$heart</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Lung</strong></td>";
					print "<td><strong>Liver</strong></td>";
					print "<td><strong>Kidney</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'lung' rows= '4' cols= '30'>$lung</textarea></td>";
					print "<td><textarea name= 'liver' rows= '4' cols= '30'>$liver</textarea></td>";
					print "<td><textarea name= 'kidney' rows= '4' cols= '30'>$kidney</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Spleen</strong></td>";
					print "<td><strong>Gall Bladder</strong></td>";
					print "<td><strong>Gastrointestinal Tract</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'spleen' rows= '4' cols= '30'>$spleen</textarea></td>";
					print "<td><textarea name= 'gall_bladder' rows= '4' cols= '30'>$gall_bladder</textarea></td>";
					print "<td><textarea name= 'gastro_tract' rows= '4' cols= '30'>$gastro_tract</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Perputial Gland</strong></td>";
					print "<td><strong>Sarcoma</strong></td>";
					print "<td><strong>Reproductive</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'perp_gland' rows= '4' cols= '30'>$perp_gland</textarea></td>";
					print "<td><textarea name= 'sarcoma' rows= '4' cols= '30'>$sarcoma</textarea></td>";
					print "<td><textarea name= 'repro_tract' rows= '4' cols= '30'>$repro_tract</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Brain</strong></td>";
					print "<td><strong>Ear</strong></td>";
					print "<td><strong>Head Area</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'brain' rows= '4' cols= '30'>$brain</textarea></td>";
					print "<td><textarea name= 'ear' rows= '4' cols= '30'>$ear</textarea></td>";
					print "<td><textarea name= 'head_area' rows= '4' cols= '30'>$head_area</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Mouth</strong></td>";
					print "<td><strong>Fat Tissue</strong></td>";
					print "<td><strong>Thyroid</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'mouth' rows= '4' cols= '30'>$mouth</textarea></td>";
					print "<td><textarea name= 'fat_tissue' rows= '4' cols= '30'>$fat_tissue</textarea></td>";
					print "<td><textarea name= 'thyroid' rows= '4' cols= '30'>$thyroid</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Bone</strong></td>";
					print "<td><strong>Salivary Glands</strong></td>";
					print "<td><strong>Hardarian Glands</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'bone' rows= '4' cols= '30'>$bone</textarea></td>";
					print "<td><textarea name= 'sal_glands' rows= '4' cols= '30'>$sal_glands</textarea></td>";
					print "<td><textarea name= 'hard_glands' rows= '4' cols= '30'>$hard_glands</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Eyes</strong></td>";
					print "<td><strong>Lymph Nodes</strong></td>";
					print "<td><strong>Skin</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'eyes' rows= '4' cols= '30'>$eyes</textarea></td>";
					print "<td><textarea name= 'lymph_nodes' rows= '4' cols= '30'>$lymph_nodes</textarea></td>";
					print "<td><textarea name= 'skin' rows= '4' cols= '30'>$skin</textarea></td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Joints</strong></td>";
					print "<td><strong>&nbsp;</strong></td>";
					print "<td><strong>&nbsp;</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><textarea name= 'joints' rows= '4' cols= '30'>$joints</textarea></td>";
					print "<td>&nbsp;</td>";
					print "<td>&nbsp;</td>";
				print "</tr>";
			
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<input type= 'hidden' name= 'ps_id' value= '$ps_id'>";
				print "<input type= 'hidden' name= 'an_id' value= '$an_id'>";
				print "<input type= 'hidden' name= 'genotype' value= '$genotype'>";
				
				print "<tr>";
		            print "<td colspan= '5'><input type= \"submit\" name= \"sub_data\" value= \"Submit Pathology Data\" /></td>";
		        print "</tr>";
					
			print "</table>";
			print "</form>";
			
			
			print "<p><a href= \"s_subject.php\">Back to Subject Sample Data Main Page</a><p>";
		
		} // end is !sub_data && $GETFILE
		

	} // end if DBOK
} // end fopen		


?>
   

	<p>&nbsp;</p>


<!-- InstanceEndEditable --> </td>
                </tr>
	       </table>
      </td>
    </tr>

	<tr>
    	<td height="3px" bgcolor="#18477B"></td>
    </tr>
    
    <tr>
    	<td valign="bottom" height="25px" bgcolor="#C4CCC9">
        <div id="p66_foot">
          <div align="left">
            <div id="p66_foot2">
              <div align="left">&nbsp;&nbsp;&nbsp;This project is supported by the US NIH/NIA under award number NIH/NIA P01 AG025532 &copy; 2009 p66Shc project. All rights reserved</div>
            </div>
          </div>
        </div></td>
  </tr>
</table>


</body>
<!-- InstanceEnd --></html>
