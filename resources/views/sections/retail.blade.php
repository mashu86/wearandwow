<section class="retail section container" id="retail">
    <div class="retail-visual reveal">
        <img src="{{ asset($images['retail']) }}" width="1600" height="592" loading="lazy" alt="Fashion inspiration: a day out shopping">
        <span class="retail-visual-label">YOUR NEXT FAVOURITE IS WAITING.</span>
        <div class="retail-stamp">PICK IT.<br>WEIGH IT.<br><em>Wow.</em></div>
    </div>

    <div class="retail-copy reveal">
        <p class="eyebrow">02 / THE RETAIL EDIT</p>
        <h2>Love the look.<br><em>Love the weight.</em></h2>
        <p>Trending fashion. Priced by weight.<br>Ladies western wear, with more room for you.</p>
        <div class="retail-price"><sup>₹</sup>{{ number_format($kgPricing['price_per_kg']) }}<span>PER KG<small>LADIES WESTERN WEAR</small></span></div>

        <div class="retail-rate-note">
            <p>Pick your favourites. We weigh them together.<br>Final price is based on the actual weight at ₹{{ number_format($kgPricing['price_per_kg']) }} per KG.</p>
            <a class="button retail-enquiry" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, I am interested in retail ladies western wear at ₹'.number_format($kgPricing['price_per_kg']).' per KG. Please share availability.') }}" target="_blank" rel="noopener noreferrer">FIND YOUR WOW <x-icon /></a>
            <p class="retail-terms">No return | No exchange.</p>
        </div>
    </div>
</section>

<section class="retail-demo section container" id="retail-demo">
    <div class="section-heading reveal">
        <div>
            <p class="eyebrow">THE RETAIL EDIT</p>
            <h2>Dress by dress.<br><em>Price by weight.</em></h2>
        </div>
        <p>Find your style. Pay by actual weight.<br>based on ₹{{ number_format($kgPricing['price_per_kg']) }}/KG.</p>
    </div>
    <div class="retail-demo-grid">
        @foreach($retailDemoProducts as $product)
        <article class="retail-demo-card reveal">
            <a href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, I like the '.$product['name'].' style. Please share availability and pricing by actual weight.') }}" target="_blank" rel="noopener noreferrer" class="retail-demo-image">
                <img src="{{ asset($product['image']) }}" width="360" height="460" loading="lazy" style="object-position: {{ $product['position'] }}" alt="{{ $product['name'] }}">
            </a>
            <div class="retail-demo-details">
                <h3>{{ $product['name'] }}</h3>
                <p>Priced by actual weight</p>
            </div>
        </article>
        @endforeach
    </div>
</section>
