<?php

namespace App\Providers;

use App\Http\Controllers\Admin\SendMailController;
use App\Models\Product;
use App\Policies\SendMail;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Category;
use App\Policies\CategoryPolicy;
use App\Policies\UserPolicy;
use App\Models\User;
use App\Policies\ProductPolicy;
use App\Models\Role;
use App\Policies\RolePolicy;
use App\Policies\SendMailPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         Category::class => CategoryPolicy::class,
             User::class => UserPolicy::class,
          Product::class => ProductPolicy::class,
             Role::class => RolePolicy::class,
        SendMailController::class => SendMailPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
    }
}
