<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->integer('total');
            $table->index('id_user');
            $table->index('id_type_transaction');
            $table->index('id_type_currency');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_type_transaction')->references('id')->on('type_transaction');
            $table->foreignId('id_type_currency')->references('id')->on('type_currency');
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
        Schema::dropIfExists('transaction');
    }
}
