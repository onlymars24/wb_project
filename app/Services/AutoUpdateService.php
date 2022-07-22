<?php

namespace App\Services;

use App\Models\Income;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Sale;
use App\Models\SalesReport;
use App\Models\ExcisesReport;

class AutoUpdateService
{
    private $key = 'MDljY2M1MDgtMmMzNS00ZTY5LTljODMtMWI0NGVkOWRmYTM5';
    private $dateFrom;

    public function __construct(){
        $time = 'T00:00';
        $date = date('Y-m-d');
        $date = date_create($date);
        date_modify($date, '-1 day');
        $date = date_format($date, 'Y-m-d');
        $this->dateFrom = $date.$time;
    }
    private function get_data_by_api($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    private function addNewIncomes(){
        $dateFrom = $this->dateFrom.':00.000Z';
        $url = "https://suppliers-stats.wildberries.ru/api/v1/supplier/incomes?dateFrom=$dateFrom&key={$this->key}";
        $data = $this->get_data_by_api($url);
        $data = json_decode($data);
        foreach ($data as $income){
            Income::create([
                'incomeId' => $income->incomeId,
                'number' => $income->number,
                'date' => $income->date,
                'lastChangeDate' => $income->lastChangeDate,
                'supplierArticle' => $income->supplierArticle,
                'techSize' => $income->techSize,
                'barcode' => $income->barcode,
                'quantity' => $income->quantity,
                'totalPrice' => $income->totalPrice,
                'dateClose' => $income->dateClose,
                'warehouseName' => $income->warehouseName,
                'nmId' => $income->nmId,
                'status' => $income->status
            ]);
        }
    }

    private function addNewStocks(){
        $dateFrom = $this->dateFrom.':00.000Z';  
        $url = "https://suppliers-stats.wildberries.ru/api/v1/supplier/stocks?dateFrom=$dateFrom&key={$this->key}";
        $data = $this->get_data_by_api($url);
        $data = json_decode($data);
        foreach ($data as $stock){
            Stock::create([
                'lastChangeDate' => $stock->lastChangeDate,
                'supplierArticle' => $stock->supplierArticle,
                'techSize' => $stock->techSize,
                'barcode' => $stock->barcode,
                'quantity' => $stock->quantity,
                'isSupply' => $stock->isSupply,
                'isRealization' => $stock->isRealization,
                'quantityFull' => $stock->quantityFull,
                'quantityNotInOrders' => $stock->quantityNotInOrders,
                'warehouse' => $stock->warehouse,
                'warehouseName' => $stock->warehouseName,
                'inWayToClient' => $stock->inWayToClient,
                'inWayFromClient' => $stock->inWayFromClient,
                'nmId' => $stock->nmId,
                'subject' => $stock->subject,
                'category' => $stock->category,
                'daysOnSite' => $stock->daysOnSite,
                'brand' => $stock->brand,
                'SCCode' => $stock->SCCode,
                'Price' => $stock->Price,
                'Discount' => $stock->Discount
            ]);
        }
    }

    private function addNewOrders(){
        $dateFrom = $this->dateFrom.':00.000Z';
        $flag = 1;
        $url = "https://suppliers-stats.wildberries.ru/api/v1/supplier/orders?dateFrom=$dateFrom&flag=$flag&key={$this->key}";
        $data = $this->get_data_by_api($url);
        $data = json_decode($data);
        foreach ($data as $order){
            Order::create([
                'date' => $order->date,
                'lastChangeDate' => $order->lastChangeDate,
                'supplierArticle' => $order->supplierArticle,
                'techSize' => $order->techSize,
                'barcode' => $order->barcode,
                'totalPrice' => $order->totalPrice,
                'discountPercent' => $order->discountPercent,
                'warehouseName' => $order->warehouseName,
                'oblast' => $order->oblast,
                'incomeID' => $order->incomeID,
                'odid' => $order->odid,
                'nmId' => $order->nmId,
                'subject' => $order->subject,
                'category' => $order->category,
                'brand' => $order->brand,
                'isCancel' => $order->isCancel,
                'cancel_dt' => $order->cancel_dt,
                'gNumber' => $order->gNumber,
                'sticker' => $order->sticker
            ]);
        }            
    }

    private function addNewSales(){
        $dateFrom = $this->dateFrom.':00.000Z';
        $flag = 1;
        $url = "https://suppliers-stats.wildberries.ru/api/v1/supplier/sales?dateFrom=$dateFrom&flag=$flag&key={$this->key}";
        $data = $this->get_data_by_api($url);
        $data = json_decode($data);
        foreach ($data as $sale){
            Sale::create([
                'date' => $sale->date,
                'lastChangeDate' => $sale->lastChangeDate,
                'supplierArticle' => $sale->supplierArticle,
                'techSize' => $sale->techSize,
                'barcode' => $sale->barcode,
                'totalPrice' => $sale->totalPrice,
                'discountPercent' => $sale->discountPercent,
                'isSupply' => $sale->isSupply,
                'isRealization' => $sale->isRealization,
                'promoCodeDiscount' => $sale->promoCodeDiscount,
                'warehouseName' => $sale->warehouseName,
                'countryName' => $sale->countryName,
                'oblastOkrugName' => $sale->oblastOkrugName,
                'regionName' => $sale->regionName,
                'incomeID' => $sale->incomeID,
                'saleID' => $sale->saleID,
                'odid' => $sale->odid,
                'spp' => $sale->spp,
                'forPay' => $sale->forPay,
                'finishedPrice' => $sale->finishedPrice,
                'priceWithDisc' => $sale->priceWithDisc,
                'nmId' => $sale->nmId,
                'subject' => $sale->subject,
                'category' => $sale->category,
                'brand' => $sale->brand,
                'IsStorno'=> $sale->IsStorno,
                'gNumber' => $sale->gNumber,
                'sticker' => $sale->sticker
            ]);
        }
    }

    private function addNewSalesReports(){
        $dateFrom = $this->dateFrom;
        $dateTo = $this->dateFrom;
        $limit = 1000;
        $rrdid = 0;
        $url = "https://suppliers-stats.wildberries.ru/api/v1/supplier/reportDetailByPeriod?dateFrom=$dateFrom&key={$this->key}&limit=$limit&rrdid=$rrdid&dateto=$dateTo";
        $data = $this->get_data_by_api($url);
        $data = json_decode($data);
        foreach ($data as $salesReport){
            SalesReport::create([
                'realizationreport_id' => $salesReport->realizationreport_id,
                'suppliercontract_code' => $salesReport->suppliercontract_code,
                'rrd_id' => $salesReport->rrd_id,
                'gi_id' => $salesReport->gi_id,
                'subject_name' => $salesReport->subject_name,
                'nm_id' => $salesReport->nm_id,
                'brand_name' => $salesReport->brand_name,
                'sa_name' => $salesReport->sa_name,
                'ts_name' => $salesReport->ts_name,
                'barcode' => $salesReport->barcode,
                'doc_type_name' => $salesReport->doc_type_name,
                'quantity' => $salesReport->quantity,
                'retail_price' => $salesReport->retail_price,
                'retail_amount' => $salesReport->retail_amount,
                'sale_percent' => $salesReport->sale_percent,
                'commission_percent' => $salesReport->commission_percent,
                'office_name' => $salesReport->office_name,
                'supplier_oper_name' => $salesReport->supplier_oper_name,
                'order_dt' => $salesReport->order_dt,
                'sale_dt' => $salesReport->sale_dt,
                'rr_dt' => $salesReport->rr_dt,
                'shk_id' => $salesReport->shk_id,
                'retail_price_withdisc_rub' => $salesReport->retail_price_withdisc_rub,
                'delivery_amount' => $salesReport->delivery_amount,
                'return_amount' => $salesReport->return_amount,
                'delivery_rub' => $salesReport->delivery_rub,
                'gi_box_type_name' => $salesReport->gi_box_type_name,
                'product_discount_for_report' => $salesReport->product_discount_for_report,
                'supplier_promo' => $salesReport->supplier_promo,
                'rid' => $salesReport->rid,
                'ppvz_spp_prc' => $salesReport->ppvz_spp_prc,
                'ppvz_kvw_prc_base' => $salesReport->ppvz_kvw_prc_base,
                'ppvz_kvw_prc' => $salesReport->ppvz_kvw_prc,
                'ppvz_sales_commission' => $salesReport->ppvz_sales_commission,
                'ppvz_for_pay' => $salesReport->ppvz_for_pay,
                'ppvz_reward' => $salesReport->ppvz_reward,
                'ppvz_vw' => $salesReport->ppvz_vw,
                'ppvz_vw_nds' => $salesReport->ppvz_vw_nds,
                'ppvz_office_id' => $salesReport->ppvz_office_id,
                'ppvz_office_name' => $salesReport->ppvz_office_name ?? '',
                'ppvz_supplier_id' => $salesReport->ppvz_supplier_id,
                'ppvz_supplier_name' => $salesReport->ppvz_supplier_name,
                'ppvz_inn' => $salesReport->ppvz_inn,
                'declaration_number' => $salesReport->declaration_number,
                'sticker_id' => $salesReport->sticker_id,
                'site_country' => $salesReport->site_country,
                'penalty' => $salesReport->penalty,
                'additional_payment' => $salesReport->additional_payment
            ]);
        }
    }

    private function addNewExcisesReports(){
        $dateFrom = $this->dateFrom;
        $url = "https://suppliers-stats.wildberries.ru/api/v1/supplier/excise-goods?dateFrom=$dateFrom&key={$this->key}";
        $data = $this->get_data_by_api($url);
        $data = json_decode($data);
        foreach ($data as $excisesReport){
            ExcisesReport::create([
                'operation_id' => $excisesReport->id,
                'finishedPrice' => $excisesReport->finishedPrice,
                'operationTypeId' => $excisesReport->operationTypeId,
                'fiscalDt' => $excisesReport->fiscalDt,
                'docNumber' => $excisesReport->docNumber,
                'fnNumber' => $excisesReport->fnNumber,
                'regNumber' => $excisesReport->regNumber,
                'excise' => $excisesReport->excise,
                'date' => $excisesReport->date
            ]);
        }
    }

    public function addAllData(){
        $this->addNewIncomes();
        $this->addNewStocks();
        $this->addNewOrders();
        $this->addNewSales();
        $this->addNewSalesReports();
        $this->addNewExcisesReports();
    }

}