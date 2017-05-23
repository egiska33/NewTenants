<?php

namespace App\Http\Controllers\Admin;

use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTenantsRequest;
use App\Http\Requests\Admin\UpdateTenantsRequest;

class TenantsController extends Controller
{
    /**
     * Display a listing of Tenant.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('tenant_access')) {
            return abort(401);
        }

        $tenants = Tenant::all();

        return view('admin.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating new Tenant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('tenant_create')) {
            return abort(401);
        }
        $landlords = \App\Landlord::get()->pluck('first_name', 'id')->prepend('Please select', '');

        return view('admin.tenants.create', compact('landlords'));
    }

    /**
     * Store a newly created Tenant in storage.
     *
     * @param  \App\Http\Requests\StoreTenantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenantsRequest $request)
    {
        if (! Gate::allows('tenant_create')) {
            return abort(401);
        }
        $tenant = Tenant::create($request->all());



        return redirect()->route('admin.tenants.index');
    }


    /**
     * Show the form for editing Tenant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('tenant_edit')) {
            return abort(401);
        }
        $landlords = \App\Landlord::get()->pluck('first_name', 'id')->prepend('Please select', '');

        $tenant = Tenant::findOrFail($id);

        return view('admin.tenants.edit', compact('tenant', 'landlords'));
    }

    /**
     * Update Tenant in storage.
     *
     * @param  \App\Http\Requests\UpdateTenantsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTenantsRequest $request, $id)
    {
        if (! Gate::allows('tenant_edit')) {
            return abort(401);
        }
        $tenant = Tenant::findOrFail($id);
        $tenant->update($request->all());



        return redirect()->route('admin.tenants.index');
    }


    /**
     * Display Tenant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('tenant_view')) {
            return abort(401);
        }
        $landlords = \App\Landlord::get()->pluck('first_name', 'id')->prepend('Please select', '');$houses = \App\House::where('tenant_id', $id)->get();

        $tenant = Tenant::findOrFail($id);

        return view('admin.tenants.show', compact('tenant', 'houses'));
    }


    /**
     * Remove Tenant from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('tenant_delete')) {
            return abort(401);
        }
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();

        return redirect()->route('admin.tenants.index');
    }

    /**
     * Delete all selected Tenant at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('tenant_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Tenant::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
