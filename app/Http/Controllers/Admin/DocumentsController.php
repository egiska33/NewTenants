<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDocumentsRequest;
use App\Http\Requests\Admin\UpdateDocumentsRequest;

class DocumentsController extends Controller
{
    /**
     * Display a listing of Document.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('document_access')) {
            return abort(401);
        }

        $documents = Document::all();

        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating new Document.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('document_create')) {
            return abort(401);
        }
        $houses = \App\House::get()->pluck('city', 'id')->prepend('Please select', '');

        return view('admin.documents.create', compact('houses'));
    }

    /**
     * Store a newly created Document in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentsRequest $request)
    {
        if (! Gate::allows('document_create')) {
            return abort(401);
        }
        $document = Document::create($request->all());



        return redirect()->route('admin.documents.index');
    }


    /**
     * Show the form for editing Document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('document_edit')) {
            return abort(401);
        }
        $houses = \App\House::get()->pluck('city', 'id')->prepend('Please select', '');

        $document = Document::findOrFail($id);

        return view('admin.documents.edit', compact('document', 'houses'));
    }

    /**
     * Update Document in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentsRequest $request, $id)
    {
        if (! Gate::allows('document_edit')) {
            return abort(401);
        }
        $document = Document::findOrFail($id);
        $document->update($request->all());



        return redirect()->route('admin.documents.index');
    }


    /**
     * Display Document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('document_view')) {
            return abort(401);
        }
        $document = Document::findOrFail($id);

        return view('admin.documents.show', compact('document'));
    }


    /**
     * Remove Document from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('document_delete')) {
            return abort(401);
        }
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->route('admin.documents.index');
    }

    /**
     * Delete all selected Document at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('document_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Document::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
