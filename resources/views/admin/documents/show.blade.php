@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.document.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.document.fields.title')</th>
                            <td>{{ $document->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.document.fields.content')</th>
                            <td>{{ $document->content }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.document.fields.house')</th>
                            <td>{{ $document->house->city or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.address')</th>
                            <td>{{ isset($document->house) ? $document->house->address : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.documents.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop