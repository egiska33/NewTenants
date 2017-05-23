@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.message.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.message.fields.content')</th>
                            <td>{{ $message->content }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message.fields.time')</th>
                            <td>{{ $message->time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message.fields.house')</th>
                            <td>{{ $message->house->city or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.messages.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop