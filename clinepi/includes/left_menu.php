<?php
if($_SERVER['SERVER_NAME'] == 'secure.phs.ucdavis.edu')
	$leftnavROOT="http://phs.ucdavis.edu";
else
//	$leftnavROOT="";
	$leftnavROOT=$GLOBALS['ROOT_DIR'];
	
//	$parentdir=basename(dirname(dirname(__FILE__)));
//if($_SERVER['SERVER_NAME'] != $GLOBALS['PRODUCTION_HOST_NAME'])
//	$parentdir="/".$GLOBALS['ROOT_DIR'];
//else
//	$parentdir="";
?>
<!--
<ul id="phsLeft">
<li><? //print "<a href=\"$leftnavROOT/index.php\">Public Health Sciences</a>" ?></li>
<li><? //print "<a href=\"$leftnavROOT/about.php\">About Us</a>" ?></li>
<li><? //print "<a href=\"$leftnavROOT/faculty.php\">Faculty</a>" ?>
  <ul>
    	<li><? //print "<a href=\"$leftnavROOT/faculty.php\">PHS Faculty</a>" ?>
   	  <ul>
            	<?php
					if ($fp = fopen("/usr/local/secure_www/.my.cnf", "r")) 
					{
						while (!feof($fp)) 
						{
							$line = fgets($fp, 4096);
							if (preg_match("/password=(\\w+)/", $line, $found)) $password = $found[1];
							elseif (preg_match("/user=(\\w+)/", $line, $found)) $user_name = $found[1];
							elseif (preg_match("/host=([\\w\\.]+)/", $line, $found)) $host_name = $found[1];
						} // end while

						fclose($fp);
//						$dbok = ($link = mysql_connect($host_name, $user_name, $password) && mysql_select_db("dept")); 
						$dbok = ($link = new mysqli($host_name, $user_name, $password, "dept"));
					} // end if $fp


					// if we successfully connected to the database, then attempt to retrieve and display announcements
					if ($dbok) 
					{
	                	$q_faculty = "SELECT * FROM people WHERE listing like \"%=1=%\" ORDER BY lname";
						$r_faculty = mysqli_query($link, $q_faculty);
						while ($row_faculty = mysqli_fetch_array($r_faculty, MYSQLI_ASSOC))
						{
							$id = $row_faculty["id"];
							$fname = $row_faculty["fmname"];
							$lname = $row_faculty["lname"];
							print "<li><a href= $leftnavROOT/faculty_detail.php?id=$id>$fname $lname</a></li>";
						}
					} // if db_ok					
				?>
            </ul>
        </li>
      <li><? //print "<a href=\"$leftnavROOT/volunteer_faculty.php\">Volunteer Faculty</a>" ?></li>
    </ul>
</li>
<li><? //print "<a href=\"$leftnavROOT/phs_staff.php\">Staff</a>" ?>
  <ul>
    	<li><? //print "<a href=\"$leftnavROOT/phs_staff.php\">Administrative Staff</a>" ?></li>
        <li><? //print "<a href=\"$leftnavROOT/it_staff.php\">IT Services</a>" ?></li>
    </ul>
</li>

<li><? //print "<a href=\"$leftnavROOT/jobs.php\">Jobs</a>" ?></li>

<li><? //print "<a href=\"$leftnavROOT/education.php\">Education Programs</a>" ?>
  <ul>
    	<li><? //print "<a href=\"$leftnavROOT/education/professional.php\">Professional Degrees</a>" ?>
   	  <ul>
            	<li><a href="http://www.ucdmc.ucdavis.edu/mdprogram/" target="_blank">MD</a></li>
          <li><a href="http://mph.ucdavis.edu/" target="_blank">MPH</a></li>
          </ul>
        </li>
  <li><? //print "<a href=\"$leftnavROOT/education/graduate.php\">Graduate Degrees</a>" ?>
  <ul>
            	<li><a href="http://biostat.ucdavis.edu/" target="_blank">Biostatistics</a></li>
          <li><a href="http://www.epi.ucdavis.edu/" target="_blank">Epidemiology</a></li>
          <li><a href="http://mph.ucdavis.edu/" target="_blank">Master of Public Health</a></li>
          <li><a href="http://www.envtox.ucdavis.edu/ptx/" target="_blank">Pharmacology & Toxicology</a></li>
        </ul>
        </li>
  <li><? //print "<a href=\"$leftnavROOT/education/undergraduate.php\">Undergraduate Courses</a>" ?>
  <ul>
            	<li><? //print "<a href=\"$leftnavROOT/education/sph101.php\">SPH 101</a>" ?></li>
        </ul>
        </li>
  <li><? //print "<a href=\"$leftnavROOT/education/graduate.php\">Graduate Courses</a>" ?>
  <ul>
            	<li><?// print "<a href=\"$leftnavROOT/education/epi220.php\">EPI 220</a>" ?></li>
          <li><? //print "<a href=\"$leftnavROOT/education/epi228.php\">EPI 298</a>" ?></li>
        </ul>
        </li>
  <li><?// print "<a href=\"$leftnavROOT/education/professional.php\">Professional Courses</a>" ?>
  <ul>
            	<li><? //print "<a href=\"$leftnavROOT/education/sph495.php\">SPH 495</a>" ?></li>
        </ul>
        </li>
  <li><? //print "<a href=\"$leftnavROOT/education/cme.php\">Continuing Medical Education</a>" ?>
  <ul>
            	<li><? //print "<a href=\"$leftnavROOT/education/grandrounds.php\">OEM Grand Rounds</a>" ?></li>
          <li><? //print "<a href=\"$leftnavROOT/education/occ_med.php\">Occupational and Environmental Medicine Symposium</a>" ?></li> 
          <li><? //print "<a href=\"$leftnavROOT/education/clinepi.php\">Clinical Epidemiology and Study Design</a>" ?></li>
        </ul>
        </li>
    </ul>
