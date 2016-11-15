<?php

$factory->define(App\Api\Models\RedundantServices::class, function (Faker\Generator $faker) {
    return [
        'service_id' => $faker->unique()->uuid,
//        'service_name' => 'Dr.',
        'service_name' => '中国驻洛杉矶领事馆遭亚裔男子枪击 嫌犯已自首',
        'light_price' => $faker->randomFloat(2, 0, 4000),
        'heavy_price' => $faker->randomFloat(2, 0, 4000),
        'start_site_of_route' => $faker->city,
        'end_site_of_route' => $faker->city,
        'route_sites' => '中国,洛杉矶,美国',
        'good_rate' => 0.4,
        'sell_completed' => $faker->randomNumber(),
        'shipping_time' => $faker->randomNumber(),
    ];
});
