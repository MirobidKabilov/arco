<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->string('title_ru', 255);
            $table->string('title_uz', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->text('short_text_ru', 255)->nullable();
            $table->text('short_text_uz', 255)->nullable();
            $table->text('short_text_en', 255)->nullable();
            $table->text('text_ru');
            $table->text('text_uz')->nullable();
            $table->text('text_en')->nullable();
            $table->string('alias', 255);
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
        Schema::dropIfExists('pages');
    }
}
