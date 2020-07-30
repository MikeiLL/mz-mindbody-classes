<?php

/**
 * MZ_Mindbody_Classes
 *
 * @package   MZ_Mindbody_Classes
 * @author    Mike iLL <mike@mzoo.org>
 * @copyright 2020 mZoo.org
 * @license   GPL 2.0+
 * @link      http://mzoo.org
 */
namespace MZ_Mindbody_Classes\Integrations;

use \MZ_Mindbody_Classes\Engine;
use \CronPlus as CronPlus;

/**
 * The various Cron of this plugin
 */
class Cron extends Engine\Base {

	/**
	 * Initialize the class.
	 *
	 * @return void
	 */
	public function initialize() {
		/*
		 * Load CronPlus
		 */
		$args = array(
			'recurrence'       => 'hourly',
			'schedule'         => 'schedule',
			'name'             => 'hourly_cron',
			'cb'               => array( $this, 'hourly_cron' ),
			'plugin_root_file' => 'mz-mindbody-classes.php',
		);

		$cronplus = new CronPlus( $args );
        // Schedule the event
		$cronplus->schedule_event();
        // Remove the event by the schedule
        // $cronplus->clear_schedule_by_hook();
        // Jump the scheduled event
        // $cronplus->unschedule_specific_event();
	}

	/**
	 * Cron Hourly example
	 *
	 * @since 1.0.0
	 *
	 * @param integer $id The ID.
	 *
	 * @return void
	 */
	public function hourly_cron( $job_id ) {
		echo esc_html( $job_id );
	}

}

