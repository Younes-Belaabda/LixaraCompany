<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            // Box part
            $table->bigInteger('numero');
            $table->date('dateConsultation');
            $table->string('partNumber');
            $table->text('issue');
            $table->string('batchNumbers');
            $table->bigInteger('quantity');
            $table->bigInteger('goodParts');
            $table->bigInteger('ngParts');
            $table->bigInteger('rework');
            // Supplier part
            $table->string('supplierName');
            $table->string('supplierReference');
            $table->string('supplierIssue');
            $table->string('supplierClaimNumber');
            $table->string('supplierDateClaim');
            $table->string('technicien');
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
        Schema::dropIfExists('boxes');
    }
}
