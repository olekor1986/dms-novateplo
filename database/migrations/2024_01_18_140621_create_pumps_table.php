<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pumps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('max_capacity')->nullable();
            $table->float('max_pressure')->nullable();
            $table->float('engine_power')->nullable();
            $table->integer('engine_speed')->nullable();
            $table->string('engine_title')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('index_number')->nullable();
            $table->json('images')->nullable();
            $table->float('shaft_diam')->nullable();
            $table->integer('front_bearing_id')->nullable();
            $table->integer('rear_bearing_id')->nullable();
            $table->integer('mechanical_seal_id')->nullable();
            $table->boolean('in_work')->default(true);
            $table->integer('pump_type_id');
            $table->integer('source_id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('pumps');
    }
};
