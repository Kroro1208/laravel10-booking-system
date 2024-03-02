<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test@example.com'
        ]);

        Country::create(['name' => '日本']);
        Country::create(['name' => 'アメリカ']);
        City::create(['country_id' => 1, 'name' => '東京']);
        City::create(['country_id' => 1, 'name' => '福岡']);
        City::create(['country_id' => 1, 'name' => '大阪']);
        City::create(['country_id' => 2, 'name' => 'ニューヨーク']);
        City::create(['country_id' => 2, 'name' => 'ロサンぜルス']);
        City::create(['country_id' => 2, 'name' => 'マンハッタン']);

        Tag::create(['name' => 'Laravel', 'slug' => 'laravel']);
        Tag::create(['name' => 'React', 'slug' => 'react']);
        Tag::create(['name' => 'TypeScript', 'slug' => 'typescript']);
    }
}
