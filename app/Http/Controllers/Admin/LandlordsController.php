<?php

namespace App\Http\Controllers\Admin;

use App\Landlord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLandlordsRequest;
use App\Http\Requests\Admin\UpdateLandlordsRequest;

class LandlordsController extends Controller
{
    /**
     * Display a listing of Landlord.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('landlord_access')) {
            return abort(401);
        }

        $landlords = Landlord::all();

        return view('admin.landlords.index', compact('landlords'));
    }

    /**
     * Show the form for creating new Landlord.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('landlord_create')) {
            return abort(401);
        }
        return view('admin.landlords.create');
    }

    /**
     * Store a newly created Landlord in storage.
     *
     * @param  \App\Http\Requests\StoreLandlordsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLandlordsRequest $request)
    {
        if (! Gate::allows('landlord_create')) {
            return abort(401);
        }
        $landlord = Landlord::create($request->all());



        return redirect()->route('admin.landlords.index');
    }


    /**
     * Show the form for editing Landlord.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('landlord_edit')) {
            return abort(401);
        }
        $landlord = Landlord::findOrFail($id);

        return view('admin.landlords.edit', compact('landlord'));
    }

    /**
     * Update Landlord in storage.
     *
     * @param  \App\Http\Requests\UpdateLandlordsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLandlordsRequest $request, $id)
    {
        if (! Gate::allows('landlord_edit')) {
            return abort(401);
        }
        $landlord = Landlord::findOrFail($id);
        $landlord->update($request->all());



        return redirect()->route('admin.landlords.index');
    }


    /**
     * Display Landlord.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('landlord_view')) {
            return abort(401);
        }
        $tenants = \App\Tenant::where('landlord_id', $id)->get();

        $landlord = Landlord::findOrFail($id);

        return view('admin.landlords.show', compact('landlord', 'tenants'));
    }


    /**
     * Remove Landlord from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('landlord_delete')) {
            return abort(401);
        }
        $landlord = Landlord::findOrFail($id);
        $landlord->delete();

        return redirect()->route('admin.landlords.index');
    }

    /**
     * Delete all selected Landlord at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('landlord_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Landlord::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
