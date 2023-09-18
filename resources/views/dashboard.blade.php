<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Invoice Date</th>
                            <th scope="col">Tax Amount</th>
                            <th scope="col">Net Amount</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice_list as $list)
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$list->invoice_number}}</td>
                            <td>{{$list->customer_name}}</td>
                            <td>{{$list->invoice_date}}</td>
                            <td>{{$list->applied_tax}}</td>
                            <td>{{$list->net_amount}}</td>
                            <td><a href="{{url('edit/'.$list->id)}}"><button class="btn btn-primary">Edit</button></a>&nbsp;&nbsp;<a href="{{url('delete/'.$list->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
