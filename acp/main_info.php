<?php
/**
* phpBB Extension - marttiphpbb calendarautoarchive
* @copyright (c) 2018 - 2019 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarautoarchive\acp;

use marttiphpbb\calendarautoarchive\util\cnst;

class main_info
{
	function module()
	{
		return [
			'filename'	=> '\marttiphpbb\calendarautoarchive\acp\main_module',
			'title'		=> cnst::L_ACP,
			'modes'		=> [
				'settings'	=> [
					'title'	=> cnst::L_ACP . '_SETTINGS',
					'auth'	=> 'ext_marttiphpbb/calendarautoarchive && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
			],
		];
	}
}
