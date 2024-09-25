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
        Schema::create('request_in_advance', function (Blueprint $table) {
            $table->id();
            $table->string('additional_costs');
            $table->string('daily_rating_coefficient');
            $table->date('date');
            $table->text('informations');
            $table->string('per_diem_rate');
            $table->string('percentage_of_advance_required');
            $table->string('signature');
            $table->string('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_in_advance');
    }
};
