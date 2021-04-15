<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sales;
use App\Models\courier;
use App\Models\trInvoice;
use App\Models\trInvoiceDetail;

class trInvoiceController extends Controller
{
    //
    public function index()
    {
        $sales = sales::All();
        $courier = courier::all();
        $data_inv = trInvoice::all();
        return view('det_invoice.index', compact('sales','courier','data_inv'));
    }

    public function show($id)
    {
        $sales = sales::All();
        $courier = courier::all();
        $data = trInvoice::select('*')
            ->join('couriers', 'couriers.id', '=', 'tr_invoices.id_courier')
            ->join('sales', 'sales.id','=','tr_invoices.id_sales')
            ->where('tr_invoices.id', $id)
            ->get();
        $detail_inv = trInvoiceDetail::select('*')
        ->join('ms_products','ms_products.id','=','tr_invoice_details.id_product')
        ->where('tr_invoice_details.id_invoice', $id)
        ->get();

        return view('det_invoice.detail_invoice', compact('data','courier','sales','detail_inv'));
    }
}
