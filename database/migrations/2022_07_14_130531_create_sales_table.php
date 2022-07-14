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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->dateTime('lastChangeDate');
            $table->string('supplierArticle', 75);
            $table->string('techSize', 30);
            $table->string('barcode', 30);
            $table->decimal('totalPrice', 10, 2);
            $table->float('discountPercent');
            $table->integer('isSupply');
            $table->integer('isRealization');
            $table->float('promoCodeDiscount');
            $table->string('warehouseName', 50);
            $table->string('countryName', 200);
            $table->string('oblastOkrugName', 200);
            $table->string('regionName', 200);
            $table->integer('incomeID');
            $table->string('saleID', 15);
            $table->BigInteger('odid');
            $table->float('spp');
            $table->decimal('forPay', 10, 2);
            $table->decimal('finishedPrice', 10, 2);
            $table->decimal('priceWithDisc', 10, 2);
            $table->integer('nmId');
            $table->string('subject', 50);
            $table->string('category', 50);
            $table->string('brand', 50);
            $table->integer('IsStorno');
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
        Schema::dropIfExists('sales');
    }
};
