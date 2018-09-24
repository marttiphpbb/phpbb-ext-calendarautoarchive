<?php

/**
* phpBB Extension - marttiphpbb Calendar Auto Archive
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [

	'ACP_MARTTIPHPBB_CALENDARAUTOARCHIVE_SETTING_SAVED'
		=> 'The setting was saved.',
	'ACP_MARTTIPHPBB_CALENDARAUTOARCHIVE_DAYS'
		=> 'Days',
	'ACP_MARTTIPHPBB_CALENDARAUTOARCHIVE_DAYS_EXPLAIN'
		=> 'Newly registered users that were never activated will be
		deleted by a cron task after this amount of days.',
]);
