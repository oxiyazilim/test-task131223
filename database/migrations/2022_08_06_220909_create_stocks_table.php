<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('stock_company_code');
            $table->string('stock_company_description');
            $table->float('price');
            $table->float('change');
            $table->float('rsi');
            $table->float('macd');
            $table->float('pe_ratio');
            $table->string('volume');
            $table->float('52_week');
            $table->float('1_m');
            $table->float('3_m');
            $table->float('6_m');
            $table->float('12_m');
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
        Schema::dropIfExists('stocks');
    }
}
