<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ketosis - Subjects Sample Data</title>
</head>

<body>

	<div id="left_nav">&nbsp;&nbsp;<a href="data_center.php" class="left_nav">Data Center Home</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project1" class="left_nav">Project 1</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project2" class="left_nav">Project 2</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project3" class="left_nav">Project 3</a></div>
<!--<div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Project4" class="left_nav">Project 4</a></div> -->
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreA" class="left_nav">Core A (Internal Information)</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreB" class="left_nav">Core B</a></div>
    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=CoreC" class="left_nav">Core C</a></div>
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Meetings" class="left_nav">Monthly Meetings</a></div> -->
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="data_center.php?getfiles=Abstracts" class="left_nav">Abstracts</a></div> -->
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="publications.php" class="left_nav">Publications</a></div> -->
    <div id="left_nav">&nbsp;&nbsp;<a href="subject.php" class="left_nav">Sample Data</a></div>
<!--    <div id="left_nav">&nbsp;&nbsp;<a href="http://p66Shc.phs.ucdavis.edu/data_logout.php" class="left_nav">Logout</a></div> -->

<p>&nbsp;</p>


<?php

// include function library
include "./include/common.lib.php";
//ini_set('upload_max_filesize', '102,400,000 ');
//$max_size =  ini_get('upload_max_filesize');
//print "$max_size!";

$p66_authorized = "";
$uploadby = "";

//$upload_by = $_SESSION["p66_user"];

$sub_data = "";
$project = "";
$core = "";
$liv_key = "";

$order_by = "";

$liv_key_text = "";
//$liv_key_array = explode(" ", $liv_key_text);
//$key_count = count($liv_key_array);

$liv_data = "";
$liv_location = "";
$liv_desc = "";

$notify_email = "";

//$upload_liv_dir = "/usr/local/www/p66Shc/liv3express/";
// $upload_liv_dir = "/usr/local/secure_www/p66Shc/";
$liv_link = "";
$doc_link = "";
$doc_hash = "";
$doc_name = "";

$getfiles = "";

if(isset($_POST['p66_authorized'])) $p66_authorized = $_POST["p66_authorized"];
if ($p66_authorized == "Continue to Data Center Home") $_SESSION["p66_access"] = "p66_OK";

if(isset($_POST['pname'])) $_SESSION["p66_user"] = $_POST["pname"];
if(isset($_SESSION["p66_user"])) $upload_by = $_SESSION["p66_user"];

if(isset($_POST['ck_fname'])) $sub_data = $_POST["sub_data"];
if(isset($_POST['project'])) $project = $_POST["project"];
if(isset($_POST['core'])) $core = $_POST["core"];
if(isset($_POST['liv_key'])) $liv_key = $_POST["liv_key"];

if(isset($_POST['order_by'])) $order_by = $_POST["order_by"];

if(isset($_POST['liv_key'])) $liv_key_text = $_POST["liv_key"];
$liv_key_array = explode(" ", $liv_key_text);
$key_count = count($liv_key_array);

if(isset($_POST['liv_data'])) $liv_data = $_POST["liv_data"];
if(isset($_POST['liv_location'])) $liv_location = $_POST["liv_location"];
if(isset($_POST['liv_desc'])) $liv_desc = $_POST["liv_desc"];

if(isset($_POST['notify_email'])) $notify_email = $_POST["notify_email"];

//$upload_liv_dir = "/usr/local/www/p66Shc/liv3express/";
$upload_liv_dir = "/usr/local/secure_www/p66Shc/";
if(isset($_POST['liv_link'])) $liv_link = $_POST["liv_link"];

