<?php

$media = 'assets/wearandwow/';
$rate = 888;
$editorial = $media.'editorial/';

return [
    'brand' => [
        'name' => 'Wear & Wow',
        'logo' => $media.'logo/logo-web.png',
        'phone' => '9746827272',
        'telephone' => '+919746827272',
        'address' => 'Beypore Road, Arakkinar, Kozhikode, Kerala',
        'landmark' => 'Opposite New Star Hotel',
        'directions' => 'https://www.google.com/maps/search/?api=1&query='.rawurlencode('Wear & Wow, Beypore Road, Arakkinar, Kozhikode, Kerala, Opposite New Star Hotel'),
    ],
    'socialLinks' => [
        'instagram' => 'https://www.instagram.com/wear.n.wow/?hl=en',
        'facebook' => 'https://www.facebook.com/people/Wear-wow/61585847387728/',
        'whatsapp' => 'https://wa.me/919746827272',
    ],
    'images' => [
        'campaign' => $editorial.'campaign.jpg',
        'retail' => $editorial.'retail.jpg',
        'bundles' => $editorial.'wardrobe.jpg',
        'accessories' => $editorial.'bag.jpg',
        'retailFeature' => $editorial.'retail-feature.jpg',
        'about' => $editorial.'about-style.jpg',
    ],
    'heroSlides' => [
        ['label' => 'Korean style', 'image' => $media.'hero/korean-retail.jpg', 'position' => '70% center', 'category' => 'RETAIL / KG', 'priced' => true, 'target' => '#retail'],
        ['label' => 'The jewellery collection', 'image' => $media.'hero/wholesale-jewellery.jpg', 'position' => '65% center', 'category' => 'WHOLESALE JEWELLERY', 'priced' => false, 'target' => '#wholesale'],
        ['label' => 'The accessories edit', 'image' => $media.'hero/wholesale-accessories.jpg', 'position' => '65% center', 'category' => 'WHOLESALE ACCESSORIES', 'priced' => false, 'target' => '#wholesale'],
        ['label' => 'Sweaters & surplus', 'image' => $media.'hero/sweaters-surplus.jpg', 'position' => '65% center', 'category' => 'SWEATERS & SURPLUS / KG', 'priced' => true, 'target' => '#bundles'],
    ],
    'wholesaleCategories' => [
        ['name' => 'Ladies surplus', 'note' => 'Style, in abundance.', 'image' => $editorial.'ladies-collection.jpg', 'position' => 'center'],
        ['name' => 'Kids wear', 'note' => 'Little looks. Big possibilities.', 'image' => $editorial.'kids-fashion.jpg', 'position' => 'center'],
        ['name' => 'Surplus bundles', 'note' => '80 KG & 100 KG options.', 'image' => $media.'carousel/bundles.jpeg', 'position' => 'center'],
        ['name' => 'Jewellery', 'note' => 'The finishing touch.', 'image' => $editorial.'jewellery.jpg', 'position' => 'center'],
        ['name' => 'Accessories', 'note' => 'Small details. More wow.', 'image' => $editorial.'accessories-collection.jpg', 'position' => 'center'],
    ],
    'bundles' => [
        ['id' => 'ladies-80', 'weight' => 80, 'category' => 'Ladies surplus', 'brand' => 'BKT', 'type' => 'Korean mix', 'image' => $editorial.'bundle-selection.jpg', 'position' => 'center', 'price' => 80 * $rate],
        ['id' => 'ladies-100', 'weight' => 100, 'category' => 'Ladies surplus', 'brand' => 'AM', 'type' => 'Top', 'image' => $editorial.'ladies-tops.jpg', 'position' => 'center', 'price' => 100 * $rate],
        ['id' => 'kids-80', 'weight' => 80, 'category' => 'Kids wear', 'brand' => 'HKT', 'type' => 'Sweater', 'image' => $editorial.'kids-sweater.jpg', 'position' => 'center', 'price' => 80 * $rate],
        ['id' => 'kids-100', 'weight' => 100, 'category' => 'Kids wear', 'brand' => 'BKT', 'type' => 'Korean mix', 'image' => $editorial.'kids-mix.jpg', 'position' => 'center', 'price' => 100 * $rate],
    ],
    'kgPricing' => ['price_per_kg' => $rate],
    'retailDemoProducts' => [
        ['name' => 'The Dress Edit', 'image' => $editorial.'retail-dresses.jpg', 'position' => 'center'],
        ['name' => 'Everyday Style', 'image' => $editorial.'retail-everyday.jpg', 'position' => 'center'],
        ['name' => 'City Essentials', 'image' => $editorial.'retail-city.jpg', 'position' => 'center'],
        ['name' => 'The Weekend Edit', 'image' => $editorial.'retail-weekend.jpg', 'position' => 'center'],
    ],
    'retailProducts' => [
        ['name' => 'The western edit', 'label' => 'Retail / KG', 'image' => $editorial.'western-collection.jpg', 'position' => 'center', 'target' => '#retail', 'cta' => 'Explore retail', 'price_per_kg' => $rate],
        ['name' => 'The surplus collection', 'label' => 'Wholesale', 'image' => $media.'surplus-bundles/bundle-demo.jpg', 'position' => 'center', 'target' => '#bundles', 'cta' => 'Discover bundles'],
        ['name' => 'Little looks, big personality', 'label' => 'Kids wear', 'image' => $editorial.'kids-collection-edit.jpg', 'position' => 'center', 'target' => '#wholesale', 'cta' => 'Explore kids wear'],
        ['name' => 'It’s all in the details', 'label' => 'Wholesale accessories', 'image' => $media.'carousel/accessories.jpeg', 'position' => 'center', 'target' => '#wholesale', 'cta' => 'Discover accessories'],
    ],
    'videos' => [
        'shop' => [
            ['src' => $media.'shop-videos/shop-1.mp4', 'poster' => $media.'shop-videos/shop-1.jpg', 'title' => 'A closer look', 'label' => 'Inside Wear & Wow'],
            ['src' => $media.'shop-videos/shop-2.mp4', 'poster' => $media.'shop-videos/shop-2.jpg', 'title' => 'Find your next favourite', 'label' => 'From the shop floor'],
            ['src' => $media.'shop-videos/shop-4.mp4', 'poster' => $media.'shop-videos/shop-4.jpg', 'title' => 'Made for a little wow', 'label' => 'Take a look around'],
        ],
        'bundle' => ['src' => $media.'surplus-bundles/bundle-demo.mp4', 'poster' => $media.'surplus-bundles/bundle-demo.jpg', 'title' => 'Wholesale bundle preview', 'label' => '80 KG / 100 KG'],
    ],
    'values' => [
        ['title' => 'Fashion within reach', 'text' => 'Trendy ladies western wear, with simple pricing by weight.'],
        ['title' => 'Room to grow', 'text' => 'Wholesale clothing, jewellery and accessories for your business.'],
        ['title' => 'A fresh perspective', 'text' => 'Trend-led collections for the way you love to dress.'],
        ['title' => 'Across India', 'text' => 'All-India delivery. Enquire for availability and delivery details.'],
    ],
];
