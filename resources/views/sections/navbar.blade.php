<header class="site-header" id="site-header">
    <nav class="navigation container" aria-label="Main navigation">
        <a class="brand" href="#home" aria-label="Wear and Wow home"><img src="{{ asset($brand['logo']) }}" width="54" height="54" alt="Wear & Wow logo"><span>WEAR <i>&</i> WOW<small>STYLE HAS A NEW ADDRESS</small></span></a>
        <div class="nav-links" id="nav-links">
            @foreach(['home' => 'Home', 'wholesale' => 'Wholesale', 'retail' => 'Retail', 'bundles' => 'Bundles', 'about' => 'About'] as $id => $label)
                <a href="#{{ $id }}" @if($loop->first) class="active" @endif>{{ $label }}</a>
            @endforeach
            <a href="#contact" class="mobile-contact">Visit & contact</a>
        </div>
        <div class="nav-actions">
            <a href="{{ $socialLinks['instagram'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><x-icon name="instagram" /></a>
            <a href="{{ $socialLinks['whatsapp'] }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><x-icon name="whatsapp" /></a>
            <a class="button button-small" href="#contact">LET’S TALK <x-icon /></a>
            <button class="menu-toggle" aria-controls="nav-links" aria-expanded="false" aria-label="Open menu"><span></span><span></span></button>
        </div>
    </nav>
</header>
