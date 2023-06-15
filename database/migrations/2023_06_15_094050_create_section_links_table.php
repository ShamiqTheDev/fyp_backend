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
        Schema::create('section_links', function (Blueprint $table) {
            $table->id();

            $table->integer('menu_section_id');
            $table->string('title');
            $table->string('link');
            $table->string('img_link');
            $table->string('sort');
            $table->string('html_class')->nullable();

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
        Schema::dropIfExists('section_links');
    }
};
