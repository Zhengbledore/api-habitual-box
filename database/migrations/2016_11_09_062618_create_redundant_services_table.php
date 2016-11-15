<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedundantServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redundant_services', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('service_id')->unique()->comment('运输线路id');
            $table->string('service_name')->comment('路线标题');
            $table->decimal('light_price', 6, 2)->unsigned()->comment('轻货价格/立方');
            $table->decimal('heavy_price', 6, 2)->unsigned()->comment('重货价格/公斤');
            $table->string('start_site_of_route')->comment('线路起始站');
            $table->string('end_site_of_route')->comment('线路终点站');
            $table->string('route_sites')->comment('线路各个站点');
            $table->decimal('good_rate', 6, 2)->comment('好评率');
            $table->unsignedInteger('sell_completed')->comment('销售量');
            $table->unsignedInteger('shipping_time')->comment('运输时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('redundant_services');
    }
}
