<?php

namespace App\Http\Controllers;

use App\Inovoice;
use Illuminate\Http\Request;

class InovoiceController extends Controller
{
    // GET Methods
    public function index()
    {
        return view('invoices.index', ['invoices' => Inovoice::all()]);
    }

    public function show($id)
    {
        return view('invoices.show', ['invoice' => Inovoice::find($id)]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function edit($id)
    {
        return view('invoices.create', ['invoice' => Inovoice::find($id)]);
    }

    // POST Methods

    public function store(Request $request)
    {
        $this->validateData($request);

        Inovoice::create($request->all());

        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $this->validateData($request);

        Inovoice::find($id)->update($request->all());

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        Inovoice::destroy($id);

        return redirect()->back();
    }

    // Additionally functions

    public function validateData($data)
    {
        $data->validate([
            'number'    => ['required', 'string'],
            'invoice_date'    => ['required', 'date'],
            'supply_date'    => ['required', 'date'],
            'comment'    => ['string'],
        ]);
    }
}
