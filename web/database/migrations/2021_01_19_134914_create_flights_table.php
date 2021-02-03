<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_no', 150);

            $table->foreignId('departure_airport_id')->constrained('airports');
            $table->string('departure_gate', 3);
            $table->timestamp('departure_timestamp')->useCurrent();
            $table->string('departure_terminal', 3);

            $table->foreignId('arrival_airport_id')->constrained('airports');
            $table->string('arrival_terminal', 3);
            $table->timestamp('arrival_timestamp')->useCurrent();
            $table->string('arrival_gate', 3);


            $table->date('created_at')->useCurrent();
            $table->date('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
