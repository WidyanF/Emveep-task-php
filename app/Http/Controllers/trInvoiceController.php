<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sales;
use App\Models\courier;

class trInvoiceController extends Controller
{
    //
    public function index()
    {
        $data = sales::All();
        $courier = courier::all();

    return view('det_invoice.index', compact('data','courier'));
    }
}
