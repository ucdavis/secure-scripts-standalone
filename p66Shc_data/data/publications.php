<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/p66Shc_text.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>p66Shc - Data File</title>
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

$sub_by = $_SESSION["p66_user"];

$sub_pub = "";
$pub_id = "";
$authors = "";
$year = "";
$pub_title = "";
$issue = "";
$volume = "";
$pages = "";
$pmid = "";
$weblink = "";

if(isset($_POST['sub_pub'])) $sub_pub = $_POST["sub_pub"];
if(isset($_POST['pub_id'])) $pub_id = $_POST["pub_id"];
if(isset($_POST['authors'])) $authors = $_POST["authors"];
if(isset($_POST['year'])) $year = $_POST["year"];
if(isset($_POST['pub_title'])) $pub_title = $_POST["pub_title"];
if(isset($_POST['issue'])) $issue = $_POST["issue"];
if(isset($_POST['volume'])) $volume = $_POST["volume"];
if(isset($_POST['pages'])) $pages = $_POST["pages"];
if(isset($_POST['pmid'])) $pmid = $_POST["pmid"];
if(isset($_POST['weblink'])) $weblink = $_POST["weblink"];

//$upload_liv_dir = "/usr/local/www/p66Shc/liv3express/";

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
//	 $liv_key_text = preg_replace($targets, $replaces, $liv_key_text);
	 
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

		if ($sub_pub == "Enter Publication")
		{
			$valid_form = true;

			if (!$authors)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the authors.<br></font>";
				$valid_form = false;
			}

			if (!$year)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the publication year.<br></font>";
				$valid_form = false;
			}

			if (!$pub_title)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the title.<br></font>";
				$valid_form = false;
			}

			if (!$publication)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the publication.<br></font>";
				$valid_form = false;
			}


			if ($valid_form == true)
			{
				$sub_date = date("c");
				$sub_ip = $_SERVER['REMOTE_ADDR'];  //Get the IP address of the computer
				
				$q_insert = "INSERT INTO p66_pubs (authors, year, pub_title, publication, issue, volume, pages, pmid, weblink, 
				sub_date, sub_by, sub_ip)
				VALUES (\"$authors\", \"$year\", \"$pub_title\", \"$publication\", \"$issue\", \"$volume\", \"$pages\", \"$pmid\",
				\"$weblink\", \"$sub_date\", \"$sub_by\", \"$sub_ip\")";
				
				$r_insert = mysqli_query($link, $q_insert);
				if (mysql_affected_rows($link) >= 1)
				{
					print "The publication has been entered.  <a href= \"publications.php\">View all publications</a>";

// SEND E-MAIL NOTIFICATION TO KYOUNGMI KIM AND ADDRESSES LISTED IN THE CC NOTIFICATION					

					$to = "kmkim@ucdavis.edu";
//					$cc_email = $notify_email;
					$subject = "p66Shc Publication";
					$contents = "Hello, \n\n";
					$contents .= "A p66Shc publication titled $pub_title has been entered by $sub_by.  \n\n";
					
					
					$contents .= "Please visit our website at http://p66shc.phs.ucdavis.edu/data_login.php to view this entry. \n\n";
//					$contents .= "If you have any questions please contact Amber Carrere at (530) 754-4992. \n\n";
					$contents .= "Best regards, \n\n";
					$contents .= "p66Shc Program";
					$from = "noreply@ucdavis.edu";
					$header = "From: \"p66Shc Program\" <".$from.">\r\n"; 
					$header.= "CC:".$cc_email."\r\n";
	
					mail($to, $subject, $contents, $header);
// END E-MAIL NOTIFICATION					

				} // end if mysql_affected_rows >= 1
			
			} // end if $valid_form == true
		
		
		} // end if sub_pub = Enter Publication
		
// IF SUB_DATA = RETRIEVE DATA FILE
		
		if ($sub_pub == "Update Publication")
		{
			$valid_form = true;

			if (!$authors)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the authors.<br></font>";
				$valid_form = false;
			}

			if (!$year)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the publication year.<br></font>";
				$valid_form = false;
			}

			if (!$pub_title)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the title.<br></font>";
				$valid_form = false;
			}

			if (!$publication)	// verify first name is entered
			{
				print "<font color= \"red\">Please enter the publication.<br></font>";
				$valid_form = false;
			}


			if ($valid_form == true)
			{
				$update_date = date("c");
				$sub_ip = $_SERVER['REMOTE_ADDR'];  //Get the IP address of the computer
				
				$q_update = "UPDATE p66_pubs SET authors = \"$authors\", year = \"$year\", pub_title = \"$pub_title\", 
				issue = \"$issue\", volume = \"$volume\", pages = \"pages\", pmid = \"$pmid\", weblink = \"$weblink\", 
				sub_date = \"$update_date\", sub_by = \"$sub_by\", sub_ip = \"$sub_ip\", publication = \"$publication\" 
				WHERE pub_id = \"$pub_id\" ";
				
				$r_update = mysqli_query($link, $q_update);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "The publication has been updated.  <a href= \"publications.php\">View all publications</a>";

// SEND E-MAIL NOTIFICATION TO KYOUNGMI KIM AND ADDRESSES LISTED IN THE CC NOTIFICATION					

					$to = "kmkim@ucdavis.edu";
//					$cc_email = $notify_email;
					$subject = "p66Shc Publication";
					$contents = "Hello, \n\n";
					$contents .= "The p66Shc publication titled $pub_title has been updated by $sub_by.  \n\n";
					
					
					$contents .= "Please visit our website at http://p66shc.phs.ucdavis.edu/data_login.php to view this entry. \n\n";
//					$contents .= "If you have any questions please contact Amber Carrere at (530) 754-4992. \n\n";
					$contents .= "Best regards, \n\n";
					$contents .= "p66Shc Program";
					$from = "noreply@ucdavis.edu";
					$header = "From: \"p66Shc Program\" <".$from.">\r\n"; 
					$header.= "CC:".$cc_email."\r\n";
	
					mail($to, $subject, $contents, $header);
// END E-MAIL NOTIFICATION					

				} // end if mysql_affected_rows >= 1
			
			} // end if $valid_form == true
		
		} // end is sub_pub == Update Publication
		
		
