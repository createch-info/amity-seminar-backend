<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('capacity')->default(45);
            $table->date('seminar_date');
            $table->string('start_time');
            $table->enum('timeformat1',['AM','PM'])->default('AM');
            $table->string('end_time');
            $table->enum('timeformat2',['AM','PM'])->default('AM');
            $table->string('venue_address');
            $table->string('description');
            $table->float('cost_per_seat');
            $table->integer('reminder_numbers');
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
        Schema::dropIfExists('seminars');
    }
}
