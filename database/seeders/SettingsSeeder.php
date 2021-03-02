<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            
            'blog_name'    => 'CMS Blog',
            'phone_number' =>  '00 987 651 354',
            'blog_email'   =>  'osama@gmail.com',
            'address'      =>  'Egypt'

        ]);
    }
}
