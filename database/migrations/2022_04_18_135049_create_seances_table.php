<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');
            $table->boolean('active');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->foreignId('id_ens')->constrained('enseignants')->onDelete('cascade');
            $table->foreignId('id_mat')->constrained('matieres')->onDelete('cascade');$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
