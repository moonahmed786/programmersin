<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General settings
            [
                'key' => 'site_name',
                'value' => 'Programmersin',
                'group' => 'general',
                'label' => 'Site Name',
                'type' => 'text',
            ],
            [
                'key' => 'site_logo',
                'value' => null,
                'group' => 'general',
                'label' => 'Site Logo',
                'type' => 'file',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@programmersin.com',
                'group' => 'general',
                'label' => 'Contact Email',
                'type' => 'text',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 (234) 567-890',
                'group' => 'general',
                'label' => 'Contact Phone',
                'type' => 'text',
            ],

            // SEO settings
            [
                'key' => 'meta_title',
                'value' => 'Programmersin - Modern IT Solutions & Software House',
                'group' => 'seo',
                'label' => 'Meta Title',
                'type' => 'text',
            ],
            [
                'key' => 'meta_description',
                'value' => 'We provide top-notch software development, project management, and digital transformation services.',
                'group' => 'seo',
                'label' => 'Meta Description',
                'type' => 'textarea',
            ],
            [
                'key' => 'meta_keywords',
                'value' => 'software house, laravel, web development, it solutions',
                'group' => 'seo',
                'label' => 'Meta Keywords',
                'type' => 'text',
            ],

            // Social links
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/programmersin',
                'group' => 'social',
                'label' => 'Facebook URL',
                'type' => 'text',
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com/programmersin',
                'group' => 'social',
                'label' => 'Twitter URL',
                'type' => 'text',
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com/company/programmersin',
                'group' => 'social',
                'label' => 'LinkedIn URL',
                'type' => 'text',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/programmersin',
                'group' => 'social',
                'label' => 'Instagram URL',
                'type' => 'text',
            ],

            // SMTP / Mail settings (stubs)
            [
                'key' => 'mail_host',
                'value' => 'smtp.mailtrap.io',
                'group' => 'smtp',
                'label' => 'Mail Host',
                'type' => 'text',
            ],
            [
                'key' => 'mail_port',
                'value' => '2525',
                'group' => 'smtp',
                'label' => 'Mail Port',
                'type' => 'text',
            ],
            [
                'key' => 'mail_username',
                'value' => null,
                'group' => 'smtp',
                'label' => 'Mail Username',
                'type' => 'text',
            ],
            [
                'key' => 'mail_password',
                'value' => null,
                'group' => 'smtp',
                'label' => 'Mail Password',
                'type' => 'text',
            ],
            [
                'key' => 'mail_encryption',
                'value' => 'tls',
                'group' => 'smtp',
                'label' => 'Mail Encryption',
                'type' => 'text',
            ],

            // CMS / CTA / Footer settings
            [
                'key' => 'cta_text',
                'value' => 'Ship in 14 Days',
                'group' => 'general',
                'label' => 'Header CTA Text',
                'type' => 'text',
            ],
            [
                'key' => 'cta_url',
                'value' => '/contact-us',
                'group' => 'general',
                'label' => 'Header CTA URL',
                'type' => 'text',
            ],
            [
                'key' => 'footer_about',
                'value' => 'Hyper-speed AI-First engineering for the world\'s most ambitious companies.',
                'group' => 'general',
                'label' => 'Footer About Text',
                'type' => 'textarea',
            ],
            [
                'key' => 'footer_copyright',
                'value' => '© 2024 ProgrammersIn. Velocity First.',
                'group' => 'general',
                'label' => 'Footer Copyright Text',
                'type' => 'text',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
