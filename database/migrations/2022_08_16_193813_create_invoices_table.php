<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->constrained('clients');
            $table->string("invoice_no");
            $table->bigInteger("sub_total");
            $table->bigInteger("tax_amount");
            $table->bigInteger("total_amount");
            $table->bigInteger("paid_amount")->default(0);
            $table->bigInteger("due_amount");
            $table->double("tax");
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
        Schema::dropIfExists('incoices');
    }
};
