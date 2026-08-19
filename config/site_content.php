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

    'contact_page' => [
        'label' => 'Contact Page — Sections',
        'fields' => [
            'eyebrow_tagline' => ['label' => 'Intro Tagline', 'type' => 'text', 'default' => 'Happy To Contact Us'],
            'eyebrow_title' => ['label' => 'Intro Title', 'type' => 'textarea', 'default' => "Orion Contracting\nCompany"],
            'form_tagline' => ['label' => 'Form Tagline', 'type' => 'text', 'default' => 'Write a Message'],
            'form_title' => ['label' => 'Form Title', 'type' => 'textarea', 'default' => "We're always here to\nhelp you"],
        ],
    ],

    'footer' => [
        'label' => 'Site Footer',
        'fields' => [
            'tagline' => ['label' => 'Tagline (under logo)', 'type' => 'text', 'default' => 'We Build Your Vision Into Reality'],
        ],
    ],

    'about_page' => [
        'label' => 'About Page — Sections',
        'fields' => [
            'page_header_title' => ['label' => 'Page Header Title', 'type' => 'text', 'default' => 'About Orion'],
            'eyebrow_tagline' => ['label' => 'Intro Tagline', 'type' => 'text', 'default' => 'About Our Company'],
            'eyebrow_title' => ['label' => 'Intro Title', 'type' => 'textarea', 'default' => "Orion\nContracting Company"],
            'years_label' => ['label' => 'Experience Badge Label', 'type' => 'text', 'default' => 'Years of experience'],
            'get_to_know_tagline' => ['label' => '"Get to Know Us" Tagline', 'type' => 'text', 'default' => 'Get to Know us'],
            'mission_point_title' => ['label' => 'Mission Highlight — Title', 'type' => 'text', 'default' => 'Innovation in Construction'],
            'mission_point_text' => ['label' => 'Mission Highlight — Text', 'type' => 'textarea', 'default' => 'We strive for excellence in every project, delivering unparalleled quality and innovation to our clients.'],
            'vision_point_title' => ['label' => 'Vision Highlight — Title', 'type' => 'text', 'default' => 'Excellence in Delivery'],
            'vision_point_text' => ['label' => 'Vision Highlight — Text', 'type' => 'textarea', 'default' => 'We are committed to delivering superior projects on time and within budget, while fostering growth and development for our team.'],
            'capabilities_tagline' => ['label' => 'Capabilities Tagline', 'type' => 'text', 'default' => 'Get to Know us'],
            'capabilities_title' => ['label' => 'Capabilities Title', 'type' => 'text', 'default' => 'Staff, Manpower and Equipment Breakdown'],
            'capability_1' => ['label' => 'Capability Point 1', 'type' => 'text', 'default' => 'We Experienced in Dealing with Local Authorities'],
            'capability_2' => ['label' => 'Capability Point 2', 'type' => 'text', 'default' => 'We have Long Experience in Local Market and relationships with Key providers'],
            'capability_3' => ['label' => 'Capability Point 3', 'type' => 'text', 'default' => 'Dedicated Services After the Completion of the Contractual Commitment'],
        ],
    ],

];
