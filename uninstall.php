<?php
/**
 * Uninstall cleanup for Rapid.
 *
 * Runs when the plugin is deleted from wp-admin. Removes the plugin's options.
 * No content is created by this plugin, so there is nothing else to clean up.
 *
 * @package Rapid
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

delete_option('rapid_settings');
delete_option('rapid_db_version');
