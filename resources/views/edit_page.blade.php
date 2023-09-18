<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Invoice List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container ">
                        <div class="card p-3 mt-5 d-flex justify-content-center">
                            <div class="card-header">Invoice Form</div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('invoice_submit_edit/'.$data->id) }}"
                                    enctype="multipart/form-data" id="invoice_form">
                                    @csrf

                                    <div class="form-group mt-3">
                                        <label for="qty">Qty</label>
                                        <input oninput="total_cal()" type="number" class="form-control" id="qty" value="{{$data->qty}}"
                                            name="qty" placeholder="Qty">
                                        @error('qty')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="field2">Amount</label>
                                        <input oninput="total_cal(); this.value = this.value.replace(/[^0-9]/g, '');"
                                            type="number" class="form-control" id="amount" name="amount" value="{{$data->amount}}"
                                            placeholder="Enter Amount">
                                        @error('amount')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="field3">Total Amount</label>
                                        <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{$data->total_amount}}"
                                            placeholder="Enter Total number">
                                        @error('total_amount')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="tax_percentage">Tax Percentage</label>
                                        <select onchange="cal_tax()" class="form-select" id="tax_percentage"
                                            name="tax_percentage">
                                            <option @if($data->tax_percentage == 0) selected @endif  value="0">0%</option>
                                            <option @if($data->tax_percentage == 5) selected @endif value="5">5%</option>
                                            <option @if($data->tax_percentage == 12) selected @endif value="12">12%</option>
                                            <option @if($data->tax_percentage == 18) selected @endif value="18">18%</option>
                                            <option @if($data->tax_percentage == 28) selected @endif value="28">28%</option>
                                        </select>
                                        @error('tax_percentage')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="field3">Tax Amount</label>
                                        <input type="number" onchange="cal_netAmt()" class="form-control" value="{{$data->applied_tax}}"
                                            id="tax_amount" name="tax_amount" placeholder="">
                                        @error('tax_amount')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="net_amount">Net Amount</label>
                                        <input type="number" class="form-control" id="net_amount" name="net_amount" value="{{$data->net_amount}}"
                                            placeholder="Enter net amount">
                                        @error('net_amount')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="cust_name">Customer Name</label>
                                        <input oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '');"
                                            type="text" class="form-control" id="cust_name" name="cust_name" value="{{$data->customer_name}}"
                                            placeholder="Enter Name">
                                        @error('cust_name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="cust_name">Customer email</label>
                                        <input type="email" class="form-control" id="cust_email" name="cust_email" value="{{$data->customer_email}}"
                                            placeholder="Enter email">
                                        @error('cust_email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="datepicker">Invoice Date</label>
                                        <input class="form-control" type="text" id="datepicker" value="{{$data->invoice_date}}" name="invoice_date">
                                        @error('invoice_date')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="cust_name">Upload Doc</label>
                                        <input type="file" class="form-control" value="{{$data->file_name}}" id="file" name="file">
                                        @error('file')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary "
                                            style="background-color: rgb(17, 160, 216)">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"
        integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>


    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>


    <script>
        $(document).ready(function() {
            $("#invoice_form").validate({
                rules: {
                    qty: "required",
                    cust_email: {
                        required: true,
                        email: true
                    },
                    amount: "required",
                    total_amount: "required",
                    tax_percentage: "required",
                    net_amount: "required",
                    cust_name: "required",
                    invoice_date: "required",
                    file: "required",
                    tax_amount: "required"

                },
                messages: {
                    qty: "This field is required",
                    cust_email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    amount: "This field is required",
                    total_amount: "This field is required",
                    tax_percentage: "This field is required",
                    net_amount: "This field is required",
                    cust_name: "This field is required",
                    invoice_date: "This fieid is required",
                    file: "This field is required",
                    tax_amount: "This field is required"

                },
                submitHandler: function(form) {
                    this.form.submit();
                }
            });
        });




        function total_cal() {
            let qty = Number(document.getElementById('qty').value);
            let amount = Number(document.getElementById('amount').value);
            var total = qty * amount;
            if (total > 0)
                $('#total_amount').val(total);
        }


        function cal_tax() {
            let total_amount = Number($('#total_amount').val());
            let tax_rate = Number($('#tax_percentage').val())
            if (tax_rate == 0) {
                $('#tax_amount').val(0);
            }
            var tax_amount = 0;
            var tax_amount = tax_rate / 100 * total_amount;
            // tax_amount = total_amount + Percentage;
            $('#tax_amount').val(tax_amount);
            cal_netAmt();

        }


        function cal_netAmt() {
            // alert('hii');
            var total_amt = parseFloat(document.getElementById('total_amount').value);
            var tax_amount = parseFloat(document.getElementById('tax_amount').value);
            var net = total_amt + tax_amount;
            console.log(net);
            $('#net_amount').val(net);

        }
    </script>
</x-app-layout>
