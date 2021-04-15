<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_date','To','id_sales','id_courier','Ship_to','payment','SubTotal','Courierfee','Total'];

    public function courier()
    {
        return $this->belongsTo('courier');
    }
    public function sales()
    {
        return $this->belongsTo('sales');
    }
}
