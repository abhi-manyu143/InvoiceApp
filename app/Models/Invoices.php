<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_number', 'qty', 'amount', 'total_amount', 'net_amount' , 'customer_name', 'applied_tax', 'tax_percentage', 'invoice_date','customer_email', 'file_name' , 'file_path'];
}
