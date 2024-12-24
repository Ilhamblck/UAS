<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('murid', function (Blueprint $table) {
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
        });
    }

    public function down()
    {
        Schema::table('murid', function (Blueprint $table) {
            $table->dropColumn(['alamat', 'no_hp']);
        });
    }

};
