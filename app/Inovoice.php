<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inovoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = ['number', 'invoice_date', 'supply_date',
                            'comment', 'created_at', 'updated_at'];
}
