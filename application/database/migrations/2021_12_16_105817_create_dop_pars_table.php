<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDopParsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dop_pars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
//            $table->enum('type', ['int','str','bool']);
            $table->unsignedInteger('par_type_id');
            $table->unsignedInteger('categorie_id');
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
        Schema::dropIfExists('dop_pars');
    }
}
