<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Landlord
        Gate::define('landlord_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('landlord_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('landlord_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('landlord_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('landlord_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tenant
        Gate::define('tenant_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tenant_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tenant_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tenant_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tenant_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: House
        Gate::define('house_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('house_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('house_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('house_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('house_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Bill
        Gate::define('bill_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('bill_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('bill_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('bill_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('bill_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Task
        Gate::define('task_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('task_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('task_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('task_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('task_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Message
        Gate::define('message_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('message_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Document
        Gate::define('document_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('document_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('document_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('document_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('document_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
