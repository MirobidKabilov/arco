<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('title_ru');
            $table->string('title_uz')->nullable();
            $table->string('title_en')->nullable();
            $table->string('short_text_ru');
            $table->string('short_text_uz')->nullable();
            $table->string('short_text_en')->nullable();
            $table->text('text_ru');
            $table->text('text_uz')->nullable();
            $table->text('text_en')->nullable();
            $table->string('type');
            $table->unsignedBigInteger('view_count')->default(0);
            $table->dateTime('published_at');
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
        Schema::dropIfExists('news');
    }
}
