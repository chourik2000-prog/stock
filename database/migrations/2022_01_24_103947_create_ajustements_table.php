<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjustementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajustements', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->string('motif');
            $table->integer('idAppro')->unsigned();
            $table->timestamps();
            $table->foreign('idAppro')->references('id')->on('approvisionnements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajustements');
    }
}
