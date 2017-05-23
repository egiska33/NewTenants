@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.house.title')</h3>
    @can('house_create')
    <p>
        <a href="{{ route('admin.houses.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($houses) > 0 ? 'datatable' : '' }} @can('house_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('house_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('house_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('house_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.houses.mass_destroy') }}';
        @endcan

    </script>
@endsection