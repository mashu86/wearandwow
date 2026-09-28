# Wear & Wow

A single-page Laravel client presentation for the wholesale and retail clothing business in Calicut. The provided workspace contained media only, so Laravel 12 was initialized for the installed PHP 8.2 environment.

## Preview

The local preview is available at http://127.0.0.1:8000 while the development server is running.

To start it again:

```sh
php artisan serve --host=127.0.0.1 --port=8000
```

The production frontend build is already generated. For frontend changes, run `npm run build`, or use `npm run dev` in another terminal for live updates. XAMPP can also serve `http://localhost/wearandwow/public/`; a dedicated virtual host should point its document root at this project's `public` directory.

## Content and pricing

Edit `config/wearandwow.php`. The controller passes its data to `resources/views/landing.blade.php` and the section partials.

- `$rate` is the single retail price per kilogram. The default is INR 888.
- `kgPricing.weights` defines the selectable retail weights. Prices are calculated server-side and recalculated interactively in the browser.
- `bundles` contains four independent wholesale bundle totals. Set each `price` to a confirmed INR amount. A `null` value deliberately displays `₹XX,XXX` with “Price to be confirmed.” No wholesale prices have been invented.
- `wholesaleCategories`, `retailProducts`, `videos`, `socialLinks`, and `brand` hold the display content and contact information.
- Enquiries open WhatsApp with the relevant bundle or selected retail weight. The demo does not collect orders or process payments.
- The location illustration is intentionally schematic; Get Directions opens the supplied business address in Google Maps.

After editing cached configuration, run `php artisan optimize:clear`.

## Assets

All original media has been moved, not copied, into `public/assets/wearandwow/`:

- `carousel`: four supplied campaign banners, renamed by subject.
- `logo`: the unchanged original logo (a PNG file originally named `.jpeg`) and a smaller web derivative.
- `shop-videos`: all four supplied shop clips and extracted poster frames.
- `surplus-bundles`: the supplied bundle demo and its poster.

The third shop clip (`shop-3.mp4`) shows a black picture with a heading at sampled times 1.5, 8, and 23 seconds in Chrome. It is preserved but omitted from the presentation; the other three shop clips are displayed. Replace it with a usable clip and add it to `videos.shop` when ready.

Posters can be regenerated while the local server is running:

```sh
node scripts/prepare-video-posters.mjs
node scripts/prepare-logo.mjs
```

The supplied images retain their original quality and use CSS framing. Fonts and Swiper are bundled locally; the page needs no third-party CDN, map embed, or external font request. Below-fold images load lazily. Videos load and play muted only when visible, pause offscreen, and respect reduced-motion and data-saving preferences. Every video has an explicit play/pause control.

## Verification

```sh
php artisan test
npm run build
npm run test:browser
```

Browser checks require an installed Google Chrome and the Laravel server running at `http://127.0.0.1:8000`. Set `BASE_URL` to use a different preview address.

The browser suite checks 1920, 1440, 1280, 1024, 768, 430, 390, 375, and 360-pixel viewports, section links, contact URLs, image loading, retail pricing, Swiper controls, the mobile menu, reduced motion, lazy video loading, playback/pause controls, scroll reveals, console errors, and page overflow. Screenshots and the machine-readable report are saved to the ignored `artifacts` folder.

The PHP tests also verify that retail price changes do not change wholesale totals and that every configured media file exists.

## Fresh setup

```sh
composer install
npm ci
```

Copy `.env.example` to `.env`, run `php artisan key:generate`, then `npm run build`. This page uses file sessions and cache and needs no database. For deployment, use a web server pointed at `public`, configure the application URL, and set `APP_ENV=production` and `APP_DEBUG=false`.
