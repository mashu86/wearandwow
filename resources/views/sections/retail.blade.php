<section class="retail section container" id="retail">
    <div class="retail-visual reveal">
        <img src="{{ asset($images['retail']) }}" width="1600" height="592" loading="lazy" alt="Floral western dresses from the supplied Wear & Wow retail campaign">
        <span class="retail-visual-label">YOUR NEXT FAVOURITE IS WAITING.</span>
        <div class="retail-stamp">PICK IT.<br>WEIGH IT.<br><em>Wow.</em></div>
    </div>

    <div class="retail-copy reveal">
        <p class="eyebrow">02 / THE RETAIL EDIT</p>
        <h2>Love the look.<br><em>Love the weight.</em></h2>
        <p>Trending fashion. Priced by weight.<br>Ladies western wear, with more room for you.</p>
        <div class="retail-price"><sup>₹</sup>{{ number_format($kgPricing['price_per_kg']) }}<span>PER KG<small>LADIES WESTERN WEAR</small></span></div>

        <div class="kg-calculator" data-rate="{{ $kgPricing['price_per_kg'] }}">
            <div class="calculator-heading">
                <span class="eyebrow">YOUR WEIGHT. YOUR PRICE.</span>
                <span>RETAIL / KG</span>
            </div>
            <div class="weight-options" role="group" aria-label="Choose retail clothing weight">
                @foreach($kgPricing['options'] as $option)
                <button type="button" class="weight-option {{ $option['weight'] == $kgPricing['default_weight'] ? 'selected' : '' }}" data-weight="{{ $option['weight'] }}" aria-pressed="{{ $option['weight'] == $kgPricing['default_weight'] ? 'true' : 'false' }}">
                    <span>{{ $option['label'] }}</span>
                    <strong>₹{{ number_format($option['price'], $option['price'] == floor($option['price']) ? 0 : 2) }}</strong>
                </button>
                @endforeach
            </div>
            <div class="calculator-total">
                <span>Your style, by weight</span>
                <output aria-live="polite" id="retail-total">₹{{ number_format($kgPricing['price_per_kg'] * $kgPricing['default_weight']) }}</output>
            </div>
            <a class="button retail-enquiry" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, I am interested in '.$kgPricing['default_weight'].' KG of ladies western wear.') }}" data-whatsapp="{{ $socialLinks['whatsapp'] }}" target="_blank" rel="noopener noreferrer">FIND YOUR WOW <x-icon /></a>
            <p class="retail-terms">Final price depends on actual weight. No return | No exchange.</p>
        </div>
    </div>
</section>

<section class="retail-demo section container" id="retail-demo">
    <div class="section-heading reveal">
        <div>
            <p class="eyebrow">DEMO RETAIL PICKS</p>
            <h2>Dress by dress.<br><em>Price by weight.</em></h2>
        </div>
        <p>Each demo item shows sample weight and amount<br>based on ₹{{ number_format($kgPricing['price_per_kg']) }}/KG.</p>
    </div>
    <div class="retail-demo-grid">
        @foreach($retailDemoProducts as $product)
        <article class="retail-demo-card reveal">
            <a href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, I like the '.$product['name'].' demo item weighing '.$product['weight_label'].' at ₹'.number_format($product['price']).'. Please share availability.') }}" target="_blank" rel="noopener noreferrer" class="retail-demo-image">
                <img src="{{ asset($product['image']) }}" width="360" height="460" loading="lazy" style="object-position: {{ $product['position'] }}" alt="{{ $product['name'] }}">
                <span>{{ $product['weight_label'] }}</span>
            </a>
            <div class="retail-demo-details">
                <h3>{{ $product['name'] }}</h3>
                <p>Sample weight: {{ $product['weight_label'] }}</p>
                <strong>₹{{ number_format($product['price'], $product['price'] == floor($product['price']) ? 0 : 2) }}</strong>
            </div>
        </article>
        @endforeach
    </div>
</section>
