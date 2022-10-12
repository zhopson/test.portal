<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoParValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anno_par_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dop_par_id');
            $table->unsignedInteger('dop_par_value_id');
            $table->unsignedInteger('announce_id');

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
        Schema::dropIfExists('anno_par_values');
    }
}
