<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    public function test_landing_page_renders_both_business_models_and_weight_prices(): void
    {
        $this->get('/')->assertOk()
            ->assertSee('WHOLESALE BUNDLE')
            ->assertSee('RETAIL / KG')
            ->assertSee('₹888')->assertSee('Final price is based on the actual weight')
            ->assertDontSee('weight-option')->assertDontSee('Sample weight:')
            ->assertSee('Approx. bundle amount')
            ->assertSee('https://wa.me/919746827272', false);
    }

    public function test_retail_rate_changes_without_changing_bundle_totals(): void
    {
        config(['wearandwow.kgPricing.price_per_kg' => 1000]);
        config(['wearandwow.bundles.0.price' => 24500]);

        $this->get('/')->assertOk()->assertViewHas('kgPricing', function ($pricing) {
            return $pricing['price_per_kg'] === 1000;
        })->assertSee('₹24,500')->assertSee('₹1,000');
    }

    public function test_every_configured_media_file_exists(): void
    {
        $check = function ($value) use (&$check): void {
            if (is_array($value)) {
                foreach ($value as $item) {
                    $check($item);
                }
            } elseif (is_string($value) && str_starts_with($value, 'assets/')) {
                $this->assertFileExists(public_path($value));
            }
        };
        $check(config('wearandwow'));
    }
}
