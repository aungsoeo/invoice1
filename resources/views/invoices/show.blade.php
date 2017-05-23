@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Invoice</span>
                <div class="pull-right">
                    <a href="{{route('invoices.index')}}" class="btn btn-default">Back</a>
                    <a href="{{route('invoices.edit', $invoice)}}" class="btn btn-primary">Edit</a>
                    <form class="form-inline" method="post"
                        action="{{route('invoices.destroy', $invoice)}}"
                        onsubmit="return confirm('Are you sure?')"
                    >
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Invoice No.</label>
                        <p>{{$invoices->invoice_no}}</p>
                    </div>
                    <div class="form-group">
                        <label>Grand Total</label>
                        <p>${{$invoices->grand_total}}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Client</label>
                        <p>{{$invoices->client}}</p>
                    </div>
                    <div class="form-group">
                        <label>Client Address</label>
                        <pre class="pre">{{$invoices->client_address}}</pre>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Title</label>
                        <p>{{$invoices->title}}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Invoice Date</label>
                            <p>{{$invoices->invoice_date}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Due Date</label>
                            <p>{{$invoices->due_date}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices->products as $product)
                        <tr>
                            <td class="table-name">{{$product->name}}</td>
                            <td class="table-price">${{$product->price}}</td>
                            <td class="table-qty">{{$product->qty}}</td>
                            <td class="table-total text-right">${{$product->qty * $product->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Sub Total</td>
                        <td class="table-amount">${{$invoices->sub_total}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Discount</td>
                        <td class="table-amount">${{$invoices->discount}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Grand Total</td>
                        <td class="table-amount">${{$invoices->grand_total}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection