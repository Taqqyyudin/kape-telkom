<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Node extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Nodes', function (Blueprint $table) {
            $table->id();
            $table->string('REGION');
            $table->string('HOSTNAME')->unique();
            $table->string('IP')->unique();
            $table->integer('JUMLAH HU');
            $table->integer('IDLE HU (100G)');
            $table->integer('JUMLAH TE');
            $table->integer('IDLE TE (10G)');
            $table->integer('JUMLAH GI');
            $table->integer('IDLE GI (1G)');
            $table->integer('JUMLAH INTERFACE');
            $table->integer('IDLE INTERFACE (1G)');
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
        //
    }
}
