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
        Schema::create('water_meters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('diameter');
            $table->string('serial_number')->nullable();
            $table->tinyInteger('purpose')->default(1);
            $table->string('check_date')->nullable();
            $table->string('made_year')->nullable();
            $table->tinyInteger('condition')->default(1);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('water_meters');
    }
};
