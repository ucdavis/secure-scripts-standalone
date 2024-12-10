<? include "../includes/internal_authentication.php"; ?>

<link type="text/css" rel="stylesheet" href="../includes/tcec.css">

<h1>Instrument Detail</h1>

	<?php
	// include function library
//	include "/includes/common.lib.php";

	$instrument_id = "";
	$instrument_title = "";
//	$instrument_url = "";
//	$instrument_web = "";
	$instrument_doc = "";
	$instrument_content = "";
	$instrument_disp_name = "";
	$instrument_number = "";
	$instrument_year = "";

	$public_display = "";
	$delete_instrument = "";
	$tcec_tested = "";
	$tcec_authored = "";
	$resource_doc = "";
	$questionbank_doc = "";
	$pre_intervention = "";
	$post_intervention = "";

	$lang_en = "";
	$lang_sp = "";
	$lang_hmong = "";
	$lang_viet = "";
	$lang_other = "";
	$lang_other_spec = "";

	$is_adult = "";
	$is_decmak = "";
	$is_owner = "";
	$is_public = "";
	$is_tenant = "";
	$is_youth = "";
	$is_afam = "";
	$is_asian = "";
	$is_hisp = "";
	$is_lgbt = "";
	$is_ses = "";
	$is_native = "";
	$is_pacific = "";
	$is_rural = "";
	$is_coalition = "";
	$is_patron = "";
	$is_project = "";
	$is_other = "";
	$is_other_spec = "";

	$type_essential = "";
	$type_qbank = "";
	$type_resource = "";
	$type_edsurv = "";
	$type_fg = "";
	$type_kii = "";
	$type_mar = "";
	$type_obs = "";
	$type_pr = "";
	$type_pop = "";
	$type_tps = "";
	$type_hist = "";
	$type_log = "";
	$type_sm = "";
	$type_other = "";
	$type_other_spec = "";

	$topic_coalition = "";
	$topic_cap_coalition = "";
	$topic_cap_advisory = "";
	$topic_cap_participate = "";
	$topic_cap_partnership = "";
	$topic_genpolicy = "";
	$topic_cessation = "";
	$topic_cp_ask = "";
	$topic_cp_program = "";
	$topic_policymaking = "";
	$topic_pm_min = "";
	$topic_pm_obs = "";
	$topic_pm_bios = "";
	$topic_pm_track = "";
	$topic_pm_adoption = "";
	$topic_pm_records = "";
	$topic_pm_forms = "";
	$topic_materials = "";
	$topic_mat_materials = "";
	$topic_mat_instrument = "";
	$topic_media = "";
	$topic_media_mar = "";
	$topic_media_sma = "";
	$topic_media_web = "";
	$topic_misc = "";
	$topic_retail = "";
	$topic_r_ads = "";
	$topic_r_compliance = "";
	$topic_r_defs = "";
	$topic_r_end = "";
	$topic_r_flavors = "";
	$topic_r_healthy = "";
	$topic_r_hshc = "";
	$topic_r_min = "";
	$topic_r_pharm = "";
	$topic_r_prod = "";
	$topic_r_density = "";
	$topic_r_signs = "";
	$topic_r_trl = "";
	$topic_r_train = "";
	$topic_r_youth = "";
	$topic_needsassess = "";
	$topic_log = "";
	$topic_log_apl = "";
	$topic_log_cdm = "";
	$topic_photov = "";
	$topic_socmedia = "";
	$topic_sm_medmon = "";
	$topic_sm_webmon = "";
	$topic_training = "";
	$topic_tr_cess = "";
	$topic_tr_coal = "";
	$topic_tr_gen = "";
	$topic_tr_retail = "";
	$topic_tr_shs = "";
	$topic_other = "";
	$topic_other_spec = "";
	$topic_prioritypops = "";
	$topic_pp_afam = "";
	$topic_pp_asian = "";
	$topic_pp_cbo = "";
	$topic_pp_thought = "";
	$topic_pp_hisp = "";
	$topic_pp_lgbt = "";
	$topic_pp_native = "";
	$topic_pp_rural = "";
	$topic_pp_youth = "";
	$topic_pp_other = "";
	$topic_pp_other_spec = "";
	$topic_shs = "";
	$topic_shs_casinos = "";
	$topic_shs_care = "";
	$topic_shs_college = "";
	$topic_shs_comp = "";
	$topic_shs_entry = "";
	$topic_shs_events = "";
	$topic_shs_health = "";
	$topic_shs_waste = "";
	$topic_shs_muh_owner = "";
	$topic_shs_muh_tenant = "";
	$topic_shs_dining = "";
	$topic_shs_public = "";
	$topic_shs_rec = "";
	$topic_shs_work = "";
	$topic_shs_sponsor = "";
	$topic_shs_use_adult = "";
	$topic_shs_use_pp = "";
	$topic_shs_use_youth = "";
	$topic_shs_transport = "";
	$topic_ppm = "";
	$topic_ppm_needs = "";
	$topic_ppm_org = "";

	$sub_instrument = "";

	if(isset($_POST['sub_instrument'])) $sub_instrument = $_POST['sub_instrument'];

	if ($sub_instrument == "Edit Instrument")
	{
		$instrumentID = $_POST['iid'];
	}

	if(isset($_POST['instrument_id'])) $instrument_id = $_POST['instrument_id'];
	if(isset($_POST['instrument_title'])) $instrument_title = $_POST['instrument_title'];
	if(isset($_POST['instrument_url'])) $instrument_url = $_POST['instrument_url'];
	if(isset($_POST['instrument_web'])) $instrument_web = $_POST['instrument_web'];
	if(isset($_POST['instrument_doc'])) $instrument_doc = $_POST['instrument_doc'];
	if(isset($_POST['instrument_content'])) $instrument_content = $_POST['instrument_content'];
	if(isset($_POST['instrument_disp_name'])) $instrument_disp_name = $_POST['instrument_disp_name'];
	if(isset($_POST['instrument_number'])) $instrument_number = $_POST['instrument_number'];
	if(isset($_POST['instrument_year'])) $instrument_year = $_POST['instrument_year'];

	if(isset($_POST['public_display'])) $public_display = $_POST['public_display'];
	if(isset($_POST['delete_instrument'])) $delete_instrument = $_POST['delete_instrument'];
	if(isset($_POST['tcec_tested'])) $tcec_tested = $_POST['tcec_tested'];
	if(isset($_POST['tcec_authored'])) $tcec_authored = $_POST['tcec_authored'];
	if(isset($_POST['resource_doc'])) $resource_doc = $_POST['resource_doc'];
	if(isset($_POST['questionbank_doc'])) $questionbank_doc = $_POST['questionbank_doc'];
	if(isset($_POST['pre_intervention'])) $pre_intervention = $_POST['pre_intervention'];
	if(isset($_POST['post_intervention'])) $post_intervention = $_POST['post_intervention'];

	if(isset($_POST['lang_en'])) $lang_en = $_POST['lang_en'];
	if(isset($_POST['lang_sp'])) $lang_sp = $_POST['lang_sp'];
	if(isset($_POST['lang_hmong'])) $lang_hmong = $_POST['lang_hmong'];
	if(isset($_POST['lang_viet'])) $lang_viet = $_POST['lang_viet'];
	if(isset($_POST['lang_other'])) $lang_other = $_POST['lang_other'];
	if(isset($_POST['lang_other_spec'])) $lang_other_spec = $_POST['lang_other_spec'];

	if(isset($_POST['is_adult'])) $is_adult = $_POST['is_adult'];
	if(isset($_POST['is_decmak'])) $is_decmak = $_POST['is_decmak'];
	if(isset($_POST['is_owner'])) $is_owner = $_POST['is_owner'];
	if(isset($_POST['is_public'])) $is_public = $_POST['is_public'];
	if(isset($_POST['is_tenant'])) $is_tenant = $_POST['is_tenant'];
	if(isset($_POST['is_youth'])) $is_youth = $_POST['is_youth'];
	if(isset($_POST['is_afam'])) $is_afam = $_POST['is_afam'];
	if(isset($_POST['is_asian'])) $is_asian = $_POST['is_asian'];
	if(isset($_POST['is_hisp'])) $is_hisp = $_POST['is_hisp'];
	if(isset($_POST['is_lgbt'])) $is_lgbt = $_POST['is_lgbt'];
	if(isset($_POST['is_ses'])) $is_ses = $_POST['is_ses'];
	if(isset($_POST['is_native'])) $is_native = $_POST['is_native'];
	if(isset($_POST['is_pacific'])) $is_pacific = $_POST['is_pacific'];
	if(isset($_POST['is_rural'])) $is_rural = $_POST['is_rural'];
	if(isset($_POST['is_coalition'])) $is_coalition = $_POST['is_coalition'];
	if(isset($_POST['is_patron'])) $is_patron = $_POST['is_patron'];
	if(isset($_POST['is_project'])) $is_project = $_POST['is_project'];
	if(isset($_POST['is_other'])) $is_other = $_POST['is_other'];
	if(isset($_POST['is_other_spec'])) $is_other_spec = $_POST['is_other_spec'];

	if(isset($_POST['type_essential'])) $type_essential = $_POST['type_essential'];
	if(isset($_POST['type_qbank'])) $type_qbank = $_POST['type_qbank'];
	if(isset($_POST['type_resource'])) $type_resource = $_POST['type_resource'];
	if(isset($_POST['type_edsurv'])) $type_edsurv = $_POST['type_edsurv'];
	if(isset($_POST['type_fg'])) $type_fg = $_POST['type_fg'];
	if(isset($_POST['type_kii'])) $type_kii = $_POST['type_kii'];
	if(isset($_POST['type_mar'])) $type_mar = $_POST['type_mar'];
	if(isset($_POST['type_obs'])) $type_obs = $_POST['type_obs'];
	if(isset($_POST['type_pr'])) $type_pr = $_POST['type_pr'];
	if(isset($_POST['type_pop'])) $type_pop = $_POST['type_pop'];
	if(isset($_POST['type_tps'])) $type_tps = $_POST['type_tps'];
	if(isset($_POST['type_hist'])) $type_hist = $_POST['type_hist'];
	if(isset($_POST['type_log'])) $type_log = $_POST['type_log'];
	if(isset($_POST['type_log_apl'])) $type_log_apl = $_POST['type_log_apl'];
	if(isset($_POST['type_log_cdm'])) $type_log_cdm = $_POST['type_log_cdm'];
	if(isset($_POST['type_sm'])) $type_sm = $_POST['type_sm'];
	if(isset($_POST['type_other'])) $type_other = $_POST['type_other'];
	if(isset($_POST['type_other_spec'])) $type_other_spec = $_POST['type_other_spec'];

	if(isset($_POST['topic_coalition'])) $topic_coalition = $_POST['topic_coalition'];
	if(isset($_POST['topic_cap_coalition'])) $topic_cap_coalition = $_POST['topic_cap_coalition'];
	if(isset($_POST['topic_cap_advisory'])) $topic_cap_advisory = $_POST['topic_cap_advisory'];
	if(isset($_POST['topic_cap_participate'])) $topic_cap_participate = $_POST['topic_cap_participate'];
	if(isset($_POST['topic_cap_partnership'])) $topic_cap_partnership = $_POST['topic_cap_partnership'];
	if(isset($_POST['topic_genpolicy'])) $topic_genpolicy = $_POST['topic_genpolicy'];
	if(isset($_POST['topic_cessation'])) $topic_cessation = $_POST['topic_cessation'];
	if(isset($_POST['topic_cp_ask'])) $topic_cp_ask = $_POST['topic_cp_ask'];
	if(isset($_POST['topic_cp_program'])) $topic_cp_program = $_POST['topic_cp_program'];

	if(isset($_POST['topic_policymaking'])) $topic_policymaking = $_POST['topic_policymaking'];
	if(isset($_POST['topic_pm_min'])) $topic_pm_min = $_POST['topic_pm_min'];
	if(isset($_POST['topic_pm_obs'])) $topic_pm_obs = $_POST['topic_pm_obs'];
	if(isset($_POST['topic_pm_bios'])) $topic_pm_bios = $_POST['topic_pm_bios'];
	if(isset($_POST['topic_pm_adoption'])) $topic_pm_adoption = $_POST['topic_pm_adoption'];
	if(isset($_POST['topic_pm_records'])) $topic_pm_records = $_POST['topic_pm_records'];
	if(isset($_POST['topic_pm_forms'])) $topic_pm_forms = $_POST['topic_pm_forms'];

	if(isset($_POST['topic_pm_track'])) $topic_pm_track = $_POST['topic_pm_track'];
	if(isset($_POST['topic_materials'])) $topic_materials = $_POST['topic_materials'];
	if(isset($_POST['topic_mat_materials'])) $topic_mat_materials = $_POST['topic_mat_materials'];
	if(isset($_POST['topic_mat_instrument'])) $topic_mat_instrument = $_POST['topic_mat_instrument'];
	if(isset($_POST['topic_media'])) $topic_media = $_POST['topic_media'];
	if(isset($_POST['topic_media_mar'])) $topic_media_mar = $_POST['topic_media_mar'];
	if(isset($_POST['topic_media_sma'])) $topic_media_sma = $_POST['topic_media_sma'];
	if(isset($_POST['topic_media_web'])) $topic_media_web = $_POST['topic_media_web'];
	if(isset($_POST['topic_misc'])) $topic_misc = $_POST['topic_misc'];

	if(isset($_POST['topic_retail'])) $topic_retail = $_POST['topic_retail'];
	if(isset($_POST['topic_r_ads'])) $topic_r_ads = $_POST['topic_r_ads'];
	if(isset($_POST['topic_r_compliance'])) $topic_r_compliance = $_POST['topic_r_compliance'];
	if(isset($_POST['topic_r_defs'])) $topic_r_defs = $_POST['topic_r_defs'];
	if(isset($_POST['topic_r_end'])) $topic_r_end = $_POST['topic_r_end'];
	if(isset($_POST['topic_r_flavors'])) $topic_r_flavors = $_POST['topic_r_flavors'];
	if(isset($_POST['topic_r_healthy'])) $topic_r_healthy = $_POST['topic_r_healthy'];
	if(isset($_POST['topic_r_hshc'])) $topic_r_hshc = $_POST['topic_r_hshc'];
	if(isset($_POST['topic_r_min'])) $topic_r_min = $_POST['topic_r_min'];
	if(isset($_POST['topic_r_pharm'])) $topic_r_pharm = $_POST['topic_r_pharm'];
	if(isset($_POST['topic_r_prod'])) $topic_r_prod = $_POST['topic_r_prod'];
	if(isset($_POST['topic_r_density'])) $topic_r_density = $_POST['topic_r_density'];
	if(isset($_POST['topic_r_signs'])) $topic_r_signs = $_POST['topic_r_signs'];
	if(isset($_POST['topic_r_trl'])) $topic_r_trl = $_POST['topic_r_trl'];
	if(isset($_POST['topic_r_train'])) $topic_r_train = $_POST['topic_r_train'];
	if(isset($_POST['topic_r_youth'])) $topic_r_youth = $_POST['topic_r_youth'];

	if(isset($_POST['topic_needsassess'])) $topic_needsassess = $_POST['topic_needsassess'];
	if(isset($_POST['topic_log'])) $topic_log = $_POST['topic_log'];
	if(isset($_POST['topic_photov'])) $topic_photov = $_POST['topic_photov'];
	if(isset($_POST['topic_socmedia'])) $topic_socmedia = $_POST['topic_socmedia'];
	if(isset($_POST['topic_sm_medmon'])) $topic_sm_medmon = $_POST['topic_sm_medmon'];
	if(isset($_POST['topic_sm_webmon'])) $topic_sm_webmon = $_POST['topic_sm_webmon'];
	if(isset($_POST['topic_training'])) $topic_training = $_POST['topic_training'];
	if(isset($_POST['topic_tr_cess'])) $topic_tr_cess = $_POST['topic_tr_cess'];
	if(isset($_POST['topic_tr_coal'])) $topic_tr_coal = $_POST['topic_tr_coal'];
	if(isset($_POST['topic_tr_gen'])) $topic_tr_gen = $_POST['topic_tr_gen'];
	if(isset($_POST['topic_tr_retail'])) $topic_tr_retail = $_POST['topic_tr_retail'];
	if(isset($_POST['topic_tr_shs'])) $topic_tr_shs = $_POST['topic_tr_shs'];
	if(isset($_POST['topic_other'])) $topic_other = $_POST['topic_other'];
	if(isset($_POST['topic_other_spec'])) $topic_other_spec = $_POST['topic_other_spec'];

	if(isset($_POST['topic_prioritypops'])) $topic_prioritypops = $_POST['topic_prioritypops'];
	if(isset($_POST['topic_pp_afam'])) $topic_pp_afam = $_POST['topic_pp_afam'];
	if(isset($_POST['topic_pp_asian'])) $topic_pp_asian = $_POST['topic_pp_asian'];
	if(isset($_POST['topic_pp_cbo'])) $topic_pp_cbo = $_POST['topic_pp_cbo'];
	if(isset($_POST['topic_pp_thought'])) $topic_pp_thought = $_POST['topic_pp_thought'];
	if(isset($_POST['topic_pp_hisp'])) $topic_pp_hisp = $_POST['topic_pp_hisp'];
	if(isset($_POST['topic_pp_lgbt'])) $topic_pp_lgbt = $_POST['topic_pp_lgbt'];
	if(isset($_POST['topic_pp_native'])) $topic_pp_native = $_POST['topic_pp_native'];
	if(isset($_POST['topic_pp_rural'])) $topic_pp_rural = $_POST['topic_pp_rural'];
	if(isset($_POST['topic_pp_youth'])) $topic_pp_youth = $_POST['topic_pp_youth'];
	if(isset($_POST['topic_pp_other'])) $topic_pp_other = $_POST['topic_pp_other'];
	if(isset($_POST['topic_pp_other_spec'])) $topic_pp_other_spec = $_POST['topic_pp_other_spec'];

	if(isset($_POST['topic_shs'])) $topic_shs = $_POST['topic_shs'];
	if(isset($_POST['topic_shs_casinos'])) $topic_shs_casinos = $_POST['topic_shs_casinos'];
	if(isset($_POST['topic_shs_care'])) $topic_shs_care = $_POST['topic_shs_care'];
	if(isset($_POST['topic_shs_college'])) $topic_shs_college = $_POST['topic_shs_college'];
	if(isset($_POST['topic_shs_comp'])) $topic_shs_comp = $_POST['topic_shs_comp'];
	if(isset($_POST['topic_shs_entry'])) $topic_shs_entry = $_POST['topic_shs_entry'];
	if(isset($_POST['topic_shs_events'])) $topic_shs_events = $_POST['topic_shs_events'];
	if(isset($_POST['topic_shs_health'])) $topic_shs_health = $_POST['topic_shs_health'];
	if(isset($_POST['topic_shs_waste'])) $topic_shs_waste = $_POST['topic_shs_waste'];
	if(isset($_POST['topic_shs_muh_owner'])) $topic_shs_muh_owner = $_POST['topic_shs_muh_owner'];
	if(isset($_POST['topic_shs_muh_tenant'])) $topic_shs_muh_tenant = $_POST['topic_shs_muh_tenant'];
	if(isset($_POST['topic_shs_dining'])) $topic_shs_dining = $_POST['topic_shs_dining'];
	if(isset($_POST['topic_shs_public'])) $topic_shs_public = $_POST['topic_shs_public'];
	if(isset($_POST['topic_shs_rec'])) $topic_shs_rec = $_POST['topic_shs_rec'];
	if(isset($_POST['topic_shs_work'])) $topic_shs_work = $_POST['topic_shs_work'];
	if(isset($_POST['topic_shs_sponsor'])) $topic_shs_sponsor = $_POST['topic_shs_sponsor'];
	if(isset($_POST['topic_shs_use_adult'])) $topic_shs_use_adult = $_POST['topic_shs_use_adult'];
	if(isset($_POST['topic_shs_use_pp'])) $topic_shs_use_pp = $_POST['topic_shs_use_pp'];
	if(isset($_POST['topic_shs_use_youth'])) $topic_shs_use_youth = $_POST['topic_shs_use_youth'];
	if(isset($_POST['topic_shs_transport'])) $topic_shs_transport = $_POST['topic_shs_transport'];

	if(isset($_POST['topic_ppm'])) $topic_ppm = $_POST['topic_ppm'];
	if(isset($_POST['topic_ppm_needs'])) $topic_ppm_needs = $_POST['topic_ppm_needs'];
	if(isset($_POST['topic_ppm_org'])) $topic_ppm_org = $_POST['topic_ppm_org'];

	$upload_instrument_dir = "/var/www/non_www/uploads/tcec_instruments/";


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


		if ($dbok = ($link = new mysqli($host_name, $user_name, $password, "cns")))
		{

			// upload files validation

			//get the highest key number attach to the beginning of the file name to avoid duplicate names
//			$q_maxid = "SELECT MAX(instrument_id) FROM instrument_database";
//			$r_maxid = mysqli_query($link, $q_maxid);
//			$row_maxid = mysqli_fetch_row($r_maxid);

//			$upload_id = $row_maxid[0] + 1;


			//construct time stamp string to append to the end of the file name to avoid duplicate names
			$upload_year = date("Y");
			$upload_month = date("m");
			$upload_day = date("d");
			$upload_epoch = date("U");
			$upload_stamp = $upload_year.$upload_month.$upload_day."_".$upload_epoch."_";

			// move files from temporary location to server subdirectory
			$upload_instrument_file = basename($_FILES["instrument_doc"]["name"]);

			// end upload files validation


			if ($sub_instrument == "Do Not Submit Information")
			{
				print "<h2>The Instrument information has not been submitted.<br>
				<a href= \"instrument_listing.php\">Return to Instruments Listing.</a></h2>";

			} // end Do Not Submit Information

			if (($sub_instrument == "Add Instrument") || ($sub_instrument == "Update Instrument") || ($sub_instrument == "Delete Instrument"))
			{

				$valid_form = true;

				if (!$instrument_title)
				{
					print "<strong><font color= \"red\">Please enter a title for the instrument.</font></strong><br>";
					$valid_form = false;
				}


//				if ($email)			// verify e-mail address syntax is correct
//				{
//					if (!(preg_match("/@.+\\./", $email)))
//					{
//						print "<b><font color= \"red\">The syntax of your e-mail address is incorrect.  Please re-enter.</b><br></font>";
//						$valid_form = false;
//					}
//				}


// if all of the required fields are entered clean the text fields and submit to the database

				if ($valid_form == true)
				{

					// verfify valid form upload if a file is uploaded
					if ($upload_instrument_file)
					{

						// document path hash
						$instrument_link = $upload_instrument_dir.$upload_instrument_file;
						$instrument_name = $upload_instrument_file;
						$instrument_hash = MD5($upload_instrument_file);

//						$instrument_link = $upload_stamp.$upload_instrument_dir.$upload_instrument_file;
//						$instrument_name = $upload_stamp.$upload_instrument_file;
//						$instrument_hash = MD5($upload_stamp.$upload_instrument_file);



						// verify file is in PDF, Word, or Excel format
						if (($_FILES["instrument_doc"]["type"] != "application/pdf") && ($_FILES["instrument_doc"]["type"] != "application/msword") &&
						($_FILES["instrument_doc"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ) &&
						($_FILES["instrument_doc"]["type"] != "application/vnd.ms-excel" ) && ($_FILES["instrument_doc"]["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ))
						{
							print "<font color=\"#FF0000\">Invalid file type.  You must upload a Excel, PDF or Word file.</font><br>";
							$valid_form = false;
						}

						elseif (!move_uploaded_file($_FILES["instrument_doc"]["tmp_name"], $instrument_link))	// verify file is attached
						{
							print "<font color= \"red\">Your document file has not been uploaded.<br></font>";
			//				print_r($_FILES);
							print "<p>$upload_instrument_file<p>";
							$valid_form = false;
						}
					} // end if $upload_doc_file


					$instrument_title = filter_var($instrument_title, FILTER_SANITIZE_STRING);
//					$instrument_url = filter_var($instrument_url, FILTER_SANITIZE_URL);
					$instrument_web = filter_var($instrument_web, FILTER_SANITIZE_STRING);
					$instrument_content = filter_var($instrument_content, FILTER_SANITIZE_STRING);

					$sub_date = date("c"); //Get the timestamp of when the survey is entered
					$sub_ip = $_SERVER['REMOTE_ADDR'];  //Get the IP address of the computer submitting the registration
					$public_display = "1";
					$lang_en = "1";
					$instrument_number = SUBSTR($instrument_title,0,4);

					if ($sub_instrument == "Delete Instrument")
					{

						$delete_instrument = "1";

						$q_insert = "UPDATE instrument_database SET delete_instrument = \"$delete_instrument\" WHERE instrument_id = \"$instrument_id\" ";

					} // end /if sub_recruit == delete instrument


					if (($sub_instrument == "Add Instrument") && ($valid_form == true))
					{

					$q_insert = "INSERT INTO instrument_database
					(instrument_title, instrument_url, instrument_web, instrument_number, instrument_year,
					type_edsurv, type_fg, type_kii, type_mar, type_obs, type_pr, type_pop, type_tps, type_hist, type_log, type_sm, type_other,
					sub_date, instrument_link, instrument_name, instrument_hash, public_display, instrument_content,
					tcec_tested, tcec_authored,type_other_spec, lang_en, lang_sp, lang_hmong, lang_viet, lang_other, lang_other_spec,
					resource_doc, questionbank_doc, pre_intervention, post_intervention, is_adult, is_decmak, is_owner, is_public, is_tenant, is_youth,
					is_afam, is_asian, is_hisp, is_lgbt, is_ses, is_native, is_pacific, is_rural, is_coalition, is_patron, is_project, is_other, is_other_spec,
					topic_coalition, topic_cap_coalition, topic_cap_advisory, topic_cap_partnership, topic_cap_participate,
					topic_genpolicy, topic_cessation, topic_cp_ask, topic_cp_program, topic_policymaking, topic_pm_min, topic_pm_obs, topic_pm_bios, topic_pm_track,
					topic_pm_adoption, topic_pm_records, topic_pm_forms, topic_materials,
					topic_mat_materials, topic_mat_instrument, topic_media, topic_media_mar, topic_media_sma, topic_media_web,
					topic_misc, topic_retail, topic_r_ads, topic_r_compliance, topic_r_defs, topic_r_end, topic_r_flavors, topic_r_healthy, topic_r_hshc, topic_r_min, topic_r_pharm, topic_r_prod,
					topic_r_density, topic_r_signs, topic_r_trl, topic_r_train, topic_r_youth, topic_needsassess, topic_log, topic_log_apl, topic_log_cdm,
					topic_photov, topic_socmedia, topic_sm_medmon, topic_sm_webmon, topic_training, topic_tr_cess, topic_tr_coal, topic_tr_gen, topic_tr_retail, topic_tr_shs, topic_other,
					topic_other_spec, topic_prioritypops, topic_pp_afam, topic_pp_asian, topic_pp_cbo, topic_pp_thought,
					topic_pp_hisp, topic_pp_lgbt, topic_pp_native, topic_pp_rural, topic_pp_youth,
					topic_pp_other, topic_pp_other_spec, topic_shs, topic_shs_casinos, topic_shs_care, topic_shs_college, topic_shs_comp, topic_shs_entry, topic_shs_events,
					topic_shs_health, topic_shs_waste, topic_shs_muh_owner, topic_shs_muh_tenant, topic_shs_dining, topic_shs_public, topic_shs_rec, topic_shs_work, topic_shs_sponsor,
					topic_shs_use_adult, topic_shs_use_pp, topic_shs_use_youth, topic_shs_transport, instrument_disp_name, sub_ip, delete_instrument, type_essential, type_qbank, topic_ppm,
					topic_ppm_needs, topic_ppm_org, type_resource)
					VALUES
					(\"$instrument_title\", \"$instrument_url\", \"$instrument_web\", \"$instrument_number\", \"$instrument_year\", \"$type_edsurv\", \"$type_fg\", \"$type_kii\", \"$type_mar\",
					\"$type_obs\", \"$type_pr\", \"$type_pop\", \"$type_tps\", \"$type_hist\", \"$type_log\", \"$type_sm\", \"$type_other\", \"$sub_date\", \"$instrument_link\",
					\"$instrument_name\", \"$instrument_hash\", \"$public_display\", \"$instrument_content\", \"$tcec_tested\", \"$tcec_authored\",
					\"$type_other_spec\", \"$lang_en\", \"$lang_sp\", \"$lang_hmong\", \"$lang_viet\", \"$lang_other\", \"$lang_other_spec\", \"$resource_doc\",
					\"$questionbank_doc\", \"$pre_intervention\", \"$post_intervention\", \"$is_adult\", \"$is_decmak\", \"$is_owner\", \"$is_public\", \"$is_tenant\", \"$is_youth\",
					\"$is_afam\", \"$is_asian\", \"$is_hisp\", \"$is_lgbt\", \"$is_ses\", \"$is_native\", \"$is_pacific\", \"$is_rural\",  \"$is_coalition\", \"$is_patron\", \"$is_project\",
					\"$is_other\", \"$is_other_spec\", \"$topic_coalition\", \"$topic_cap_coalition\", \"$topic_cap_advisory\", \"$topic_cap_partnership\", \"$topic_cap_participate\",
					\"$topic_genpolicy\", \"$topic_cessation\", \"$topic_cp_ask\", \"$topic_cp_program\", \"$topic_policymaking\", \"$topic_pm_min\", \"$topic_pm_obs\",
					\"$topic_pm_bios\", \"$topic_pm_track\", \"$topic_pm_adoption\", \"$topic_pm_records\", \"$topic_pm_forms\",
					\"$topic_materials\", \"$topic_mat_materials\", \"$topic_mat_instrument\", \"$topic_media\", \"$topic_media_mar\",
					\"$topic_media_sma\", \"$topic_media_web\", \"$topic_misc\", \"$topic_retail\", \"$topic_r_ads\", \"$topic_r_compliance\",
					\"$topic_r_defs\", \"$topic_r_end\", \"$topic_r_flavors\", \"$topic_r_healthy\", \"$topic_r_hshc\", \"$topic_r_min\", \"$topic_r_pharm\", \"$topic_r_prod\", \"$topic_r_density\",
					\"$topic_r_signs\", \"$topic_r_trl\", \"$topic_r_train\", \"$topic_r_youth\", \"$topic_needsassess\", \"$topic_log\",  \"$topic_log_apl\", \"$topic_log_cdm\",
					\"$topic_photov\", \"$topic_socmedia\", \"$topic_sm_medmon\", \"$topic_sm_webmon\",
					\"$topic_training\",  \"$topic_tr_cess\", \"$topic_tr_coal\", \"$topic_tr_gen\", \"$topic_tr_retail\", \"$topic_tr_shs\",
					\"$topic_other\", \"$topic_other_spec\", \"$topic_prioritypops\", \"$topic_pp_afam\", \"$topic_pp_asian\", \"$topic_pp_cbo\", \"$topic_pp_thought\",
					\"$topic_pp_hisp\", \"$topic_pp_lgbt\", \"$topic_pp_native\", \"$topic_pp_rural\", \"$topic_pp_youth\", \"$topic_pp_other\", \"$topic_pp_other_spec\",
					\"$topic_shs\", \"$topic_shs_casinos\", \"$topic_shs_care\", \"$topic_shs_college\", \"$topic_shs_comp\", \"$topic_shs_entry\", \"$topic_shs_events\",
					\"$topic_shs_health\", \"$topic_shs_waste\", \"$topic_shs_muh_owner\", \"$topic_shs_muh_tenant\", \"$topic_shs_dining\", \"$topic_shs_public\", \"$topic_shs_rec\",
					\"$topic_shs_work\", \"$topic_shs_sponsor\", \"$topic_shs_use_adult\", \"$topic_shs_use_pp\", \"$topic_shs_use_youth\", \"$topic_shs_transport\", \"$instrument_disp_name\",
					\"$sub_ip\", \"$delete_instrument\", \"$type_essential\", \"$type_qbank\", \"$topic_ppm\", \"$topic_ppm_needs\", \"$topic_ppm_org\", \"$type_resource\")";
					} // end if sub_recruit == submit information

					if (($sub_instrument == "Update Instrument") && ($valid_form == true))
					{

					$q_insert = "UPDATE instrument_database SET

					instrument_title = \"$instrument_title\", instrument_url = \"$instrument_url\", instrument_web = \"$instrument_web\", instrument_number = \"$instrument_number\",
					instrument_year = \"$instrument_year\",
					type_edsurv = \"$type_edsurv\", type_fg = \"$type_fg\", type_kii = \"$type_kii\", type_mar = \"$type_mar\", type_obs = \"$type_obs\", type_pr = \"$type_pr\",
					type_pop = \"$type_pop\", type_tps = \"$type_tps\", type_hist = \"$type_hist\", type_log = \"$type_log\", type_sm = \"$type_sm\", type_other = \"$type_other\",
					resource_doc = \"$resource_doc\", questionbank_doc = \"$questionbank_doc\", pre_intervention = \"$pre_intervention\", post_intervention = \"$post_intervention\",
					is_adult = \"$is_adult\", is_decmak = \"$is_decmak\", is_owner = \"$is_owner\", is_public = \"$is_public\", is_tenant = \"$is_tenant\", is_youth = \"$is_youth\",
					is_afam = \"$is_afam\", is_asian = \"$is_asian\", is_hisp = \"$is_hisp\", is_lgbt = \"$is_lgbt\", is_ses = \"$is_ses\", is_native = \"$is_native\", is_pacific = \"$is_pacific\", is_rural = \"$is_rural\",
					is_coalition = \"$is_coalition\", is_patron = \"$is_patron\" , is_project = \"$is_project\" , is_other = \"$is_other\", is_other_spec = \"$is_other_spec\", topic_coalition = \"$topic_coalition\",
					topic_cap_coalition = \"$topic_cap_coalition\", topic_cap_advisory = \"$topic_cap_advisory\", topic_cap_partnership = \"$topic_cap_partnership\", topic_cap_participate = \"$topic_cap_participate\",
					topic_genpolicy = \"$topic_genpolicy\", topic_cessation = \"$topic_cessation\", topic_cp_ask = \"$topic_cp_ask\", topic_cp_program = \"$topic_cp_program\",
					topic_policymaking = \"$topic_policymaking\",
					topic_pm_min = \"$topic_pm_min\", topic_pm_obs = \"$topic_pm_obs\",
					topic_pm_bios = \"$topic_pm_bios\", topic_pm_track = \"$topic_pm_track\", topic_pm_adoption = \"$topic_pm_adoption\", topic_pm_records = \"$topic_pm_records\", topic_pm_forms = \"$topic_pm_forms\",
					topic_materials = \"$topic_materials\", topic_mat_materials = \"$topic_mat_materials\",
					topic_mat_instrument = \"$topic_mat_instrument\", topic_media = \"$topic_media\", topic_media_mar = \"$topic_media_mar\", topic_media_sma = \"$topic_media_sma\",
					topic_media_web = \"$topic_media_web\", topic_misc = \"$topic_misc\",
					topic_retail = \"$topic_retail\", topic_r_ads = \"$topic_r_ads\", topic_r_compliance = \"$topic_r_compliance\", topic_r_defs = \"$topic_r_defs\", topic_r_end = \"$topic_r_end\",
					topic_r_flavors = \"$topic_r_flavors\", topic_r_healthy = \"$topic_r_healthy\", topic_r_hshc = \"$topic_r_hshc\", topic_r_min = \"$topic_r_min\",
					topic_r_pharm = \"$topic_r_pharm\", topic_r_prod = \"$topic_r_prod\", topic_r_density = \"$topic_r_density\",
					topic_r_signs = \"$topic_r_signs\", topic_r_trl = \"$topic_r_trl\", topic_r_train = \"$topic_r_train\", topic_r_youth = \"$topic_r_youth\",
					topic_needsassess = \"$topic_needsassess\", topic_log = \"$topic_log\", topic_log_apl = \"$topic_log_apl\", topic_log_cdm = \"$topic_log_cdm\",
					topic_photov = \"$topic_photov\", topic_socmedia = \"$topic_socmedia\", topic_sm_medmon = \"$topic_sm_medmon\", topic_sm_webmon = \"$topic_sm_webmon\",
					topic_training = \"$topic_training\",  topic_tr_cess = \"$topic_tr_cess\", topic_tr_coal = \"$topic_tr_coal\", topic_tr_gen = \"$topic_tr_gen\",
					topic_tr_retail = \"$topic_tr_retail\", topic_tr_shs = \"$topic_tr_shs\",
					topic_other = \"$topic_other\", topic_other_spec = \"$topic_other_spec\", topic_prioritypops = \"$topic_prioritypops\",
					topic_pp_afam = \"$topic_pp_afam\", topic_pp_asian = \"$topic_pp_asian\", topic_pp_cbo = \"$topic_pp_cbo\", topic_pp_thought = \"$topic_pp_thought\",
					topic_pp_hisp = \"$topic_pp_hisp\",
					topic_pp_lgbt = \"$topic_pp_lgbt\", topic_pp_native = \"$topic_pp_native\", topic_pp_rural = \"$topic_pp_rural\", topic_pp_youth = \"$topic_pp_youth\",
					topic_pp_other = \"$topic_pp_other\", topic_pp_other_spec = \"$topic_pp_other_spec\", topic_shs = \"$topic_shs\", topic_shs_casinos = \"$topic_shs_casinos\",
					topic_shs_care = \"$topic_shs_care\", topic_shs_college = \"$topic_shs_college\", topic_shs_comp = \"$topic_shs_comp\", topic_shs_entry = \"$topic_shs_entry\",
					topic_shs_events = \"$topic_shs_events\", topic_shs_health = \"$topic_shs_health\", topic_shs_waste = \"$topic_shs_waste\", topic_shs_muh_owner = \"$topic_shs_muh_owner\",
					topic_shs_muh_tenant = \"$topic_shs_muh_tenant\", topic_shs_dining = \"$topic_shs_dining\", topic_shs_public = \"$topic_shs_public\", topic_shs_rec = \"$topic_shs_rec\",
					topic_shs_work = \"$topic_shs_work\", topic_shs_sponsor = \"$topic_shs_sponsor\", topic_shs_use_adult = \"$topic_shs_use_adult\", topic_shs_use_pp = \"$topic_shs_use_pp\",
					topic_shs_use_youth = \"$topic_shs_use_youth\", topic_shs_transport = \"$topic_shs_transport\", mod_date = \"$sub_date\", public_display = \"$public_display\",
					instrument_content = \"$instrument_content\", tcec_tested = \"$tcec_tested\", tcec_authored = \"$tcec_authored\",
					type_other_spec = \"$type_other_spec\", lang_en = \"$lang_en\", lang_sp = \"$lang_sp\",
					lang_hmong = \"$lang_hmong\", lang_viet = \"$lang_viet\", lang_other = \"$lang_other\", lang_other_spec = \"$lang_other_spec\",
					instrument_disp_name = \"$instrument_disp_name\", delete_instrument = \"$delete_instrument\", type_essential = \"$type_essential\", type_qbank = \"$type_qbank\",
					topic_ppm = \"$topic_ppm\", topic_ppm_needs = \"$topic_ppm_needs\", topic_ppm_org = \"$topic_ppm_org\", type_resource = \"$type_resource\" ";

					// upload file fields only if a file is being uploaded
					if ($upload_instrument_file) $q_insert .= ", instrument_link = \"$instrument_link\", instrument_hash = \"$instrument_hash\", instrument_name = \"$instrument_name\" ";

					$q_insert .= "WHERE instrument_id = \"$instrument_id\" ";

					} // end /if sub_recruit == update information

					$r_insert = mysqli_query($link, $q_insert);

					if (mysqli_affected_rows($link) >= 1)
					{

						print "<blockquote>";
						print "<h2>Your Instrument has been updated.<br>
						<a href= \"tcec_instrument_listing.php\">Return to Instruments List</a><br><br>";
						print "</blockquote>";
						//						<a href= \"tcec_instrument_hidden_listing.php\">Return to Deleted Instruments List</a></h2>
					}
					else
					{
						print "An error has occurred during submission.<br> $q_insert<p>"; //$q_insert
					}
				} // end if valid_form = true




			} // end Submit Information

			if ((!$sub_instrument) || ($sub_instrument == "Edit Instrument") || ((($sub_instrument == "Add Instrument") || ($sub_instrument == "Update Instrument")) && ($valid_form == false)))
			{
				$submit = "Add Instrument";

				if (($sub_instrument == "Edit Instrument") || ($sub_instrument == "Update Instrument"))
				{
					$submit = "Update Instrument";

					if ($sub_instrument == "Update Instrument")
					{
						$instrumentID = $instrument_id;
					}
					if ($sub_instrument == "Edit Instrument")
					{
						$q_instrument = "SELECT * from instrument_database WHERE instrument_id = $instrumentID";
						$r_instrument = mysqli_query($link, $q_instrument);
						$row_instrument = mysqli_fetch_array($r_instrument, MYSQLI_ASSOC);

						$instrument_title = $row_instrument['instrument_title'];
						$instrument_url = $row_instrument['instrument_url'];
						$instrument_web = $row_instrument['instrument_web'];
						$instrument_content = $row_instrument['instrument_content'];
						$instrument_disp_name = $row_instrument['instrument_disp_name'];
						$instrument_number = $row_instrument['instrument_number'];
						$instrument_year = $row_instrument['instrument_year'];

						$public_display = $row_instrument['public_display'];
						$delete_instrument = $row_instrument['delete_instrument'];
						$tcec_tested = $row_instrument['tcec_tested'];
						$tcec_authored = $row_instrument['tcec_authored'];
						$resource_doc = $row_instrument['resource_doc'];
						$questionbank_doc = $row_instrument['questionbank_doc'];
						$pre_intervention = $row_instrument['pre_intervention'];
						$post_intervention = $row_instrument['post_intervention'];

						$lang_en = $row_instrument['lang_en'];
						$lang_sp = $row_instrument['lang_sp'];
						$lang_hmong = $row_instrument['lang_hmong'];
						$lang_viet = $row_instrument['lang_viet'];
						$lang_other = $row_instrument['lang_other'];
						$lang_other_spec = $row_instrument['lang_other_spec'];

						$is_adult = $row_instrument['is_adult'];
						$is_decmak = $row_instrument['is_decmak'];
						$is_owner = $row_instrument['is_owner'];
						$is_public = $row_instrument['is_public'];
						$is_tenant = $row_instrument['is_tenant'];
						$is_youth = $row_instrument['is_youth'];
						$is_afam = $row_instrument['is_afam'];
						$is_asian = $row_instrument['is_asian'];
						$is_hisp = $row_instrument['is_hisp'];
						$is_lgbt = $row_instrument['is_lgbt'];
						$is_ses = $row_instrument['is_ses'];
						$is_native = $row_instrument['is_native'];
						$is_pacific = $row_instrument['is_pacific'];
						$is_rural = $row_instrument['is_rural'];
						$is_coalition = $row_instrument['is_coalition'];
						$is_patron = $row_instrument['is_patron'];
						$is_project = $row_instrument['is_project'];
						$is_other = $row_instrument['is_other'];
						$is_other_spec = $row_instrument['is_other_spec'];

						$type_essential = $row_instrument['type_essential'];
						$type_qbank = $row_instrument['type_qbank'];
						$type_resource = $row_instrument['type_resource'];
						$type_edsurv = $row_instrument['type_edsurv'];
						$type_fg = $row_instrument['type_fg'];
						$type_kii = $row_instrument['type_kii'];
						$type_mar = $row_instrument['type_mar'];
						$type_obs = $row_instrument['type_obs'];
						$type_pr = $row_instrument['type_pr'];
						$type_pop = $row_instrument['type_pop'];
						$type_tps = $row_instrument['type_tps'];
						$type_hist = $row_instrument['type_hist'];
						$type_log = $row_instrument['type_log'];
						$type_log_apl = $row_instrument['type_log_apl'];
						$type_log_cdm = $row_instrument['type_log_cdm'];
						$type_sm = $row_instrument['type_sm'];
						$type_other = $row_instrument['type_other'];
						$type_other_spec = $row_instrument['type_other_spec'];

						$topic_coalition = $row_instrument['topic_coalition'];
						$topic_cap_coalition = $row_instrument['topic_cap_coalition'];
						$topic_cap_advisory = $row_instrument['topic_cap_advisory'];
						$topic_cap_participate = $row_instrument['topic_cap_participate'];
						$topic_cap_partnership = $row_instrument['topic_cap_partnership'];
						$topic_genpolicy = $row_instrument['topic_genpolicy'];
						$topic_cessation = $row_instrument['topic_cessation'];
						$topic_cp_ask = $row_instrument['topic_cp_ask'];
						$topic_cp_program = $row_instrument['topic_cp_program'];

						$topic_policymaking = $row_instrument['topic_policymaking'];
						$topic_pm_min = $row_instrument['topic_pm_min'];
						$topic_pm_obs = $row_instrument['topic_pm_obs'];
						$topic_pm_bios = $row_instrument['topic_pm_bios'];
						$topic_pm_adoption = $row_instrument['topic_pm_adoption'];
						$topic_pm_records = $row_instrument['topic_pm_records'];
						$topic_pm_forms = $row_instrument['topic_pm_forms'];

						$topic_pm_track = $row_instrument['topic_pm_track'];
						$topic_materials = $row_instrument['topic_materials'];
						$topic_mat_materials = $row_instrument['topic_mat_materials'];
						$topic_mat_instrument = $row_instrument['topic_mat_instrument'];
						$topic_media = $row_instrument['topic_media'];
						$topic_media_mar = $row_instrument['topic_media_mar'];
						$topic_media_sma = $row_instrument['topic_media_sma'];
						$topic_media_web = $row_instrument['topic_media_web'];
						$topic_misc = $row_instrument['topic_misc'];

						$topic_retail = $row_instrument['topic_retail'];
						$topic_r_ads = $row_instrument['topic_r_ads'];
						$topic_r_compliance = $row_instrument['topic_r_compliance'];
						$topic_r_defs = $row_instrument['topic_r_defs'];
						$topic_r_end = $row_instrument['topic_r_end'];
						$topic_r_flavors = $row_instrument['topic_r_flavors'];
						$topic_r_healthy = $row_instrument['topic_r_healthy'];
						$topic_r_hshc = $row_instrument['topic_r_hshc'];
						$topic_r_min = $row_instrument['topic_r_min'];
						$topic_r_pharm = $row_instrument['topic_r_pharm'];
						$topic_r_prod = $row_instrument['topic_r_prod'];
						$topic_r_density = $row_instrument['topic_r_density'];
						$topic_r_signs = $row_instrument['topic_r_signs'];
						$topic_r_trl = $row_instrument['topic_r_trl'];
						$topic_r_train = $row_instrument['topic_r_train'];
						$topic_r_youth = $row_instrument['topic_r_youth'];

						$topic_needsassess = $row_instrument['topic_needsassess'];
						$topic_log = $row_instrument['topic_log'];
						$topic_log_apl = $row_instrument['topic_log_apl'];
						$topic_log_cdm = $row_instrument['topic_log_cdm'];
						$topic_photov = $row_instrument['topic_photov'];
						$topic_socmedia = $row_instrument['topic_socmedia'];
						$topic_sm_medmon = $row_instrument['topic_sm_medmon'];
						$topic_sm_webmon = $row_instrument['topic_sm_webmon'];
						$topic_training = $row_instrument['topic_training'];
						$topic_tr_cess = $row_instrument['topic_tr_cess'];
						$topic_tr_coal = $row_instrument['topic_tr_coal'];
						$topic_tr_gen = $row_instrument['topic_tr_gen'];
						$topic_tr_retail = $row_instrument['topic_tr_retail'];
						$topic_tr_shs = $row_instrument['topic_tr_shs'];
						$topic_other = $row_instrument['topic_other'];
						$topic_other_spec = $row_instrument['topic_other_spec'];

						$topic_prioritypops = $row_instrument['topic_prioritypops'];
						$topic_pp_afam = $row_instrument['topic_pp_afam'];
						$topic_pp_asian = $row_instrument['topic_pp_asian'];
						$topic_pp_cbo = $row_instrument['topic_pp_cbo'];
						$topic_pp_thought = $row_instrument['topic_pp_thought'];
						$topic_pp_hisp = $row_instrument['topic_pp_hisp'];
						$topic_pp_lgbt = $row_instrument['topic_pp_lgbt'];
						$topic_pp_native = $row_instrument['topic_pp_native'];
						$topic_pp_rural = $row_instrument['topic_pp_rural'];
						$topic_pp_youth = $row_instrument['topic_pp_youth'];
						$topic_pp_other = $row_instrument['topic_pp_other'];
						$topic_pp_other_spec = $row_instrument['topic_pp_other_spec'];

						$topic_shs = $row_instrument['topic_shs'];
						$topic_shs_casinos = $row_instrument['topic_shs_casinos'];
						$topic_shs_care = $row_instrument['topic_shs_care'];
						$topic_shs_college = $row_instrument['topic_shs_college'];
						$topic_shs_comp = $row_instrument['topic_shs_comp'];
						$topic_shs_entry = $row_instrument['topic_shs_entry'];
						$topic_shs_events = $row_instrument['topic_shs_events'];
						$topic_shs_health = $row_instrument['topic_shs_health'];
						$topic_shs_waste = $row_instrument['topic_shs_waste'];
						$topic_shs_muh_owner = $row_instrument['topic_shs_muh_owner'];
						$topic_shs_muh_tenant = $row_instrument['topic_shs_muh_tenant'];
						$topic_shs_dining = $row_instrument['topic_shs_dining'];
						$topic_shs_public = $row_instrument['topic_shs_public'];
						$topic_shs_rec = $row_instrument['topic_shs_rec'];
						$topic_shs_work = $row_instrument['topic_shs_work'];
						$topic_shs_sponsor = $row_instrument['topic_shs_sponsor'];
						$topic_shs_use_adult = $row_instrument['topic_shs_use_adult'];
						$topic_shs_use_pp = $row_instrument['topic_shs_use_pp'];
						$topic_shs_use_youth = $row_instrument['topic_shs_use_youth'];
						$topic_shs_transport = $row_instrument['topic_shs_transport'];

						$topic_ppm = $row_instrument['topic_ppm'];
						$topic_ppm_needs = $row_instrument['topic_ppm_needs'];
						$topic_ppm_org = $row_instrument['topic_ppm_org'];

					} // end if edit
				} // end if edit or update

				print "<form enctype= \"multipart/form-data\" method= \"post\" action= \"tcec_instrument_detail.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\">";

				print "<tr><td colspan=\"2\"><table border=\"0\">";

//					print "<tr>";
//						print "<td colspan=\"1\"><input type= \"checkbox\" name= \"delete_instrument\" value= \"1\" ";
//						if ($delete_instrument == 1) print "checked";
//						print ">&nbsp;&nbsp;<strong><font color=\"#FF0000\">Delete Instrument</font></strong></td>";
//					print "</tr>";

//					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan= \"1\"><strong>Instrument Name</strong></td>"; //instrument title
						print "<td colspan= \"1\"><input type=\"text\" name=\"instrument_title\" value=\"$instrument_title\" size=\"75\"></td>";
					print "</tr>";

					print "<tr>";
						print "<td colspan= \"1\"><strong>Instrument Description</strong></td>"; //instrument title
						print "<td colspan= \"1\"><input type=\"text\" name=\"instrument_disp_name\" value=\"$instrument_disp_name\" size=\"75\"></td>";
					print "</tr>";

					print "<tr>";
						print "<td><strong>Instrument Year</strong></td>";
						print "<td><input type=\"text\" name=\"instrument_year\" value=\"$instrument_year\" size=\"4\" maxlength=\"4\"></td>";
					print "</tr>";

//					print "<tr>";
//						print "<td><strong>Instrument Number</strong></td>";
//						print "<td><input type=\"text\" name=\"instrument_number\" value=\"$instrument_number\" size=\"4\" maxlength=\"4\"></td>";
//					print "</tr>";
				print "</table></td></tr>";

//					print "<tr><td>&nbsp;</td></tr>";

//					print "<tr>";
//						print "<td colspan= \"1\"><strong>Instrument URL</strong></td>";
//						print "<td colspan= \"1\"><input type=\"text\" name=\"instrument_url\" value=\"$instrument_url\" size=\"50\"></td>";
//					print "</tr>";

//					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
						print "<td colspan=\"2\"><strong>Upload Instrument File</strong></td>";
					print "</tr>";

					print "<tr>";
			   			print "<td colspan=\"2\"><input type= \"hidden\" name= \"MAX_FILE_SIZE\" value= \"15000000\">";
						print "<input type= \"file\" name= \"instrument_doc\" value= \"\" size= \"75\"></td>";
			        print "</tr>";

					print "<tr><td>&nbsp;</td></tr>";

					//print "<tr><td>&nbsp;</td></tr>";

			//2 columns - Instrument Type and Information Source
				// beginning column 1 - Instrument Type
					print "<tr><td valign=\"top\"><table border = \"0\">";

					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Instrument Type(s)</strong></td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_essential\" value= \"1\" ";
						if ($type_essential == 1) print "checked";
						print ">&nbsp;&nbsp;<i>Instrument ESSENTIALS</i></td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_qbank\" value= \"1\" ";
						if ($type_qbank == 1) print "checked";
						print ">&nbsp;&nbsp;<i>Question Bank</i></td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_resource\" value= \"1\" ";
						if ($type_resource == 1) print "checked";
						print ">&nbsp;&nbsp;<i>Resource</i></td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_edsurv\" value= \"1\" ";
						if ($type_edsurv == 1) print "checked";
						print ">&nbsp;&nbsp;Education/Participant Survey</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_fg\" value= \"1\" ";
						if ($type_fg == 1) print "checked";
						print ">&nbsp;&nbsp;Focus Group</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_kii\" value= \"1\" ";
						if ($type_kii == 1) print "checked";
						print ">&nbsp;&nbsp;Key Informant Interview</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_mar\" value= \"1\" ";
						if ($type_mar == 1) print "checked";
						print ">&nbsp;&nbsp;Media Activity Record</td>";
					print "</tr>";


					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_obs\" value= \"1\" ";
						if ($type_obs == 1) print "checked";
						print ">&nbsp;&nbsp;Observation</td>";
					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_hist\" value= \"1\" ";
//						if ($type_hist == 1) print "checked";
//						print ">&nbsp;&nbsp;Organizational History</td>";
//					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_log\" value= \"1\" ";
						if ($type_log == 1) print "checked";
						print ">&nbsp;&nbsp;Participation Log/Diversity Matrix</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_pr\" value= \"1\" ";
						if ($type_pr == 1) print "checked";
						print ">&nbsp;&nbsp;Policy Record</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_pop\" value= \"1\" ";
						if ($type_pop == 1) print "checked";
						print ">&nbsp;&nbsp;Public Intercept Survey/Opinion Poll</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_tps\" value= \"1\" ";
						if ($type_tps == 1) print "checked";
						print ">&nbsp;&nbsp;Tobacco Purchase Survey</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_sm\" value= \"1\" ";
						if ($type_sm == 1) print "checked";
						print ">&nbsp;&nbsp;Social Media Activity/Website Monitoring</td>";
					print "</tr>";


					print "<tr>";
						print "<td class= \"recruit\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_other\" value= \"1\" ";
						if ($type_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other (Specify ->) <input type=\"text\" name=\"type_other_spec\" value=\"$type_other_spec\" size=\"50\"></td>";
					print "</tr>";

					print "</table></td>";
				// end column 1 - Instrument Type


				// beginning column 2 - Information Source
					print "<td valign=\"top\"><table border=\"0\">";
					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Information Source/Participant Type(s)</strong><br>(Default = Not Specified, Public)</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_coalition\" value= \"1\" ";
						if ($is_coalition == 1) print "checked";
						print ">&nbsp;&nbsp;Coalition</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_decmak\" value= \"1\" ";
						if ($is_decmak == 1) print "checked";
						print ">&nbsp;&nbsp;Decision Maker</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_owner\" value= \"1\" ";
						if ($is_owner == 1) print "checked";
						print ">&nbsp;&nbsp;Owner/Manager</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_public\" value= \"1\" ";
						if ($is_public == 1) print "checked";
						print ">&nbsp;&nbsp;Participant</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_patron\" value= \"1\" ";
						if ($is_patron == 1) print "checked";
						print ">&nbsp;&nbsp;Patron</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_project\" value= \"1\" ";
						if ($is_project == 1) print "checked";
						print ">&nbsp;&nbsp;Project</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_tenant\" value= \"1\" ";
						if ($is_tenant == 1) print "checked";
						print ">&nbsp;&nbsp;Tenant</td>";
					print "</tr>";

					print "<tr>";
						print "<td class= \"recruit\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_other\" value= \"1\" ";
						if ($is_other == 1) print "checked";
						print ">&nbsp;&nbsp;Other</td>"; //  (Specify ->) <input type=\"text\" name=\"is_other_spec\" value=\"$is_other_spec\" size=\"50\">
					print "</tr>";

					//					print "<tr>";
					//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_adult\" value= \"1\" ";
					//						if ($is_adult == 1) print "checked";
					//						print ">&nbsp;&nbsp;Adult</td>";
					//					print "</tr>";

					print "<tr><td>&nbsp;</td></tr>";

					print "<tr>";
					print "<td colspan= \"2\" class= \"recruit\"><strong>Priority Populations</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_afam\" value= \"1\" ";
						if ($is_afam == 1) print "checked";
						print ">&nbsp;&nbsp;African American/Black</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_asian\" value= \"1\" ";
						if ($is_asian == 1) print "checked";
						print ">&nbsp;&nbsp;Asian</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_hisp\" value= \"1\" ";
						if ($is_hisp == 1) print "checked";
						print ">&nbsp;&nbsp;Hispanic/Latinx</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_native\" value= \"1\" ";
						if ($is_native == 1) print "checked";
						print ">&nbsp;&nbsp;Native American</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_pacific\" value= \"1\" ";
						if ($is_pacific == 1) print "checked";
						print ">&nbsp;&nbsp;Pacific Islander</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_lgbt\" value= \"1\" ";
						if ($is_lgbt == 1) print "checked";
						print ">&nbsp;&nbsp;LGBTQ</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_ses\" value= \"1\" ";
						if ($is_ses == 1) print "checked";
						print ">&nbsp;&nbsp;Low Socioeconomic Status</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_rural\" value= \"1\" ";
						if ($is_rural == 1) print "checked";
						print ">&nbsp;&nbsp;Rural</td>";
					print "</tr>";

					print "<tr>";
						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_youth\" value= \"1\" ";
						if ($is_youth == 1) print "checked";
						print ">&nbsp;&nbsp;Youth</td>";
					print "</tr>";
					print "</table></td></tr>";
				// end column 2 - Information Source

					print "<tr><td>&nbsp;</td></tr>";

//					print "<tr><td>&nbsp;</td></tr>";

// two columns:  1 for individual flags and the other for language flags
	// beginning 1st column - individual flags
		print "<tr><td><table border=\"0\">";
		print "<tr>";
			print "<td><strong>Instrument Parameters</strong><br>(Default = Pre-intervention Instruments)</td>";
		print "</tr>";
		print "<tr>";
			print "<td colspan=\"1\"><input type= \"checkbox\" name= \"post_intervention\" value= \"1\" ";
			if ($post_intervention == 1) print "checked";
			print ">&nbsp;&nbsp;Post-intervention Instruments</td>";
		print "</tr>";

		print "<tr>";
			print "<td colspan=\"1\"><input type= \"checkbox\" name= \"pre_intervention\" value= \"1\" ";
			if ($pre_intervention == 1) print "checked";
			print ">&nbsp;&nbsp;Pre-/Post-intervention Instruments</td>";
		print "</tr>";

//		print "<tr>";
//			print "<td colspan=\"1\"><input type= \"checkbox\" name= \"questionbank_doc\" value= \"1\" ";
//			if ($questionbank_doc == 1) print "checked";
//			print ">&nbsp;&nbsp;Question Bank Documents</td>";
//		print "</tr>";

//		print "<tr>";
//			print "<td colspan=\"1\"><input type= \"checkbox\" name= \"resource_doc\" value= \"1\" ";
//			if ($resource_doc == 1) print "checked";
//			print ">&nbsp;&nbsp;README Resources</td>";
//		print "</tr>";

		print "<tr>";
			print "<td colspan=\"1\"><input type= \"checkbox\" name= \"tcec_tested\" value= \"1\" ";
			if ($tcec_tested == 1) print "checked";
			print ">&nbsp;&nbsp;Pilot Tested Instruments</td>";
		print "</tr>";

		print "<tr>";
			print "<td colspan=\"1\"><input type= \"checkbox\" name= \"tcec_authored\" value= \"1\" ";
			if ($tcec_authored == 1) print "checked";
			print ">&nbsp;&nbsp;Authored by TCEC or another resource organization </td>";
		print "</tr>";


		print "</table></td>";
	// end 1st column - invidivual flags

	// beginning 2nd column - Available Translations
		print "<td><table border=\"0\">";
		print "<tr>";
			print "<td colspan=\"1\"><strong>Available Translations</strong><br>(Default = English)</td>";
		print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_en\" value= \"1\" ";
//						if ($lang_en == 1) print "checked";
//						print ">&nbsp;&nbsp;English</td>";
//					print "</tr>";

//		print "<tr>";
//			print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_hmong\" value= \"1\" ";
//			if ($lang_hmong == 1) print "checked";
//			print ">&nbsp;&nbsp;Hmong</td>";
//		print "</tr>";

		print "<tr>";
			print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_sp\" value= \"1\" ";
			if ($lang_sp == 1) print "checked";
			print ">&nbsp;&nbsp;Spanish</td>";
		print "</tr>";

//		print "<tr>";
//			print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_viet\" value= \"1\" ";
//			if ($lang_viet == 1) print "checked";
//			print ">&nbsp;&nbsp;Vietnamese</td>";
//		print "</tr>";

		print "<tr>";
			print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_other\" value= \"1\" ";
			if ($lang_other == 1) print "checked";
			print ">&nbsp;&nbsp;Other (Specify ->) <input type=\"text\" name=\"lang_other_spec\" value=\"$lang_other_spec\" size=\"50\"></td>";
			print "<td>&nbsp;</td>";
		print "</tr>";

		print "</table></td></tr>";
	// end 2nd column

	print "<tr><td colspan=\"3\"><font color=\"#FF0000\"><strong>*</strong> Note: Since in most cases we won’t know if non-TCEC instruments have been tested, this category indicates whether TCEC tested
	it or if that is clearly known (e.g., for statewide instruments or published studies, etc.)</td></tr></font>";

		print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

//					print "<tr><td>&nbsp;</td></tr>";


					print "<tr>";
						print "<td colspan= \"2\" class= \"recruit\"><strong>Instrument Topics</strong></td>";
					print "</tr>";

//					print "<tr><td>&nbsp;</td></tr>";

// 2 columns of variouts instrument topics
// begin column 1
print "<tr><td valign=\"top\"><table border=\"0\">";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_cessation\" id= \"topic_cessation\" value= \"1\" ";
	if ($topic_cessation == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Cessation</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_cp_ask\" id= \"topic_cp_ask\" value= \"1\" ";
	if ($topic_cp_ask == 1) print "checked";
	print ">&nbsp;&nbsp;Ask/Advise/Refer</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_cp_program\" id= \"topic_cp_program\" value= \"1\" ";
	if ($topic_cp_program == 1) print "checked";
	print ">&nbsp;&nbsp;Cessation</td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_coalition\" id= \"topic_coalition\" value= \"1\" ";
	if ($topic_coalition == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Coalitions/Advisory Committees/Partnerships</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_cap_coalition\" id= \"topic_cap_coalition\" value= \"1\" ";
	if ($topic_cap_coalition == 1) print "checked";
	print ">&nbsp;&nbsp;Coalitions</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_cap_advisory\" id= \"topic_cap_advisory\" value= \"1\" ";
	if ($topic_cap_advisory == 1) print "checked";
	print ">&nbsp;&nbsp;Advisory Committees</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_cap_participate\" id= \"topic_cap_participate\" value= \"1\" ";
	if ($topic_cap_participate == 1) print "checked";
	print ">&nbsp;&nbsp;Participation</td>";
print "</tr>";


print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_cap_partnership\" id= \"topic_cap_partnership\" value= \"1\" ";
	if ($topic_cap_partnership == 1) print "checked";
	print ">&nbsp;&nbsp;Partnerships</td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_prioritypops\" id= \"topic_prioritypops\" value= \"1\" ";
	if ($topic_prioritypops == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Community Engagement/Relationship Building</i></strong></td>";
print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_afam\" value= \"1\" ";
//						if ($topic_pp_afam == 1) print "checked";
//						print ">&nbsp;&nbsp;African-Americans/Blacks</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_asian\" value= \"1\" ";
//						if ($topic_pp_asian == 1) print "checked";
//						print ">&nbsp;&nbsp;Asians</td>";
//					print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_cbo\" id= \"topic_pp_cbo\" value= \"1\" ";
	if ($topic_pp_cbo == 1) print "checked";
	print ">&nbsp;&nbsp;Outreach</td>";
print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_thought\" id= \"topic_pp_thought\" value= \"1\" ";
//	if ($topic_pp_thought == 1) print "checked";
//	print ">&nbsp;&nbsp;Thought Leaders</td>";
//print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_hisp\" value= \"1\" ";
//						if ($topic_pp_hisp == 1) print "checked";
//						print ">&nbsp;&nbsp;Hispanic/Latinx</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_lgbt\" value= \"1\" ";
//						if ($topic_pp_lgbt == 1) print "checked";
//						print ">&nbsp;&nbsp;LGBTQ</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_native\" value= \"1\" ";
//						if ($topic_pp_native == 1) print "checked";
//						print ">&nbsp;&nbsp;Native Americans</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_rural\" value= \"1\" ";
//						if ($topic_pp_rural == 1) print "checked";
//						print ">&nbsp;&nbsp;Rural</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_youth\" value= \"1\" ";
//						if ($topic_pp_youth == 1) print "checked";
//						print ">&nbsp;&nbsp;Youth</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_other\" value= \"1\" ";
//						if ($topic_pp_other == 1) print "checked";
//						print ">&nbsp;&nbsp;Other (Specify ->) <input type=\"text\" name=\"topic_pp_other_spec\" value=\"$topic_pp_other_spec\" size=\"50\"></td>";
//						print "<td>&nbsp;</td>";
//					print "</tr>";

print "<tr><td>&nbsp;</td></tr>";

//print "<tr>";
//	print "<td><input type= \"checkbox\" name= \"topic_genpolicy\" id= \"topic_genpolicy\" value= \"1\" ";
//	if ($topic_genpolicy == 1) print "checked";
//	print ">&nbsp;&nbsp;<strong><i>General Policy Adoption/Implementation</i></strong></td>";
//print "</tr>";

//print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_materials\" id= \"topic_materials\" value= \"1\" ";
	if ($topic_materials == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Materials/Instrument Testing</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_mat_instrument\" id= \"topic_mat_instrument\" value= \"1\" ";
	if ($topic_mat_instrument == 1) print "checked";
	print ">&nbsp;&nbsp;Data Collection Instrument</strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_mat_materials\" id= \"topic_mat_materials\" value= \"1\" ";
	if ($topic_mat_materials == 1) print "checked";
	print ">&nbsp;&nbsp;Materials</td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_media\" id= \"topic_media\" value= \"1\" ";
	if ($topic_media == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Media/Social Media/Website Activity</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_media_mar\" id= \"topic_media_mar\" value= \"1\" ";
	if ($topic_media_mar == 1) print "checked";
	print ">&nbsp;&nbsp;Media Activity Record</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_media_sma\" id= \"topic_media_sma\" value= \"1\" ";
	if ($topic_media_sma == 1) print "checked";
	print ">&nbsp;&nbsp;Social Media Activity</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_media_web\" id= \"topic_media_web\" value= \"1\" ";
	if ($topic_media_web == 1) print "checked";
	print ">&nbsp;&nbsp;Website Monitoring</td>";
print "</tr>";


print "<tr><td>&nbsp;</td></tr>";

//print "<tr>";
//	print "<td><input type= \"checkbox\" name= \"topic_misc\" id= \"topic_misc\" value= \"1\" ";
//	if ($topic_misc == 1) print "checked";
//	print ">&nbsp;&nbsp;<strong><i>Miscellaneous</i></strong></td>";
//print "</tr>";

//print "<tr><td>&nbsp;</td></tr>";

//print "<tr>";
//	print "<td><input type= \"checkbox\" name= \"topic_needsassess\" id= \"topic_needsassess\" value= \"1\" ";
//	if ($topic_needsassess == 1) print "checked";
//	print ">&nbsp;&nbsp;<strong><i>Needs Assessment</i></strong></td>";
//print "</tr>";

//print "<tr><td>&nbsp;</td></tr>";

//print "<tr>";
//	print "<td><input type= \"checkbox\" name= \"topic_log\" id= \"topic_log\" value= \"1\" ";
//	if ($topic_log == 1) print "checked";
//	print ">&nbsp;&nbsp;<strong><i>Participation Log/Diversity Matrix</i></strong></td>";
//print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_log_apl\" id= \"topic_log_apl\" value= \"1\" ";
//	if ($topic_log_apl == 1) print "checked";
//	print ">&nbsp;&nbsp;Activity Participation Log</td>";
//print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_log_cdm\" id= \"topic_log_cdm\" value= \"1\" ";
//	if ($topic_log_cdm == 1) print "checked";
//	print ">&nbsp;&nbsp;Coalition Diversity Matrix</td>";
//print "</tr>";

//print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_photov\" id= \"topic_photov\" value= \"1\" ";
	if ($topic_photov == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Photovoice Activities</i></strong></td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_policymaking\" id= \"topic_policymaking\" value= \"1\" ";
	if ($topic_policymaking == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Policy Making</i></strong></td>";
print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_min\" id= \"topic_pm_min\" value= \"1\" ";
//	if ($topic_pm_min == 1) print "checked";
//	print ">&nbsp;&nbsp;Meeting Minutes/Voting Records</td>";
//print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_obs\" id= \"topic_pm_obs\" value= \"1\" ";
//	if ($topic_pm_obs == 1) print "checked";
//	print ">&nbsp;&nbsp;Meeting Observations</td>";
//print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_bios\" id= \"topic_pm_bios\" value= \"1\" ";
//	if ($topic_pm_bios == 1) print "checked";
//	print ">&nbsp;&nbsp;Member Biographies</td>";
//print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_adoption\" id= \"topic_pm_adoption\" value= \"1\" ";
	if ($topic_pm_adoption == 1) print "checked";
	print ">&nbsp;&nbsp;Policy Adoption/Implementation Process</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_records\" id= \"topic_pm_records\" value= \"1\" ";
	if ($topic_pm_records == 1) print "checked";
	print ">&nbsp;&nbsp;Policy Records</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_track\" id= \"topic_pm_track\" value= \"1\" ";
	if ($topic_pm_track == 1) print "checked";
	print ">&nbsp;&nbsp;Signed Policy Tracking Forms</td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_ppm\" id= \"topic_ppm\" value= \"1\" ";
	if ($topic_ppm == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Project Planning and Monitoring</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_ppm_needs\" id= \"topic_ppm_needs\" value= \"1\" ";
	if ($topic_ppm_needs == 1) print "checked";
	print ">&nbsp;&nbsp;Needs Assesment</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_ppm_org\" id= \"topic_ppm_org\" value= \"1\" ";
	if ($topic_ppm_org == 1) print "checked";
	print ">&nbsp;&nbsp;Organizational History</td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";



print "</table></td>";
// end column 1

//begin column 2
print "<td valign=\"top\"><table border=\"0\">";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_retail\" id= \"topic_retail\" value= \"1\" ";
	if ($topic_retail == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Retail Environment</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_ads\" id= \"topic_r_ads\" value= \"1\" ";
	if ($topic_r_ads == 1) print "checked";
	print ">&nbsp;&nbsp;Advertising/Marketing/Signage</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_compliance\" id= \"topic_r_compliance\" value= \"1\" ";
	if ($topic_r_compliance == 1) print "checked";
	print ">&nbsp;&nbsp;Compliance/Enforcement</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_defs\" id= \"topic_r_defs\" value= \"1\" ";
	if ($topic_r_defs == 1) print "checked";
	print ">&nbsp;&nbsp;Definitions</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_end\" id= \"topic_r_end\" value= \"1\" ";
	if ($topic_r_end == 1) print "checked";
	print ">&nbsp;&nbsp;End Tobacco</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_flavors\" id= \"topic_r_flavors\" value= \"1\" ";
	if ($topic_r_flavors == 1) print "checked";
	print ">&nbsp;&nbsp;Flavored Products</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_healthy\" id= \"topic_r_healthy\" value= \"1\" ";
	if ($topic_r_healthy == 1) print "checked";
	print ">&nbsp;&nbsp;Healthy Retail</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_hshc\" id= \"topic_r_hshc\" value= \"1\" ";
	if ($topic_r_hshc == 1) print "checked";
	print ">&nbsp;&nbsp;Healthy Stores for a Healthy Community</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_min\" id= \"topic_r_min\" value= \"1\" ";
	if ($topic_r_min == 1) print "checked";
	print ">&nbsp;&nbsp;Minimum Price/Pack Size</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_pharm\" id= \"topic_r_pharm\" value= \"1\" ";
	if ($topic_r_pharm == 1) print "checked";
	print ">&nbsp;&nbsp;Pharmacies</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_prod\" id= \"topic_r_prod\" value= \"1\" ";
	if ($topic_r_prod == 1) print "checked";
	print ">&nbsp;&nbsp;Products</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_density\" id= \"topic_r_density\" value= \"1\" ";
	if ($topic_r_density == 1) print "checked";
	print ">&nbsp;&nbsp;Retailer Density/Zoning</td>";
print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_signs\" value= \"1\" ";
//						if ($topic_r_signs == 1) print "checked";
//						print ">&nbsp;&nbsp;Signs</td>";
//					print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_trl\" id= \"topic_r_trl\" value= \"1\" ";
	if ($topic_r_trl == 1) print "checked";
	print ">&nbsp;&nbsp;Tobacco Retail Licensing</td>";
print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_train\" value= \"1\" ";
//						if ($topic_r_train == 1) print "checked";
//						print ">&nbsp;&nbsp;Training</td>";
//					print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_r_youth\" id= \"topic_r_youth\" value= \"1\" ";
	if ($topic_r_youth == 1) print "checked";
	print ">&nbsp;&nbsp;Youth Access</td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_shs\" id= \"topic_shs\" value= \"1\" ";
	if ($topic_shs== 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Secondhand Smoke/Smokefree Spaces</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_casinos\" id= \"topic_shs_casinos\" value= \"1\" ";
	if ($topic_shs_casinos == 1) print "checked";
	print ">&nbsp;&nbsp;Casinos</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_care\" id= \"topic_shs_care\" value= \"1\" ";
	if ($topic_shs_care == 1) print "checked";
	print ">&nbsp;&nbsp;Child and Residential Care Campuses</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_college\" id= \"topic_shs_college\" value= \"1\" ";
	if ($topic_shs_college == 1) print "checked";
	print ">&nbsp;&nbsp;College/School Campuses</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_comp\" id= \"topic_shs_comp\" value= \"1\" ";
	if ($topic_shs_comp == 1) print "checked";
	print ">&nbsp;&nbsp;Comprehensive Policies</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_entry\" id= \"topic_shs_entry\" value= \"1\" ";
	if ($topic_shs_entry == 1) print "checked";
	print ">&nbsp;&nbsp;Entryways</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_events\" id= \"topic_shs_events\" value= \"1\" ";
	if ($topic_shs_events == 1) print "checked";
	print ">&nbsp;&nbsp;Events</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_health\" id= \"topic_shs_health\" value= \"1\" ";
	if ($topic_shs_health == 1) print "checked";
	print ">&nbsp;&nbsp;Health Care Campuses</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_waste\" id= \"topic_shs_waste\" value= \"1\" ";
	if ($topic_shs_waste == 1) print "checked";
	print ">&nbsp;&nbsp;Litter/Tobacco Product Waste</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_muh_owner\" id= \"topic_shs_muh_owner\" value= \"1\" ";
	if ($topic_shs_muh_owner == 1) print "checked";
	print ">&nbsp;&nbsp;Multi-unit Housing</td>";
print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_muh_tenant\" value= \"1\" ";
//						if ($topic_shs_muh_tenant == 1) print "checked";
//						print ">&nbsp;&nbsp;Multi-unit Housing - Tenants</td>";
//					print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_dining\" id= \"topic_shs_dining\" value= \"1\" ";
	if ($topic_shs_dining == 1) print "checked";
	print ">&nbsp;&nbsp;Outdoor Dining</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_public\" id= \"topic_shs_public\" value= \"1\" ";
	if ($topic_shs_public == 1) print "checked";
	print ">&nbsp;&nbsp;Outdoor Public Places</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_rec\" id= \"topic_shs_rec\" value= \"1\" ";
	if ($topic_shs_rec == 1) print "checked";
	print ">&nbsp;&nbsp;Outdoor Recreational Areas</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_work\" id= \"topic_shs_work\" value= \"1\" ";
	if ($topic_shs_work == 1) print "checked";
	print ">&nbsp;&nbsp;Outdoor Worksites</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_sponsor\" id= \"topic_shs_sponsor\" value= \"1\" ";
	if ($topic_shs_sponsor == 1) print "checked";
	print ">&nbsp;&nbsp;Sponsorship</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_use_adult\" id= \"topic_shs_use_adult\" value= \"1\" ";
	if ($topic_shs_use_adult == 1) print "checked";
	print ">&nbsp;&nbsp;Tobacco/Vaping Use</td>";
print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_use_pp\" value= \"1\" ";
//						if ($topic_shs_use_pp == 1) print "checked";
//						print ">&nbsp;&nbsp;Tobacco/Vaping Use - Priority Populations</td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_use_youth\" value= \"1\" ";
//						if ($topic_shs_use_youth == 1) print "checked";
//						print ">&nbsp;&nbsp;Tobacco/Vaping Use - Youth</td>";
//					print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_shs_transport\" id= \"topic_shs_transport\" value= \"1\" ";
	if ($topic_shs_transport == 1) print "checked";
	print ">&nbsp;&nbsp;Transportation (Taxis/Lyft/Uber)</td>";
print "</tr>";

print "<tr><td>&nbsp;</td></tr>";


//print "<tr>";
//	print "<td><input type= \"checkbox\" name= \"topic_socmedia\" id= \"topic_socmedia\" value= \"1\" ";
//	if ($topic_socmedia == 1) print "checked";
//	print ">&nbsp;&nbsp;<strong><i>Social Media/Website Monitoring</i></strong></td>";
//print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_sm_medmon\" id= \"topic_sm_medmon\" value= \"1\" ";
//	if ($topic_sm_medmon == 1) print "checked";
//	print ">&nbsp;&nbsp;Social Media Monitoring</td>";
//print "</tr>";

//print "<tr>";
//	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_sm_webmon\" id= \"topic_sm_webmon\" value= \"1\" ";
//	if ($topic_sm_webmon == 1) print "checked";
//	print ">&nbsp;&nbsp;Website Monitoring</td>";
//print "</tr>";

//print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td><input type= \"checkbox\" name= \"topic_training\" id= \"topic_training\" value= \"1\" ";
	if ($topic_training == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Training</i></strong></td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_tr_cess\" id= \"topic_tr_cess\" value= \"1\" ";
	if ($topic_tr_cess == 1) print "checked";
	print ">&nbsp;&nbsp;Cessation Training</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_tr_coal\" id= \"topic_tr_coal\" value= \"1\" ";
	if ($topic_tr_coal == 1) print "checked";
	print ">&nbsp;&nbsp;Coalition Training</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_tr_gen\" id= \"topic_tr_gen\" value= \"1\" ";
	if ($topic_tr_gen == 1) print "checked";
	print ">&nbsp;&nbsp;General Training</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_tr_retail\" id= \"topic_tr_retail\" value= \"1\" ";
	if ($topic_tr_retail == 1) print "checked";
	print ">&nbsp;&nbsp;Retail Training</td>";
print "</tr>";

print "<tr>";
	print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_tr_shs\" id= \"topic_tr_shs\" value= \"1\" ";
	if ($topic_tr_shs == 1) print "checked";
	print ">&nbsp;&nbsp;Second Hand Smoke Training</td>";
print "</tr>";



print "<tr><td>&nbsp;</td></tr>";

print "<tr>";
	print "<td class= \"recruit\"><input type= \"checkbox\" name= \"topic_other\" id= \"topic_other\" value= \"1\" ";
	if ($topic_other == 1) print "checked";
	print ">&nbsp;&nbsp;<strong><i>Other</td>"; //  (Specify ->) </i></strong> <input type=\"text\" name=\"topic_other_spec\" value=\"$topic_other_spec\" size=\"50\">
print "</tr>";


print "</table></td></tr>";
// end column 2


//					print "<tr><td>&nbsp;</td></tr>";

			        print "<tr><td>&nbsp;</td></tr>";

//					print "<tr>";
//						print "<td valign=\"top\"><strong>Instrument Information</strong></td>";
//					print "</tr>";

//					print "<tr>";
//						print "<td valign=\"top\" colspan=\"2\"><textarea name=\"instrument_content\" cols=\"78\" rows=\"10\">$instrument_content</textarea></td>";
//					print "</tr>";

//					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";


//					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";
//					print "<tr><td colspan= \"2\">&nbsp;</td></tr>";

					print "<tr>";
						print "<td align= \"left\"><input type= \"submit\" name= \"sub_instrument\" value= \"$submit\"></td>";
						print "<td align= \"left\"><input type= \"hidden\" name= \"instrument_id\" value= \"$instrumentID\">
						<a href=\"tcec_instrument_listing.php\">Go back to Instruments List without Making Changes</a></td>";
						print "<td align= \"left\"><input type= \"submit\" name= \"sub_instrument\" value= \"Delete Instrument\"></td>";
					print "</tr>";

				print "</table>";
				print "</form>";



			} // end Do Not Submit Information



		} // end if $dbok
	} // end if $fp = fopen

	?>

	<script type="text/javascript">
  /* topic_tr_cess */
  document.getElementById("topic_tr_cess").addEventListener('change', function(event) {

  	if (document.getElementById("topic_tr_cess").checked==true){
  			document.getElementById("topic_training").checked=true;
  	}

  	else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
    && (document.getElementById("topic_tr_retail").checked==false) && (document.getElementById("topic_tr_shs").checked==false)){
  			document.getElementById("topic_training").checked=false;
  	}

  });
  </script>

  <script type="text/javascript">
  /* topic_tr_coal */
  document.getElementById("topic_tr_coal").addEventListener('change', function(event) {

  	if (document.getElementById("topic_tr_coal").checked==true){
  			document.getElementById("topic_training").checked=true;
  	}

  	else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
    && (document.getElementById("topic_tr_retail").checked==false) && (document.getElementById("topic_tr_shs").checked==false)){
  			document.getElementById("topic_training").checked=false;
  	}

  });
  </script>

  <script type="text/javascript">
  /* topic_tr_gen */
  document.getElementById("topic_tr_gen").addEventListener('change', function(event) {

  	if (document.getElementById("topic_tr_gen").checked==true){
  			document.getElementById("topic_training").checked=true;
  	}

  	else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
    && (document.getElementById("topic_tr_retail").checked==false) && (document.getElementById("topic_tr_shs").checked==false)){
  			document.getElementById("topic_training").checked=false;
  	}

  });
  </script>

  <script type="text/javascript">
  /* topic_tr_retail */
  document.getElementById("topic_tr_retail").addEventListener('change', function(event) {

  	if (document.getElementById("topic_tr_retail").checked==true){
  			document.getElementById("topic_training").checked=true;
  	}

  	else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
    && (document.getElementById("topic_tr_retail").checked==false) && (document.getElementById("topic_tr_shs").checked==false)){
  			document.getElementById("topic_training").checked=false;
  	}

  });
  </script>

  <script type="text/javascript">
  /* topic_tr_shs */
  document.getElementById("topic_tr_shs").addEventListener('change', function(event) {

  	if (document.getElementById("topic_tr_shs").checked==true){
  			document.getElementById("topic_training").checked=true;
  	}

  	else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
    && (document.getElementById("topic_tr_retail").checked==false) && (document.getElementById("topic_tr_shs").checked==false)){
  			document.getElementById("topic_training").checked=false;
  	}

  });
  </script>

	<script type="text/javascript">
  /* topic_cp_ask */
  document.getElementById("topic_cp_ask").addEventListener('change', function(event) {

  	if (document.getElementById("topic_cp_ask").checked==true){
  			document.getElementById("topic_cessation").checked=true;
  	}

  	else if ((document.getElementById("topic_cp_ask").checked==false) && (document.getElementById("topic_cp_program").checked==false)){
  			document.getElementById("topic_cessation").checked=false;
  	}

  });
  </script>

  <script type="text/javascript">

  /* topic_cp_program -> topic_cessation */
  document.getElementById("topic_cp_program").addEventListener('change', function(event) {

    if (document.getElementById("topic_cp_program").checked==true){
        document.getElementById("topic_cessation").checked=true;
    }

    else if ((document.getElementById("topic_cp_ask").checked==false) && (document.getElementById("topic_cp_program").checked==false)){
        document.getElementById("topic_cessation").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_coalition  */
  document.getElementById("topic_cap_coalition").addEventListener('change', function(event) {

    if (document.getElementById("topic_cap_coalition").checked==true){
        document.getElementById("topic_coalition").checked=true;
    }

    else if ((document.getElementById("topic_cap_coalition").checked==false) && (document.getElementById("topic_cap_participate").checked==false) && (document.getElementById("topic_cap_partnership").checked==false) && (document.getElementById("topic_cap_advisory").checked==false)){
        document.getElementById("topic_coalition").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_coalition  */
  document.getElementById("topic_cap_advisory").addEventListener('change', function(event) {

    if (document.getElementById("topic_cap_advisory").checked==true){
        document.getElementById("topic_coalition").checked=true;
    }

    else if ((document.getElementById("topic_cap_coalition").checked==false) && (document.getElementById("topic_cap_participate").checked==false) && (document.getElementById("topic_cap_partnership").checked==false) && (document.getElementById("topic_cap_advisory").checked==false)){
        document.getElementById("topic_coalition").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_coalition  */
  document.getElementById("topic_cap_partnership").addEventListener('change', function(event) {

    if (document.getElementById("topic_cap_partnership").checked==true){
        document.getElementById("topic_coalition").checked=true;
    }

    else if ((document.getElementById("topic_cap_coalition").checked==false) && (document.getElementById("topic_cap_participate").checked==false) && (document.getElementById("topic_cap_partnership").checked==false) && (document.getElementById("topic_cap_advisory").checked==false)){
        document.getElementById("topic_coalition").checked=false;
    }

  });

  </script>

	<script type="text/javascript">

	/* topic_coalition  */
	document.getElementById("topic_cap_participate").addEventListener('change', function(event) {

		if (document.getElementById("topic_cap_partnership").checked==true){
				document.getElementById("topic_coalition").checked=true;
		}

		else if ((document.getElementById("topic_cap_coalition").checked==false) && (document.getElementById("topic_cap_participate").checked==false) && (document.getElementById("topic_cap_partnership").checked==false) && (document.getElementById("topic_cap_advisory").checked==false)){
				document.getElementById("topic_coalition").checked=false;
		}

	});

	</script>

	<script type="text/javascript">

  /* topic_prioritypops */
  document.getElementById("topic_pp_cbo").addEventListener('change', function(event) {

    if (document.getElementById("topic_pp_cbo").checked==true){
        document.getElementById("topic_prioritypops").checked=true;
    }

    else if ((document.getElementById("topic_pp_cbo").checked==false) && (document.getElementById("topic_pp_thought").checked==false)){
        document.getElementById("topic_prioritypops").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_prioritypops */
  document.getElementById("topic_pp_thought").addEventListener('change', function(event) {

    if (document.getElementById("topic_pp_thought").checked==true){
        document.getElementById("topic_prioritypops").checked=true;
    }

    else if ((document.getElementById("topic_pp_cbo").checked==false) && (document.getElementById("topic_pp_thought").checked==false)){
        document.getElementById("topic_prioritypops").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_materials */
  document.getElementById("topic_mat_materials").addEventListener('change', function(event) {

    if (document.getElementById("topic_mat_materials").checked==true){
        document.getElementById("topic_materials").checked=true;
    }

    else if ((document.getElementById("topic_mat_materials").checked==false) && (document.getElementById("topic_mat_instrument").checked==false)){
        document.getElementById("topic_materials").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_materials */
  document.getElementById("topic_mat_instrument").addEventListener('change', function(event) {

    if (document.getElementById("topic_mat_instrument").checked==true){
        document.getElementById("topic_materials").checked=true;
    }

    else if ((document.getElementById("topic_mat_materials").checked==false) && (document.getElementById("topic_mat_instrument").checked==false)){
        document.getElementById("topic_materials").checked=false;
    }

  });

  </script>

	<script type="text/javascript">

  /* topic_media */
  document.getElementById("topic_media_mar").addEventListener('change', function(event) {

    if (document.getElementById("topic_media_mar").checked==true){
        document.getElementById("topic_media").checked=true;
    }

		else if ((document.getElementById("topic_media_mar").checked==false) && (document.getElementById("topic_media_sma").checked==false) && (document.getElementById("topic_media_web").checked==false)){
        document.getElementById("topic_media").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_media */
  document.getElementById("topic_media_sma").addEventListener('change', function(event) {

    if (document.getElementById("topic_media_sma").checked==true){
        document.getElementById("topic_media").checked=true;
    }

		else if ((document.getElementById("topic_media_mar").checked==false) && (document.getElementById("topic_media_sma").checked==false) && (document.getElementById("topic_media_web").checked==false)){
        document.getElementById("topic_media").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_media */
  document.getElementById("topic_media_web").addEventListener('change', function(event) {

    if (document.getElementById("topic_media_web").checked==true){
        document.getElementById("topic_media").checked=true;
    }

		else if ((document.getElementById("topic_media_mar").checked==false) && (document.getElementById("topic_media_sma").checked==false) && (document.getElementById("topic_media_web").checked==false)){
        document.getElementById("topic_media").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_log */
  document.getElementById("topic_log_apl").addEventListener('change', function(event) {

    if (document.getElementById("topic_log_apl").checked==true){
        document.getElementById("topic_log").checked=true;
    }

    else if ((document.getElementById("topic_log_apl").checked==false) && (document.getElementById("topic_log_cdm").checked==false)){
        document.getElementById("topic_log").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_log */
  document.getElementById("topic_log_cdm").addEventListener('change', function(event) {

    if (document.getElementById("topic_log_cdm").checked==true){
        document.getElementById("topic_log").checked=true;
    }

    else if ((document.getElementById("topic_log_apl").checked==false) && (document.getElementById("topic_log_cdm").checked==false)){
        document.getElementById("topic_log").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_policymaking */
  document.getElementById("topic_pm_adoption").addEventListener('change', function(event) {

    if (document.getElementById("topic_pm_adoption").checked==true){
        document.getElementById("topic_policymaking").checked=true;
    }

    else if ((document.getElementById("topic_pm_adoption").checked==false) && (document.getElementById("topic_pm_records").checked==false)
    && (document.getElementById("topic_pm_track").checked==false)){
        document.getElementById("topic_policymaking").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_policymaking */
  document.getElementById("topic_pm_records").addEventListener('change', function(event) {

    if (document.getElementById("topic_pm_records").checked==true){
        document.getElementById("topic_policymaking").checked=true;
    }

		else if ((document.getElementById("topic_pm_adoption").checked==false) && (document.getElementById("topic_pm_records").checked==false)
    && (document.getElementById("topic_pm_track").checked==false)){
        document.getElementById("topic_policymaking").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_policymaking */
  document.getElementById("topic_pm_track").addEventListener('change', function(event) {

    if (document.getElementById("topic_pm_track").checked==true){
        document.getElementById("topic_policymaking").checked=true;
    }

		else if ((document.getElementById("topic_pm_adoption").checked==false) && (document.getElementById("topic_pm_records").checked==false)
    && (document.getElementById("topic_pm_track").checked==false)){
        document.getElementById("topic_policymaking").checked=false;
    }

  });

  </script>

	<script type="text/javascript">

  /* topic_ppm */
  document.getElementById("topic_ppm_needs").addEventListener('change', function(event) {

    if (document.getElementById("topic_ppm_needs").checked==true){
        document.getElementById("topic_ppm").checked=true;
    }

    else if ((document.getElementById("topic_ppm_needs").checked==false) && (document.getElementById("topic_ppm_org").checked==false)){
        document.getElementById("topic_ppm").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /* topic_ppm */
  document.getElementById("topic_ppm_org").addEventListener('change', function(event) {

    if (document.getElementById("topic_ppm_org").checked==true){
        document.getElementById("topic_ppm").checked=true;
    }

    else if ((document.getElementById("topic_ppm_needs").checked==false) && (document.getElementById("topic_ppm_org").checked==false)){
        document.getElementById("topic_ppm").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_ads").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_ads").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_compliance").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_compliance").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_defs").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_defs").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

	<script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_end").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_end").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>


  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_flavors").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_flavors").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_healthy").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_healthy").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_hshc").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_hshc").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_min").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_min").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_pharm").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_pharm").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_prod").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_prod").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_density").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_density").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_trl").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_trl").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_retail */
  document.getElementById("topic_r_youth").addEventListener('change', function(event) {

    if (document.getElementById("topic_r_youth").checked==true){
        document.getElementById("topic_retail").checked=true;
    }

    else if ((document.getElementById("topic_r_ads").checked==false) && (document.getElementById("topic_r_compliance").checked==false)
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_end").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
    && (document.getElementById("topic_r_healthy").checked==false) && (document.getElementById("topic_r_hshc").checked==false)
    && (document.getElementById("topic_r_min").checked==false) && (document.getElementById("topic_r_pharm").checked==false)
    && (document.getElementById("topic_r_prod").checked==false) && (document.getElementById("topic_r_density").checked==false)
    && (document.getElementById("topic_r_trl").checked==false) && (document.getElementById("topic_r_youth").checked==false)){
        document.getElementById("topic_retail").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_casinos").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_casinos").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_care").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_care").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_college").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_college").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_comp").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_comp").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_entry").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_entry").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_events").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_events").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_health").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_health").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_waste").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_waste").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_muh_owner").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_muh_owner").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_dining").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_dining").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_public").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_public").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_rec").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_rec").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_work").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_work").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_sponsor").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_sponsor").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_use_adult").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_use_adult").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_shs */
  document.getElementById("topic_shs_transport").addEventListener('change', function(event) {

    if (document.getElementById("topic_shs_transport").checked==true){
        document.getElementById("topic_shs").checked=true;
    }

    else if ((document.getElementById("topic_shs_casinos").checked==false) && (document.getElementById("topic_shs_care").checked==false)
    && (document.getElementById("topic_shs_college").checked==false) && (document.getElementById("topic_shs_comp").checked==false)
    && (document.getElementById("topic_shs_entry").checked==false) && (document.getElementById("topic_shs_events").checked==false)
    && (document.getElementById("topic_shs_health").checked==false) && (document.getElementById("topic_shs_waste").checked==false)
    && (document.getElementById("topic_shs_muh_owner").checked==false) && (document.getElementById("topic_shs_dining").checked==false)
    && (document.getElementById("topic_shs_public").checked==false) && (document.getElementById("topic_shs_rec").checked==false)
    && (document.getElementById("topic_shs_work").checked==false) && (document.getElementById("topic_shs_sponsor").checked==false)
    && (document.getElementById("topic_shs_use_adult").checked==false) && (document.getElementById("topic_shs_transport").checked==false)){
        document.getElementById("topic_shs").checked=false;
    }

  });

  </script>


	<script type="text/javascript">
	/* topic_training  */
	document.getElementById("topic_tr_cess").addEventListener('change', function(event) {

		if (document.getElementById("topic_tr_cess").checked==true){
				document.getElementById("topic_training").checked=true;
		}

		else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
		&& (document.getElementById("topic__tr_retail").checked==false && (document.getElementById("topic__tr_shs").checked==false)){
				document.getElementById("topic_training").checked=false;
		}

	});

	</script>

	<script type="text/javascript">
	/* topic_training  */
	document.getElementById("topic_tr_coal").addEventListener('change', function(event) {

		if (document.getElementById("topic_tr_coal").checked==true){
				document.getElementById("topic_training").checked=true;
		}

		else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
		&& (document.getElementById("topic__tr_retail").checked==false && (document.getElementById("topic__tr_shs").checked==false)){
				document.getElementById("topic_training").checked=false;
		}

	});

	</script>

	<script type="text/javascript">
	/* topic_training  */
	document.getElementById("topic_tr_gen").addEventListener('change', function(event) {

		if (document.getElementById("topic_tr_gen").checked==true){
				document.getElementById("topic_training").checked=true;
		}

		else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
		&& (document.getElementById("topic__tr_retail").checked==false && (document.getElementById("topic__tr_shs").checked==false)){
				document.getElementById("topic_training").checked=false;
		}

	});

	</script>

	<script type="text/javascript">
	/* topic_training  */
	document.getElementById("topic_tr_retail").addEventListener('change', function(event) {

		if (document.getElementById("topic_tr_retail").checked==true){
				document.getElementById("topic_training").checked=true;
		}

		else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
		&& (document.getElementById("topic__tr_retail").checked==false && (document.getElementById("topic__tr_shs").checked==false)){
				document.getElementById("topic_training").checked=false;
		}

	});

	</script>

	<script type="text/javascript">
	/* topic_training  */
	document.getElementById("topic_tr_shs").addEventListener('change', function(event) {

		if (document.getElementById("topic_tr_shs").checked==true){
				document.getElementById("topic_training").checked=true;
		}

		else if ((document.getElementById("topic_tr_cess").checked==false) && (document.getElementById("topic_tr_coal").checked==false) && (document.getElementById("topic_tr_gen").checked==false)
		&& (document.getElementById("topic__tr_retail").checked==false && (document.getElementById("topic__tr_shs").checked==false)){
				document.getElementById("topic_training").checked=false;
		}

	});

	</script>


  <script type="text/javascript">

  /*topic_socmedia */
  document.getElementById("topic_sm_medmon").addEventListener('change', function(event) {

    if (document.getElementById("topic_sm_medmon").checked==true){
        document.getElementById("topic_socmedia").checked=true;
    }

    else if ((document.getElementById("topic_sm_medmon").checked==false) && (document.getElementById("topic_sm_webmon").checked==false)){
        document.getElementById("topic_socmedia").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_socmedia */
  document.getElementById("topic_sm_webmon").addEventListener('change', function(event) {

    if (document.getElementById("topic_sm_webmon").checked==true){
        document.getElementById("topic_socmedia").checked=true;
    }

    else if ((document.getElementById("topic_sm_medmon").checked==false) && (document.getElementById("topic_sm_webmon").checked==false)){
        document.getElementById("topic_socmedia").checked=false;
    }

  });

  </script>
