<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_reports', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date du rapport
            $table->string('mission_location'); // Lieu de la mission
            $table->text('mission_objectives'); // Objectifs de la mission
            $table->string('name_of_missionary'); // Nom du missionnaire
            $table->text('next_steps'); // Prochaines étapes
            $table->text('object'); // Objet de la mission
            $table->text('point_to_improve'); // Points à améliorer
            $table->text('progress_of_activities'); // Progrès des activités
            $table->text('recommendations'); // Recommandations
            $table->text('strong_points'); // Points forts
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
        Schema::dropIfExists('mission_reports');
    }
}
