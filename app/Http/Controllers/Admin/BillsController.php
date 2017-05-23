<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBillsRequest;
use App\Http\Requests\Admin\UpdateBillsRequest;

class BillsController extends Controller
{
    /**
     * Display a listing of Bill.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('bill_access')) {
            return abort(401);
        }

        $bills = Bill::all();

        return view('admin.bills.index', compact('bills'));
    }

    /**
     * Show the form for creating new Bill.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('bill_create')) {
            return abort(401);
        }
        $houses = \App\House::get()->pluck('city', 'id')->prepend('Please select', '');

        return view('admin.bills.create', compact('houses'));
    }

    /**
     * Store a newly created Bill in storage.
     *
     * @param  \App\Http\Requests\StoreBillsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillsRequest $request)
    {
        if (! Gate::allows('bill_create')) {
            return abort(401);
        }
        $bill = Bill::create($request->all());



        return redirect()->route('admin.bills.index');
    }


    /**
     * Show the form for editing Bill.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('bill_edit')) {
            return abort(401);
        }
        $houses = \App\House::get()->pluck('city', 'id')->prepend('Please select', '');

        $bill = Bill::findOrFail($id);

        return view('admin.bills.edit', compact('bill', 'houses'));
    }

    /**
     * Update Bill in storage.
     *
     * @param  \App\Http\Requests\UpdateBillsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillsRequest $request, $id)
    {
        if (! Gate::allows('bill_edit')) {
            return abort(401);
        }
        $bill = Bill::findOrFail($id);
        $bill->update($request->all());



        return redirect()->route('admin.bills.index');
    }


    /**
     * Display Bill.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('bill_view')) {
            return abort(401);
        }
        $bill = Bill::findOrFail($id);

        return view('admin.bills.show', compact('bill'));
    }


    /**
     * Remove Bill from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('bill_delete')) {
            return abort(401);
        }
        $bill = Bill::findOrFail($id);
        $bill->delete();

        return redirect()->route('admin.bills.index');
    }

    /**
     * Delete all selected Bill at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('bill_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Bill::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
