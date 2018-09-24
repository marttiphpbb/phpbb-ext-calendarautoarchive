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
		=> 'Move topics to the Archive Forum after the last Calendar event
		after this amount of days.',

	'ACP_MARTTIPHPBB_CALENDARAUTOARCHIVE_ARCHIVEFORUM_NOT_ENABLED'
		=> 'The %1$sArchive Forum extension%2$s should be installed
		for this extension to work.',
	'ACP_MARTTIPHPBB_CALENDARAUTOARCHIVE_CALENDAR_STORAGE_NOT_ENABLED'
		=> 'The %1$sCalendar Mono%2$s or %3$sCalendar Poly%4$s extension should be installed
		for this extension to work.',
]);
