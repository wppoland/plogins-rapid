<?php
/**
 * Uninstall cleanup for Rapid.
 *
 * Runs when the plugin is deleted from wp-admin. Removes the plugin's options
 * and the per-user dismissal of the PRO banner. No content is created by this
 * plugin, so there is nothing else to clean up.
 *
 * @package Rapid
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

delete_option('rapid_settings');
delete_option('rapid_db_version');

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'rapid_pro_banner_dismissed', '', true);
