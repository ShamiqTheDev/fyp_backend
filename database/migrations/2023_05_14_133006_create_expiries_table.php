<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expiries', function (Blueprint $table) {
            $table->id();

            $table->integer('vehicle_id');
            $table->integer('part_id');
            // $table->enum('type', [ 'km', 'date' ])->nullable();
            $table->integer('expiry');
            $table->integer('notify_before');
            $table->text('note')->nullable();

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
        Schema::dropIfExists('expiries');
    }
};
