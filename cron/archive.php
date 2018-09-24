<?php
/**
* phpBB Extension - marttiphpbb Calendar Auto Archive
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarautoarchive\cron;

use phpbb\cron\task\base;
use phpbb\config\config;
use marttiphpbb\calendarautoarchive\service\manager;
use marttiphpbb\calendarautoarchive\util\cnst;

class archive extends base
{
	protected $config;
	protected $manager;

	public function __construct(
		config $config,
		manager $manager
	)
	{
		$this->config = $config;
		$this->manager = $manager;
	}

	public function run()
	{
		$this->manager->run();
		$this->config->set(cnst::LAST_RUN, time(), false);
	}

	public function is_runnable()
	{
		return $this->config[cnst::DAYS] > 0;
	}

	public function should_run()
	{
		// every 4 hours
		return $this->config[cnst::LAST_RUN] < (time() - 14400);
	}
}
