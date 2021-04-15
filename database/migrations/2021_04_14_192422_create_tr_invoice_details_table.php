<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_invoice_details', function (Blueprint $table) {
            $table->unsignedBigInteger('id_invoice')->index();
            $table->unsignedBigInteger('id_product')->index();
            $table->unsignedBigInteger('weight');
            $table->Integer('qty');
            $table->unsignedBigInteger('sub_total');
            $table->timestamps();
            $table->foreign('id_invoice')->references('no_invoice')->on('tr_invoices')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('ms_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_invoice_details');
    }
}
