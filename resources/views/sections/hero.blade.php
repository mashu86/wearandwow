<section class="hero container" id="home" aria-labelledby="hero-title">
    <div class="hero-copy">
        <p class="eyebrow"><span class="tiny-line"></span> CALICUT, KERALA &nbsp; / &nbsp; WEAR & WOW</p>
        <h1 id="hero-title">A little weight.<br>A lot of <em>wow.</em><span class="hero-star" aria-hidden="true">✳</span></h1>
        <p class="hero-description">Your style. Your way.<br>Trend-led fashion, from everyday finds<br class="desktop-break"> to your next big business move.</p>
        <div class="hero-actions"><a class="button" href="#retail">EXPLORE RETAIL <x-icon /></a><a class="text-link" href="#wholesale">VIEW WHOLESALE <x-icon /></a></div>
        <div class="hero-note"><span class="outlined-icon"><x-icon name="bag" /></span><p>ONE BRAND. TWO WAYS TO WOW.<small>Retail by the kilo. Wholesale by the bundle.</small></p></div>
    </div>
    <div class="hero-visual">
        <div class="hero-image">
            <div class="swiper hero-swiper" aria-label="Featured Wear & Wow collections">
                <div class="swiper-wrapper">
                    @foreach($heroSlides as $slide)
                    <div class="swiper-slide">
                        <img src="{{ asset($slide['image']) }}" width="1600" height="592" alt="{{ $slide['label'] }} at Wear & Wow" style="object-position: {{ $slide['position'] }}" @if($loop->first) fetchpriority="high" @else loading="lazy" @endif>
                        <span class="image-label">{{ strtoupper($slide['label']) }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="hero-pagination"></div>
            </div>
        </div>
        <div class="vertical-caption">LESS ORDINARY. MORE YOU.</div>
        <div class="hero-price"><span class="eyebrow">RETAIL / KG</span><p><sup>₹</sup>{{ number_format($kgPricing['price_per_kg']) }}<small>/ KG</small></p><span>LADIES WESTERN WEAR</span><a href="#retail" aria-label="Explore retail pricing"><x-icon /></a></div>
        <div class="hero-image-bottom"><span>FASHION BY WEIGHT</span><span><span class="hero-current">01</span> / <span class="hero-total">{{ str_pad(count($heroSlides), 2, '0', STR_PAD_LEFT) }}</span></span></div>
    </div>
    <a class="scroll-cue" href="#discover"><x-icon name="down" /> SCROLL TO DISCOVER</a>
</section>
<div class="brand-strip"><span>TRENDY & AFFORDABLE</span><x-icon name="sparkle"/><span>WHOLESALE & RETAIL</span><x-icon name="sparkle"/><span>ALL-INDIA DELIVERY</span><x-icon name="sparkle"/><span>A LITTLE MORE WOW</span><x-icon name="sparkle"/></div>
