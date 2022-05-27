<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    protected $collection = 'invoices';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function ($collection) {
            $collection->id();
            $collection->string('name');
            $collection->string('status');
            $collection->string('total_bill');
            $collection->string('invoice_detail');
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
        Schema::dropIfExists('invoices');
    }
}
