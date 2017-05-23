@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.house.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.house.fields.city')</th>
                            <td>{{ $house->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.address')</th>
                            <td>{{ $house->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.tenant')</th>
                            <td>{{ $house->tenant->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tenant.fields.email')</th>
                            <td>{{ isset($house->tenant) ? $house->tenant->email : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#bill" aria-controls="bill" role="tab" data-toggle="tab">Bill</a></li>
<li role="presentation" class=""><a href="#task" aria-controls="task" role="tab" data-toggle="tab">Task</a></li>
<li role="presentation" class=""><a href="#message" aria-controls="message" role="tab" data-toggle="tab">Message</a></li>
<li role="presentation" class=""><a href="#document" aria-controls="document" role="tab" data-toggle="tab">Document</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="bill">
<table class="table table-bordered table-striped {{ count($bills) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
<div role="tabpanel" class="tab-pane " id="task">
<table class="table table-bordered table-striped {{ count($tasks) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.task.fields.content')</th>
                        <th>@lang('quickadmin.task.fields.photo')</th>
                        <th>@lang('quickadmin.task.fields.house')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <tr data-entry-id="{{ $task->id }}">
                    <td>{!! $task->content !!}</td>
                                <td> @foreach($task->getMedia('photo') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                                <td>{{ $task->house->city or '' }}</td>
<td>{{ isset($task->house) ? $task->house->address : '' }}</td>
                                <td>
                                    @can('task_view')
                                    <a href="{{ route('admin.tasks.show',[$task->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('task_edit')
                                    <a href="{{ route('admin.tasks.edit',[$task->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('task_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tasks.destroy', $task->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="message">
<table class="table table-bordered table-striped {{ count($messages) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.message.fields.content')</th>
                        <th>@lang('quickadmin.message.fields.time')</th>
                        <th>@lang('quickadmin.message.fields.house')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($messages) > 0)
            @foreach ($messages as $message)
                <tr data-entry-id="{{ $message->id }}">
                    <td>{{ $message->content }}</td>
                                <td>{{ $message->time }}</td>
                                <td>{{ $message->house->city or '' }}</td>
                                <td>
                                    @can('message_view')
                                    <a href="{{ route('admin.messages.show',[$message->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('message_edit')
                                    <a href="{{ route('admin.messages.edit',[$message->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('message_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.messages.destroy', $message->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="document">
<table class="table table-bordered table-striped {{ count($documents) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.houses.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop