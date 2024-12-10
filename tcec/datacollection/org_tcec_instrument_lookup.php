<?php
session_start();
// no direct access
?>

<link type="text/css" rel="stylesheet" href="../includes/tcec.css">
<script src="../includes/checkbox_script.js"></script>

<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 18px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>

<!-- Start Main Content Column -->

	<?php
	// include function library
//	include "/includes/common.lib.php";


//page title and instructions
	print "<h3><strong>Search Instruments</strong></h3>";

  print "<h4><strong>Instructions</strong><br><br>";

  print "To search for instruments, mark as many selections as you wish from the following categories listed below.
  			The more search functions you select, the narrower your search results will be. To see ALL of the instruments in the database,
  			don’t mark any choices and click on the \"Find Instruments\" button at the bottom of the page.";

  print "<ul>";

  print "<li><strong>The README documents are a new resource</strong> that appear as the first instrument of every search. They list common evaluation
  			uses and measures for each main topic category.  They can be useful when developing or adapting data collection instruments.</li><br>

  			<li>To search for instruments on a particular topic, <strong>click on the +</strong> next to the category name and all of the subtopics in that cluster
  			become visible (and clickable). Then choose the subtopics you want to search for. </li><br>";
  print "</ul>";
  print "</h4>";



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
	$is_native = "";
	$is_pacific = "";
	$is_rural = "";
	$is_other = "";
	$is_other_spec = "";

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
	$topic_materials = "";
	$topic_mat_materials = "";
	$topic_mat_instrument = "";
	$topic_media = "";
	$topic_media_mar = "";
	$topic_misc = "";
	$topic_retail = "";
	$topic_r_ads = "";
	$topic_r_compliance = "";
	$topic_r_defs = "";
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

	$sub_instrument = "";

	if(isset($_POST['sub_instrument'])) $sub_instrument = $_POST['sub_instrument'];
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
	if(isset($_POST['is_native'])) $is_native = $_POST['is_native'];
	if(isset($_POST['is_pacific'])) $is_pacific = $_POST['is_pacific'];
	if(isset($_POST['is_rural'])) $is_rural = $_POST['is_rural'];
	if(isset($_POST['is_other'])) $is_other = $_POST['is_other'];
	if(isset($_POST['is_other_spec'])) $is_other_spec = $_POST['is_other_spec'];

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
	if(isset($_POST['topic_cap_partnership'])) $topic_cap_partnership = $_POST['topic_cap_partnership'];
	if(isset($_POST['topic_genpolicy'])) $topic_genpolicy = $_POST['topic_genpolicy'];
	if(isset($_POST['topic_cessation'])) $topic_cessation = $_POST['topic_cessation'];
	if(isset($_POST['topic_cp_ask'])) $topic_cp_ask = $_POST['topic_cp_ask'];
	if(isset($_POST['topic_cp_program'])) $topic_cp_program = $_POST['topic_cp_program'];

	if(isset($_POST['topic_policymaking'])) $topic_policymaking = $_POST['topic_policymaking'];
	if(isset($_POST['topic_pm_min'])) $topic_pm_min = $_POST['topic_pm_min'];
	if(isset($_POST['topic_pm_obs'])) $topic_pm_obs = $_POST['topic_pm_obs'];
	if(isset($_POST['topic_pm_bios'])) $topic_pm_bios = $_POST['topic_pm_bios'];

	if(isset($_POST['topic_pm_track'])) $topic_pm_track = $_POST['topic_pm_track'];
	if(isset($_POST['topic_materials'])) $topic_materials = $_POST['topic_materials'];
	if(isset($_POST['topic_mat_materials'])) $topic_mat_materials = $_POST['topic_mat_materials'];
	if(isset($_POST['topic_mat_instrument'])) $topic_mat_instrument = $_POST['topic_mat_instrument'];
	if(isset($_POST['topic_media'])) $topic_media = $_POST['topic_media'];
	if(isset($_POST['topic_media_mar'])) $topic_media_mar = $_POST['topic_media_mar'];
	if(isset($_POST['topic_misc'])) $topic_misc = $_POST['topic_misc'];

	if(isset($_POST['topic_retail'])) $topic_retail = $_POST['topic_retail'];
	if(isset($_POST['topic_r_ads'])) $topic_r_ads = $_POST['topic_r_ads'];
	if(isset($_POST['topic_r_compliance'])) $topic_r_compliance = $_POST['topic_r_compliance'];
	if(isset($_POST['topic_r_defs'])) $topic_r_defs = $_POST['topic_r_defs'];
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


			if ($sub_instrument == "Find Instruments")
			{
        $search_participant = "";
        $participant_list = "";
        $search_document = "";
        $document_list = "";
        $search_type = "";
				$type_list = "";
				$search_topic = "";
				$topic_list = "";
				$search_lang = "";
				$lang_list = "";
				$put_or = "";
				$topic_or = "";
				$lang_or = "";
        $participant_or = "";
        $document_or = "";

				// build search criteria for language
			//	if ($lang_en == "1")
          if (($lang_sp <> "1") && ($lang_hmong <> "1") && ($lang_viet <> "1") && ($lang_other <> "1"))
				{
					$search_lang .= "lang_en = \"1\" ";
					$lang_or = "1";
					$lang_list .= "English; ";
				}

				if ($lang_sp == "1")
				{
					if ($lang_or == "1") $search_lang .= "OR ";
					$search_lang .= "lang_sp = \"1\" ";
					$lang_or = "1";
					$lang_list .= "Spanish; ";
				}

        if ($lang_hmong == "1")
				{
					if ($lang_or == "1") $search_lang .= "OR ";
					$search_lang .= "lang_hmong = \"1\" ";
					$lang_or = "1";
					$lang_list .= "Hmong; ";
				}

        if ($lang_viet == "1")
				{
					if ($lang_or == "1") $search_lang .= "OR ";
					$search_lang .= "lang_viet = \"1\" ";
					$lang_or = "1";
					$lang_list .= "Vietnamese; ";
				}

				if ($lang_other == "1")
				{
					if ($lang_or == "1") $search_lang .= "OR ";
					$search_lang .= "lang_other = \"1\" ";
					$lang_or = "1";
					$lang_list .= "Other Language; ";
				}

        // build search criteria for document type
        if ($post_intervention == "1")
        {
          $search_document .= "post_intervention = \"1\" ";
          $document_or = "1";
          $document_list .= "Post-intervention; ";
        }

        if ($pre_intervention == "1")
        {
          if ($document_or == "1") $search_document .= "OR ";
          $search_document .= "pre_intervention = \"1\" ";
          $document_or = "1";
          $document_list .= "Pre-/Post-intervention; ";
        }

        if ($questionbank_doc == "1")
        {
          if ($document_or == "1") $search_document .= "OR ";
          $search_document .= "questionbank_doc = \"1\" ";
          $document_or = "1";
          $document_list .= "Question Bank Documents; ";
        }

        if ($resource_doc == "1")
        {
          if ($document_or == "1") $search_document .= "OR ";
          $search_document .= "resource_doc = \"1\" ";
          $document_or = "1";
          $document_list .= "README Resources; ";
        }

        if ($tcec_tested == "1")
        {
          if ($document_or == "1") $search_document .= "OR ";
          $search_lang .= "tcec_tested = \"1\" ";
          $document_or = "1";
          $document_list .= "Pilot Tested Instruments; ";
        }

				// build search criteria for instrument type
				if ($type_edsurv == "1")
				{
					$search_type .= "type_edsurv = \"1\" ";
					$put_or = "1";
					$type_list .= "Education/Participant Survey; ";
				}

				if ($type_fg == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_fg = \"1\" ";
					$put_or = "1";
					$type_list .= "Focus Group; ";
				}

				if ($type_kii == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_kii = \"1\" ";
					$put_or = "1";
					$type_list .= "Key Informant Interview; ";
				}

				if ($type_mar == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_mar = \"1\" ";
					$put_or = "1";
					$type_list .= "Media Activity Record; ";
				}

				if ($type_obs == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_obs = \"1\" ";
					$put_or = "1";
					$type_list .= "Observation; ";
				}

        if ($type_hist == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_hist = \"1\" ";
					$put_or = "1";
					$type_list .= "Organizational History; ";
				}

        if ($type_log == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_log = \"1\" ";
					$put_or = "1";
					$type_list .= "Participation Log/Diversity Matrix; ";
				}

				if ($type_pr == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_pr = \"1\" ";
					$put_or = "1";
					$type_list .= "Policy Record; ";
				}

				if ($type_pop == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_pop = \"1\" ";
					$put_or = "1";
					$type_list .= "Public Intercept Survey/Opinion Poll; ";
				}

				if ($type_tps == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_tps = \"1\" ";
					$put_or = "1";
					$type_list .= "Tobacco Purchase Survey; ";
				}

        if ($type_sm == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_sm = \"1\" ";
					$put_or = "1";
					$type_list .= "Social Media Activity/Website Monitoring; ";
				}

				if ($type_other == "1")
				{
					if ($put_or == "1") $search_type .= "OR ";
					$search_type .= "type_other = \"1\" ";
					$put_or = "1";
					$type_list .= "Other; ";
				}

        // build search criteria for information source/participant

        if ($is_afam == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_afam = \"1\" ";
					$participant_or = "1";
					$participant_list .= "African American/Black; ";
				}

        if ($is_asian == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_asian = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Asian; ";
				}

        if ($is_hisp == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_hisp = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Hispanic/Latinx; ";
				}

        if ($is_native == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_native = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Native American; ";
				}

        if ($is_pacific == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_pacific = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Pacific Islander; ";
				}

        if ($is_lgbt == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_lgbt = \"1\" ";
					$participant_or = "1";
					$participant_list .= "LGBTQ; ";
				}

        if ($is_rural == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_rural = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Rural; ";
				}

        if ($is_youth == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_youth = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Youth; ";
				}

        if ($is_decmak == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_decmak = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Decision Maker; ";
				}

        if ($is_public == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_public = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Public; ";
				}

        if ($is_owner == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_owner = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Owner/Manager; ";
				}

        if ($is_tenant == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_tenant = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Tenant; ";
				}

        if ($is_other == "1")
				{
					if ($participant_or == "1") $search_participant .= "OR ";
					$search_participant .= "is_other = \"1\" ";
					$participant_or = "1";
					$participant_list .= "Other; ";
				}

        // build search criteria for topic

				if ($topic_cessation == "1")
				{
					$search_topic .= "topic_cessation = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Cessation; ";
				}

        if ($topic_cp_ask == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_cp_ask = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Ask/Advise/Refer; ";
				}

        if ($topic_cp_program == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_cp_program = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Cessation Progams; ";
				}

        if ($topic_coalition == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_coalition = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Coalitons/Advisory Committees/Partnerships; ";
				}

				if ($topic_cap_coalition == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_cap_coalition = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Coalitons; ";
				}

				if ($topic_cap_advisory == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_cap_advisory = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Advisory Committees; ";
				}

				if ($topic_prioritypops == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_prioritypops = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Community Engagement; ";
				}

				if ($topic_pp_cbo == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_pp_cbo = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Community-based Organizations; ";
				}

				if ($topic_pp_thought == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_pp_thought = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Thought Leaders; ";
				}

				if ($topic_genpolicy == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_genpolicy = \"1\" ";
					$topic_or = "1";
					$topic_list .= "General Policy Adoption/Implementation; ";
				}

				if ($topic_materials == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_materials = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Materials/Instrument Testing; ";
				}

				if ($topic_mat_instrument == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_mat_instrument = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Instrument Testing; ";
				}

				if ($topic_mat_materials == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_mat_materials = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Materials Testing; ";
				}

				if ($topic_media == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_media = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Media Activity; ";
				}

				if ($topic_media_mar == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_media_mar = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Media Activity Record; ";
				}

				if ($topic_misc == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_misc = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Miscellaneous; ";
				}

				if ($topic_needsassess == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_needsassess = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Needs Assessment; ";
				}

				if ($topic_log == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_log = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Participation Log/Diversity Matrix; ";
				}

				if ($topic_log_apl == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_log_apl = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Activity Participation Log; ";
				}

				if ($topic_log_cdm == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_log_cdm = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Coalition Diversity Matrix; ";
				}

				if ($topic_photov == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_photov = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Photovoice Activities; ";
				}

				if ($topic_policymaking == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_policymaking = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Policy Making; ";
				}

				if ($topic_pm_min == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_pm_min = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Meeting Minutes/Voting Records; ";
				}

        if ($topic_pm_obs == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_pm_obs = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Meeting Observations; ";
				}

        if ($topic_pm_bios == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_pm_bios = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Member Biographies; ";
				}

        if ($topic_pm_track == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_pm_track = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Policy Tracking Forms; ";
				}

        if ($topic_retail == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_retail = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Retail; ";
				}

        if ($topic_r_ads == "1")
        {

					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_ads = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Advertising/Marketing/Signage; ";
				}

        if ($topic_r_compliance == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_compliance = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Compliance/Enforcement; ";
				}

        if ($topic_r_defs == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_defs = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Definitions; ";
				}

        if ($topic_r_flavors == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_flavors = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Flavored Products; ";
				}

        if ($topic_r_healthy == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_healthy = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Healthy Retail; ";
				}

        if ($topic_r_hshc == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_hshc = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Healthy Stores for a Healthy Community; ";
				}

        if ($topic_r_min == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_min = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Minimum Price/Pack Size; ";
				}

        if ($topic_r_pharm == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_pharm = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Pharmacies; ";
				}

        if ($topic_r_prod == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_prod = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Products; ";
				}

        if ($topic_r_density == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_density = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Retailer Density/Zoning; ";
				}

        if ($topic_r_trl == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_trl = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Tobacco Retail Licensing; ";
				}

        if ($topic_r_youth == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_r_youth = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Youth Access; ";
				}

        if ($topic_shs == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Secondhand Smoke/Smokefree Spaces; ";
				}

        if ($topic_shs_casinos == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_casinos = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Casinos; ";
				}

        if ($topic_shs_care == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_care = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Child and Residential Care Campuses; ";
				}

        if ($topic_shs_college == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_college = \"1\" ";
					$topic_or = "1";
					$topic_list .= "College/School Campuses; ";
				}

        if ($topic_shs_comp == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_comp = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Comprehensive Policies; ";
				}

        if ($topic_shs_entry == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_entry = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Entryways; ";
				}

        if ($topic_shs_events == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_events = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Events; ";
				}

        if ($topic_shs_health == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_health = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Health Care Campuses; ";
				}

        if ($topic_shs_waste == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_waste = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Litter/Tobacco Product Waste; ";
				}

        if ($topic_shs_muh_owner == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_muh_owner = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Multi-unit Housing; ";
				}

        if ($topic_shs_dining == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_dining = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Outdoor Dining; ";
				}

        if ($topic_shs_public == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_public = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Outdoor Public Areas; ";
				}

        if ($topic_shs_rec == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_rec = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Outdoor Recreational Areas; ";
				}

        if ($topic_shs_work == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_work = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Outdoor Worksites; ";
				}

        if ($topic_shs_sponsor == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_sponsor = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Sponsorship; ";
				}

        if ($topic_shs_use_adult == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_use_adult = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Tobacco/Vaping Use; ";
				}

        if ($topic_shs_transport == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_shs_transport = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Transportation (Taxis/Lyft/Uber); ";
				}

        if ($topic_socmedia == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_socmedia = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Social Media/Website Monitoring; ";
				}

        if ($topic_sm_medmon == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_sm_medmon = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Social Media Monitoring; ";
				}

        if ($topic_sm_webmon == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_sm_webmon = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Website Monitoring; ";
				}

        if ($topic_training == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_training = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Training; ";
				}

        if ($topic_other == "1")
				{
					if ($topic_or == "1") $search_topic .= "OR ";
					$search_topic .= "topic_other = \"1\" ";
					$topic_or = "1";
					$topic_list .= "Other; ";
				}


				// build query

				$q_instruments = "SELECT * FROM instrument_database WHERE public_display = \"1\" AND delete_instrument <> \"1\" ";
        if (strlen($search_document) > 0) $q_instruments .= "AND ($search_document) ";
        if (strlen($search_participant) > 0) $q_instruments .= "AND ($search_participant) ";
        if (strlen($search_type) > 0) $q_instruments .= "AND ($search_type) ";
				if (strlen($search_topic) > 0) $q_instruments .= "AND ($search_topic)";
				if (strlen($search_lang) > 0) $q_instruments .= "AND ($search_lang)";
			//	if ($tcec_tested == 1) $q_instruments .= "AND tcec_tested = \"1\" ";

				$q_instruments .= " ORDER BY resource_doc DESC, instrument_title";

//				print "$q_instruments <br>";

				$r_instruments = mysqli_query($link, $q_instruments);

				if (mysqli_num_rows($r_instruments) < 1)
				{
					print "<h2><font color=\"#FF0000\">No resources were found.  Please try again.</font></h2>";
				}
				else
				{

					$instrument_ct = "1";
					$font_color = "#4682b4";
					$tested_tool = "#FF0000";

					print "<h2><strong><font color=\"$font_color\">Instrument Search Results&nbsp;(<font color=\"$tested_tool\">*</font> = Pilot Tested Instrument)</font></strong></h2>";
					//  for Types $type_list and Topics $topic_list and $lang_list Language(s)

					print "<table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"100%\">";

					print "<tr>";
						print "<td valign= \"top\">&nbsp;</td>";
						print "<td valign= \"top\"><strong>Instrument Name</strong></td>";
						print "<td valign= \"top\"><strong>Language</strong></td>";
						print "<td valign= \"top\"><strong>Notes</strong></td>";
						print "<td valign= \"top\"><strong>Click to View</strong></td>";
					print "</tr>";


					while ($row_instruments = mysqli_fetch_array($r_instruments, MYSQLI_ASSOC))
					{

						$show_lang = "";
						$show_notes = "";


						if ($row_instruments[lang_en] == 1) $show_lang = "English ";
						if ($row_instruments[lang_sp] == 1) $show_lang .= "Spanish ";
						if ($row_instruments[lang_other] == 1) $show_lang .= "$row_instruments[lang_other_spec] ";

						if ($row_instruments[type_other_spec]) $show_notes .= "Type: $row_instruments[type_other_spec]<br> ";
						if ($row_instruments[topic_other_spec]) $show_notes .= "Topic: $row_instruments[topic_other_spec]<br> ";
						if ($row_instruments[instrument_content]) $show_notes .= "Content: $row_instruments[instrument_content]) ";

						print "<tr>";
							print "<td valign=\"top\">($instrument_ct)</td>";

							if ($row_instruments[tcec_tested] == 1)
							{
								print "<td valign= \"top\">";
									print "$row_instruments[instrument_title]&nbsp;<font color=\"$tested_tool\">*</font>";
								print "</td>";
							}
							else
							{
								print "<td valign= \"top\">";
									print "$row_instruments[instrument_title]";
								print "</td>";
							}

							print "<td valign=\"top\">";
								print "$show_lang";
							print "</td>";


							print "<td valign=\"top\">";
								// print "$row_instruments[instrument_content]";
								print "$show_notes";
							print "</td>";


							$fileDocLink = "openDoc.php?file_id=$row_instruments[instrument_hash]";

							if ($row_instruments[instrument_hash])
							{
								print "<td valign=\"top\"><a href= \"$fileDocLink\" target= \"_blank\">View Instrument</a></td>" ;
							}
							else
							{
								print "<td valign=\"top\">&nbsp;</td>";
							}

						print "</tr>";

						print "<tr><td colspan = \"5\"><hr color=\"#dee6f2\" /></td></tr>";

						$instrument_ct++;

					} // end while

					print "<tr><td>&nbsp;</td></tr>";
//					print "<tr><td>&nbsp;</td></tr>";

					print "</table>";

				} // end else q_instruments

//				print "<p>&nbsp;</p>";
//				print "<p>&nbsp;</p>";

//				print "<p><a href=\"instrument_lookup.php\">Return to Instrument Lookup Search Criteria</a></p>";


			} // end Find Instruments



			if (!$sub_instrument_lookup)
			{

				print "<form name= \"find_instruments\" method= \"post\" action= \"tcec_instrument_lookup.php\">";
				print "<table border= \"0\" align= \"left\" cellspacing= \"2\" cellpadding= \"4\" width=\"100%\">";


					//2 columns - Instrument Type and Information Source
						// beginning column 1 - Instrument Type
							print "<tr><td valign=\"top\"><table border = \"0\">";

							print "<tr>";
								print "<td colspan= \"2\" class= \"recruit\"><strong>Select Instrument Type(s)</strong></td>";
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

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"type_hist\" value= \"1\" ";
								if ($type_hist == 1) print "checked";
								print ">&nbsp;&nbsp;Organizational History</td>";
							print "</tr>";

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
								print ">&nbsp;&nbsp;Other</td>"; //  (Specify ->) <input type=\"text\" name=\"type_other_spec\" value=\"$type_other_spec\" size=\"50\">
							print "</tr>";

							print "</table></td>";
						// end column 1 - Instrument Type


						// beginning column 2 - Information Source
							print "<td valign=\"top\"><table border=\"0\">";
							print "<tr>";
								print "<td colspan= \"2\" class= \"recruit\"><strong>Information Source/Participant Type(s)</strong></td>";
							print "</tr>";

		//					print "<tr>";
		//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_adult\" value= \"1\" ";
		//						if ($is_adult == 1) print "checked";
		//						print ">&nbsp;&nbsp;Adult</td>";
		//					print "</tr>";

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
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_rural\" value= \"1\" ";
								if ($is_rural == 1) print "checked";
								print ">&nbsp;&nbsp;Rural</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_youth\" value= \"1\" ";
								if ($is_youth == 1) print "checked";
								print ">&nbsp;&nbsp;Youth</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_decmak\" value= \"1\" ";
								if ($is_decmak == 1) print "checked";
								print ">&nbsp;&nbsp;Decision Maker</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_public\" value= \"1\" ";
								if ($is_public == 1) print "checked";
								print ">&nbsp;&nbsp;Public</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"is_owner\" value= \"1\" ";
								if ($is_owner == 1) print "checked";
								print ">&nbsp;&nbsp;Owner/Manager</td>";
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
							print "</table></td></tr>";
						// end column 2 - Information Source

							print "<tr><td>&nbsp;</td></tr>";

							// two columns:  1 for individual flags and the other for language flags
								// beginning 1st column - individual flags
									print "<tr><td><table border=\"0\">";
									print "<tr>";
										print "<td><strong>Document Type</strong></td>";
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

									print "<tr>";
										print "<td colspan=\"1\"><input type= \"checkbox\" name= \"questionbank_doc\" value= \"1\" ";
										if ($questionbank_doc == 1) print "checked";
										print ">&nbsp;&nbsp;Question Bank Documents</td>";
									print "</tr>";

									print "<tr>";
										print "<td colspan=\"1\"><input type= \"checkbox\" name= \"resource_doc\" value= \"1\" ";
										if ($resource_doc == 1) print "checked";
										print ">&nbsp;&nbsp;README Resources</td>";
									print "</tr>";

									print "<tr>";
										print "<td colspan=\"1\"><input type= \"checkbox\" name= \"tcec_tested\" value= \"1\" ";
										if ($tcec_tested == 1) print "checked";
										print ">&nbsp;&nbsp;Pilot Tested Instruments</td>";
									print "</tr>";

									print "</table></td>";
								// end 1st column - invidivual flags

								// beginning 2nd column - Available Translations
									print "<td><table border=\"0\">";
									print "<tr>";
										print "<td colspan=\"1\"><strong>Available Translations</strong></td>";
									print "</tr>";

				//					print "<tr>";
				//						print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_en\" value= \"1\" ";
				//						if ($lang_en == 1) print "checked";
				//						print ">&nbsp;&nbsp;English</td>";
				//					print "</tr>";

									print "<tr>";
										print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_hmong\" value= \"1\" ";
										if ($lang_hmong == 1) print "checked";
										print ">&nbsp;&nbsp;Hmong</td>";
									print "</tr>";

									print "<tr>";
										print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_sp\" value= \"1\" ";
										if ($lang_sp == 1) print "checked";
										print ">&nbsp;&nbsp;Spanish</td>";
									print "</tr>";

									print "<tr>";
										print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_viet\" value= \"1\" ";
										if ($lang_viet == 1) print "checked";
										print ">&nbsp;&nbsp;Vietnamese</td>";
									print "</tr>";

									print "<tr>";
										print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"lang_other\" value= \"1\" ";
										if ($lang_other == 1) print "checked";
										print ">&nbsp;&nbsp;Other</td>"; //  (Specify ->) <input type=\"text\" name=\"lang_other_spec\" value=\"$lang_other_spec\" size=\"50\">
										print "<td>&nbsp;</td>";
									print "</tr>";

									print "<tr><td>&nbsp;</td></tr>";
									print "</table></td></tr>";
								// end 2nd column

									print "<tr><td colspan= \"2\">&nbsp;</td></tr>";


		//					print "<tr><td>&nbsp;</td></tr>";

									print "<tr><td>&nbsp;</td></tr>";



		//					print "<tr><td>&nbsp;</td></tr>";

		//					print "<tr><td>&nbsp;</td></tr>";


							print "<tr>";
								print "<td colspan= \"2\" class= \"recruit\"><strong>Select Instrument Topic(s)</strong></td>";
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
								print ">&nbsp;&nbsp;Cessation Programs</td>";
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
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_cap_partnership\" id= \"topic_cap_partnership\" value= \"1\" ";
								if ($topic_cap_partnership == 1) print "checked";
								print ">&nbsp;&nbsp;Partnerships</td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_prioritypops\" id= \"topic_prioritypops\" value= \"1\" ";
								if ($topic_prioritypops == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Community Engagement</i></strong></td>";
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
								print ">&nbsp;&nbsp;Community-based Organizations</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pp_thought\" id= \"topic_pp_thought\" value= \"1\" ";
								if ($topic_pp_thought == 1) print "checked";
								print ">&nbsp;&nbsp;Thought Leaders</td>";
							print "</tr>";

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

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_genpolicy\" id= \"topic_genpolicy\" value= \"1\" ";
								if ($topic_genpolicy == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>General Policy Adoption/Implementation</i></strong></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_materials\" id= \"topic_materials\" value= \"1\" ";
								if ($topic_materials == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Materials/Instrument Testing</i></strong></td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_mat_instrument\" id= \"topic_mat_instrument\" value= \"1\" ";
								if ($topic_mat_instrument == 1) print "checked";
								print ">&nbsp;&nbsp;Instrument Testing</strong></td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_mat_materials\" id= \"topic_mat_materials\" value= \"1\" ";
								if ($topic_mat_materials == 1) print "checked";
								print ">&nbsp;&nbsp;Materials Testing</td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_media\" id= \"topic_media\" value= \"1\" ";
								if ($topic_media == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Media Activity</i></strong></td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_media_mar\" id= \"topic_media_mar\" value= \"1\" ";
								if ($topic_media_mar == 1) print "checked";
								print ">&nbsp;&nbsp;Media Activity Record</td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_misc\" id= \"topic_misc\" value= \"1\" ";
								if ($topic_misc == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Miscellaneous</i></strong></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_needsassess\" id= \"topic_needsassess\" value= \"1\" ";
								if ($topic_needsassess == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Needs Assessment</i></strong></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_log\" id= \"topic_log\" value= \"1\" ";
								if ($topic_log == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Participation Log/Diversity Matrix</i></strong></td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_log_apl\" id= \"topic_log_apl\" value= \"1\" ";
								if ($topic_log_apl == 1) print "checked";
								print ">&nbsp;&nbsp;Activity Participation Log</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_log_cdm\" id= \"topic_log_cdm\" value= \"1\" ";
								if ($topic_log_cdm == 1) print "checked";
								print ">&nbsp;&nbsp;Coalition Diversity Matrix</td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

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

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_min\" id= \"topic_pm_min\" value= \"1\" ";
								if ($topic_pm_min == 1) print "checked";
								print ">&nbsp;&nbsp;Meeting Minutes/Voting Records</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_obs\" id= \"topic_pm_obs\" value= \"1\" ";
								if ($topic_pm_obs == 1) print "checked";
								print ">&nbsp;&nbsp;Meeting Observations</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_bios\" id= \"topic_pm_bios\" value= \"1\" ";
								if ($topic_pm_bios == 1) print "checked";
								print ">&nbsp;&nbsp;Member Biographies</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_pm_track\" id= \"topic_pm_track\" value= \"1\" ";
								if ($topic_pm_track == 1) print "checked";
								print ">&nbsp;&nbsp;Policy Tracking Forms</td>";
							print "</tr>";

							print "</table></td>";
							// end column 1

							//begin column 2
							print "<td valign=\"top\"><table border=\"0\">";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_retail\" id= \"topic_retail\" value= \"1\" ";
								if ($topic_retail == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Retail</i></strong></td>";
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


							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_socmedia\" id= \"topic_socmedia\" value= \"1\" ";
								if ($topic_socmedia == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Social Media/Website Monitoring</i></strong></td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_sm_medmon\" id= \"topic_sm_medmon\" value= \"1\" ";
								if ($topic_sm_medmon == 1) print "checked";
								print ">&nbsp;&nbsp;Social Media Monitoring</td>";
							print "</tr>";

							print "<tr>";
								print "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= \"checkbox\" name= \"topic_sm_webmon\" id= \"topic_sm_webmon\" value= \"1\" ";
								if ($topic_sm_webmon == 1) print "checked";
								print ">&nbsp;&nbsp;Website Monitoring</td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td><input type= \"checkbox\" name= \"topic_training\" id= \"topic_training\" value= \"1\" ";
								if ($topic_training == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Training</i></strong></td>";
							print "</tr>";

							print "<tr><td>&nbsp;</td></tr>";

							print "<tr>";
								print "<td class= \"recruit\"><input type= \"checkbox\" name= \"topic_other\" id= \"topic_other\" value= \"1\" ";
								if ($topic_other == 1) print "checked";
								print ">&nbsp;&nbsp;<strong><i>Other</td>"; //  (Specify ->) </i></strong> <input type=\"text\" name=\"topic_other_spec\" value=\"$topic_other_spec\" size=\"50\">
							print "</tr>";


							print "</table></td></tr>";
							// end column 2

							print "<tr><td>&nbsp;</td></tr>";



					print "<tr>";
						print "<td align= \"left\"><input type= \"submit\" name= \"sub_instrument\" value= \"Find Instruments\"></td>";
					print "</tr>";

				print "</table>";
				print "</form>";



			} // end Do Not Submit Information


		} // end if $dbok
	} // end if $fp = fopen

	?>


	<script>
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			}
		});
	}
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

    else if ((document.getElementById("topic_cap_coalition").checked==false) && (document.getElementById("topic_cap_partnership").checked==false) && (document.getElementById("topic_cap_advisory").checked==false)){
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

    else if ((document.getElementById("topic_cap_coalition").checked==false) && (document.getElementById("topic_cap_partnership").checked==false) && (document.getElementById("topic_cap_advisory").checked==false)){
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

    else if ((document.getElementById("topic_cap_coalition").checked==false) && (document.getElementById("topic_cap_partnership").checked==false) && (document.getElementById("topic_cap_advisory").checked==false)){
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

    else if (document.getElementById("topic_media_mar").checked==false){
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
  document.getElementById("topic_pm_min").addEventListener('change', function(event) {

    if (document.getElementById("topic_pm_min").checked==true){
        document.getElementById("topic_policymaking").checked=true;
    }

    else if ((document.getElementById("topic_pm_min").checked==false) && (document.getElementById("topic_pm_obs").checked==false)
    && (document.getElementById("topic_pm_bios").checked==false) && (document.getElementById("topic_pm_track").checked==false)){
        document.getElementById("topic_policymaking").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_policymaking */
  document.getElementById("topic_pm_obs").addEventListener('change', function(event) {

    if (document.getElementById("topic_pm_obs").checked==true){
        document.getElementById("topic_policymaking").checked=true;
    }

    else if ((document.getElementById("topic_pm_min").checked==false) && (document.getElementById("topic_pm_obs").checked==false)
    && (document.getElementById("topic_pm_bios").checked==false) && (document.getElementById("topic_pm_track").checked==false)){
        document.getElementById("topic_policymaking").checked=false;
    }

  });

  </script>

  <script type="text/javascript">

  /*topic_policymaking */
  document.getElementById("topic_pm_bios").addEventListener('change', function(event) {

    if (document.getElementById("topic_pm_bios").checked==true){
        document.getElementById("topic_policymaking").checked=true;
    }

    else if ((document.getElementById("topic_pm_min").checked==false) && (document.getElementById("topic_pm_obs").checked==false)
    && (document.getElementById("topic_pm_bios").checked==false) && (document.getElementById("topic_pm_track").checked==false)){
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

    else if ((document.getElementById("topic_pm_min").checked==false) && (document.getElementById("topic_pm_obs").checked==false)
    && (document.getElementById("topic_pm_bios").checked==false) && (document.getElementById("topic_pm_track").checked==false)){
        document.getElementById("topic_policymaking").checked=false;
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
    && (document.getElementById("topic_r_defs").checked==false) && (document.getElementById("topic_r_flavors").checked==false)
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
