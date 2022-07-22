<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = [
        'incomeId',
        'number',
        'date',
        'lastChangeDate',
        'supplierArticle',
        'techSize',
        'barcode',
        'quantity',
        'totalPrice',
        'dateClose',
        'warehouseName',
        'nmId',
        'status'
    ];
    protected $connection = 'mysql2';
}
