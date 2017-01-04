<?php

use Cars\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create(['name' => '4 wheel drive']);
        Feature::create(['name' => 'ABS brakes']);
        Feature::create(['name' => '9 Speakers']);
        Feature::create(['name' => 'DVD player']);
        Feature::create(['name' => 'Mp3 decoder']);
        Feature::create(['name' => 'Security System']);
    }
}
