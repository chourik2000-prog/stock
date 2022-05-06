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

            $table->foreignId('id_article')
            ->constrained('articles')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('id_agent')
            ->constrained('agents')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('id_annee')
            ->constrained('annees')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
