@props(['name' => 'arrow'])
<svg {{ $attributes->class(['icon']) }} width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
@switch($name)
@case('instagram')<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/>@break
@case('whatsapp')<path d="M20.4 11.6a8.4 8.4 0 0 1-12.5 7.3L3 20.4l1.5-4.8a8.4 8.4 0 1 1 15.9-4Z"/><path d="M8.3 7.5c-1 2.5 2.6 6.7 5.4 7.8 1.7.6 2.6-.7 2.6-1.5l-2.6-1.3-1 1c-1.6-.8-2.7-2-3.3-3.4l.8-.8-1.2-2Z"/>@break
@case('facebook')<path d="M14 21v-8h3l.5-4H14V7c0-1 .3-2 2-2h2V2h-3c-3 0-5 2-5 5v2H7v4h3v8"/>@break
@case('pin')<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/>@break
@case('phone')<path d="m7 3 3 5-2 2a15 15 0 0 0 6 6l2-2 5 3c0 3-2 4-4 4C10 20 4 14 3 7c0-2 1-4 4-4Z"/>@break
@case('play')<path d="m9 5 11 7-11 7Z"/>@break
@case('pause')<path d="M9 5v14M15 5v14"/>@break
@case('expand')<path d="M8 3H3v5m13-5h5v5M3 16v5h5m13-5v5h-5"/>@break
@case('speaker')<path d="m11 4-6 5H2v6h3l6 5V4Z"/><path d="M15 8a6 6 0 0 1 0 8m3-11a10 10 0 0 1 0 14"/>@break
@case('speaker-muted')<path d="m11 4-6 5H2v6h3l6 5V4Z"/><path d="m16 9 6 6m0-6-6 6"/>@break
@case('bag')<path d="M5 7h14l1 14H4L5 7Z"/><path d="M8 8V6a4 4 0 0 1 8 0v2"/>@break
@case('box')<path d="m3 7 9-5 9 5v10l-9 5-9-5V7Zm0 0 9 5 9-5M12 12v10M7.5 4.5l9 5"/>@break
@case('truck')<path d="M2 5h12v12H2V5Zm12 4h4l4 4v4h-8"/><circle cx="6" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>@break
@case('sparkle')<path d="m12 2 2.7 7.3L22 12l-7.3 2.7L12 22l-2.7-7.3L2 12l7.3-2.7L12 2Z"/>@break
@case('down')<path d="M12 3v18m-7-7 7 7 7-7"/>@break
@default<path d="M5 12h14m-6-6 6 6-6 6"/>
@endswitch
</svg>
