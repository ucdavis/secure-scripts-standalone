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

$upload_by = "";
$sub_data = "";
$an_id = "";
$genotype = "";
$bdate = "";
$food = "";
$day27 = "";
$day28 = "";
$day29 = "";
$day30 = "";
$day31 = "";
$day32 = "";
$day33 = "";
$day34 = "";
$day35 = "";
$day36 = "";
$day37 = "";
$day38 = "";
$day39 = "";
$day40 = "";
$day41 = "";
$day42 = "";
$day43 = "";
$day44 = "";
$day45 = "";
$day46 = "";
$day47 = "";
$day48 = "";
$day49 = "";
$day50 = "";
$day51 = "";
$day52 = "";
$day53 = "";
$day54 = "";
$day55 = "";
$day56 = "";
$day57 = "";
$day58 = "";
$day59 = "";
$day60 = "";
$day61 = "";
$day62 = "";
$day63 = "";
$day64 = "";
$day65 = "";
$day66 = "";
$day67 = "";
$day68 = "";
$day69 = "";
$day70 = "";
$day71 = "";
$day72 = "";
$day73 = "";
$day74 = "";
$day75 = "";
$day76 = "";
$day77 = "";
$day78 = "";
$day79 = "";
$day80 = "";
$day81 = "";
$day82 = "";
$day83 = "";
$day84 = "";
$day85 = "";
$day86 = "";
$day87 = "";
$day88 = "";
$day89 = "";
$day90 = "";
$day91 = "";
$day92 = "";
$day93 = "";
$day94 = "";
$day95 = "";
$day96 = "";
$day97 = "";
$day98 = "";
$day99 = "";
$day100 = "";
$day101 = "";
$day102 = "";
$day103 = "";
$day104 = "";
$day105 = "";
$day106 = "";
$day107 = "";
$day108 = "";
$day109 = "";
$day110 = "";
$day111 = "";
$day112 = "";
$day113 = "";
$day114 = "";
$day115 = "";
$day116 = "";
$day117 = "";
$day118 = "";
$day119 = "";
$day120 = "";
$day121 = "";
$day122 = "";
$day123 = "";
$day124 = "";
$day125 = "";
$day126 = "";
$day127 = "";
$day128 = "";
$day129 = "";
$day130 = "";
$week20 = "";
$week21 = "";
$week22 = "";
$week23 = "";
$week24 = "";
$week25 = "";
$week26 = "";
$week27 = "";
$week28 = "";
$week29 = "";
$week30 = "";
$week31 = "";
$week32 = "";
$week33 = "";
$week34 = "";
$week35 = "";
$week36 = "";
$week37 = "";
$week38 = "";
$week39 = "";
$week40 = "";
$week41 = "";
$week42 = "";
$week43 = "";
$week44 = "";
$week45 = "";
$week46 = "";
$week47 = "";
$week48 = "";
$week49 = "";
$week50 = "";
$week51 = "";
$week52 = "";
$week53 = "";
$week54 = "";
$week55 = "";
$week56 = "";
$week57 = "";
$week58 = "";
$week59 = "";
$week60 = "";
$week61 = "";
$week62 = "";
$week63 = "";
$week64 = "";
$week65 = "";
$week66 = "";
$week67 = "";
$week68 = "";
$week69 = "";
$week70 = "";
$week71 = "";
$week72 = "";
$week73 = "";
$week74 = "";
$week75 = "";
$week76 = "";
$week77 = "";
$week78 = "";
$week79 = "";
$week80 = "";
$week81 = "";
$week82 = "";
$week83 = "";
$week84 = "";
$week85 = "";
$week86 = "";
$week87 = "";
$week88 = "";
$week89 = "";
$week90 = "";
$week91 = "";
$week92 = "";
$week93 = "";
$week94 = "";
$week95 = "";
$week96 = "";
$week97 = "";
$week98 = "";
$week99 = "";
$week100 = "";
$week101 = "";
$week102 = "";
$week103 = "";
$week104 = "";
$week105 = "";
$week106 = "";
$week107 = "";
$week108 = "";
$week109 = "";
$week110 = "";
$week111 = "";
$week112 = "";
$week113 = "";
$week114 = "";
$week115 = "";
$week116 = "";
$week117 = "";
$week118 = "";
$week119 = "";
$week120 = "";
$week121 = "";
$week122 = "";
$week123 = "";
$week124 = "";
$week125 = "";
$week126 = "";
$week127 = "";
$week128 = "";
$week129 = "";
$week130 = "";
$notify_email = "";

if(isset($_SESSION["p66_user"])) $upload_by = $_SESSION["p66_user"];

if(isset($_POST['sub_data'])) $sub_data = $_POST["sub_data"];

if(isset($_POST['an_id'])) $an_id = $_POST["an_id"];
if(isset($_POST['genotype'])) $genotype = $_POST["genotype"];
if(isset($_POST['bdate'])) $bdate = $_POST["bdate"];
if(isset($_POST['food'])) $food = $_POST["food"];

