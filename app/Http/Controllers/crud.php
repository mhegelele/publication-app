<?php
namespace NimrPublication\Http\Controllers;

use NimrPublication\Customer;
use Illuminate\Http\Request;

class Crud2Controller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $gender = $request->get('gender') != '' ? $request->get('gender') : -1;
        $field = $request->get('field') != '' ? $request->get('field') : 'name';
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $customers = new Customer();
        if ($gender != -1)
            $customers = $customers->where('gender', $gender);
        $customers = $customers->where('name', 'like', '%' . $search . '%')
            ->orderBy($field, $sort)
            ->paginate(5)
            ->withPath('?search=' . $search . '&gender=' . $gender . '&field=' . $field . '&sort=' . $sort);
        return view('crud_2.index', compact('customers'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('crud_2.form');
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $this->validate($request, $rules);
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->save();
            return redirect('/laravel-crud-search-sort');
        }
    }

    public function delete($id)
    {
        Customer::destroy($id);
        return redirect('/laravel-crud-search-sort');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('crud_2.form', ['customer' => Customer::find($id)]);
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $this->validate($request, $rules);
            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->save();
            return redirect('/laravel-crud-search-sort');
        }
    }
}