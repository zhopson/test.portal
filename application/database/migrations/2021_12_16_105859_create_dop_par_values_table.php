<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDopParValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dop_par_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dop_par_id');

            $table->unsignedInteger('int_value')->nullable();
            $table->string('str_value')->nullable();
            $table->boolean('bool_value')->nullable();

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
        Schema::dropIfExists('dop_par_values');
    }
}
