<?
/**
 * common.lib.php - Collection of frequently used functions
 *
 */

function date_UNIXSTAMP($date)
{
	if($date != "")
	{
		list($m,$d,$y) = explode("/",$date);
		$date = mktime(0,0,0,$m,$d,$y);
		return $date;
	}
}

function viewdate_UNIXSTAMP($date)
{
	if($date != "" && $date != 0)
	{
		$date = date("m/d/Y",$date);
		return $date;
	}
}

function viewtime_UNIXSTAMP($time)
{
	$time = date("g:i A",$time);	
	return $time;
}


function Date2DBDate($date)
{
	list($m,$d,$y) = explode("/",$date);
	
	$newdateformat = $y."-".$m."-".$d;	
	
	return $newdateformat;
}

function DBDate2Date($date)
{
	list($y,$m,$d) = explode("-",$date);
	
	$d = substr($d, 0, 2);
	
	$newdateformat = $m."/".$d."/".$y;	
	
	return $newdateformat;
}

function logout($message=NULL)
{
	unset($_COOKIE[session_name()]);
	$_SESSION=array();
	session_regenerate_id();
	session_unset();
	session_destroy();	
	
	echo "<script>window.location = ".$GLOBALS['root_dir']."/index.php?m=$message'</script>";	
}

function sec_check($req_priv=NULL)
{
	// clean $req_priv
	$req_priv = sanitizeString($req_priv);
		
	//echo "<p>rp: $req_priv</p>";
		
	// if valid session array exists for the user
	if(isset($_SESSION["s_userarray"]))
	{
		// grab current PHPSESSID of this user's browser session
		$seshid = session_id(); // don’t fetch from user array!
		
		// localize session variable
		$session_userarray = array();
		$session_userarray = $_SESSION['s_userarray'];

		// extract username from user array
		$username = $session_userarray['username'];

		// get IP ADDRESS of this client
		$remote_ip = getenv('REMOTE_ADDR');		

		// build query for tracking their session
		$q = "
			select 
				id_users 
			from 
				sessions,
				users 
			where 
				sessions.seshid='$seshid' 
				and users.username='$username' 
				and sessions.remote_ip = '$remote_ip'
				and sessions.username = users.username
				and users.active = '1'
			";
		$r = executeQuery(MAINDB,$q);
		$checksesh = mysql_fetch_array($r);
		
		// if no valid session is recorded in sessions table, process logout
		if(!$checksesh)
		{
			logout(); // no session defined, but session array exists! 
		}
		
		// otherwise proceed with updating session entry with new timestamp, last viewed screen
		// record laststamp date
		$now = time();

		$q = "
			update 
				sessions 
			set 
				laststamp=FROM_UNIXTIME('$now'),
				lastscreen='".$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"]."' 
			where 
				seshid='$seshid'
			";
		$r = executeQuery(MAINDB,$q);
		
		if($req_priv != NULL)
		{
			// perform privilege check
			$q  = "select * from users where users.username = '$username' and users.active = '1'";
			$r = executeQuery(MAINDB,$q);
			
			if($r)
			{	
				$row = mysql_fetch_array($r);
			
				if($row[$req_priv] != '1')
					return false; // failed privilege check.
				else
					return true; // passed session check and privilege check.
			}
			else
				return false; // no active user returned.
		}
		else
		{
			return true; // we're just checking to make sure they have a valid session, we're OK.
		}
	}
	else
		return false; // no user session array exists!
}	

// allow only alpha numeric strings
function sanitizeString($string)
{
	if(is_string($string))
	{
		return ereg_replace("[^[:space:]a-zA-Z0-9*_.-]", "", $string);
	}
	else
		return NULL;
}

function redirect($location)
{
	echo "<script>window.location='$location'</script>";	
}

function displayError($err_msg)
{
	echo "<div align='center'><table cellpadding='4' cellspacing='2' border='0' width='33%' class='tablelined'><tr bgcolor='#FFFF99'><td align='center'><img src='".$GLOBALS['root_dir']."/images/error.gif'>&nbsp;<b>$err_msg</b></td></tr></table></div>";	
}

function croak()
{
	echo "<p><b><font color='red'>Access Denied.</font></b></p>";

	echo "<p><a href='".$GLOBALS['root_dir']."/index.php?a=logout'>Sign In >></a></p>";	
		
	exit();
}

function launchMasterModule($module_code)
{
	$module_code = strtoupper(sanitizeString($module_code));
	$file = $GLOBALS['root_dir']."/modules/".$module_code."/".$module_code."_MAIN.php";
		
	if(file_exists($file))
	{
		// register preferred master module session var
		$_SESSION['s_mastermod'] = $module_code;
		
		echo "<script>window.location='$file';</script>";
	}
	else
	{
		$err_msg = "The module you requested is not available.";
		displayError($err_msg);
	}
}

function printSubheader($banner)
{
	echo "<table cellpadding='4' cellspacing='2' border='0' width='100%'><tr><td class='subheader'>$banner</td></tr></table>";		
}

function verifyDate($date)
{	
	// split things up into workable morsels
	list($month,$day,$year) = explode("/",$date);
	
	if(!checkdate($month,$day,$year) || strlen($year) != 4)
		return false;
	else
		return true;
}

function DropDown ($list_table, $list_item, $list_dbid, $list)
{
  $q_getlist = "select * from $list_table ORDER BY $list_item";
  $r_getlist = mysql_query($q_getlist);
  $list_total = 0;
  while ($row_getlist = mysql_fetch_array($r_getlist))
  {
    $list_id[$list_total] = $row_getlist["$list_dbid"];
	$list_name[$list_total] = $row_getlist["$list_item"];
	if ($list_name[$list_total] == $list) $list_list = $list_name[$list_total];
    $list_total++;
  }

  print "<select name = \"$list_item\">";
  $list_counter = 0;
  for ($list_counter = 0; $list_counter < $list_total; $list_counter++)
  {
    print "<option value = \"".$list_name[$list_counter]."\" ";
	if ($list_name[$list_counter] == $list) print "selected";
	print "> $list_name[$list_counter]</option>\n";
  }
  print "</select>";
  return;
}

function verifyYear($year)
{	
	// verify year is in a reasonable range
	
	if (($year < 1950) || ($year > 2010))
		return false;
	else
		return true;
}

?>