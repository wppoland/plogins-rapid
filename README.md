# Rapid - Quick Order Form for WooCommerce

A fast bulk order form so B2B and wholesale buyers can add many products at once.

Rapid adds a searchable quick-order form to WooCommerce via the `[rapid_order]`
shortcode. Customers find products by name or SKU, set quantities in a compact
table and add many products to the cart in a single submit.

This is the **FREE**, wp.org-bound plugin. It is **self-contained** — no runtime
Composer dependencies.

## Features

- `[rapid_order]` shortcode: searchable product table/form.
- Live AJAX product search by name or SKU (debounced).
- Optional category filter dropdown.
- Configurable product scope: all products or selected categories only.
- Batched add-to-cart with a single combined notice.
- Selectable columns: image, SKU, price, stock.
- Configurable search results per page.
- Works without JavaScript (graceful degradation).
- Accessible, mobile-friendly, translation-ready, clean uninstall.
- HPOS and cart/checkout blocks compatible.

## Development

```bash
composer install        # dev tooling (no runtime deps)
composer cs             # PHPCS (WordPress Coding Standards)
composer analyse        # PHPStan level 6 + WooCommerce stubs
```

Local WordPress + WooCommerce environment:

```bash
npx @wordpress/env start
```

### Architecture

- **Bootstrap** (`rapid.php`): PHP/WC guards, HPOS + cart-blocks compat, boots on
  `init` priority 0 and fires `do_action('rapid/booted', …)` from `Plugin::boot()`
  (the hook the PRO companion extends).
- **Autoload** (`autoload.php`): Composer vendor autoloader + PSR-4 fallback.
- **DI**: `src/Plugin.php` singleton + `src/Container.php`; services in
  `config/services.php`, boot order in `config/hooks.php`, defaults in
  `config/defaults.php`; `src/Migrator.php`.
- **Storefront**: `src/Service/OrderForm.php` (shortcode, AJAX search, batched
  add-to-cart) rendered via `templates/order-form.php`.
- **Admin**: `src/Admin/Settings.php` (WooCommerce → Rapid submenu).
- **CI**: `.github/workflows/ci.yml` runs PHPCS, PHPStan and Plugin Check.

## PRO companion

`wppoland/rapid-pro` (private) hooks `add_action('rapid/booted', …)` to extend the
shared DI container with premium features.
