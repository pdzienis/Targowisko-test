<?php
/************************************************************************
 * The script of website with announcements NOTICE2
 * Copyright (c) 2017 - 2018 Kamil Wyremski
 * http://wyremski.pl
 * kamil.wyremski@gmail.com
 * 
 * All right reserved
 * 
 * *********************************************************************
 * THIS SOFTWARE IS LICENSED - YOU CAN MODIFY THESE FILES
 * BUT YOU CAN NOT REMOVE OF ORIGINAL COMMENTS!
 * ACCORDING TO THE LICENSE YOU CAN USE THE SCRIPT ON ONE DOMAIN. DETECTION
 * COPY SCRIPT WILL RESULT IN A HIGH FINANSIAL PENALTY AND WITHDRAWAL
 * LICENSE THE SCRIPT
 * *********************************************************************/
 
if(!isset($settings['base_url'])){
	die('Access denied!');
}

if($admin->is_logged()){

	if(!_ADMIN_TEST_MODE_ and isset($_POST['action']) and $_POST['action']=='save_settings_ads' and checkToken('admin_save_settings_ads')){
		
		$sth = $db->prepare('UPDATE `'._DB_PREFIX_.'settings` SET value=:value WHERE name=:name limit 1');

		$sth->bindValue(':value', $_POST['ads_1'], PDO::PARAM_STR);
		$sth->bindValue(':name', 'ads_1', PDO::PARAM_STR);
		$sth->execute();
		$sth->bindValue(':value', $_POST['ads_2'], PDO::PARAM_STR);
		$sth->bindValue(':name', 'ads_2', PDO::PARAM_STR);
		$sth->execute();
		$sth->bindValue(':value', $_POST['ads_3'], PDO::PARAM_STR);
		$sth->bindValue(':name', 'ads_3', PDO::PARAM_STR);
		$sth->execute();
		$sth->bindValue(':value', $_POST['ads_4'], PDO::PARAM_STR);
		$sth->bindValue(':name', 'ads_4', PDO::PARAM_STR);
		$sth->execute();
		$sth->bindValue(':value', $_POST['ads_side_1'], PDO::PARAM_STR);
		$sth->bindValue(':name', 'ads_side_1', PDO::PARAM_STR);
		$sth->execute();
		$sth->bindValue(':value', $_POST['ads_side_2'], PDO::PARAM_STR);
		$sth->bindValue(':name', 'ads_side_2', PDO::PARAM_STR);
		$sth->execute();
		
		getSettings();
		$render_variables['alert_success'][] = lang('Changes have been saved');
	}
	
	$title = lang('Ads settings').' - '.$title_default;
}

