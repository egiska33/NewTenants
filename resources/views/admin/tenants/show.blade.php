@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tenant.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tenant.fields.first-name')</th>
                            <td>{{ $tenant->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tenant.fields.last-name')</th>
                            <td>{{ $tenant->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tenant.fields.email')</th>
                            <td>{{ $tenant->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tenant.fields.phone')</th>
                            <td>{{ $tenant->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tenant.fields.landlord')</th>
                            <td>{{ $tenant->landlord->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.landlord.fields.email')</th>
                            <td>{{ isset($tenant->landlord) ? $tenant->landlord->email : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#house" aria-controls="house" role="tab" data-toggle="tab">House</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="house">
<table class="table table-bordered table-striped {{ count($houses) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.house.fields.city')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>@lang('quickadmin.house.fields.tenant')</th>
                        <th>@lang('quickadmin.tenant.fields.email')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($houses) > 0)
            @foreach ($houses as $house)
                <tr data-entry-id="{{ $house->id }}">
                    <td>{{ $house->city }}</td>
                                <td>{{ $house->address }}</td>
                                <td>{{ $house->tenant->first_name or '' }}</td>
<td>{{ isset($house->tenant) ? $house->tenant->email : '' }}</td>
                                <td>
                                    @can('house_view')
                                    <a href="{{ route('admin.houses.show',[$house->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('house_edit')
                                    <a href="{{ route('admin.houses.edit',[$house->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('house_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.houses.destroy', $house->id])) !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.tenants.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop