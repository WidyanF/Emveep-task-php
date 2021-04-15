<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courier extends Model
{
    use HasFactory;
    protected $fillable = ['courier_name','courier_fee'];
    public function trinvoice()
    {
        return $this->hasMany('trInvoice');
    }
}
