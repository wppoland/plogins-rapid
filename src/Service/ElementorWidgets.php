<?php
/**
 * Elementor integration service.
 *
 * Registers the Rapid Elementor widget(s). The `elementor/widgets/register`
 * action only fires when Elementor is active, so this service is self-guarding:
 * nothing loads unless Elementor is present. Works on both Elementor 3.x and
 * 4.0 (the `register()` manager method has been stable across both).
 *
 * @package Rapid\Service
 */

declare(strict_types=1);

namespace Rapid\Service;

defined('ABSPATH') || exit;

use Rapid\Contract\HasHooks;
use Rapid\Elementor\RapidOrderWidget;

/**
 * Wires the Rapid widgets into the Elementor editor.
 */
final class ElementorWidgets implements HasHooks
{
    /**
     * Register WordPress hooks.
     */
    public function registerHooks(): void
    {
        add_action('elementor/widgets/register', [$this, 'register']);
    }

    /**
     * Register widget instances with Elementor's widgets manager.
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register($widgets_manager): void
    {
        // Loaded here (not autoloaded) so \Elementor\Widget_Base always exists.
        require_once __DIR__ . '/../Elementor/RapidOrderWidget.php';
        $widgets_manager->register(new RapidOrderWidget());
    }
}
