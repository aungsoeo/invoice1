@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <div class="panel-title">Invoices</div>
                <a href="{{route('invoices.create')}}" class="btn btn-success pull-right">Create</a>

            </div>
        </div>

        <div class="panel-body">
            @if($invoices->count())
                <table class="table table-striped">
                    <thead>
                        <th>Invoice No.</th>
                        <th>Grand Total</th>
                        <th>Client</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th colspan="2">Create At</th>
                        </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_no }}</td>
                            <td>{{ $invoice->grand_total }}</td>
                            <td>{{ $invoice->client }}</td>
                            <td>{{ $invoice->due_date }}</td>
                            <td>{{ $invoice->created_at->diffForHumans()}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
