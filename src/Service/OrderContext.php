<?php

declare(strict_types=1);

namespace Rapid\Service;

defined('ABSPATH') || exit;

/**
 * Visitor context for quick-order forms and PRO role overrides.
 */
final class OrderContext
{
    /**
     * @return array{user_id: int, role: string, roles: list<string>}
     */
    public static function current(): array
    {
        if (! is_user_logged_in()) {
            return [
                'user_id' => 0,
                'role'    => 'guest',
                'roles'   => ['guest'],
            ];
        }

        $user  = wp_get_current_user();
        $roles = array_values(array_filter(array_map('sanitize_key', (array) $user->roles)));

        if ([] === $roles) {
            $roles = ['guest'];
        }

        return [
            'user_id' => (int) $user->ID,
            'role'    => $roles[0],
            'roles'   => $roles,
        ];
    }
}