if(isset($_POST['day27'])) $day27 = $_POST["day27"];
if(isset($_POST['day28'])) $day28 = $_POST["day28"];
if(isset($_POST['day29'])) $day29 = $_POST["day29"];
if(isset($_POST['day30'])) $day30 = $_POST["day30"];
if(isset($_POST['day31'])) $day31 = $_POST["day31"];
if(isset($_POST['day32'])) $day32 = $_POST["day32"];
if(isset($_POST['day33'])) $day33 = $_POST["day33"];
if(isset($_POST['day34'])) $day34 = $_POST["day34"];
if(isset($_POST['day35'])) $day35 = $_POST["day35"];
if(isset($_POST['day36'])) $day36 = $_POST["day36"];
if(isset($_POST['day37'])) $day37 = $_POST["day37"];
if(isset($_POST['day38'])) $day38 = $_POST["day38"];
if(isset($_POST['day39'])) $day39 = $_POST["day39"];
if(isset($_POST['day40'])) $day40 = $_POST["day40"];
if(isset($_POST['day41'])) $day41 = $_POST["day41"];
if(isset($_POST['day42'])) $day42 = $_POST["day42"];
if(isset($_POST['day43'])) $day43 = $_POST["day43"];
if(isset($_POST['day44'])) $day44 = $_POST["day44"];
if(isset($_POST['day45'])) $day45 = $_POST["day45"];
if(isset($_POST['day46'])) $day46 = $_POST["day46"];
if(isset($_POST['day47'])) $day47 = $_POST["day47"];
if(isset($_POST['day48'])) $day48 = $_POST["day48"];
if(isset($_POST['day49'])) $day49 = $_POST["day49"];
if(isset($_POST['day50'])) $day50 = $_POST["day50"];
if(isset($_POST['day51'])) $day51 = $_POST["day51"];
if(isset($_POST['day52'])) $day52 = $_POST["day52"];
if(isset($_POST['day53'])) $day53 = $_POST["day53"];
if(isset($_POST['day54'])) $day54 = $_POST["day54"];
if(isset($_POST['day55'])) $day55 = $_POST["day55"];
if(isset($_POST['day56'])) $day56 = $_POST["day56"];
if(isset($_POST['day57'])) $day57 = $_POST["day57"];
if(isset($_POST['day58'])) $day58 = $_POST["day58"];
if(isset($_POST['day59'])) $day59 = $_POST["day59"];
if(isset($_POST['day60'])) $day60 = $_POST["day60"];
if(isset($_POST['day61'])) $day61 = $_POST["day61"];
if(isset($_POST['day62'])) $day62 = $_POST["day62"];
if(isset($_POST['day63'])) $day63 = $_POST["day63"];
if(isset($_POST['day64'])) $day64 = $_POST["day64"];
if(isset($_POST['day65'])) $day65 = $_POST["day65"];
if(isset($_POST['day66'])) $day66 = $_POST["day66"];
if(isset($_POST['day67'])) $day67 = $_POST["day67"];
if(isset($_POST['day68'])) $day68 = $_POST["day68"];
if(isset($_POST['day69'])) $day69 = $_POST["day69"];
if(isset($_POST['day70'])) $day70 = $_POST["day70"];
if(isset($_POST['day71'])) $day71 = $_POST["day71"];
if(isset($_POST['day72'])) $day72 = $_POST["day72"];
if(isset($_POST['day73'])) $day73 = $_POST["day73"];
if(isset($_POST['day74'])) $day74 = $_POST["day74"];
if(isset($_POST['day75'])) $day75 = $_POST["day75"];
if(isset($_POST['day76'])) $day76 = $_POST["day76"];
if(isset($_POST['day77'])) $day77 = $_POST["day77"];
if(isset($_POST['day78'])) $day78 = $_POST["day78"];
if(isset($_POST['day79'])) $day79 = $_POST["day79"];
if(isset($_POST['day80'])) $day80 = $_POST["day80"];
if(isset($_POST['day81'])) $day81 = $_POST["day81"];
if(isset($_POST['day82'])) $day82 = $_POST["day82"];
if(isset($_POST['day83'])) $day83 = $_POST["day83"];
if(isset($_POST['day84'])) $day84 = $_POST["day84"];
if(isset($_POST['day85'])) $day85 = $_POST["day85"];
if(isset($_POST['day86'])) $day86 = $_POST["day86"];
if(isset($_POST['day87'])) $day87 = $_POST["day87"];
if(isset($_POST['day88'])) $day88 = $_POST["day88"];
if(isset($_POST['day89'])) $day89 = $_POST["day89"];
if(isset($_POST['day90'])) $day90 = $_POST["day90"];
if(isset($_POST['day91'])) $day91 = $_POST["day91"];
if(isset($_POST['day92'])) $day92 = $_POST["day92"];
if(isset($_POST['day93'])) $day93 = $_POST["day93"];
if(isset($_POST['day94'])) $day94 = $_POST["day94"];
if(isset($_POST['day95'])) $day95 = $_POST["day95"];
if(isset($_POST['day96'])) $day96 = $_POST["day96"];
if(isset($_POST['day97'])) $day97 = $_POST["day97"];
if(isset($_POST['day98'])) $day98 = $_POST["day98"];
if(isset($_POST['day99'])) $day99 = $_POST["day99"];
if(isset($_POST['day100'])) $day100 = $_POST["day100"];
if(isset($_POST['day101'])) $day101 = $_POST["day101"];
if(isset($_POST['day102'])) $day102 = $_POST["day102"];
if(isset($_POST['day103'])) $day103 = $_POST["day103"];
if(isset($_POST['day104'])) $day104 = $_POST["day104"];
if(isset($_POST['day105'])) $day105 = $_POST["day105"];
if(isset($_POST['day106'])) $day106 = $_POST["day106"];
if(isset($_POST['day107'])) $day107 = $_POST["day107"];
if(isset($_POST['day108'])) $day108 = $_POST["day108"];
if(isset($_POST['day109'])) $day109 = $_POST["day109"];
if(isset($_POST['day110'])) $day110 = $_POST["day110"];
if(isset($_POST['day111'])) $day111 = $_POST["day111"];
if(isset($_POST['day112'])) $day112 = $_POST["day112"];
if(isset($_POST['day113'])) $day113 = $_POST["day113"];
if(isset($_POST['day114'])) $day114 = $_POST["day114"];
if(isset($_POST['day115'])) $day115 = $_POST["day115"];
if(isset($_POST['day116'])) $day116 = $_POST["day116"];
if(isset($_POST['day117'])) $day117 = $_POST["day117"];
if(isset($_POST['day118'])) $day118 = $_POST["day118"];
if(isset($_POST['day119'])) $day119 = $_POST["day119"];
if(isset($_POST['day120'])) $day120 = $_POST["day120"];
if(isset($_POST['day121'])) $day121 = $_POST["day121"];
if(isset($_POST['day122'])) $day122 = $_POST["day122"];
if(isset($_POST['day123'])) $day123 = $_POST["day123"];
if(isset($_POST['day124'])) $day124 = $_POST["day124"];
if(isset($_POST['day125'])) $day125 = $_POST["day125"];
if(isset($_POST['day126'])) $day126 = $_POST["day126"];
if(isset($_POST['day127'])) $day127 = $_POST["day127"];
if(isset($_POST['day128'])) $day128 = $_POST["day128"];
if(isset($_POST['day129'])) $day129 = $_POST["day129"];
if(isset($_POST['day130'])) $day130 = $_POST["day130"];

if(isset($_POST['week20'])) $week20 = $_POST["week20"];
if(isset($_POST['week21'])) $week21 = $_POST["week21"];
if(isset($_POST['week22'])) $week22 = $_POST["week22"];
if(isset($_POST['week23'])) $week23 = $_POST["week23"];
if(isset($_POST['week24'])) $week24 = $_POST["week24"];
if(isset($_POST['week25'])) $week25 = $_POST["week25"];
if(isset($_POST['week26'])) $week26 = $_POST["week26"];
if(isset($_POST['week27'])) $week27 = $_POST["week27"];
if(isset($_POST['week28'])) $week28 = $_POST["week28"];
if(isset($_POST['week29'])) $week29 = $_POST["week29"];
if(isset($_POST['week30'])) $week30 = $_POST["week30"];
if(isset($_POST['week31'])) $week31 = $_POST["week31"];
if(isset($_POST['week32'])) $week32 = $_POST["week32"];
if(isset($_POST['week33'])) $week33 = $_POST["week33"];
if(isset($_POST['week34'])) $week34 = $_POST["week34"];
if(isset($_POST['week35'])) $week35 = $_POST["week35"];
if(isset($_POST['week36'])) $week36 = $_POST["week36"];
if(isset($_POST['week37'])) $week37 = $_POST["week37"];
if(isset($_POST['week38'])) $week38 = $_POST["week38"];
if(isset($_POST['week39'])) $week39 = $_POST["week39"];
if(isset($_POST['week40'])) $week40 = $_POST["week40"];
if(isset($_POST['week41'])) $week41 = $_POST["week41"];
if(isset($_POST['week42'])) $week42 = $_POST["week42"];
if(isset($_POST['week43'])) $week43 = $_POST["week43"];
if(isset($_POST['week44'])) $week44 = $_POST["week44"];
if(isset($_POST['week45'])) $week45 = $_POST["week45"];
if(isset($_POST['week46'])) $week46 = $_POST["week46"];
if(isset($_POST['week47'])) $week47 = $_POST["week47"];
if(isset($_POST['week48'])) $week48 = $_POST["week48"];
if(isset($_POST['week49'])) $week49 = $_POST["week49"];
if(isset($_POST['week50'])) $week50 = $_POST["week50"];
if(isset($_POST['week51'])) $week51 = $_POST["week51"];
if(isset($_POST['week52'])) $week52 = $_POST["week52"];
if(isset($_POST['week53'])) $week53 = $_POST["week53"];
if(isset($_POST['week54'])) $week54 = $_POST["week54"];
if(isset($_POST['week55'])) $week55 = $_POST["week55"];
if(isset($_POST['week56'])) $week56 = $_POST["week56"];
if(isset($_POST['week57'])) $week57 = $_POST["week57"];
if(isset($_POST['week58'])) $week58 = $_POST["week58"];
if(isset($_POST['week59'])) $week59 = $_POST["week59"];
if(isset($_POST['week60'])) $week60 = $_POST["week60"];
if(isset($_POST['week61'])) $week61 = $_POST["week61"];
if(isset($_POST['week62'])) $week62 = $_POST["week62"];
if(isset($_POST['week63'])) $week63 = $_POST["week63"];
if(isset($_POST['week64'])) $week64 = $_POST["week64"];
if(isset($_POST['week65'])) $week65 = $_POST["week65"];
if(isset($_POST['week66'])) $week66 = $_POST["week66"];
if(isset($_POST['week67'])) $week67 = $_POST["week67"];
if(isset($_POST['week68'])) $week68 = $_POST["week68"];
if(isset($_POST['week69'])) $week69 = $_POST["week69"];
if(isset($_POST['week70'])) $week70 = $_POST["week70"];
if(isset($_POST['week71'])) $week71 = $_POST["week71"];
if(isset($_POST['week72'])) $week72 = $_POST["week72"];
if(isset($_POST['week73'])) $week73 = $_POST["week73"];
if(isset($_POST['week74'])) $week74 = $_POST["week74"];
if(isset($_POST['week75'])) $week75 = $_POST["week75"];
if(isset($_POST['week76'])) $week76 = $_POST["week76"];
if(isset($_POST['week77'])) $week77 = $_POST["week77"];
if(isset($_POST['week78'])) $week78 = $_POST["week78"];
if(isset($_POST['week79'])) $week79 = $_POST["week79"];
if(isset($_POST['week80'])) $week80 = $_POST["week80"];
if(isset($_POST['week81'])) $week81 = $_POST["week81"];
if(isset($_POST['week82'])) $week82 = $_POST["week82"];
if(isset($_POST['week83'])) $week83 = $_POST["week83"];
if(isset($_POST['week84'])) $week84 = $_POST["week84"];
if(isset($_POST['week85'])) $week85 = $_POST["week85"];
if(isset($_POST['week86'])) $week86 = $_POST["week86"];
if(isset($_POST['week87'])) $week87 = $_POST["week87"];
if(isset($_POST['week88'])) $week88 = $_POST["week88"];
if(isset($_POST['week89'])) $week89 = $_POST["week89"];
if(isset($_POST['week90'])) $week90 = $_POST["week90"];
if(isset($_POST['week91'])) $week91 = $_POST["week91"];
if(isset($_POST['week92'])) $week92 = $_POST["week92"];
if(isset($_POST['week93'])) $week93 = $_POST["week93"];
if(isset($_POST['week94'])) $week94 = $_POST["week94"];
if(isset($_POST['week95'])) $week95 = $_POST["week95"];
if(isset($_POST['week96'])) $week96 = $_POST["week96"];
if(isset($_POST['week97'])) $week97 = $_POST["week97"];
if(isset($_POST['week98'])) $week98 = $_POST["week98"];
if(isset($_POST['week99'])) $week99 = $_POST["week99"];
if(isset($_POST['week100'])) $week100 = $_POST["week100"];
if(isset($_POST['week101'])) $week101 = $_POST["week101"];
if(isset($_POST['week102'])) $week102 = $_POST["week102"];
if(isset($_POST['week103'])) $week103 = $_POST["week103"];
if(isset($_POST['week104'])) $week104 = $_POST["week104"];
if(isset($_POST['week105'])) $week105 = $_POST["week105"];
if(isset($_POST['week106'])) $week106 = $_POST["week106"];
if(isset($_POST['week107'])) $week107 = $_POST["week107"];
if(isset($_POST['week108'])) $week108 = $_POST["week108"];
if(isset($_POST['week109'])) $week109 = $_POST["week109"];
if(isset($_POST['week110'])) $week110 = $_POST["week110"];
if(isset($_POST['week111'])) $week111 = $_POST["week111"];
if(isset($_POST['week112'])) $week112 = $_POST["week112"];
if(isset($_POST['week113'])) $week113 = $_POST["week113"];
if(isset($_POST['week114'])) $week114 = $_POST["week114"];
if(isset($_POST['week115'])) $week115 = $_POST["week115"];
if(isset($_POST['week116'])) $week116 = $_POST["week116"];
if(isset($_POST['week117'])) $week117 = $_POST["week117"];
if(isset($_POST['week118'])) $week118 = $_POST["week118"];
if(isset($_POST['week119'])) $week119 = $_POST["week119"];
if(isset($_POST['week120'])) $week120 = $_POST["week120"];
if(isset($_POST['week121'])) $week121 = $_POST["week121"];
if(isset($_POST['week122'])) $week122 = $_POST["week122"];
if(isset($_POST['week123'])) $week123 = $_POST["week123"];
if(isset($_POST['week124'])) $week124 = $_POST["week124"];
if(isset($_POST['week125'])) $week125 = $_POST["week125"];
if(isset($_POST['week126'])) $week126 = $_POST["week126"];
if(isset($_POST['week127'])) $week127 = $_POST["week127"];
if(isset($_POST['week128'])) $week128 = $_POST["week128"];
if(isset($_POST['week129'])) $week129 = $_POST["week129"];
if(isset($_POST['week130'])) $week130 = $_POST["week130"];

