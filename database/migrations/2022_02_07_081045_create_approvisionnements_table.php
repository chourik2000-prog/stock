<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovisionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->id();
            $table->Integer('qexistant');
            $table->integer('qentrant');
            $table->date('date');
            $table->Integer('id_article')->unsigned();
            $table->Integer('id_fournisseur')->unsigned();
            $table->foreign('id_article')->references('id')->on('articles');
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
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
        Schema::dropIfExists('approvisionnements');
    }
}