if(isset($_GET["getfiles"])) $getfiles = $_GET["getfiles"];



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
	 $liv_key_text = preg_replace($targets, $replaces, $liv_key_text);
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "p66shc"))) 
	{
		if ($_SESSION["p66_access"] == "p66_OK")
		{
			print "";
		}
		else
		{
			$sess_id = $_SESSION["p66_access"];
			print "$upload_by You are not authorized to view this page $sess_id";
			die();
		}

		if ($sub_data == "Upload Data File")
		{
			//get the highest key number attach to the beginning of the file name to avoid duplicate names
			$q_maxid = "SELECT MAX(liv_id) FROM liv3express";
			$r_maxid = mysqli_query($link, $q_maxid);
			$row_maxid = mysqli_fetch_row($r_maxid);
			
			$liv_id = $row_maxid[0] + 1;
			
			// move files from temporary location to server subdirectory
//			$upload_liv_file = $upload_liv_dir.$liv_id.basename($_FILES["liv_location"]["name"]);
			$upload_liv_file = basename($_FILES["liv_location"]["name"]);
			
//			$liv_base = "http://p66shc.phs.ucdavis.edu/liv3express/";
//			$liv_link = $liv_base.$liv_id.basename($_FILES["liv_location"]["name"]);
			
			$doc_link = $upload_liv_dir.$liv_id.$upload_liv_file;
			$doc_name = $liv_id.$upload_liv_file;
			$doc_hash = MD5($liv_id.$upload_liv_file);
			
			$valid_form = true;

			if (!move_uploaded_file($_FILES["liv_location"]["tmp_name"], $doc_link))	// verify CV file has been attached
			{
				print "<font color= \"red\">Your data file has not been uploaded.<br></font>";
				print_r($_FILES);
				print "<p>$upload_liv_file<p>";
				$valid_form = false;
			}

			if ($valid_form == true)
			{
				$upload_date = date("c");
				
				$q_upload = "INSERT INTO liv3express (doc_link, project, core, liv_desc, liv_key, liv_data, upload_date, upload_by, notify_email, doc_hash, doc_name)
				VALUES (\"$doc_link\", \"$project\", \"$core\", \"$liv_desc\", \"$liv_key\", \"$liv_data\", \"$upload_date\", \"$upload_by\", \"$notify_email\", \"$doc_hash\", \"$doc_name\")";
				
				$r_upload = mysqli_query($link, $q_upload);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "The data file has been successfully uploaded.  <a href= \"data_center.php\">Go Back to Data Files</a>";

// SEND E-MAIL NOTIFICATION TO KYOUNGMI KIM AND ADDRESSES LISTED IN THE CC NOTIFICATION					
					$file_type = "";
					
					if ($project == "Project 1") $file_type .= "Project 1 ";
					if ($project == "Project 2") $file_type .= "Project 2 ";
					if ($project == "Project 3") $file_type .= "Project 3 ";
					if ($project == "Project 4") $file_type .= "Project 4 ";
					
					if ($core == "Core A") $file_type .= "Core A ";
					if ($core == "Core B") $file_type .= "Core B ";
					if ($core == "Core C") $file_type .= "Core C ";
					if ($core == "Monthly Meeting") $file_type .= "Monthly Meeting ";
					if ($core == "Abstract") $file_type .= "Abstract";
					
					$to = "kmkim@ucdavis.edu";
					$cc_email = $notify_email;
					$subject = "Ketosis Data File Upload notifcation";
					$contents = "Hello, \n\n";
					$contents .= "A Ketosis data file for $file_type has been uploaded by $upload_by.  \n\n";
					
					
					$contents .= "Please visit our website at http://ketosis.ucdavis.edu/data_login.php to view this file. \n\n";
//					$contents .= "If you have any questions please contact Amber Carrere at (530) 754-4992. \n\n";
					$contents .= "Best regards, \n\n";
					$contents .= "Ketosis Study";
					$from = "noreply@ucdavis.edu";
					$header = "From: \"Ketosis Study\" <".$from.">\r\n"; 
					$header.= "CC:".$cc_email."\r\n";
	
					mail($to, $subject, $contents, $header);
// END E-MAIL NOTIFICATION					

// SEND E-MAIL NOTIFICATION TO ALL IF THE FILE TYPE IS MONTHLY MEETING

					if ($core == "Monthly Meeting")
					{
						$q_notify = "SELECT * FROM p66_users WHERE db_access = \"1\" ";
						$r_notify = mysqli_query($link, $q_notify);
				
						while ($row_notify = mysqli_fetch_array($r_notify, MYSQLI_ASSOC))
						{
		//					$to = "cornelwade@sbcglobal.net";
							$to = $row_notify['email'];
		//					$ccemail = "margaret@cdoc-online.org";
							$subject = "Ketosis Monthly Meeting Notes Uploaded";

							$contents = "Hello $row_notify[fname], \n\n";
							$contents .= "Ketosis monthly meeting notes have been uploaded by $upload_by.  \n\n";
					
							$contents .= "Please visit http://ketosis.ucdavis.edu/data_login.php to view this file. \n\n";
							$contents .= "Best regards, \n\n";
							$contents .= "Ketosis Study";
							$from = "noreply@ucdavis.edu";
							$header = "From: \"Ketosis Study\" <".$from.">\r\n"; 
							$header.= "CC:".$cc_email."\r\n";
	
							mail($to, $subject, $contents, $header);
						} // end while
					}// end if

//  END E-MAIL TO ALL
				
				} // end if mysql_affected_rows >= 1
			
			} // end if $valid_form == true
		
		
		} // end if sub_data = Upload Data File
		
// IF SUB_DATA = RETRIEVE DATA FILE
		
		if ($sub_data == "Retrieve Data File")
		{
			$q_retrieve = "SELECT * FROM liv3express WHERE project LIKE \"$project\" AND core LIKE \"$core\" AND ( ";
			
			// if a value is selected for a keyword is entered add to the WHERE clause
			if ($key_count == 0)
			{
				$q_retrieve .= "liv_key LIKE \"%%\" ";
			}
			
			if ($key_count > 0)
			{
				$or_count = 0;
				
				foreach ($liv_key_array as $key_search)
				{
					$or_count++;
					
					$q_retrieve .= "liv_key LIKE \"%$key_search%\" ";
					
					if ($or_count < $key_count) $q_retrieve .= "OR ";
					
				} // end foreach
			} // end $key_count > 0
			
			$q_retrieve .= ") ";
			
			$q_retrieve .= "ORDER BY $order_by";
				
			$r_retrieve = mysqli_query($link, $q_retrieve);
			
			print "<table border= \"0\" >";
			
			$project_msg = "<font color= \"#FF0000\">All Projects</font>";
			$core_msg = "<font color= \"#FF0000\">All Cores</font>";
			
			if ($project <> "%%") $project_msg = "<font color= \"#FF0000\">$project</font>";
			if ($core <> "%%") $core_msg = "<font color= \"#FF0000\">$core</font>";
			
			$search_msg = "Search Results for $project_msg and $core_msg";
			
			if ($liv_key) $search_msg .= " and keywords <font color= \"#FF0000\">$liv_key</font>";
			
			print "<tr><td colspan= \"2\"><strong>$search_msg</strong></td></tr>";
			
			print "<tr><td>&nbsp;</td></tr>";
			
					
				while ($row_retrieve = mysqli_fetch_array($r_retrieve, MYSQLI_ASSOC))
				{
					
					$fileLink = "";
					$disp_date = DBDate2Date($row_retrieve['upload_date']);
					
					// either liv_location or doc_hash will be set.  Set link to appropriate value
					if ($row_retrieve['liv_location']) $fileLink = $row_retrieve['liv_location'];
					if ($row_retrieve['doc_hash']) $fileLink = "openDoc.php?file_id=$row_retrieve[doc_hash]";
					
					print "<tr>";
						print "<td><strong>Project:</strong></td>";
						print "<td>$row_retrieve[project]</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><strong>Core:</strong></td>";
						print "<td>$row_retrieve[core]</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><strong>Data:</strong></td>";
						print "<td>$row_retrieve[liv_data]</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><strong>Download:</strong></td>";
						print "<td><a href= \"$fileLink\" target= \"_blank\">$fileLink</a>
						($disp_date)</td>";

//						print "<td><a href= \"$row_retrieve[liv_location]\" target= \"_blank\">$row_retrieve[liv_location]</a>
//						($disp_date)</td>";
					print "</tr>";
						
					print "<tr>";
						print "<td><strong>Description:</strong></td>";
						print "<td>$row_retrieve[liv_desc]</td>";
					print "</tr>";
						
					print "<tr><td colspan= \"2\"><hr></td></tr>";
					
					print "<tr><td>&nbsp;</td></tr>";
				
				} // END while row_retrieve
			print "</table>";
			
//			print "<p>$q_retrieve Key Count = $key_count";
				
			print "<p><a href= \"data_center.php\">Go Back</a><p>";
		
		} // end is sub_data == retrieve data file
		
		
// IF !SUB_DATA && $GETFILES
		
		if ((!$sub_data) && ($getfiles))
		{
			
			$where = "";
			
			if ($getfiles == "Project1") $where = "WHERE project LIKE \"Project 1\" ";
			if ($getfiles == "Project2") $where = "WHERE project LIKE \"Project 2\" ";
			if ($getfiles == "Project3") $where = "WHERE project LIKE \"Project 3\" ";
			if ($getfiles == "Project4") $where = "WHERE project LIKE \"Project 4\" ";
			if ($getfiles == "CoreA") $where = "WHERE core LIKE \"Core A\" ";
			if ($getfiles == "CoreB") $where = "WHERE core LIKE \"Core B\" ";
			if ($getfiles == "CoreC") $where = "WHERE core LIKE \"Core C\" ";
			if ($getfiles == "Meetings") $where = "WHERE core LIKE \"Monthly Meeting\" ";
			if ($getfiles == "Abstracts") $where = "WHERE core LIKE \"Abstract\" ";
			
			$q_retrieve = "SELECT * FROM liv3express $where ORDER BY upload_date ";
			
			$r_retrieve = mysqli_query($link, $q_retrieve);
			
			print "<table border= \"0\" >";
			
			
			$search_msg = "Search Results for $getfiles";
			
			print "<tr><td colspan= \"2\"><strong>$search_msg</strong></td></tr>";
			
			print "<tr><td>&nbsp;</td></tr>";
			
					
				while ($row_retrieve = mysqli_fetch_array($r_retrieve, MYSQLI_ASSOC))
				{
					$disp_date = DBDate2Date($row_retrieve['upload_date']);
					
					// either liv_location or doc_hash will be set.  Set link to appropriate value
					if ($row_retrieve['liv_location']) $fileLink = $row_retrieve['liv_location'];
					if ($row_retrieve['doc_hash']) $fileLink = "openDoc.php?file_id=$row_retrieve[doc_hash]";


					print "<tr>";
						print "<td><strong>Project:</strong></td>";
						print "<td>$row_retrieve[project]</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><strong>Core:</strong></td>";
						print "<td>$row_retrieve[core]</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><strong>Data:</strong></td>";
						print "<td>$row_retrieve[liv_data]</td>";
					print "</tr>";
					
					print "<tr>";
						print "<td><strong>Download:</strong></td>";
						print "<td><a href= \"$fileLink\" target= \"_blank\">$fileLink</a>
						($disp_date)</td>";

//						print "<td><a href= \"$row_retrieve[liv_location]\" target= \"_blank\">$row_retrieve[liv_location]</a>
//						($disp_date)</td>";
					print "</tr>";
						
					print "<tr>";
						print "<td><strong>Description:</strong></td>";
						print "<td>$row_retrieve[liv_desc]</td>";
					print "</tr>";
						
					print "<tr><td colspan= \"2\"><hr></td></tr>";
					
					print "<tr><td>&nbsp;</td></tr>";
				
				} // END while row_retrieve
			print "</table>";
			
//			print "<p>$q_retrieve Key Count = $key_count";
				
			print "<p><a href= \"data_center.php\">Go Back</a><p>";
		
		} // end is !sub_data && $GETFILE
		
		
		if ((!$sub_data) && (!$getfiles))
		{
			print "<table border= \"0\" width= \"100%\">";
		    print "<form enctype= \"multipart/form-data\" method= \"post\" action= \"data_center.php\">";
				print "<tr>";
		        	print "<td colspan=\"2\"><strong>UPLOAD DATA FILE</strong></td>";
		        print "</tr>";
        
//		        $post_size = ini_get("post_max_size");
//				$upload_size = ini_get("upload_max_filesize");
				
				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Project:</strong></td>";
					print "<td>";
		            	print "<select name= \"project\">";
		                	print "<option value=\"none\">(Select Project)</option>";
		                    print "<option value=\"Project 1\">Project 1</option>";
		                    print "<option value=\"Project 2\">Project 2</option>";
		                    print "<option value=\"Project 3\">Project 3</option>";
//		                    print "<option value=\"Project 4\">Project 4</option>";
		                print "</select>";
					print "</td>";
				print "</tr>";
        
				print "<tr>";
					print "<td><strong>Core:</strong></td>";
					print "<td>";
		            	print "<select name= \"core\">";
		                	print "<option value=\"none\">(Select Core)</option>";
		                    print "<option value=\"Core A\">Core A</option>";
		                    print "<option value=\"Core B\">Core B</option>";
		                    print "<option value=\"Core C\">Core C</option>";
							print "<option value=\"Monthly Meeting\">Monthly Meeting</option>";
							print "<option value=\"Abstract\">Abstract</option>";
		                print "</select>";
					print "</td>";
				print "</tr>";
        
		        print "<tr>";
		        	print "<td><strong>Data File:</strong></td>";
		   			print "<td><input type= \"hidden\" name= \"MAX_FILE_SIZE\" value= \"15000000\">";
					print "<input type= \"file\" name= \"liv_location\" value= \"\" size= \"30\"></td>";
		        print "</tr>";
        
		        print "<tr>";
		        	print "<td><strong>Keyword(s):</strong></td>";
		            print "<td><input type= \"text\" name= \"liv_key\" size= \"45\"/></td>";
		        print "</tr>";

		        print "<tr>";
		        	print "<td><strong>Data:</strong></td>";
		            print "<td><input type= \"text\" name= \"liv_data\" size= \"45\" /></td>";
		        print "</tr>";
        

		        print "<tr>";
		        	print "<td valign=\"top\"><strong>Description:</strong></td>";
		            print "<td><textarea name= \"liv_desc\" cols= \"50\" rows=\"6\">$liv_desc</textarea></td>";
		        print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
        
		        print "<tr>";
		        	print "<td valign=\"top\"><strong>Enter cc: e-mail address(s) to notify:</strong><br>
					(Separate e-mail addresses with a \",\")</td>";
		            print "<td><input type= \"text\" name= \"notify_email\" size= \"45\" value= \"$notify_email\"></td>";
		        print "</tr>";
        
		        print "<tr>";
		        	print "<td>&nbsp;</td>";
		            print "<td><input type= \"submit\" name= \"sub_data\" value= \"Upload Data File\" /></td>";
		        print "</tr>";
		    print "</form>";

				print "<tr><td colspan=\"2\">&nbsp;</td></tr>";

				print "<tr><td colspan=\"2\"><hr /></td></tr>";

				print "<tr><td colspan=\"2\">&nbsp;</td></tr>";
                
		    print "<form name= \"data_upload\" method= \"post\" action= \"data_center.php\">";
		        print "<tr>";
		        	print "<td colspan=\"2\"><strong>RETRIEVE DATA FILE</strong></td>";
		        print "</tr>";
        
		        print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Project:</strong></td>";
					print "<td>";
		            	print "<select name= \"project\">";
		                	print "<option value=\"%%\">(All Projects)</option>";
		                    print "<option value=\"Project 1\">Project 1</option>";
		                    print "<option value=\"Project 2\">Project 2</option>";
		                    print "<option value=\"Project 3\">Project 3</option>";
//		                    print "<option value=\"Project 4\">Project 4</option>";
		                print "</select>";
					print "</td>";
				print "</tr>";
        
				print "<tr>";
					print "<td><strong>Core:</strong></td>";
					print "<td>";
		            	print "<select name= \"core\">";
		                	print "<option value=\"%%\">(All Cores)</option>";
		                    print "<option value=\"Core A\">Core A</option>";
		                    print "<option value=\"Core B\">Core B</option>";
		                    print "<option value=\"Core C\">Core C</option>";
							print "<option value=\"Monthly Meeting\">Monthly Meeting</option>";
							print "<option value=\"Abstract\">Abstract</option>";
		                print "</select>";
					print "</td>";
				print "</tr>";
        
		        print "<tr>";
		        	print "<td><strong>Keyword(s):</strong></td>";
		            print "<td><input type= \"text\" name= \"liv_key\" size= \"45\" /></td>";
		        print "</tr>";

		        print "<tr>";
		        	print "<td><strong>Order by:</strong></td>";
		            print "<td><select name= \"order_by\">";
		                	print "<option value=\"upload_date\">(Select Order)</option>";
		                    print "<option value=\"upload_date\">Upload Date</option>";
		                    print "<option value=\"project\">Project</option>";
		                    print "<option value=\"core\">Core</option>";
		            print "</td>";
		        print "</tr>";

		        print "<tr>";
		        	print "<td>&nbsp;</td>";
		            print "<td><input type= \"submit\" name= \"sub_data\" value= \"Retrieve Data File\" /></td>";
		        print "</tr>";
		    print "</form>";

			print "</table>";

		
		} // end if !$sub_data


	} // end if DBOK
} // end fopen		


?>
   

</body>
</html>
