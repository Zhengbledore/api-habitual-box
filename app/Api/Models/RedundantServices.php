<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-11-9
 * Time: 下午1:59
 */

namespace App\Api\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RedundantServices
 * @package App\Models
 */
class RedundantServices extends Model
{
    use Searchable;

    /*
    |--------------------------------------------------------------------------
    | Combination data
    |--------------------------------------------------------------------------
    |
    | Just catch data what I need to give ElasticSearch,
    | and become a new table to save Redundant Data, That will more
    | easier to create and update and search a Index for ElasticSearch.
    |
    */

    protected $table = 'redundant_services';
    protected $primaryKey = 'service_id';
    public $incrementing = false;

    protected $fillable = [
        'service_id',
        'service_name',
        'light_price',
        'heavy_price',
        'start_site_of_route',
        'end_site_of_route',
        'route_sites',
        'good_rate',
        'sell_completed',
        'shipping_time'
    ];
}