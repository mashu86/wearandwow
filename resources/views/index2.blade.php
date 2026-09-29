<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f6f5f1">
    <meta name="description" content="Find your everyday wow. Ladies western wear by the kilo and wholesale fashion in Calicut.">
    <title>Wear & Wow — Find your everyday wow.</title>
    <link rel="icon" href="{{ asset($brand['logo']) }}">
    @vite(['resources/css/app.css', 'resources/css/index2.css', 'resources/js/index2.js'])
</head>
<body class="design-two">
<a class="skip-link" href="#main">Skip to content</a>
<div class="d2-announcement">Considered style. Everyday possibilities. &nbsp; / &nbsp; All-India delivery</div>
<header class="d2-header">
    <a href="{{ route('design2') }}" aria-label="Wear and Wow home"><span class="d2-wordmark">wear<span>&</span>wow<small>CALICUT / EVERYDAY STYLE</small></span></a>
    <nav aria-label="Main navigation"><a href="#retail">The retail edit</a><a href="#wholesale">For your business</a><a href="#shop">Inside the store</a></nav>
    <a class="d2-pill" href="{{ $socialLinks['whatsapp'] }}" target="_blank" rel="noopener noreferrer">GET IN TOUCH <x-icon /></a>
</header>
<main id="main">
<section class="d2-hero" id="home">
    <div class="d2-hero-copy"><p class="d2-kicker">THE WEAR & WOW PERSPECTIVE</p><h1>An everyday<br>kind of <span>extraordinary.</span></h1><p>Thoughtfully found. Effortlessly worn.<br>Discover a little more of yourself in every piece.</p><a class="d2-pill d2-dark" href="#retail">EXPLORE THE EDIT <x-icon /></a><div class="d2-hero-note"><span>01 / RETAIL BY THE KILO</span><span>02 / WHOLESALE BY THE BUNDLE</span></div></div>
    <div class="d2-collage swiper d2-hero-swiper" aria-label="Featured Wear and Wow collections"><div class="swiper-wrapper">
    @foreach($heroSlides as $slide)
        <div class="swiper-slide"><img class="d2-main-photo" src="{{ asset($slide['image']) }}" alt="{{ $slide['label'] }}" style="object-position:{{ $slide['position'] }}" @if($loop->first) fetchpriority="high" @else loading="lazy" @endif><x-hero-offer :slide="$slide" :rate="$kgPricing['price_per_kg']" /></div>
    @endforeach
    </div></div>
    <div class="d2-hero-controls"><button class="d2-hero-prev" aria-label="Previous hero slide"><x-icon class="rotate-arrow" /></button><div class="d2-hero-pagination"></div><button class="d2-hero-next" aria-label="Next hero slide"><x-icon /></button><button class="d2-hero-autoplay" aria-label="Pause slideshow"><x-icon name="pause" /></button></div>
</section>
<div class="d2-ticker"><span>Retail by the kilo</span><span>Wholesale by the bundle</span><span>Curated in Calicut</span><span>Delivered across India</span></div>
<section class="d2-intro"><p class="d2-kicker">A WARDROBE. A FEELING. A LITTLE WOW.</p><h2>Style is personal.<br>Finding it should feel <em>effortless.</em></h2><p>From the pieces you reach for every morning to something a little unexpected. A fresh perspective on fashion, with possibilities for you and your business.</p></section>
<section class="d2-section" id="retail">
    <div class="d2-section-title"><div><p class="d2-kicker">01 / THE RETAIL EDIT</p><h2>The everyday <span>edit.</span></h2></div><div><p>Pick the pieces you love. Weigh them together.<br>Pay ₹{{ number_format($kgPricing['price_per_kg']) }} per KG, based on actual weight.</p><a class="d2-text-link" href="{{ $socialLinks['whatsapp'] }}" target="_blank" rel="noopener noreferrer">DISCOVER THE LATEST FINDS <x-icon /></a></div></div>
    <div class="d2-product-grid">@foreach($retailDemoProducts as $product)<a class="d2-product" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, please share availability of '.$product['name'].'.') }}" target="_blank" rel="noopener noreferrer"><div><img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" loading="lazy"><span>0{{ $loop->iteration }} / THE EDIT</span></div><h3>{{ $product['name'] }} <x-icon /></h3></a>@endforeach</div>
    <p class="d2-fineprint">Ladies western wear · Final price by actual weight · No return / No exchange</p>
