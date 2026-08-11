<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        if (Certificate::count() > 0) {
            return;
        }

        $safetyIntro = 'Orion is committed to a policy of safe working condition and practices, for all its employees. '
            . 'This includes all workers in projects sites, hence all necessary precautions are taken to prevent adverse '
            . 'effects on its employees, equipment and the environment in which its activates are taking place. '
            . 'This commitment to safety is communicated to all employees and its subcontractors by prominent display '
            . 'on the project sites. It is the responsibility of all employees to understand their role in fulfilling '
            . 'this policy and follow the safety instructions and guidelines for the welfare of all.';

        $certificates = [
            [
                'title' => 'ISO 9001:2015',
                'subtitle' => 'Quality management',
                'description' => $safetyIntro,
                'summary' => 'Our company is proudly certified with ISO 9001:2015, the international standard for '
                    . 'Quality Management Systems (QMS). This certification underscores our commitment to consistently '
                    . 'providing products and services that meet customer and regulatory requirements, enhancing '
                    . 'customer satisfaction through effective application of the system.',
                'points' => [
                    ['title' => 'Customer Focus', 'text' => 'Meet and exceed customer expectations.'],
                    ['title' => 'Effective Processes', 'text' => 'Implement efficient, consistent processes.'],
                    ['title' => 'Continuous Improvement', 'text' => 'Regularly enhance quality management.'],
                    ['title' => 'Stakeholder Trust', 'text' => 'Build confidence through quality assurance.'],
                ],
                'closing_text' => 'By achieving ISO 9001:2015 certification, we demonstrate our dedication to '
                    . 'maintaining high standards of quality management, ultimately contributing to the overall '
                    . 'success and sustainability of our business.',
                'sort_order' => 1,
                'image' => 'صورة5.png',
            ],
            [
                'title' => 'ISO 14001:2015 {EMS}',
                'subtitle' => 'Environment management',
                'description' => $safetyIntro,
                'summary' => 'Our company is proudly certified with ISO 14001:2015, the international standard for '
                    . 'Environmental Management Systems (EMS). This certification highlights our commitment to '
                    . 'environmental responsibility and sustainable practices. By adhering to the rigorous requirements '
                    . 'of ISO 14001:2015, we systematically manage our environmental impact and continuously improve '
                    . 'our environmental performance.',
                'points' => [
                    ['title' => 'Environmental Performance', 'text' => 'Reduce footprint, efficient resource use.'],
                    ['title' => 'Regulatory Compliance', 'text' => 'Meet environmental laws and standards.'],
                    ['title' => 'Risk Management', 'text' => 'Identify and manage environmental risks.'],
                    ['title' => 'Continuous Improvement', 'text' => 'Enhance EMS through audits and updates.'],
                    ['title' => 'Stakeholder Trust', 'text' => 'Build confidence in environmental responsibility.'],
                ],
                'closing_text' => 'By achieving ISO 14001:2015 certification, we demonstrate our dedication to '
                    . 'protecting the environment and promoting sustainable practices, ultimately contributing to '
                    . 'the overall success and sustainability of our business.',
                'sort_order' => 2,
                'image' => 'صورة4.png',
            ],
            [
                'title' => 'ISO 45001:2018',
                'subtitle' => 'Health & Safety Management system',
                'description' => $safetyIntro,
                'summary' => 'Our company is proudly certified with ISO 45001:2018, the international standard for '
                    . 'Occupational Health and Safety Management Systems (OH&S). This certification underscores our '
                    . 'commitment to providing a safe and healthy workplace for our employees, contractors, and '
                    . 'visitors. By adhering to the rigorous requirements of ISO 45001:2018, we systematically manage '
                    . 'and mitigate risks associated with occupational health and safety.',
                'points' => [
                    ['title' => 'Enhanced Safety', 'text' => 'Prioritize workforce well-being, control hazards.'],
                    ['title' => 'Regulatory Compliance', 'text' => 'Meet legal and safety standards.'],
                    ['title' => 'Risk Management', 'text' => 'Identify and manage safety risks.'],
                    ['title' => 'Continuous Improvement', 'text' => 'Regular audits, reviews, safety updates.'],
                    ['title' => 'Stakeholder Confidence', 'text' => 'Foster trust, reliable contracting reputation.'],
                ],
                'closing_text' => 'By achieving ISO 45001:2018 certification, we demonstrate our dedication to '
                    . 'maintaining high standards of health and safety management, ultimately contributing to the '
                    . 'overall success and sustainability of our business.',
                'sort_order' => 3,
                'image' => 'صورة3.png',
            ],
            [
                'title' => 'Main Trade License (UAE)',
                'subtitle' => 'Commercial Licence',
                'description' => null,
                'summary' => null,
                'points' => [],
                'closing_text' => null,
                'sort_order' => 4,
                'image' => 'صورة1.png',
            ],
            [
                'title' => 'Main Trade License (KSA)',
                'subtitle' => 'Commercial Licence',
                'description' => null,
                'summary' => null,
                'points' => [],
                'closing_text' => null,
                'sort_order' => 5,
                'image' => 'صورة2.jpg',
            ],
        ];

        foreach ($certificates as $data) {
            $imageFile = $data['image'];
            unset($data['image']);

            $certificate = Certificate::create($data);

            $imagePath = public_path('orionFrontAssets/assets/images/certificate/' . $imageFile);
            if (is_file($imagePath)) {
                $certificate->addMedia($imagePath)
                    ->preservingOriginal()
                    ->toMediaCollection('certificates');
            }
        }
    }
}
