<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'web' => env('CONTACT_WEB'),
            'email' => env('CONTACT_EMAIL'),
            'phone' => env('CONTACT_PHONE'),
            'location' => env('CONTACT_LOCATION'),
            'github' => env('CONTACT_GITHUB'),
            'linkedin' => env('CONTACT_LINKEDIN'),
        ]);
    }
}
