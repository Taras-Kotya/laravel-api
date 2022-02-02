<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('modelis', function (Blueprint $table) {
            $table->id();
            $table->integer('Make_ID')->default('0');
            $table->char('Make_Name',70)->default('');
            $table->integer('Model_ID')->default('0');
            $table->char('Model_Name',70)->default('');
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
        Schema::dropIfExists('models');
    }
}
