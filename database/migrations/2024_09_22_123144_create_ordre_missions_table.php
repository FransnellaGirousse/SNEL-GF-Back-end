<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordre_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tdr');
            $table->dateTime('date_départ');
            $table->string('origine');
            $table->string('destination');
            $table->string('autorisation');
            $table->string('fund');
            $table->string('price');
            $table->string('mode_travels');
            $table->string('hotels_details')->nullable();
            $table->string('others');
            $table->enum('etat', ['soumis', 'validé']);
            $table->timestamps();

            $table->foreign('id_tdr')->references('id')->on('tdrs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordre_missions');
    }
};
