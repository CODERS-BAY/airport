<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingpassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardingpasses', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('price', $scale = 2);
            $table->string('seat_number', 5);
            $table->smallInteger('baggage');
            $table->smallInteger('boarding_prio');
            $table->string('type', 150); /* Gang, Mitte, Fensterplatz*/
            $table->timestamp('checkin')->nullable();
            $table->timestamp('saftycontrol')->nullable();
            $table->string('flight_no', 150);
            $table->foreignId('flight_id')->constrained('flights');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('boardingpasses');
    }
}
