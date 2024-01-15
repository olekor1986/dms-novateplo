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
        Schema::create('boilers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('energy_carrier')->nullable();
            $table->float('power')->nullable();
            $table->float('efficient')->nullable();
            $table->string('mount_year')->nullable();
            $table->string('launch_year')->nullable();
            $table->string('index_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('reg_number')->nullable();
            $table->string('check_date')->nullable();
            $table->boolean('in_work')->default(true);
            $table->integer('source_id');
            $table->integer('boiler_fuel_id');
            $table->integer('created_by')->nullable();
            $table->integer('edited_by')->nullable();
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
        Schema::dropIfExists('boilers');
    }
};
