<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_invoices', function (Blueprint $table) {
            $table->id()->uniqid();
            $table->date('invoice_date');
            $table->String('To');
            $table->unsignedBigInteger('id_sales')->index();
            $table->unsignedBigInteger('id_courier')->index();
            $table->string('Ship_to');
            $table->boolean('payment')->default(0);
            $table->BigInteger('SubTotal');
            $table->BigInteger('Courierfee');
            $table->timestamps();
            $table->foreign('id_sales')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('id_courier')->references('id')->on('couriers')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_invoices');
    }
}
