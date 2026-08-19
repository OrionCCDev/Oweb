<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    /**
     * Seeds the gallery strip shown on the homepage (9 images) and reused
     * by the footer (first 6), only shown as a hardcoded fallback until
     * now when the gallery_images table is empty. Running this turns them
     * into real, dashboard-editable rows. Safe to re-run - does nothing if
     * any gallery image already exists, so it won't duplicate on a second run.
     */
    public function run(): void
    {
        if (GalleryImage::exists()) {
            return;
        }

        $images = [
            'Picture1.jpg',
            'Picture10.png',
            'Picture12.png',
            'Picture212.jpg',
            'Picture3.jpg',
            'Picture32.jpg',
            'Picture6.jpg',
            'Picture8.png',
            'Picture5.jpg',
        ];

        foreach ($images as $index => $filename) {
            $sourcePath = public_path('orionFrontAssets/assets/images/project/' . $filename);
            if (!file_exists($sourcePath)) {
                continue;
            }

            $image = GalleryImage::create([
                'caption' => 'Orion Contracting — Project Gallery',
                'sort_order' => ($index + 1) * 10,
            ]);

            $image->addMedia($sourcePath)->preservingOriginal()->toMediaCollection('image');
        }
    }
}
