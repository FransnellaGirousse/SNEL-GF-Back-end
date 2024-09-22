<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->string('additional_costs'); // Coûts supplémentaires
            $table->string('daily_rating_coefficient'); // Coefficient journalier
            $table->date('date'); // Date de la demande
            $table->text('informations'); // Informations supplémentaires
            $table->string('per_diem_rate'); // Taux journalier
            $table->string('percentage_of_advance_required'); // Pourcentage de l'avance demandée
            $table->string('signature'); // Signature
            $table->string('total_amount'); // Montant total
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
        Schema::dropIfExists('purchase_requests');
    }
}
