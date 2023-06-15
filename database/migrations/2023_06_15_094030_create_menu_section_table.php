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
        Schema::create('menu_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->integer('main_menu_id');
            $table->string('link')->nullable();
            $table->string('img_link');
            $table->string('html_class')->nullable();
            $table->string('sort');

            $table->enum('type', [ 'links_list', 'cards' ])->default('links_list');

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
        Schema::dropIfExists('menu_sections');
    }
};
