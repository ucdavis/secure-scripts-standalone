<?php
include "kb_authentication.php"; 
require_once "/usr/local/secure_www/db.config.php";
//require_once "http://intranet.phs.ucdavis.edu/config.inc.php";
// $leftnavROOT=$GLOBALS['ROOT_DIR'];
$leftnavROOT="http://intranet.phs.ucdavis.edu";
$auth_lname = "";
$auth_fmname = "";

// gather client IP information
$client_ip = $_SERVER['REMOTE_ADDR'];
$client_ip_chunks = explode(".",$client_ip);
$client_ip_subnet = $client_ip_chunks[0].".".$client_ip_chunks[1].".".$client_ip_chunks[2];

// list of subnets not requiring authentication
$allowed_subnets = array('169.237.157','169.237.40'); 

//echo $client_ip_subnet;

if(!in_array($client_ip_subnet,$allowed_subnets))
{
	include_once('CAS/CAS.php');
	phpCAS::setDebug();
	phpCAS::client(CAS_VERSION_2_0,'cas.ucdavis.edu',443,'cas');
	phpCAS::setNoCasServerValidation();
	phpCAS::forceAuthentication();
	$userID = phpCAS::getUser();
	
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
		
		if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"))) 
		{
			$sql2 = "select * from people where authid like \"$userID\"";
			if ($result2 = mysqli_query($link, $sql2)) 
			{
				if ($line2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
				{
					$auth_lname = $line2["lname"];
					$auth_fmname = $line2["fmname"];
				}
				else 
				{
					header("Location: http://phs.ucdavis.edu/error/forbidden_intranet.php");
					exit;	
				}
			}
			else 
			{
				header("Location: http://phs.ucdavis.edu/error/forbidden_intranet.php");
				exit;
			}
		}
		else 
		{
			header("Location: http://phs.ucdavis.edu/error/error_intranet.php?error=DatabaseError");
			exit;
		}
	}
	else 
	{
		header("Location: http://phs.ucdavis.edu/error/error_intranet.php?error=NoMyCnf");
		exit;
	}

} // auth-user if

session_start();
?> 
<HTML><!-- InstanceBegin template="/Templates/Dept Private.dwt.php" codeOutsideHTMLIsLocked="true" -->
<link href="http://intranet.phs.ucdavis.edu/inc/default.css" rel="stylesheet" type="text/css">
<HEAD>
<STYLE> <!-- body { margin-top: 0; margin-left: 0 } --> </STYLE>
<link rel="StyleSheet" type="text/css" href="http://intranet.phs.ucdavis.edu/inc/default.css">

<!-- #BeginEditable "doctitle" -->
<TITLE>PHS Department Only</TITLE>


<!-- #EndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>
<BODY background="http://intranet.phs.ucdavis.edu/images/MedSchBack.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#333399"><table width="100%" border="0" cellpadding="2" cellspacing="0">
	<tr>
		<td align="left" nowrap>&nbsp; <b><font color="#FFCC00">PHS Intranet Web Site</font></b></td>
		<td align="center" nowrap><b><font color="#FFCC00"><?php if ($auth_lname) print "Hello"; ?> <?=$auth_fmname?> <?=$auth_lname?></font></b></td>
		<td align="right" nowrap><a href="http://www.ucdavis.edu/" class="navW80">UC Davis Home </a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; <a href="http://www.ucdmc.ucdavis.edu/medicalgroup/" class="navW80"></a><a href="http://www.ucdmc.ucdavis.edu/" class="navW80">Health
   		System</a> &nbsp;</td>
	</tr>
