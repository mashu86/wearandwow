<?php

$media = 'assets/wearandwow/';
$rate = 888;

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
        'campaign' => $media.'carousel/campaign.jpeg',
        'retail' => $media.'carousel/retail.jpeg',
        'bundles' => $media.'carousel/bundles.jpeg',
        'accessories' => $media.'carousel/accessories.jpeg',
    ],
    'heroSlides' => [
        ['label' => 'The Wear & Wow edit', 'image' => $media.'carousel/campaign.jpeg', 'position' => '13% 50%'],
        ['label' => 'Retail by the kilo', 'image' => $media.'carousel/retail.jpeg', 'position' => 'left center'],
        ['label' => 'Wholesale bundles', 'image' => $media.'carousel/bundles.jpeg', 'position' => '43% center'],
        ['label' => 'Accessories edit', 'image' => $media.'carousel/accessories.jpeg', 'position' => 'right center'],
    ],
    'wholesaleCategories' => [
        ['name' => 'Ladies surplus', 'note' => 'Style, in abundance.', 'image' => $media.'carousel/retail.jpeg', 'position' => 'left'],
        ['name' => 'Kids wear', 'note' => 'Little looks. Big possibilities.', 'image' => $media.'carousel/bundles.jpeg', 'position' => '78%'],
        ['name' => 'Surplus bundles', 'note' => '80 KG & 100 KG options.', 'image' => $media.'carousel/bundles.jpeg', 'position' => '43%'],
        ['name' => 'Jewellery', 'note' => 'The finishing touch.', 'image' => $media.'carousel/accessories.jpeg', 'position' => 'left'],
        ['name' => 'Accessories', 'note' => 'Small details. More wow.', 'image' => $media.'carousel/accessories.jpeg', 'position' => 'right'],
    ],
    'bundles' => [
        ['id' => 'ladies-80', 'weight' => 80, 'category' => 'Ladies surplus', 'brand' => 'BKT', 'type' => 'Korean mix', 'image' => $media.'carousel/bundles.jpeg', 'position' => '35%', 'price' => 80 * $rate],
        ['id' => 'ladies-100', 'weight' => 100, 'category' => 'Ladies surplus', 'brand' => 'AM', 'type' => 'Top', 'image' => $media.'carousel/retail.jpeg', 'position' => 'left', 'price' => 100 * $rate],
        ['id' => 'kids-80', 'weight' => 80, 'category' => 'Kids wear', 'brand' => 'HKT', 'type' => 'Sweater', 'image' => $media.'carousel/bundles.jpeg', 'position' => '78%', 'price' => 80 * $rate],
        ['id' => 'kids-100', 'weight' => 100, 'category' => 'Kids wear', 'brand' => 'BKT', 'type' => 'Korean mix', 'image' => $media.'carousel/accessories.jpeg', 'position' => 'right', 'price' => 100 * $rate],
    ],
    'kgPricing' => ['price_per_kg' => $rate, 'weights' => [0.5, 1, 2], 'default_weight' => 1],
    'retailDemoProducts' => [
        ['name' => 'Floral Western Dress', 'weight' => 0.5, 'image' => $media.'carousel/retail.jpeg', 'position' => 'left'],
        ['name' => 'Casual Day Dress', 'weight' => 1, 'image' => $media.'carousel/campaign.jpeg', 'position' => '16%'],
        ['name' => 'Party Wear Edit', 'weight' => 1.5, 'image' => $media.'carousel/retail.jpeg', 'position' => 'center'],
        ['name' => 'Longline Trend Dress', 'weight' => 2, 'image' => $media.'carousel/campaign.jpeg', 'position' => '70%'],
    ],
    'retailProducts' => [
        ['name' => 'The western edit', 'label' => 'Retail / KG', 'image' => $media.'carousel/retail.jpeg', 'position' => 'left', 'target' => '#retail', 'cta' => 'Explore retail', 'price_per_kg' => $rate],
        ['name' => 'The surplus collection', 'label' => 'Wholesale', 'image' => $media.'carousel/bundles.jpeg', 'position' => '35%', 'target' => '#bundles', 'cta' => 'Discover bundles'],
        ['name' => 'A little extra sparkle', 'label' => 'Wholesale jewellery', 'image' => $media.'carousel/accessories.jpeg', 'position' => 'left', 'target' => '#wholesale', 'cta' => 'Explore jewellery'],
        ['name' => 'It’s all in the details', 'label' => 'Wholesale accessories', 'image' => $media.'carousel/accessories.jpeg', 'position' => 'right', 'target' => '#wholesale', 'cta' => 'Discover accessories'],
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
