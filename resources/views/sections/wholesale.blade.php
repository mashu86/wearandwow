<section class="wholesale dark-section" id="wholesale">
    <div class="container section">
        <div class="section-heading reveal">
            <div>
                <p class="eyebrow">01 / THE WHOLESALE EDIT</p>
                <h2>Good style.<br><em>Great possibilities.</em></h2>
            </div>
            <div>
                <p>Built for business. Surplus fashion, bulk bundles<br>and accessories at wholesale scale.</p>
                <a class="text-link light-link" href="#bundles">FIND YOUR BUNDLE <x-icon /></a>
            </div>
        </div>

        <div class="category-grid">
            @foreach($wholesaleCategories as $category)
            <a class="category reveal" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, I would like to enquire about wholesale '.$category['name'].'.') }}" target="_blank" rel="noopener noreferrer">
                <div class="category-image">
                    <img src="{{ asset($category['image']) }}" style="object-position: {{ $category['position'] }}" width="320" height="390" loading="lazy" alt="{{ $category['name'] }} from the Wear & Wow collection">
                    <span class="category-arrow"><x-icon /></span>
                </div>
                <span class="category-number">0{{ $loop->iteration }}</span>
                <h3>{{ $category['name'] }}</h3>
                <p>{{ $category['note'] }}</p>
            </a>
            @endforeach
        </div>

        <div class="bundle-pricing" id="bundles">
            <div class="section-heading reveal">
                <div>
                    <p class="eyebrow">MORE STYLE. BY THE BUNDLE.</p>
                    <h2>Small start.<em> Big plans.</em></h2>
                </div>
                <p>WHOLESALE BUNDLES<br><small>Amounts shown for quick planning.</small></p>
            </div>

            <div class="bundle-list">
                @foreach($bundles as $bundle)
                <div class="bundle-row reveal" data-reveal="row">
                    <div class="bundle-thumb">
                        <img src="{{ asset($bundle['image']) }}" width="120" height="120" loading="lazy" style="object-position: {{ $bundle['position'] }}" alt="{{ $bundle['brand'] }} {{ $bundle['type'] }} wholesale bundle">
                    </div>
                    <span class="bundle-index">0{{ $loop->iteration }}</span>
                    <div class="bundle-weight">{{ $bundle['weight'] }}<small>KG</small></div>
                    <div class="bundle-category">
                        <h3>{{ $bundle['brand'] }} / {{ $bundle['type'] }}</h3>
                        <span>{{ $bundle['category'] }} bundle</span>
                    </div>
                    <div class="bundle-cost">
                        <strong>₹{{ number_format($bundle['price']) }}</strong>
                        <span>Approx. bundle amount</span>
                    </div>
                    <a class="bundle-link" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, please share the price and availability of the '.$bundle['weight'].' KG '.$bundle['brand'].' '.$bundle['type'].' wholesale bundle.') }}" target="_blank" rel="noopener noreferrer" aria-label="Enquire about {{ $bundle['weight'] }} KG {{ $bundle['brand'] }} {{ $bundle['type'] }} bundle">ENQUIRE <x-icon /></a>
                </div>
                @endforeach
            </div>

            <p class="pricing-disclaimer">Amounts are calculated from the current ₹{{ number_format($kgPricing['price_per_kg']) }}/KG planning rate. Contact us for current wholesale availability.</p>
        </div>

        <div class="bundle-story reveal">
            <x-video :video="$videos['bundle']" class="bundle-film" />
            <div class="bundle-story-copy">
                <p class="eyebrow">A CLOSER LOOK AT WHOLESALE</p>
                <h2>Wholesale.<br><em>By the bundle.</em></h2>
                <div class="weight-tags"><span>80 KG</span><span>100 KG</span><span>BULK SURPLUS</span></div>
                <p>For resellers, boutiques and online sellers.<br>See the bundles. Explore the possibilities.</p>
                <a class="button button-cream" href="{{ $socialLinks['whatsapp'].'?text='.rawurlencode('Hi Wear & Wow, I am interested in your wholesale bundles.') }}" target="_blank" rel="noopener noreferrer">LET'S TALK WHOLESALE <x-icon /></a>
            </div>
        </div>
    </div>
</section>
