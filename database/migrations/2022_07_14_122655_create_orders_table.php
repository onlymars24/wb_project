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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->dateTime('lastChangeDate');
            $table->string('supplierArticle', 75);
            $table->string('techSize', 30);
            $table->string('barcode', 30);
            $table->decimal('totalPrice', 10, 2);
            $table->integer('discountPercent');
            $table->string('warehouseName', 50);
            $table->string('oblast', 200);
            $table->integer('incomeID');
            $table->BigInteger('odid');
            $table->integer('nmId');
            $table->string('subject', 50);
            $table->string('category', 50);
            $table->string('brand', 50);
            $table->integer('isCancel');
            $table->dateTime('cancel_dt');
            $table->string('gNumber', 50);
            $table->string('sticker', 50);
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
        Schema::dropIfExists('orders');
    }
};
