<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Contact;
use App\Policies\ContactPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Contact::class => ContactPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('edit-contact', [ContactPolicy::class, 'editContact']);
        Gate::define('delete-contact', [ContactPolicy::class, 'deleteContact']);
    }
}
