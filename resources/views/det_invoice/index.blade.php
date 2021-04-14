@extends('layout')
@section('content')
    <div class="card my-2">
        <div class="card-body">
            <form action="" method="POST" class=" text-dark">
                <div class="form-group">
                    <strong class="pl-2">No Invoice</strong>
                    <select name="noInvoice" class="selectpicker form-control mx-2 " data-live-search="true" title="Choose No. Invoice....">
                        <option value="">INV-002-101010</option>
                    </select>
                </div>
                <div class="pl-2">
                    <button type="submit" class="btn btn-primary">View</button>
                </div>
            </form>

        </div>    
    </div>   
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Invoice Detail</h5>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="form-group">
                            <strong>Invoice Date</strong>
                            <input type="date" name="inv_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>To</strong>
                            <textarea name="to" id="" cols="20" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-gorup">
                            <strong>Sales Name</strong>
                            <select name="sales_name" class="selectpicker form-control" title="Choose Sales Name...">
                                @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->sales_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-gorup">
                            <strong>Courier </strong>
                            <select name="courier" class="selectpicker form-control" title="Choose Courier...">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="form-group">
                            <strong>Ship To</strong>
                            <textarea name="ship_to" cols="20" rows="5" class="form-control"></textarea>

                        </div>
                        <div class="form-group">
                            <strong>Payment Type</strong>
                            <select name="payment_type" class="selectpicker form-control" title="Choose Payment Type...">
                                <option value="Cash">Cash</option>
                                <option value="Pay Later">Pay Later</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Weight(kg)</th>
                            <th>QTY</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="border-0"></th>
                            <th>Sub Total</th>
                            <th class="text-right"></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="border-0"></th>
                            <th>Courier Fee</th>
                            <th class="text-right"></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="border-0"></th>
                            <th>Total</th>
                            <th class="text-right"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        </div>
@endsection