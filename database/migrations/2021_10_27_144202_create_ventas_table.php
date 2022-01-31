<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
      
            $table->date('venta_date');

            $table->decimal('tax');
            $table->decimal('total');

            $table->enum('estado',['VALIDO','CANCELADO'])->default('VALIDO');

            $table->text('hash')->nullable();
            $table->longText('ruta_qr')->nullable();
            $table->longText('ruta_pdf')->nullable();
            $table->enum('sunat',['0','1','2'])->default('0');
            
            $table->unsignedInteger("comprobante_id");
            $table->foreign('comprobante_id')->references("id")->on("comprobante")->onDelete("cascade");

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
        Schema::dropIfExists('ventas');
    }
}
