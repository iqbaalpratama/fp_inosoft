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
<<<<<<< HEAD
        Schema::create('instructions', function ($collection) {
            $collection->id();
            $collection->string('instruction_id');
            $collection->string('instruction_type');
            $collection->string('associates_vendor_name');
            $collection->string('associates_vendor_addres');
            $collection->string('attention_of');
            $collection->string('quatation_no');
            $collection->string('invoice.name');
            $collection->string('invoice.status');
            $collection->string('associates_customer_contract');
            $collection->string('associates_customer_po_no');
            $collection->string('desc');
            $collection->integer('qty');
            $collection->string('uom');
            $collection->integer('unit_price');
            $collection->integer('disc');
            $collection->integer('tax');
            $collection->string('curenncy');
            $collection->float('invoice.total');
            $collection->string('charge');
            $collection->string('notes');
            $collection->string('attachtment');
            $collection->string('link');
            $collection->timestamps();
=======
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
>>>>>>> fix/attachment
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
