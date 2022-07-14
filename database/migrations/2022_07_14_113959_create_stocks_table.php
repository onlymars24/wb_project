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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('lastChangeDate');
            $table->string('supplierArticle', 75);
            $table->string('techSize', 30);
            $table->string('barcode', 30);
            $table->integer('quantity');
            $table->integer('isSupply');
            $table->integer('isRealization');
            $table->integer('quantityFull');
            $table->integer('quantityNotInOrders');
            $table->integer('warehouse');
            $table->string('warehouseName', 50);
            $table->integer('inWayToClient');
            $table->integer('inWayFromClient');
            $table->integer('nmId');
            $table->string('subject', 50);
            $table->string('category', 50);
            $table->integer('daysOnSite');
            $table->string('brand', 50);
            $table->string('SCCode', 50);
            $table->decimal('Price', 10, 2);
            $table->integer('Discount');
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
};
