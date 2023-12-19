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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('email')->nullable();
            $table->string('last_name')->after('email')->nullable();
            $table->string('avatar')->after('password')->default('public/images/avatars/face1.jpg');
            $table->integer('staff_id')->after('password')->nullable();
            $table->string('w_phone')->after('password')->nullable();
            $table->string('m_phone')->after('password')->nullable();
            $table->integer('role_id')->after('password')->nullable();
            $table->boolean('banned')->after('password')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('avatar');
            $table->dropColumn('staff_id');
            $table->dropColumn('w_phone');
            $table->dropColumn('m_phone');
            $table->dropColumn('role_id');
            $table->dropColumn('banned');
        });
    }
};
