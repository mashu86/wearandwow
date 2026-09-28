<section class="shop-section section container" id="shop">
    <div class="section-heading reveal"><div><p class="eyebrow">COME ON IN</p><h2>Step inside.<br><em>Feel the wow.</em></h2></div><div><p>A glimpse of our world in Calicut.<br>The clothes. The collections. The possibilities.</p><a class="text-link" href="#contact">FIND US IN STORE <x-icon /></a></div></div>
    <div class="shop-videos">@foreach($videos['shop'] as $video)<x-video :video="$video" class="reveal"/>@endforeach</div>
    <div class="shop-caption"><span>WEAR & WOW, CALICUT</span><span>YOUR STYLE STORY STARTS HERE. <x-icon name="sparkle"/></span></div>
</section>
