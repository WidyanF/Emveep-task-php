<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;
    protected $fillable = ['sales_name'];

    public function trinvoice()
    {
        return $this->hasMany('trInvoice');
    }
}
