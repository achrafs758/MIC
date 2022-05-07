<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('titre');
            $table->date('date');
            $table->longText('resume');
            $table->enum('importance', [1, 2, 3, 4, 5]);
            $table->enum('type', ['evenement', 'actualite']);
            $table->string('img');
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
        Schema::dropIfExists('actualites');
    }
}
