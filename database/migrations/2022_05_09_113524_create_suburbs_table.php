<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuburbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suburbs', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code');
            $table->string('suburb_name');

            $table->unsignedBigInteger('city_id')->nullable();

            $table->foreign('city_id')->references('id')
                ->on('cities')
                ->onDelete('set null');

            $table->string('sale_m2');
            $table->string('pre_sale_m2');
            $table->string('total_population');
            $table->string('total_male');
            $table->string('total_female');

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
        Schema::dropIfExists('suburbs');
    }
}
