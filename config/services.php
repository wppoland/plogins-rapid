<?php
/**
 * Service wiring. Returns a closure that registers every service in the
 * container. Services are thin and self-contained — this plugin has no external
 * runtime dependencies.
 *
 * @package Rapid
 */

declare(strict_types=1);

use Rapid\Admin\Settings;
use Rapid\Container;
use Rapid\Migrator;
use Rapid\Service\ElementorWidgets;
use Rapid\Service\OrderForm;

defined('ABSPATH') || exit;

return static function (Container $c): void {
    $c->singleton(Migrator::class, static fn (): Migrator => new Migrator());

    // Storefront: the [rapid_order] quick-order form, AJAX product search and
    // the batched add-to-cart handler.
    $c->singleton(OrderForm::class, static fn (): OrderForm => new OrderForm());

    // Elementor integration (self-guards on the elementor/widgets/register hook).
    $c->singleton(ElementorWidgets::class, static fn (): ElementorWidgets => new ElementorWidgets());

    // Admin (only needed in wp-admin context).
    if (is_admin()) {
        $c->singleton(Settings::class, static fn (): Settings => new Settings());
    }
};
