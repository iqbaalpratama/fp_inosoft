<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInstructionsTable extends Migration
{
    protected $collection = 'instructions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions', function ($collection) {
            $collection->id();
            $collection->string('instruction_type');
            $collection->string('associates.vendor_name');
            $collection->string('associates.vendor_addres');
            $collection->string('attention_of');
            $collection->string('quatation_no');
            $collection->string('invoice.name');
            $collection->string('invoice.status');
            $collection->string('associates.customer_contract');
            $collection->string('associates.customer_po_no');
            $collection->string('desc');
            $collection->integer('qty');
            $collection->string('uom');
            $collection->integer('unit_price');
            $collection->integer('disc');
            $collection->integer('tax');
            $collection->double('invoice.total');
            $collection->string('charge');
            $collection->string('notes');
            $collection->string('attachtment');
            $collection->string('link');
            $collection->timestamps();
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