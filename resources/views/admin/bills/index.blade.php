@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bill.title')</h3>
    @can('bill_create')
    <p>
        <a href="{{ route('admin.bills.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($bills) > 0 ? 'datatable' : '' }} @can('bill_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('bill_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.bill.fields.type')</th>
                        <th>@lang('quickadmin.bill.fields.total')</th>
                        <th>@lang('quickadmin.bill.fields.house')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($bills) > 0)
                        @foreach ($bills as $bill)
                            <tr data-entry-id="{{ $bill->id }}">
                                @can('bill_delete')
                                    <td></td>
                                @endcan

                                <td>{{ Form::checkbox("type", 1, $bill->type == 1 ? true : false, ["disabled"]) }}</td>
                                <td>{{ $bill->total }}</td>
                                <td>{{ $bill->house->city or '' }}</td>
<td>{{ isset($bill->house) ? $bill->house->address : '' }}</td>
                                <td>
                                    @can('bill_view')
                                    <a href="{{ route('admin.bills.show',[$bill->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('bill_edit')
                                    <a href="{{ route('admin.bills.edit',[$bill->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('bill_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.bills.destroy', $bill->id])) !!}
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
        @can('bill_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.bills.mass_destroy') }}';
        @endcan

    </script>
@endsection