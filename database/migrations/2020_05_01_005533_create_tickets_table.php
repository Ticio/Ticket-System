<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->date('pickup_date')->nullable();
            $table->date('handover_date')->nullable();

            $table->integer('requester_id')->unsigned();
            $table->foreign('requester_id')->references('id')->on('users')->onDelete('CASCADE');

            $table->integer('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('CASCADE');

            $table->integer('ticket_status_id')->unsigned()->nullable();
            $table->foreign('ticket_status_id')->references('id')->on('ticket_statuses')->onDelete('CASCADE');

            $table->integer('ticket_priority_id')->unsigned()->nullable();
            $table->foreign('ticket_priority_id')->references('id')->on('ticket_priorities')->onDelete('CASCADE');

            $table->integer('ticket_type_id')->unsigned()->nullable();
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('CASCADE');

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
