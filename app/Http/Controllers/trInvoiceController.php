<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sales;

class trInvoiceController extends Controller
{
    //
    public function index()
    {
        $data = sales::All();

    return view('det_invoice.index', compact('data'));
    }
}
