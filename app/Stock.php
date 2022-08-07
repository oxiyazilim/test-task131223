<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
'stock_company_code',
'idcp',
'stock_company_description',
'price',
'change',
'rsi',
'macd',
'pe_ratio',
'volume',
'52_week',
'1_m',
'3_m',
'6_m',
'12_m',
    ];
}
