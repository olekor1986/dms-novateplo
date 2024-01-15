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
        Schema::table('boilers', function (Blueprint $table) {
            $table->integer('burner_type_id')->after('boiler_fuel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boilers', function (Blueprint $table) {
            $table->dropColumn('burner_type_id');
        });
    }
};
