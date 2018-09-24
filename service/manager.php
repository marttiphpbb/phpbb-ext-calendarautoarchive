<?php

/**
* phpBB Extension - marttiphpbb Calendar Auto Archive
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarautoarchive\service;

use phpbb\event\dispatcher;
use phpbb\db\driver\driver_interface as db;
use phpbb\config\config;
use phpbb\user;
use phpbb\log\log;
use marttiphpbb\calendarautoarchive\util\cnst;

class manager
{
	protected $db;
	protected $config;
	protected $user;
	protected $log;
	protected $users_table;
	protected $phpbb_root_path;
	protected $dispatcher;

	public function __construct(
		db $db,
		config $config,
		user $user,
		log $log,
		string $users_table,
		string $phpbb_root_path,
		dispatcher $dispatcher
	)
	{
		$this->db = $db;
		$this->config = $config;
		$this->user = $user;
		$this->log = $log;
		$this->users_table = $users_table;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->dispatcher = $dispatcher;
	}

	public function run()
	{
		$archive_id = 0;

		/**
		 * Event to get the id of the archive forum
		 *
		 * @event marttiphpbb.calendarautoarchive.get_archive_id
		 * @var int 	archive_id		id of the archive forum
		 */
		$vars = ['archive_id'];
		extract($this->dispatcher->trigger_event('marttiphpbb.calendarautoarchive.get_archive_id', compact($vars)));

		if (!$archive_id)
		{
			error_log('no archive id found');
			return;
		}

		$ref_jd = unixtojd() - $this->config[cnst::DAYS] + 1;
		$ignore_forum_id = $archive_id;
		$events = [];

		/**
		 * Event to get the calendar events before ref_jd
		 *
		 * @event marttiphpbb.calendarautoarchive.get_events
		 * @var array	events
		 * @var int 	ref_jd
		 * @var int 	ignore_forum_id
		 */
		$vars = ['events', 'ref_jd', 'ignore_forum_id'];
		extract($this->dispatcher->trigger_event('marttiphpbb.calendarautoarchive.get_events', compact($vars)));

		if (!count($events))
		{
			error_log('no calendar events to be archived.');
			return;
		}

		$topic_ids = $topics = [];

		foreach ($events as $event)
		{
			$topic_ids[] = $event['topic_id'];
			$topic_titles[] = $event['topic_title'];
		}

		if (!function_exists('move_topics'))
		{
			require_once $this->phpbb_root_path . 'includes/functions_admin.php';
		}

		move_topics($topic_ids, $archive_id);

		$this->log->add(
			'admin',
			$user->data['user_id'],
			$user->ip,
			'LOG_MARTTIPHPBB_CALENDARAUTOARCHIVE',
			false,
			[implode(', ', $topic_titles)]);
	}
}