if(isset($_POST['notify_email'])) $notify_email = $_POST["notify_email"];

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

//	$case_summary = sanitizeString($case_summary);

	 
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

		if ($sub_data == "Submit Bodyweight Data")
		{
			$valid_form = true;

			if ($valid_form == true)
			{
				$upload_date = date("c");
				
				$q_update = "UPDATE bodyweight SET bdate = '$bdate', food = '$food', day27 = '$day27', day28 = '$day28',
				day29 = '$day29', day30 = '$day30', day31 = '$day31', day32 = '$day32', day33 = '$day33', day34 = '$day34',
				day35 = '$day35', day36 = '$day36', day37 = '$day37', day38 = '$day38', day39 = '$day39', day40 = '$day40',
				day41 = '$day41', day42 = '$day42', day43 = '$day43', day44 = '$day44', day45 = '$day45', day46 = '$day46',
				day47 = '$day47', day48 = '$day48', day49 = '$day49', day50 = '$day50', day51 = '$day51', day52 = '$day52',
				day53 = '$day53', day54 = '$day54', day55 = '$day55', day56 = '$day56', day57 = '$day57', day58 = '$day58',
				day59 = '$day59', day60 = '$day60', day61 = '$day61', day62 = '$day62', day63 = '$day63', day64 = '$day64',
				day65 = '$day65', day66 = '$day66', day67 = '$day67', day68 = '$day68', day69 = '$day69', day70 = '$day70',
				day71 = '$day71', day72 = '$day72', day73 = '$day73', day74 = '$day74', day75 = '$day75', day76 = '$day76',
				day77 = '$day77', day78 = '$day78', day79 = '$day79', day80 = '$day80', day81 = '$day81', day82 = '$day82',
				day83 = '$day83', day84 = '$day84', day85 = '$day85', day86 = '$day86', day87 = '$day87', day88 = '$day88',
				day89 = '$day89', day90 = '$day90', day91 = '$day91', day92 = '$day92', day93 = '$day93', day94 = '$day94',
				day95 = '$day95', day96 = '$day96', day97 = '$day97', day98 = '$day98', day99 = '$day99', day100 = '$day100',
				day101 = '$day101', day102 = '$day102', day103 = '$day103', day104 = '$day104', day105 = '$day105',
				day106 = '$day106', day107 = '$day107', day108 = '$day108', day109 = '$day109', day110 = '$day110',
				day111 = '$day111', day112 = '$day112', day113 = '$day113', day114 = '$day114', day115 = '$day115',
				day116 = '$day116', day117 = '$day117', day118 = '$day118', day119 = '$day119', day120 = '$day120',
				day121 = '$day121', day122 = '$day122', day123 = '$day123', day124 = '$day124', day125 = '$day125',
				day126 = '$day126', day127 = '$day127', day128 = '$day128', day129 = '$day129', day130 = '$day130',
				week20 = '$week20', week21 = '$week21', week22 = '$week22', week23 = '$week23', week24 = '$week24', 
				week25 = '$week25', week26 = '$week26', week27 = '$week27', week28 = '$week28', week29 = '$week29',
				week30 = '$week30', week31 = '$week31', week32 = '$week32', week33 = '$week33', week34 = '$week34',
				week35 = '$week35', week36 = '$week36', week37 = '$week37', week38 = '$week38', week39 = '$week39',
				week40 = '$week40', week41 = '$week41', week42 = '$week42', week43 = '$week43', week44 = '$week44',
				week45 = '$week45', week46 = '$week46', week47 = '$week47', week48 = '$week48', week49 = '$week49',
				week50 = '$week50', week51 = '$week51', week52 = '$week52', week53 = '$week53', week54 = '$week54',
				week55 = '$week55', week56 = '$week56', week57 = '$week57', week58 = '$week58', week59 = '$week59',
				week60 = '$week60', week61 = '$week61', week62 = '$week62', week63 = '$week63', week64 = '$week64',
				week65 = '$week65', week66 = '$week66', week67 = '$week67', week68 = '$week68', week69 = '$week69',
				week70 = '$week70', week71 = '$week71', week72 = '$week72', week73 = '$week73', week74 = '$week74',
				week75 = '$week75', week76 = '$week76', week77 = '$week77', week78 = '$week78', week79 = '$week79',
				week80 = '$week80', week81 = '$week81', week82 = '$week82', week83 = '$week83', week84 = '$week84',
				week85 = '$week85', week86 = '$week86', week87 = '$week87', week88 = '$week88', week88 = '$week89',
				week90 = '$week90', week91 = '$week91', week92 = '$week92', week93 = '$week93', week94 = '$week94',
				week95 = '$week95', week96 = '$week96', week97 = '$week97', week98 = '$week98', week99 = '$week99',
				week100 = '$week100', week101 = '$week101', week102 = '$week102', week103 = '$week103', week104 = '$week104',
				week105 = '$week105', week106 = '$week106', week107 = '$week107', week108 = '$week108', week109 = '$week109',
				week110 = '$week110', week111 = '$week111', week112 = '$week112', week113 = '$week113', week114 = '$week114',
				week115 = '$week115', week116 = '$week116', week117 = '$week117', week118 = '$week118', week119 = '$week119',
				week120 = '$week120', week121 = '$week121', week122 = '$week122', week123 = '$week123', week124 = '$week124',
				week125 = '$week125', week126 = '$week126', week127 = '$week127', week128 = '$week128', week129 = '$week129',
				week130 = '$week130'
				WHERE an_id LIKE '$an_id' and genotype LIKE '$genotype' ";
				
				$r_update = mysqli_query($link, $q_update);
				if (mysqli_affected_rows($link) >= 1)
				{
					print "The bodyweight data for ID $an_id Genotype $genotype has been successfully updated.  
					<a href= \"subject.php\">Go Back to Subject Sample Data Main Page</a>";

// SEND E-MAIL NOTIFICATION TO KYOUNGMI KIM AND ADDRESSES LISTED IN THE CC NOTIFICATION					
//					$file_type = "";
					
					$to = "kmkim@ucdavis.edu";
//					$cc_email = $notify_email;
					$subject = "p66Shc Bodyweight Data Update notifcation";
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
					print "The bodyweight data for this subject has not been been updated.<p>$q_update";
					$valid_form = false;
				}
			
			} // end if $valid_form == true
		
		
		} // end if sub_data = Submit Lifespan Data
		
		
