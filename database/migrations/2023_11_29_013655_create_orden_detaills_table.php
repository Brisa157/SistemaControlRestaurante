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
        Schema::create('orden_detaills', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('platillo_id');
            $table->timestamps();

             // Definir la clave foránea
             $table->foreign('order_id')->references('id')->on('ordenes');
             $table->foreign('platillo_id')->references('id')->on('platillos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_detaills');
    }
};
