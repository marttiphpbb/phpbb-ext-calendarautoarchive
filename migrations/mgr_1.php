<?php
/**
* phpBB Extension - marttiphpbb Calendar Auto Archive
* @copyright (c) 2018 - 2019 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarautoarchive\migrations;
use marttiphpbb\calendarautoarchive\util\cnst;

class mgr_1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\phpbb\db\migration\data\v32x\v321',
		];
	}

	public function update_data()
	{
		return [
			['config.add', [cnst::DAYS, 1]],
			['config.add', [cnst::LAST_RUN, 0, true]],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				cnst::L_ACP,
			]],

			['module.add', [
				'acp',
				cnst::L_ACP,
				[
					'module_basename'	=> '\marttiphpbb\calendarautoarchive\acp\main_module',
					'modes'				=> [
						'settings',
					],
				],
			]],
		];
	}
}
