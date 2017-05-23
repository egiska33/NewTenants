@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.landlord.title')</h3>
    @can('landlord_create')
    <p>
        <a href="{{ route('admin.landlords.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($landlords) > 0 ? 'datatable' : '' }} @can('landlord_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('landlord_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.landlord.fields.first-name')</th>
                        <th>@lang('quickadmin.landlord.fields.last-name')</th>
                        <th>@lang('quickadmin.landlord.fields.email')</th>
                        <th>@lang('quickadmin.landlord.fields.phone')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($landlords) > 0)
                        @foreach ($landlords as $landlord)
                            <tr data-entry-id="{{ $landlord->id }}">
                                @can('landlord_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $landlord->first_name }}</td>
                                <td>{{ $landlord->last_name }}</td>
                                <td>{{ $landlord->email }}</td>
                                <td>{{ $landlord->phone }}</td>
                                <td>
                                    @can('landlord_view')
                                    <a href="{{ route('admin.landlords.show',[$landlord->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('landlord_edit')
                                    <a href="{{ route('admin.landlords.edit',[$landlord->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('landlord_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.landlords.destroy', $landlord->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('landlord_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.landlords.mass_destroy') }}';
        @endcan

    </script>
@endsection