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
            'web' => env('CONTACTWEB'),
            'email' => env('CONTACTEMAIL'),
            'phone' => env('CONTACTPHONE'),
            'location' => env('CONTACTLOCATION'),
        ]);
    }
}

