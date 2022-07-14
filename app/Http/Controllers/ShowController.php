<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Sale;
use App\Models\SalesReport;
use App\Models\ExcisesReport;


class ShowController extends Controller
{
    public function showIncomes(Request $request){
        dd(Income::all());
    }
    public function showStocks(Request $request){
        dd(Stock::all());
    }
    public function showOrders(Request $request){
        dd(Order::all());
    }
    public function showSales(Request $request){
        dd(Sale::all());
    }
    public function showSalesReports(Request $request){
        dd(SalesReport::all());
    }
    public function showExcisesReports(Request $request){
        dd(ExcisesReport::all());
    }
}
