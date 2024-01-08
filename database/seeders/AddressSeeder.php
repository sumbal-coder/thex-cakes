<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $added_by = User::first()?->id;

        Address::create([
            'id' => 1,
            'added_by' => $added_by,
            'title' => 'Store in NYC',
            'address' => '3238 San Mateo Blvd NE',
            'optional_address' => '	3454 San Mateo Blvd NE',
            'phone_number' => '(505) 881-6200',
            'optional_phone_number' => '(505) 881-6200',
            'website' => 'www.example.com',
            'optional_website' => 'www.example2.com',
            'link' => 'https://google.com',
        ]);
    }
}
