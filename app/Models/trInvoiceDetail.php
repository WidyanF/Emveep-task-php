<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trInvoiceDetail extends Model
{
    use HasFactory;
    protected$fillable = ['id_invoice','id_product','weight','qty','sub_total'];
    
}
