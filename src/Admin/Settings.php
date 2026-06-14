<?php

declare(strict_types=1);

namespace Rapid\Admin;

defined('ABSPATH') || exit;

use Rapid\Contract\HasHooks;

/**
 * Admin settings page registered as a WooCommerce submenu.
 *
 * Stores everything in the `rapid_settings` option (array): the master toggle,
 * product scope (all / selected categories), the selected category IDs, the
 * storefront category-filter toggle, which columns are shown (image / SKU /
 * price / stock) and the search results-per-page. All output is escaped; all
 * input is sanitised and clamped on save.
 */
final class Settings implements HasHooks
{
    private const OPTION = 'rapid_settings';
    private const PAGE   = 'rapid-settings';
    private const GROUP  = 'rapid_settings_group';

    private const SCOPES = ['all', 'categories'];

    /** Search results-per-page bounds for the admin number field. */
    private const MIN_PER_PAGE = 1;
    private const MAX_PER_PAGE = 50;

    /** Incremented to give each inline-help control a unique id/anchor. */
    private int $helpSeq = 0;

    public function registerHooks(): void
    {
        add_action('admin_menu', [$this, 'addMenuPage']);
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    public function enqueueAssets(string $hook): void
    {
        if ('woocommerce_page_' . self::PAGE !== $hook) {
            return;
        }

        wp_enqueue_style(
            'rapid-admin',
            RAPID_URL . 'assets/css/admin.css',
            [],
            \Rapid\VERSION,
        );

        wp_enqueue_script(
            'rapid-admin',
            RAPID_URL . 'assets/js/admin.js',
            [],
            \Rapid\VERSION,
            ['in_footer' => true, 'strategy' => 'defer'],
        );
    }

    public function addMenuPage(): void
    {
        add_submenu_page(
            'woocommerce',
            __('Rapid — Quick Order Form', 'rapid'),
            __('Rapid', 'rapid'),
            'manage_woocommerce',
            self::PAGE,
            [$this, 'renderPage'],
        );
    }

    public function registerSettings(): void
    {
        register_setting(
            self::GROUP,
            self::OPTION,
            [
                'type'              => 'array',
                'sanitize_callback' => [$this, 'sanitize'],
            ],
        );

        // The menu uses manage_woocommerce; align the options.php save capability
        // so shop managers (not just admins with manage_options) can save.
        add_filter(
            'option_page_capability_' . self::GROUP,
            static fn (): string => 'manage_woocommerce',
        );
    }

    public function renderPage(): void
    {
        if (! current_user_can('manage_woocommerce')) {
            return;
        }

        $settings   = $this->settings();
        $scope      = (string) ($settings['scope'] ?? 'all');
        $selected   = array_map('absint', (array) ($settings['categories'] ?? []));
        $categories = $this->productCategories();
        ?>
        <div class="wrap rapid-admin">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

            <div class="rapid-intro">
                <h2><?php esc_html_e('A fast bulk order form for your shop', 'rapid'); ?></h2>
                <p>
                    <?php
                    printf(
                        /* translators: %s: shortcode wrapped in <code>. */
                        esc_html__('Drop %s into any page to let customers search products by name or SKU, set quantities and add many to the cart in one click — perfect for B2B, wholesale and reorders.', 'rapid'),
                        '<code>[rapid_order]</code>',
                    );
                    ?>
                </p>
            </div>

            <form method="post" action="options.php">
                <?php settings_fields(self::GROUP); ?>

                <div class="rapid-card">
                    <h2><?php esc_html_e('General', 'rapid'); ?></h2>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <?php esc_html_e('Enable quick order', 'rapid'); ?>
                                    <?php $this->help(__('The master switch. When off, the [rapid_order] shortcode renders nothing and its assets are not loaded — zero front-end impact.', 'rapid')); ?>
                                </th>
                                <td>
                                    <label for="rapid_enabled">
                                        <input
                                            type="checkbox"
                                            id="rapid_enabled"
                                            name="<?php echo esc_attr(self::OPTION); ?>[enabled]"
                                            value="1"
                                            <?php checked((bool) ($settings['enabled'] ?? false), true); ?>
                                        />
                                        <?php esc_html_e('Show the quick order form on the storefront.', 'rapid'); ?>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="rapid-card">
                    <h2><?php esc_html_e('Product scope', 'rapid'); ?></h2>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <label for="rapid_scope"><?php esc_html_e('Which products?', 'rapid'); ?></label>
                                    <?php $this->help(__('Choose whether the form offers every purchasable product, or only those in the categories you pick below.', 'rapid')); ?>
                                </th>
                                <td>
                                    <select
                                        id="rapid_scope"
                                        class="rapid-scope-select"
                                        name="<?php echo esc_attr(self::OPTION); ?>[scope]"
                                    >
                                        <option value="all" <?php selected($scope, 'all'); ?>>
                                            <?php esc_html_e('All products', 'rapid'); ?>
                                        </option>
                                        <option value="categories" <?php selected($scope, 'categories'); ?>>
                                            <?php esc_html_e('Selected categories only', 'rapid'); ?>
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr
                                class="rapid-categories-row"
                                <?php echo 'categories' === $scope ? '' : 'data-hidden="1"'; ?>
                            >
                                <th scope="row">
                                    <?php esc_html_e('Categories', 'rapid'); ?>
                                    <?php $this->help(__('Tick the product categories the form should cover. Only used when scope is "Selected categories only".', 'rapid')); ?>
                                </th>
                                <td>
                                    <?php if ([] === $categories) : ?>
                                        <p class="description"><?php esc_html_e('No product categories found yet.', 'rapid'); ?></p>
                                    <?php else : ?>
                                        <fieldset class="rapid-categories">
                                            <legend class="screen-reader-text"><?php esc_html_e('Product categories', 'rapid'); ?></legend>
                                            <?php foreach ($categories as $rapid_term) : ?>
                                                <label class="rapid-category">
                                                    <input
                                                        type="checkbox"
                                                        name="<?php echo esc_attr(self::OPTION); ?>[categories][]"
                                                        value="<?php echo esc_attr((string) $rapid_term->term_id); ?>"
                                                        <?php checked(in_array((int) $rapid_term->term_id, $selected, true), true); ?>
                                                    />
                                                    <?php echo esc_html($rapid_term->name); ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </fieldset>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                            $this->checkboxRow(
                                'show_category_filter',
                                __('Category filter', 'rapid'),
                                __('Show a category dropdown on the form so customers can narrow results.', 'rapid'),
                                $settings,
                                __('Adds a category selector above the table. In "Selected categories" scope it lists only your chosen categories.', 'rapid'),
                            );
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="rapid-card">
                    <h2><?php esc_html_e('Columns', 'rapid'); ?></h2>
                    <p class="description"><?php esc_html_e('Choose which columns appear in the order table. Product name and quantity are always shown.', 'rapid'); ?></p>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <?php
                            $this->checkboxRow('show_image', __('Image', 'rapid'), __('Show a product thumbnail.', 'rapid'), $settings, __('Displays a small product image. Turn off for a denser, faster table.', 'rapid'));
                            $this->checkboxRow('show_sku', __('SKU', 'rapid'), __('Show the product SKU.', 'rapid'), $settings, __('Helpful for trade and wholesale buyers who order by code.', 'rapid'));
                            $this->checkboxRow('show_price', __('Price', 'rapid'), __('Show the product price.', 'rapid'), $settings, __('Shows each product\'s price (including any sale price) in the table.', 'rapid'));
                            $this->checkboxRow('show_stock', __('Stock', 'rapid'), __('Show stock availability.', 'rapid'), $settings, __('Shows a short stock label so buyers know what is available before ordering.', 'rapid'));
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="rapid-card">
                    <h2><?php esc_html_e('Search', 'rapid'); ?></h2>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <label for="rapid_per_page"><?php esc_html_e('Results per page', 'rapid'); ?></label>
                                    <?php $this->help(__('How many products to show per search. Keep it modest for snappy results on large catalogues.', 'rapid')); ?>
                                </th>
                                <td>
                                    <input
                                        type="number"
                                        min="<?php echo esc_attr((string) self::MIN_PER_PAGE); ?>"
                                        max="<?php echo esc_attr((string) self::MAX_PER_PAGE); ?>"
                                        step="1"
                                        id="rapid_per_page"
                                        name="<?php echo esc_attr(self::OPTION); ?>[per_page]"
                                        value="<?php echo esc_attr((string) (int) ($settings['per_page'] ?? 12)); ?>"
                                        class="small-text"
                                    />
                                    <p class="description">
                                        <?php
                                        printf(
                                            /* translators: 1: minimum, 2: maximum */
                                            esc_html__('Between %1$d and %2$d.', 'rapid'),
                                            (int) self::MIN_PER_PAGE,
                                            (int) self::MAX_PER_PAGE,
                                        );
                                        ?>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    /**
     * Render an accessible inline-help affordance: a "?" button that toggles a
     * popover describing the adjacent setting. Uses the native Popover API and is
     * also wired via aria-describedby for screen readers.
     */
    private function help(string $text): void
    {
        $id = 'rapid-help-' . (++$this->helpSeq);
        ?>
        <button
            type="button"
            class="rapid-help"
            aria-label="<?php esc_attr_e('More information', 'rapid'); ?>"
            aria-describedby="<?php echo esc_attr($id); ?>"
            aria-expanded="false"
            popovertarget="<?php echo esc_attr($id); ?>"
        >?</button>
        <div id="<?php echo esc_attr($id); ?>" class="rapid-tip" role="tooltip" popover hidden>
            <?php echo esc_html($text); ?>
        </div>
        <?php
    }

    /**
     * Render a single checkbox row in the form-table.
     *
     * @param array<string, mixed> $settings
     */
    private function checkboxRow(string $key, string $label, string $help, array $settings, string $tip = ''): void
    {
        $id = 'rapid_' . $key;
        ?>
        <tr>
            <th scope="row">
                <?php echo esc_html($label); ?>
                <?php if ('' !== $tip) { $this->help($tip); } ?>
            </th>
            <td>
                <label for="<?php echo esc_attr($id); ?>">
                    <input
                        type="checkbox"
                        id="<?php echo esc_attr($id); ?>"
                        name="<?php echo esc_attr(self::OPTION); ?>[<?php echo esc_attr($key); ?>]"
                        value="1"
                        <?php checked((bool) ($settings[$key] ?? false), true); ?>
                    />
                    <?php echo esc_html($help); ?>
                </label>
            </td>
        </tr>
        <?php
    }

    /**
     * Sanitises, validates and clamps the submitted settings before save.
     *
     * @param mixed $raw
     * @return array<string, mixed>
     */
    public function sanitize(mixed $raw): array
    {
        if (! is_array($raw)) {
            $raw = [];
        }

        $scope = isset($raw['scope']) ? sanitize_key((string) $raw['scope']) : 'all';

        if (! in_array($scope, self::SCOPES, true)) {
            $scope = 'all';
        }

        $categories = [];

        if (isset($raw['categories']) && is_array($raw['categories'])) {
            foreach ($raw['categories'] as $id) {
                $id = absint($id);
                if ($id > 0) {
                    $categories[] = $id;
                }
            }
            $categories = array_values(array_unique($categories));
        }

        $perPage = isset($raw['per_page']) ? (int) $raw['per_page'] : 12;
        $perPage = max(self::MIN_PER_PAGE, min(self::MAX_PER_PAGE, $perPage));

        $sanitized = [
            'enabled'              => ! empty($raw['enabled']),
            'scope'                => $scope,
            'categories'           => $categories,
            'show_category_filter' => ! empty($raw['show_category_filter']),
            'show_image'           => ! empty($raw['show_image']),
            'show_sku'             => ! empty($raw['show_sku']),
            'show_price'           => ! empty($raw['show_price']),
            'show_stock'           => ! empty($raw['show_stock']),
            'per_page'             => $perPage,
        ];

        return (array) apply_filters('rapid_sanitize_settings', $sanitized, $raw);
    }

    /**
     * Product categories for the scope picker.
     *
     * @return array<int, \WP_Term>
     */
    private function productCategories(): array
    {
        $terms = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'orderby'    => 'name',
        ]);

        return is_array($terms)
            ? array_values(array_filter($terms, static fn ($t): bool => $t instanceof \WP_Term))
            : [];
    }

    /**
     * Stored settings merged over packaged defaults.
     *
     * @return array<string, mixed>
     */
    private function settings(): array
    {
        $stored = get_option(self::OPTION, []);

        if (! is_array($stored)) {
            $stored = [];
        }

        /** @var array<string, mixed> $defaults */
        $defaults = require RAPID_DIR . 'config/defaults.php';

        return array_merge($defaults, $stored);
    }
}
