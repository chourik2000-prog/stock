<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertes', function (Blueprint $table) {
            $table->id();
            $table->integer('qperdue');
            $table->date('date');
            $table->Integer('id_article')->unsigned();
            $table->Integer('id_annee')->unsigned();
            $table->foreign('id_article')->references('id')->on('articles');
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
        Schema::dropIfExists('pertes');
    }
}
