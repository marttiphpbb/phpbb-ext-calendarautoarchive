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

	'ACP_MARTTIPHPBB_CALENDARAUTOARCHIVE'			=> 'Calendar Auto Archive',
	'ACP_MARTTIPHPBB_CALENDARAUTOARCHIVE_SETTINGS'	=> 'Settings',
]);
