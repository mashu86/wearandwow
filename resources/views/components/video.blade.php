@props(['video'])
<div {{ $attributes->class(['video-frame']) }}>
    <video muted loop playsinline preload="none" data-src="{{ asset($video['src']) }}" poster="{{ asset($video['poster']) }}" aria-label="{{ $video['title'] }}" tabindex="-1"></video>
    <div class="video-caption"><span>{{ $video['label'] }}</span><h3>{{ $video['title'] }}</h3></div>
    <button type="button" class="video-expand" aria-label="Expand {{ $video['title'] }}" title="Expand video"><x-icon name="expand"/></button>
    <button type="button" class="video-sound" aria-label="Unmute {{ $video['title'] }}" aria-pressed="false" title="Sound on"><x-icon name="speaker-muted" class="sound-muted-icon"/><x-icon name="speaker" class="sound-on-icon"/></button>
    <button type="button" class="video-toggle" aria-label="Play {{ $video['title'] }}" data-title="{{ $video['title'] }}"><x-icon name="play" class="play-icon"/><x-icon name="pause" class="pause-icon"/></button>
    <a class="video-fallback" href="{{ asset($video['src']) }}" hidden>Open video</a>
    <noscript><a class="video-direct" href="{{ asset($video['src']) }}">Watch {{ $video['title'] }} ↗</a></noscript>
</div>