</table>
</td>
  </tr>
  <tr>
  	<td bgcolor="#000000"><a href="/welcome.php"><img src="http://intranet.phs.ucdavis.edu/images/PHStitle.gif" alt="" width="775" height="60" border="0"></a></td>
  	</tr>
  <tr>
  	<td bgcolor="#FFCC00"><img src="http://intranet.phs.ucdavis.edu/images/GoldBar.gif" alt="" width="775" height="4"></td>
  	</tr>
  <tr>
  	<td bgcolor="#333399"><table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td nowrap>&nbsp; <a href= "<?=$leftnavROOT?>/welcome.php" class="navW">Home</a>  &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href="http://phs.ucdavis.edu/" class="navW">Public Web</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/Misc/phonelist.php" class="navW">Employees</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/database.php" class="navW">Databases</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/CPP/compindex.php" class="navW">Computer</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/CPP/dppindex.php" class="navW">Policy</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/travel/TravelToDo.php" class="navW">Travel</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/Misc/press.php" class="navW">Publicity</a> &nbsp; <font color="#FFFFFF">&#8226;</font> &nbsp; 
		<a href= "<?=$leftnavROOT?>/MailLists/Mail_Lists.php" class="navW">E-mail Lists</a></td>
	</tr>
</table></td>
  	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td><!-- #BeginEditable "Content" -->
<?php

// include function library
//include "./include/common.lib.php";
//ini_set('upload_max_filesize', '102,400,000 ');
//$max_size =  ini_get('upload_max_filesize');
//print "$max_size!";

$upload_kb_dir = "/usr/local/secure_www/knowledgebase/";

$kb_title = "";
$kb_keywords = "";
$kb_content = "";
$more_info = "";
$cat_email = "";
$cat_hw = "";
$cat_sw = "";
$cat_windows = "";
$cat_mac = "";
$cat_printer = "";
$cat_network = "";
$cat_website = "";
$cat_fileshare = "";
$cat_useracct = "";
$cat_policy = "";
$last_update = "";
$show_web = "";
$show_faq = "";
$id = "";

$img_location = "";
$info_location = "";
$demo_location = "";

$img_file = "";
$img_hash = "";
$img_name = "";
$info_file = "";
$info_hash = "";
$info_name = "";
$demo_file = "";
$demo_hash = "";
$demo_name = "";
$auth_fmname = "";
$auth_lname = "";
//$liv_key_array = explode(" ", $liv_key_text);
//$key_count = count($liv_key_array);

if(isset($_POST['id'])) $id = $_POST["id"];
if(isset($_POST['kb_title'])) $kb_title = $_POST["kb_title"];
if(isset($_POST['kb_keywords'])) $kb_keywords = $_POST["kb_keywords"];
if(isset($_POST['kb_content'])) $kb_content = $_POST["kb_content"];
if(isset($_POST['more_info'])) $more_info = $_POST["more_info"];
if(isset($_POST['cat_email'])) $cat_email = $_POST["cat_email"];
if(isset($_POST['cat_hw'])) $cat_hw = $_POST["cat_hw"];
if(isset($_POST['cat_sw'])) $cat_sw = $_POST["cat_sw"];
if(isset($_POST['cat_windows'])) $cat_windows = $_POST["cat_windows"];
if(isset($_POST['cat_mac'])) $cat_mac = $_POST["cat_mac"];
if(isset($_POST['cat_printer'])) $cat_printer = $_POST["cat_printer"];
if(isset($_POST['cat_network'])) $cat_network = $_POST["cat_network"];
if(isset($_POST['cat_website'])) $cat_website = $_POST["cat_website"];
if(isset($_POST['cat_fileshare'])) $cat_fileshare = $_POST["cat_fileshare"];
if(isset($_POST['cat_useracct'])) $cat_useracct = $_POST["cat_useracct"];
if(isset($_POST['cat_policy'])) $cat_useracct = $_POST["cat_policy"];
if(isset($_POST['show_web'])) $show_web = $_POST["show_web"];
if(isset($_POST['show_faq'])) $show_faq = $_POST["show_faq"];

if(isset($_POST['img_location'])) $img_location = $_POST["img_location"];
if(isset($_POST['info_location'])) $info_location = $_POST["info_location"];
if(isset($_POST['demo_location'])) $demo_location = $_POST["demo_location"];

