<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions', function ($table) {
            $table->id();
            $table->string('instruction_types');
            $table->string('associates_vendor_name');
            $table->string('associates_vendor_addres');
            $table->string('attention_of');
            $table->string('quatation_no');
            $table->string('invoice_name');
            $table->string('invoice_status');
            $table->string('associates_customer_contract');
            $table->string('associates_customer_po_no');
            $table->string('desc');
            $table->integer('qty');
            $table->string('uom');
            $table->integer('unit_price');
            $table->integer('disc');
            $table->integer('tax');
            $table->double('invoice.total');
            $table->string('charge');
            $table->string('notes');
            $table->string('link');
            $table->string('status');
            $table->string('cancel_reason');
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
        Schema::dropIfExists('instructions');
    }
}
