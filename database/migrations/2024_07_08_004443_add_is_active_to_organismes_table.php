<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('organismes', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });
    }

    public function down()
    {
        Schema::table('organismes', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }

};
