<?php

/**
 * Declarative field definitions for the generic dashboard content editor
 * (Admin\ContentSettingController). Each top-level key is a Setting
 * "group"; adding a controllable field to a section means adding an
 * entry here, not writing a new admin Blade form.
 *
 * Field types: text, textarea, url, image.
 */

return [

    'home_video' => [
        'label' => 'Homepage — Video Section',
        'fields' => [
            'video_title' => [
                'label' => 'Title',
                'type' => 'textarea',
                'default' => "Best Of The Best Managers\nOnly To Make Your Dreams Come True",
            ],
            'video_url' => [
                'label' => 'YouTube URL',
                'type' => 'url',
                'default' => 'https://www.youtube.com/watch?v=3VSpvjEEdIQ',
            ],
            'video_background_image' => [
                'label' => 'Background Image',
                'type' => 'image',
            ],
        ],
    ],

    'home_certificates' => [
        'label' => 'Homepage — Certificates Carousel',
        'fields' => [
            'tagline' => ['label' => 'Tagline', 'type' => 'text', 'default' => 'Our Certificate'],
            'title' => ['label' => 'Title', 'type' => 'textarea', 'default' => "Orion\nYour Trusted Partner"],
        ],
    ],

    'home_sectors' => [
        'label' => 'Homepage — Sectors Carousel',
        'fields' => [
            'tagline' => ['label' => 'Tagline', 'type' => 'text', 'default' => 'Our Sectors'],
            'title' => ['label' => 'Title', 'type' => 'textarea', 'default' => "Sectors We\nServe"],
        ],
    ],

    'home_clients' => [
        'label' => 'Homepage — Clients Section',
        'fields' => [
            'tagline' => ['label' => 'Tagline', 'type' => 'text', 'default' => 'Our Clients'],
            'title' => ['label' => 'Title', 'type' => 'text', 'default' => 'Building Success Together'],
            'intro_text' => [
                'label' => 'Intro Paragraph',
                'type' => 'textarea',
                'default' => "At the heart of our success are the strong partnerships we've built with our clients. We believe in a collaborative approach, working hand-in-hand to achieve shared goals. Our clients are more than just business partners; they are integral to our journey, inspiring us to innovate and excel. Together, we build a foundation of trust, mutual respect, and lasting success.",
            ],
        ],
    ],

    'sectors_page' => [
        'label' => 'Sectors Page — Header',
        'fields' => [
            'tagline' => ['label' => 'Tagline', 'type' => 'text', 'default' => 'Checkout Our Sectors'],
            'title' => ['label' => 'Title', 'type' => 'textarea', 'default' => "Welcome to\nOrion Sectors"],
        ],
    ],

    'clients_page' => [
        'label' => 'Clients Page — Header',
        'fields' => [
            'tagline' => ['label' => 'Tagline', 'type' => 'text', 'default' => 'Trusted Partnerships'],
            'title' => ['label' => 'Title', 'type' => 'text', 'default' => "Organizations We've Built For"],
        ],
    ],

    'projects_page' => [
        'label' => 'Projects Page — Header',
        'fields' => [
            'title' => ['label' => 'Title', 'type' => 'text', 'default' => 'Projects'],
        ],
    ],

    'news_page' => [
        'label' => 'News & Events Page — Header',
        'fields' => [
            'title' => ['label' => 'Title', 'type' => 'text', 'default' => 'News & Events'],
        ],
    ],

];
