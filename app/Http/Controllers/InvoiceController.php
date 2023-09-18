<?php

namespace App\Http\Controllers;
use App\Models\Invoices;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice_list = Invoices::orderBy('created_at', 'desc')->get();
        // dd($invoice_list);
        return view('dashboard',compact('invoice_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'file' => ['required','mimes:jpg,png,pdf','max:30000'],
            "qty" => "required",
            "amount" => "required",
            "total_amount" => "required",
            "tax_percentage" => "required",
            "tax_amount" => "required",
            "net_amount" => "required",
            "cust_name" => "required",
            "cust_email" => "required|email",
            "invoice_date" => "required"
        ]); 

        if ($validate) {
            $exstData = Invoices::select('id')->latest()->first();
            $doc = $request->file('file');
            $file_name = $doc->getClientOriginalName();
            $path = $doc->store('doc');
            // dd($path);
            if($exstData)
            {
                $id = $exstData->id;
                $n = $id + 1;
                $invoice_number = 'INV0'.$n;

            }else{
                $invoice_number = 'INV00';
            }
            $save = Invoices::create(['qty' => $request->qty, 'amount'=> $request->amount, 'total_amount' => $request->tax_percentage, 'applied_tax' => $request->tax_amount, 'tax_percentage'=> $request->tax_percentage ,'net_amount' => $request->net_amount, 'customer_name' => $request->cust_name, 'customer_email' => $request->cust_email, 'invoice_date' => $request->invoice_date, 'file_name' => $file_name, 'file_path' => $path, 'invoice_number' => $invoice_number]);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $data = Invoices::where('id', $id)->first();
        // dd($data);
        return view('edit_page',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Invoices::where('id', $id)->first();
        $validate = $request->validate([
            'file' => ['required','mimes:jpg,png,pdf','max:30000'],
            "qty" => "required",
            "amount" => "required",
            "total_amount" => "required",
            "tax_percentage" => "required",
            "tax_amount" => "required",
            "net_amount" => "required",
            "cust_name" => "required",
            "cust_email" => "required|email",
            "invoice_date" => "required"
        ]);
        if($validate)
        {
            // $exstData = Invoices::select('id')->latest()->first();
            $doc = $request->file('file');
            $file_name = $doc->getClientOriginalName();
            $path = $doc->store('doc');
            $invoice_number = $data->invoice_number;
            $save = Invoices::where('id', $id)->update(['qty' => $request->qty, 'amount'=> $request->amount, 'total_amount' => $request->tax_percentage, 'applied_tax' => $request->tax_amount, 'tax_percentage'=> $request->tax_percentage ,'net_amount' => $request->net_amount, 'customer_name' => $request->cust_name, 'customer_email' => $request->cust_email, 'invoice_date' => $request->invoice_date, 'file_name' => $file_name, 'file_path' => $path, 'invoice_number' => $invoice_number]);
            return redirect()->route('dashboard');
        }
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Invoices::where('id', $id)->delete();
        if($delete)
        {
            return redirect()->route('dashboard');
        }
    }
}
