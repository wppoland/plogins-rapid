<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-rapid-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Rapid Pro',
    'url'        => 'https://plogins.com/plogins-rapid-pro/pricing/',
    'sellable'   => true,
    'price_from' => 29,
    'currency'   => 'EUR',
    'price_pln'  => 129,
    'lead'       => [
        'en' => 'The 0.4.0 release completes the Track 3 roadmap with per-role order forms.',
        'pl' => 'Wydanie 0.4.0 uzupełnia roadmapę Track 3 o formularze per rola.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'CSV / paste import', 'desc' => 'Paste SKU and quantity lines via [rapid_bulk_paste] and add everything to the cart in one submit.'],
            'pl' => ['title' => 'Zapisane listy zamówień', 'desc' => 'Zapisz wklejone linie SKU jako nazwaną listę i wczytaj ją przy kolejnym zamówieniu hurtowym.'],
        ],
        [
            'en' => ['title' => 'Saved order lists', 'desc' => 'Logged-in customers save named SKU lists, reload them into the paste box, and delete lists they no longer need.'],
            'pl' => ['title' => 'Import CSV / wklej', 'desc' => 'Wklej listę SKU i ilości przez shortcode [rapid_bulk_paste] i dodaj wszystko do koszyka w jednym kroku.'],
        ],
        [
            'en' => ['title' => 'Customer-specific pricing', 'desc' => 'Show role- or customer-based prices in the quick-order table via rapid/product_price_html (CustomerPricing, shipped).'],
            'pl' => ['title' => 'Ceny per klient', 'desc' => 'Pokaż ceny zależne od roli lub klienta w tabeli zamówienia przez rapid/product_price_html (CustomerPricing, wdrożone).'],
        ],
        [
            'en' => ['title' => 'Per-role forms', 'desc' => 'Different product scopes, columns, intros and default SKU lines per role (RoleOrderForms, shipped).'],
            'pl' => ['title' => 'Formularze per rola', 'desc' => 'Różne zakresy produktów, kolumny, intro i domyślne linie SKU per rola (RoleOrderForms, wdrożone).'],
        ],
    ],
];
