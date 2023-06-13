<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'LocalHost Portal',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'LocalHost',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'localhostnp@gmail.com',
        ],
        [
            'key'                       =>  'currency_code',
            'value'                     =>  'NPR',
        ],
        [
            'key'                       =>  'currency_symbol',
            'value'                     =>  'Nrs',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  'LocalHost Pvt. Ltd.',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  'facebook.com/localhostnp',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  'facebook.com/localhost9',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_secret_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_client_id',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_secret_id',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'address',
            'value'                     =>  'Pulchowk, Jhamsikhel',
        ],
        [
            'key'                       =>  'phone',
            'value'                     =>  '+977-9860684980',
        ],
        [
            'email'                       =>  'Email',
            'value'                       =>  'info@localhost.com.np',
        ],

        [
            'latitude'                       =>  'Latitude',
            'value'                          =>  '27.6744',
        ],

        [
            'longitude'                       =>  'Longitude',
            'value'                           =>  '85.3096',
        ],
        [
            'website'                       =>  'paypal_secret_id',
            'value'                     =>  '',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
