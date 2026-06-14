<?php
/**
 * Boot order: services listed here are resolved from the container and have
 * their registerHooks() called during Plugin::boot(). Each must implement
 * Rapid\Contract\HasHooks.
 *
 * @package Rapid
 *
 * @return array<class-string>
 */

declare(strict_types=1);

use Rapid\Admin\Settings;
use Rapid\Service\OrderForm;

defined('ABSPATH') || exit;

return is_admin()
    ? [
        OrderForm::class,
        Settings::class,
    ]
    : [
        OrderForm::class,
    ];
