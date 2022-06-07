<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->string('attachable_type');
            $table->unsignedBigInteger('attachable_id')->nullable();
            $table->uuid('attachable_uuid')->nullable();
            $table->string('type');
            $table->string('name');
            $table->string('path');
            $table->string('mime');
            $table->integer('size');
            $table->jsonb('options')->nullable();
            $table->timestamps();

            $table->index(['attachable_type', 'attachable_id'], 'attachable_id_index');
            $table->index(['attachable_type', 'attachable_uuid'], 'attachable_uuid_index');
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
        Schema::dropIfExists('attachments');
    }
}
