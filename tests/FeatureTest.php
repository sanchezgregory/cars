<?php

use Cars\Models\Feature;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTest extends TestCase
{
    use DatabaseTransactions;

    public function test_filter_features()
    {
        Feature::create(['name' => 'tag1']);
        Feature::create(['name' => 'tag2']);

        Feature::addNewFeatures(['tag1', 'tag2', 'tag3']);

        $this->assertSame(
            ['tag1','tag2','tag3'],
            Feature::pluck('name')->toArray()
        );

    }
}
