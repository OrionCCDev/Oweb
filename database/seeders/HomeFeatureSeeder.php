<?php

namespace Database\Seeders;

use App\Models\HomeFeature;
use Illuminate\Database\Seeder;

class HomeFeatureSeeder extends Seeder
{
    /**
     * Seeds the 4 homepage feature cards with the content that was, until
     * now, hardcoded directly in index.blade.php (only shown as a fallback
     * when the home_features table is empty). Running this turns them into
     * real, dashboard-editable rows. Safe to re-run — skips any title that
     * already exists.
     */
    public function run(): void
    {
        $features = [
            ['title' => 'Quality Assurance', 'subtitle' => 'Top-notch craftsmanship', 'icon' => 'quality-icon-award-vector-25322832.png', 'sort_order' => 1],
            ['title' => 'Timely Delivery', 'subtitle' => 'Projects on schedule', 'icon' => 'efficiency.png', 'sort_order' => 2],
            ['title' => 'Innovative Solutions', 'subtitle' => 'Cutting-edge technology', 'icon' => 'idea.png', 'sort_order' => 3],
            ['title' => 'Safety Standards', 'subtitle' => 'Strict safety protocols', 'icon' => 'safty.png', 'sort_order' => 4],
        ];

        foreach ($features as $data) {
            if (HomeFeature::where('title', $data['title'])->exists()) {
                continue;
            }

            $feature = HomeFeature::create([
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'sort_order' => $data['sort_order'],
            ]);

            $iconPath = public_path('orionFrontAssets/assets/images/icon/' . $data['icon']);
            if (file_exists($iconPath)) {
                $feature->addMedia($iconPath)->preservingOriginal()->toMediaCollection('icon');
            }
        }
    }
}
