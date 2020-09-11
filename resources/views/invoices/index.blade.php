@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="mainPage col">
            <h1>Main page</h1>
        </div>
        <div class="col"></div>
        <div class="logout col">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    @if(auth()->user()->role->name == 'Admin' || auth()->user()->role->name == 'Moderator')
    <div class="addButton mb-3">
        <a href="/create" class="btn btn-primary">Add new</a>
    </div>
    @endif

    <div class="invoices">
        <table class="table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Invoice Date</th>
                    <th>Supply Date</th>
                    <th>Comment</th>
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->number }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>{{ $invoice->supply_date }}</td>
                    <td>{{ $invoice->comment }}</td>
                    <td>
                        <div class="row">
                            <div class="showButton col-3">
                                <a href="/show/{{ $invoice->id }}" class="btn btn-primary">Show</a>
                            </div>
                            @if(auth()->user()->role->name == 'Admin' || auth()->user()->role->name == 'Moderator')
                            <div class="updateButton col-3">
                                <a href="/update/{{ $invoice->id }}" class="btn btn-success">Update</a>
                            </div>
                            @endif
                            @if(auth()->user()->role->name == 'Admin')
                            <div class="deleteButton col">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$invoice->id}}">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{$invoice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="/delete/{{ $invoice->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete {{ $invoice->id }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
