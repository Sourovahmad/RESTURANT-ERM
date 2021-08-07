<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_order_limits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->integer('total_customer');
            $table->unsignedBigInteger('order_limit');
            $table->unsignedBigInteger('total_orderd');
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
        Schema::dropIfExists('table_order_limits');
    }
}
