@php
    
function gmt_date($date){
    date_default_timezone_set('Asia/Jakarta');
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    
    return $d.'/'.$m.'/'.$y;
}

function rupiah($val){
        return number_format($val,0,',','.');
    }
@endphp
@extends('layout')
@section('content')
    <div class="card my-2">
        <div class="card-body">
                <div class="form-group">
                    <strong class="pl-2">No Invoice</strong>
                    <select name="noInvoice" id="noInvoice" class="selectpicker form-control mx-2 " data-live-search="true" title="Choose No. Invoice....">
                        <option value="002">INV-002-101010</option>
                    </select>
                </div>
                <div class="pl-2">
                    <button type="submit" class="btn btn-primary btn-view">View</button>
                </div>
        </div>    
    </div>   
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Invoice Detail</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @method('PUT')
                @foreach ($data as $trInv)
                    
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="form-group">
                            <strong>Invoice Date</strong>
                            <input type="text" name="inv_date" class="form-control" value="{{gmt_date($trInv->invoice_date)}}">
                        </div>
                        <div class="form-group">
                            <strong>To</strong>
                            <textarea name="to" id="" cols="20" rows="5" class="form-control">{{$trInv->To}}</textarea>
                        </div>
                        <div class="form-gorup">
                            <strong>Sales Name</strong>
                            <select name="sales_name" class="form-control" title="Choose Sales Name..." value="{{$trInv->id_sales}}">
                                <option value="" disabled>Choose sales name...</option>
                                @foreach ($sales as $item)
                                <option value="{{$item->id}}" {{($item->id==$trInv->id_sales)?'selected':''}}>{{$item->sales_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-gorup">
                            <strong>Courier </strong>
                            <select name="courier" class="form-control" title="Choose Courier..." value="{{$trInv->courier_id}}">
                                <option value="" disabled>Choose courier name...</option>
                                @foreach ($courier as $row)
                                <option value="{{$row->id}}" {{($row->id==$trInv->id_courier)?'selected':''}}>{{$row->courier_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="form-group">
                            <strong>Ship To</strong>
                            <textarea name="ship_to" cols="20" rows="5" class="form-control">{{$trInv->Ship_to}}</textarea>
                            
                        </div>
                        <div class="form-group">

                            <select name="payment" id="payment" class="form-control" value="{{$trInv->payment}}">
                                <option disabled>Choose payment type...</option>
                                <option value="0" {{($trInv->payment==0)?'selected':''}}>Pay Later</option>
                                <option value="1" {{($trInv->payment==1)?'selected':''}}>Cash</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-primary text-center">
                        <tr>
                            <th>Item</th>
                            <th>Weight(kg)</th>
                            <th>QTY</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                         $courierfee = $trInv->courier_fee; 
                         $sum =0;   
                        @endphp
                        @foreach ($detail_inv as $row)
                        <tr>
                            <td>{{$row->Item}}</td>
                            <td>{{$row->weight}}</td>
                            <td>{{$row->qty}}</td>
                            <td class="text-right">{{rupiah($row->price)}}</td>
                            <td class="text-right">{{rupiah($row->qty*$row->price)}}</td>
                        </tr>
                        @php
                            $sum += $courierfee*$row->weight*$row->qty;
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="border-0"></th>
                            <th>Sub Total</th>
                            <th class="text-right">{{rupiah($trInv->SubTotal)}}</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="border-0"></th>
                            <th>Courier Fee</th>
                            <th class="text-right">{{rupiah($sum)}}</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="border-0"></th>
                            <th>Total</th>
                            <th class="text-right">{{rupiah($trInv->SubTotal+$sum)}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            @endforeach
        </form>
        </div>
        @section('script_')
        <script>
            $(document).ready(function(){
                $('.btn-view').on('click', function(){
                    var url = '{{ route("invoice.show", ":slug") }}';

                        
                    var idVal = noInvoice.options[noInvoice.selectedIndex].value;
                    url = url.replace(':slug', idVal);

                        window.location.href=url;
                });
            });
        </script>
        @endsection
@endsection