</li>

<li><? //print "<a href=\"$leftnavROOT/research.php\">Research</a>" ?>
  <ul>
    	<li><? //print "<a href=\"$leftnavROOT/research/projects.php\">Projects</a>" ?>
   	  <ul>
            	<li><a href="http://beincharge.ucdavis.edu/" target="_blank">CHARGE</a></li>
              <li><a href="http://slovakchildren.ucdavis.edu/" target="_blank">Slovak PCB</a></li>
              <li><a href="http://agcenter.ucdavis.edu/research/FHS/home.php">Farmer Health</a></li>
          <li><? //print "<a href=\"$leftnavROOT/research/salud.php\">SALUD</a>" ?>
  <ul>
                    	<li><? //print "<a href=\"$leftnavROOT/research/salud_methods.php\">Research Design and Methods</a>" ?></li>
              <li><? //print "<a href=\"$leftnavROOT/research/salud_investigators.php\">Investigators</a>" ?></li>
            </ul>
                </li>
            <li><a href="http://superb.ucdavis.edu/" target="_blank">SUPERB</a></li>
              <li><a href="http://www.edc.gsph.pitt.edu/swan" target="_blank">SWAN</a></li>
              <li><? // print "<a href=\"$leftnavROOT/research/scope.php\">SCOPE</a>" ?></li>
          <li><? //print "<a href=\"$leftnavROOT/research/whel.php\">WHEL</a>" ?></li>
          </ul>
        </li>
      <li><? //print "<a href=\"$leftnavROOT/research/online_publications.php\">Online Publications</a>" ?></li>
    </ul>
</li>

<li><? //print "<a href=\"$leftnavROOT/divctr.php\">Divisions & Centers</a>" ?></a>
  <ul>
    	<li><a href="http://biostats.ucdavis.edu/" target="_blank">Biostatistics</a></li>
      <li><a href="http://epidemiology.ucdavis.edu/" target="_blank">Epidemiology</a></li>
      <li><a href="http://agcenter.ucdavis.edu/" target="_blank">Ag Health & Safety</a></li>
      <li><a href="http://eoh.ucdavis.edu/" target="_blank">Environmental and Occupational Health</a></li>
      <li><a href="http://coeh.ucdavis.edu/" target="_blank">Center for Occupational and Environmental Health</a></li>
      <li><a href="http://coeh.berkeley.edu/" target="_blank">Occupational Health</a></li>
      <li><a href="http://medsurv.ucdavis.edu/" target="_blank">Medical Surveillance</a></li>
<li><? //print "<a href=\"$leftnavROOT/divctr/international.php\">International Health</a>" ?>
  <ul>
            	<li><? //print "<a href=\"$leftnavROOT/divctr/international/courses.php\">Courses at UC Davis</a>" ?></li> 
                <li><? //print "<a href=\"$leftnavROOT/divctr/international/internships.php\">Internships</a>" ?></li>
<!--          		<li><a href="">International Health Conference</a></li> --
                <li><? //print "<a href=\"$leftnavROOT/divctr/international/mentors.php\">Mentors at UC Davis</a>" ?></li>
          <li><? //print "<a href=\"$leftnavROOT/divctr/international/listserv.php\">World Health Listserv</a>" ?></li>
  <li><? //print "<a href=\"$leftnavROOT/divctr/international/research.php\">Research and Teaching</a>" ?>
    <ul>
              <li><? //print "<a href=\"$leftnavROOT/divctr/international/research_au.php\">Australia</a>" ?></li>
              <li><? //print "<a href=\"$leftnavROOT/divctr/international/research_easian.php\">East Asia</a>" ?></li>
              <li><? //print "<a href=\"$leftnavROOT/divctr/international/research_sasian.php\">South Asia</a>" ?></li>
              <li><? //print "<a href=\"$leftnavROOT/divctr/international/research_seasian.php\">Souteast Asia</a>" ?></li>
            </ul>
                </li>
                <li><? //print "<a href=\"$leftnavROOT/divctr/international/programs.php\">Other UC Davis Programs</a>" ?></li>
                <li><? //print "<a href=\"$leftnavROOT/divctr/international/links.php\">International Health Links</a>" ?></li>
        </ul>
        </li>
    </ul>
</li>

<li><? //print "<a href=\"$leftnavROOT/contact.php\">Contact Us</a>" ?></li>
<li><a href="http://intranet.phs.ucdavis.edu">PHS Intranet</a></li>
</ul>
-->