<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    public function run()
    {
        Website::create([
            'name' => 'website 1',
            'description' => 'long text...'
        ]);

        Website::create([
            'name' => 'website 2',
            'description' => 'long text...'
        ]);

        Website::create([
            'name' => 'website 3',
            'description' => 'long text...'
        ]);
    }
}
