<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function __invoke(): View
    {
        $data = config('wearandwow');
        $data['kgPricing']['options'] = array_map(fn ($weight) => [
            'weight' => $weight,
            'label' => $weight < 1 ? ($weight * 1000).' GM' : $weight.' KG',
            'price' => round($weight * $data['kgPricing']['price_per_kg'], 2),
        ], $data['kgPricing']['weights']);
        $data['retailDemoProducts'] = array_map(function ($product) use ($data) {
            $product['price'] = round($product['weight'] * $data['kgPricing']['price_per_kg'], 2);
            $product['weight_label'] = $product['weight'] < 1 ? ($product['weight'] * 1000).' GM' : $product['weight'].' KG';

            return $product;
        }, $data['retailDemoProducts']);

        return view('landing', $data);
    }
}
