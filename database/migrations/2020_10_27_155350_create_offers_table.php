<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('title_en')->nullable();
            $table->date('date_from');
            $table->date('date_to');
            $table->float('price_mp');
            $table->float('price_pc');
            $table->boolean('active')->default(true);
            $table->text('subtitle');
            $table->text('subtitle_en')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
