<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $collection->string('vendor_name');
            $collection->string('vendor_addres');
            $collection->string('attention_of');
            $collection->string('quatation_of');
            $collection->string('invoice.name');
            $collection->string('invoice.status');
            $collection->string('desc');
            $collection->integer('qty');
            $collection->string('uom');
            $collection->integer('unit_price');
            $collection->integer('disc');
            $collection->integer('tax');
            $collection->integer('invoice.total');
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
