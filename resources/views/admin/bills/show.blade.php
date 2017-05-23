@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bill.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.bill.fields.type')</th>
                            <td>{{ Form::checkbox("type", 1, $bill->type == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bill.fields.total')</th>
                            <td>{{ $bill->total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bill.fields.house')</th>
                            <td>{{ $bill->house->city or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.address')</th>
                            <td>{{ isset($bill->house) ? $bill->house->address : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.bills.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop