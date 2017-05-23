<?php

namespace App\Http\Controllers\Admin;

use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHousesRequest;
use App\Http\Requests\Admin\UpdateHousesRequest;

class HousesController extends Controller
{
    /**
     * Display a listing of House.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('house_access')) {
            return abort(401);
        }

        $houses = House::all();

        return view('admin.houses.index', compact('houses'));
    }

    /**
     * Show the form for creating new House.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('house_create')) {
            return abort(401);
        }
        $tenants = \App\Tenant::get()->pluck('first_name', 'id')->prepend('Please select', '');

        return view('admin.houses.create', compact('tenants'));
    }

    /**
     * Store a newly created House in storage.
     *
     * @param  \App\Http\Requests\StoreHousesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHousesRequest $request)
    {
        if (! Gate::allows('house_create')) {
            return abort(401);
        }
        $house = House::create($request->all());



        return redirect()->route('admin.houses.index');
    }


    /**
     * Show the form for editing House.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('house_edit')) {
            return abort(401);
        }
        $tenants = \App\Tenant::get()->pluck('first_name', 'id')->prepend('Please select', '');

        $house = House::findOrFail($id);

        return view('admin.houses.edit', compact('house', 'tenants'));
    }

    /**
     * Update House in storage.
     *
     * @param  \App\Http\Requests\UpdateHousesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHousesRequest $request, $id)
    {
        if (! Gate::allows('house_edit')) {
            return abort(401);
        }
        $house = House::findOrFail($id);
        $house->update($request->all());



        return redirect()->route('admin.houses.index');
    }


    /**
     * Display House.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('house_view')) {
            return abort(401);
        }
        $tenants = \App\Tenant::get()->pluck('first_name', 'id')->prepend('Please select', '');$bills = \App\Bill::where('house_id', $id)->get();$tasks = \App\Task::where('house_id', $id)->get();$messages = \App\Message::where('house_id', $id)->get();$documents = \App\Document::where('house_id', $id)->get();

        $house = House::findOrFail($id);

        return view('admin.houses.show', compact('house', 'bills', 'tasks', 'messages', 'documents'));
    }


    /**
     * Remove House from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('house_delete')) {
            return abort(401);
        }
        $house = House::findOrFail($id);
        $house->delete();

        return redirect()->route('admin.houses.index');
    }

    /**
     * Delete all selected House at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('house_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = House::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