</section>
<section class="d2-wholesale d2-section" id="wholesale">
    <div class="d2-wholesale-photo"><img src="{{ asset('assets/wearandwow/editorial/wardrobe.jpg') }}" alt="A considered selection of garments on hangers" loading="lazy"><span>MORE POSSIBILITIES, BY THE BUNDLE.</span></div>
    <div class="d2-wholesale-copy"><p class="d2-kicker">02 / MADE FOR YOUR NEXT BIG STEP</p><h2>Considered for you.<br><span>Ready for business.</span></h2><p>For boutiques, resellers and online stores. Discover surplus clothing, kids wear, jewellery and accessories, with room for your business to grow.</p><div class="d2-tags"><span>80 KG BUNDLES</span><span>100 KG BUNDLES</span><span>ALL-INDIA DELIVERY</span></div><a class="d2-pill" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, please share wholesale bundle availability.') }}" target="_blank" rel="noopener noreferrer">EXPLORE WHOLESALE <x-icon /></a></div>
    <div class="d2-bundle-grid" id="bundles">@foreach($bundles as $bundle)<a class="d2-bundle" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Please share details of the '.$bundle['weight'].' KG '.$bundle['brand'].' '.$bundle['type'].' bundle.') }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset($bundle['image']) }}" alt="{{ $bundle['category'] }} style inspiration" loading="lazy"><div><span>{{ $bundle['category'] }} / {{ $bundle['weight'] }} KG</span><h3>{{ $bundle['brand'] }} · {{ $bundle['type'] }}</h3><p>₹{{ number_format($bundle['price']) }} <small>approx.</small></p></div><x-icon /></a>@endforeach<p class="d2-fineprint">Planning amounts based on ₹{{ number_format($kgPricing['price_per_kg']) }}/KG. Enquire for current wholesale availability.</p></div>
</section>
<section class="d2-section d2-store" id="shop"><div class="d2-section-title"><div><p class="d2-kicker">A WINDOW INTO OUR WORLD</p><h2>Inside <span>Wear & Wow.</span></h2></div><p>The space. The finds. The little details.<br>Take a moment to look around.</p></div><div class="d2-video-grid">@foreach($videos['shop'] as $video)<x-video :video="$video"/>@endforeach</div></section>
<section class="d2-visit" id="contact"><p class="d2-kicker">YOUR NEXT FAVOURITE IS WAITING</p><h2>Your next favourite.<br><span>Waiting to be found.</span></h2><p>{{ $brand['address'] }}<br>{{ $brand['landmark'] }}</p><div><a class="d2-pill d2-dark" href="{{ $brand['directions'] }}" target="_blank" rel="noopener noreferrer">GET DIRECTIONS <x-icon name="pin" /></a><a class="d2-text-link" href="tel:{{ $brand['telephone'] }}">{{ $brand['phone'] }} <x-icon name="phone" /></a></div></section>
</main>
<footer class="d2-footer"><a href="#home">WEAR & WOW<span>FIND YOUR EVERYDAY WOW.</span></a><div><a href="{{ $socialLinks['instagram'] }}" target="_blank" rel="noopener noreferrer">INSTAGRAM ↗</a><a href="{{ $socialLinks['facebook'] }}" target="_blank" rel="noopener noreferrer">FACEBOOK ↗</a></div><p>© {{ date('Y') }} Wear & Wow · Calicut</p></footer>
</body>
</html>
