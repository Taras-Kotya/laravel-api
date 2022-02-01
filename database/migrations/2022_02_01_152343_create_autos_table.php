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
            $table->char('name',35)->default('');
            $table->char('gos_nomer',35)->default('');
            $table->char('color',35)->default('');
            $table->char('vin',35)->default('');
            $table->char('brand',35)->default('');
            $table->char('model',35)->default('');
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
