<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestElasticSearchBuilder extends TestCase
{
//    use DatabaseMigrations;

    public function test_setting_mapping()
    {
        $builder = new \App\Api\Extensions\CustomScout\TypesBuilder\Builder();
        $builder->buildTypesForMyApp('redundant_services');
    }
}
