@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.document.title')</h3>
    @can('document_create')
    <p>
        <a href="{{ route('admin.documents.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($documents) > 0 ? 'datatable' : '' }} @can('document_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('document_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.document.fields.title')</th>
                        <th>@lang('quickadmin.document.fields.content')</th>
                        <th>@lang('quickadmin.document.fields.house')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($documents) > 0)
                        @foreach ($documents as $document)
                            <tr data-entry-id="{{ $document->id }}">
                                @can('document_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $document->title }}</td>
                                <td>{{ $document->content }}</td>
                                <td>{{ $document->house->city or '' }}</td>
<td>{{ isset($document->house) ? $document->house->address : '' }}</td>
                                <td>
                                    @can('document_view')
                                    <a href="{{ route('admin.documents.show',[$document->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('document_edit')
                                    <a href="{{ route('admin.documents.edit',[$document->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('document_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.documents.destroy', $document->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('document_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.documents.mass_destroy') }}';
        @endcan

    </script>
@endsection