// IF sub_pub == Add or Edit Publication
		
		if (($sub_pub == "Add Publication") || ($sub_pub == "Edit Publication") || 
		(($sub_pub == "Enter Publication") && ($valid_form == false)) || 
		(($sub_pub == "Update Publication") && ($valid_form == false)))
		{
			$publication = "";
			$update = "";
			
			if (($sub_pub == "Edit Publication") || ($sub_pub == "Update Publication"))
			{
				$update = "yes";
				
				if ($sub_pub == "Edit Publication")
				{
					$q_update = "SELECT * FROM p66_pubs WHERE pub_id = \"$pub_id\" ";
					$r_update = mysqli_query($link, $q_update);
					$row_update = mysqli_fetch_array($r_update, MYSQLI_ASSOC);
				
					$authors = $row_update['authors'];
					$year = $row_update['year'];
					$pub_title = $row_update['pub_title'];
					$issue = $row_update['issue'];
					$volume = $row_update['volume'];
					$pages = $row_update['pages'];
					$pmid = $row_update['pmid'];
					$weblink = $row_update['weblink'];
					$publication = $row_update['publication'];
				} // end if Edit Publication
			} // end if Edit/Update Publication
						
			print "<p>&nbsp;</p><p class= \"top_menu\"><strong>p66Shc Publications</strong></p>";
			
			print "<form name= \"publications\" method= \"post\" action= \"publications.php\">";
			
			print "<table border= \"0\" >";
					
				print "<tr>";
					print "<td><strong>Authors:</strong></td>";
					print "<td><input type= \"text\" name= \"authors\" value= \"$authors\" size= \"120\"></td>";
				print "</tr>";
					
				print "<tr>";
					print "<td><strong>Year:</strong></td>";
					print "<td><input type= \"text\" name= \"year\" value= \"$year\"></td>";
				print "</tr>";
					
					print "<tr>";
						print "<td><strong>Title</strong></td>";
						print "<td><input type= \"text\" name= \"pub_title\" value= \"$pub_title\" size= \"120\"></td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><strong>Publication</strong></td>";
						print "<td><input type= \"text\" name= \"publication\" value= \"$publication\" size= \"120\"></td>";
					print "</tr>";
						
					print "<tr>";
						print "<td><strong>Issue:</strong></td>";
						print "<td><input type= \"text\" name= \"issue\" value= \"$issue\"></td>";
					print "</tr>";
						
					print "<tr>";
						print "<td><strong>Volume:</strong></td>";
						print "<td><input type= \"text\" name= \"volume\" value= \"$volume\"></td>";
					print "</tr>";
						
					print "<tr>";
						print "<td><strong>Pages:</strong></td>";
						print "<td><input type= \"text\" name= \"pages\" value= \"$pages\"></td>";
					print "</tr>";
						
					print "<tr>";
						print "<td><strong>PMID:</strong></td>";
						print "<td><input type= \"text\" name= \"pmid\" value= \"$pmid\"></td>";
					print "</tr>";
						
					print "<tr>";
						print "<td><strong>Web Link:</strong></td>";
						print "<td><input type= \"text\" name= \"weblink\" value= \"$weblink\" size= \"120\"></td>";
					print "</tr>";
						
					print "<tr><td>&nbsp;</td></tr>";
					
					if ($update == "yes")
					{
						print "<tr>";
							print "<td><input type= \"submit\" name= \"sub_pub\" value= \"Update Publication\"></td>";
							print "<input type= \"hidden\" name= \"pub_id\" value= \"$pub_id\">";
						print "</tr>";
					}
					else
					{
						print "<tr>";
							print "<td><input type= \"submit\" name= \"sub_pub\" value= \"Enter Publication\"></td>";
						print "</tr>";
					}
					
					
					print "<tr><td colspan= \"2\"><hr></td></tr>";
					
					print "<tr><td>&nbsp;</td></tr>";
				
				print "</table>";
				print "</form>";
			
			
			print "<p><a href= \"publications.php\">Go Back</a><p>";
		
		} // end if sub_pub == Add or Edit Publication
		
		
		if (!$sub_pub)
		{
			print "<strong>Publications</strong><p>";

			$q_pubs = "SELECT * FROM p66_pubs ORDER BY year, authors";
			$r_pubs = mysqli_query($link, $q_pubs);
			
			print "<blockquote>";
		
			print "<table border= \"0\">";

				print "<tr>";
					print "<td colspan= \"2\">";
						print "<form name= \"add_pub\" method= \"post\" action= \"publications.php\">";
						print "<input type= \"submit\" name= \"sub_pub\" value= \"Add Publication\">";
						print "</form>";
					print "</td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";

			$year = "";
			while ($row_pubs = mysqli_fetch_array($r_pubs, MYSQLI_ASSOC))
				{
					$prev_year = $year;
				
					$pub_id = $row_pubs['pub_id'];
					$authors = $row_pubs['authors'];
					$year = $row_pubs['year'];
					$title = $row_pubs['pub_title'];
					$publication = $row_pubs['publication'];
					$issue = $row_pubs['issue'];
					$volume = $row_pubs['volume'];
					$pages = $row_pubs['pages'];
					$pmid = $row_pubs['pmid'];
					$weblink = $row_pubs['weblink'];
					$abstract = $row_pubs['pub_abstract'];
				
					if ($prev_year <> $year)
					{
						$pub_ct = 1;
						print "<tr>";
							print "<td valign= \"top\" colspan= \"1\"><strong>$year</strong></td>";
						print "</tr>";
					
						print "<tr><td>&nbsp;</td></tr>";
					}
			
					print "<tr>";
						print "<td valign= \"top\">$pub_ct.</td>";
						print "<td valign= \"top\">$authors. ($year) $title. $publication. $issue";
					
						if ($volume) print "($volume)";
					
						print ":$pages.";
						if ($pmid) print " PMID $pmid</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td>&nbsp;</td>";
						print "<td colspan= \"1\">";
							print "<form name= \"update_pub\" method= \"post\" action= \"publications.php\">";
							print "<input type= \"submit\" name= \"sub_pub\" value= \"Edit Publication\">";
							print "<input type= \"hidden\" name= \"pub_id\" value= \"$pub_id\">";
							print "</form>";
						print "</td>";
					print "</tr>";
				
					print "<tr><td>&nbsp;</td></tr>";

					$pub_ct++;
		
				} // end WHILE
				
				print "</table>";
			
				print "</blockquote>";
		
		} // end if !$sub_pub


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
