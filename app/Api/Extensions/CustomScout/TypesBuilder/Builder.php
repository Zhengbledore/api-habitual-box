<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-11-12
 * Time: 上午12:24
 */

namespace App\Api\Extensions\CustomScout\TypesBuilder;

use Elasticsearch\ClientBuilder as Elasticsearch;

/**
 * Class Builder
 * @package App\Api\Extensions\CustomScout\TypesBuilder
 */
class Builder
{
    /**
     * Relational DB -> Databases -> Tables -> Rows -> Columns diff with
     * Elasticsearch -> Indices   -> Types  -> Documents -> Fields
     * @var \Elasticsearch\Client $elasticsearch
     */
    protected $client;

    public function __construct()
    {
        $this->client = $this->connection();
    }

    protected function connection()
    {
        return Elasticsearch::fromConfig(config('scout.elasticsearch.config'), true);
    }

    protected function create($index, $callback)
    {

    }

    protected function addFields()
    {

    }

    // Below is properties mapping for ElasticSearch's fields for setting
    // but I think is too many, so use Trait to include these


    // build Index's Type, and set mapping with Procedure Oriented
    public function buildTypesForMyApp($type)
    {
        $params = [
            'index' => config('scout.elasticsearch.index'),
            'body' => [
//                'settings' => [
//                    'number_of_shards' => 3,
//                    'number_of_replicas' => 2
//                ],
                'mappings' => [
                    $type => [
                        '_source' => [
                            'enabled' => true
                        ],
                        'properties' => [
                            'service_id' => [
                                'type' => 'text'
                            ],
                            'service_name' => [
                                'type' => 'text',
                                'analyzer' => 'ik_max_word',
                                'search_analyzer' => 'ik_max_word',
                                'include_in_all' => true,
                                "boost" => 8.0
                            ],
                            'light_price' => [
                                'type' => 'float'
                            ],
                            'heavy_price' => [
                                'type' => 'float'
                            ],
                            'start_site_of_route' => [
                                'type' => 'text'
                            ],
                            'end_site_of_route' => [
                                'type' => 'text'
                            ],
                            'route_sites' => [
                                'type' => 'text',
                                'analyzer' => 'ik_max_word',
                                'search_analyzer' => 'ik_max_word',
                                'include_in_all' => true,
                                "boost" => 8.0
                            ],
                            'good_rate' => [
                                'type' => 'float'
                            ],
                            'sell_completed' => [
                                'type' => 'integer'
                            ],
                            'shipping_time' => [
                                'type' => 'integer'
                            ],
                            'created_at' => [
                                'type' => 'date',
                                'format' => 'yyy-MM-dd HH:mm:ss'
                            ],
                            'updated_at' => [
                                'type' => 'date',
                                'format' => 'yyy-MM-dd HH:mm:ss'
                            ]
                        ]
                    ]
                ]
            ]
        ];
dump($params);
        $response = $this->client->indices()->create($params);
    }

}