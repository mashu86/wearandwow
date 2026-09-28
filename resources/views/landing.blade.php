<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f4efe6">
    <meta name="description" content="Wear & Wow, Calicut. Discover ladies western wear at ₹{{ number_format($kgPricing['price_per_kg']) }}/KG, wholesale surplus bundles, jewellery and accessories.">
    <title>Wear & Wow — A little weight. A lot of wow.</title>
    <link rel="icon" type="image/png" href="{{ asset($brand['logo']) }}">
    <link rel="preload" as="image" href="{{ asset($images['campaign']) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <div class="announcement"><span>FASHION BY WEIGHT. STYLE WITHOUT LIMITS.</span><span>ALL-INDIA DELIVERY <x-icon name="truck" /></span></div>
    @include('sections.navbar')
    <main id="main">
        @include('sections.hero')
        @include('sections.business-selector')
        @include('sections.wholesale')
        @include('sections.retail')
        @include('sections.carousel')
        @include('sections.videos')
        @include('sections.about')
        @include('sections.contact')
    </main>
    @include('sections.footer')
    <a class="floating-contact" href="{{ $socialLinks['whatsapp'] }}" target="_blank" rel="noopener noreferrer" aria-label="Chat with Wear and Wow on WhatsApp"><x-icon name="whatsapp" /></a>
</body>
</html>