if(isset($_POST['auth_fmname'])) $auth_fmname = $_POST["auth_fmname"];
if(isset($_POST['auth_lname'])) $auth_lname = $_POST["auth_lname"];

$last_update = "$auth_fmname $auth_lname";

$kb_title = filter_var($kb_title, FILTER_SANITIZE_STRING);
$kb_keywords = filter_var($kb_keywords, FILTER_SANITIZE_STRING);
$kb_content = filter_var($kb_content, FILTER_SANITIZE_STRING);

// if(isset($_POST['order_by'])) $order_by = $_POST["order_by"];

// if(isset($_POST['liv_key'])) $liv_key_text = $_POST["liv_key"];
// $liv_key_array = explode(" ", $liv_key_text);
// $key_count = count($liv_key_array);

// if(isset($_POST['liv_data'])) $liv_data = $_POST["liv_data"];
// if(isset($_POST['liv_location'])) $liv_location = $_POST["liv_location"];
// if(isset($_POST['liv_desc'])) $liv_desc = $_POST["liv_desc"];

//if(isset($_POST['liv_link'])) $liv_link = $_POST["liv_link"];


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
	 $liv_key_text = preg_replace($targets, $replaces, $liv_key_text);
	 
	if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"))) 
	{

		print "<h2>PHS IT Knowledgebase Article Entry Form</h2>";
		
		if (($sub_kb == "Enter Article") || ($sub_kb == "Update Article"))
		{

			$valid_form = true;
			
			//get the highest key number attach to the beginning of the file name to avoid duplicate names
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$hour = date('G');
			$min = date('i');
			$sec = date('s');
			
			$upload_id = "$day$month$year$hour$min$sec";
			
//			$q_maxid = "SELECT MAX(kb_id) FROM knowledge_base";
//			$r_maxid = mysqli_query($link, $q_maxid);
//			$row_maxid = mysqli_fetch_row($r_maxid);
			
//			$upload_id = $row_maxid[0] + 1;

			// move files from temporary location to server subdirectory
			// img file
				$upload_img_file = basename($_FILES["img_location"]["name"]);
				$img_file = $upload_kb_dir.$upload_id.$upload_img_file;
				$img_name = $upload_id.$upload_img_file;
				$img_hash = MD5($upload_id.$upload_img_file);
				
			// info file
				$upload_info_file = basename($_FILES["info_location"]["name"]);
				$info_file = $upload_kb_dir.$upload_id.$upload_info_file;
				$info_name = $upload_id.$upload_info_file;
				$info_hash = MD5($upload_id.$upload_info_file);
			
			
			// demo file
				$upload_demo_file = basename($_FILES["demo_location"]["name"]);						
				$demo_file = $upload_kb_dir.$upload_id.$upload_demo_file;
				$demo_name = $upload_id.$upload_demo_file;
				$demo_hash = MD5($upload_id.$upload_demo_file);

// validate required fields have values

			if (!$kb_title)	// verify title is entered
			{
				print "<font color= \"red\">Please enter a Title.<br></font>";
				$valid_form = false;
			}

			if (!$kb_keywords)	// verify title is entered
			{
				print "<font color= \"red\">Please enter Keywords.<br></font>";
				$valid_form = false;
			}

			if (!$kb_content)	// verify title is entered
			{
				print "<font color= \"red\">Please enter a Description.<br></font>";
				$valid_form = false;
			}

			
			if ($valid_form == true)
			{
				// verfify valid form upload if a file is uploaded

				// img file
				if ($upload_img_file)
				{
					// verify file is in PDF format
//					if ($_FILES["doc_location"]["type"] != "application/pdf")
//					{
//						print "<font color=\"#FF0000\">Invalid file type.  You must upload a PDF file.</font><br>";
//						$valid_form = false;
//					}

					// change to ELSEIF after enabling code to verify file extension
					if (!move_uploaded_file($_FILES["img_location"]["tmp_name"], $img_file)) 	
					// verify image file has been attached
					{
						print "<font color= \"red\">Your image file has not been uploaded.<br></font>";
						print_r($_FILES);
						print "<p>$upload_img_file<p>";
						$valid_form = false;
					}

				} 
				else
				{
					$img_file = "";
					$img_hash = "";
					$img_name = "";
				}// end if $upload_img_file
				

				// info file
				if ($upload_info_file)
				{
					// verify file is in PDF format
//					if ($_FILES["doc_location"]["type"] != "application/pdf")
//					{
//						print "<font color=\"#FF0000\">Invalid file type.  You must upload a PDF file.</font><br>";
//						$valid_form = false;
//					}

					// change to ELSEIF after enabling code to verify file extension
					if (!move_uploaded_file($_FILES["info_location"]["tmp_name"], $info_file)) 	
					// verify info file has been attached
					{
						print "<font color= \"red\">Your information file has not been uploaded.<br></font>";
						print_r($_FILES);
						print "<p>$upload_info_file<p>";
						$valid_form = false;
					}

				} 
				else
				{
					$info_file = "";
					$info_hash = "";
					$info_name = "";
				}// end if $upload_info_file


				// demo file
				if ($upload_demo_file)
				{
					// verify file is in PDF format
//					if ($_FILES["doc_location"]["type"] != "application/pdf")
//					{
//						print "<font color=\"#FF0000\">Invalid file type.  You must upload a PDF file.</font><br>";
//						$valid_form = false;
//					}

					// change to ELSEIF after enabling code to verify file extension
					if (!move_uploaded_file($_FILES["demo_location"]["tmp_name"], $demo_file)) 	
					// verify demo file has been attached
					{
						print "<font color= \"red\">Your demo file has not been uploaded.<br></font>";
						print_r($_FILES);
						print "<p>$upload_demo_file<p>";
						$valid_form = false;
					}

				} 
				else
				{
					$demo_file = "";
					$demo_hash = "";
					$demo_name = "";
				}// end if $upload_demo_file

			} // end if valid_form == true
			
			
			if ($valid_form == true)
			{
				if ($sub_kb == "Enter Article")
				{
					$enter_date = date("c");
					$update_ip = $_SERVER['REMOTE_ADDR'];
				
					$q_insert = "INSERT INTO knowledge_base (kb_title, kb_keywords, kb_content, more_info, cat_email,
					cat_hw, cat_sw, cat_windows, cat_mac, cat_printer, cat_network, cat_website, cat_fileshare,
					cat_useracct, img_file, img_name, img_hash, info_file, info_name, info_hash, demo_file, demo_name,
					demo_hash, enter_date, update_ip, last_update, show_web, show_faq, cat_policy)
					VALUES (\"$kb_title\", \"$kb_keywords\", \"$kb_content\", \"$more_info\", \"$cat_email\",
					\"$cat_hw\", \"$cat_sw\", \"$cat_windows\", \"$cat_mac\", \"$cat_printer\", \"$cat_network\",
					\"$cat_website\", \"$cat_fileshare\", \"$cat_useracct\", \"$img_file\", \"$img_name\", 
					\"$img_hash\", \"$info_file\", \"$info_name\", \"$info_hash\", \"$demo_file\", \"$demo_name\",
					\"$demo_hash\", \"$enter_date\", \"$update_ip\", \"$last_update\", \"$show_web\", \"$show_faq\",
					\"$cat_policy\")";
				
					$r_insert = mysqli_query($link, $q_insert);
					if (mysqli_affected_rows($link) >= 1)
					{
						print "The Knowledge Base has been successfully entered.<br>  
						<a href= \"index.php\">Back to start page</a>";
					} // end if mysql_affected_rows >= 1
				} // end if sub_kb == Enter Article
			
				if ($sub_kb == "Update Article")
				{
					$update_ip = $_SERVER['REMOTE_ADDR'];
				
					$q_insert = "UPDATE knowledge_base SET kb_title = \"$kb_title\", kb_keywords = \"$kb_keywords\",
					kb_content = \"$kb_content\", more_info = \"$more_info\", cat_email = \"$cat_email\",
					cat_hw = \"$cat_hw\", cat_sw = \"$cat_sw\", cat_windows = \"$cat_windows\", cat_mac = \"$cat_mac\",
					cat_printer = \"$cat_printer\", cat_network = \"$cat_network\", cat_website = \"$cat_website\",
					cat_fileshare = \"$cat_fileshare\", cat_useracct = \"$cat_useracct\", 
					cat_policy = \"$cat_policy\" ";
					
					if ($upload_img_file)
					{
						$q_insert .= ", img_file = \"$img_file\",
					img_name = \"$img_name\", img_hash = \"$img_hash\" ";	
					}

					if ($upload_info_file)
					{
						$q_insert .= ", info_file = \"$info_file\", info_name = \"$info_name\", 
						info_hash = \"$info_hash\" ";	
					}

					if ($upload_demo_file)
					{
						$q_insert .= ", demo_file = \"$demo_file\", demo_name = \"$demo_name\", 
						demo_hash = \"$demo_hash\" ";	
					}

					$q_insert .= ", update_ip = \"$update_ip\", 
					last_update = \"$last_update\", show_web = \"$show_web\", show_faq = \"$show_faq\" 
					WHERE kb_id = $id";
				
					$r_insert = mysqli_query($link, $q_insert);
					if (mysqli_affected_rows($link) >= 1)
					{
						print "The Knowledge Base article has been successfully updated. <br> 
						<a href= \"index.php\">Back to start page</a>";
					} 
					else
					{
//						print "$q_insert - $img_location Loc  <br>";
//						print_r ($_FILES);
					}
						// end if mysql_affected_rows >= 1
				} // end if sub_kb == Update Article
			
			} // end if $valid_form == true
		
		
		} // end if sub_kb = Enter Article
		
// IF SUB_KB = Update Article
		
		if (($sub_kb == "Edit Article") || ($sub_kb == "New Article"))
		{
			if ($sub_kb == "Edit Article")
			{
				$q_retrieve = "SELECT * FROM knowledge_base WHERE kb_id LIKE \"$id\" ";			
				$r_retrieve = mysqli_query($link, $q_retrieve);
			
				$row_retrieve = mysqli_fetch_array($r_retrieve, MYSQLI_ASSOC);
			
				$kb_title = $row_retrieve['kb_title'];
				$kb_keywords = $row_retrieve['kb_keywords'];
				$kb_content = $row_retrieve['kb_content'];
				$more_info = $row_retrieve['more_info'];
				$cat_email = $row_retrieve['cat_email'];
				$cat_hw = $row_retrieve['cat_hw'];
				$cat_sw = $row_retrieve['cat_sw'];
				$cat_windows = $row_retrieve['cat_windows'];
				$cat_mac = $row_retrieve['cat_mac'];
				$cat_printer = $row_retrieve['cat_printer'];
				$cat_network = $row_retrieve['cat_network'];
				$cat_website = $row_retrieve['cat_website'];
				$cat_fileshare = $row_retrieve['cat_fileshare'];
				$cat_useracct = $row_retrieve['cat_useracct'];
				$cat_policy = $row_retrieve['cat_policy'];
				$show_web = $row_retrieve['show_web'];
				$show_faq = $row_retrieve['show_faq'];
				$last_update = "$auth_fmname $auth_lname";
			}
			
			print "<table border= \"0\" >";
			print "<form enctype= \"multipart/form-data\" method=\"post\" action=\"index.php\">";
			
				print "<tr>";
					print "<td><strong>Title:</strong></td>";
					print "<td><input type=\"text\" name=\"kb_title\" value=\"$kb_title\" size=\"100\"></td>";
				print "</tr>";
					
				print "<tr>";
					print "<td><strong>Keywords:</strong></td>";
					print "<td><input type=\"text\" name=\"kb_keywords\" value=\"$kb_keywords\" size=\"100\"></td>";
				print "</tr>";
					
				print "<tr>";
					print "<td valign=\"top\"><strong>Description:</strong></td>";
					print "<td><textarea name=\"kb_content\" cols=\"75\" rows=\"6\">$kb_content</textarea></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr><td colspan=\"2\"><strong>Display on Public Web</strong></td></tr>";
				
				print "<tr>";
						print "<td valign= \"top\"><input type= \"checkbox\" name= \"show_web\" value= \"1\" ";
						if ($show_web == "1") print "checked";
						print ">&nbsp;&nbsp;Display in Search Results</td>";

						print "<td valign= \"top\"><input type= \"checkbox\" name= \"show_faq\" value= \"1\" ";
						if ($show_faq == "1") print "checked";
						print ">&nbsp;&nbsp;Display in FAQ List</td>";

				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr><td colspan=\"2\"><strong>Select Subject Matter Area(s)</strong></td></tr>";
				
				print "<tr>";
						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_email\" value= \"1\" ";
						if ($cat_email == "1") print "checked";
						print ">&nbsp;&nbsp;E-mail</td>";

						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_printer\" value= \"1\" ";
						if ($cat_printer == "1") print "checked";
						print ">&nbsp;&nbsp;Printer</td>";

				print "</tr>";

				print "<tr>";
						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_hw\" value= \"1\" ";
						if ($cat_hw == "1") print "checked";
						print ">&nbsp;&nbsp;Hardware</td>";

						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_sw\" value= \"1\" ";
						if ($cat_sw == "1") print "checked";
						print ">&nbsp;&nbsp;Software</td>";

				print "</tr>";

				print "<tr>";
						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_windows\" value= \"1\" ";
						if ($cat_windows == "1") print "checked";
						print ">&nbsp;&nbsp;Windows</td>";

						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_mac\" value= \"1\" ";
						if ($cat_mac == "1") print "checked";
						print ">&nbsp;&nbsp;Mac</td>";

				print "</tr>";

				print "<tr>";
						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_network\" value= \"1\" ";
						if ($cat_network == "1") print "checked";
						print ">&nbsp;&nbsp;Network</td>";

						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_website\" value= \"1\" ";
						if ($cat_website == "1") print "checked";
						print ">&nbsp;&nbsp;Website</td>";

				print "</tr>";

				print "<tr>";
						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_useracct\" value= \"1\" ";
						if ($cat_useracct == "1") print "checked";
						print ">&nbsp;&nbsp;User Account</td>";

						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_fileshare\" value= \"1\" ";
						if ($cat_fileshare == "1") print "checked";
						print ">&nbsp;&nbsp;File Shares</td>";

				print "</tr>";

				print "<tr>";
						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_policy\" value= \"1\" ";
						if ($cat_policy == "1") print "checked";
						print ">&nbsp;&nbsp;Security Policy</td>";

//						print "<td valign= \"top\"><input type= \"checkbox\" name= \"cat_fileshare\" value= \"1\" ";
//						if ($cat_fileshare == "1") print "checked";
//						print ">&nbsp;&nbsp;File Shares</td>";

				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Web Link for more information:</strong></td>";
					print "<td><input type=\"text\" name=\"more_info\" value=\"$more_info\" size=\"100\"></td>";
				print "</tr>";
						
				print "<tr><td>&nbsp;</td></tr>";

			    print "<tr>";
		        	print "<td><strong>Screen Shot Image File:</strong></td>";
		   			print "<td><input type= \"hidden\" name= \"MAX_FILE_SIZE\" value= \"15000000\">";
					print "<input type= \"file\" name= \"img_location\" value= \"\" size= \"30\"></td>";
		        print "</tr>";
        
			    print "<tr>";
		        	print "<td><strong>Instructions File:</strong></td>";
		   			print "<td><input type= \"hidden\" name= \"MAX_FILE_SIZE\" value= \"15000000\">";
					print "<input type= \"file\" name= \"info_location\" value= \"\" size= \"30\"></td>";
		        print "</tr>";
        
			    print "<tr>";
		        	print "<td><strong>Sample Demo File:</strong></td>";
		   			print "<td><input type= \"hidden\" name= \"MAX_FILE_SIZE\" value= \"15000000\">";
					print "<input type= \"file\" name= \"demo_location\" value= \"\" size= \"30\"></td>";
		        print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
        
				if ($sub_kb == "Edit Article")
				{
					print "<tr>";
					print "<td colspan=\"2\"><input type= \"submit\" name= \"sub_kb\" value= \"Update Article\">";
					print "<input type=\"hidden\" name=\"id\" value=\"$id\">";
					print "<input type=\"hidden\" name=\"auth_fmname\" value=\"$auth_fmname\">";
					print "<input type=\"hidden\" name=\"auth_lname\" value=\"$auth_lname\">";
					print "</tr>";
				}
				else
				{
					print "<tr>";
					print "<td colspan=\"2\"><input type= \"submit\" name= \"sub_kb\" value= \"Enter Article\">";
					print "</tr>";
				}
				

			print "</form>";
			print "</table>";
			
			
			print "<p><a href= \"index.php\">Go to Start Page</a><p>";
		
		} // end is sub_kb == edit article
		
		
// IF !SUB_KB
		
		if (!$sub_kb)
		{

			print "<form name=\"new_kb\" method=\"post\" action=\"index.php\">
			<input type=\"submit\" name=\"sub_kb\" value=\"New Article\">
			</form>";
			
			print "<p>&nbsp;</p>";

			$q_retrieve = "SELECT * FROM knowledge_base ORDER BY kb_title ";
			
			$r_retrieve = mysqli_query($link, $q_retrieve);
			
			print "<table border= \"0\" cellpadding=\"2px\" cellspacing=\"5px\" width=\"100%\">";
			
			$article_ct = 1;
			
			while ($row_retrieve = mysqli_fetch_array($r_retrieve, MYSQLI_ASSOC))
			{
				$short_content = substr($row_retrieve['kb_content'],0,100);
				
				print "<tr><td>&nbsp;</td>";
				print "<td><strong><font color=\"#002666\">Title</font></strong></td>";
				print "<td><strong><font color=\"#002666\">Description</font></strong></td>";
				print "<td><strong><font color=\"#002666\">Click to Update</font></strong></td></tr>";

				print "<tr><td><strong>($article_ct)</strong></td>";
				print "<td><strong>$row_retrieve[kb_title]</strong></td>";
				print "<td>$short_content...</td>";
				print "<td>
						<form name=\"update_kb\" method=\"post\" action=\"index.php\">
						<input type=\"submit\" name=\"sub_kb\" value=\"Edit Article\">
						<input type=\"hidden\" name= \"id\" value=\"$row_retrieve[kb_id]\">
						</form>
					   </td></tr>";

//				print "<tr><td>&nbsp;</td></tr>";
				print "<tr><td colspan=\"4\"><hr></td></tr>";
				print "<tr><td>&nbsp;</td></tr>";
				
				$article_ct++;

					
			} // END while row_retrieve
			
			print "</table>";
		
		} // end if !sub_kb
		
		


	} // end if DBOK
} // end fopen		


?>
   

	<p>&nbsp;</p>
    
	
	
	<!-- #EndEditable --> 
      <p> 
    </td>
  </tr>
  <tr>
    <td>
      <p> 
      <hr>
      <p><a href="mailto:webmaster@phmail.ucdavis.edu">Mail Comments to webmaster@phmail.ucdavis.edu</a> 
    </td>
  </tr>
</table>

</BODY>
<!-- InstanceEnd --></HTML>
