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
        Schema::create('excises_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operation_id');
            $table->decimal('finishedPrice', 10, 2);
            $table->integer('operationTypeId');
            $table->string('fiscalDt');
            $table->unsignedInteger('docNumber');
            $table->string('fnNumber', 30);
            $table->string('regNumber', 30);
            $table->string('excise', 30);
            $table->string('date');
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
        Schema::dropIfExists('excises_reports');
    }
};
