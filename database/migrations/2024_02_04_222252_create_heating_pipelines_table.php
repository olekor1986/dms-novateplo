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
        Schema::create('heating_pipelines', function (Blueprint $table) {
            $table->id();
            $table->integer('source_id');
            $table->string('pipe_start')->nullable();
            $table->string('pipe_end')->nullable();
            $table->integer('direct_diam')->nullable();
            $table->integer('reverse_diam')->nullable();
            $table->float('length')->nullable();
            $table->integer('purpose_type')->nullable();
            $table->integer('laying_type')->nullable();
            $table->integer('ins_type')->nullable();
            $table->integer('ins_cond')->nullable();
            $table->integer('ins_thick')->nullable();
            $table->float('height')->nullable();
            $table->string('build_year')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('heating_pipelines');
    }
};
