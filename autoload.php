<?php
/**
 * Autoloading: prefer Composer's vendor autoloader (the optimized classmap).
 * Fall back to a minimal PSR-4 autoloader so the plugin still boots if vendor/
 * is somehow absent. This plugin is self-contained — it has no runtime Composer
 * dependencies.
 *
 * @package Rapid
 */

declare(strict_types=1);

namespace Rapid;

defined('ABSPATH') || exit;

$rapid_composer = __DIR__ . '/vendor/autoload.php';
if (is_readable($rapid_composer)) {
    require_once $rapid_composer;
    return;
}

spl_autoload_register(static function (string $class): void {
    $prefix  = 'Rapid\\';
    $baseDir = __DIR__ . '/src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative = substr($class, $len);
    $file     = $baseDir . str_replace('\\', '/', $relative) . '.php';
    if (is_readable($file)) {
        require_once $file;
    }
});
