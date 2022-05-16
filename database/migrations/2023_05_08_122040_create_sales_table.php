<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('suburb_id')->nullable();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('country_id')->references('id')
                ->on('countries')
                ->onDelete('set null');

            $table->foreign('state_id')->references('id')
                ->on('states')
                ->onDelete('set null');

            $table->foreign('city_id')->references('id')
                ->on('cities')
                ->onDelete('set null');

            $table->foreign('suburb_id')->references('id')
                ->on('suburbs')
                ->onDelete('set null');
                
            $table->string('description');
            $table->enum('status', ['Activa', 'Vendida'])->default('Activa');
            $table->enum('property_type', ['Casa', 'Departamento', 'Terreno']);
            $table->string('street');
            $table->string('price');
            $table->enum('sale_type', ['Renta', 'Venta', 'Preventa']);
            $table->timestamp('sold_at')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
