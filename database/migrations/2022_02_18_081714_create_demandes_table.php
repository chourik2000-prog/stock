<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->integer('qlivree');
            $table->date('date');
            $table->Integer('id_agent')->unsigned();
            $table->Integer('id_article')->unsigned();
            $table->Integer('id_annee')->unsigned();
            $table->foreign('id_article')->references('id')->on('articles');
            $table->foreign('id_agent')->references('id')->on('agents');
            $table->foreign('id_annee')->references('id')->on('annees');

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
        Schema::dropIfExists('demandes');
    }
}
