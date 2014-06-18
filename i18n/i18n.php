<?php
	// include i18n class and initialize it
	require_once 'i18n.class.php';
	$i18n = new i18n( I18N_LANG . DS . 'lang_{LANGUAGE}.ini', I18N_LANG_CACHE, 'pt' );
	// Parameters: language file path, cache dir, default language (all optional)

	$i18n->setForcedLang('en'); // force english, even if another user language is available

	// init object: load language files, parse them if not cached, and so on.
	$i18n->init();
	
	//echo $i18n->getAppliedLang();
	//echo $i18n->getCachePath();
	
	/* 
	-- get applied language 
	<p>Applied Language: <?php echo $i18n->getAppliedLang(); ?> </p>
	
	-- get the cache path 
	<p>Cache path: <?php echo $i18n->getCachePath(); ?></p>
	
	-- Get some greetings 
	<p>A greeting: <?php echo L::greeting; ?></p>
	<p>Something other: <?php echo L::category_somethingother; ?></p><!-- normally sections in the ini are seperated with an underscore like here. 
	*/