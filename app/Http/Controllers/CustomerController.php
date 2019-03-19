<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer');
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request-> email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

    }

    public function customerList()
    {
        $customers = Customer::all();
        return $customers;
    }


    public function customerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('edit', compact('customer'));
    }


    public function customerUpdate(Request $request, $id)
    {
        Customer::findOrFail($id)->update($request->all());
    }



    public function customerDelete($id)
    {
        Customer::findOrFail($id)->delete($id);
        Session::flash('customer_delete', 'Customer Deleted Successfully');
        return 'Customer Deleted';
    }


}
