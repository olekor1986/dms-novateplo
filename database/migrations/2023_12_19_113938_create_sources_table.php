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
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->float('connected_power')->nullable();
            $table->string('gps')->nullable();
            $table->integer('source_type_id')->nullable();
            $table->integer('city_district_id')->nullable();
            $table->boolean('in_work')->default(true);
            $table->boolean('monitoring')->default(false);
            $table->boolean('balance')->default(true);
            $table->integer('master_id')->nullable();
            $table->integer('s_master_id')->nullable();
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
        Schema::dropIfExists('sources');
    }
};
