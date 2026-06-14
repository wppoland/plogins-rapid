<?php
/**
 * Constants needed by PHPStan to analyse the plugin without bootstrapping
 * WordPress or running the main plugin file.
 *
 * @package Rapid
 */

declare(strict_types=1);

namespace {
    if (! defined('ABSPATH')) {
        define('ABSPATH', '/tmp/wordpress/');
    }
    if (! defined('RAPID_DIR')) {
        define('RAPID_DIR', '/tmp/rapid/');
    }
    if (! defined('RAPID_URL')) {
        define('RAPID_URL', 'https://example.test/wp-content/plugins/rapid/');
    }
}

namespace Rapid {
    if (! defined('Rapid\\VERSION')) {
        define('Rapid\\VERSION', '0.1.0');
    }
    if (! defined('Rapid\\PLUGIN_FILE')) {
        define('Rapid\\PLUGIN_FILE', '/tmp/rapid/rapid.php');
    }
}
