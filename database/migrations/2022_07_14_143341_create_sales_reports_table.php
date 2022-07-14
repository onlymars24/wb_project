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
        Schema::create('sales_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realizationreport_id'); 
            $table->string('suppliercontract_code', 30)->nullable();
            $table->unsignedBigInteger('rrd_id');
            $table->unsignedBigInteger('gi_id');
            $table->string('subject_name', 30);
            $table->unsignedBigInteger('nm_id');
            $table->string('brand_name', 30);
            $table->string('sa_name', 100);
            $table->string('ts_name', 30);
            $table->string('barcode', 30)->nullable();
            $table->string('doc_type_name', 30);
            $table->integer('quantity');
            $table->decimal('retail_price', 10, 2);
            $table->decimal('retail_amount', 10, 2);
            $table->float('sale_percent');
            $table->float('commission_percent');
            $table->string('office_name', 30);
            $table->string('supplier_oper_name', 30);
            $table->string('order_dt');
            $table->string('sale_dt');
            $table->string('rr_dt');
            $table->unsignedBigInteger('shk_id'); 
            $table->decimal('retail_price_withdisc_rub', 10, 2);
            $table->unsignedInteger('delivery_amount');
            $table->unsignedInteger('return_amount');
            $table->decimal('delivery_rub', 10, 2);
            $table->string('gi_box_type_name', 30);
            $table->float('product_discount_for_report');
            $table->integer('supplier_promo');
            $table->unsignedBigInteger('rid');
            $table->float('ppvz_spp_prc');
            $table->float('ppvz_kvw_prc_base');
            $table->float('ppvz_kvw_prc');
            $table->float('ppvz_sales_commission');
            $table->float('ppvz_for_pay');
            $table->float('ppvz_reward');
            $table->float('ppvz_vw');
            $table->float('ppvz_vw_nds');
            $table->unsignedBigInteger('ppvz_office_id');
            $table->string('ppvz_office_name', 30);
            $table->unsignedBigInteger('ppvz_supplier_id');
            $table->string('ppvz_supplier_name', 200);
            $table->string('ppvz_inn', 30);
            $table->string('declaration_number', 30);
            $table->string('sticker_id', 30);
            $table->string('site_country', 30);
            $table->decimal('penalty', 10, 2)->nullable();
            $table->integer('additional_payment')->nullable();
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
        Schema::dropIfExists('sales_reports');
    }
};
