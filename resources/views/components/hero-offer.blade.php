@props(['slide', 'rate'])
<a class="hero-slide-offer" href="{{ $slide['target'] }}"><span>{{ $slide['category'] }}</span>@if($slide['priced'])<strong>&#8377;{{ number_format($rate) }} <small>/ KG</small></strong>@else<strong>Wholesale</strong>@endif<span>{{ $slide['label'] }} <x-icon /></span></a>
