<?php
/**
* phpBB Extension - marttiphpbb Calendar Auto Archive
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarautoarchive\util;

class cnst
{
	const FOLDER = 'marttiphpbb/calendarautoarchive';
	const ID = 'marttiphpbb_calendarautoarchive';
	const PREFIX = self::ID . '_';
	const DAYS = self::ID . '_days';
	const LAST_RUN = self::ID . '_last_run';
	const L = 'MARTTIPHPBB_CALENDARAUTOARCHIVE';
	const L_ACP = 'ACP_' . self::L;
	const L_MCP = 'MCP_' . self::L;
	const TPL = '@' . self::ID . '/';
}
