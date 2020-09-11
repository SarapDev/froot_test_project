@extends('layouts.app')
@section('content')
    <div class="title">
        <h1>Show page</h1>
    </div>
    <div class="info">
        <h3>Number</h3>
        <p>{{$invoice->number}}</p>
        <h3>Invoice Date</h3>
        <p>{{$invoice->invoice_date}}</p>
        <h3>Supply Date</h3>
        <p>{{$invoice->supply_date}}</p>
        <h3>Comment</h3>
        <p>{{$invoice->comment}}</p>
    </div>
@endsection
