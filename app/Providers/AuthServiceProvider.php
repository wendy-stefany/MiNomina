<?php

namespace App\Providers;
use App\Models\Nomina;
use App\Models\User;
use App\Models\Team;
use App\Policies\AvisoPolicy;
use App\Policies\DepartamentoPolicy;
use App\Policies\EmpleadoPolicy;
use App\Policies\NominaPolicy;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Aviso::class=>AvisoPolicy::class,
        Departamento::class=>DepartamentoPolicy::class,
        Empleado::class=>EmpleadoPolicy::class,
        Nomina::class=>NominaPolicy::class,
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return $user->tipo == 'admin';
        });
    }
}
