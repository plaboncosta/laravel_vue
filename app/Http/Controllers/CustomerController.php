<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('customer', compact('customers'));
    }


    public function dataSave(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return 'well done';
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        Customer::findOrFail($id)->update($request->all());
    }


    public function delete($id)
    {
        Customer::findOrFail($id)->delete();
    }
}
