@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.task.title')</h3>
    @can('task_create')
    <p>
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tasks) > 0 ? 'datatable' : '' }} @can('task_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('task_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('task_delete')
                                    <td></td>
                                @endcan

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
    </div>
@stop

@section('javascript') 
    <script>
        @can('task_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.tasks.mass_destroy') }}';
        @endcan

    </script>
@endsection