// IF !SUB_DATA && $GETFILES
		
		if ((!$sub_data) || (($sub_date == 'Submit Bodyweight Data') && ($valid_form == false)))
		{
//			$q_bodyweight = "SELECT * FROM bodyweight WHERE an_id LIKE '1' AND genotype LIKE 'C57BL/6' ";
			$q_sample = "SELECT * FROM bodyweight WHERE an_id LIKE $an_id ";
			$q_bodyweight = "SELECT * FROM bodyweight WHERE an_id LIKE '$an_id' ";
			$r_bodyweight = mysqli_query($link, $q_bodyweight);
			
			$row_bodyweight = mysqli_fetch_array($r_bodyweight, MYSQLI_ASSOC);
			
			$bw_id = $row_bodyweight['bw_id'];
			$an_id = $row_bodyweight['an_id'];
			$genotype = $row_bodyweight['genotype'];
			$bdate = $row_bodyweight['bdate'];
			$food = $row_bodyweight['food'];

			$day27 = $row_bodyweight['day27'];
			$day28 = $row_bodyweight['day28'];
			$day29 = $row_bodyweight['day29'];
			$day30 = $row_bodyweight['day30'];
			$day31 = $row_bodyweight['day31'];
			$day32 = $row_bodyweight['day32'];
			$day33 = $row_bodyweight['day33'];
			$day34 = $row_bodyweight['day34'];
			$day35 = $row_bodyweight['day35'];
			$day36 = $row_bodyweight['day36'];
			$day37 = $row_bodyweight['day37'];
			$day38 = $row_bodyweight['day38'];
			$day39 = $row_bodyweight['day39'];
			$day40 = $row_bodyweight['day40'];
			$day41 = $row_bodyweight['day41'];
			$day42 = $row_bodyweight['day42'];
			$day43 = $row_bodyweight['day43'];
			$day44 = $row_bodyweight['day44'];
			$day45 = $row_bodyweight['day45'];
			$day46 = $row_bodyweight['day46'];
			$day47 = $row_bodyweight['day47'];
			$day48 = $row_bodyweight['day48'];
			$day49 = $row_bodyweight['day49'];
			$day50 = $row_bodyweight['day50'];
			$day51 = $row_bodyweight['day51'];
			$day52 = $row_bodyweight['day52'];
			$day53 = $row_bodyweight['day53'];
			$day54 = $row_bodyweight['day54'];
			$day55 = $row_bodyweight['day55'];
			$day56 = $row_bodyweight['day56'];
			$day57 = $row_bodyweight['day57'];
			$day58 = $row_bodyweight['day58'];
			$day59 = $row_bodyweight['day59'];
			$day60 = $row_bodyweight['day60'];
			$day61 = $row_bodyweight['day61'];
			$day62 = $row_bodyweight['day62'];
			$day63 = $row_bodyweight['day63'];
			$day64 = $row_bodyweight['day64'];
			$day65 = $row_bodyweight['day65'];
			$day66 = $row_bodyweight['day66'];
			$day67 = $row_bodyweight['day67'];
			$day68 = $row_bodyweight['day68'];
			$day69 = $row_bodyweight['day69'];
			$day70 = $row_bodyweight['day70'];
			$day71 = $row_bodyweight['day71'];
			$day72 = $row_bodyweight['day72'];
			$day73 = $row_bodyweight['day73'];
			$day74 = $row_bodyweight['day74'];
			$day75 = $row_bodyweight['day75'];
			$day76 = $row_bodyweight['day76'];
			$day77 = $row_bodyweight['day77'];
			$day78 = $row_bodyweight['day78'];
			$day79 = $row_bodyweight['day79'];
			$day80 = $row_bodyweight['day80'];
			$day81 = $row_bodyweight['day81'];
			$day82 = $row_bodyweight['day82'];
			$day83 = $row_bodyweight['day83'];
			$day84 = $row_bodyweight['day84'];
			$day85 = $row_bodyweight['day85'];
			$day86 = $row_bodyweight['day86'];
			$day87 = $row_bodyweight['day87'];
			$day88 = $row_bodyweight['day88'];
			$day89 = $row_bodyweight['day89'];
			$day90 = $row_bodyweight['day90'];
			$day91 = $row_bodyweight['day91'];
			$day92 = $row_bodyweight['day92'];
			$day93 = $row_bodyweight['day93'];
			$day94 = $row_bodyweight['day94'];
			$day95 = $row_bodyweight['day95'];
			$day96 = $row_bodyweight['day96'];
			$day97 = $row_bodyweight['day97'];
			$day98 = $row_bodyweight['day98'];
			$day99 = $row_bodyweight['day99'];
			$day100 = $row_bodyweight['day100'];
			$day101 = $row_bodyweight['day101'];
			$day102 = $row_bodyweight['day102'];
			$day103 = $row_bodyweight['day103'];
			$day104 = $row_bodyweight['day104'];
			$day105 = $row_bodyweight['day105'];
			$day106 = $row_bodyweight['day106'];
			$day107 = $row_bodyweight['day107'];
			$day108 = $row_bodyweight['day108'];
			$day109 = $row_bodyweight['day109'];
			$day110 = $row_bodyweight['day110'];
			$day111 = $row_bodyweight['day111'];
			$day112 = $row_bodyweight['day112'];
			$day113 = $row_bodyweight['day113'];
			$day114 = $row_bodyweight['day114'];
			$day115 = $row_bodyweight['day115'];
			$day116 = $row_bodyweight['day116'];
			$day117 = $row_bodyweight['day117'];
			$day118 = $row_bodyweight['day118'];
			$day119 = $row_bodyweight['day119'];
			$day120 = $row_bodyweight['day120'];
			$day121 = $row_bodyweight['day121'];
			$day122 = $row_bodyweight['day122'];
			$day123 = $row_bodyweight['day123'];
			$day124 = $row_bodyweight['day124'];
			$day125 = $row_bodyweight['day125'];
			$day126 = $row_bodyweight['day126'];
			$day127 = $row_bodyweight['day127'];
			$day128 = $row_bodyweight['day128'];
			$day129 = $row_bodyweight['day129'];
			$day130 = $row_bodyweight['day130'];

			$week20 = $row_bodyweight['week20'];
			$week21 = $row_bodyweight['week21'];
			$week22 = $row_bodyweight['week22'];
			$week23 = $row_bodyweight['week23'];
			$week24 = $row_bodyweight['week24'];
			$week25 = $row_bodyweight['week25'];
			$week26 = $row_bodyweight['week26'];
			$week27 = $row_bodyweight['week27'];
			$week28 = $row_bodyweight['week28'];
			$week29 = $row_bodyweight['week29'];
			$week30 = $row_bodyweight['week30'];
			$week31 = $row_bodyweight['week31'];
			$week32 = $row_bodyweight['week32'];
			$week33 = $row_bodyweight['week33'];
			$week34 = $row_bodyweight['week34'];
			$week35 = $row_bodyweight['week35'];
			$week36 = $row_bodyweight['week36'];
			$week37 = $row_bodyweight['week37'];
			$week38 = $row_bodyweight['week38'];
			$week39 = $row_bodyweight['week39'];
			$week40 = $row_bodyweight['week40'];
			$week41 = $row_bodyweight['week41'];
			$week42 = $row_bodyweight['week42'];
			$week43 = $row_bodyweight['week43'];
			$week44 = $row_bodyweight['week44'];
			$week45 = $row_bodyweight['week45'];
			$week46 = $row_bodyweight['week46'];
			$week47 = $row_bodyweight['week47'];
			$week48 = $row_bodyweight['week48'];
			$week49 = $row_bodyweight['week49'];
			$week50 = $row_bodyweight['week50'];
			$week51 = $row_bodyweight['week51'];
			$week52 = $row_bodyweight['week52'];
			$week53 = $row_bodyweight['week53'];
			$week54 = $row_bodyweight['week54'];
			$week55 = $row_bodyweight['week55'];
			$week56 = $row_bodyweight['week56'];
			$week57 = $row_bodyweight['week57'];
			$week58 = $row_bodyweight['week58'];
			$week59 = $row_bodyweight['week59'];
			$week60 = $row_bodyweight['week60'];
			$week61 = $row_bodyweight['week61'];
			$week62 = $row_bodyweight['week62'];
			$week63 = $row_bodyweight['week63'];
			$week64 = $row_bodyweight['week64'];
			$week65 = $row_bodyweight['week65'];
			$week66 = $row_bodyweight['week66'];
			$week67 = $row_bodyweight['week67'];
			$week68 = $row_bodyweight['week68'];
			$week69 = $row_bodyweight['week69'];
			$week70 = $row_bodyweight['week70'];
			$week71 = $row_bodyweight['week71'];
			$week72 = $row_bodyweight['week72'];
			$week73 = $row_bodyweight['week73'];
			$week74 = $row_bodyweight['week74'];
			$week75 = $row_bodyweight['week75'];
			$week76 = $row_bodyweight['week76'];
			$week77 = $row_bodyweight['week77'];
			$week78 = $row_bodyweight['week78'];
			$week79 = $row_bodyweight['week79'];
			$week80 = $row_bodyweight['week80'];
			$week81 = $row_bodyweight['week81'];
			$week82 = $row_bodyweight['week82'];
			$week83 = $row_bodyweight['week83'];
			$week84 = $row_bodyweight['week84'];
			$week85 = $row_bodyweight['week85'];
			$week86 = $row_bodyweight['week86'];
			$week87 = $row_bodyweight['week87'];
			$week88 = $row_bodyweight['week88'];
			$week89 = $row_bodyweight['week89'];
			$week90 = $row_bodyweight['week90'];
			$week91 = $row_bodyweight['week91'];
			$week92 = $row_bodyweight['week92'];
			$week93 = $row_bodyweight['week93'];
			$week94 = $row_bodyweight['week94'];
			$week95 = $row_bodyweight['week95'];
			$week96 = $row_bodyweight['week96'];
			$week97 = $row_bodyweight['week97'];
			$week98 = $row_bodyweight['week98'];
			$week99 = $row_bodyweight['week99'];
			$week100 = $row_bodyweight['week100'];
			$week101 = $row_bodyweight['week101'];
			$week102 = $row_bodyweight['week102'];
			$week103 = $row_bodyweight['week103'];
			$week104 = $row_bodyweight['week104'];
			$week105 = $row_bodyweight['week105'];
			$week106 = $row_bodyweight['week106'];
			$week107 = $row_bodyweight['week107'];
			$week108 = $row_bodyweight['week108'];
			$week109 = $row_bodyweight['week109'];
			$week110 = $row_bodyweight['week110'];
			$week111 = $row_bodyweight['week111'];
			$week112 = $row_bodyweight['week112'];
			$week113 = $row_bodyweight['week113'];
			$week114 = $row_bodyweight['week114'];
			$week115 = $row_bodyweight['week115'];
			$week116 = $row_bodyweight['week116'];
			$week117 = $row_bodyweight['week117'];
			$week118 = $row_bodyweight['week118'];
			$week119 = $row_bodyweight['week119'];
			$week120 = $row_bodyweight['week120'];
			$week121 = $row_bodyweight['week121'];
			$week122 = $row_bodyweight['week122'];
			$week123 = $row_bodyweight['week123'];
			$week124 = $row_bodyweight['week124'];
			$week125 = $row_bodyweight['week125'];
			$week126 = $row_bodyweight['week126'];
			$week127 = $row_bodyweight['week127'];
			$week128 = $row_bodyweight['week128'];
			$week129 = $row_bodyweight['week129'];
			$week130 = $row_bodyweight['week130'];
			
			print "<br />";
			
			print "<FORM name= \"export_std\" method= \"post\" action= \"http://p66shc.phs.ucdavis.edu/sample_download.php\">";
			print "<INPUT TYPE= \"submit\" VALUE= \"Export this record to Excel\" name= \"sub_sample\">";
			print "<input type= \"hidden\" name= \"q_sample\" value= \"$q_sample\">";
			print "</FORM>";
			
			print "<p>&nbsp;</p>";


			print "<form name= 'bodyweight' method= 'post' action= 'bodyweight.php'>";
			print "<table border= '0' width= '80%' align= 'center'>";

				print "<tr>";
					print "<td><strong>Animal ID</strong></td>";
					print "<td><strong>Genotype</strong></td>";
					print "<td><strong>Date of Birth</strong></td>";
					print "<td><strong>Food</strong></td>";
//					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
				
				print "<tr>";
					print "<td>$an_id</td>";
					print "<td>$genotype</td>";
					print "<td>$bdate</td>";
					print "<td>$food</td>";
//					print "<td colspan= '3'>&nbsp;</td>";
				print "</tr>";
				
//				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
			print "</table>";
			
			print "<table border= '0' width= '80%' align= 'center'>";

				print "<tr>";
					print "<td><strong>Day 27</strong></td>";
					print "<td><strong>Day 28</strong></td>";
					print "<td><strong>Day 29</strong></td>";
					print "<td><strong>Day 30</strong></td>";
					print "<td><strong>Day 31</strong></td>";
					print "<td><strong>Day 32</strong></td>";
					print "<td><strong>Day 33</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day27' value= '$day27'></td>";
					print "<td><input size= '5' type= 'text' name= 'day28' value= '$day28'></td>";
					print "<td><input size= '5' type= 'text' name= 'day29' value= '$day29'></td>";
					print "<td><input size= '5' type= 'text' name= 'day30' value= '$day30'></td>";
					print "<td><input size= '5' type= 'text' name= 'day31' value= '$day31'></td>";
					print "<td><input size= '5' type= 'text' name= 'day32' value= '$day32'></td>";
					print "<td><input size= '5' type= 'text' name= 'day33' value= '$day33'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 34</strong></td>";
					print "<td><strong>Day 35</strong></td>";
					print "<td><strong>Day 36</strong></td>";
					print "<td><strong>Day 37</strong></td>";
					print "<td><strong>Day 38</strong></td>";
					print "<td><strong>Day 39</strong></td>";
					print "<td><strong>Day 40</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day34' value= '$day34'></td>";
					print "<td><input size= '5' type= 'text' name= 'day35' value= '$day35'></td>";
					print "<td><input size= '5' type= 'text' name= 'day36' value= '$day36'></td>";
					print "<td><input size= '5' type= 'text' name= 'day37' value= '$day37'></td>";
					print "<td><input size= '5' type= 'text' name= 'day38' value= '$day38'></td>";
					print "<td><input size= '5' type= 'text' name= 'day39' value= '$day39'></td>";
					print "<td><input size= '5' type= 'text' name= 'day40' value= '$day40'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 41</strong></td>";
					print "<td><strong>Day 42</strong></td>";
					print "<td><strong>Day 43</strong></td>";
					print "<td><strong>Day 44</strong></td>";
					print "<td><strong>Day 45</strong></td>";
					print "<td><strong>Day 46</strong></td>";
					print "<td><strong>Day 47</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day41' value= '$day41'></td>";
					print "<td><input size= '5' type= 'text' name= 'day42' value= '$day42'></td>";
					print "<td><input size= '5' type= 'text' name= 'day43' value= '$day43'></td>";
					print "<td><input size= '5' type= 'text' name= 'day44' value= '$day44'></td>";
					print "<td><input size= '5' type= 'text' name= 'day45' value= '$day45'></td>";
					print "<td><input size= '5' type= 'text' name= 'day46' value= '$day46'></td>";
					print "<td><input size= '5' type= 'text' name= 'day47' value= '$day47'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 48</strong></td>";
					print "<td><strong>Day 49</strong></td>";
					print "<td><strong>Day 50</strong></td>";
					print "<td><strong>Day 51</strong></td>";
					print "<td><strong>Day 52</strong></td>";
					print "<td><strong>Day 53</strong></td>";
					print "<td><strong>Day 54</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day48' value= '$day48'></td>";
					print "<td><input size= '5' type= 'text' name= 'day49' value= '$day49'></td>";
					print "<td><input size= '5' type= 'text' name= 'day50' value= '$day50'></td>";
					print "<td><input size= '5' type= 'text' name= 'day51' value= '$day51'></td>";
					print "<td><input size= '5' type= 'text' name= 'day52' value= '$day52'></td>";
					print "<td><input size= '5' type= 'text' name= 'day53' value= '$day53'></td>";
					print "<td><input size= '5' type= 'text' name= 'day54' value= '$day54'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 55</strong></td>";
					print "<td><strong>Day 56</strong></td>";
					print "<td><strong>Day 57</strong></td>";
					print "<td><strong>Day 58</strong></td>";
					print "<td><strong>Day 59</strong></td>";
					print "<td><strong>Day 60</strong></td>";
					print "<td><strong>Day 61</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day55' value= '$day55'></td>";
					print "<td><input size= '5' type= 'text' name= 'day56' value= '$day56'></td>";
					print "<td><input size= '5' type= 'text' name= 'day57' value= '$day57'></td>";
					print "<td><input size= '5' type= 'text' name= 'day58' value= '$day58'></td>";
					print "<td><input size= '5' type= 'text' name= 'day59' value= '$day59'></td>";
					print "<td><input size= '5' type= 'text' name= 'day60' value= '$day60'></td>";
					print "<td><input size= '5' type= 'text' name= 'day61' value= '$day61'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 62</strong></td>";
					print "<td><strong>Day 63</strong></td>";
					print "<td><strong>Day 64</strong></td>";
					print "<td><strong>Day 65</strong></td>";
					print "<td><strong>Day 66</strong></td>";
					print "<td><strong>Day 67</strong></td>";
					print "<td><strong>Day 68</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day62' value= '$day62'></td>";
					print "<td><input size= '5' type= 'text' name= 'day63' value= '$day63'></td>";
					print "<td><input size= '5' type= 'text' name= 'day64' value= '$day64'></td>";
					print "<td><input size= '5' type= 'text' name= 'day65' value= '$day65'></td>";
					print "<td><input size= '5' type= 'text' name= 'day66' value= '$day66'></td>";
					print "<td><input size= '5' type= 'text' name= 'day67' value= '$day67'></td>";
					print "<td><input size= '5' type= 'text' name= 'day68' value= '$day68'></td>";
				print "</tr>";

				print "<tr>";
					print "<td><strong>Day 69</strong></td>";
					print "<td><strong>Day 70</strong></td>";
					print "<td><strong>Day 71</strong></td>";
					print "<td><strong>Day 72</strong></td>";
					print "<td><strong>Day 73</strong></td>";
					print "<td><strong>Day 74</strong></td>";
					print "<td><strong>Day 75</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day69' value= '$day69'></td>";
					print "<td><input size= '5' type= 'text' name= 'day70' value= '$day70'></td>";
					print "<td><input size= '5' type= 'text' name= 'day71' value= '$day71'></td>";
					print "<td><input size= '5' type= 'text' name= 'day72' value= '$day72'></td>";
					print "<td><input size= '5' type= 'text' name= 'day73' value= '$day73'></td>";
					print "<td><input size= '5' type= 'text' name= 'day74' value= '$day74'></td>";
					print "<td><input size= '5' type= 'text' name= 'day75' value= '$day75'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Day 76</strong></td>";
					print "<td><strong>Day 77</strong></td>";
					print "<td><strong>Day 78</strong></td>";
					print "<td><strong>Day 79</strong></td>";
					print "<td><strong>Day 80</strong></td>";
					print "<td><strong>Day 81</strong></td>";
					print "<td><strong>Day 82</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day76' value= '$day76'></td>";
					print "<td><input size= '5' type= 'text' name= 'day77' value= '$day77'></td>";
					print "<td><input size= '5' type= 'text' name= 'day78' value= '$day78'></td>";
					print "<td><input size= '5' type= 'text' name= 'day79' value= '$day79'></td>";
					print "<td><input size= '5' type= 'text' name= 'day80' value= '$day80'></td>";
					print "<td><input size= '5' type= 'text' name= 'day81' value= '$day81'></td>";
					print "<td><input size= '5' type= 'text' name= 'day82' value= '$day82'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 83</strong></td>";
					print "<td><strong>Day 84</strong></td>";
					print "<td><strong>Day 85</strong></td>";
					print "<td><strong>Day 86</strong></td>";
					print "<td><strong>Day 87</strong></td>";
					print "<td><strong>Day 88</strong></td>";
					print "<td><strong>Day 89</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day83' value= '$day83'></td>";
					print "<td><input size= '5' type= 'text' name= 'day84' value= '$day84'></td>";
					print "<td><input size= '5' type= 'text' name= 'day85' value= '$day85'></td>";
					print "<td><input size= '5' type= 'text' name= 'day86' value= '$day86'></td>";
					print "<td><input size= '5' type= 'text' name= 'day87' value= '$day87'></td>";
					print "<td><input size= '5' type= 'text' name= 'day88' value= '$day88'></td>";
					print "<td><input size= '5' type= 'text' name= 'day89' value= '$day89'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 90</strong></td>";
					print "<td><strong>Day 91</strong></td>";
					print "<td><strong>Day 92</strong></td>";
					print "<td><strong>Day 93</strong></td>";
					print "<td><strong>Day 94</strong></td>";
					print "<td><strong>Day 95</strong></td>";
					print "<td><strong>Day 96</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day90' value= '$day90'></td>";
					print "<td><input size= '5' type= 'text' name= 'day91' value= '$day91'></td>";
					print "<td><input size= '5' type= 'text' name= 'day92' value= '$day92'></td>";
					print "<td><input size= '5' type= 'text' name= 'day93' value= '$day93'></td>";
					print "<td><input size= '5' type= 'text' name= 'day94' value= '$day94'></td>";
					print "<td><input size= '5' type= 'text' name= 'day95' value= '$day95'></td>";
					print "<td><input size= '5' type= 'text' name= 'day96' value= '$day96'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 97</strong></td>";
					print "<td><strong>Day 98</strong></td>";
					print "<td><strong>Day 99</strong></td>";
					print "<td><strong>Day 100</strong></td>";
					print "<td><strong>Day 101</strong></td>";
					print "<td><strong>Day 102</strong></td>";
					print "<td><strong>Day 103</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day97' value= '$day97'></td>";
					print "<td><input size= '5' type= 'text' name= 'day98' value= '$day98'></td>";
					print "<td><input size= '5' type= 'text' name= 'day99' value= '$day99'></td>";
					print "<td><input size= '5' type= 'text' name= 'day100' value= '$day100'></td>";
					print "<td><input size= '5' type= 'text' name= 'day101' value= '$day101'></td>";
					print "<td><input size= '5' type= 'text' name= 'day102' value= '$day102'></td>";
					print "<td><input size= '5' type= 'text' name= 'day103' value= '$day103'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 104</strong></td>";
					print "<td><strong>Day 105</strong></td>";
					print "<td><strong>Day 106</strong></td>";
					print "<td><strong>Day 107</strong></td>";
					print "<td><strong>Day 108</strong></td>";
					print "<td><strong>Day 109</strong></td>";
					print "<td><strong>Day 110</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day104' value= '$day104'></td>";
					print "<td><input size= '5' type= 'text' name= 'day105' value= '$day105'></td>";
					print "<td><input size= '5' type= 'text' name= 'day106' value= '$day106'></td>";
					print "<td><input size= '5' type= 'text' name= 'day107' value= '$day107'></td>";
					print "<td><input size= '5' type= 'text' name= 'day108' value= '$day108'></td>";
					print "<td><input size= '5' type= 'text' name= 'day109' value= '$day109'></td>";
					print "<td><input size= '5' type= 'text' name= 'day110' value= '$day110'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 111</strong></td>";
					print "<td><strong>Day 112</strong></td>";
					print "<td><strong>Day 113</strong></td>";
					print "<td><strong>Day 114</strong></td>";
					print "<td><strong>Day 115</strong></td>";
					print "<td><strong>Day 116</strong></td>";
					print "<td><strong>Day 117</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day111' value= '$day111'></td>";
					print "<td><input size= '5' type= 'text' name= 'day112' value= '$day112'></td>";
					print "<td><input size= '5' type= 'text' name= 'day113' value= '$day113'></td>";
					print "<td><input size= '5' type= 'text' name= 'day114' value= '$day114'></td>";
					print "<td><input size= '5' type= 'text' name= 'day115' value= '$day115'></td>";
					print "<td><input size= '5' type= 'text' name= 'day116' value= '$day116'></td>";
					print "<td><input size= '5' type= 'text' name= 'day117' value= '$day117'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 118</strong></td>";
					print "<td><strong>Day 119</strong></td>";
					print "<td><strong>Day 120</strong></td>";
					print "<td><strong>Day 121</strong></td>";
					print "<td><strong>Day 122</strong></td>";
					print "<td><strong>Day 123</strong></td>";
					print "<td><strong>Day 124</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day118' value= '$day118'></td>";
					print "<td><input size= '5' type= 'text' name= 'day119' value= '$day119'></td>";
					print "<td><input size= '5' type= 'text' name= 'day120' value= '$day120'></td>";
					print "<td><input size= '5' type= 'text' name= 'day121' value= '$day121'></td>";
					print "<td><input size= '5' type= 'text' name= 'day122' value= '$day122'></td>";
					print "<td><input size= '5' type= 'text' name= 'day123' value= '$day123'></td>";
					print "<td><input size= '5' type= 'text' name= 'day124' value= '$day124'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Day 125</strong></td>";
					print "<td><strong>Day 126</strong></td>";
					print "<td><strong>Day 127</strong></td>";
					print "<td><strong>Day 128</strong></td>";
					print "<td><strong>Day 129</strong></td>";
					print "<td><strong>Day 130</strong></td>";
					print "<td><strong>&nbsp;</strong></td>";
//					print "<td><strong>Day 131</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'day125' value= '$day125'></td>";
					print "<td><input size= '5' type= 'text' name= 'day126' value= '$day126'></td>";
					print "<td><input size= '5' type= 'text' name= 'day127' value= '$day127'></td>";
					print "<td><input size= '5' type= 'text' name= 'day128' value= '$day128'></td>";
					print "<td><input size= '5' type= 'text' name= 'day129' value= '$day129'></td>";
					print "<td><input size= '5' type= 'text' name= 'day130' value= '$day130'></td>";
					print "<td>&nbsp;</td>";
//					print "<td><input size= '5' type= 'text' name= 'day131' value= '$day131'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
//				print "<tr>";
//					print "<td><strong>Day 132</strong></td>";
//					print "<td><strong>Day 133</strong></td>";
//					print "<td colspan='5'><strong>&nbsp;</strong></td>";
//				print "</tr>";
				
//				print "<tr>";
//					print "<td><input size= '5' type= 'text' name= 'day132' value= '$day132'></td>";
//					print "<td><input size= '5' type= 'text' name= 'day133' value= '$day133'></td>";
//					print "<td colspan='5'>&nbsp;</td>";
//				print "</tr>";

//				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Week 20</strong></td>";
					print "<td><strong>Week 21</strong></td>";
					print "<td><strong>Week 22</strong></td>";
					print "<td><strong>Week 23</strong></td>";
					print "<td><strong>Week 24</strong></td>";
					print "<td><strong>Week 25</strong></td>";
					print "<td><strong>Week 26</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week20' value= '$week20'></td>";
					print "<td><input size= '5' type= 'text' name= 'week21' value= '$week21'></td>";
					print "<td><input size= '5' type= 'text' name= 'week22' value= '$week22'></td>";
					print "<td><input size= '5' type= 'text' name= 'week23' value= '$week23'></td>";
					print "<td><input size= '5' type= 'text' name= 'week24' value= '$week24'></td>";
					print "<td><input size= '5' type= 'text' name= 'week25' value= '$week25'></td>";
					print "<td><input size= '5' type= 'text' name= 'week26' value= '$week26'></td>";
				print "</tr>";

				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 27</strong></td>";
					print "<td><strong>Week 28</strong></td>";
					print "<td><strong>Week 29</strong></td>";
					print "<td><strong>Week 30</strong></td>";
					print "<td><strong>Week 31</strong></td>";
					print "<td><strong>Week 32</strong></td>";
					print "<td><strong>Week 33</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week27' value= '$week27'></td>";
					print "<td><input size= '5' type= 'text' name= 'week28' value= '$week28'></td>";
					print "<td><input size= '5' type= 'text' name= 'week29' value= '$week29'></td>";
					print "<td><input size= '5' type= 'text' name= 'week30' value= '$week30'></td>";
					print "<td><input size= '5' type= 'text' name= 'week31' value= '$week31'></td>";
					print "<td><input size= '5' type= 'text' name= 'week32' value= '$week32'></td>";
					print "<td><input size= '5' type= 'text' name= 'week33' value= '$week33'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";

				print "<tr>";
					print "<td><strong>Week 34</strong></td>";
					print "<td><strong>Week 35</strong></td>";
					print "<td><strong>Week 36</strong></td>";
					print "<td><strong>Week 37</strong></td>";
					print "<td><strong>Week 38</strong></td>";
					print "<td><strong>Week 39</strong></td>";
					print "<td><strong>Week 40</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week34' value= '$week34'></td>";
					print "<td><input size= '5' type= 'text' name= 'week35' value= '$week35'></td>";
					print "<td><input size= '5' type= 'text' name= 'week36' value= '$week36'></td>";
					print "<td><input size= '5' type= 'text' name= 'week37' value= '$week37'></td>";
					print "<td><input size= '5' type= 'text' name= 'week38' value= '$week38'></td>";
					print "<td><input size= '5' type= 'text' name= 'week39' value= '$week39'></td>";
					print "<td><input size= '5' type= 'text' name= 'week40' value= '$week40'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 41</strong></td>";
					print "<td><strong>Week 42</strong></td>";
					print "<td><strong>Week 43</strong></td>";
					print "<td><strong>Week 44</strong></td>";
					print "<td><strong>Week 45</strong></td>";
					print "<td><strong>Week 46</strong></td>";
					print "<td><strong>Week 47</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week41' value= '$week41'></td>";
					print "<td><input size= '5' type= 'text' name= 'week42' value= '$week42'></td>";
					print "<td><input size= '5' type= 'text' name= 'week43' value= '$week43'></td>";
					print "<td><input size= '5' type= 'text' name= 'week44' value= '$week44'></td>";
					print "<td><input size= '5' type= 'text' name= 'week45' value= '$week45'></td>";
					print "<td><input size= '5' type= 'text' name= 'week46' value= '$week46'></td>";
					print "<td><input size= '5' type= 'text' name= 'week47' value= '$week47'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 48</strong></td>";
					print "<td><strong>Week 49</strong></td>";
					print "<td><strong>Week 50</strong></td>";
					print "<td><strong>Week 51</strong></td>";
					print "<td><strong>Week 52</strong></td>";
					print "<td><strong>Week 53</strong></td>";
					print "<td><strong>Week 54</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week48' value= '$week48'></td>";
					print "<td><input size= '5' type= 'text' name= 'week49' value= '$week49'></td>";
					print "<td><input size= '5' type= 'text' name= 'week50' value= '$week50'></td>";
					print "<td><input size= '5' type= 'text' name= 'week51' value= '$week51'></td>";
					print "<td><input size= '5' type= 'text' name= 'week52' value= '$week52'></td>";
					print "<td><input size= '5' type= 'text' name= 'week53' value= '$week53'></td>";
					print "<td><input size= '5' type= 'text' name= 'week54' value= '$week54'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 55</strong></td>";
					print "<td><strong>Week 56</strong></td>";
					print "<td><strong>Week 57</strong></td>";
					print "<td><strong>Week 58</strong></td>";
					print "<td><strong>Week 59</strong></td>";
					print "<td><strong>Week 60</strong></td>";
					print "<td><strong>Week 61</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week55' value= '$week55'></td>";
					print "<td><input size= '5' type= 'text' name= 'week56' value= '$week56'></td>";
					print "<td><input size= '5' type= 'text' name= 'week57' value= '$week57'></td>";
					print "<td><input size= '5' type= 'text' name= 'week58' value= '$week58'></td>";
					print "<td><input size= '5' type= 'text' name= 'week59' value= '$week59'></td>";
					print "<td><input size= '5' type= 'text' name= 'week60' value= '$week60'></td>";
					print "<td><input size= '5' type= 'text' name= 'week61' value= '$week61'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 62</strong></td>";
					print "<td><strong>Week 63</strong></td>";
					print "<td><strong>Week 64</strong></td>";
					print "<td><strong>Week 65</strong></td>";
					print "<td><strong>Week 66</strong></td>";
					print "<td><strong>Week 67</strong></td>";
					print "<td><strong>Week 68</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week62' value= '$week62'></td>";
					print "<td><input size= '5' type= 'text' name= 'week63' value= '$week63'></td>";
					print "<td><input size= '5' type= 'text' name= 'week64' value= '$week64'></td>";
					print "<td><input size= '5' type= 'text' name= 'week65' value= '$week65'></td>";
					print "<td><input size= '5' type= 'text' name= 'week66' value= '$week66'></td>";
					print "<td><input size= '5' type= 'text' name= 'week67' value= '$week67'></td>";
					print "<td><input size= '5' type= 'text' name= 'week68' value= '$week68'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 69</strong></td>";
					print "<td><strong>Week 70</strong></td>";
					print "<td><strong>Week 71</strong></td>";
					print "<td><strong>Week 72</strong></td>";
					print "<td><strong>Week 73</strong></td>";
					print "<td><strong>Week 74</strong></td>";
					print "<td><strong>Week 75</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week69' value= '$week69'></td>";
					print "<td><input size= '5' type= 'text' name= 'week70' value= '$week70'></td>";
					print "<td><input size= '5' type= 'text' name= 'week71' value= '$week71'></td>";
					print "<td><input size= '5' type= 'text' name= 'week72' value= '$week72'></td>";
					print "<td><input size= '5' type= 'text' name= 'week73' value= '$week73'></td>";
					print "<td><input size= '5' type= 'text' name= 'week74' value= '$week74'></td>";
					print "<td><input size= '5' type= 'text' name= 'week75' value= '$week75'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 76</strong></td>";
					print "<td><strong>Week 77</strong></td>";
					print "<td><strong>Week 78</strong></td>";
					print "<td><strong>Week 79</strong></td>";
					print "<td><strong>Week 80</strong></td>";
					print "<td><strong>Week 81</strong></td>";
					print "<td><strong>Week 82</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week76' value= '$week76'></td>";
					print "<td><input size= '5' type= 'text' name= 'week77' value= '$week77'></td>";
					print "<td><input size= '5' type= 'text' name= 'week78' value= '$week78'></td>";
					print "<td><input size= '5' type= 'text' name= 'week79' value= '$week79'></td>";
					print "<td><input size= '5' type= 'text' name= 'week80' value= '$week80'></td>";
					print "<td><input size= '5' type= 'text' name= 'week81' value= '$week81'></td>";
					print "<td><input size= '5' type= 'text' name= 'week82' value= '$week82'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 83</strong></td>";
					print "<td><strong>Week 84</strong></td>";
					print "<td><strong>Week 85</strong></td>";
					print "<td><strong>Week 86</strong></td>";
					print "<td><strong>Week 87</strong></td>";
					print "<td><strong>Week 88</strong></td>";
					print "<td><strong>Week 89</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week83' value= '$week83'></td>";
					print "<td><input size= '5' type= 'text' name= 'week84' value= '$week84'></td>";
					print "<td><input size= '5' type= 'text' name= 'week85' value= '$week85'></td>";
					print "<td><input size= '5' type= 'text' name= 'week86' value= '$week86'></td>";
					print "<td><input size= '5' type= 'text' name= 'week87' value= '$week87'></td>";
					print "<td><input size= '5' type= 'text' name= 'week88' value= '$week88'></td>";
					print "<td><input size= '5' type= 'text' name= 'week89' value= '$week89'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 90</strong></td>";
					print "<td><strong>Week 91</strong></td>";
					print "<td><strong>Week 92</strong></td>";
					print "<td><strong>Week 93</strong></td>";
					print "<td><strong>Week 94</strong></td>";
					print "<td><strong>Week 95</strong></td>";
					print "<td><strong>Week 96</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week90' value= '$week90'></td>";
					print "<td><input size= '5' type= 'text' name= 'week91' value= '$week91'></td>";
					print "<td><input size= '5' type= 'text' name= 'week92' value= '$week92'></td>";
					print "<td><input size= '5' type= 'text' name= 'week93' value= '$week93'></td>";
					print "<td><input size= '5' type= 'text' name= 'week94' value= '$week94'></td>";
					print "<td><input size= '5' type= 'text' name= 'week95' value= '$week95'></td>";
					print "<td><input size= '5' type= 'text' name= 'week96' value= '$week96'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 97</strong></td>";
					print "<td><strong>Week 98</strong></td>";
					print "<td><strong>Week 99</strong></td>";
					print "<td><strong>Week 100</strong></td>";
					print "<td><strong>Week 101</strong></td>";
					print "<td><strong>Week 102</strong></td>";
					print "<td><strong>Week 103</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week97' value= '$week97'></td>";
					print "<td><input size= '5' type= 'text' name= 'week98' value= '$week98'></td>";
					print "<td><input size= '5' type= 'text' name= 'week99' value= '$week99'></td>";
					print "<td><input size= '5' type= 'text' name= 'week100' value= '$week100'></td>";
					print "<td><input size= '5' type= 'text' name= 'week101' value= '$week101'></td>";
					print "<td><input size= '5' type= 'text' name= 'week102' value= '$week102'></td>";
					print "<td><input size= '5' type= 'text' name= 'week103' value= '$week103'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 104</strong></td>";
					print "<td><strong>Week 105</strong></td>";
					print "<td><strong>Week 106</strong></td>";
					print "<td><strong>Week 107</strong></td>";
					print "<td><strong>Week 108</strong></td>";
					print "<td><strong>Week 109</strong></td>";
					print "<td><strong>Week 110</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week104' value= '$week104'></td>";
					print "<td><input size= '5' type= 'text' name= 'week105' value= '$week105'></td>";
					print "<td><input size= '5' type= 'text' name= 'week106' value= '$week106'></td>";
					print "<td><input size= '5' type= 'text' name= 'week107' value= '$week107'></td>";
					print "<td><input size= '5' type= 'text' name= 'week108' value= '$week108'></td>";
					print "<td><input size= '5' type= 'text' name= 'week109' value= '$week109'></td>";
					print "<td><input size= '5' type= 'text' name= 'week110' value= '$week110'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 111</strong></td>";
					print "<td><strong>Week 112</strong></td>";
					print "<td><strong>Week 113</strong></td>";
					print "<td><strong>Week 114</strong></td>";
					print "<td><strong>Week 115</strong></td>";
					print "<td><strong>Week 116</strong></td>";
					print "<td><strong>Week 117</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week111' value= '$week111'></td>";
					print "<td><input size= '5' type= 'text' name= 'week112' value= '$week112'></td>";
					print "<td><input size= '5' type= 'text' name= 'week113' value= '$week113'></td>";
					print "<td><input size= '5' type= 'text' name= 'week114' value= '$week114'></td>";
					print "<td><input size= '5' type= 'text' name= 'week115' value= '$week115'></td>";
					print "<td><input size= '5' type= 'text' name= 'week116' value= '$week116'></td>";
					print "<td><input size= '5' type= 'text' name= 'week117' value= '$week117'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 118</strong></td>";
					print "<td><strong>Week 119</strong></td>";
					print "<td><strong>Week 120</strong></td>";
					print "<td><strong>Week 121</strong></td>";
					print "<td><strong>Week 122</strong></td>";
					print "<td><strong>Week 123</strong></td>";
					print "<td><strong>Week 124</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week118' value= '$week118'></td>";
					print "<td><input size= '5' type= 'text' name= 'week119' value= '$week119'></td>";
					print "<td><input size= '5' type= 'text' name= 'week120' value= '$week120'></td>";
					print "<td><input size= '5' type= 'text' name= 'week121' value= '$week121'></td>";
					print "<td><input size= '5' type= 'text' name= 'week122' value= '$week122'></td>";
					print "<td><input size= '5' type= 'text' name= 'week123' value= '$week123'></td>";
					print "<td><input size= '5' type= 'text' name= 'week124' value= '$week124'></td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr>";
					print "<td><strong>Week 125</strong></td>";
					print "<td><strong>Week 126</strong></td>";
					print "<td><strong>Week 127</strong></td>";
					print "<td><strong>Week 128</strong></td>";
					print "<td><strong>Week 129</strong></td>";
					print "<td><strong>Week 130</strong></td>";
					print "<td><strong>&nbsp;</strong></td>";
				print "</tr>";
				
				print "<tr>";
					print "<td><input size= '5' type= 'text' name= 'week125' value= '$week125'></td>";
					print "<td><input size= '5' type= 'text' name= 'week126' value= '$week126'></td>";
					print "<td><input size= '5' type= 'text' name= 'week127' value= '$week127'></td>";
					print "<td><input size= '5' type= 'text' name= 'week128' value= '$week128'></td>";
					print "<td><input size= '5' type= 'text' name= 'week129' value= '$week129'></td>";
					print "<td><input size= '5' type= 'text' name= 'week130' value= '$week130'></td>";
					print "<td>&nbsp;</td>";
				print "</tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<tr><td>&nbsp;</td></tr>";
				
				print "<input type= 'hidden' name= 'bw_id' value= '$bw_id'>";
				print "<input type= 'hidden' name= 'an_id' value= '$an_id'>";
				print "<input type= 'hidden' name= 'genotype' value= '$genotype'>";
				
				print "<tr>";
		            print "<td colspan= '7'><input type= \"submit\" name= \"sub_data\" value= \"Submit Bodyweight Data\" /></td>";
		        print "</tr>";
					
			print "</table>";
			print "</form>";
			
			
			print "<p><a href= \"subject.php\">Back to Subject Sample Data Main Page</a><p>";
		
		} // end is !sub_data && $GETFILE
		

	} // end if DBOK
} // end fopen		


?>
   





</body>
</html>