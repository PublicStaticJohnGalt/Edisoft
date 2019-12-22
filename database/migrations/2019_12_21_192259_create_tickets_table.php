<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('type');
            $table->tinyInteger('priority');
            $table->text('description');
            $table->string('client_phone');
            $table->string('client_email')->nullable();
            $table->string('client_full_name');
            $table->text('comment')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('locked_till')->nullable();
            $table->bigInteger('locked_by')->nullable();
            $table->time('estimated_time')->nullable();
            $table->bigInteger('spent_time')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
