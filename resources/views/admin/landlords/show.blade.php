@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.landlord.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.landlord.fields.first-name')</th>
                            <td>{{ $landlord->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.landlord.fields.last-name')</th>
                            <td>{{ $landlord->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.landlord.fields.email')</th>
                            <td>{{ $landlord->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.landlord.fields.phone')</th>
                            <td>{{ $landlord->phone }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#tenant" aria-controls="tenant" role="tab" data-toggle="tab">Tenant</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="tenant">
<table class="table table-bordered table-striped {{ count($tenants) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.landlords.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop