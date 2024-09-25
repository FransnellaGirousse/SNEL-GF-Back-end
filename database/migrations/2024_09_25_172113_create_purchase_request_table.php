<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request', function (Blueprint $table) {
            $table->id(); 
            $table->string('description'); 
            $table->decimal('estimated_total', 10, 2); 
            $table->decimal('estimated_unit_price', 10, 2); 
            $table->string('geo_code'); 
            $table->string('item'); 
            $table->text('notes'); 
            $table->string('project_code'); 
            $table->integer('quantity'); 
            $table->string('unit_type'); 
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
        Schema::dropIfExists('purchase_request');
    }
}
