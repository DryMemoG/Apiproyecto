<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombreproducto',100);
            $table->int('idtipoproducto');
            $table->foreign('idtipoproducto')->references('id')->on('tipoproducto');
            $table->double('precio');
            $table->int('cantidad');
            $table->int('idproveedor');
            $table->foreign('idproveedor')->references('id')->on('proveedor');
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
        Schema::dropIfExists('producto');
    }
}
