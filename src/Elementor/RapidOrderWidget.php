<?php
/**
 * Elementor widget: Rapid Order Form.
 *
 * A thin wrapper around the [rapid_order] shortcode so the quick-order form can
 * be placed with the Elementor editor. Kept deliberately minimal (renders the
 * shortcode) so a future migration to Elementor v4 atomic widgets stays
 * localized to this class. Loaded only from the `elementor/widgets/register`
 * hook, so the `\Elementor\Widget_Base` base class is guaranteed to exist here.
 *
 * @package Rapid\Elementor
 */

declare(strict_types=1);

namespace Rapid\Elementor;

defined('ABSPATH') || exit;

use Elementor\Widget_Base;

/**
 * Rapid Order Form Elementor widget.
 */
final class RapidOrderWidget extends Widget_Base
{
    /**
     * Widget machine name (matches the shortcode tag).
     */
    public function get_name(): string
    {
        return 'rapid_order';
    }

    /**
     * Widget label shown in the editor.
     */
    public function get_title(): string
    {
        return esc_html__('Rapid Order Form', 'plogins-rapid');
    }

    /**
     * Editor panel icon.
     */
    public function get_icon(): string
    {
        return 'eicon-form-horizontal';
    }

    /**
     * Editor panel categories.
     *
     * @return string[]
     */
    public function get_categories(): array
    {
        return ['woocommerce-elements', 'general'];
    }

    /**
     * Search keywords in the editor.
     *
     * @return string[]
     */
    public function get_keywords(): array
    {
        return ['rapid', 'order', 'quick order', 'bulk', 'cart', 'woocommerce'];
    }

    /**
     * Register the editor controls.
     */
    protected function register_controls(): void
    {
        $this->start_controls_section(
            'content',
            ['label' => esc_html__('Rapid order form', 'plogins-rapid')]
        );

        $this->add_control(
            'info',
            [
                'type'            => \Elementor\Controls_Manager::RAW_HTML,
                'raw'             => esc_html__('This block renders the Rapid quick-order form. It has no options here — configure it under WooCommerce settings.', 'plogins-rapid'),
                'content_classes' => 'elementor-descriptor',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget on the front end and in the editor preview.
     */
    protected function render(): void
    {
        echo do_shortcode('[rapid_order]');
    }
}
