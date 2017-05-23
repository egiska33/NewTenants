@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('landlord_access')
            <li class="{{ $request->segment(2) == 'landlords' ? 'active' : '' }}">
                <a href="{{ route('admin.landlords.index') }}">
                    <i class="fa fa-diamond"></i>
                    <span class="title">@lang('quickadmin.landlord.title')</span>
                </a>
            </li>
            @endcan
            
            @can('tenant_access')
            <li class="{{ $request->segment(2) == 'tenants' ? 'active' : '' }}">
                <a href="{{ route('admin.tenants.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">@lang('quickadmin.tenant.title')</span>
                </a>
            </li>
            @endcan
            
            @can('house_access')
            <li class="{{ $request->segment(2) == 'houses' ? 'active' : '' }}">
                <a href="{{ route('admin.houses.index') }}">
                    <i class="fa fa-institution"></i>
                    <span class="title">@lang('quickadmin.house.title')</span>
                </a>
            </li>
            @endcan
            
            @can('bill_access')
            <li class="{{ $request->segment(2) == 'bills' ? 'active' : '' }}">
                <a href="{{ route('admin.bills.index') }}">
                    <i class="fa fa-credit-card-alt"></i>
                    <span class="title">@lang('quickadmin.bill.title')</span>
                </a>
            </li>
            @endcan
            
            @can('task_access')
            <li class="{{ $request->segment(2) == 'tasks' ? 'active' : '' }}">
                <a href="{{ route('admin.tasks.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span class="title">@lang('quickadmin.task.title')</span>
                </a>
            </li>
            @endcan
            
            @can('message_access')
            <li class="{{ $request->segment(2) == 'messages' ? 'active' : '' }}">
                <a href="{{ route('admin.messages.index') }}">
                    <i class="fa fa-paper-plane"></i>
                    <span class="title">@lang('quickadmin.message.title')</span>
                </a>
            </li>
            @endcan
            
            @can('document_access')
            <li class="{{ $request->segment(2) == 'documents' ? 'active' : '' }}">
                <a href="{{ route('admin.documents.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">@lang('quickadmin.document.title')</span>
                </a>
            </li>
            @endcan
            

            

            

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
