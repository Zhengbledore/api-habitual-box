<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestRedundantServices extends TestCase
{
//    use DatabaseMigrations;

    public function test_create_with_trait()
    {
        $services = factory(App\Api\Models\RedundantServices::class, 3)->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $services);

    }

    public function test_update_with_trait()
    {
        $redundantServices = new App\Api\Models\RedundantServices;
        $services = $redundantServices->first();
        $services->service_name = 'this is abcccc';
        $this->assertTrue($services->save());
    }

    public function test_delete_with_trait()
    {
        $redundantServices = new App\Api\Models\RedundantServices;
        $services = $redundantServices->first();
        $this->assertTrue($services->delete());
    }

    public function test_search_with_trait()
    {
        $redundantServices = new App\Api\Models\RedundantServices;
        $searchResult = $redundantServices->search('Dr.')->get();
    }
}
