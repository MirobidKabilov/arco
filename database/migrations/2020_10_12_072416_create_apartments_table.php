<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id');
            $table->integer('number')->unsigned();
            $table->float('total_area', 8, 2);
            $table->float('balcony', 8, 2);
            $table->smallInteger('rooms');
            $table->smallInteger('entrance');
            $table->float('ceiling_height', 8, 2);
            $table->decimal('price', 12, 2);
            $table->smallInteger('status');
            $table->string('img')->nullable();
            $table->string('img_schema')->nullable();
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
        Schema::dropIfExists('apartments');
    }
}
