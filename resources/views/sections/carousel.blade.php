<section class="collection-section section" id="collections">
    <div class="container"><div class="section-heading reveal"><div><p class="eyebrow">THE MOOD. THE MOMENT. THE EDIT.</p><h2>A little of <em>everything.</em></h2></div><div class="carousel-controls"><button class="circle-button collection-prev" aria-label="Previous collection"><x-icon class="rotate-arrow" /></button><button class="circle-button collection-next" aria-label="Next collection"><x-icon /></button></div></div>
    <div class="swiper collection-swiper reveal"><div class="swiper-wrapper">
        @foreach($retailProducts as $product)
        <article class="swiper-slide collection-card"><a href="{{ $product['target'] }}" class="collection-image"><img src="{{ asset($product['image']) }}" width="400" height="440" loading="lazy" style="object-position: {{ $product['position'] }}" alt="{{ $product['name'] }}"><span class="collection-badge">{{ $product['label'] }}</span></a><h3>{{ $product['name'] }}</h3><a class="text-link" href="{{ $product['target'] }}">{{ $product['cta'] }} <x-icon /></a></article>
        @endforeach
    </div><div class="collection-pagination"></div></div></div>
</section>
