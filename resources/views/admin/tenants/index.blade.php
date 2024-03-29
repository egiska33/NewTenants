@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tenant.title')</h3>
    @can('tenant_create')
    <p>
        <a href="{{ route('admin.tenants.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tenants) > 0 ? 'datatable' : '' }} @can('tenant_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('tenant_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.tenant.fields.first-name')</th>
                        <th>@lang('quickadmin.tenant.fields.last-name')</th>
                        <th>@lang('quickadmin.tenant.fields.email')</th>
                        <th>@lang('quickadmin.tenant.fields.phone')</th>
                        <th>@lang('quickadmin.tenant.fields.landlord')</th>
                        <th>@lang('quickadmin.landlord.fields.email')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tenants) > 0)
                        @foreach ($tenants as $tenant)
                            <tr data-entry-id="{{ $tenant->id }}">
                                @can('tenant_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $tenant->first_name }}</td>
                                <td>{{ $tenant->last_name }}</td>
                                <td>{{ $tenant->email }}</td>
                                <td>{{ $tenant->phone }}</td>
                                <td>{{ $tenant->landlord->first_name or '' }}</td>
<td>{{ isset($tenant->landlord) ? $tenant->landlord->email : '' }}</td>
                                <td>
                                    @can('tenant_view')
                                    <a href="{{ route('admin.tenants.show',[$tenant->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('tenant_edit')
                                    <a href="{{ route('admin.tenants.edit',[$tenant->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('tenant_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tenants.destroy', $tenant->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('tenant_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.tenants.mass_destroy') }}';
        @endcan

    </script>
@endsection