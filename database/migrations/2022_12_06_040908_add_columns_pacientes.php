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
        Schema::table('pacientes', function (Blueprint $table) {
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('birth_date')->nullable();
            $table->string('phone_number', 9)->nullable();
            $table->string('email', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropIfExists('first_name');
            $table->dropIfExists('last_name');
            $table->dropIfExists('birth_date');
            $table->dropIfExists('phone_number');
            $table->dropIfExists('email');
        });
    }
};