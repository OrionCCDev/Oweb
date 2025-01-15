<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Industrial Complex',
                'title' => 'Building strong foundations for future growth.',
                'desc' => 'At Orion, we specialize in delivering comprehensive civil contracting services tailored to the unique needs of industrial complexes. Our expertise spans the construction, renovation, and maintenance of large-scale industrial facilities, ensuring they operate efficiently and safely.',
                'photo' => '1.jpg',

            ],
            [
                'name' => 'Commercial Buildings',
                'title' => 'Integrating MEP systems for optimal building performance.',
                'desc' => 'At ORION, we excel in providing top-tier civil contracting services for commercial buildings. Our extensive experience and commitment to excellence ensure that every project we undertake meets the highest standards of quality and safety. We understand that commercial buildings are more than just structures; they are the spaces where businesses thrive and communities grow. Our team is dedicated to creating functional, aesthetically pleasing, and sustainable commercial spaces that cater to a variety of needs .',
                'photo' => '2.jpg',
            ],
            [
                'name' => 'Residential Buildings',
                'title' => 'Developing infrastructure for sustainable urban growth.',
                'desc' => 'At ORION, we are dedicated to creating high-quality residential buildings that provide comfort, safety, and aesthetic appeal. Our civil contracting services for residential projects encompass a wide range of construction types, from single-family homes to large apartment complexes.We understand that a home is more than just a place to live; it is a sanctuary where families grow and memories are made. Our team is committed to delivering residential buildings that meet the highest standards of quality and sustainability.',
                'photo' => '3.webp',
            ],
            [
                'name' => 'Hospitality Projects',
                'title' => 'IBuilding roads for seamless connectivity and growth.',
                'desc' => 'At ORION, we pride ourselves on delivering exceptional civil contracting services for hospitality projects. Our extensive experience in the hospitality sector ensures that we create inviting, functional, and luxurious spaces that cater to the needs of guests and operators alike.We understand that hospitality projects require a unique blend of creativity, precision, and efficiency. Our team is dedicated to providing comprehensive solutions that enhance the guest experience while ensuring operational excellence.',
                'photo' => '4.jpg',
            ],
            [
                'name' => 'Infrastructure',
                'title' => 'Crafting landscapes for aesthetic and environmental harmony.',
                'desc' => 'At ORION, we are leaders in providing comprehensive civil contracting services for infrastructure projects. Our expertise spans a wide range of infrastructure developments, ensuring that we deliver robust, efficient, and sustainable solutions that support the growth and functionality of communities and industries.We understand the critical role that infrastructure plays in the daily lives of people and the operations of businesses. Our team is dedicated to constructing and maintaining infrastructure that meets the highest standards of quality and safety.',
                'photo' => '5.jpg',
            ],
            [
                'name' => 'Turnkey Solutions',
                'title' => 'Crafting landscapes for aesthetic and environmental harmony.',
                'desc' => 'At ORION, we offer comprehensive turnkey solutions that simplify the construction process for our clients. Our turnkey approach ensures that every project is managed from concept to completion, providing a seamless and hassle-free experience. We take full responsibility for all phases of the project, including design, procurement, construction, and commissioning. This model guarantees that the final product is ready for immediate use, allowing our clients to focus on their core business activities.',
                'photo' => '6.jpg',
            ],
            ];

            foreach ($data as $item) {
                DB::table('sectors')->insert([
                    'name' => $item['name'],
                    'title' => $item['title'],
                    'desc' => $item['desc'],
                    'photo' => $item['photo'],
                ]);
            }

    }
}
