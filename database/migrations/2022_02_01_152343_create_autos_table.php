<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->char('name',90)->default('');
            $table->char('gos_nomer',90)->default('');
            $table->char('color',90)->default('');
            $table->char('vin',90)->default('');
            $table->char('brand',90)->default('');
            $table->char('model',90)->default('');
            $table->integer('year')->default('0');
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
        Schema::dropIfExists('autos');
    }
}
